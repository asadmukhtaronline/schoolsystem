<?php

namespace App\Http\Livewire\Admin\Staff;

use Livewire\Component;
use App\Models\staf;
use App\Models\staffcategory;
use Livewire\WithFileUploads;

class Staffupdate extends Component
{
    use WithFileUploads;

    public $staff;
    public $staff_id;
    public $name;
    public $description;
    public $email;
    public $whatsapp;
    public $gender;
    public $categories;
    public $category;
    public $cnic;
    public $photo;
    public $salary;

    public function render()
    {
        $staff = $this->staff;
        $categories = staffcategory::all();
        return view('livewire.admin.staff.staffupdate', compact('staff', 'categories'))->layout('Layouts.app');
    }

    protected $rules = [
        'name' => 'required',
        'cnic' => 'required',
        'photo' => 'required',
        'salary' => 'required',
        'category' => 'required',
        'gender' => 'required',
        'whatsapp' => 'required',
        'email' => 'required',
        'description' => 'required',
    ];

    public function mount($id)
    {
        $this->staff = staf::find($id);
        $this->staff_id = $this->staff->id;
        $this->name = $this->staff->name;
        $this->description = $this->staff->description;
        $this->email = $this->staff->email;
        $this->whatsapp = $this->staff->whatsapp;
        $this->cnic = $this->staff->cnic;
        $this->salary = $this->staff->salary;
        $this->gender = $this->staff->gender;
        $this->category = $this->staff->stafcategory_id;  // Assuming this is the relationship field
    }

    public function resetInputFields()
    {
        $this->name = "";
        $this->description = "";
        $this->email = "";
        $this->whatsapp = "";
        $this->cnic = "";
        $this->gender = "";
        $this->salary = "";
    }

    public function update($id)
    {
        $this->validate();

        $staff = staf::find($id);
        $staff->name = $this->name;
        $staff->description = $this->description;
        $staff->email = $this->email;
        $staff->whatsapp = $this->whatsapp;
        $staff->cnic = $this->cnic;
        $staff->salary = $this->salary;
        $staff->stafcategory_id = $this->category;  // Assigning category
        $staff->gender = $this->gender;
        $staff->save();

        return redirect('/admin/staff');

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Staff updated Successfully',
        ]);

        $this->resetInputFields();
    }
}
