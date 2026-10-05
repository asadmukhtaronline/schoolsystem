<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;
use App\Models\stuassignment;
use Livewire\WithFileUploads;

class Assignments extends Component
{
    use WithFileUploads;

    public $submitfile;

    public function render()
    {
        return view('livewire.student.assignments')->layout('Layouts.app');
    }
    
    protected $rules = [
        'submitfile' => 'required'
    ];

    public function submitassignment($id){
        $this->validate();
        $fileaddress = time().".".$this->submitfile->getClientOriginalExtension();
        $this->submitfile->storeAs('assignment',$fileaddress,'public');
        $stuassignment = stuassignment::find($id);
        $stuassignment->file = "assignment/".$fileaddress;
        $stuassignment->status = 1;
        $stuassignment->save();
        // sweet alert ..
        
    }
}
