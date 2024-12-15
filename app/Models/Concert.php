<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Singer;

class Concert extends Model
{
    use HasFactory;

    // Specify the table name if not standard plural form
    protected $table = 'concerts';

    // Fields that can be mass assigned
    protected $fillable = [
        'singer_id',
        'name',
        'description',
        'date',
        'time',
        'location',
        'default_price',
    ];

    // Relationship: A concert belongs to a singer
    public function singer()
    {
        return $this->belongsTo(Singer::class, 'singer_id');
    }
}
