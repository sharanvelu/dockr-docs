<?php

use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Webhook Routes
|--------------------------------------------------------------------------
*/

Route::post('docker-hub', [WebhookController::class, 'dockerHub']);

// GitHub Actions
Route::post('github-actions', [WebhookController::class, 'githubActions']);
