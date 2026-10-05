<?php

namespace App\Http\Livewire\Teacher;

use Auth;
use Livewire\Component;
use App\Models\section;
use App\Models\year;
use App\Models\teacher;
use App\Models\assignsubject;
use App\Models\assignment;
use App\Models\stussignment;
use App\Models\enrollment;
use App\Models\sectiontimetable;

class Assignments extends Component
{
    public $title;
    public $description;
    public $year;
    public $section;
    public $reference;
    public $due_date;
    public $creator_name;
    public $total_marks;
    public $subject;
    public $years = [];
    public $sections = [];
    public $assignsubjects = [];

    public function mount()
    {
        //   $this->years = sectiontimetable::where('teacher_id',Auth::user()->teacher->id)->groupBy('year_id')->get();
    $this->years = SectionTimetable::where('teacher_id', Auth::user()->teacher->id)
    ->with('year')
    ->get()
    ->pluck('year')
    ->unique('id');
    }
    

    public function getsection(){
        $this->sections = section::where('year_id',$this->year)->get();
        $this->getsubject();
    }
    public function getsubject(){
        $this->assignsubjects = assignsubject::where('year_id', $this->year)->get();

    }
    // public function updatedYear($yearId)
    // {
    //     // Fetch sections related to the selected year
    //     $this->sections = Section::where('year_id', $yearId)->get();
    // }

    public function render()
    {
        $assignsubjects = assignsubject::where('year_id', $this->year)->get();

        return view('livewire.teacher.assignments')->layout('Layouts.app');
    }
     
    protected $rules = [
        'title' => 'required',  
        'year' => 'required',
        'section' => 'required',
        'teacher' => 'required',
        'reference' => 'required',
        'creator_name' => 'required',
        'total_marks' => 'required',
        'due_date' => 'required',
        'subject' => 'required',
    ];
    public function save()
    {
        //    $this->validate();
            $assignment =new  assignment;
            $assignment->title = $this->title;
            $assignment->description = $this->description;
            $assignment->due_date = $this->due_date; 
            $assignment->class_id = $this->year;
            $assignment->section_id = $this->section;
            $assignment->teacher_id = Auth::user()->teacher->id;
            $assignment->reference = $this->reference;
            $assignment->creator_name = Auth::user()->teacher->name;
            $assignment->total_marks = $this->total_marks;
            $assignment->subject_id = $this->subject;
            $assignment->save();
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Assignment Created Successfully!', 
            ]);
            $enrollments = enrollment::where('year_id', $this->year)
            ->where('section_id', $this->section)
            ->get();
            if ($enrollments->isEmpty()) {
                session()->flash('error', 'No enrollments found for the selected year and section.');
                return;
            }
            foreach ($enrollments as $enrollment) {
                $stuassignment = new stuassignment;
                $stuassignment->enrollment_id = $enrollment->id;
                $stuassignment->assignment_id = $assignment->id;
                $stuassignment->class_id = $assignment->class_id;
                $stuassignment->section_id = $assignment->section_id;
                $stuassignment->subject_id = $assignment->subject_id;
                $stuassignment->marks = $assignment->total_marks;
                $stuassignment->due_date = $assignment->due_date;
                $stuassignment->save();

            }
               
        }
}
