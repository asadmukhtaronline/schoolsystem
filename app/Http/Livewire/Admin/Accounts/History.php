<?php

namespace App\Http\Livewire\Admin\Accounts;

use Livewire\Component;
use App\Models\fee;
use Carbon\Carbon;

class History extends Component
{
    public $fees;

    protected $listeners = ['refreshFees' => '$refresh'];

    public function mount()
    {
        $this->loadFees();
    }

    public function loadFees()
    {
        $this->fees = fee::where('status',1)->orderBy('id', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.admin.accounts.history')
            ->layout('Layouts.app');
    }
}
