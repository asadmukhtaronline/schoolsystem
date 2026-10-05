<?php

namespace App\Http\Livewire\Admin\Pagetitle;

use Livewire\Component;

class Pagetitle extends Component
{
    public function render()
    {
        return view('livewire.admin.pagetitle.pagetitle')->layout('Layouts.app');
    }
}
