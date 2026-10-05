<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;

class Activities extends Component
{
    public function render()
    {
        return view('livewire.student.activities')->layout('Layouts.app');
    }
}
