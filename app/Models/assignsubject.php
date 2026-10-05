<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assignsubject extends Model
{
    use HasFactory;
    protected $fillable = ['year_id', 'subject_id', 'section_id'];

    public function year()
    {
        return $this->belongsTo(year::class);
    }

    public function subject()
    {
        return $this->belongsTo(subject::class);
    }

    public function section()
    {
        return $this->belongsTo(section::class);
    }
}
