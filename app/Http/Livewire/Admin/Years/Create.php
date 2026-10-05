<?php

namespace App\Http\Livewire\Admin\Years;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\year;
use App\Models\User;
use App\Models\subject;
use App\Models\assignsubject;
use Auth;

class Create extends Component
{
    use WithFileUploads;
    public $updateMode=false;
    public $title;
    public $description;
    public $photo;
    public $year_id;
    public $subs = [];
    public function render()
    {
        $years = year::orderby('id','desc')->get();
        $subjects = subject::orderby('id','desc')->get();
        return view('livewire.admin.years.create',compact('years', 'subjects'))->layout('Layouts.app');

    }
    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'photo' => 'required',
    ];
    // save ..
    public function save(){
        $this->validate();
        $photoname = time().".".$this->photo->getClientOriginalExtension();
        $this->photo->storeAs('years',$photoname,'public');
        $years = new year;
        $years->title = $this->title;
        $years->description = $this->description;
        $years->image=$photoname;
        $years->branch_id = Auth::user()->branch_id;
        $years->save();
        $year_id = $years->id;
        foreach($this->subs as $index => $sub){
            $year_id = $years->id;
            $assignsubject = new assignsubject;
            $assignsubject->subject_id = $index;
            $assignsubject->year_id = $year_id;
            $assignsubject->save(); 
        }
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Class Saved Successfully!', 
            // 'text' => 'If deleted, you will not be able to recover this imaginary file!'
        ]);
        $this->title = " ";
        $this->description = " ";
        $this->photo = null;
        $this->subs = " ";

        return redirect(route('admin.allclass'));
    }
    
}