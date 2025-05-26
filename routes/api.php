<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OcrController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/my-comments', [CommentController::class, 'getUserComments']);
    Route::post('/add-comment', [CommentController::class, 'addComment']);
    Route::delete('/delete-comment/{id}', [CommentController::class, 'deleteComment']);

    Route::post('/ocr/process', [OcrController::class, 'processImage']);

    Route::post('/verify_token', [AuthController::class, 'verifyToken']);
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);