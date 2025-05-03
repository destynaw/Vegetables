<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VegetableController;

Route::get('/vegetables', [VegetableController::class, 'index'])->name('vegetables.index');
Route::get('/vegetables/create', [VegetableController::class, 'create'])->name('vegetables.create');
Route::post('/vegetables', [VegetableController::class, 'store'])->name('vegetables.store');
Route::get('/vegetables/{id}/edit', [VegetableController::class, 'edit'])->name('vegetables.edit');
Route::put('/vegetables/{id}', [VegetableController::class, 'update'])->name('vegetables.update');
Route::delete('/vegetables/{id}', [VegetableController::class, 'destroy'])->name('vegetables.destroy');


