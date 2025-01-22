<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::withCount(['articles' => function ($query) {
            $query->where('category_id', '!=', null);
        }])->get();

        return view('categorie.index', compact('categories'));
    }

    public function show($id)
    {
    
        $categorie = Categorie::with('articles')->findOrFail($id);
        
     
        $categories = Categorie::all();

        return view('categorie.show', compact('categorie', 'categories'));
    }
    
    
    
    public function create()
    {
        return view('categorie.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nom' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Categorie::create([
            'image' => $imagePath,
            'nom' => $request->nom,
            'description' => $request->description,
        ]);

        return redirect()->route('categorie.index')->with('success', 'Catégorie créée avec succès!');
    }

    public function edit($id)
    {
        $categories = Categorie::findOrFail($id);
        return view('categorie.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nom' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        // Trouver la catégorie par son ID
        $categorie = Categorie::findOrFail($id);

        // Gérer l'image si elle est téléchargée
        $imagePath = $categorie->image; // On garde l'ancienne image par défaut

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

            // Stocker la nouvelle image
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $categorie->update([
            'image' => $imagePath,
            'nom' => $request->nom,
            'description' => $request->description,
        ]);


        return redirect()->route('categorie.index')->with('success', 'Catégorie mise à jour avec succès!');
    }


    public function destroy($id)
    {
        $categories = Categorie::findOrFail($id);
        $categories->delete();

        return redirect()->route('categorie.index')->with('success', 'Categorie supprimé avec succès!');
    }
}
