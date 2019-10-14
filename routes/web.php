<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(["verify" => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/stats', 'StatsController@index')->name('stats');
Route::get('/search', 'SearchController@show')->name('quiz.search');

Route::resource('/quiz', 'QuizController')->except(['show']);
Route::get('/quiz/{quiz}-{slug}', 'QuizController@show')->name('quiz.show');
Route::put('/quiz/restore/{id}', 'QuizController@restore')->name('quiz.restore');
Route::delete('/quiz/delete/{id}', 'QuizController@forceDelete')->name('quiz.force-delete');

Route::resource('/comments', 'CommentController')->only(['index', 'store', 'destroy']);
Route::get('/quiz/{quiz}/comments', 'CommentController@show')->name('comments.show');

Route::resource('/profiles', 'ProfileController')->except(['create', 'store']);
Route::get('/profiles/{profile}/{slug?}', 'ProfileController@show')->name('profiles.show');

