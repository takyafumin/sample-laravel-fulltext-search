<?php

use Illuminate\Support\Facades\Route;
use Packages\User\Http\Controllers\UserFuzzySearchController;
use Packages\User\Http\Controllers\UserSearchController;

Route::get('/', function () {
    return view('welcome');
});

// ユーザー検索
Route::get('/users/search', UserSearchController::class);
Route::get('/users/fuzzy-search', UserFuzzySearchController::class);
