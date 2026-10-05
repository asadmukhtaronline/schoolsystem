<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\GeneralSetting;

class enrollment extends Model
{
    use HasFactory;
    public function student(){
        return $this->belongsTo(student::class);
    }
    public function quiz(){
        return $this->belongsTo(quiz::class);
    }

    public function year(){
        return $this->belongsTo(year::class);
    }
    public function section(){
        return $this->belongsTo(section::class);
    }
    
    public function fees(){
        return $this->hasMany(fee::class);
    }
    public function assignment()
    {
        return $this->hasMany(assignment::class);
    }
    
    public function school()
    {
        return $this->belongsTo(GeneralSetting::class);
    }
    public function stuquiz()
    {
        return $this->hasMany(stuquiz::class);
    }
    public function stuassignment()
    {
        return $this->hasMany(stuassignment::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($enrollment) {
            $enrollment->rollnumber = self::generateRollNumber($enrollment);
        });
    }

    protected static function generateRollNumber($enrollment)
    {
        $general_settings = GeneralSetting::first();

        if (!$general_settings) {
            throw new \Exception("School not found.");
        }

        //When there is relation of enrollment built with school
        // $schoolCode = $enrollment->general_settings->code;

        $schoolCode = $general_settings->code;

        $yearTitle = $enrollment->year->title;
        // Check if the year title is not empty
        if (empty($yearTitle)) {
            throw new \Exception("Class cannot be empty.");
        }
 
        $initials = collect(explode(' ', $yearTitle))
                    ->filter(function ($word) {
                        return !empty($word);  // Ensure the word is not empty
                    })
                    ->map(function ($word) {
                        return strtoupper(substr($word, 0, 1));
                    })
                    ->join('');

        $rollNumberPrefix = strtoupper(substr($schoolCode, 0, 3));
        $rollNumber = $rollNumberPrefix . "-" . $initials;

        return DB::transaction(function () use ($rollNumber) {
            $latestRollNumber = self::where('rollnumber', 'like', $rollNumber . '%')
                                    ->orderBy('rollnumber', 'desc')
                                    ->lockForUpdate()
                                    ->value('rollnumber');

            if ($latestRollNumber) {
                $lastSuffix = (int) substr($latestRollNumber, strlen($rollNumber) +1);
                $suffix = $lastSuffix + 1;
            } else {
                $suffix = 1;
            }

           // $suffix = str_pad($suffix, 4, '0', STR_PAD_LEFT);

            return $rollNumber ."-". $suffix;
        });
    }
}
