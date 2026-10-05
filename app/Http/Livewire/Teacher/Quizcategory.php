<?php

namespace App\Http\Livewire\Teacher;
use App\Models\questioncategory;
use Auth;

use Livewire\Component;

class Quizcategory extends Component
{
    public $title;
    public $quiz_id ;
    public function render()
    {
         return view('livewire.teacher.quizcategory',compact('quiz'))->layout('Layouts.app');
    }
    protected $rules = [
        'title' => 'required',
    ];
    public function save()
    {
        $this->validate();
        $quiz=new questioncategory;
        $quiz->title=$this->title;
        $quiz->save();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Quiz Save Successfully!', 
            // 'text' => 'If deleted, you will not be able to recover this imaginary file!'
        ]);
        // session()->flash('messageadd','category added successfully');
        $this->title = " ";
    }

    public $delete_id;   
    protected $listeners = ['deletequiz'];

    public function deletequiz()
    {
        $quiz=questioncategory::find($this->delete_id);
        $quiz->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Quiz Delete Successfully!', 
            'text' => 'It will not list on users table soon.'
        ]);
    }
    public function alertConfirm($id)
    {

        $this->delete_id = $id;
        $this->dispatchBrowserEvent('swal:confirmquiz', [
            'type' => 'warning',  
            'message' => 'Are you sure?', 
            'text' => 'If deleted, you will not be able to recover this imaginary file!'
        ]);
        
    }

    public function edit($id) {
        $this->updateMode = true;
        $quiz=questioncategory::find($id); 
        $this->quiz_id = $quiz->id;
       $this->title=$quiz->title;
}
public function resetInputFields() {
    $this->title =" ";
    
}

public function cancel() {

$this->updateMode=false;
$this->resetInputFields();
}
public function update() {
       
    $quiz=questioncategory::find($this->quiz_id);
    $quiz->title = $this->title;
   
    $quiz->save();
    $this->dispatchBrowserEvent('swal:modal', [
        'type' => 'success',  
        'message' => 'Quiz updated Successfully', 
    ]);
    $this->updateMode=false;
    $this->resetInputFields();
    $this->emit('update');
}
    
    
}
