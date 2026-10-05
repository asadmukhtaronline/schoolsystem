<?php

namespace app\Http\Livewire\Admin\Subjects;
use App\Models\subject;
use Livewire\WithFileUploads;

use Livewire\Component;
class Editbook extends Component
{
    use WithFileUploads;

    public $title;
    public $subject_id;
    public $image;
    public $photo;
    public $photoname;
    public $description;
   
    public function render()
    {
        $subjects = $this->subject;
        return view('livewire.admin.subjects.editbook',compact('subjects'))->layout('Layouts.app');
    }
    public function mount($id){
        // $this->validate();
        $this->subject = subject::find($id);
        
        // $this->staff_id=$this->staff->id;
        $this->subject_id=$this->subject->id;
        $this->title = $this->subject->title;
        $this->description = $this->subject->description;
        if (!empty($this->photo)){
        $photoname = time().".".$this->photo->getClientOriginalExtension();
        $this->photo->storeAs('storage/subject/',$photoname,'public');
        $subject->image=$photoname;
        $this->image=$subject->image;
        } 
    }
    public function resetInputFields()
    {
            $this->title =" ";
            $this->description =" ";
            $this->image =null;
            $this->photo = null;  
    }
    public function update($id)
    { 
        $subject=subject::find($id);
        $subject->id = $this->subject_id;
        $subject->title = $this->title;
        $subject->description = $this->description;
        if (!empty($this->photo)){
            $photoname = time().".".$this->photo->getClientOriginalExtension();
            $this->photo->storeAs('storage/subject/',$photoname,'public');
            $subject->photo=$photoname;
            }
        $subject->save();
        return redirect('/admin/subjects');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Subjects updated Successfully', 
        ]);
        $this->updateMode=false;
        $this->resetInputFields();
        $this->emit('update');
    }
 
}
