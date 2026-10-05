<?php

namespace App\Http\Livewire\Admin\Staff;
use App\Models\staf;
use App\Models\profilestaff;
use App\Models\staffcategory;
use Livewire\WithFileUploads;   
use App\Events\OpenUpdateStaff;
use Livewire\Component;

class Allstaff extends Component
{
    use WithFileUploads;
    public $name;
    public $description;
    public $cnic;
    public $whatsapp;
    public $gender;
    public $email;
    public $categories;
    public $stafcategory_id;
    public $profilestaff; 
    public $staff=[];
    public $searchstaff;

    public function render()
    {
        $categories=staffcategory::all();      
        $profilestaff=profilestaff::all();
        
        return view('livewire.admin.staff.allstaff',compact('categories','profilestaff'))->layout('Layouts.app');
    }

    public function mount()
    {
        $this->staff=staf::orderBy('id', 'asc')
        ->get();
    }


    public function searchstaffs() {
        $isMainAdmin = Auth::user()->is_admin;
        $branchId = Auth::user()->branch_id;
        $searchTerm = '%' . $this->searchstaff . '%';
    
        if ($isMainAdmin) {
            // Main admin can search all staff across all branches
            $this->staff = staf::with('staffcategory')
                ->where('name', 'like', $searchTerm)
                ->orWhere('email', 'like', $searchTerm)
                ->orWhere('whatsapp', 'like', $searchTerm)
                ->orWhere('description', 'like', $searchTerm)
                ->orWhereHas('staffcategory', function ($query) use ($searchTerm) {
                    $query->where('title', 'like', $searchTerm);
                })
                ->orWhere('salary', 'like', $searchTerm)
                ->orderBy('id', 'desc')
                ->get();
        } else {
            // Non-admins (or sub-branch users) can only search staff in their own branch
            $this->staff = staf::with('staffcategory')
                ->where(function ($query) use ($searchTerm, $branchId) {
                    $query->where('name', 'like', $searchTerm)
                          ->where('branch_id', $branchId);
                })
                ->orWhere(function ($query) use ($searchTerm, $branchId) {
                    $query->where('email', 'like', $searchTerm)
                          ->where('branch_id', $branchId);
                })
                ->orWhere(function ($query) use ($searchTerm, $branchId) {
                    $query->where('whatsapp', 'like', $searchTerm)
                          ->where('branch_id', $branchId);
                })
                ->orWhere(function ($query) use ($searchTerm, $branchId) {
                    $query->where('description', 'like', $searchTerm)
                          ->where('branch_id', $branchId);
                })
                ->orWhere(function ($query) use ($searchTerm, $branchId) {
                    $query->whereHas('staffcategory', function ($query) use ($searchTerm) {
                        $query->where('title', 'like', $searchTerm);
                    })
                    ->where('branch_id', $branchId);
                })
                ->orWhere(function ($query) use ($searchTerm, $branchId) {
                    $query->where('salary', 'like', $searchTerm)
                          ->where('branch_id', $branchId);
                })
                ->orderBy('id', 'desc')
                ->get();
        }
    }
    

    protected $rules = [
        'name' => 'required',
        'whatsapp' => 'required',
        'gender' => 'required',
        'categories' => 'required',
        'cnic' => 'required',
        'email' => 'required',
        'description' => 'required',
        'stafcategory_id' => 'required'
    ];

    public $delete_id;
    protected $listeners = ['deletestaff'];

    public function deletestaff()
    {
        $staff=staf::find($this->delete_id);
        $staff->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Staff Delete Successfully!', 
            'text' => 'It will not list on users table soon.'
        ]);
    }

    public function alertConfirm($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('swal:confirmstaff', [
            'type' => 'warning',  
            'message' => 'Are you sure?', 
            'text' => 'If deleted, you will not be able to recover this imaginary file!'
        ]);
    }   
}
      