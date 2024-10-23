<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Landing');
})->name('home');

Route::get('/about', function(){
    return Inertia::render('About');
});
Route::get('/contact', function(){
    return Inertia::render('Contact');
})->name('contact');

Route::get('/register', function(){
    return Inertia::render('Register');
})->name('register');

Route::get('/login', function(){
    return Inertia::render('Login');
})->name('login');



Route::post('/register-action', [UserController::class, 'register'])->name('registerAction');
Route::post('/login-action', [UserController::class, 'login'])->name('loginAction');

Route::middleware('auth')->group(function(){
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::post('create/note', [NoteController::class, 'store'])->name('new-note');
    Route::post('get/note/{id?}', [NoteController::class, 'show'])->name('note');
});
