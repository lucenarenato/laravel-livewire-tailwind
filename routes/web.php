<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\TablesResponsivo;
use App\Livewire\ShowBooks;
use App\Livewire\Import;
use App\Livewire\Users;

Route::get('/', function () {
    return view('welcome');
});

Route::get("gemini", [\App\Http\Controllers\GeminiImageController::class, 'create'])->name("gemini.create");
Route::get("gemini/index", [\App\Http\Controllers\GeminiImageController::class, 'index'])->name("gemini.index");
Route::post("gemini/image", [\App\Http\Controllers\GeminiImageController::class, 'store'])->name("gemini.store");
Route::post("gemini/image2", [\App\Http\Controllers\GeminiImageController::class, 'storeTeste'])->name("gemini.storeTeste");

Route::get('table', TablesResponsivo::class)->name('table');

Route::get('/show/books', ShowBooks::class)->name('show.books');

Route::get('/import', Import::class)->name('import');

Route::get('product', function () {
    return view('productteste');
})->name('product');

Route::get('users', Users::class)->name('users');
