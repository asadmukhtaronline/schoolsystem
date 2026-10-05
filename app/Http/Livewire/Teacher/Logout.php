<?php

namespace App\Http\Livewire\Teacher;

use Livewire\Component;

class Logout extends Component
{
    public function render()
    {
        return view('livewire.teacher.logout')->layout('Layouts.app');
    }
}
