<?php

namespace App\Http\Livewire\Teacher\Quiz;
use Auth;
use Livewire\Component;
use App\Models\quiz;
use App\Models\question;
use App\Models\quizanswer;
use App\Models\stuquiz;

class Allquiz extends Component
{
    public function render()
    {
        $quizzes=quiz::where('teacher_id',Auth::user()->teacher->id)->get();

        return view('livewire.teacher.quiz.allquiz',compact('quizzes'))->layout('Layouts.app');
    }
   
     // for search ..
     public function searchquizes()
     {
         $searchTerm = '%'.$this->searchquiz.'%';
 
         $this->quizzes = Quiz::where('title', 'like', $searchTerm)
             ->orWhereHas('class', function($query) use ($searchTerm) {
                 $query->where('title', 'like', $searchTerm);
             })
             ->orWhereHas('teacher', function($query) use ($searchTerm) {
                 $query->where('name', 'like', $searchTerm);
             })
             ->orWhereHas('subject', function($query) use ($searchTerm) {
                 $query->where('title', 'like', $searchTerm);
             })
             ->orderBy('id', 'desc')
             ->get();
     }
 
     public $delete_id;
     protected $listeners = ['deletequiz'];
 
     public function deletequiz()
     {
         $quiz = quiz::find($this->delete_id);
         if ($quiz) {
             // Delete related stuquizzes
             $stuquizzes = stuquiz::where('quiz_id', $quiz->id)->get();
             foreach ($stuquizzes as $stuquiz) {
                 $stuquiz->delete();
             }
 
             // Delete related quizanswers and questions
             $questions = question::where('quiz_id', $quiz->id)->get();
             foreach ($questions as $question) {
                 $quizanswers = quizanswer::where('question_id', $question->id)->get();
                 foreach ($quizanswers as $quizanswer) {
                     $quizanswer->delete();
                 }
                 $question->delete();
             }
 
             // Delete the quiz
             $quiz->delete();
 
             $this->dispatchBrowserEvent('swal:modal', [
                 'type' => 'success',
                 'message' => 'Quiz and all related data deleted successfully!',
                 'text' => 'All associated questions, options, and answers have been permanently deleted.'
             ]);
         } else {
             $this->dispatchBrowserEvent('swal:modal', [
                 'type' => 'error',
                 'message' => 'Quiz Not Found!',
                 'text' => 'The quiz you are trying to delete does not exist.'
             ]);
         }
     }
 
     public function alertConfirm($id)
     {
         $this->delete_id = $id;
         $this->dispatchBrowserEvent('swal:confirmquiz', [
             'type' => 'warning',
             'message' => 'Are you sure?',
             'text' => 'If deleted, you will not be able to recover this imaginary file!'
         ]);
     }
    
}
