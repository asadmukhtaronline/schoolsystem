<?php

namespace App\Http\Livewire\Admin\Classes;

use Livewire\Component;
use App\Models\teacher;

class Updatepopup extends Component
{
    public function render()
    {
        $addteachers = teacher::orderby('id','desc')->get();
        return view('livewire.admin.classes.updatepopup', compact('addteachers'))->layout('Layouts.app');
    }
}
