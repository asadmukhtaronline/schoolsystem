<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\fee;
use App\Models\enrollment;
class invoices extends Controller
{
    public $fees;
    public function render()
    {
        $enrollment = $this->enrollment;
        $school = GeneralSetting::orderBy('id', 'desc')->get();
        return view('livewire.admin.students.accounts', compact('enrollment', 'school'));
    }
public function mount($id){
    $this->fees = fee::find($id);
}
}