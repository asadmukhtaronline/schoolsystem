<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;

class Settings extends Component
{
    public function render()
    {
        return view('livewire.student.settings')->layout('Layouts.app');
    }
}
