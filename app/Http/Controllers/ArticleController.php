<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        // Récupérer les articles avec le nombre de commentaires
        $articles = Article::withCount('commentaires')->get();
        return view('article.index', compact('articles'));
    }

    public function create()
    {
        // Récupérer toutes les catégories pour le formulaire
        $categories = Categorie::all();
        return view('article.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'sous_titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:10240',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Stockage des fichiers (image et vidéo)
        $imagePath = $request->hasFile('image') ? $request->file('image')->store('images', 'public') : null;
        $videoPath = $request->hasFile('video') ? $request->file('video')->store('videos', 'public') : null;

        // Création de l'article
        Article::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'sous_titre' => $request->sous_titre,
            'contenu' => $request->contenu,
            'image' => $imagePath,
            'video' => $videoPath,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('article.index')->with('success', 'Article créé avec succès!');
    }

    public function show($id)
    {
        // Récupérer un article avec ses commentaires et catégories
        $article = Article::with('commentaires.user')->findOrFail($id);
        $categories = Categorie::all();
        $article->increment('views'); 

        return view('article.show', compact('article', 'categories'));
    }

    public function edit($id)
    {
        // Récupérer un article et les catégories pour modification
        $article = Article::findOrFail($id);
        $categories = Categorie::all();
        return view('article.edit', compact('article', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validation des données
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

        // Mise à jour des fichiers (image et vidéo)
        $imagePath = $article->image;
        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $videoPath = $article->video;
        if ($request->hasFile('video')) {
            if ($videoPath) {
                Storage::disk('public')->delete($videoPath);
            }
            $videoPath = $request->file('video')->store('videos', 'public');
        }

        // Mise à jour de l'article
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
        // Supprimer un article
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('article.index')->with('success', 'Article supprimé avec succès!');
    }

    public function like($id)
    {
        // Ajouter un like à l'article
        $article = Article::findOrFail($id);
        $article->increment('likes');

        return redirect()->back()->with('success', 'Article liké avec succès!');
    }

    public function dashboard()
    {
        // Récupérer tous les articles pour l'administration
        $articles = Article::all();
        return view('admin.dashboard', compact('articles'));
    }
}
