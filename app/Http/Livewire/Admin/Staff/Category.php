<?php

namespace App\Http\Livewire\Admin\Staff;

use Livewire\Component;
use App\Models\staffcategory;
use Livewire\WithFileUploads;
use App\Models\User;
use Auth;

class Category extends Component
{
    use WithFileUploads;

    public $title;
    public $category_id;
    public $categorydescription;
    public $picture;
    public $photo;

    public $updateMode=false;


    public function render()
    {
        $category=staffcategory::all();
        return view('livewire.admin.staff.category',compact('category'))->layout('Layouts.app');
    }

    protected $rules = [
        'title' => 'required',
        'picture' => 'required',
        'categorydescription' => 'required'
    ];

    public function save()
    {
        $this->validate();
        $category=new staffcategory;
        $category->branch_id = Auth::user()->branch_id;
        $category->title=$this->title;
        $category->description=$this->categorydescription;

        $picture = time() . "." . $this->picture->getClientOriginalExtension();
        $this->picture->storeAs('staffcategory', $picture,'public');
        $category->picture = $picture;
        $category->save();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Staff Category Save Successfully!', 
        ]);

        $this->title = "";
        $this->picture = "";
        $this->categorydescription = "";
    }
   
    public $delete_id;   
    protected $listeners = ['deletecategory'];

    public function deletecategory()
    {
        $category=staffcategory::find($this->delete_id);
        $category->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Staff Category Delete Successfully!', 
            'text' => 'It will not list on users table soon.'
        ]);
    }
    public function alertConfirm($id)
    {
        // $category=staffcategory::find($id);

        $this->delete_id = $id;
        $this->dispatchBrowserEvent('swal:confirmcategory', [
            'type' => 'warning',  
            'message' => 'Are you sure?', 
            'text' => 'If deleted, you will not be able to recover this imaginary file!'
        ]);
        
    }

    public function edit($id) 
    {
        $this->updateMode = true;
        $category = StaffCategory::find($id); 
        $this->category_id = $category->id;
        $this->title=$category->title;
        $this->description=$category->description;  
    }

    public function resetInputFields() 
    {
        $this->title ="";
        $this->categorydescription ="";
        $this->picture="";
    }

    public function cancel() 
    {
        $this->updateMode=false;
        $this->resetInputFields();
    }

    public function update() 
    {   
        $category=staffcategory::find($this->category_id);
        $category->title = $this->title;
        $category->description = $this->description;
       // dd($this->picture);
        if($this->picture != " "){
            $picture = time().".".$this->picture->getClientOriginalExtension();
            $this->picture->storeAs('staffcategory', $picture,'public');
            $category->picture=$picture;
        }

        $category->save();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Staff Category updated Successfully', 
        ]);

        $this->updateMode=false;
        $this->resetInputFields();
        $this->emit('update');
    }

}

