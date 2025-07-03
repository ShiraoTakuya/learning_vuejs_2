<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Inertia\VueConstructor;

Route::get('/dynamic-form-component', [VueConstructor::class, 'DynamicFormComponent']);