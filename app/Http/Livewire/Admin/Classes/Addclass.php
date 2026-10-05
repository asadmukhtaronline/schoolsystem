<?php

namespace App\Http\Livewire\Admin\Classes;

use Livewire\Component;

class Addclass extends Component
{
    public function render()
    {
        return view('livewire.admin.classes.addclass')->layout('Layouts.main');
    }
}
