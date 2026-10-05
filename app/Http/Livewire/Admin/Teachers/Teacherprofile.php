<?php
namespace app\Http\Livewire\Admin\Teachers;

use Livewire\Component;
use App\Models\teacher;
use App\Models\subject;
use App\Models\teacherslot;
use App\Models\timeslot;
use App\Models\timetable;
use App\Models\sectiontimetable;
use App\Models\day;

class TeacherProfile extends Component
{
    public $profileteacher;
    public $timeslots;
    public $days;
    public $status;

    public function mount($id)
    {
        $this->profileteacher = teacher::find($id);
        $this->timeslots = timeslot::orderBy('id')->get();
        $this->days = day::orderBy('id')->get();
    }

    public function render()
    {
        $days = day::orderBy('id')->get();
        $timeslots = timeslot::orderBy('id')->get();
        $teacherslots = teacherslot::where('teacher_id', $this->profileteacher->id)->get();
        $sectiontimetable = sectiontimetable::where('teacher_id', $this->profileteacher->id)->pluck('subject_id');

        return view('livewire.admin.teachers.teacherprofile', [
            'teacher' => $this->profileteacher,
            'days' => $days,
            'timeslots' => $timeslots,
            'teacherslots' => $teacherslots,
            'sectiontimetable' => $sectiontimetable,
        ])->layout('Layouts.app');
    }
}