<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    use HasFactory;
    
    public function teacher(){
        return $this->belongsTo(teacher::class);
    }
    
    public function year(){
        return $this->belongsTo(year::class);  
    }
    public function enrollment()
    {
        return $this->hasMany(enrollment::class);
    }
    public function sectiontimetables()
    {
        return $this->hasMany(sectiontimetable::class);
    }
    public function subjects()
    {
        return $this->belongsToMany(subject::class, 'assignsubjects', 'section_id', 'subject_id');
    }
    public function assignments(){
        return $this->hasMany(assignment::class);
    }
    public function quizes(){
        return $this->hasMany(quiz::class);
    }
}  
