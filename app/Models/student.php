<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    public function enrollment()
    {
        return $this->hasMany(enrollment::class);
    }

    public function year()
    {
        return $this->belongsTo(year::class);
    }

    public function section()
    {
        return $this->belongsTo(section::class);
    }
    
}
