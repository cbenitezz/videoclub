<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function movie()
    {
        return $this->belongsTo('App\Movie','movie_id');
    }
}
