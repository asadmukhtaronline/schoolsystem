<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stuquiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'enrollment_id', // Add this line
        'quiz_id',
        'marks',
        'status',
        // Add other fillable attributes here
    ];
    public function quiz(){
        return $this->belongsTo(quiz::class);
    }
    public function enrollment(){
        return $this->belongsTo(enrollment::class);
    }
}
