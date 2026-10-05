<?php

namespace App\Http\Livewire\Teacher;

use Livewire\Component;
use App\Models\User;
use Auth;

class Profilesetting extends Component
{
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.teacher.profilesetting')->layout('Layouts.app');
    }
}
