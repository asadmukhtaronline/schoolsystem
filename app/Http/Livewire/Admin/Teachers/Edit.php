<?php

namespace App\Http\Livewire\Admin\Teachers;

use Livewire\Component;
use App\Models\teacher;
use Livewire\WithFileUploads;


class Edit extends Component
{

    use WithFileUploads;

    public $name;
    public $father_name;
    public $cnic;
    public $whatsapp;
    public $email;
    public $photo;
    public $description;
    public $address;
    public $gender;
    public $dob;
    public $contract;
    public $picture;

    public function render()
    {
        $teacher = $this->teacher;
        return view('livewire.admin.teachers.edit',compact('teacher'))->layout('Layouts.app');
    }

    public function mount($id)
    {
        $this->teacher = teacher::find($id);
        $this->teacher_id=$this->teacher->id;
        $this->name = $this->teacher->name;
        $this->father_name = $this->teacher->father_name;
        $this->cnic = $this->teacher->cnic;
        $this->email = $this->teacher->email;
        $this->whatsapp = $this->teacher->whatsapp;
        $this->description = $this->teacher->description;
        $this->address = $this->teacher->address;
        $this->gender = $this->teacher->gender;
        $this->dob = $this->teacher->dob;
        $this->contract = $this->teacher->contract;
         if (!empty($this->picture))
         {
                 $picture = time().".".$this->picture->getClientOriginalExtension();
                 $this->picture->storeAs('teachers',$picture,'public');
                 $teacher->picture=$picture;
         }

    }
    public function resetInputFields()
    {
            $this->name =" ";
            $this->father_name =" ";
            $this->cnic =" ";
            $this->description =" ";
            $this->address =" ";
            $this->whatsapp =" ";
            $this->gender =" ";
            $this->dob =" ";
            $this->contract =" ";
            $this->picture =null;

    }
    public function update($id)
    { 
        $teacher=teacher::find($id);
        $teacher->id = $this->teacher_id;
        $teacher->name = $this->name;
        $teacher->father_name = $this->father_name;
        $teacher->cnic = $this->cnic;
        $teacher->whatsapp = $this->whatsapp;
        $teacher->description = $this->description;
        $teacher->address = $this->address;
        $teacher->gender = $this->gender;
        $teacher->dob = $this->dob;
        $teacher->contract = $this->contract;
         if (!empty($this->picture)){
             $picture = time().".".$this->picture->getClientOriginalExtension();
        $this->picture->storeAs('teachers',$picture,'public');
             $teacher->picture=$picture;
         }
    
        $teacher->save();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Teacher Edit Successfully!', 
            // 'text' => 'If deleted, you will not be able to recover this imaginary file!'
        ]);
        $this->resetInputFields();

        return redirect('/admin/teachers');
    }


    }
