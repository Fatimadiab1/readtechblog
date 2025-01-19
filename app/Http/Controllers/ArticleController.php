<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use App\Models\Commentaire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        // $articles = Article::all();
        $articles = Article::withCount('commentaires')->get();
        return view('article.index', compact('articles'));
    }
    public function create()
    {
        $categories = Categorie::all();
        return view('article.create', compact('categories'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'sous_titre' => 'required|string|max:255',
            'contenu' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:10240',
            'category_id' => 'required|exists:categories,id',
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $videoPath = null;
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('videos', 'public');
        }

        $article = Article::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'sous_titre' => $request->sous_titre,
            'contenu' => $request->contenu,
            'image' => $imagePath,
            'video' => $videoPath,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('article.index', compact('article'))->with('success', 'Article créé avec succès!');
    }

    public function show($id)
    {
        // $commentaires = $article->commentaires()->whereHas('user')->get();

        $article = Article::with('commentaires.user')->findOrFail($id);

        // Incrémenter le compteur de vues
        $article->increment('views');
        return view('article.show', compact('article'));
    }


    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Categorie::all();
        return view('article.edit', compact('article', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'sous_titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:10240',
            'category_id' => 'required|exists:categories,id',
        ]);

        $article = Article::findOrFail($id);

        // Gérer l'image si elle est téléchargée
        $imagePath = $article->image;
        if ($request->hasFile('image')) {

            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Gérer la video si elle est téléchargée
        $videoPath = $article->video;
        if ($request->hasFile('video')) {
            if ($videoPath) {
                Storage::disk('public')->delete($videoPath);
            }
            $videoPath = $request->file('video')->store('videos', 'public');
        }

        $article->update([
            'titre' => $request->titre,
            'description' => $request->description,
            'sous_titre' => $request->sous_titre,
            'contenu' => $request->contenu,
            'image' => $imagePath,
            'video' => $videoPath,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('article.index')->with('success', 'Article mis à jour avec succès!');
    }


    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('article.index')->with('success', 'Article supprimé avec succès!');
    }
    public function dashboard()
    {
        $articles = Article::all();

        return view('admin.dashboard', compact('articles'));
    }
}
