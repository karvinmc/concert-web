<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('home');
});

Route::get('/concerts', function () {
  return view('concerts');
});

Route::get('/singer', function () {
  return view('singer');
});

Route::get('/login', function () {
  return view('login');
});