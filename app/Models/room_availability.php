<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room_availability extends Model
{
    use HasFactory; 

    protected $table = 'room_availabilities';

    protected $fillable = [
        'Room',
        'Type of Homestay',
        'address',
        'description',
        'files',
        'price',
    ];
}
