<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\TablesResponsivo;

Route::get('/', function () {
    return view('welcome');
});

Route::get("gemini", [\App\Http\Controllers\GeminiImageController::class, 'create'])->name("gemini.create");
Route::get("gemini/index", [\App\Http\Controllers\GeminiImageController::class, 'index'])->name("gemini.index");
Route::post("gemini/image", [\App\Http\Controllers\GeminiImageController::class, 'store'])->name("gemini.store");
Route::post("gemini/image2", [\App\Http\Controllers\GeminiImageController::class, 'storeTeste'])->name("gemini.storeTeste");

Route::get('table', TablesResponsivo::class);
