<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('categorie.index', compact('categories'));
    }
    public function create()
    {
        return view('categorie.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $categorie = Categorie::create([
            'image' => $request->image,
            'nom' => $request->nom,
            'decription' => $request->decription,

        ]);

        return redirect()->route('categorie.index', compact('categorie'))->with('success', 'Categorie créé avec succès!');
    }

}


