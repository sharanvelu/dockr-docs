<?php

use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Docs Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Latest Docs Route
Route::get('latest/{path?}', [DocumentController::class, 'latest'])->name('docs.latest');

// Specified Docs Route
Route::get('{version}/{path}', [DocumentController::class, 'show'])->name('docs.show');
Route::get('{version}/{path}/{sub_path}', [DocumentController::class, 'show'])->name('docs.show_2');
