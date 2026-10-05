<?php

namespace App\Http\Livewire\Admin\Branches;

use Livewire\Component;
use App\Models\Branch;
use App\Models\User;
use Auth;

class Allbranch extends Component
{
    public $delete_id;
    protected $listeners = ['deletebranch'];

    public function render()
    {
        $branchId = Auth::user()->branch_id;
        $branches = Branch::orderby('id', 'desc')->get();
        // dd($branchId);
        return view('livewire.admin.branches.allbranch', compact('branches'))->layout('Layouts.app');
    }

    public function deletebranch()
    {
        $branch = Branch::find($this->delete_id);
        if ($branch) {
            $branch->delete();
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Branch Deleted!', 
                'text' => 'It will not list on the branch table.'
            ]);
        } else {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',  
                'message' => 'Branch Not Found!', 
                'text' => 'The branch you are trying to delete does not exist.'
            ]);
        }
    }

    public function alertConfirm($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('swal:confirmbranch', [
            'type' => 'warning',  
            'message' => 'Are you sure?', 
            'text' => 'If deleted, you will not be able to recover this data!'
        ]);
    }
}
