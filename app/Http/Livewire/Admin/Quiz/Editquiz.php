<?php

namespace app\Http\Livewire\Admin\Quiz;

use Livewire\Component;
use App\Models\quiz;
use App\Models\year;
use App\Models\teacher;
use App\Models\section;
use App\Models\User;
use App\Models\sectiontimetable;
use Auth;

class Editquiz extends Component

{
    public $title;
    public $year;
    public $teacher;
    public $section;
    public $no_of_questions;
    public $subjective_questions;
    public $objective_questions;
    public $total_marks;
    public $pass_marks_percentage;
    public $subject;
    public $sections = [];
    public $teachers = [];

    public function render()
    {
        $branchId = Auth::user()->branch_id;
        $years = year::where('branch_id', $branchId)->orderbt('id', 'desc')->get();
        $sectiontimetable = sectiontimetable::orderby('id','desc')->get();
        $teachers = teacher::orderby('id','asc')->get();

        return view('livewire.admin.quiz.editquiz', compact('years', 'sectiontimetable','teachers'))->layout('Layouts.app');
    }

    public function getsection()
    {
        $this->sections = section::where('year_id',$this->year)->get();
    }


    public function getteacher()
    {
        $this->teachers = section::where('year_id',$this->teacher)->get();
    }
    
    public function mount($id)
    {
        $this->quiz = quiz::find($id);
        $this->quiz_id=$this->quiz->id;
        $this->title=$this->quiz->title;
        $this->no_of_questions = $this->quiz->no_of_questions;
        $this->subjective_questions = $this->quiz->subjective_questions;
        $this->objective_questions = $this->quiz->objective_questions;
        $this->total_marks = $this->quiz->total_marks;
        $this->pass_marks_percentage = $this->quiz->pass_marks_percentage;
        $this->teacher_id = $this->quiz->teacher;
        $this->subject_id = $this->quiz->subject;
        $this->section = $this->quiz->section;
        $this->class_id = $this->quiz->year;
    }

protected $rules = [
    'title' => 'required',
    'year' => 'required',
    'section' => 'required',
    'teacher' => 'required',
    'no_of_questions' => 'required',
    'subjective_questions' => 'required',
    'objective_questions' => 'required',
    'total_marks' => 'required',
    'pass_marks_percentage' => 'required',
    'subject' => 'required',
];

public function resetInputFields()
    {
        $this->title ="";
        $this->year ="";
        $this->teacher ="";
        $this->section ="";
        $this->no_of_questions ="";
        $this->subjective_questions ="";
        $this->objective_questions ="";
        $this->pass_marks_percentage ="";
        $this->subject ="";
    }


    public function update($id)
    { 
        $this->validate();
        $quiz=quiz::find($id);
        $quiz->id = $this->quiz_id;
        $quiz->title = $this->title;
        $quiz->class_id = $this->year;
        $quiz->teacher_id = $this->teacher;
        $quiz->section_id = $this->section;
        $quiz->no_of_questions = $this->no_of_questions;
        $quiz->subjective_questions = $this->subjective_questions;
        $quiz->objective_questions = $this->objective_questions;
        $quiz->pass_marks_percentage = $this->pass_marks_percentage;
        $quiz->subject_id = $this->subject;
        $quiz->save();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Quiz Edit Successfully!', 
            // 'text' => 'If deleted, you will not be able to recover this imaginary file!'
        ]);

        $this->resetInputFields();
    }
 
}