<?php

namespace app\Http\Livewire\Admin\Management;

use Livewire\Component;
use App\Models\role;

class Roles extends Component
{
    public $title;
    public $status;
    public $updateMode=false;
    
    public function render()
    {
        $role = role::orderby('id','desc')->get();
        return view('livewire.admin.management.roles',compact('role'))->layout('Layouts.app');
    }
    protected $rules = [
        'title' => 'required',     
        'status' => 'required',
    ];   
    // save ..
    public function save(){
        $this->validate();
        $role = new role;
        $role->title = $this->title;
        $role->status = $this->status;
        $role->save();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Role Created Successfully!', 
        ]);
        $this->title = " ";
        $this->status = " ";
    }
       public $delete_id;
       protected $listeners = ['deleteroles'];
   
       public function deleteroles()
       {
           $role=role::find($this->delete_id);
           $role->delete();
           $this->dispatchBrowserEvent('swal:modal', [
               'type' => 'success',  
               'message' => 'Role Delete Successfully!', 
               'text' => 'It will not list on users table soon.'
           ]);
       }
       
       /**
        * Write code on Method
        *
        * @return response()
        */
       public function alertConfirm($id)     
       {
           $this->delete_id = $id;
           $this->dispatchBrowserEvent('swal:confirmrole', [
               'type' => 'warning',  
               'message' => 'Are you sure?', 
               'text' => 'If deleted, you will not be able to recover this imaginary file!'
           ]);
       }

    public function edit($id)
    {
       
            $this->updateMode=true;
            $role=role::where('id',$id)->first();
          
            $this->title=$role->title;
            $this->status=$role->status;
    }
    public function resetInputFields()
    {
            $this->title =" ";
            $this->status =" ";
    }
    public function cancel()
    {
        $this->updateMode=false;
        $this->resetInputFields();
    }
    public function update($id)
    {
       
        $role=role::find($id);

        $role->title = $this->title;
        $role->status = $this->status;
        $role->save();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Role Update Successfully!', 
        ]);
        $this->updateMode=false;
        $this->resetInputFields();
        $this->emit('update');
    }
}
