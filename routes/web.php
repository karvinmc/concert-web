<?php

use App\Http\Controllers\singersController;
use Illuminate\Support\Facades\Route;
use App\Models\Concert;
use App\Models\Singer;


Route::get('/', function () {
  return view('home');
});

Route::get('/concerts', function () {
    // Fetch all concerts with singer data
    $concerts = Concert::with('singer')->get();

    // Map the concerts to match the $concertCard structure
    $concertCard = $concerts->map(function ($concert) {
        return [
            'image' => asset('images/singers/taylor_swift.jpg'), // Adjust this dynamically if needed
            'concertName' => $concert->name,
            'singer' => $concert->singer->name, // Assuming relationship exists
            'date' => $concert->date,
            'location' => $concert->location,
        ];
    });

    // Return view with concert cards
    return view('concerts', ['concertCard' => $concertCard]);
});

Route::get('/singers', function () {
  // Fetch all singers
  $singers = Singer::all();

  // Map singers to match the desired structure
  $singerCards = $singers->map(function ($singer) {
      return [
          'name' => $singer->name,
          'profile' => $singer->profile,
          'image' => asset('images/singers/default_image.jpg'), // Replace with actual image path if stored
      ];
  });

  // Return view with singer data
  return view('singers', ['singerCards' => $singerCards]);
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

  Route::get('/users', function () {
    return view('admin.users');
  });

  Route::get('/concerts', function () {
    return view('admin.concerts');
  });

  Route::resource('/singers', singersController::class);

  Route::get('/tickets', function () {
    return view('admin.tickets');
  });

  Route::get('/bookings', function () {
    return view('admin.bookings');
  });
});
