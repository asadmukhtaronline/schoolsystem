<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sectiondetail extends Model
{
    use HasFactory;

    public function subject(){
        return $this->belongsTo(subject::class);
    }  
}
