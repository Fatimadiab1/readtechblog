<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Pays;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EvenementController extends Controller
{
    public function index()
    {
        $evenements = Evenement::all();

        return view('evenement.index' ,compact( 'evenements'));
    }
  
    
    public function create()
    {
        $pays = Pays::all();
        return view('evenement.create'  ,compact('pays'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'contenu' => 'required|string',
            'date' => 'required|date_format:Y-m-d',
            'pays_id'=>'required|exists:pays,id',
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }
        Evenement::create([
            'nom' => $request->nom,
            'image' => $imagePath,
            'contenu' => $request->contenu,
            'date' => $request->date,
            'pays_id' => $request->pays_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('evenement.index')->with('success', 'Catégorie créée avec succès!');
    }
    public function edit($id)
    {
        $evenement = Evenement::findOrFail($id);
        $pays = Pays::all();
        return view('evenement.edit', compact('evenement','pays'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'contenu' => 'required|string',
            'date' => 'required|date_format:Y-m-d',
            'pays_id'=>'required|exists:pays,id',
        ]);

        // Trouver la catégorie par son ID
        $evenement = Evenement::findOrFail($id);

        // Gérer l'image si elle est téléchargée
        $imagePath = $evenement->image; // On garde l'ancienne image par défaut

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

            // Stocker la nouvelle image
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $evenement->update([
            'nom' => $request->nom,
            'image' => $imagePath,
            'contenu' => $request->contenu,
            'date' => $request->date,
            'pays_id' => $request->pays_id,
            'user_id' => Auth::id(),
        ]);


        return redirect()->route('evenement.index')->with('success', 'Evenement mise à jour avec succès!');
    }


    public function destroy($id)
    {
        $evenements = Evenement::findOrFail($id);
        $evenements->delete();

        return redirect()->route('evenement.index')->with('success', 'Evenement supprimé avec succès!');

    }
}
