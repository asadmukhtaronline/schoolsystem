<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staf extends Model
{
    use HasFactory;
    public function staffcategory()
    {    
        return $this->belongsTo(staffcategory::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
