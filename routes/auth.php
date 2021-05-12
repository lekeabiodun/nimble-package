<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', App\Http\Livewire\Login::class)->middleware('guest')->name('login');

Route::get('/register', App\Http\Livewire\Register::class)->middleware('guest')->name('register');

Route::post('/logout', App\Http\Controllers\Auth\Logout::class)->middleware('auth')->name('logout');
