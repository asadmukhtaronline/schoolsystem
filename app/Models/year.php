<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class year extends Model
{
    use HasFactory;

    public function subjects()
    {
        return $this->hasMany(subject::class);
    }
    public function assignsubject()
    {
        return $this->hasMany(assignsubject::class,'year_id');
    }
    public function enrollment()
    {
        return $this->hasMany(enrollment::class);
    }

    public function sections()
    {
        return $this->hasMany(section::class);
    }
    public function students()
    {
        return $this->hasMany(student::class, 'year_id');
    }
    public function sectiontimetables()
    {
        return $this->hasMany(sectiontimetable::class);
    }
}
