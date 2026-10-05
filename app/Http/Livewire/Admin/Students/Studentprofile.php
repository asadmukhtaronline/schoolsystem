<?php

namespace App\Http\Livewire\Admin\Students;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\student;
use App\Models\enrollment;
use App\Models\year;
use App\Models\section;
class Studentprofile extends Component
{
    use WithFileUploads;

    public $students;

    public function render()
    {
        $students = $this->students;
        return view('livewire.admin.students.studentprofile')->layout('Layouts.app');
    }

    public function mount($id){
        $this->students = student::find($id);
    }
}
