<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    use HasFactory;

    protected $table = 'singers';

    // Fields that are mass assignable
    protected $fillable = [
        'name',
        'profile',
    ];

    // Relationship: A singer has many concerts
    public function concerts()
    {
        return $this->hasMany(Concert::class, 'singer_id');
    }
}
