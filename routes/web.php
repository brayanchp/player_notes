<?php

use App\Livewire\Pages\Note\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');




Route::middleware(['auth'])->group(function () {
    Route::get('/notes', Index::class)
        ->name('notes.index');
});

require __DIR__ . '/settings.php';
