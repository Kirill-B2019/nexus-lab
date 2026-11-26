<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\LabController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LabController::class, 'home'])->name('home');

Route::post('/api/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/api/contact', [ContactController::class, 'info'])->name('contact.info');
