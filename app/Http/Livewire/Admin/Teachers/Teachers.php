<?php

namespace App\Http\Livewire\Admin\Teachers;

use Livewire\Component;

class Teachers extends Component
{
    public function render()
    {
        return view('livewire.admin.teachers.teachers')->layout('Layouts.app');

    }
   
}
