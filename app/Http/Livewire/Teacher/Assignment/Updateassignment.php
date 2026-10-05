<?php

namespace App\Http\Livewire\Teacher\Assignment;
  
use Livewire\Component;
use Auth;
use App\Models\assignment;
use App\Models\enrollment;
use App\Models\stuassignment;
use App\Models\sectiontimetable;
class Updateassignment extends Component
{
    public function render()
    {
        $years = sectiontimetable::where('teacher_id', Auth::user()->teacher->id)
        ->with('year')
        ->get()
        ->pluck('year')
        ->unique('id')
        ->values()
        ->all();
        $sections = sectiontimetable::where('teacher_id', Auth::user()->teacher->id)
            ->where('year_id', $this->year)
            ->with('section')
            ->get()
            ->pluck('section')
            ->unique('id')
            ->values()
            ->all(); 
            $assignsubjects = sectiontimetable::where('teacher_id', Auth::user()->teacher->id)
            ->where('year_id', $this->year)
            ->where('section_id', $this->section)
            ->with('subject')
            ->get()
            ->pluck('subject')
            ->unique('id')
            ->values()
            ->all();
        return view('livewire.teacher.assignment.updateassignment',compact('years','sections','assignsubjects'))->layout('Layouts.app');
    }
    public function mount($id)
    {
        $assignment=assignment::find($id);
        $this->assignment_id=$assignment->id;
        $this->title=$assignment->title;
        $this->description=$assignment->description;
        // $this->creator_name=$assignment->creator_name;
        $this->due_date=$assignment->due_date;
        $this->total_marks=$assignment->total_marks;
        $this->reference=$assignment->reference;
        $this->year = $assignment->class_id;
        $this->subject = $assignment->subject_id;
        $this->section = $assignment->section_id;
        // $this->teacher = $assignment->teacher_id;
    }
    protected $rules = [
        'title' => 'required',
        'year' => 'required',
        'section' => 'required',
        'description' => 'required',
        // 'creator_name' => 'required',
        'total_marks' => 'required',
        'due_date' => 'required',
        'subject' => 'required',
    ];

    public function update($id)
    {
        $this->validate();

        
        $assignment=assignment::find($id);
        $assignment->id=$this->assignment_id;
        $assignment->title = $this->title;
        $assignment->description = $this->description;
        $assignment->due_date = $this->due_date;
        $assignment->class_id = $this->year;
        $assignment->section_id = $this->section;

        $assignment->reference = $this->reference;
        // $assignment->creator_name = Auth::user()->teacher->name;
        $assignment->total_marks = $this->total_marks;
        $assignment->subject_id = $this->subject;
        $assignment->save();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Assignment Update Successfully!',
        ]);

        $enrollments = Enrollment::where('year_id', $this->year)
            ->where('section_id', $this->section)
            ->get();

        if ($enrollments->isEmpty()) {
            session()->flash('error', 'No enrollments found for the selected year and section.');
            return;
        }

        foreach ($enrollments as $enrollment) {
            $stuassignment = new StuAssignment;
            $stuassignment->enrollment_id = $enrollment->id;
            $stuassignment->assignment_id = $assignment->id;
            $stuassignment->class_id = $assignment->class_id;
            $stuassignment->section_id = $assignment->section_id;
            $stuassignment->subject_id = $assignment->subject_id;
            $stuassignment->marks = $assignment->total_marks;
            $stuassignment->due_date = $assignment->due_date;
            $stuassignment->save();
        }
    }
}
