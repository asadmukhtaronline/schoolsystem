<?php

namespace app\Http\Livewire\Admin\Assignments;
use Livewire\Component;
use App\Models\year;
use App\Models\teacher;
use App\Models\assignment;
use App\Models\section;
use App\Models\subject;
use App\Models\assignsubject;
use App\Models\sectiontimetable;
class Editassignment extends Component
{
    public $title;
    public $description;
    public $year;
    public $teacher;
    public $section;
    public $reference;  
    public $due_date;
    public $creator_name;
    public $total_marks;
    public $subject;
    public $sections = [];
    public $teachers = [];
    public function render()
    {
        // $assignment=assignment::orderby('id','asc')->get();
        $assignsubjects = assignsubject::where('year_id', $this->year)->get();
        $years = year::all();
        $teachers = teacher::orderby('id','asc')->get();
        return view('livewire.admin.assignments.editassignment', compact('years', 'assignsubjects','teachers'))->layout('Layouts.app');
    }
    public function getsection(){
        $this->sections = section::where('year_id',$this->year)->get();
    }
    public function getteacher(){
        $this->teachers = section::where('year_id',$this->teacher)->get();
    }
   
public function mount($id){
    $assignment=assignment::find($id);
    $this->assignment_id=$assignment->id;
    $this->title=$assignment->title;
    $this->description=$assignment->description;
    $this->creator_name=$assignment->creator_name;
    $this->due_date=$assignment->due_date;
    $this->total_marks=$assignment->total_marks;
    $this->reference=$assignment->reference;
    $this->year = $assignment->class_id;
    $this->subject = $assignment->subject_id;
    $this->section = $assignment->section_id;
    $this->teacher = $assignment->teacher_id;

    $this->getSection();
    $this->getTeacher();

}
protected $rules = [
    'title' => 'required',
    'year' => 'required',
    'section' => 'required',
    'teacher' => 'required',
    'description' => 'required',
    'creator_name' => 'required',
    'total_marks' => 'required',
    'due_date' => 'required',
    'subject' => 'required',
];
public function update($id){
    $this->validate();

    $assignment=assignment::find($id);
    $assignment->id=$this->assignment_id;
    $assignment->title=$this->title;
    $assignment->description=$this->description;
    $assignment->creator_name=$this->creator_name;
    $assignment->due_date=$this->due_date;
    $assignment->total_marks=$this->total_marks;
    $assignment->reference=$this->reference;
    $assignment->class_id=$this->year;
    $assignment->section_id=$this->section;
    $assignment->subject_id=$this->subject;
    $assignment->teacher_id=$this->teacher;
    $assignment->save();
    $this->dispatchBrowserEvent('swal:modal', [
        'type' => 'success',  
        'message' => 'Assignment Updated Successfully!', 
    ]);
    return redirect(route('admin.assignment'));
}
}
