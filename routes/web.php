<?php
/**
 * Copyright (c) 2020. Adrian Schubek
 * https://adriansoftware.de
 */

use App\Http\Controllers\Comments\CommentController;
use App\Http\Controllers\FallbackRouteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Likes\LikeCommentController;
use App\Http\Controllers\Likes\LikeQuizController;
use App\Http\Controllers\Notifications\NotificationController;
use App\Http\Controllers\Quizzes\Questions\QuestionController;
use App\Http\Controllers\Quizzes\QuizController;
use App\Http\Controllers\Quizzes\QuizLikedByController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\Users\LikedQuizController;
use App\Http\Controllers\Users\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::namespace("App\Http\Controllers")->group(fn() => Auth::routes(["verify" => true]));

Route::get('/', HomeController::class)->name('home');
Route::get('/stats', StatsController::class)->name('stats');
Route::get('/search', SearchController::class)->name('quiz.search');
Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
Route::get('/liked', LikedQuizController::class)->name('likes.index');

Route::resource('/quiz', QuizController::class)->except(['show']);

Route::get('/quiz/{quiz}/{slug}/play', [QuizController::class, 'show'])->name('quiz.show');

Route::put('/quiz/{id}/restore', [QuizController::class, 'restore'])->name('quiz.restore');
Route::delete('/quiz/{id}/delete', [QuizController::class, 'forceDelete'])->name('quiz.force-delete');
Route::post('/quiz/{quiz}/like', LikeQuizController::class)->name('quiz.like');
Route::get('/quiz/{quiz}/{slug}/likes', QuizLikedByController::class)->name('quiz.likedby');
Route::resource('/quiz/{quiz}/questions', QuestionController::class)->only(['store', 'update', 'destroy']);

Route::resource('/quiz/{quiz}/comments', CommentController::class)->only(['store', 'destroy']);
Route::get('/quiz/{quiz}/{slug}/comments', [CommentController::class, 'show'])->name('comments.show');
Route::post('/quiz/{quiz}/comments/{comment}/like', LikeCommentController::class)->name('comments.like');

Route::resource('/profiles', ProfileController::class)->except(['index', 'create', 'store', 'show']);
Route::get('/users', [ProfileController::class, 'index'])->name('profiles.index');
Route::get('/users/{profile}/{slug?}', [ProfileController::class, 'show'])->name('profiles.show');

Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');

Route::fallback(FallbackRouteController::class);
