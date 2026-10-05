<?php
namespace App\Http\Livewire\Teacher\Assignment;

use Auth;
use Livewire\Component;
use App\Models\section;
use App\Models\year;
use App\Models\teacher;
use App\Models\assignsubject;
use App\Models\assignment;
use App\Models\stuassignment;
use App\Models\enrollment;
use App\Models\sectiontimetable;
use Illuminate\Support\Facades\Mail;
use App\Mail\Teaemailassignment;
use App\Mail\Studentassignmentemail;
class CreateAssignment extends Component
{
    public $title;
    public $description;
    public $year;
    public $section;
    public $reference;
    public $due_date;
    public $creator_name;
    public $total_marks;
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
        // 'reference' => 'required',
        'total_marks' => 'required',
        'due_date' => 'required',
        'subject' => 'required',
        'description' => 'required'
    ];
    public function save()
    {
        $this->validate();
    
        // Fetch enrollments for the selected year and section
        $enrollments = enrollment::where('year_id', $this->year)
            ->where('section_id', $this->section)
            ->get();
            
        if ($enrollments->isEmpty()) {
            // Set a flash message and prevent saving
            session()->flash('error', 'No enrollments found for the selected year and section.');
            $this->emit('enrollmentsNotFound'); // Emit an event if needed
            return; // Stop further execution
        }
        
        // Proceed to save the assignment
        $assignment = new assignment;
        $assignment->title = $this->title;
        $assignment->description = $this->description;
        $assignment->due_date = $this->due_date;
        $assignment->class_id = $this->year;
        $assignment->section_id = $this->section;
        $assignment->teacher_id = Auth::user()->teacher->id;
        $assignment->reference = $this->reference;
        $assignment->creator_name = Auth::user()->teacher->name;
        $assignment->total_marks = $this->total_marks;
        $assignment->subject_id = $this->subject;
        $assignment->save();
    
        // Save student assignments
        foreach ($enrollments as $enrollment) {
            $stuassignment = new stuassignment;
            $stuassignment->enrollment_id = $enrollment->id;
            $stuassignment->assignment_id = $assignment->id;
            $stuassignment->class_id = $assignment->class_id;
            $stuassignment->section_id = $assignment->section_id;
            $stuassignment->subject_id = $assignment->subject_id;
            $stuassignment->marks = $assignment->total_marks;
            $stuassignment->due_date = $assignment->due_date;
            $stuassignment->save();
        }
    
        // Reset the form fields
        $this->reset(['title', 'description', 'due_date', 'year', 'section', 'total_marks', 'subject', 'reference']);
    
        // Dispatch a success modal or redirect
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Assignment Created Successfully!',
        ]);
    
        return redirect()->route('teacher.allassignments');
    }
    

    public function render()
    {
        return view('livewire.teacher.assignment.createassignment')->layout('Layouts.app');
    }
}
  // sending email
        // $student = student::find($enrollment->student_id);
        // Mail::to($student->email)->send(new Studentassignmentemail($student->name,$assignment, $year->title, $section->title));

 // $teacher = Auth::user()->teacher;
        
        // email sending
        // $year = year::find($this->year);
        // $section = section::find($this->section);
        //
        