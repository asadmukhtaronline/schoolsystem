<?php

namespace App\Http\Livewire\Teacher;

use Livewire\Component;
use App\Models\day;
use App\Models\timeslot;
use App\Models\sectiontimeslot;
use App\Models\section;
use App\Models\sectiontimetable;
use Auth;

class Timetable extends Component
{
    public $year;
    
    public function render()
    {
        $teacherId = Auth::user()->teacher->id;
        $teacherName = Auth::user()->teacher->name;

        $days = day::orderby('id')->get();
        $timeslots = timeslot::orderby('id')->get();

        // Retrieve section timeslots with associated section timetables and subjects
        $sectiontimeslots = sectiontimeslot::with(['sectiontimetable.subject', 'sectiontimetable.teacher', 'sectiontimetable.year'])
            ->whereHas('sectiontimetable', function($query) use ($teacherId) {
                $query->where('teacher_id', $teacherId);
            })
            ->get()
            ->groupBy('day_id')
            ->map(function ($items) {
                return $items->keyBy('timeslot_id');
            });

        return view('livewire.teacher.timetable', compact('days', 'timeslots', 'sectiontimeslots', 'teacherName'))->layout('Layouts.app');
    }
}
