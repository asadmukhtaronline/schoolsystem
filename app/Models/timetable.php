<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class timetable extends Model
{
    use HasFactory;

    public function teacher()
    {
        return $this->belongsTo(teacher::class);
    }

    public function day()
    {
        return $this->belongsTo(day::class);
    }

    public function timeslot()
    {
        return $this->belongsTo(timeslot::class);
    }

    public function teacherslot()
    {
        return $this->hasMany(teacherslot::class);
    }
}
