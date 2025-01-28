<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{
    public function formlogin()
    {
        // Afficher le formulaire de connexion
        return view('connexion.index');
    }

    public function login(Request $request)
    {
        // Récupérer les identifiants fournis
        $connexion = $request->only('email', 'password');

        // Vérifier si les identifiants sont valides
        if (!$connexion) {
            return redirect()->route('login')->withErrors([
                'email' => 'Aucun utilisateur trouvé avec cet email.',
            ]);
        }

        // Authentification de l'utilisateur
        if (Auth::attempt($connexion)) {
            // Rediriger selon le rôle de l'utilisateur
            if (Auth::user()->role == 'admin') {
                return redirect()->route('dashboard');
            }
            return redirect()->route('accueil');
        }

        // Afficher une alerte en cas d'échec de connexion
        alert()->error('ErrorAlert', 'Les identifiants sont incorrects.');
        return redirect()->route('login')->withErrors(['email' => 'Identifiants incorrects.']);
    }

    public function logout()
    {
        // Déconnexion de l'utilisateur
        Auth::logout();
        alert()->info('InfoAlert', 'Vous êtes déconnecté.');
        return redirect()->route('accueil');
    }

    public function accueil()
    {
        // Afficher la page d'accueil
        return view('accueil');
    }
}
