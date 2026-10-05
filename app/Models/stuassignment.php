<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stuassignment extends Model
{
    use HasFactory;
    protected $fillable = [
        'enrollment_id',
        'assignment_id',
        'marks',
        'status', // Add status here
    ];

public function year() {
    return $this->belongsTo(year::class);
}
public function section() {
    return $this->belongsTo(section::class);
}
public function enrollment()
{
    return $this->belongsTo(enrollment::class, 'enrollment_id');
}

public function assignment()
{
    return $this->belongsTo(assignment::class, 'assignment_id');
}

public function student()
{
    return $this->hasOneThrough(student::class, enrollment::class, 'id', 'id', 'enrollment_id', 'student_id');
}
}
