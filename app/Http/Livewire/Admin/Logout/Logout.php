<?php

namespace App\Http\Livewire\Admin\Logout;

use Livewire\Component;

class Logout extends Component
{
    public function render()
    {
        return view('livewire.admin.logout.logout')->layout('Layouts.app');
    }
}
