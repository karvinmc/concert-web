<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConcertsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // Retrieve the singer IDs for Ed Sheeran, Taylor Swift, and Bruno Mars
    $edSheeranId = DB::table('singers')->where('name', 'Ed Sheeran')->value('id');
    $taylorSwiftId = DB::table('singers')->where('name', 'Taylor Swift')->value('id');
    $brunoMarsId = DB::table('singers')->where('name', 'Bruno Mars')->value('id');

    DB::table('concerts')->insert([
      // Ed Sheeran Concerts
      [
        'singer_id' => $edSheeranId,
        'name' => 'Mathematics Tour - Wembley Stadium',
        'description' => 'Ed Sheeran performs live at Wembley Stadium as part of his Mathematics Tour.',
        'date' => now()->addDays(rand(10, 100))->format('Y-m-d'),
        'location' => 'London, UK',
        'default_price' => 120.00,
        'image_path' => null,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'singer_id' => $edSheeranId,
        'name' => 'Mathematics Tour - Madison Square Garden',
        'description' => 'An iconic performance at Madison Square Garden by Ed Sheeran.',
        'date' => now()->addDays(rand(110, 200))->format('Y-m-d'),
        'location' => 'New York, USA',
        'default_price' => 150.00,
        'image_path' => null,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      // Taylor Swift Concerts
      [
        'singer_id' => $taylorSwiftId,
        'name' => 'Eras Tour - SoFi Stadium',
        'description' => 'Taylor Swift\'s grand Eras Tour at SoFi Stadium.',
        'date' => now()->addDays(rand(30, 150))->format('Y-m-d'),
        'location' => 'Los Angeles, USA',
        'default_price' => 200.00,
        'image_path' => null,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'singer_id' => $taylorSwiftId,
        'name' => 'Eras Tour - Tokyo Dome',
        'description' => 'Taylor Swift continues her Eras Tour with an incredible show at the Tokyo Dome.',
        'date' => now()->addDays(rand(160, 240))->format('Y-m-d'),
        'location' => 'Tokyo, Japan',
        'default_price' => 180.00,
        'image_path' => null,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      // Bruno Mars Concert
      [
        'singer_id' => $brunoMarsId,
        'name' => '24K Magic World Tour - MGM Grand',
        'description' => 'Bruno Mars brings his electrifying 24K Magic World Tour to the MGM Grand.',
        'date' => now()->addDays(rand(20, 180))->format('Y-m-d'),
        'location' => 'Las Vegas, USA',
        'default_price' => 130.00,
        'image_path' => null,
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);
  }
}
