<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name("home");
Route::get('/evento/{id}', [SiteController::class, 'evento'])->name("evento");

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
//
//require __DIR__ . '/auth.php';

Route::resource("propostas", App\Http\Controllers\PropostaController::class);
Route::resource("cabos_eleitorais", App\Http\Controllers\CaboEleitoralController::class);
Route::resource("contribuicoes", App\Http\Controllers\ContribuicaoController::class);
Route::resource("comentarios_contribuicoes", App\Http\Controllers\ComentarioContribuicaoController::class);
Route::resource("enderecos", App\Http\Controllers\EnderecoController::class);
Route::resource("users", App\Http\Controllers\UserController::class);

Route::resource("eventos", App\Http\Controllers\EventoController::class);
Route::get("evento/proprietario/{id}", [App\Http\Controllers\EventoController::class, "proprietario"])->name("evento.proprietario");

Route::view("login", "login.form")->name("login.form");
Route::view("dashboard", "login.dashboard")->name("login.dashboard");
Route::post("auth", [LoginController::class, "auth"])->name("login.auth");
Route::get("logout", [LoginController::class, "logout"])->name("login.logout");