<?php

namespace app\Http\Livewire\Admin\Subjects;

use Livewire\Component;
use App\Models\subject;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Auth;
 
class Book extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $photo;
    public $edittitle;
    public $editdescription;
    public $editphoto;
    public $searchsubject;
    public $subjects = [];
 

    public function render()
    {
        return view('livewire.admin.subjects.book')->layout('Layouts.app');
    }
    
    public function mount()
    {
        $branchId = Auth::user()->branch_id;
        $this->subjects = subject::orderby('id','desc')->where('branch_id', $branchId)->get();
    }

    public function searchsubjects() {
        $branchId = Auth::user()->branch_id;
        // Non-admins (or branch-specific users) can search only within their own branch
        $this->subjects = subject::where(function ($query) use ($branchId) {
            $query->where('title', 'like', '%' . $this->searchsubject . '%')
                    ->where('branch_id', $branchId);
        })
        ->orWhere(function ($query) use ($branchId) {
            $query->where('description', 'like', '%' . $this->searchsubject . '%')
                    ->where('branch_id', $branchId);
        })
        ->orderby('id', 'desc')
        ->get();
}
    
    // validation ..
    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'photo' => 'required'
    ];

    // save ..
    public function save() 
    {
       $this->validate();

        $subject=new subject;
        $photoname = time().".".$this->photo->getClientOriginalExtension();
        $this->photo->storeAs('subject',$photoname,'public');
        $subject->image = $photoname;
        $subject->title = $this->title;
        $subject->description = $this->description;
        $subject->branch_id = Auth::user()->branch_id;
        $subject->save();
        $branchId = Auth::user()->branch_id;
        $this->subjects = subject::orderby('id','desc')->where('branch_id', $branchId)->get();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Subject Save Successfully!', 
            // 'text' => 'If deleted, you will not be able to recover this imaginary file!'
        ]);

        $this->title = "";
        $this->description = "";
        $this->photo = null;
        $this->image = "";    
    }

    public $delete_id;
    protected $listeners = ['deletesubject'];

    public function deletesubject()
    {
        $subject = Subject::find($this->delete_id);

        // Check if the subject is used in other records
        if ($this->isSubjectInUse($subject)) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',
                'message' => 'Cannot delete subject',
                'text' => 'The subject is assigned to classes, timetables, teachers, quizzes, or assignments.'
            ]);
            return;
        }

        $subject->delete();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Subject Deleted Successfully!', 
            'text' => 'It will no longer be listed.'
        ]);
    }

    // Check if the subject is being used
    private function isSubjectInUse(Subject $subject)
    {
        return DB::table('assignments')->where('subject_id', $subject->id)->exists() ||
               DB::table('assignsections')->where('subject_id', $subject->id)->exists() ||
               DB::table('assignsubjects')->where('subject_id', $subject->id)->exists() ||
               DB::table('assignsteachers')->where('subject_id', $subject->id)->exists() ||
               DB::table('quizzes')->where('subject_id', $subject->id)->exists() ||
               DB::table('year')->where('subject_id', $subject->id)->exists() ||
               DB::table('assignments')->where('subject_id', $subject->id)->exists();
    }

    public function alertConfirm($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('swal:confirmsubject', [
            'type' => 'warning',  
            'message' => 'Are you sure?', 
            'text' => 'If deleted, you will not be able to recover this imaginary file!'
        ]);
    }
}