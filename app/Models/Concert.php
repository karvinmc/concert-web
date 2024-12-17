<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Singer;

class Concert extends Model
{
  use HasFactory;

  protected $table = 'concerts';

  protected $fillable = [
    'singer_id',
    'name',
    'description',
    'date',
    'time',
    'location',
    'default_price',
    'image_path',
  ];

  public function singer()
  {
    return $this->belongsTo(Singer::class, 'singer_id');
  }

  public function ticket()
  {
    return $this->hasMany(Ticket::class, 'concert_id');
  }
}
