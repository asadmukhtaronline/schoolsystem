<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use App\Models\staf;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Profilesettings extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $photo;
    public $cnic;
    public $whatsapp;
    public $gender;
    public $description;

    public function mount()
    {
        $this->user = Auth::user();
        $staff = Staf::where('user_id', $this->user->id)->first();

        if ($staff) {
            $this->name = $staff->name;
            $this->email = $staff->email;
            $this->photo = $staff->image;
            $this->cnic = $staff->cnic;
            $this->whatsapp = $staff->whatsapp;
            $this->gender = $staff->gender;
            $this->description = $staff->description;
        } else {
            $this->name = Auth::user()->name;
            $this->email = Auth::user()->email;
        }
    }

    public function render()
    {
        return view('livewire.admin.settings.profilesettings')->layout('Layouts.app');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'whatsapp' => 'required|string|max:20',
            'cnic' => 'required|string|max:20',
            'gender' => 'required|string',
            'description' => 'required|string|max:255',
            'photo' => 'nullable|max:1024'
        ]);

        $staff = Staf::where('user_id', $this->user->id)->first();
        $photoPath = null;

        if ($this->photo) {
            if ($this->photo instanceof \Livewire\TemporaryUploadedFile) {
                $photoPath = $this->photo->store('staff', 'public');
            } else {
                $photoPath = $this->photo;
            }
        }

        if ($staff) {
            $staff->name = $this->name;
            $staff->email = $this->email;
            $staff->cnic = $this->cnic;
            $staff->whatsapp = $this->whatsapp;
            $staff->gender = $this->gender;
            $staff->description = $this->description;

            if ($photoPath) {
                $staff->image = $photoPath;
            }

            $staff->save();
        }

        $user = $this->user;
        $user->name = $this->name;
        $user->email = $this->email;
        if ($photoPath) {
            $user->image = $photoPath;
        }
        $user->phone = $this->whatsapp;
        $user->description = $this->description;
        $user->save();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Settings changed successfully!'
        ]);
    }
}
