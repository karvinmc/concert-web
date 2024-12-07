<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('home');
});

Route::get('/concerts', function () {
  return view('concerts');
});

Route::get('/singers', function () {
  return view('singers');
});

Route::get('/login', function () {
  return view('login');
});

Route::get('/register', function () {
  return view('register');
});


Route::get('/concert_detail', function () {
  return view('concert_detail');
});

Route::get('/seat', function () {
  return view('seat');
});