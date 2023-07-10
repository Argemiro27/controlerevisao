<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProprietarioController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\RevisaoController;
use Illuminate\Support\Facades\Route;


//ROTAS POST

Route::post('/proprietarios', [ProprietarioController::class, 'store'])->name('proprietarios.store');

Route::post('/veiculos', [CarroController::class, 'store'])->name('carro.store');

Route::post('/revisoes', [RevisaoController::class, 'store'])->name('revisao.store');

//API
Route::get('api/proprietarios', [ProprietarioController::class, 'index']);

Route::get('api/revisoes', [RevisaoController::class, 'index']);

Route::get('api/veiculos', [CarroController::class, 'index']);


//ROTAS DE VIEW
Route::get('/veiculos', function () {
    return view('veiculos');
})->name('veiculos');


Route::get('/proprietarios', function () {
    return view('proprietarios');
})->name('proprietarios');

Route::get('/revisoes', function () {
    return view('revisoes');
})->name('revisoes');

Route::get('/relatorios', function () {
    return view('relatorios');
})->name('relatorios');

Route::get('/registra-proprietario', function () {
    return view('registraproprietario');
})->name('registraproprietario');


Route::get('/registra-veiculo', function () {
    return view('registraveiculo');
})->name('registraveiculo');

Route::get('/registra-revisao', function () {
    return view('registrarevisao');
})->name('registrarevisao');



Route::get('/home', function () {
    return view('home');
})->name('home');

