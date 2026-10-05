<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assigntime extends Model
{
    use HasFactory;
    public function day()
    {
        return $this->belongsTo(day::class);
    }
}

