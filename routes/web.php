<?php

use App\Http\Controllers\Comments\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Likes\LikeCommentController;
use App\Http\Controllers\Likes\LikeQuizController;
use App\Http\Controllers\Quizzes\Questions\QuestionController;
use App\Http\Controllers\Quizzes\QuizController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\Users\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::namespace("App\Http\Controllers")->group(function () {
    Auth::routes(["verify" => true]);
});

Route::get('/', HomeController::class)->name('home');
Route::get('/stats', StatsController::class)->name('stats');
Route::get('/search', SearchController::class)->name('quiz.search');

Route::resource('/quiz', QuizController::class)->except(['show']);
Route::get('/quiz/{quiz}-{slug}', [QuizController::class, 'show'])->name('quiz.show');
Route::put('/quiz/restore/{id}', [QuizController::class, 'restore'])->name('quiz.restore');
Route::delete('/quiz/delete/{id}', [QuizController::class, 'forceDelete'])->name('quiz.force-delete');
Route::post('/quiz/{quiz}/like', LikeQuizController::class)->name('quiz.like');

Route::resource('/quiz/{quiz}/questions', QuestionController::class)->only(['store', 'update', 'destroy']);

Route::resource('/quiz/{quiz}/comments', CommentController::class)->only(['index', 'store', 'destroy']);
Route::get('/quiz/{quiz}/comments', [CommentController::class, 'show'])->name('comments.show');
Route::post('/quiz/{quiz}/comments/{comment}/like', LikeCommentController::class)->name('comments.like');

Route::resource('/profiles', ProfileController::class)->except(['create', 'store']);
Route::get('/profiles/{profile}/{slug?}', [ProfileController::class, 'show'])->name('profiles.show');


