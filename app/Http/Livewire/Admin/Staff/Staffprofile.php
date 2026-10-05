<?php

namespace App\Http\Livewire\Admin\Staff;

use App\Models\profilestaff;
use App\Models\staf;
use App\Models\staffcategory;


use Livewire\Component;
use Livewire\WithFileUploads;

class Staffprofile extends Component
{    
    
    use WithFileUploads;
   
    public function render(){
        $staff = $this->profilestaff;
     
        //dd($staff);  
        return view('livewire.admin.staff.staffprofile',compact('staff'))->layout('Layouts.app'); 
    }
    public function download($id)
    {
        $staff = staf::find($id);
        $img = "storage/staff/cnic".$staff->cnic;
        return response()->download(storage_path($img));
      
    }

 public function mount($id){
        $this->profilestaff = staf::find($id);
    }
    
}