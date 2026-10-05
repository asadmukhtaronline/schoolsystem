<?php

namespace App\Http\Livewire\Admin\Complaines;

use Livewire\Component;
use App\Models\ticket;
use App\Models\complain;

class Complaincategory extends Component
{
    public $title;
    public function render()
    {
        $tickets = ticket::orderby('id', 'asc')->get();
        return view('livewire.admin.complaines.complaincategory',compact('tickets'))->layout('Layouts.app');
    }
    protected $rules = [
        'title' => 'required',
    ];

    public function save(){
        $this->validate();
        $ticket = new ticket;
        $ticket->title = $this->title;
        $ticket->save();

        $this->reset([
            'title',
        ]);

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Ticket Created Successfully!', 
            'text' => 'Ticket Save Successfully!.'
        ]);
    }

    public $delete_id;
    protected $listeners = ['deletecategory'];

        public function deletecategory() 
    {

        $ticket = ticket::find($this->delete_id);
        $ticket->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'warning',  
            'message' => 'Complain Delete Successfully!', 
            'text' => 'It will not list on complain table.'
        ]);

    }
    
            public function alertConfirm($id)
        {
            $this->delete_id  = $id;
            $this->dispatchBrowserEvent('swal:confirmcategory', [
                    'type' => 'warning',  
                    'message' => 'Are you sure?', 
                    'text' => 'If deleted, you will not be able to recover this imaginary file!'
                ]);
        }
    
}

