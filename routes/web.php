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

// Admin
Route::prefix('admin')->group(function () {
  Route::get('/dashboard', function () {
    return view('admin.dashboard');
  });

  Route::get('/users', function () {
    return view('admin.users');
  });

  Route::get('/concerts', function () {
    return view('admin.concerts');
  });

  Route::get('/singers', function () {
    return view('admin.singers');
  });

  Route::get('/tickets', function () {
    return view('admin.tickets');
  });

  Route::get('/bookings', function () {
    return view('admin.bookings');
  });
});
