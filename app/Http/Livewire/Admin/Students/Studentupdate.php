<?php

namespace App\Http\Livewire\Admin\Students;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\student;
use App\Models\year;
use App\Models\section;

class Studentupdate extends Component
{
    use WithFileUploads;
    public $student;
    public $student_id;
    public $photo;
    public $name;
    public $parent_name;
    public $gender;
    public $current_address;
    public $street_address;
    public $city;
    public $region;
    public $postal;
    public $country;
    public $phone;
    public $email;
    public $admission_fee;
    public $monthly_fee;
    public $fee_date;
    public $year;
    public $section;
    public $sections = [];
    public function render()
    {
        $student = $this->student;
        $years = year::orderby('id','desc')->get();
        return view('livewire.admin.students.studentupdate', compact('student', 'years'))->layout('Layouts.app');
    }
    public function getsection(){
        $this->sections = section::where('year_id',$this->year)->get();
    }
    public function mount($id){
        $this->student = student::find($id);
        $this->student_id=$this->student->id;

        $this->name = $this->student->name;
        $this->parent_name = $this->student->parent_name;
        $this->gender = $this->student->gender;
        $this->current_address = $this->student->current_address;
        $this->street_address = $this->student->street_address;
        $this->city = $this->student->city;
        $this->region = $this->student->region;
        $this->postal = $this->student->postal;
        $this->country = $this->student->country;
        $this->email = $this->student->email;
        $this->phone = $this->student->phone;
        $this->admission_fee = $this->student->admission_fee;
        $this->monthly_fee = $this->student->monthly_fee;
        $this->fee_date = $this->student->fee_date;
        $this->year = $this->student->year;
        $this->section = $this->student->section;
        return redirect()->back();
    }
    public function resetInputFields()
    {
            $this->photo=" ";
            $this->name =" ";
            $this->parent_name =" ";
            $this->gender =" ";
            $this->current_address =" ";
            $this->street_address =" ";
            $this->city =" ";
            $this->region =" ";
            $this->postal =" ";
            $this->country =" ";
            $this->email =" ";
            $this->phone =" ";
            $this->admission_fee =" ";
            $this->monthly_fee =" ";
            $this->fee_date =" ";
            $this->year =" ";
            $this->section =" ";
    }
    public function update()
    {
        $student=student::find($this->student_id);
        $student->id = $this->student_id;
        if (!empty($this->photo)){
            $photo = time().".".$this->photo->getClientOriginalExtension('');
            $this->photo->storeAs('student', $photo,'public');
            $student->picture=$picture;
        }
        $student->name = $this->name;
        $student->parent_name = $this->parent_name;
        $student->gender = $this->gender;
        $student->current_address = $this->current_address;
        $student->street_address = $this->street_address;
        $student->city = $this->city;
        $student->region = $this->region;
        $student->postal = $this->postal;
        $student->country = $this->country;
        $student->email = $this->email;
        $student->phone = $this->phone;
        // $student->admission_fee = $this->admission_fee;
        // $student->monthly_fee = $this->monthly_fee;
        // $student->fee_date = $this->fee_date;
        // $student->year = $this->year;
        // $student->section = $this->section;
        $student->save();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Staff updated Successfully', 
        ]);
        return redirect('/admin/all-students');
        $this->updateMode=false;
        $this->resetInputFields();
    }
}
