<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(["verify" => true]);

Route::get('/', 'HomeController@index')->name('home');

Route::resource('/quiz', 'QuizController')->except(['show'])->middleware('verified');
Route::get('/quiz/{quiz}/{slug?}', 'QuizController@show')->name('quiz.show');
Route::put('/quiz/restore/{id}', 'QuizController@restore')->name('quiz.restore');
Route::delete('/quiz/delete/{id}', 'QuizController@forceDelete')->name('quiz.force-delete');

Route::resource('/profiles', 'ProfileController')->except(['create', 'store']);
Route::get('/profiles/{profile}/{slug?}', 'ProfileController@show')->name('profiles.show');

Route::get('/stats', 'StatsController@index')->name('stats');

Route::get('/search', 'SearchController@show')->name('quiz.search');
