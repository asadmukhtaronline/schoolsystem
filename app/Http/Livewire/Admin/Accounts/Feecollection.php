<?php

namespace App\Http\Livewire\Admin\Accounts;

use Livewire\Component;
use App\Models\enrollment;

class Feecollection extends Component
{
    public $fees;
    public function render()
    {
        return view('livewire.admin.accounts.feecollection')->layout('Layouts.app');
    }
    // mount function ..
    public function mount(){
        $this->fees = enrollment::orderby('id','desc')->get();
    }
}
