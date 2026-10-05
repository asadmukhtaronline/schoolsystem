<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;

class Logout extends Component
{
    public function render()
    {
        return view('livewire.student.logout')->layout('Layouts.app');
    }
}
