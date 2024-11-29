<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('home');
})->name('home');

Route::get('/concerts', function () {
  return view('concerts');
})->name('concerts');

Route::get('/singer', function () {
  return view('singer');
})->name('singer');
