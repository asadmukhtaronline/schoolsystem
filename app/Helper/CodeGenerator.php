<?php

namespace App\Helper;

use App\Models\GeneralSetting;

class CodeGenerator
{
    public static function generateUniqueCode($name)
    {
        
        $initials = collect(explode(' ', $name))->map(function ($word) {
            return strtoupper($word[0]);
        })->join('');

        $suffix = 1;
        $code = $initials;
        while (GeneralSetting::where('code', $code)->exists()) {
            $code = $initials . $suffix;
            $suffix++;
        }

        return $code;
    }
}