<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;

class Notification extends Component
{
    public function render()
    {
        return view('livewire.student.notification')->layout('Layouts.app');
    }
}
