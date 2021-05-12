<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', App\Http\Livewire\Admin\Dashboard::class)->middleware('auth');

// Themes
Route::get('/admin/themes', App\Http\Livewire\Admin\Theme\Index::class);
Route::get('/admin/themes/create', App\Http\Livewire\Admin\Theme\Create::class);
Route::get('/admin/themes/{theme:slug}/edit', App\Http\Livewire\Admin\Theme\Edit::class);
// Route::get('/admin/themes/{theme:slug}/', App\Http\Livewire\Admin\Theme\Show::class);

// Developers
Route::get('/admin/developers', App\Http\Livewire\Admin\Developer\Index::class);
Route::get('/admin/developers/create', App\Http\Livewire\Admin\Developer\Create::class);
Route::get('/admin/developers/{developer:username}/edit', App\Http\Livewire\Admin\Developer\Edit::class);

// Groups
Route::get('/admin/groups', App\Http\Livewire\Admin\Group\Index::class);
Route::get('/admin/groups/create', App\Http\Livewire\Admin\Group\Create::class);
Route::get('/admin/groups/{group:slug}/edit', App\Http\Livewire\Admin\Group\Edit::class);

// Clients
Route::get('/admin/clients', App\Http\Livewire\Admin\Client\Index::class);
Route::get('/admin/clients/create', App\Http\Livewire\Admin\Client\Create::class);
Route::get('/admin/clients/{client:username}/edit', App\Http\Livewire\Admin\Client\Edit::class);
