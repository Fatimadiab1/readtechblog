<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InscriptionController extends Controller
{
    public function formregister()
    {
        return view('inscription.index');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
        ]);

       $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'client',
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        Auth::login($user);
        return redirect()->route('accueil')->with('success', 'Inscription réussie. Vous pouvez maintenant vous connecter.');
    }
}
