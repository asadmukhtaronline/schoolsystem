<?php

namespace App\Http\Livewire\Admin\Complaines;

use Livewire\Component;
use App\Models\complain;

class Complainpdf extends Component
{
    public function render()
    {
        $complain = complain::orderby('id','asc')->get();
        return view('livewire.admin.complaines.complainpdf', compact('complain'))->layout('Layouts.app');
    }
    public function mount($id){
        $complain = complain::find($id);
    }
}
