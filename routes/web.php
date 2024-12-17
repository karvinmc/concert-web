<?php

use App\Http\Controllers\concertsController;
use App\Http\Controllers\singersController;
use App\Http\Controllers\ticketController;
use App\Http\Controllers\bookingController;
use App\Http\Controllers\usersController;
use Illuminate\Support\Facades\Route;

use App\Models\Concert;
use App\Models\Singer;


Route::get('/', function () {
  return view('home');
});

Route::get('/concerts', function () {
  // Fetch all concerts with singer data, ordered by date
  $concerts = Concert::with('singer')->orderBy('date', 'asc')->get(); // 'asc' for ascending order

  return view('concerts', compact('concerts'));
});


Route::get('/singers', function () {
  // Fetch all singers
  $singers = Singer::all();

  return view('singers', compact('singers'));
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
  // Get
  Route::get('/dashboard', function () {
    return view('admin.dashboard');
  });

  Route::resource('/users', usersController::class);

  Route::resource('/concerts', concertsController::class);

  Route::resource('/singers', singersController::class);

  Route::resource('/tickets', ticketController::class);

  Route::resource('/bookings', bookingController::class);
});
