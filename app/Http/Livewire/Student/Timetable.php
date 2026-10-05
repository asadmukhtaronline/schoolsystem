<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;
use App\Models\section;
use App\Models\sectiontimetable;
use App\Models\student;
use App\Models\day;
use App\Models\timeslot;
use Auth;

class Timetable extends Component
{
    public function render()
    {
        $user = Auth::user();
        
        if ($user && $user->student) {
            $sectionId = $user->student->section_id;

            $section = section::find($sectionId);

        } else {
            $section = null;
        }
        
        $days = day::orderBy('id')->get();
        $timeslots = timeslot::orderBy('id')->get();
        $sectiontimetable = sectiontimetable::where('section_id', $sectionId)
        ->where('year_id', $section->year_id)
        ->get();
        return view('livewire.student.timetable', compact('days', 'timeslots', 'section', 'sectiontimetable'))->layout('Layouts.app');
    }

}