<?php

namespace App\Http\Livewire\Teacher\Quiz;


use Auth;
use Livewire\Component;
use App\Models\quiz as quizzes;
use App\Models\sectiontimetable;
use App\Models\section;
use App\Models\teacher;
use App\Models\year;
use App\Models\enrollment;
use App\Models\stuquiz;
use App\Models\question;
use App\Models\assignsubject;
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
    public $years = [];
    public $sections = [];
    public $assignsubjects = [];

    public function mount()
    {
        $this->years = sectiontimetable::where('teacher_id', Auth::user()->teacher->id)
            ->with('year')
            ->get()
            ->pluck('year')
            ->unique('id')
            ->values()
            ->all(); // Convert the collection to an array
    }

    public function getsection()
    {
        $this->sections = sectiontimetable::where('teacher_id', Auth::user()->teacher->id)
            ->where('year_id', $this->year)
            ->with('section')
            ->get()
            ->pluck('section')
            ->unique('id')
            ->values()
            ->all(); // Convert the collection to an array
        
        // Fetch subjects after sections are fetched
        $this->getsubject();
    }

    public function render()
    {
        return view('livewire.teacher.quiz.createquiz')->layout('Layouts.app');
    }

    public function getsubject()
    {
        $this->assignsubjects = sectiontimetable::where('teacher_id', Auth::user()->teacher->id)
            ->where('year_id', $this->year)
            ->where('section_id', $this->section)
            ->with('subject')
            ->get()
            ->pluck('subject')
            ->unique('id')
            ->values()
            ->all(); // Convert the collection to an array
    }

    public function updatedSection($value)
    {
        $this->getsubject();
    }

    protected $rules = [
        'title' => 'required',
        'year' => 'required',
        'section' => 'required',
        'no_of_questions' => 'required',
        'subjective_questions' => 'required',
        'objective_questions' => 'required',
        'total_marks' => 'required',
        'pass_marks_percentage' => 'required',
        'subject' => 'required',
        'description' => 'required',
        'due_date' => 'required',
    ];

    public function save()
    {
        $this->validate();
        $quiz = new quizzes;
        $quiz->title = $this->title;
        $quiz->class_id = $this->year;
        $quiz->section_id = $this->section;
        $quiz->teacher_id = Auth::user()->teacher->id;
        $quiz->description = $this->description;
        $quiz->due_date = $this->due_date; 
        $quiz->no_of_questions = $this->no_of_questions;
        $quiz->subjective_questions = $this->subjective_questions;
        $quiz->objective_questions = $this->objective_questions;
        $quiz->total_marks = $this->total_marks;
        $quiz->pass_marks_percentage = $this->pass_marks_percentage;
        $quiz->subject_id = $this->subject;
        $quiz->save();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Quiz Save Successfully!', 
        ]);
        return redirect()->route('teacher.question', ['id' => $quiz->id]);

        $this->reset([
            'title', 'year', 'section', 'no_of_questions', 'subjective_questions', 'objective_questions', 'total_marks', 'pass_marks_percentage','subject','due_date','description'
        ]);

        $enrollments = Enrollment::where('year_id', $this->year)
            ->where('section_id', $this->section)
            ->get();

        if ($enrollments->isEmpty()) {
            session()->flash('error', 'No enrollments found for the selected year and section.');
            return;
        }

        foreach ($enrollments as $enrollment) {
            $stuquiz = new stuquiz;
            $stuquiz->enrollment_id = $enrollment->id;
            $stuquiz->quiz_id = $quiz->id;
            $stuquiz->class_id = $quiz->class_id;
            $stuquiz->section_id = $quiz->section_id;
            $stuquiz->subject_id = $quiz->subject_id;
            $stuquiz->save();
        }

       
    }
}
