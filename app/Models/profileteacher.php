<?php

namespace App\Models;
use App\Models\teacherslot;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profileteacher extends Model
{
    use HasFactory;
    public function status(){
        return $this->belongsTo(teacherslot::class);

    }
}
