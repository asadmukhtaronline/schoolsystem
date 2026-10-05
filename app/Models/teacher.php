<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;
    public function assignments()
    {
        return $this->hasMany(assignment::class, 'teacher_id');
    }
    public function timetables()
    {
        return $this->hasMany(timetable::class);
    }
    public function assignteachers()
    {
        return $this->hasMany(assignteacher::class); 
    }

    public function teacherslots()
    {
        return $this->hasManyThrough(teacherslot::class, timetable::class);
    }

    public function sectiontimeslots()
    {
        return $this->hasMany(sectiontimeslot::class);
    }
    public function sections()
    {
        return $this->hasMany(section::class);
    }

    public function years()
    {
        return $this->hasManyThrough(year::class, section::class);
    }
    public function users()
    {
        return $this->hasManyThrough(user::class, section::class);
    }
    public function sectiontimetable()
    {
        return $this->hasMany(sectiontimetable::class);
    }
}
