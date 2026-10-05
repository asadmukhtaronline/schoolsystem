<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helper\CodeGenerator;

class GeneralSetting extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($generalSetting) {
            $generalSetting->code = CodeGenerator::generateUniqueCode($generalSetting->name);
        });
    }
}
