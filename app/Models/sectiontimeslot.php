<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sectiontimeslot extends Model
{
    use HasFactory;

    public function sectiontimetable()
    {
        return $this->belongsTo(sectiontimetable::class); 
    }

    public function day(){
        return $this->belongsTo(day::class);
    }

    public function year()
    {
        return $this->belongsTo(year::class, 'year_id');
    }

    public function timeslot(){
        return $this->belongsTo(timeslot::class);
    }

    public function section () 
    {
        return $this->belongsTo(sectoin::class);
    }
}
