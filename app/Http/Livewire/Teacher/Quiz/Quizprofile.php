<?php

namespace App\Http\Livewire\Teacher\Quiz;

use Livewire\Component;
use App\Models\quiz;
use App\Models\question;
use App\Models\quizanswer;

class Quizprofile extends Component
{
    public $quiz;
    public $filter = 'Objective';
    public $delete_id;
    public $due_date;

    protected $listeners = ['deletequestion'];

    public function mount($id)
    {
        $this->quiz = Quiz::find($id);
        $this->due_date = $this->quiz->due_date;
    }

    public function setFilter($filter)
    {
        $this->filter = $filter;
        $this->render();
    }

    public function deletequestion()
    {
        $question = question::find($this->delete_id);

        if ($question) {
            quizanswer::where('question_id', $this->delete_id)->delete();
            $question->delete();
        }

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Question Deleted Successfully!',
            'text' => 'The question has been deleted successfully.'
        ]);

        $this->render();
    }

    public function alertConfirm($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('swal:confirmquestion', [
            'type' => 'warning',
            'message' => 'Are you sure?',
            'text' => 'If deleted, you will not be able to recover this question!'
        ]);
    }
    public function confirmExtendDate()
    {
        $this->dispatchBrowserEvent('swal:confirmextenddate', [
            'type' => 'warning',
            'message' => 'Are you sure?',
            'text' => 'You are about to extend the due date. Do you want to proceed?'
        ]);
    }
    
    public function extendDate($id)
    {
        $quiz = quiz::find($id);
        $quiz->due_date = $this->due_date;
        $quiz->save();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Date Extended Successfully!',
            'text' => 'The due date has been updated successfully.'
        ]);
    } 
    public function confirmToggleStatus()
{
    $this->dispatchBrowserEvent('swal:confirmtogglestatus', [
        'type' => 'warning',
        'message' => 'Are you sure?',
        'text' => 'You are about to change the quiz status. Do you want to proceed?'
    ]);
}

    public function toggleQuizStatus()
    {
        $this->quiz->status = $this->quiz->status === 'open' ? 'closed' : 'open';
        $this->quiz->save();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Quiz Status Updated!',
            'text' => 'The quiz status has been updated successfully.'
        ]);
    }
    



    public function render()
{
    $questions = question::where('question_category', $this->filter)
                        ->where('quiz_id', $this->quiz->id)
                        ->get();

    foreach ($questions as $question) {
        $question->answers = quizanswer::where('question_id', $question->id)->get();
    }

    return view('livewire.teacher.quiz.quizprofile', [
        'questions' => $questions,
        'quiz_status' => $this->quiz->status, // Pass the quiz status
    ])->layout('Layouts.app');
}

}
