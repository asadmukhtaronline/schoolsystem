<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GeneralSetting;

class complain extends Model
{
    use HasFactory;

    protected $fillable  = [
        'tracker', 'title', 'category', 'description', 'file', 'status'
    ];

    public function ticket()
    {
        return $this->belongsTo(ticket::class);
    }
}
