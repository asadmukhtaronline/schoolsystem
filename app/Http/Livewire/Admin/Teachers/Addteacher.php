<?php

namespace App\Http\Livewire\Admin\teachers;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\{teacher, subject, assignteacher, teacherslot, timeslot, timetable, User};
use Illuminate\Support\Facades\Hash;
use Auth;

class Addteacher extends Component
{
    use WithFileUploads;

    public $name, $father_name, $cnic, $email, $whatsapp, $description, $address, $gender, $dob, $contract, $photo, $teacher_id, $subject_id, $timetables, $subs = [];

    public function render()
    {
        $subjects = subject::orderby('id', 'desc')->get();
        $addteachers = teacher::orderby('id', 'desc')->get();
        return view('livewire.admin.teachers.addteacher', compact('addteachers', 'subjects'))->layout('Layouts.app');
    }

    protected $rules = [
        'name' => 'required',
        'father_name' => 'required',
        'cnic' => 'required|unique:teachers,cnic',
        'email' => 'required|email|unique:teachers,email',
        'whatsapp' => 'required|unique:teachers,whatsapp',
        'description' => 'required',
        'address' => 'required',
        'gender' => 'required',
        'dob' => 'required',
        'contract' => 'required|mimes:pdf|max:2048', // Validation for contract upload (PDF, max size: 2MB)
        'photo' => 'required|image|max:1024', // Image validation for photo upload (max size: 1MB)
        'subs' => 'nullable'
    ];

    public function save()
    {
        $this->validate();
        $teachers = new teacher;
        $photoname = time() . "." . $this->photo->getClientOriginalExtension();
        $this->photo->storeAs('teachers', $photoname, 'public');
        $contractName = time() . "." . $this->contract->getClientOriginalExtension();
        $this->contract->storeAs('teachers', $contractName, 'public');

        $teachers->contract = $contractName;
        $teachers->name = $this->name;
        $teachers->email = $this->email;
        $teachers->whatsapp = $this->whatsapp;
        $teachers->father_name = $this->father_name;
        $teachers->cnic = $this->cnic;
        $teachers->description = $this->description;
        $teachers->address = $this->address;
        $teachers->gender = $this->gender;
        $teachers->dob = $this->dob;
        $teachers->picture = $photoname;
        $teachers->branch_id = Auth::user()->branch_id;

        $users = new User;
        $users->name = $this->name;
        $users->email = $this->email;
        $users->password = Hash::make('12344321');
        $users->is_teacher = 1; // Set is_teacher to 1
        $users->branch_id = Auth::user()->branch_id;
        $users->save();

        $user_id = $users->id;
        $teachers->user_id = $user_id;
        $teachers->save();

        foreach ($this->subs as $index => $sub) {
            $assignteacher = new assignteacher;
            $assignteacher->teacher_id = $teachers->id;
            $assignteacher->subject_id = $index;
            $assignteacher->save();
        }

        $timetables = timetable::all();
        foreach ($timetables as $timetable) {
            $teacherslot = new teacherslot;
            $teacherslot->timetable_id = $timetable->id;
            $teacherslot->teacher_id = $teachers->id;
            $teacherslot->status = 0;
            $teacherslot->save();
        }

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Teacher Saved Successfully!',
        ]);

        // Reset form fields after saving
        $this->reset([
            'name', 'father_name', 'description', 'address', 'gender', 'contract', 'dob', 'cnic', 'photo', 'whatsapp'
        ]);

        return redirect(route('admin.allteachers'));
    }

    public function deleteteachers($id)
    {
        $teacher = teacher::find($id);
        teacherslot::where('teacher_id', $teacher->id)->delete();
        $teacher->delete();
    }
}
