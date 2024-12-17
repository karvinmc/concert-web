<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SingersSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('singers')->insert([
      [
        'name' => 'Adele',
        'profile' => 'Adele Laurie Blue Adkins is an English singer-songwriter known for her powerful voice and chart-topping albums like "21" and "25".',
        'image_path' => null,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'Ed Sheeran',
        'profile' => 'Edward Christopher Sheeran is an English singer-songwriter and guitarist, known for hits like "Shape of You" and "Perfect".',
        'image_path' => null,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'Taylor Swift',
        'profile' => 'Taylor Alison Swift is an American singer-songwriter renowned for her narrative songwriting and albums like "Fearless" and "1989".',
        'image_path' => null,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'Bruno Mars',
        'profile' => 'Peter Gene Hernandez, known professionally as Bruno Mars, is an American singer-songwriter famous for his funk and pop hits like "Uptown Funk".',
        'image_path' => null,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'Beyoncé',
        'profile' => 'Beyoncé Giselle Knowles-Carter is an American singer, songwriter, and actress, often referred to as "Queen Bey" for her immense influence.',
        'image_path' => null,
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);
  }
}
