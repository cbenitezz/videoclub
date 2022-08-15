<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['genre_id','type_id','name','synopsis','price','date_release'];

    public function genre()
    {
        return $this->belongsTo('App\Genre','genre_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Type','type_id');
    }
}
