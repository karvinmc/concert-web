<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concert;
use App\Models\Booking;

class Ticket extends Model
{
  use HasFactory;

  protected $table = 'tickets';

  protected $fillable = [
    'concert_id',
    'seat_number',
    'status',
    'price',
  ];

  public function concert()
  {
    return $this->belongsTo(Concert::class, 'concert_id');
  }

  public function booking()
  {
    return $this->hasMany(Booking::class, 'ticket_id');
  }
}
