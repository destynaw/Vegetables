<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VegetableController;

Route::get('/vegetables', [VegetableController::class, 'index']);
