<?php

namespace App\Http\Livewire\Admin\Teachers;

use Livewire\Component;
use App\Models\teacher;
use App\Models\User;
use App\Models\assignteacher;
use App\Models\teacherslot;
use Auth;

class Allteachers extends Component
{   
    public $searchteacher;
    public $addteachers = [];

    public $delete_id;
    protected $listeners = ['deleteteachers'];

    public function render()
    {
        return view('livewire.admin.teachers.allteachers')->layout('Layouts.app');
    }

    public function mount()
    {
        $branchId = Auth::user()->branch_id;
        $this->addteachers = teacher::where('branch_id', $branchId)
        ->orderby('id','asc')->get();
    }

    // for search ..
    public function searchteachers() {
        $isMainAdmin = Auth::user()->is_admin;
        $branchId = Auth::user()->branch_id;
    
        if ($isMainAdmin) {
            // Main admin can search all teachers across all branches
            $this->addteachers = teacher::where('name', 'like', '%' . $this->searchteacher . '%')
                                        ->orderby('id', 'desc')
                                        ->get();
        } else {
            // Non-admins (or sub-branch admins) search only within their branch
            $this->addteachers = teacher::where('name', 'like', '%' . $this->searchteacher . '%')
                                        ->where('branch_id', $branchId)
                                        ->orderby('id', 'desc')
                                        ->get();
        }
    }
    
    public function deleteteachers()
    {
    $addteacher = teacher::find($this->delete_id);

    if ($addteacher) {
        // Check if assignteachers relationship exists and has data
        if ($addteacher->assignteachers()->exists()) {
            $addteacher->assignteachers()->delete();
        }

        // Check if teacherslots relationship exists and has data
        if ($addteacher->teacherslots()->exists()) {
            $addteacher->teacherslots()->delete();
        }

        // Find the user associated with the teacher
        $user = user::find($addteacher->user_id);

        // Delete the user
        if ($user) {
            $user->delete();
        }

        // Delete the teacher
        $addteacher->delete();
    }

    $this->dispatchBrowserEvent('swal:modal', [
        'type' => 'success',  
        'message' => 'Teacher Delete Successfully!', 
        'text' => 'It will not list on users table soon.'
    ]);
}

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function alertConfirm($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('swal:confirmteacher', [
            'type' => 'warning',  
            'message' => 'Are you sure?', 
            'text' => 'If deleted, you will not be able to recover this imaginary file!'
        ]);
    }
    
}
