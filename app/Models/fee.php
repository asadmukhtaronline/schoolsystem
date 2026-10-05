<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fee extends Model
{
    use HasFactory;
    public function enrollment(){
        return $this->belongsTo(enrollment::class);
    }
    public function student(){
        return $this->belongsTo(student::class);
    }
    public function year(){
        return $this->belongsTo(year::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($fee) {
            $fee->order_id = self::generateOrderId();
        });
    }

    public static function generateOrderId()
    {
        $lastFee = self::orderBy('id', 'desc')->first();
        $lastOrderId = $lastFee ? intval($lastFee->order_id) : 0;
        return str_pad($lastOrderId + 1, 4, '0', STR_PAD_LEFT); // 00001, 00002, etc.
    }
}
