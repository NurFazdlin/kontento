<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pictures;

class gallery extends Model
{
    use HasFactory; 

    protected $table = 'galleries';

    protected $fillable = [
        'type',
        'description',
        'cover'
    ];

    public function pictures(){
        return $this->hasMany(Pictures::class);
    }
}
