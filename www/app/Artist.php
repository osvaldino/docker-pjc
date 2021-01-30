<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = ['name'];

    /**
     * Get the albuns for the artist.
     */
    public function albuns()
    {
        return $this->hasMany(Album::class);
    }
}
