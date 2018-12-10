<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Movie;

class Favorite extends Model
{
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
