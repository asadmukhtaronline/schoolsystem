<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profilestaff extends Model
{
    use HasFactory;
    public function stafcategory()
    {    
        return $this->belongsTo(staffcategory::class);
    }
}
