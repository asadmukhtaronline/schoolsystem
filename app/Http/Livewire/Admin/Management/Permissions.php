<?php

namespace app\Http\Livewire\Admin\Management;

use Livewire\Component;
use App\Models\permission;
use App\Models\User;
use Auth;

class Permissions extends Component
{

    public $title;
    public $url_slug;   
    public $route_name;
    public $permission_id;
    public $updateMode = false;

    public function render()
    {
        $branchId = Auth::user()->branch_id;

        $permission = permission::orderby('id','desc')->get();
        return view('livewire.admin.management.permissions',compact('permission'))->layout('Layouts.app');
    }

    protected $rules = [
        'title' => 'required',
        'url_slug' => 'required',
        'route_name' => 'required',
    ];

    // save ..
    public function save()
    {
        $this->validate();
        $permission = new permission;
        $permission->title = $this->title;
        $permission->url_slug = $this->url_slug;
        $permission->route_name = $this->route_name;
        $permission->branch_id = Auth::user()->branch_id;
        $permission->save();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Permission Save Successfully!', 
            'text' => 'If deleted, you will not be able to recover this imaginary file!'
        ]);

        $this->title = "";
        $this->url_slug = "";
        $this->route_name = "";
    
    }

    public $delete_id;
    protected $listeners = ['deletepermissions'];

    public function deletepermissions()
    {
        $permission=permission::find($this->delete_id);
        $permission->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Permission Delete Successfully!', 
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
        $this->dispatchBrowserEvent('swal:confirmperm', [
            'type' => 'warning',  
            'message' => 'Are you sure?', 
            'text' => 'If deleted, you will not be able to recover this imaginary file!'
        ]);
    }


    public function edit($id)
    {
        $this->updateMode=true;
        $permission=permission::where('id',$id)->first();
        $this->permission_id=$permission->id;
        $this->title=$permission->title;
        $this->url_slug=$permission->url_slug;
        $this->route_name=$permission->route_name;
    }

    public function resetInputFields()
    {
        $this->title ="";
        $this->url_slug ="";
        $this->route_name="";
    }

    public function cancel()
    {
        $this->updateMode=false;
        $this->resetInputFields();
    }
    public function update()
    {
        $permission=permission::find($this->permission_id);
        $permission->title = $this->title;
        $permission->url_slug = $this->url_slug;
        $permission->route_name = $this->route_name;
        $permission->save();

        $this->updateMode=false;

        $this->resetInputFields();

        $this->emit('update');

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Permission Updated Successfully', 
        ]);
    }
    
}
