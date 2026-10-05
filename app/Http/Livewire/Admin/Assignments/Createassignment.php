<?php

namespace app\Http\Livewire\Admin\Assignments;

use Livewire\Component;
use App\Models\assignment;
use App\Models\sectiontimetable;
use App\Models\section;  
use App\Models\teacher;
use App\Models\User;
use App\Models\year;
use App\Models\question;
use App\Models\enrollment;
use App\Models\assignsubject;
use App\Models\stuassignment;
use App\Models\student;
use Illuminate\Support\Facades\Mail;
use App\Mail\Emailassignment;
use App\Mail\Studentassignmentemail;
use Auth;

class Createassignment extends Component
{
    public $title;
    public $description;
    public $year;
    public $teacher;
    public $section;
    public $reference;
    public $due_date;
    public $creator_name;
    public $total_marks;
    public $subject;
    public $sections = [];
    public $teachers = [];

    public function render()
    {
        $branchId = Auth::user()->branch_id;
        $assignsubjects = assignsubject::where('year_id', $this->year)->get();
        $years = year::orderby('id','asc')->get();
        $teachers = teacher::orderby('id','asc')->get();
        return view('livewire.admin.assignments.createassignment', compact('assignsubjects', 'years', 'teachers'))->layout('Layouts.app');
    }

    public function getsection(){
        $this->sections = section::where('year_id',$this->year)->get();
    }

    public function getteacher(){
        $this->teachers = section::where('year_id',$this->teacher)->get();
    }
    
    protected $rules = [
        'title' => 'required',  
        'year' => 'required',
        'section' => 'required',
        'teacher' => 'required',
        'description' => 'required',
        'creator_name' => 'required',
        'total_marks' => 'required',
        'due_date' => 'required',
        'subject' => 'required',
    ];

    public function save()
    {
        //$this->validate();
        $assignment = new  assignment;
        $assignment->title = $this->title;
        $assignment->description = $this->description;
        $assignment->due_date = $this->due_date; 
        $assignment->class_id = $this->year;
        $assignment->section_id = $this->section;
        $assignment->teacher_id = $this->teacher;
        $assignment->reference = $this->reference;
        $assignment->creator_name = Auth::user()->name;
        // $assignment->created_by = 'admin';
        $assignment->total_marks = $this->total_marks;
        $assignment->subject_id = $this->subject;
        $assignment->branch_id = Auth::user()->branch_id;
        $assignment->save();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Assignment Created Successfully!', 
        ]);
            $teacher = Teacher::find($this->teacher);

        // Additional code in save() method
            $section = section::find($this->section);
            $year = year::find($this->year);

        // Mail::to($teacher->email)->send(new Emailassignment($teacher->name, $assignment, $year->title, $section->title));

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
            // $stuassignment->marks = $assignment->total_marks;
            $stuassignment->due_date = $assignment->due_date;
            $stuassignment->save();
        }

        $student = student::find($enrollment->student_id);
        // Mail::to($student->email)->send(new Studentassignmentemail($student->name,$assignment, $year->title, $section->title));  
        return redirect(route('admin.assignment'));
    }
}