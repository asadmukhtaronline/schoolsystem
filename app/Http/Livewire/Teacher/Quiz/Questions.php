<?php

namespace App\Http\Livewire\Teacher\Quiz;
use Auth;
use App\Models\question;
use App\Models\quiz;
use App\Models\quizanswer;

use Livewire\Component;

class Questions extends Component
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
        return view('livewire.teacher.quiz.questions')->layout('Layouts.app');
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

        $question = new question;
        $question->title = $this->title;
        $question->question_category = $this->questionCategory;
        $question->obtained_marks = $this->marks;
        $question->options = $this->options;
        $question->quiz_id = $this->quiz->id;
        $question->save();
        $question_id = $question->id;

        if ($this->questionCategory === 'Objective') {
            foreach ($this->fields as $index => $field) {
                $ans = new quizanswer;
                $ans->title = $this->fields[$index];
                $ans->quiz_id = $this->quiz->id;
                $ans->status = $this->selectedOptions[$index];
                $ans->question_id = $question_id;
                $ans->save();
            }
        }

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Quiz Saved Successfully!',
        ]);
        return redirect()->route('teacher.quizprofile', ['id' => $this->quiz->id]);


    }
    
}
