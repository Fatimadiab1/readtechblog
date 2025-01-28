<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Evenement;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // Récupérer le mot-clé de recherche
        $query = $request->input('q');

        // Rechercher dans les événements
        $evenement = Evenement::where('nom', 'LIKE', "%{$query}%")->first();
        if ($evenement) {
            return redirect()->route('evenement.show', ['id' => $evenement->id]);
        }

        // Rechercher dans les catégories
        $categorie = Categorie::where('nom', 'LIKE', "%{$query}%")->first();
        if ($categorie) {
            return redirect()->route('categorie.show', ['id' => $categorie->id]);
        }

        // Rechercher dans les articles (si nécessaire)
        $article = Article::where('titre', 'LIKE', "%{$query}%")->first();
        if ($article) {
  
            return redirect()->route('article.show', ['id' => $article->id]);
        }

        // Si aucun résultat trouvé, rediriger avec un message
        return redirect()->back()->with('error', 'Aucun résultat trouvé pour votre recherche.');
    }
}
