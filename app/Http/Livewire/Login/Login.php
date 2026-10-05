<?php

namespace App\Http\Livewire\Login;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Redirector;
use App\Models\GeneralSetting;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];

    public function render()
    {
        return view('livewire.login.login')->layout('Layouts.main');
    }
    public function mount()
    {
        $downloader = GeneralSetting::first();

        if (empty($downloader)) {
            return redirect(route('admin.addschool'));
        }
    }


    public function login()
    {
        $this->validate();        
        // Attempt login
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            // User authentication success
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.dashboard');
            } elseif (Auth::user()->is_teacher) {
                return redirect()->route('teacher.dashboard');
            } elseif (Auth::user()->is_student) {
                return redirect()->route('student.dashboard');
            }
        } else {
            session()->flash('error', 'Email or Password were wrong');
        }
    }
}
