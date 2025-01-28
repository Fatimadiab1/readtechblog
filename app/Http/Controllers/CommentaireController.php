<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    public function index()
    {
        // Récupérer les commentaires avec les articles associés
        $commentaires = Commentaire::with('article')->get();
        return view('commentaire.index', compact('commentaires'));
    }

    public function create($id)
    {
        // Récupérer un commentaire pour l'afficher avec l'article
        $commentaire = Commentaire::findOrFail($id);
        return view('article.show', compact('commentaire'));
    }

    public function store(Request $request)
    {
        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            alert()->warning('WarningAlert', 'Vous devez être connecté pour écrire un commentaire.');
            return redirect()->route('login')->withErrors([
                'auth' => 'Vous devez être connecté pour écrire un commentaire.',
            ]);
        }

        // Validation du contenu du commentaire
        $request->validate([
            'contenue' => 'required|string|max:255',
        ]);

        // Création du commentaire
        Commentaire::create([
            'contenue' => $request->contenue,
            'user_id' => Auth::id(),
            'article_id' => $request->article_id,
        ]);

        alert()->info('InfoAlert', 'Commentaire ajouté avec succès!', 'success');
        return redirect()->route('article.show', $request->article_id)->with('success', 'Commentaire ajouté avec succès!');
    }

    public function destroy($id)
    {
        // Suppression d'un commentaire
        $commentaires = Commentaire::findOrFail($id);
        $commentaires->delete();

        return redirect()->route('commentaire.index')->with('success', 'Commentaire supprimé avec succès!');
    }
}
