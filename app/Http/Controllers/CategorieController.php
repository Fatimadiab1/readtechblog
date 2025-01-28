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
        // Récupérer les catégories avec le nombre d'articles associés
        $categories = Categorie::withCount(['articles' => function ($query) {
            $query->where('category_id', '!=', null);
        }])->get();

        return view('categorie.index', compact('categories'));
    }

    public function show($id)
    {
        // Récupérer une catégorie avec ses articles
        $categorie = Categorie::with('articles')->findOrFail($id);

        // Récupérer toutes les catégories
        $categories = Categorie::all();

        return view('categorie.show', compact('categorie', 'categories'));
    }

    public function create()
    {
        // Afficher le formulaire de création de catégorie
        return view('categorie.create');
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nom' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        // Stockage de l'image si fournie
        $imagePath = $request->hasFile('image') ? $request->file('image')->store('images', 'public') : null;

        // Création de la catégorie
        Categorie::create([
            'image' => $imagePath,
            'nom' => $request->nom,
            'description' => $request->description,
        ]);

        return redirect()->route('categorie.index')->with('success', 'Catégorie créée avec succès!');
    }

    public function edit($id)
    {
        // Récupérer la catégorie pour modification
        $categories = Categorie::findOrFail($id);
        return view('categorie.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nom' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        // Trouver la catégorie
        $categorie = Categorie::findOrFail($id);

        // Mise à jour de l'image si une nouvelle est téléchargée
        $imagePath = $categorie->image;
        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Mise à jour des données de la catégorie
        $categorie->update([
            'image' => $imagePath,
            'nom' => $request->nom,
            'description' => $request->description,
        ]);

        return redirect()->route('categorie.index')->with('success', 'Catégorie mise à jour avec succès!');
    }

    public function destroy($id)
    {
        // Suppression de la catégorie
        $categories = Categorie::findOrFail($id);
        $categories->delete();

        return redirect()->route('categorie.index')->with('success', 'Catégorie supprimée avec succès!');
    }
}
