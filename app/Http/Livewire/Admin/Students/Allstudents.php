<?php

namespace App\Http\Livewire\Admin\Students;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\student;
use App\Models\User;
use App\Models\enrollment;
use App\Models\fee;
use Auth;

class Allstudents extends Component
{
    use WithFileUploads;
    public $student=[];
    public $searchstudent;
    public $photo;
    public $student_id;
    public $updateMode=false;

    public function render()
    {   
        return view('livewire.admin.students.allstudents')->layout('Layouts.app');
    }

    public function mount()
    {
        $this->students = student::where('branch_id',Auth::user()->branch_id)->orderBy('id', 'asc')->get();
    }

    public function searchstudents() {
        $isMainAdmin = Auth::user()->is_admin;
        $branchId = Auth::user()->branch_id;
        $searchTerm = '%' . $this->searchstudent . '%';    
        // Non-admins (or sub-branch users) can only search students in their own branch
        $this->students = Student::where(function ($query) use ($searchTerm, $branchId) {
                $query->where('name', 'like', $searchTerm)
                        ->where('branch_id', $branchId);
            })
            ->orWhere(function ($query) use ($searchTerm, $branchId) {
                $query->where('parent_name', 'like', $searchTerm)
                        ->where('branch_id', $branchId);
            })
            ->orWhere(function ($query) use ($searchTerm, $branchId) {
                $query->where('email', 'like', $searchTerm)
                        ->where('branch_id', $branchId);
            })
            ->orWhere(function ($query) use ($searchTerm, $branchId) {
                $query->where('phone', 'like', $searchTerm)
                        ->where('branch_id', $branchId);
            })
            ->orderBy('id', 'desc')
            ->get();
    }
    
    

    // delete funtion
    public $delete_id;
    protected $listeners = ['deletestudents'];

    public function deletestudents()
    {
        $student = student::find($this->delete_id);
        if($student){
            $enrollment = enrollment::where('student_id',$student->id)->get();
            $fee = fee::where('student_id',$student->id)->get();
            $user=User::find($student->user_id);
            // enrollment ..
            if($enrollment) {
                $enrollment = enrollment::where('student_id',$student->id)->delete();
            }
            // user ..
            if($fee){
                $fee = fee::where('student_id',$student->id)->delete();
            }
            if($user){
                $user->delete();
            }
            $student->delete();
        }
        $student->delete();
        $this->students = student::where('branch_id',Auth::user()->branch_id)->orderBy('id', 'asc')->get();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Student Deleted Successfully!', 
            'text' => 'It will not list on students table.'
        ]);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function alertConfirm($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('swal:confirmstudent', [
            'type' => 'warning',  
            'message' => 'Are you sure?', 
            'text' => 'If deleted, you will not be able to recover this imaginary file!'
        ]);
    }

    public function edit()
    {
        $this->dispatchBrowserEvent('openStudentUpdate');   
    }
}
