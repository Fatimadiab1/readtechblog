<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Pays;
use Illuminate\Http\Request;

class PaysController extends Controller
{
    public function create(){
        $pays=Pays::all();
        return view('pays.create' , compact('pays'));
    }
    public function index(){
        $pays=Pays::all();
        return view('pays.index'  , compact('pays'));
    }
    public function show($id){

        $pays = Pays::findOrFail($id);
        $evenements =Evenement::findOrFail($id);
        return view('pays.show', compact('pays', 'evenements'));
    }
    public function store(Request $request){
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);
        Pays::create([
            'nom' => $request->nom,
        ]);
        return redirect()->route('pays.index')->with('success', 'Pays créé avec succès!');
    }
    public function destroy($id)
    {
        $pays = Pays::findOrFail($id);
        $pays->delete();

        return redirect()->route('pays.index')->with('success', 'Pays supprimé avec succès!');
    }
}
