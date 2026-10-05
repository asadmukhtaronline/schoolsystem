<?php

namespace app\Http\Livewire\Admin\Quiz;

use Livewire\Component;
use App\Models\quiz;
use App\Models\question;
use App\Models\quizanswer;
// use App\Models\Enrollment;

class Profilequiz extends Component
{
    public $quiz;
    public $filter = 'Objective';
    public $due_date;
    public $delete_id;
    // public $enrollments = [];

    protected $listeners = ['deletequestion'];

    public function mount($id)
    {
        $this->quiz = Quiz::find($id);
        // $this->getEnrollments();
    }

    public function setFilter($filter)
    {
        $this->filter = $filter;
        $this->render(); // Refresh the component
    }

    public function deletequestion()
    {
        $question = question::find($this->delete_id);

        if ($question) {
            // Delete corresponding answers
            quizanswer::where('question_id', $this->delete_id)->delete();
            // Delete the question
            $question->delete();
        }
        
        // Dispatch a success message
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Question Deleted Successfully!',
            'text' => 'The question has been deleted successfully.'
        ]);

        // Refresh the component to update the list of questions
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
    public function confirmToggleStatus() {
        $this->dispatchBrowserEvent('swal:confirmtogglestatus', [
            'type' => 'warning',
            'message' => 'Are you sure?',
            'text' => 'You are about to change the quiz status. Do you want to proceed?'
        ]);
    }

    public function toggleQuizStatus()
    {
        if($this->quiz->status == 1){
            $this->quiz->status = 0;    
        } else {
            $this->quiz->status = 1;
        }
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

        return view('livewire.admin.quiz.profilequiz', [
            'questions' => $questions,
            // 'enrollments' => $this->enrollments,
            'quiz_status' => $this->quiz->status, // Pass the quiz status

        ])->layout('Layouts.app');
    }

    public function deleteQuiz($id)
    {
        $quiz = quiz::find($id);

        if ($quiz) {
            foreach ($quiz->questions as $question) {
                foreach ($quiz->quizanswers as $quizanswer) {
                    $quizanswer->delete();
                }

                $question->delete();
            }

            $quiz->delete();
        }
    }
}
