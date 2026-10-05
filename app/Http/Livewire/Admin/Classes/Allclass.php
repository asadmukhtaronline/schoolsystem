<?php

namespace App\Http\Livewire\Admin\Classes;

use Livewire\Component;
use App\Models\year;
use App\Models\User;
use App\Models\teacher;
use App\Models\enrollment;
use App\Models\student;
use App\Models\sectiontimetable;
use App\Models\sectiontimeslot;
use App\Models\timetable;
use App\Models\teacherslot;
use App\Models\assignsubject;
use App\Models\assignsection;
use Livewire\WithFileUploads;
use Auth;

class Allclass extends Component
{
    use WithFileUploads;

    public $updateMode = false;
    public $photo;
    public $year_id;
    public $years = [];
    public $searchclass;

    public function render()
    {
        return view('livewire.admin.classes.allclass')->layout('Layouts.app');
    }

    public function mount(){
        $branchId = Auth::user()->branch_id;
        $this->years = year::where('branch_id', $branchId)->orderby('id', 'desc')->get();
    }

    // for search ..
    public function searchyears()
    {
        $isMainAdmin = Auth::user()->is_admin;
        $branchId = Auth::user()->branch_id;
        $searchTerm = '%' . $this->searchclass . '%';
            // Non-admins (or sub-branch users) can only search years in their own branch
            $this->years = year::where('title', 'like', $searchTerm)
                ->where('branch_id', $branchId)  // Restrict to the user's branch
                ->orderBy('id', 'desc')
                ->get();
    }
    

    // Delete function
    public $delete_id;
    protected $listeners = ['deleteyears'];

    public function deleteyears()
    {
        $year = year::find($this->delete_id);

        if ($year) {
            
            // Delete related assignsubjects
            if ($year->assignsubject()->exists()) {
                $year->assignsubject()->delete();
            }

            // Delete related sections
            if ($year->sections()->exists()) {
                $year->sections()->delete();
            }

            // Delete related sectiontimetables and associated data
            $sectiontimetables = sectiontimetable::where('year_id', $year->id)->get();

            foreach ($sectiontimetables as $sectiontimetable) {
            // Delete sectiontimeslots
            $sectiontimeslots = sectiontimeslot::where('sectiontimetable_id', $sectiontimetable->id)->get();

            foreach ($sectiontimeslots as $sectiontimeslot) {
                // Delete related timetable
                $timetable = timetable::where('day_id', $sectiontimeslot->day_id)
                                      ->where('timeslot_id', $sectiontimeslot->timeslot_id)
                                      ->first();
                if ($timetable) {
                    // Delete related teacherslot
                    $teacherslot = teacherslot::where('teacher_id', $sectiontimetable->teacher_id)
                                              ->where('timetable_id', $timetable->id)
                                              ->first();
                    if ($teacherslot) {
                        $teacherslot->status = 0; // Reset status to 0
                        $teacherslot->save();
                    }
                }

                // Delete sectiontimeslot
                $sectiontimeslot->delete();
            }

            // Delete sectiontimetable
            $sectiontimetable->delete();
        }


            // Find all students related to this year and delete them
            $enrollments = enrollment::whereHas('year', function ($query) use ($year) {
                $query->where('id', $year->id);
            })->get();

            foreach ($enrollments as $enrollment) {
                // Delete related student details
                $enrollment->student()->delete();
                $enrollment->delete();
            }

            // Delete the year (class) itself
            $year->delete();

            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Class deleted Successfully!', 
                'text' => 'It will not list on users table soon.'
            ]);

            return redirect()->route('admin.allclass');
        }
    }

    public function alertConfirm($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',  
            'message' => 'Are you sure?', 
            'text' => 'If deleted, you will not be able to recover this class!'
        ]);
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $year = year::findOrFail($id);
        $this->year_id = $year->id;
        $this->title = $year->title;
        $this->description = $year->description;
    }

    public function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
        $this->picture = '';
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $year = year::find($this->year_id);

        if ($year) {
            $year->title = $this->title;
            $year->description = $this->description;

            if (!empty($this->picture)) {
                $picture = time() . '.' . $this->picture->getClientOriginalExtension('');
                $this->picture->storeAs('year', $picture, 'public');
                $year->picture = $picture;
            }

            $year->save();
            $this->updateMode = false;
            $this->resetInputFields();
            $this->emit('update');
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Class updated Successfully', 
            ]);
        }
    }
}
