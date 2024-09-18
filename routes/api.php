<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/contacts', [ContactController::class, 'apiIndex']);
Route::post('/contacts', [ContactController::class, 'apiStore']);
Route::get('/contacts/{id}', [ContactController::class, 'apiShow']);
Route::put('/contacts/{id}', [ContactController::class, 'apiUpdate']);
Route::delete('/contacts/{id}', [ContactController::class, 'apiDestroy']);