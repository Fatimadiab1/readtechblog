<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        $utilisateur = User::all();
        $article = Article::all();
        $categorie = Categorie::all();
        return view('dashboard.index', compact('utilisateur','article','categorie'));
    }
}
