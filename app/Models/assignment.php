<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assignment extends Model
{
    use HasFactory;

    public function subject(){
        return $this->belongsTo(subject::class);
    }
    public function assignsubject(){
        return $this->belongsTo(assignsubject::class);  
    }
    public function teacher(){
        return $this->belongsTo(teacher::class);
    }
   
    // public function enrollment()
    // {
    //     return $this->belongsTo(enrollment::class);
    // }
    public function assignment()
    {
        return $this->belongsTo(Assignment::class, 'assignment_id');
    }
    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class, 'enrollment_id');
    }

    public function class()
    {
        return $this->belongsTo(year::class); 
    }

    public function section()
    {
        return $this->belongsTo(section::class);
    }
    public function stuassignment()
    {
        return $this->hasMany(stuassignment::class);
    }

// -----------------
public function year()
    {
        return $this->belongsTo(year::class, 'class_id');
    }

    public function sections()
    {
        return $this->belongsTo(section::class, 'section_id');
    }

    public function subjects()
    {
        return $this->belongsTo(assignsubject::class, 'subject_id');
    }

    public function teachers()
    {
        return $this->belongsTo(teacher::class, 'teacher_id');
    }
    public function branch(){
        return $this->belongsTo(Branch::class);
    }

}
