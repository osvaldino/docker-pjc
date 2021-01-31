<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Album extends Model
{
    protected $fillable = ['title'];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
