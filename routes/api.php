<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/menus', [\App\Http\Controllers\MenuApi::class, 'index']);
Route::get('/questions/php/easy', [\App\Http\Controllers\Api\QuestionCustomController::class, 'questionPHPEasy']);
Route::get('/questions/javascript/easy', [\App\Http\Controllers\Api\QuestionCustomController::class, 'questionJavaScriptEasy']);
Route::get('/questions/python/easy', [\App\Http\Controllers\Api\QuestionCustomController::class, 'questionPythonEasy']);
Route::get('/questions/html/easy', [\App\Http\Controllers\Api\QuestionCustomController::class, 'questionHtmlEasy']);
Route::get('/questions/php/medium', [\App\Http\Controllers\Api\QuestionCustomController::class, 'questionPHPMedium']);
Route::get('/questions/javascript/medium', [\App\Http\Controllers\Api\QuestionCustomController::class, 'questionJavaScriptMedium']);
Route::get('/questions/python/medium', [\App\Http\Controllers\Api\QuestionCustomController::class, 'questionPythonMedium']);
Route::get('/questions/html/medium', [\App\Http\Controllers\Api\QuestionCustomController::class, 'questionHtmlMedium']);
Route::get('/questions/php/hard', [\App\Http\Controllers\Api\QuestionCustomController::class, 'questionPHPHard']);
Route::get('/questions/javascript/hard', [\App\Http\Controllers\Api\QuestionCustomController::class, 'questionJavaScriptHard']);
Route::get('/questions/python/hard', [\App\Http\Controllers\Api\QuestionCustomController::class, 'questionPythonHard']);
Route::get('/questions/html/hard', [\App\Http\Controllers\Api\QuestionCustomController::class, 'questionHtmlHard']);

Route::apiResource('/questions', \App\Http\Controllers\Api\QuestionController::class);
// routes/api.php
Route::apiResource('leaderboards', \App\Http\Controllers\Api\LeaderboardController::class);