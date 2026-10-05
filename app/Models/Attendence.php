<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    use HasFactory;
    
    public function student(){
        return $this->belongsTo(student::class);
    }

    public function enrollment(){
        return $this->belongsTo(enrollment::class);
    }

    public function section(){
        return $this->belongsTo(section::class);
    }

    public function year(){
        return $this->belongsTo(year::class);
    }
    
}
