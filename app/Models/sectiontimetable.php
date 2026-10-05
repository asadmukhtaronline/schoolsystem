<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sectiontimetable extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_id',
        'subject_id',
        'year_id',
        'teacher_id',
    ];
    public function section(){
        return $this->belongsTo(section::class);
    }
    public function subject(){
        return $this->belongsTo(subject::class);
    }
    public function day(){
        return $this->belongsTo(day::class);
    }
    public function teacher(){
        return $this->belongsTo(teacher::class);
    }
    public function year()
    {
        return $this->belongsTo(year::class, 'year_id');
    }
   

   
}
