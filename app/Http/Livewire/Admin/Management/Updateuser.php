<?php

namespace App\Http\Livewire\Admin\Management;
use App\Models\user;
use App\Models\role;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use Livewire\Component;

class Updateuser extends Component
{
use WithFileUploads;
    public $name;
    public $email;
    public $image;
    public $description;
    public $phone;
    public $user;
    public $role;
    public $user_id;
    public function render()
    {
        $user=user::all();
        $roles=role::all();
        // $categories=staffcatecory::all();
        return view('livewire.admin.management.updateuser',compact('user','roles'))->layout('Layouts.app');
    }
    
  
   
    public function mount($id){
        $user = user::find($id);
        $this->user_id=$user->id;
        $this->name = $user->name;
      
        $this->description = $user->description;
        $this->email = $user->email;
        $this->phone = $user->phone; 
        $this->password = $user->password; 
        $this->password_confirmation = $user->password_confirmation; 
        // $this->phone = $this->user->phone; 
        return redirect()->back();

    }
    public function resetInputFields()
    {
            $this->name =" ";
            $this->description =" ";
            $this->email =" ";
            $this->phone =" ";
            $this->password =" ";
            $this->password_confirmation=" ";
    }
    protected $rules=[
        'name'=>'required',
        'email'=>'required',
        'phone'=>'required',
        'description'=>'required',
        'password'=>'required|confirmed',
];
    public function update($id)
    {
    $this->validate();
        $user = user::find($id);
        $role=role::find($id);
        $user->id = $this->user_id;
        $image = time().".".$this->image->getClientOriginalExtension();
        $this->image->storeAs('user',$image,'public');
        $user->image=$image;
        $user->name = $this->name;
        // $user->role = $user->role->title;
        $user->description = $this->description;
        $user->email = $this->email;
        $user->role_id = $this->role;
        $user->phone = $this->phone;
        $user->password = Hash::make($this->password);
        $user->password_confirmation = $this->password_confirmation;
        $user->save();
        return redirect('/admin/users');
        $this->resetInputFields();
        
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'User updated Successfully', 
        ]);
    }


}
