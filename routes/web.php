<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TreeController;

Route::get('/', function () {
    return redirect()->route('tree.index');
});

Route::prefix('tree')->group(function () {
    Route::get('/', [TreeController::class, 'index'])->name('tree.index');
    Route::get('/flat', [TreeController::class, 'flat'])->name('tree.flat');
    Route::post('/', [TreeController::class, 'store'])->name('tree.store');
    Route::delete('/{node}', [TreeController::class, 'destroy'])->name('tree.destroy');
});