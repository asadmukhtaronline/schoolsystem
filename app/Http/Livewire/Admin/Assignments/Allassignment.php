<?php

namespace app\Http\Livewire\Admin\Assignments;

use Livewire\Component;
use App\Models\assignment;
use App\Models\stuassignment;
use App\Models\enrollment;
 
class Allassignment extends Component
{
    public $assignment=[];
    public $stuassignment;
    public $status;
    public $searchassignment;

    public function render()
    {   
        return view('livewire.admin.assignments.allassignment')->layout('Layouts.app');
    }

    public function mount()
    {
        $this->assignment = assignment::with(['subject', 'teacher', 'class', 'section', 'branch'])->orderBy('id', 'asc')->get();
        $this->stuassignment = stuassignment::orderBy('id', 'asc')->get();
    }

    public function searchassignments()
    {
        $isMainAdmin = Auth::user()->is_admin;
        $branchId = Auth::user()->branch_id;
        $searchTerm = '%' . $this->searchassignment . '%';
    
        if ($isMainAdmin) {
            // Main admin can search all assignments across all branches
            $this->assignment = assignment::where('title', 'like', $searchTerm)
                ->orWhereHas('teacher', function ($query) use ($searchTerm) {
                    $query->where('name', 'like', $searchTerm);
                })
                ->orWhereHas('class', function ($query) use ($searchTerm) {
                    $query->where('title', 'like', $searchTerm);
                })
                ->orWhereHas('subject', function ($query) use ($searchTerm) {
                    $query->where('title', 'like', $searchTerm);
                })
                ->orWhere('creator_name', 'like', $searchTerm)
                ->orderBy('id', 'desc')
                ->get();
        } else {
            // Non-admins (or sub-branch users) can only search assignments in their own branch
            $this->assignment = assignment::where('branch_id', $branchId)
                ->where(function ($query) use ($searchTerm) {
                    $query->where('title', 'like', $searchTerm)
                        ->orWhereHas('teacher', function ($query) use ($searchTerm) {
                            $query->where('name', 'like', $searchTerm);
                        })
                        ->orWhereHas('class', function ($query) use ($searchTerm) {
                            $query->where('title', 'like', $searchTerm);
                        })
                        ->orWhereHas('subject', function ($query) use ($searchTerm) {
                            $query->where('title', 'like', $searchTerm);
                        })
                        ->orWhere('creator_name', 'like', $searchTerm);
                })
                ->orderBy('id', 'desc')
                ->get();
        }
    }
    

    public $delete_id;
    protected $listeners = ['deleteassignment'];
    
    public function deleteassignment()
    {
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

    public function alertConfirm($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('swal:confirmassignment', [
            'type' => 'warning',  
            'message' => 'Are you sure?', 
            'text' => 'If deleted, you will not be able to recover this imaginary file!'
        ]);
    }
}