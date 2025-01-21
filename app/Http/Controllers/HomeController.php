<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Article;
use App\Models\Categorie;

class HomeController extends Controller
{
    public function home()
    {
        $articles = Article::latest()->take(4)->get();
        $evenements = Evenement::with('pays')->latest()->take(4)->get();
        $categories = Categorie::withCount('articles')->get();

        return view('accueil', compact('articles', 'evenements', 'categories'));
    }
}
