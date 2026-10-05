<?php

namespace app\Http\Livewire\Admin\Classes;

use Livewire\Component;
use App\Models\year;
use App\Models\section;
use App\Models\assignsubject;
use App\Models\assignsection;
use App\Models\teacher;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TeacherAssignedSectionMail;

class Classddetails extends Component
{
    public $year;
    public $maildata;
    public $title;
    public $teacher;
    public $subject;
    public $sections;
    public $section_id;
    public $subs = [];

    public $updateMode = false;

    public function render()
    {
        $branchId = Auth::user()->branch_id;
        $addteachers = teacher::orderBy('id', 'desc')->get();
        $subjects = assignsubject::orderBy('id', 'desc')->get();
        $class = $this->year;
        $sections = $this->sections;
        return view('livewire.admin.classes.classddetails', compact('addteachers', 'class', 'sections', 'subjects'))->layout('Layouts.app');
    }

    public function mount($id)
    {
        $branchId = Auth::user()->branch_id;
        $this->year = year::find($id);
        $this->sections = section::where('year_id', $id)->get();
        $this->subjects = assignsubject::where('year_id', $id)->get();
    }

   public function createsection($id)
{
    $this->validate();

    // Array to hold newly created sections
    $newSections = [];

    $section = new section;
    $section->title = $this->title;
    $section->teacher_id = $this->teacher;
    $section->year_id = $id;
    $section->branch_id = Auth::user()->branch_id;
    $section->save();

    // Add newly created section to array
    $newSections[] = $section;

    foreach ($this->subs as $index => $sub) {
        $assignsection = new assignsection;
        $assignsection->subject_id = $index;
        $assignsection->year_id = $section->id;
        $assignsection->teacher_id = $this->teacher;
        $assignsection->save();
    }

    // Fetch the teacher and class details
    $teacher = Teacher::find($this->teacher);
    $class = $this->year;

    // Send the email with newly created sections
    // if ($teacher && !empty($newSections)) {
    //     Mail::to($teacher->email)->send(new TeacherAssignedSectionMail($teacher, $newSections, $class));
    // }

    // Refresh sections list
    $this->sections = Section::where('year_id', $id)->get();

    // Dispatch success message
    $this->dispatchBrowserEvent('swal:modal', [
        'type' => 'success',
        'message' => 'Section Saved Successfully!',
    ]);

    $this->resetInputFields();
}


    public $delete_id;
    protected $listeners = ['deleteclass'];

    public function deleteclass()
{
    $section = section::find($this->delete_id);

    if ($section) {
        $year_id = $section->year_id;

        // Delete related enrollments
        $section->enrollment()->delete();

        // Delete the section itself
        $section->delete();

        // Refresh sections list after deletion
        $this->sections = section::where('year_id', $year_id)->get();

        // Dispatch success message to SweetAlert
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Section Deleted Successfully!',
            'text' => 'It will not be listed on the section table.'
        ]);
    } else {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'error',
            'message' => 'Section Not Found!',
            'text' => 'The section you are trying to delete does not exist or has already been deleted.'
        ]);
    }
}


    public function alertConfirm($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('swal:confirmclass', [
            'type' => 'warning',
            'message' => 'Are you sure?',
            'text' => 'If deleted, you will not be able to recover this section!'
        ]);
    }

    protected $rules = [
        'title' => 'required',
        'teacher' => 'required',
    ];

    public function edit($id)
    {
        $this->updateMode = true;
        $section = Section::find($id);
        $this->section_id = $section->id;
        $this->title = $section->title;
        $this->teacher = $section->teacher_id;
    }

    public function resetInputFields()
    {
        $this->title = "";
        $this->teacher = "";
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $section = section::find($this->section_id);
        $year_id = $section->year_id;
    
        // Update the section's details
        $section->title = $this->title;
        $section->teacher_id = $this->teacher;
        $section->save();
    
        // Fetch the updated teacher and class details
        $teacher = teacher::find($this->teacher);
        $class = $this->year;
    
        // Send an email to the teacher if a valid teacher is found
        // if ($teacher) {
        //     Mail::to($teacher->email)->send(new TeacherAssignedSectionMail($teacher, [$section], $class));
        // }
    
        // Refresh the list of sections after update
        $this->sections = section::where('year_id', $year_id)->get();
    
        // Reset the update mode and input fields
        $this->updateMode = false;
        $this->resetInputFields();
    
        // Emit an update event
        $this->emit('update');
    
        // Dispatch success message
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Section Updated Successfully',
        ]);
    }
    
}
