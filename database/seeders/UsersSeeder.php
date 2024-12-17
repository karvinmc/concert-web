<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // Insert multiple users into the users table
    DB::table('users')->insert([
      [
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => Hash::make('admin123'), // Always hash passwords
        'is_admin' => true,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'Alexander',
        'email' => 'user@example.com',
        'password' => Hash::make('password123'),
        'is_admin' => false,
        'created_at' => now(),
        'updated_at' => now(),
      ]
    ]);
  }
}
