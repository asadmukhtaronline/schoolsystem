<?php

namespace App\Http\Livewire\Teacher;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\sectiontimetable;
use App\Models\sectiontimeslot;

class Myclasses extends Component
{
    public function render()
    {   
        $years = sectiontimetable::where('teacher_id', Auth::user()->teacher->id)
                ->with(['year', 'section'])
                ->get();

        return view('livewire.teacher.myclasses', compact('years'))->layout('Layouts.app');
    }
}
  