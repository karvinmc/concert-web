<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
  use HasFactory;

  protected $table = 'singers';

  protected $fillable = [
    'name',
    'profile',
    'image_path',
  ];

  public function concerts()
  {
    return $this->hasMany(Concert::class, 'singer_id');
  }
}
