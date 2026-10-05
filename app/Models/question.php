<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;

    public function quiz()
    {
        return $this->belongsTo(quiz::class);
    }

    public function answers()
    {
        return $this->hasMany(answer::class);
    }
}
