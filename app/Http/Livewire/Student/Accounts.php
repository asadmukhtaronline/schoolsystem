<?php

namespace App\Http\Livewire\Student;
use Livewire\Component;

class Accounts extends Component
{
    public function render()
    {
        return view('livewire.student.accounts')->layout('Layouts.app');
    }
}
