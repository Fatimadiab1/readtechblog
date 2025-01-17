<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    public function index(){
        return view('commentaire.index');
    }
    public function create($id){
        $commentaire = Commentaire::findOrfail($id);
        return view('article.show', compact('commentaire'));

}
    public function store(Request $request)
{
    if (!Auth::check()) {
        alert()->warning('WarningAlert','Vous devez etre connecter avant de saisir un commentaire');
        return redirect()->route('login')->withErrors([
            'auth' => 'Vous devez être connecté pour écrire un commentaire.',
        ]);
    }
    $request->validate([
        'contenue' => 'required|string|max:255',
    ]);
    Commentaire::create([
        'contenue' => $request->contenue,
        'user_id' => Auth::id(),
        'article_id' => $request->article_id,
    ]);
    alert()->info('InfoAlert','Commentaire ajouter avec succes','success');
    return redirect()->route('article.show', $request->article_id)->with('success', 'Commentaire ajouté avec succès!');
}


}
