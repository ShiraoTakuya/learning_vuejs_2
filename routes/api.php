<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConstructorController;

Route::get('/dynamic-form-component', [ConstructorController::class, 'DynamicFormComponent']);