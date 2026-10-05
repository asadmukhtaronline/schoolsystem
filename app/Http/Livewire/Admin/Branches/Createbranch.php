<?php

namespace App\Http\Livewire\Admin\Branches;

use Livewire\Component;
use App\Models\Branch;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


class Createbranch extends Component
{
    use WithFileUploads;

    // Branch Details
    public $name;
    public $campus_name;
    public $landline;
    public $location;
    public $city;
    public $country;
    // Principal Details
    public $photo;
    public $fullname;
    public $email;
    public $whatsapp;
    public $alternative_contact;
    public $address;
    public $principal_city;
    public $principal_country;

    public function render()
    {
        return view('livewire.admin.branches.createbranch')->layout('Layouts.app');
    }

    public function save()
    {
        $this->validate([
            // Branch Details
            'name' => 'required|string|max:255',
            'campus_name' => 'required|string|max:255',
            'landline' => 'required|string|regex:/^[\d\s\+\-\(\)]+$/|max:20',
            'location' => 'required|string|max:1024',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
    
            // Principal Details
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'whatsapp' => 'required|string|regex:/^[\d\s\+\-\(\)]+$/|max:20',
            'alternative_contact' => 'nullable|string|regex:/^[\d\s\+\-\(\)]+$/|max:20',
            'address' => 'required|string|max:1024',
            'principal_city' => 'required|string|max:255',
            'principal_country' => 'required|string|max:255',
        ]);

        // Photo Upload

        $photoPath = $this->photo ? $this->photo->store('photos/principal', 'public') : null;

        $branch = new Branch;
        // Branch Details
        $branch->name = $this->name;
        $branch->campus_name = $this->campus_name;
        $branch->landline = $this->landline;
        $branch->location = $this->location;
        $branch->city = $this->city;
        $branch->country = $this->country;
        // Principal Details
        $branch->photo = $photoPath;    
        $branch->type = 2;    
        $branch->fullname = $this->fullname;
        $branch->email = $this->email;
        $branch->whatsapp = $this->whatsapp;
        $branch->alternative_contact = $this->alternative_contact;
        $branch->address = $this->address;
        $branch->principal_city = $this->principal_city;
        $branch->principal_country = $this->principal_country;
        $branch->save();

        $branchId = $branch->id;
        
        //User Create
        $user = new User;
        $user->image = $photoPath;
        $user->name = $this->fullname;
        $user->phone = $this->whatsapp;
        $user->email = $this->email;
        $user->password = Hash::make('12344321');
        $user->is_admin = '1';
        $user->role_id = '1';
        $user->branch_id = $branchId;
        $user->save();

        
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Branch added successfully!'
        ]);
        
        $this->reset(['name', 'campus_name', 'landline', 'location', 'city', 'country', 'whatsapp',
        'fullname', 'email', 'address', 'principal_city', 'principal_country', 'photo', 'alternative_contact']);

        return redirect()->route('admin.allbranch');
    }
}
