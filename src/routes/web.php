<?php

use App\Http\Controllers\Public\SecurityAwarenessController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Illuminate\Support\Facades\Response;


/* NOTE: Do Not Remove
/ Livewire asset handling if using sub folder in domain
*/

Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});
/*
/ END
*/

Route::get('/', [SecurityAwarenessController::class, 'home'])
    ->name('awareness.home');

Route::get('/simulasi-phishing', [SecurityAwarenessController::class, 'simulation'])
    ->name('awareness.simulation');

Route::get('/edukasi-phishing', [SecurityAwarenessController::class, 'education'])
    ->name('awareness.education');

Route::view('/pre-test', 'awareness.evaluation', [
    'phase' => 'pre',
])->name('awareness.pre-test');

Route::view('/post-test', 'awareness.evaluation', [
    'phase' => 'post',
])->name('awareness.post-test');
