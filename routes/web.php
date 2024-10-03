<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::resource("propostas", App\Http\Controllers\PropostaController::class);
Route::resource("cabos_eleitorais", App\Http\Controllers\CaboEleitoralController::class);
Route::resource("contribuicoes", App\Http\Controllers\ContribuicaoController::class);
Route::resource("comentarios_contribuicoes", App\Http\Controllers\ComentarioContribuicaoController::class);
Route::resource("eventos", App\Http\Controllers\EventoController::class);