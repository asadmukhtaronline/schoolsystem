<?php

namespace App\Http\Livewire\Admin\Staff;

use Livewire\Component;
use App\Models\staf;
use App\Models\User;
use App\Models\staffcategory;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use App\Models\role;
use Auth;

class Createstaff extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $email;
    public $whatsapp;
    public $gender;
    public $stafcategory_id;
    public $cnic;
    public $photo;
    public $salary;
    public $roles = [];
    public $role;

    public function render()
    {
        $branchId = Auth::user()->branch_id;
        $categories = staffcategory::all();
        return view('livewire.admin.staff.createstaff', compact('categories'))->layout('Layouts.app');
    }
    public function mount(){
        $this->roles = role::all();
    }

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'photo' => 'required|image',
        'cnic' => 'required|image|max:1024',
        'whatsapp' => 'required',
        'email' => 'required|email|unique:users',
        'gender' => 'required|in:Male,Female',
        'stafcategory_id' => 'required',
        'salary' => 'required|numeric',
    ];

    public function save()
    {
        $this->validate();
    
        $staff = new Staf;
    
        $photoPath = $this->photo->store('staff', 'public');
        $staff->image = $photoPath;
    
        $cnicPath = $this->cnic->store('staff/cnic', 'public');
        $staff->cnic = $cnicPath;
    
        $staff->name = $this->name;
        $staff->email = $this->email;
        $staff->whatsapp = $this->whatsapp;
        $staff->gender = $this->gender;
        $staff->salary = $this->salary;
        $staff->stafcategory_id = $this->stafcategory_id;
        $staff->description = $this->description;
        $staff->branch_id = Auth::user()->branch_id;
        $staff->save();
    
        // Create a new user
        $user = new User;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->image = $photoPath;
        $user->phone = $this->whatsapp;
        $user->description = $this->description;
        $user->password = Hash::make('12344321');
        $user->is_staf = 1;
        $user->role_id = $this->role;
        $user->branch_id = Auth::user()->branch_id;
        $user->save();
    
        // Associate user with staff
        $staff->user()->associate($user);
        $staff->save();
    
        $this->reset([
            'name', 'description', 'email', 'whatsapp', 'gender', 'stafcategory_id', 'cnic', 'photo', 'salary'
        ]);
    
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Staff Created Successfully!',
        ]);
    
        return redirect()->route('admin.all-staff');
    }
}
