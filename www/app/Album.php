<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Album extends Model
{
    protected $fillable = [
        'artist_id',
        'title',
        'img_capa'
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
