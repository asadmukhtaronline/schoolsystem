<?php
namespace App\Http\Livewire\Admin\Admission;
use Illuminate\Support\Facades\Hash;
use App\Models\year;
use App\Models\student;
use App\Models\enrollment;
use App\Models\studentaccounts;
use App\Models\fee;
use App\Models\section;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\Studentemail;
use Livewire\WithFileUploads;
use Auth;

class Admissionform extends Component
{
    use WithFileUploads;
    public $photo;
    public $photoname;
    public $name;
    public $parent_name;
    public $gender;
    public $current_address;
    public $street_address;
    public $city;
    public $region;
    public $postal;
    public $country;
    public $phone;
    public $email;
    public $admission_fee;
    public $admission_date;
    public $monthly_fee;
    public $fee_date;
    public $paymethod;
    public $year;
    public $section;
    public $sections = [];

    public function render()
    {
        $branchId = Auth::user()->branch_id;
        $years = year::orderby('id','asc')->get();
        $admissionform = student::orderby('id','desc')->get();
        $users = user::orderby('id','desc')->get();
        $enrollments = enrollment::orderby('id','desc')->get();
        return view('livewire.admin.admission.admissionform',compact('years', 'users', 'admissionform', 'enrollments'))->layout('Layouts.app');
    }
    
    public function getsection(){
        $this->sections = section::where('year_id',$this->year)->get();
    }
    protected $rules = [
        'name' => 'required',
        'parent_name' => 'required',
        'gender' => 'required',
        'current_address' => 'required',
        'street_address' => 'required',
        'city' => 'required',
        'region' => 'required',
        'postal' => 'required',
        'country' => 'required',
        'phone' => 'required',
        'email' => 'required|unique:users|unique:student',
        'admission_fee' => 'required',
        'admission_date' => 'required',
        'monthly_fee' => 'required',
        'fee_date' => 'required',
        'photo' => 'required',
        'year' => 'required',
        'section' => 'required',
    ];
    // save ..
    public function save(){
        // $this->validate();
        $photoname = time().".".$this->photo->getClientOriginalExtension();
        $this->photo->storeAs('admissionform',$photoname,'public');
        $admissionform = new student;
        $admissionform->name = $this->name;
        $admissionform->parent_name = $this->parent_name;
        $admissionform->gender = $this->gender;
        $admissionform->current_address = $this->current_address;
        $admissionform->street_address = $this->street_address;
        $admissionform->city = $this->city;
        $admissionform->region = $this->region;
        $admissionform->postal = $this->postal;
        $admissionform->country = $this->country;
        $admissionform->admission_fee = $this->admission_fee;
        $admissionform->monthly_fee = $this->monthly_fee;
        $admissionform->admission_date = $this->admission_date;
        $admissionform->fee_date = $this->fee_date;
        $admissionform->phone = $this->phone;
        $admissionform->email = $this->email;
        $admissionform->year_id = $this->year;
        $admissionform->section_id = $this->section;
        $admissionform->photo=$photoname;
        $admissionform->branch_id = Auth::user()->branch_id;
        $admissionform->save();
        $admission_id = $admissionform->id;
         // Send email to the student
   

        // new user ..
        $users = new User;
        $users->name = $this->name;
        $users->email = $this->email;
        $users->image = $this->photoname;
        $users->phone = $this->phone;
       // $users->description = $this->description;
        $users->password = Hash::make('12344321');
        $users->is_student = 1; // Set is_student to 1
        $users->branch_id = Auth::user()->branch_id;
        $users->save();

        $user_id = $users->id;

        // student ..
        $student = student::find($admission_id);
        $student->user_id = $user_id;
        $student->save();

        // new enrollment ...
        $enrollments = new enrollment;
        $enrollments->student_id = $admission_id;
        $enrollments->year_id = $this->year;
        $enrollments->section_id = $this->section;
        $enrollments->fee = $this->monthly_fee;
        $enrollments->fee_date = $this->fee_date;
        $enrollments->admission_fee = $this->admission_fee;
        $enrollments->admission_date = $this->admission_date;
        $enrollments->admission_date = date("dd/mm/yyyy");
        $enrollments->branch_id = Auth::user()->branch_id;
        $enrollments->save();


        $enrollment_id = $enrollments->id;
        // $fee_date = $this->fee_date."/".date('m')."/".date("y");


        $fee = new fee;
        $fee->student_id = $admission_id;
        $fee->enrollment_id = $enrollment_id;
        $fee->branch_id = Auth::user()->branch_id;
        $fee->fee = $this->monthly_fee;
        // $fee->fee_date = $this->fee_date;
        $fee->admission_date = $this->admission_date;
        $fee->save();

        
        $section = section::find($this->section);
        $class = year::find($this->year);
       // Mail::to($admissionform->email)->send(new Studentemail($admissionform, $class, $section, $fee));
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Student Saved Successfully!', 
            'text' => 'Student Saved, Enrollment Saved, User Created...'
        ]);
        return redirect(route('admin.studentprofile',$admission_id));
    }
}
