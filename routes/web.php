<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InscriptionAdminController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\PaysController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Categorie;
use Illuminate\Support\Facades\Route;



Route::get('/inscription', [InscriptionController::class, 'formregister'])->name('register');
Route::post('/inscription', [InscriptionController::class, 'register']);
Route::get('/connexion', [ConnexionController::class, 'formlogin'])->name('login');
Route::post('/connexion', [ConnexionController::class, 'login']);
Route::post('/logout', [ConnexionController::class, 'logout'])->name('logout');
Route::get('/accueil', [ConnexionController::class, 'accueil'])->name('accueil');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware(AdminMiddleware::class);
Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/inscription/admin', [InscriptionAdminController::class, 'create'])->name('registerAdminForm');
    Route::post('/inscription/admin', [InscriptionAdminController::class, 'registerAdmin'])->name('registerAdmin');
    Route::get('/listeAdmin', [InscriptionAdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/{id}/edit', [InscriptionAdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{id}', [InscriptionAdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{id}', [InscriptionAdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/client', [InscriptionAdminController::class, 'client'])->name('client');

});

Route::get('/articles', [ArticleController::class, 'index'])->name('article.index');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('article.create')->middleware(AdminMiddleware::class);;
Route::post('/articles', [ArticleController::class, 'store'])->name('article.store')->middleware(AdminMiddleware::class);;
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit')->middleware(AdminMiddleware::class);
Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('article.update')->middleware(AdminMiddleware::class);
Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('article.destroy')->middleware(AdminMiddleware::class);

Route::get('/', [HomeController::class, 'home'])->name('accueil');



Route::middleware(AdminMiddleware::class)->group(function () {
Route::get('/categorie', [CategorieController::class, 'index'])->name('categorie.index');
Route::get('/categorie/create', [CategorieController::class, 'create'])->name('categorie.create');
Route::post('/categories', [CategorieController::class, 'store'])->name('categorie.store');
Route::get('/categories/{id}/edit', [CategorieController::class, 'edit'])->name('categorie.edit');
Route::put('/categories/{id}', [CategorieController::class, 'update'])->name('categorie.update');
Route::delete('/categories/{id}', [CategorieController::class, 'destroy'])->name('categorie.destroy');
});
Route::get('/categories/{id}', [CategorieController::class, 'show'])->name('categorie.show');

Route::post('/commentaires', [CommentaireController::class, 'store'])->name('commentaire.store');
Route::get('/listecommentaire', [CommentaireController::class, 'index'])->name('commentaire.index')->middleware(AdminMiddleware::class);
Route::delete('/commentaires/{id}', [CommentaireController::class, 'destroy'])->name('commentaire.destroy')->middleware(AdminMiddleware::class);
Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/evenement', [EvenementController::class, 'index'])->name('evenement.index');
    Route::get('/evenement/create', [EvenementController::class, 'create'])->name('evenement.create');
    Route::post('/evenements', [EvenementController::class, 'store'])->name('evenement.store');
    Route::get('/evenements/{id}/edit', [EvenementController::class, 'edit'])->name('evenement.edit');
    Route::put('/evenements/{id}', [EvenementController::class, 'update'])->name('evenement.update');
    Route::delete('/evenements/{id}', [EvenementController::class, 'destroy'])->name('evenement.destroy');
    });
    Route::get('/evenementshow', [EvenementController::class, 'show'])->name('evenement.show');

    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('/pays', [PaysController::class, 'index'])->name('pays.index');
        Route::get('/pays/create', [PaysController::class, 'create'])->name('pays.create');
        Route::post('/payss', [PaysController::class, 'store'])->name('pays.store');
        Route::delete('/pays/{id}', [PaysController::class, 'destroy'])->name('pays.destroy');
    });
    Route::get('/pays{id}', [PaysController::class, 'show'])->name('pays.show');
