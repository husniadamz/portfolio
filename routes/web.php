<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/focus', 'pages.focus')->name('focus');
Route::view('/stack', 'pages.stack')->name('stack');
Route::view('/experience', 'pages.experience')->name('experience');
Route::view('/contact', 'pages.contact')->name('contact');
