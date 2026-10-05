<?php

namespace App\Http\Livewire\Admin\Quiz;

use Livewire\Component;
use App\Models\question;
use App\Models\quiz;
use App\Models\quizanswer;
use App\Models\User;
use Auth;

class Quizquestion extends Component
{
    public $title;
    public $questionCategory;
    public $marks;
    public $options;
    public $fields = [];
    public $quiz;
    public $selectedOptions = [];

    protected $rules = [
        'title' => 'required',
        'questionCategory' => 'required',
        'marks' => 'required',
        'options' => 'required_if:questionCategory,Objective',
        'fields.*' => 'required_if:questionCategory,Objective',
        'selectedOptions' => 'required_if:questionCategory,Objective',
    ];

    public function render()
    {
        $branchId = Auth::user()->branch_id;
        return view('livewire.admin.quiz.quizquestion')->layout('Layouts.app');
    }

    public function mount($id)
    {
        $this->quiz = quiz::find($id);
    }

    public function updated($propertyName)
    {
        if ($propertyName === 'options') {
            $this->options = (int)$this->options;
            $this->fields = array_fill(0, $this->options, '');
            $this->selectedOptions = array_fill(0, $this->options, 0);
        } elseif ($propertyName === 'questionCategory' && $this->questionCategory === 'Subjective') {
            $this->options = 0;
            $this->fields = [];
            $this->selectedOptions = [];
        } elseif ($propertyName === 'questionCategory' && $this->questionCategory === 'Objective') {
            $this->options = 1;
            $this->fields = [''];
            $this->selectedOptions = [0];
        }
    }

    public function selectOption($index)
    {
        $this->selectedOptions = array_fill(0, count($this->selectedOptions), 0);
        $this->selectedOptions[$index] = 1;
    }

    public function save()
    {
        $this->validate();
        $quiz = quiz::find($this->quiz->id)->questions;
        $question_no = $quiz->count() + 1;
        $question = new question;
        $question->title = $this->title;
        $question->question_category = $this->questionCategory;
        $question->obtained_marks = $this->marks;
        $question->options = $this->options;
        $question->question_no = $question_no;
        $question->quiz_id = $this->quiz->id;
        $question->branch_id = Auth::user()->branch_id;
        $question->save();
        $question_id = $question->id;

        if ($this->questionCategory === 'Objective') {
            foreach ($this->fields as $index => $field) {
                $ans = new quizanswer;
                $ans->title = $this->fields[$index];
                $ans->quiz_id = $this->quiz->id;
                $ans->status = $this->selectedOptions[$index];
                $ans->question_id = $question_id;
                $ans->branch_id = Auth::user()->branch_id;
                $ans->save();
            }
        }

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Quiz Saved Successfully!',
        ]);

        return redirect()->route('admin.quizprofile', ['id' => $this->quiz->id]);
    }
}
