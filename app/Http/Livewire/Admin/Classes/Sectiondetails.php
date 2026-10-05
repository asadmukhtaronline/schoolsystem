<?php

namespace app\Http\Livewire\Admin\Classes;
use App\Mail\Teachertimetable;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\section;
use App\Models\assignsubject;
use App\Models\sectiontimetable;
use App\Models\teacher;
use App\Models\day;
use App\Models\timeslot;
use App\Models\year;
use App\Models\assigntime;
use App\Models\sectiontimeslot;
use App\Models\timetable;
use App\Models\teacherslot;
use App\Models\Subject;
use App\Models\User;
use Auth;
use PDF;

class Sectiondetails extends Component
{
    public $subject;
    public $days = [];
    public $teacher;
    public $section_id;
    public $year_id;
    public $current_section_table;
    public $timslot;
    public $teachers = [];
    public $steacher;
    public $year;

    public function render()
    {
        $branchId = Auth::user()->branch_id;
        $section = $this->sectiondetail;
        $subjects = Assignsubject::where('year_id', $this->year_id)->get();
        $day = day::all();
        $sectiontimetable = sectiontimetable::where('section_id', $this->sectiondetail->id)->get();
        $timeslots = timeslot::all();
        return view('livewire.admin.classes.sectiondetails', compact('section', 'subjects', 'day', 'sectiontimetable', 'timeslots'))->layout('Layouts.app');
    }

    public function mount($id)
    {
        $this->sectiondetail = section::find($id);
        $this->year_id = $this->sectiondetail->year_id;
        $this->teacher_id = $this->sectiondetail->teacher_id;
    }

    public function save()
    {
        $this->validate([
            'subject' => 'required',
        ]);

        $sectiontimetable = new sectiontimetable;
        $sectiontimetable->subject_id = $this->subject;
        $sectiontimetable->section_id = $this->sectiondetail->id;
        $sectiontimetable->year_id = $this->year_id;
        $sectiontimetable->branch_id = Auth::user()->branch_id;
        $sectiontimetable->save();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Timetable Save Successfully!',
        ]);

        $this->subject = "";
    }

    public function toggleDay($dayId)
    {
        if (in_array($dayId, $this->days)) {
            $key = array_search($dayId, $this->days);
            unset($this->days[$key]);
        } else {
            $this->days[] = $dayId;
        }
    }

    public function select()
    {
        if (empty($this->days)) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',
                'message' => 'Please select at least one day.',
            ]);
            return;
        }

        $sectiontimetable = sectiontimetable::find($this->current_section_table);
        foreach ($this->days as $index => $dayId) {
            $sectiontimeslot = new sectiontimeslot;
            $sectiontimeslot->day_id = $dayId;
            $sectiontimeslot->branch_id = Auth::user()->branch_id;
            $sectiontimeslot->section_id = $this->sectiondetail->id;
            $sectiontimeslot->sectiontimetable_id = $this->current_section_table;
            $sectiontimeslot->save();
        }

        $this->days = [];

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Days Selected Successfully!',
        ]);
    }

    public function selectcurrenctsectiontimetable($id)
    {
        $this->current_section_table = $id;
    }

    public function cancel()
    {
        $this->updateMode = false;
    }

    public function update()
    {
        $this->updateMode = false;
    }

    public $delete_id;
    protected $listeners = ['deletesection'];

    public function deletesection()
    {
    $sectiontimetable = sectiontimetable::find($this->delete_id);

    $sectiontimeslots = sectiontimeslot::where('sectiontimetable_id', $this->delete_id)->get();

    foreach ($sectiontimeslots as $sectiontimeslot) {
        $sectiontimeslot->delete();
    }

    foreach ($sectiontimeslots as $sectiontimeslot) {
        $timetable = timetable::where('day_id', $sectiontimeslot->day_id)
                              ->where('timeslot_id', $sectiontimeslot->timeslot_id)
                              ->first();
        if ($timetable) {
            $teacherslot = teacherslot::where('teacher_id', $sectiontimetable->teacher_id)
                                      ->where('timetable_id', $timetable->id)
                                      ->first();
            if ($teacherslot) {
                $teacherslot->status = 0; // Reset status to 0
                $teacherslot->save();
            }
        }
    }

    $sectiontimetable->delete();

    $this->dispatchBrowserEvent('swal:modal', [
        'type' => 'success',
        'message' => 'Timetable Delete Successfully!',
        'text' => 'It will not list on users table soon.'
    ]);
}

    public function alertConfirm($id)
    {
        $this->delete_id = $id;

        $this->dispatchBrowserEvent('swal:confirmsection', [
            'type' => 'warning',
            'message' => 'Are you sure?',
            'text' => 'If deleted, you will not be able to recover this imaginary file!'
        ]);
    }

    public function getteacher($day)
    {
        $timetable = timetable::where('day_id', $day)->where('timeslot_id', $this->timslot)->first();
        $teacherslot = teacherslot::where('timetable_id', $timetable->id)->where('status', 0)->get();
        $this->teachers = $teacherslot;
    }

    public function select_teacher($id)
    {
        $stimeslot = sectiontimeslot::find($id);
        $sectiontimetable = sectiontimetable::find($stimeslot->sectiontimetable_id);
        $timetable = timetable::where('day_id', $stimeslot->day_id)->where('timeslot_id', $this->timslot)->first();
        $stimeslot->timetable_id = $timetable->id;
        $stimeslot->timeslot_id = $this->timslot;
        $stimeslot->save();
    
        $sectiontimetable->teacher_id = $this->steacher;
        $sectiontimetable->save();
    
        $teacherslot = teacherslot::where('teacher_id', $this->steacher)->where('timetable_id', $timetable->id)->first();
        $teacherslot->status = 1;
        $teacherslot->save();
    
        $teacher = teacher::find($this->steacher);
        $sections = section::where('id', $sectiontimetable->section_id)->get();
        $class = year::find($this->year_id);
        $day = day::find($stimeslot->day_id); // Fetch the day information
        
        // if ($teacher) {
        //     // Send the email to the teacher with the day information
        //     Mail::to($teacher->email)->send(new Teachertimetable($teacher, $sections, $class, $timetable, $day));
        // }
    
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Timetable assigned Successfully!',
        ]);
    }
    

}
