<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\complain;
use App\Models\ticket;
use App\Models\GeneralSetting;
use Carbon\Carbon;


class Createcomplain extends Component
{
    use WithFileUploads;
    public $title;
    public $description;
    public $file;
    public $tracker;
    public $categorycomplain;

    public function render()
    {
        $category = ticket::orderby('id','asc')->get();
        $school = GeneralSetting::first();
        $this->tracker = $school->code;
        return view('livewire.student.createcomplain', compact('category', 'school'))->layout('Layouts.app');
    }

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'file' => 'required',
        'categorycomplain' => 'required',
    ];

    public function save(){
        $this->validate();
        $filePath = $this->file ? $this->file->store('complain','public') : null; 
        $complain = new complain;
        $complain->title = $this->title;
        $complain->tracker = $this->tracker.'-'.Carbon::now()->format('d-Y').'-';
        $complain->description = $this->description;
        $complain->category = $this->categorycomplain;
        $complain->file = $filePath;
        $complain->save();

        $cid = $complain->id;
        $complain->tracker .= $cid;
        $complain->save();


        $this->reset([
            'title', 'description', 'file', 'categorycomplain'
        ]);

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Complain Created Successfully!', 
            'text' => 'Complain save successfully!.'
        ]);
    }

}
