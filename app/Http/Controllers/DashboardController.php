<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use App\Models\Evenement;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Récupérer les utilisateurs
        $utilisateur = User::all();

        // Récupérer les 6 derniers articles, triés par date de création
        $article = Article::latest()->take(6)->get();

        // Récupérer toutes les catégories et événements
        $categorie = Categorie::all();
        $evenement = Evenement::all();

        // Retourner la vue avec les données
        return view('dashboard.index', compact('utilisateur', 'article', 'categorie', 'evenement'));
    }
}

