<?php

namespace App\Http\Livewire\Admin\Students;

use Livewire\Component;
use App\Models\year;

class Newstudents extends Component
{
    public function render()
    {
        $years = year::orderby('id','desc')->get();
        return view('livewire.admin.students.newstudents', compact('years'))->layout('Layouts.app');
    }
}
