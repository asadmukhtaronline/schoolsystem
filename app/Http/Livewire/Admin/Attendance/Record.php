<?php

namespace App\Http\Livewire\Admin\Attendance;

use Livewire\Component;
use App\Models\year;
use App\Models\section;
use App\Models\Attendence;
use App\Models\User;
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
        $branchId = Auth::user()->branch_id;
        $years = year::orderby('id', 'asc')->get();
        $section = $this->section;
        $attendance = $this->attendance;
        return view('livewire.admin.attendance.record', compact('years', 'section', 'attendance'))->layout('Layouts.app');
    }

    public function getsection()
    {   
        $branchId = Auth::user()->branch_id;
       // dd($branchId);
        if ($this->year) {
            $this->sections = section::where('year_id', $this->year)
            ->where('branch_id', $branchId)
            ->orderby('id', 'asc')
            ->get();
        }
    }

    public function getrecord()
    { 
        $this->attendance = Attendence::whereDate('current_date', $this->date)->get();
    }

    public function search()
    {
        $branchId = Auth::user()->branch_id;
        $this->validate([
            'year' => 'required',
            'section' => 'required',
            'date' => 'required|date',
        ]);
      //  dd($this->date);
        $this->attendance = Attendence::where('year_id',$this->year)
        ->where('section_id',$this->section)
        ->where('current_date', $this->date)
        ->with('student')
        ->orderby('id', 'asc')
        ->get();
       // dd($this->attendance);
    }

}
