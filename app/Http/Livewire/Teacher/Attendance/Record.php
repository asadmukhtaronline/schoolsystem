<?php

namespace App\Http\Livewire\Teacher\Attendance;

use Livewire\Component;
use App\Models\year;
use App\Models\section;
use App\Models\Attendence;
use Auth;

class Record extends Component
{
    public $year;
    public $sections = [];
    public $section;
    public $attendance = [];
    public $date;
    
    protected $rules = [
        'year' => 'required',
        'section' => 'required',
        'date' => 'required|date',
    ];

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
        $attendance = $this->attendance;

        return view('livewire.teacher.attendance.record', compact('years', 'section', 'attendance', 'teacherName'))->layout('Layouts.app');
    }

    public function getsection()
    {
        $teacherId = Auth::user()->teacher->id;

        if ($this->year) {
            $this->sections = section::where('year_id', $this->year)
                ->where('teacher_id', $teacherId)
                ->orderby('id', 'asc')->get();

            // dd($this->year);
        } else {
            $this->sections = [];
        }
    }

    public function getrecord()
    { 
        $this->attendance = Attendence::whereDate('current_date', $this->date)
            ->where('year_id', $this->year)
            ->where('section_id', $this->section)
            ->get();
    }

    public function search()
    {
        $this->validate();

        $this->attendance = Attendence::where('year_id', $this->year)
            ->where('section_id', $this->section)
            ->where('current_date', $this->date)
            ->with('student')
            ->orderby('id', 'asc')
            ->get();
    }
}
