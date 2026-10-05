<?php

namespace App\Http\Livewire\Admin\Branches;

use Livewire\Component;
use App\Models\Branch;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class EditBranch extends Component
{
    use WithFileUploads;

    public $branchId;
    public $name;
    public $campus_name;
    public $landline;
    public $location;
    public $city;
    public $country;
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
        $branch = Branch::orderby('id', 'desc')->get();
        return view('livewire.admin.branches.edit-branch', compact('branch'))->layout('Layouts.app');
    }

    public function mount($id)
    {
        $branch = Branch::find($id);
        $this->branchId = $branch->id;
        $this->name = $branch->name;
        $this->campus_name = $branch->campus_name;
        $this->landline = $branch->landline;
        $this->location = $branch->location;
        $this->city = $branch->city;
        $this->country = $branch->country;
        $this->photo = $branch->photo ? $branch->photo : null;
        $this->fullname = $branch->fullname;
        $this->email = $branch->email;
        $this->whatsapp = $branch->whatsapp;
        $this->alternative_contact = $branch->alternative_contact;
        $this->address = $branch->address;
        $this->principal_city = $branch->principal_city;
        $this->principal_country = $branch->principal_country;
    }

    public function update()
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
            'photo' => 'nullable|max:2048',
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:branches,email,' . $this->branchId,
            'whatsapp' => 'required|string|regex:/^[\d\s\+\-\(\)]+$/|max:20',
            'alternative_contact' => 'nullable|string|regex:/^[\d\s\+\-\(\)]+$/|max:20',
            'address' => 'required|string|max:1024',
            'principal_city' => 'required|string|max:255',
            'principal_country' => 'required|string|max:255',
        ]);
    
        $branch = Branch::findOrFail($this->branchId);
    
        // If there's a new photo, delete the old one and store the new one
        if ($this->photo instanceof \Livewire\TemporaryUploadedFile) {
            if ($branch->photo) {
                Storage::disk('public')->delete($branch->photo);
            }
            $photoPath = $this->photo->store('photos/principal', 'public');
        } else {
            // If no new photo, keep the existing one
            $photoPath = $branch->photo;
        }
    
        // Update branch data
        $branch->name = $this->name;
        $branch->campus_name = $this->campus_name;
        $branch->landline = $this->landline;
        $branch->location = $this->location;
        $branch->city = $this->city;
        $branch->country = $this->country;
        $branch->photo = $photoPath;  // Make sure to save the correct photo path
        $branch->fullname = $this->fullname;
        $branch->email = $this->email;
        $branch->whatsapp = $this->whatsapp;
        $branch->alternative_contact = $this->alternative_contact;
        $branch->address = $this->address;
        $branch->principal_city = $this->principal_city;
        $branch->principal_country = $this->principal_country;
        $branch->save();
    
        // Now, update the corresponding user
        $user = User::where('branch_id', $this->branchId)->first();
    
        if ($user) {
            // Update user details
            $user->name = $this->fullname;
            $user->email = $this->email;
            $user->phone = $this->whatsapp;
            $user->image = $photoPath ? $photoPath : $user->image;  // Update photo if available
            $user->save();
        }
    
        // Show success message
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Branch and Principal User updated successfully!'
        ]);
    }
    
}
