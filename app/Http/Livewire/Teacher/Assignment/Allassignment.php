<?php

namespace App\Http\Livewire\Teacher\Assignment;
use Auth;
use Livewire\Component;
use App\Models\assignment;
use App\Models\stuassignment;
class Allassignment extends Component
{
    public function render()
    {
        $assignments=assignment::where('teacher_id',Auth::user()->teacher->id)->orderBy('id', 'desc')->get();
        return view('livewire.teacher.assignment.allassignment',compact('assignments'))->layout('Layouts.app');
    }
    
    public $delete_id;
    protected $listeners = ['deleteassignment'];
    public function deleteassignment(){
    $assignment = assignment::find($this->delete_id);
    if ($assignment) {
        // Delete related stuassignments
        $stuassignments = stuassignment::where('assignment_id', $assignment->id)->get();
        foreach ($stuassignments as $stuassignment) {
            $stuassignment->delete();   
        }

        // Delete the assignment
        $assignment->delete();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Assignment and all related data deleted successfully!',
        ]);
    }
}

    public function alertConfirm($id){
     $this->delete_id = $id;
     $this->dispatchBrowserEvent('swal:confirmassignment', [
         'type' => 'warning',  
         'message' => 'Are you sure?', 
         'text' => 'If deleted, you will not be able to recover this imaginary file!'
     ]);
 }
}
