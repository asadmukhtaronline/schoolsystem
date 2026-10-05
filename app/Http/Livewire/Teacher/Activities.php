<?php

namespace App\Http\Livewire\Teacher;

use Livewire\Component;

class Activities extends Component
{
    public function render()
    {
        return view('livewire.teacher.activities')->layout('Layouts.app');
    }
}
