<?php

namespace App\Http\Livewire\Admin\Management;

use App\Models\User;
use App\Models\role as Role;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Allusers extends Component
{
    public $delete_id;
    public $name;
    public $phone;
    public $description;
    public $email;
    public $role_id;
    public $password;
    public $password_confirmation;

    protected $listeners = ['deleteuser'];

    public function render()
    {
        $branchId = Auth::user()->branch_id;

        $users = User::all();
        $roles = Role::all();

        return view('livewire.admin.management.allusers', compact('users', 'roles'))->layout('Layouts.app');
    }

    public function deleteuser()
    {
        // Find the user and delete
        $user = User::find($this->delete_id);
        if ($user) {
            $user->delete();
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'message' => 'User Deleted Successfully!',
                'text' => 'The user will no longer be listed in the users table.'
            ]);
        }
        return redirect('/admin/users');
    }

    public function alertConfirm($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('swal:confirmuser', [
            'type' => 'warning',
            'message' => 'Are you sure?',
            'text' => 'If deleted, you will not be able to recover this user!'
        ]);
    }

    public function save()
    {
        $this->validate();

        $user = new User();
        $user->name = $this->name;
        $user->phone = $this->phone;
        $user->description = $this->description;
        $user->email = $this->email;
        $user->role_id = $this->role_id;
        $user->password = Hash::make($this->password); 
        $user->branch_id = Auth::user()->branch_id;
        $user->save();

        $this->reset(['name', 'phone', 'description', 'email', 'role_id', 'password', 'password_confirmation']);

        return redirect('/admin/users');
    }
}
