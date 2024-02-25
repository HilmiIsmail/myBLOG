<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Livewire\ShowAricles;
use App\Livewire\ShowArticulo;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $articulos = Article::where('estado', 'PUBLICADO')
        ->orderBy('id', 'desc')
        ->paginate(5);
    return view('welcome', compact('articulos'));
})->name('home');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('categories', CategoryController::class)->except('show');
    Route::get('articles/{articulo}', [ArticleController::class, 'show'])->name('articles.show');
    Route::get('articulos', ShowAricles::class)->name('articulos.index');
});
