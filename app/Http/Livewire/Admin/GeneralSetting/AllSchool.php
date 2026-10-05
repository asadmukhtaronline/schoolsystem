<?php

namespace App\Http\Livewire\Admin\Generalsetting;
use App\Models\GeneralSetting;
use Livewire\Component;

class AllSchool extends Component
{
    public function render()
    {
        $school = GeneralSetting::all();
        return view('livewire.admin.generalsetting.all-school', compact('school'))->layout('Layouts.app');
    }

    public $delete_id;
    protected $listeners = ['deleteschool'];

    public function deleteschool()
    {
        $school = GeneralSetting::find($this->delete_id);
        $school->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'error',  
            'message' => 'School Deleted!', 
            'text' => 'It will not list on schools table.'
        ]);
    }
    
     
    public function alertConfirm($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('swal:confirmschool', [
            'type' => 'warning',  
            'message' => 'Are you sure?', 
            'text' => 'If deleted, you will not be able to recover this data!'
        ]);
    }
}
