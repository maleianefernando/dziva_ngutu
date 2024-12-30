<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.doc-upload');
});

Route::get('/registar/docente', function () {
    return view('admin.registar-docente');
})->name('registar.docente');

Route::get('/registar/estudante', function () {
    return view('admin.registar-estudante');
})->name('registar.estudante');

Route::get('/registar/facudade', function () {
    return view('admin.registar-faculdade');
})->name('registar.faculdade');

Route::get('/registar/curso', function () {
    return view('admin.registar-curso');
})->name('registar.curso');

Route::get('/registar/cadeira', function () {
    return view('admin.registar-cadeira');
})->name('registar.cadeira');

Route::get('/docente', function () {
    return view('admin.listar-docente');
})->name('listar.docente');

Route::get('/estudante', function () {
    return view('admin.listar-estudante');
})->name('listar.estudante');

Route::get('/faculdade', function () {
    return view('admin.listar-faculdade');
})->name('listar.faculdade');

Route::get('/curso', function () {
    return view('admin.listar-curso');
})->name('listar.curso');

Route::get('/cadeira', function () {
    return view('admin.listar-cadeira');
})->name('listar.cadeira');

Route::get('/material', function () {
    return view('admin.doc-upload');
})->name('material');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
