<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{
    public function formlogin()
    {
        return view('connexion.index');
    }

    public function login(Request $request)
    {
        $connexion = $request->only('email', 'password');

        if (Auth::attempt($connexion)) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('dashboard');
            }
            return redirect()->route('accueil');
        }

        return redirect()->route('connexion.index')->withErrors(['email' => 'Identifiants incorrects.']);
    }
    public function logout()
    {
        Auth::logout();
        alert()->info('InfoAlert', 'Vous etes deconnecter.');
        return redirect()->route('accueil');
    }
    public function accueil()
    {
        return view('accueil');
    }
}
