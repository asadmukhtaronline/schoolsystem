<?php

namespace App\Http\Livewire\Admin\Generalsetting;

use Livewire\Component;
use App\Models\GeneralSetting;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditSchool extends Component
{   
    use WithFileUploads;

    public $name;
    public $email;
    public $whatsapp;
    public $landline;
    public $website;
    public $address;
    public $school;
    public $school_id;
    public $photo;
    public $currentPhotoPath;

    public function render(){
        $school = $this->school;
        return view('livewire.admin.generalsetting.edit-school', compact('school'))->layout('Layouts.app');
    }

    public function mount($id){
        $this->school = GeneralSetting::find($id);
        $this->school_id = $this->school->id;
        $this->name = $this->school->name;
        $this->email = $this->school->email;
        $this->whatsapp = $this->school->whatsapp;
        $this->landline = $this->school->landline;
        $this->website = $this->school->website;
        $this->address = $this->school->address;
        $this->photo = $this->school->photo;
        return redirect()->back();

        $this->reset([
            'name', 'email', 'whatsapp', 'landline', 'website', 'address'
        ]);
    }
    

    public function update(){

        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'whatsapp' => 'required|string|max:20',
            'landline' => 'nullable|string|max:20',
            'website' => 'nullable|url|max:255',
            'address' => 'required|string|max:255',
        ]);

        $school = GeneralSetting::find($this->school_id);
        $school->id = $this->school_id;
        $school->name = $this->name;
        $school->email = $this->email;
        $school->whatsapp = $this->whatsapp;
        $school->landline = $this->landline;
        $school->website = $this->website;
        $school->address = $this->address;
        
        if ($this->photo) {
            if ($school->photo) {
            Storage::disk('public')->delete($school->photo);
        }

        $school->photo = $this->photo->store('photos', 'public');
    }
        $school->save();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'School edited Successfully!'
        ]);

        return redirect('/admin/school/all');
        $this->updateMode=false;
    }

}