<?php

namespace App\Http\Livewire\Admin\Timetable;

use Livewire\Component;
use App\Models\timeslot;
use App\Models\day;

class Createtimetable extends Component
{
    public function render()
    {
        $day = day::orderby('id',)->get();
        $timeslot = timeslot::orderby('id',)->get();
        return view('livewire.admin.timetable.createtimetable', compact('day', 'timeslot'))->layout('Layouts.app');
    }
}
