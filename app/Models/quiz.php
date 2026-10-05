<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quiz extends Model
{
    use HasFactory;
    public function subject(){
        return $this->belongsTo(subject::class);
    }
    public function class()
    {
        return $this->belongsTo(year::class);
    }
    public function teacher(){
        return $this->belongsTo(teacher::class);
    }
    public function section()
    {
        return $this->belongsTo(section::class);
    }
    public function questions(){
        return $this->hasMany(question::class);
    }

    public function quizanswers()
    {
        return $this->hasMany(quizanswer::class);
    }
    public function stuquiz(){
        return $this->hasMany(stuquiz::class);
    }
}
