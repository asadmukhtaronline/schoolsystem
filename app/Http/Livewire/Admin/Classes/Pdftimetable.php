<?php

namespace app\Http\Livewire\Admin\Classes;
use App\Models\teacher;
use App\Models\teacherslot;
use App\Models\timeslot;
use App\Models\day;
use App\Models\section;
use App\Models\year;
use App\Models\sectiontimetable;
use App\Models\sectiontimeslot;
use App\Models\User;
use PDF;
use Auth;

use Livewire\Component;

class Pdftimetable extends Component
{
    public $year;
    public $section;
    public $sectiontimetable;
    public $teacher;

    public function render()
    {
        $branchId = Auth::user()->branch_id;
        $days = day::orderBy('id')->get();
        $timeslots = timeslot::orderBy('id')->get();

        $sectiontimetable = sectiontimetable::where('branch_id', $branchId)
        ->where('section_id', $this->section)
        ->where('year_id', $this->year)
        ->where('teacher_id', $this->teacher)
        ->get();

        return view('livewire.admin.classes.pdftimetable', [
            'days' => $days,
            'sectiontimetable' => $sectiontimetable,
            'timeslots' => $timeslots,
        ])->layout('Layouts.app');  
    }

    public function mount($id)
    {
        $branchId = Auth::user()->branch_id;

        $this->section = section::find($id);
        $sectiontimetable = sectiontimetable::where('section_id', $id)
        ->where('branch_id', $branchId)
        ->where('year_id', $this->section->year_id)
        ->where('teacher_id', $this->section->teacher_id)
        ->get();
    }
    

    public function generatePDF()
    {
        $pdf = PDF::loadView('livewire.admin.classes.pdftimetable', [
            'days' => day::orderBy('id')->get(),
            'timeslots' => timeslot::orderBy('id')->get(),
            'section' => $this->section,
            'sectiontimetable' => $this->sectiontimetable,
        ]);

        $pdf->setPaper('a4', 'landscape');
    
        $pdf->save(storage_path('app/public/timetable.pdf'));
    
        if (file_exists(storage_path('app/public/timetable.pdf'))) {
            return response()->download(storage_path('app/public/timetable.pdf'), 'timetable.pdf');
        } else {
            return response()->json(['message' => 'Download failed']);
        }
    }
    
}
