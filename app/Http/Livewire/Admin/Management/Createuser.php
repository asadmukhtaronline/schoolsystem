<?php

namespace app\Http\Livewire\Admin\Management;
use App\Models\User;
use App\Models\role;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Auth;

class Createuser extends Component
{
    use WithFileUploads;
    public $name;
    public $image;
    public $phone;
    public $description;
    public $email;
    public $password;
    public $password_confirmation;
    public $is_teacher;
    public $is_admin;
    public $is_student;
    public $is_staf;
    public $role_id;
    public $title;
    public $role;
    
    public function render()
    {
        $branchId = Auth::user()->branch_id;
   
        $roles = role::orderby('id','desc')->get();
        return view('livewire.admin.management.createuser',compact('roles'))->layout('Layouts.app');
    }
    protected $rules=[
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'image' => 'required|image',
        'description' => 'required',
        'role_id' => 'required',
        'password' => 'required|string|min:8|confirmed',
    ];

    public function save()
    {   
        //dd('Before validation');
        $this->validate();
      //  dd('after validation');
        $user = new User;
        $user->name = $this->name;

        $imagePath = $this->image->store('user', 'public');
        $user->image = $imagePath;

        $user->phone = $this->phone;
        $user->role_id = $this->role_id;   
        $user->description = $this->description;
        $user->email = $this->email; 
        $user->password = Hash::make($this->password);
        $user->is_admin = '1';
        $user->branch_id = Auth::user()->branch_id;
        $user->save();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'User Created Successfully!', 
        ]);

        $this->reset([
            'name',
            'email',
            'phone',
            'description',
            'image',
            'password',
            'password_confirmation',
        ]);

        return redirect()->route('admin.allusers');
    }
    
   
}
    