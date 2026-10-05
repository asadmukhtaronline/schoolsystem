<?php

namespace App\Http\Livewire\Teacher\Assignment;

use Livewire\Component;
use App\Models\assignment;
use App\Models\enrollment;
use App\Models\stuassignment;
use Livewire\WithFileUploads;
class Assignmentprofile extends Component   
{
    use WithFileUploads;

    public $assignment;
    public $assignment_id;
    public $due_date;
    public $enrollments = [];
    public $marks = [];
    public $total_marks;
    public $status;
    public $upload = [];
    public $showExtendDate = true;
    public $obtain;
    protected $rules = [
        'marks.*' => 'numeric|min:0|max:100', // Validation rules for marks
    ];
    public function mount($id)
    {
        $this->assignment = assignment::find($id);
    }
    public function upload($enrollmentId)
    {
        $this->validate([
            "upload.$enrollmentId" => 'file|max:10240' // Validate the specific file
        ]);

        if (isset($this->upload[$enrollmentId])) {
            $file = $this->upload[$enrollmentId];
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid() . '.' . $extension;
            $filePath = $file->storeAs('uploads/assignments/' . $this->assignment_id, $filename, 'public');

            // Ensure we're updating the correct stuassignment record
            $stuassignment = stuassignment::where('enrollment_id', $enrollmentId)
                ->where('assignment_id', $this->assignment_id) // Ensure the assignment ID is correct
                ->first();

            if ($stuassignment) {
                $stuassignment->upload = $filePath;
                $stuassignment->save();

                // Refresh enrollments to reflect the new upload
                $this->getEnrollments();

                $this->dispatchBrowserEvent('swal:modal', [
                    'type' => 'success',
                    'message' => 'Assignment uploaded successfully!',
                ]);
            }
        }
    }
    public function getEnrollments()
    {
        $this->enrollments = enrollment::with(['student', 'stuassignment' => function($query) {
            $query->where('assignment_id', $this->assignment->id); // Only get stuassignments for the current assignment
        }])
        ->where('year_id', $this->assignment->class_id)
        ->where('section_id', $this->assignment->section_id)
        ->get();

        foreach ($this->enrollments as $enrollment) {
            // Fetching marks only for the current assignment
            $this->marks[$enrollment->id] = $enrollment->stuassignment ? $enrollment->stuassignment->marks : null;
        }
    }
    public function editdate($id)
    {
        $assignment = assignment::find($id);
        $assignment->due_date = $this->due_date;
        $assignment->save();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Date updated successfully!',
        ]);
    }
   
   

    public function saveSingleMarks($enrollmentId)
    {
        $this->validateOnly('marks.' . $enrollmentId);

        $stuassignment = stuassignment::where('enrollment_id', $enrollmentId)
                          ->where('assignment_id', $this->assignment->id)
                          ->first();

        if ($stuassignment) {
            $stuassignment->marks = $this->marks[$enrollmentId];
            $stuassignment->status = 1; // Assuming status should be set to 1 indicating submission
            $stuassignment->save();
        }
    
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Marks Updated Successfully!',
        ]);
    }
    public function updateassignment($id){
        $stuassignment = stuassignment::find($id);
        $stuassignment->obtain = $this->obtain;
        $stuassignment->save();
        return redirect()->route('teacher.assignmentprofile', ['id' => $this->assignment->id]);
    }
    public function saveMarks($enrollmentId)
    {
        $this->validateOnly('marks.' . $enrollmentId);

        // Ensure we're updating the correct stuassignment record
        $stuassignment = stuassignment::where('enrollment_id', $enrollmentId)
                          ->where('assignment_id', $this->assignment->id) // Ensure the correct assignment
                          ->first();

        if ($stuassignment) {
            $stuassignment->marks = $this->marks[$enrollmentId];
            $stuassignment->status = $stuassignment->marks !== null ? 1 : 0; // Set status to 'Submitted' if marks are entered
            $stuassignment->save();
        }
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Marks Updated Successfully!',
        ]);
    }
    public function toggleStatus()
    {
        $this->assignment->status = !$this->assignment->status;
        $this->assignment->save();
        $this->status = $this->assignment->status;
        $this->showExtendDate = !$this->showExtendDate;
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Status changed successfully!',
        ]);
    }

    public function render()
    {
        // $assignments=assignment::all();
        return view('livewire.teacher.assignment.assignmentprofile')->layout('Layouts.app');
    }
}
