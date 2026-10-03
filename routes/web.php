<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('posts.index'));

// Route::resource membuat 7 named route sekaligus:
// posts.index, posts.create, posts.store, posts.show,
// posts.edit, posts.update, posts.destroy
Route::resource('posts', PostController::class);
