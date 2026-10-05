<?php

namespace App\Http\Livewire\Admin\Complaines;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\complain;
use App\Models\ticket;
use App\Models\GeneralSetting;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Redirect;


class Complainprofile extends Component

{
    use WithFileUploads;
    public $file;
    public $complain;
    public $status = true;
    public function render()
    {
        $branchId = Auth::user()->branch_id;

        if(!$this->complain) {
            return'';
        }
        // $complain = $this->complain;
        return view('livewire.admin.complaines.complainprofile' , ['complain' => $this->complain])->layout('Layouts.app');
    }

    public function mount($id){
        $this->complain = complain::find($id);
    }

    public function downloadFile($filePath)

    { 
        // Determine the full path to the file
        $fullPath = storage_path('app/public/' . $filePath);
        // Check if the file exists
        if (file_exists($fullPath)) {
                
            // Return the file as a download response
            return response()->download($fullPath);  
        }
         else {
            // File not found, handle error (e.g., show a message)
            // You can also dispatch a browser event to show a notification
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',
                'message' => 'File Not Found',
                'text' => 'The file you are trying to download does not exist.',
            ]);
        }
    }

    public function close()

    {
        if ($this->complain->status !== 'closed') {
            $this->complain->update(['status' => 'closed']);
            $this->status = false;
    }
    $this->dispatchBrowserEvent('swal:modal', [
        'type' => 'success',  
        'message' => 'Complain Close Successfully!', 
        'text' => 'Close successfully!.'
    ]);
}
}
