<?php

namespace app\Http\Livewire\Admin\Quiz;

use Livewire\Component;
use App\Models\quiz;
use App\Models\sectiontimetable;
use App\Models\section;
use App\Models\teacher;
use App\Models\year;
use App\Models\enrollment;
use App\Models\stuquiz;
use App\Models\question;
use App\Models\assignsubject;
use App\Models\User;
use Auth;

class Createquiz extends Component
{
    public $title;
    public $year;
    public $teacher;
    public $section;
    public $due_date;
    public $description;
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

        $years = year::where('branch_id', $branchId)
        ->orderby('id','asc')
        ->get();

        $assignsubjects = assignsubject::where('year_id', $this->year)->get();

        $teachers = teacher::orderby('id','asc')->get();
        return view('livewire.admin.quiz.createquiz', compact('assignsubjects', 'years', 'teachers'))->layout('Layouts.app');
    }


    public function getsection()
    {
        $this->sections = section::where('year_id',$this->year)->get();
    }


    public function getteacher()
    {
        $this->teachers = section::where('year_id',$this->teacher)->get();
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
        'due_date' => 'required',
        'subject' => 'required',
    ];


    public function save()
    {
        $this->validate();
        $quiz = new quiz;
        $quiz->title = $this->title;
        $quiz->class_id = $this->year;
        $quiz->section_id = $this->section;
        $quiz->teacher_id = $this->teacher;
        $quiz->description = $this->description;
        $quiz->due_date = $this->due_date; 
        $quiz->no_of_questions = $this->no_of_questions;
        $quiz->subjective_questions = $this->subjective_questions;
        $quiz->objective_questions = $this->objective_questions;
        $quiz->total_marks = $this->total_marks;
        $quiz->pass_marks_percentage = $this->pass_marks_percentage;
        $quiz->subject_id = $this->subject;
        $quiz->branch_id = Auth::user()->branch_id;
        $quiz->save();
        
        $enrollments = enrollment::where('year_id', $this->year)
            ->where('section_id', $this->section)
            ->get();

            foreach ($enrollments as $enrollment) {
                $stuquiz = new stuquiz;
                $stuquiz->enrollment_id = $enrollment->id;
                $stuquiz->quiz_id = $quiz->id;
                $stuquiz->class_id = $quiz->class_id;
                $stuquiz->section_id = $quiz->section_id;
                // $stuquiz->marks = $quiz->total_marks;
                // $stuquiz->status = '1';
                $stuquiz->subject_id = $quiz->subject_id;
                $stuquiz->save();
            }
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Quiz Save Successfully!', 
        ]);
       return redirect()->route('admin.question', ['id' => $quiz->id]);
    }
}
