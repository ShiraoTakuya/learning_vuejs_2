<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommonController;

Route::get('/', function () {return redirect()->route('page1');});
Route::get('/page1', [CommonController::class, 'page1'])->name('page1');
Route::get('/page2', [CommonController::class, 'page2'])->name('page2');

Route::post('/form1', [CommonController::class, 'form1'])->name('form1');