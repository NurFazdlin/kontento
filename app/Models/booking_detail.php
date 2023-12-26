<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking_detail extends Model
{
    use HasFactory; 

    protected $table = 'booking_details';

    protected $fillable = [
        'name',
        'email',
        'icnumber',
        'phone_number',
        'typeofhomestay',
        'roomnumber',
        'checkin',
        'checkout',
    ];

    /*public function setCheckInAttribute($value)
    {
        $this->attributes['checkin'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    }*/
}
