<?php

namespace App\Http\Livewire\Admin\Complaines;

use Livewire\Component;
use App\Models\complain;
use App\Models\ticket;
use Livewire\WithFileUploads;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\GeneralSetting;
use App\Models\User;
use Auth;

class Allcomplaines extends Component


{
    use WithFileUploads;
    public $updateMode=false;
    public $title;
    public $description;
    public $file;
    public $category;
    public $complain_id;
    public $school = [];
    public $search;
    

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'category' => 'required',
        'file' => 'required',
    ];

    public function render()
    {
        $complain = complain::orderBy('id','asc');
    
        if($this->search) {
            $complain = $complain->where('title', 'like', '%' . $this->search . '%');
        }
    
        $complain = $complain->get();

        $complaincategory = ticket::orderBy('id', 'asc')->get();
        $school = GeneralSetting::first();
    
        return view('livewire.admin.complaines.allcomplaines', compact('complain', 'complaincategory', 'school'))->layout('Layouts.app');
    }
        
        public function rest(){
            $this->search = '';
            $this->render();
        }

        public $delete_id;
        protected $listeners = ['deletecomplain'];

    public function deletecomplain() {

        $complain =complain::find($this->delete_id);
        $complain->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'warning',  
            'message' => 'Complain Delete Successfully!', 
            'text' => 'It will not list on complain table.'
        ]);
    }

    public function search()
    {
        $isMainAdmin = Auth::user()->is_admin;
        $branchId = Auth::user()->branch_id;
        $searchTerm = '%' . $this->search . '%';
    
        if ($isMainAdmin) {
            // Main admin can search all complaints across all branches
            $this->complain = complain::where('title', 'like', $searchTerm)
                ->orWhere('description', 'like', $searchTerm)
                ->orderBy('id', 'desc')
                ->get();
        } else {
            // Non-admins (sub-branch users) can only search complaints in their own branch
            $this->complain = complain::where('title', 'like', $searchTerm)
                ->orWhere('description', 'like', $searchTerm)
                ->where('branch_id', $branchId)
                ->orderBy('id', 'desc')
                ->get();
        }
    }
    

    public function edit($id){
       $this->complain_id = $complain->id;
       $this->title = $complain->title;
       $this->category = $complain->category;
       $this->description = $complain->description;
       $this->file = $complain->file;
    }

    public function cancel()
    {
        $this->updateMode=false;
        $this->reset();
    }

    public function update()
    {
        $this->validate();
        $complain =complain::find($this->complain_id);
        $complain->title = $this->title;
        $complain->category = $this->category;
        $complain->description = $this->description;
        $complain->file = $this->file;
        $complain->save();


        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Complain updated Successfully', 
        ]);
        return redirect('admin/complain');
    }
}