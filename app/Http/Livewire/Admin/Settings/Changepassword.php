<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Validation\ValidationException;

class Changepassword extends Component
{
    public $oldPassword;
    public $newPassword;
    public $confirmPassword;

    protected $rules = [
        'oldPassword' => 'required|string',
        'newPassword' => 'required|string|min:8',
    ];

    // public function changePassword()
    // {
    //     dd($this->oldPassword, $this->newPassword, $this->confirmPassword);
    // }

    public function changePassword()
    {
        
        $this->validate();

        $user = Auth::user();

        if (!Hash::check($this->oldPassword, $user->password)) {
            throw ValidationException::withMessages([
                'oldPassword' => 'The provided password does not match our records.',
            ]);
        }

        $user->password = Hash::make($this->newPassword);
        $user->save();

        session()->flash('message', 'Password successfully updated.');
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.admin.settings.changepassword')->layout('Layouts.app');
    }
}
