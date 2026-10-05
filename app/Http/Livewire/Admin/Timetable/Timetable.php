<?php

namespace App\Http\Livewire\Admin\Timetable;
use App\Models\timeslot;
use App\Models\day;
use App\Models\assigntime;
use App\Models\timetable As timed;


use Livewire\Component;

class Timetable extends Component
    
{
    public $start_time;
    public $end_time;
    public $title;


    public function render()

    {
        // $day=day::all();
        // $timeslot=timeslot::all();

        $timeslot = timeslot::orderby('id',)->get();
        $day = day::orderby('id',)->get();


        return view('livewire.admin.timetable.timetable',compact('day','timeslot'))->layout('Layouts.app');
    }
    public $delete_id;
    protected $listeners = ['deletetimeslot','deleteday'];

    public function deletetimeslot()
    {
        $timeslot=timeslot::find($this->delete_id);
        $timeslot->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Time Delete Successfully!', 
            'text' => 'It will not list on users table soon.'
        ]);
    }
  
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function alertConfirm($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('swal:confirmtime', [
            'type' => 'warning',  
            'message' => 'Are you sure?', 
            'text' => 'If deleted, you will not be able to recover this imaginary file!'
        ]);
        
        
    }
    public function deleteday()
    {
        $day=day::find($this->delete_id);
        $day->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Day Delete Successfully!', 
            'text' => 'It will not list on users table soon.'
        ]);
    }
    public function allertConfirm($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('swal:confirmday', [
            'type' => 'warning',  
            'message' => 'Are you sure?', 
            'text' => 'If deleted, you will not be able to recover this imaginary file!'
        ]);
        
        
    }
    
    public function savetime()
    {

         $this->validate([
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
         
         $timeslot = new timeslot;
         $timeslot->start_time =$this->start_time;
         $timeslot->end_time = $this->end_time;
         $timeslot->end_time = $this->end_time;
         $timeslot->save();
         $this->reset(['start_time', 'end_time']);
         $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Time Save Successfully!', 
        ]);
    }

    public function saveday() 
    {
        $this->validate([
            'title' => 'required',
        ]);
    
        $day = new day;
        $day->title = $this->title;
        $day->save();
        $day_id = $day->id;
    
        $this->reset(['title']);
    
        $timetables = timeslot::all();
    
        foreach($timetables as $timeslot) {
            $timetable = new timed;
            $timetable->day_id = $day_id;
            $timetable->timeslot_id = $timeslot->id;
            $timetable->save();        
        }
    }
    
    public function createAutoDays()
    {
        $daysOfWeek = [
            'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'
        ];
    
        foreach ($daysOfWeek as $dayName) {
            $day = new \App\Models\Day();
            $day->title = $dayName;
            $day->save();
        }
    
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Days Created Successfully!',
        ]);
    }
    
    public function createDefaultTimeSlots()
    {
        $startTime = '00:00';
        $interval = 60;
    
        for ($i = 0; $i < 12; $i++) {
            // Calculate end time
            $startDateTime = new \DateTime($startTime);
            $endDateTime = clone $startDateTime;
            $endDateTime->modify("+$interval minutes");
    
            // Create new time slot
            $timeslot = new timeslot;
            $timeslot->start_time = $startDateTime->format('H:i');
            $timeslot->end_time = $endDateTime->format('H:i');
            $timeslot->save();
    
            // Update start time for next slot
            $startTime = $endDateTime->format('H:i');
        }
    
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => '12 Time Slots Created Successfully!',
        ]);
    }
}
