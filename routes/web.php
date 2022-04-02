<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Landing Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Latest Docs Route
Route::get('docs/latest/{path?}', [DocumentController::class, 'latest'])->name('docs.latest');

// Specified Docs Route
Route::get('docs/{version}/{path}', [DocumentController::class, 'show'])->name('docs.show');
Route::get('docs/{version}/{path}/{sub_path}', [DocumentController::class, 'show'])->name('docs.show_2');
