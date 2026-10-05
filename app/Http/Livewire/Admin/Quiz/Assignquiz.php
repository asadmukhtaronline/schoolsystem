<?php

namespace App\Http\Livewire\Admin\Quiz;

use Livewire\Component;
use App\Models\quiz;
use App\Models\enrollment;
use App\Models\stuquiz;

class Assignquiz extends Component
{
    public $quiz;
    public $enrollments = [];
    public $marks = [];
    public $total_marks;

    protected $rules = [
        'marks.*' => 'numeric|min:0|max:100', // Validation rules for marks
    ];

    public function mount($id)
    {
        $this->quiz = quiz::find($id);
    }

    // public function getEnrollments()
    // {
    //     $this->enrollments = enrollment::with(['student', 'stuquiz' => function ($query) {
    //         $query->where('quiz_id', $this->quiz->id);
    //     }])
    //     ->where('year_id', $this->quiz->class_id)
    //     ->where('section_id', $this->quiz->section_id)
    //     ->get();

    //     // Initialize marks array with enrollment id keys
    //     foreach ($this->enrollments as $enrollment) {
    //         $this->marks[$enrollment->id] = $enrollment->stuquiz ? $enrollment->stuquiz->marks : null;
    //     }
    // }

    public function saveSingleMarks($enrollmentId)
    {
        $this->validateOnly('marks.' . $enrollmentId);

        $stuquiz = stuquiz::where('enrollment_id', $enrollmentId)
                          ->where('quiz_id', $this->quiz->id)
                          ->first();

        if ($stuquiz) {
            $stuquiz->marks = $this->marks[$enrollmentId];
            $stuquiz->status = 1; // Assuming status should be set to 1 indicating submission
            $stuquiz->save();
        }

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Marks are Saved Successfully!', 
        ]);
    }

    public function render()
    {
        return view('livewire.admin.quiz.assignquiz', [
            'enrollments' => $this->enrollments,
            'total_marks' => $this->total_marks,
        ])->layout('Layouts.app');
    }
}
