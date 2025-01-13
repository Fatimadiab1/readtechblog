<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InscriptionController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inscription', [InscriptionController::class, 'formregister'])->name('register');
Route::post('/inscription', [InscriptionController::class, 'register']);
Route::get('/connexion', [ConnexionController::class, 'formlogin'])->name('login');
Route::post('/connexion', [ConnexionController::class, 'login']);
Route::post('/logout', [ConnexionController::class, 'logout'])->name('logout');
Route::get('/accueil', [ConnexionController::class, 'accueil'])->name('accueil');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware(AdminMiddleware::class);


Route::get('/articles', [ArticleController::class, 'index'])->name('article.index')->middleware(AdminMiddleware::class);;
Route::get('/articles/create', [ArticleController::class, 'create'])->name('article.create')->middleware(AdminMiddleware::class);;
Route::post('/articles', [ArticleController::class, 'store'])->name('article.store')->middleware(AdminMiddleware::class);;
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('article.show')->middleware(AdminMiddleware::class);;



Route::get('/categorie', [CategorieController::class, 'index'])->name('categorie.index')->middleware(AdminMiddleware::class);;
Route::get('/categorie/create', [CategorieController::class, 'create'])->name('categorie.create')->middleware(AdminMiddleware::class);;
Route::post('/categories', [CategorieController::class, 'store'])->name('categorie.store')->middleware(AdminMiddleware::class);;
