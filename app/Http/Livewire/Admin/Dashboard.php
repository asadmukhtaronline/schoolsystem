<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\teacher;
use App\Models\student;
use App\Models\staf;
use App\Models\user;
use App\Models\subject;
use App\Models\year;
use App\Models\section;
use App\Models\quiz;
use App\Models\assignment;
use App\Models\enrollment;
use App\Models\complain;
use App\Models\role;

class Dashboard extends Component
{
    // public function render()
    // {
    //     return view('livewire.admin.dashboard');
    // }
    public $totalTeachers;

    public function mount()
    {
        $this->totalTeachers = Teacher::count();
        $this->totalStudents = Student::count();
        $this->totalStaff = Staf::count();
        $this->totalUser = User::count();
        $this->totalSubject = Subject::count();
        $this->totalYear = Year::count();
        $this->totalSection = Section::count();
        $this->quizes = quiz::count();
        $this->assignment = assignment::count();
        $this->enrollment = enrollment::count();
        $this->complain = complain::count();
        $this->roles = role::count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard', [
            'totalTeachers' => $this->totalTeachers,
            'totalStudents' => $this->totalStudents,
            'totalStaff' => $this->totalStaff,
            'totalUser' => $this->totalUser,
            'totalSubject' => $this->totalSubject,
            'totalYear' => $this->totalYear,
            'totalSection' => $this->totalSection,
        ])->layout('Layouts.app');
    }
}
