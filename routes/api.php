<?php

use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\AuthorController;
use App\Http\Controllers\API\ReviewerController;
use App\Http\Controllers\API\ReaderController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ADMIN
Route::get('/admins', [AdminController::class, 'index']);
Route::post('/admins/register', [AdminController::class, 'store']);
Route::post('/admins/change/{id}', [AdminController::class, 'change']);
Route::post('/admins/delete', [AdminController::class, 'delete']);
Route::post('/admins/show', [AdminController::class, 'read']);

// AUTHOR
Route::get('/authors', [AuthorController::class, 'index']);
Route::post('/authors/register', [AuthorController::class, 'store']);
Route::post('/authors/change/{id}', [AuthorController::class, 'change']);
Route::post('/authors/delete', [AuthorController::class, 'delete']);
Route::post('/authors/show', [AuthorController::class, 'read']);

// REVIEWER
Route::get('/reviewers', [ReviewerController::class, 'index']);
Route::post('/reviewers/register', [ReviewerController::class, 'store']);
Route::post('/reviewers/change/{id}', [ReviewerController::class, 'change']);
Route::post('/reviewers/delete', [ReviewerController::class, 'delete']);
Route::post('/reviewers/show', [ReviewerController::class, 'read']);

// READER
Route::get('/readers', [ReaderController::class, 'index']);
Route::post('/readers/register', [ReaderController::class, 'store']);
Route::post('/readers/change/{id}', [ReaderController::class, 'change']);
Route::post('/readers/delete', [ReaderController::class, 'delete']);
Route::post('/readers/show', [ReaderController::class, 'read']);
