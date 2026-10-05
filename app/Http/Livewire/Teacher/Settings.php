<?php

namespace App\Http\Livewire\Teacher;

use Livewire\Component;

class Settings extends Component
{
    public function render()
    {
        return view('livewire.teacher.settings')->layout('Layouts.app');
    }
}
