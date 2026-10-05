<?php

namespace app\Http\Livewire\Admin\Quiz;

use App\Models\quiz;
use App\Models\question;
use App\Models\quizanswer;
use App\Models\stuquiz;
use Livewire\Component;

class FetchQuiz extends Component

{
    public $quizzes = [];
    public $searchquiz;
    public function render()
    {
        return view('livewire.admin.quiz.fetchquiz')->layout('Layouts.app');
    }
    public function mount(){
       $this->quizzes = quiz::orderBy('id', 'asc')->get();
    }
    // for search ..
    public function searchquizes() {
        $isMainAdmin = Auth::user()->is_admin;
        $branchId = Auth::user()->branch_id;
        $searchTerm = '%' . $this->searchquiz . '%';
    
        if ($isMainAdmin) {
            // Main admin can search all quizzes across all branches
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
        } else {
            // Non-admins (or sub-branch users) can only search quizzes in their own branch
            $this->quizzes = Quiz::where('branch_id', $branchId)
                ->where(function($query) use ($searchTerm) {
                    $query->where('title', 'like', $searchTerm)
                          ->orWhereHas('class', function($query) use ($searchTerm) {
                              $query->where('title', 'like', $searchTerm);
                          })
                          ->orWhereHas('teacher', function($query) use ($searchTerm) {
                              $query->where('name', 'like', $searchTerm);
                          })
                          ->orWhereHas('subject', function($query) use ($searchTerm) {
                              $query->where('title', 'like', $searchTerm);
                          });
                })
                ->orderBy('id', 'desc')
                ->get();
        }
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
