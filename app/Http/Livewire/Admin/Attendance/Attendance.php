<?php

namespace App\Http\Livewire\Admin\Attendance;

use Livewire\Component;
use App\Models\year;
use App\Models\section;
use App\Models\student;
use App\Models\enrollment;
use App\Models\Attendence;
use App\Models\User;
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

    public function getsection()
    {
        $branchId = Auth::user()->branch_id;

        if ($this->year) {
            $this->sections = section::where('year_id', $this->year)
            ->where('branch_id', $branchId)
            ->orderby('id', 'asc')
            ->get();
        }
    }

    public function search()
    {
        $this->students = enrollment::
        where('year_id',$this->year)
        ->where('section_id',$this->section)
        ->with('student')
        ->orderby('id', 'asc')
        ->get();
    }

    public function save()
    {
        $branchId = Auth::user()->branch_id;
        $currentDate = Carbon::now()->toDateString();

        foreach ($this->students as $student) {
            $student_id = $student->student_id;

        $existingAttendance = Attendence::where('student_id', $student_id)
            ->where('branch_id', $branchId)
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

    public function render()
    {
        $years = year::orderby('id', 'asc')->get();
        $section = $this->section;
        $search = $this->students;
        return view('livewire.admin.attendance.attendance',compact('years', 'section', 'search'))->layout('Layouts.app');
    }
}
