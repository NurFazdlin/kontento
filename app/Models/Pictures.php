<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\gallery;

class Pictures extends Model
{
    use HasFactory;

    protected $fillable=[
        'pictures',
        'post_id',
    ];

    public function galleries(){
        return $this->belongsTo(gallery::class);
    }
}
