<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacherslot extends Model
{
    use HasFactory;

    public function teacher(){
        return $this->belongsTo(teacher::class);
    }
    
    public function timetable()
    {
        return $this->belongsTo(timetable::class);
    }
}
