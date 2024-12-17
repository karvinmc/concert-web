<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;
use App\Models\User;

class Booking extends Model
{
  use HasFactory;

  protected $table = 'bookings';

  protected $fillable = [
    'user_id',
    'ticket_id',
  ];

  public function ticket()
  {
    return $this->belongsTo(Ticket::class, 'ticket_id');
  }

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
