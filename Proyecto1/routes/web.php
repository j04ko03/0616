<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/saludo', [SiteController::class, 'saludo'])->name('saludo.controller'); 
Route::get('/login', [SiteController::class, 'login'])->name('login.controller');


Route::get('/signup', [SiteController::class, 'signUp'])->name('signup.controller');
Route::post('/register', [SiteController::class, 'register'])->name('register.controller');
Route::get('/home', [SiteController::class, 'home'])->name('home.controller');

Route::get('/project', [SiteController::class, 'project'])->name('project.controller');
