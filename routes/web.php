<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/', [ContactController::class , 'index']);
Route::post('/ajouter_contact', [ContactController::class , 'ajouter_contact']);
Route::get('/show' , [ContactController::class , 'show'])->name('show');
Route::get('/modifier_contact/{id}' , [ContactController::class , 'modifier_contact']);
Route::post('/edit_contact/{id}', [ContactController::class , 'edit_contact']);
Route::get('/supprimer_contact/{id}' , [ContactController::class , 'supprimer_contact']);