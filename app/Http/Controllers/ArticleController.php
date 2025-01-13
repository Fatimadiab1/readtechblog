<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
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
            'sous_titre' => 'required|string|max:255',
            'contenu' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'video' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $article = Article::create([
            'titre' => $request->titre,
            'sous_titre' => $request->sous_titre,
            'contenu' => $request->contenu,
            'image' => $request->image,
            'video' => $request->video,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('article.index', compact('article'))->with('success', 'Article créé avec succès!');
    }


    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article',));
    }
}
