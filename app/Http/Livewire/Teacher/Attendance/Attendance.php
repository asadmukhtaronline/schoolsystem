<?php

namespace App\Http\Livewire\Teacher\Attendance;

use Livewire\Component;
use App\Models\year;
use App\Models\section;
use App\Models\student;
use App\Models\enrollment;
use App\Models\Attendence;
use App\Models\sectiontimetable;
use Carbon\Carbon;
use Auth;

class Attendance extends Component
{
    public $year;
    public $sections = [];
    public $search;
    public $section;
    public $students = [];
    public $current_date;
    public $status = [];

    public function render()
    {
        $teacherId = Auth::user()->teacher->id;
        $teacherName = Auth::user()->teacher->name;
        $years = year::whereIn('id', function ($query) use ($teacherId) {
            $query->select('year_id')
                ->from('sections')
                ->where('teacher_id', $teacherId);
        })->orderby('id', 'asc')->get();

        $section = $this->section;
        $search = $this->students;
        return view('livewire.teacher.attendance.attendance', compact('years', 'section', 'search', 'teacherName'))->layout('Layouts.app');
    }

    public function getsection()
    {
        $teacherId = Auth::user()->teacher->id;

        if ($this->year) {
            $this->sections = section::where('year_id', $this->year)
            ->where('teacher_id', $teacherId)
            ->orderby('id', 'asc')->get();
        }
    }

    public function search()
    {
        $teacherId = Auth::user()->teacher->id;

        $sectionIds = \App\Models\section::where('teacher_id', $teacherId)
                                        ->pluck('id');

        $this->students = \App\Models\enrollment::where('year_id', $this->year)
            ->whereIn('section_id', $sectionIds)
            ->with('student')
            ->orderBy('id', 'asc')
            ->get();
    }


    public function save()
    {
    $currentDate = Carbon::now()->toDateString();

    foreach ($this->students as $student) {
        $student_id = $student->student_id;

        $existingAttendance = Attendence::where('student_id', $student_id)
            ->where('year_id', $this->year)
            ->where('section_id', $this->section)
            ->whereDate('current_date', $currentDate)
            ->first();

        if ($existingAttendance && $existingAttendance->status == 1) {
            continue;
        }

        if ($existingAttendance) {
            $existingAttendance->status = isset($this->status[$student_id]) ? $this->status[$student_id] : 0;
            $existingAttendance->save();
        } else {
            $attendance = new Attendence;
            $attendance->student_id = $student_id;
            $attendance->enrollment_id = enrollment::where('student_id', $student_id)
                ->where('year_id', $this->year)
                ->where('section_id', $this->section)
                ->value('id');
            $attendance->section_id = $this->section;
            $attendance->year_id = $this->year;
            $attendance->status = isset($this->status[$student_id]) ? $this->status[$student_id] : 0;
            $attendance->current_date = $currentDate;
            $attendance->save();
        }
    }

    $this->reset(['status']);

    $this->dispatchBrowserEvent('swal:modal', [
        'type' => 'success',
        'message' => 'Attendance saved Successfully!'
    ]);
}

}
