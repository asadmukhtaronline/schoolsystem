<?php

namespace App\Http\Livewire\Admin\Students;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\student;
use App\Models\enrollment;
use App\Models\fee;
use App\Models\studentaccounts;
use App\Models\year;
use App\Models\User;
use App\Models\section;
use App\Models\GeneralSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\emailstudentfee;
use PDF;
use Auth;
// use Barryvdh\DomPDF\Facade as PDF;

class Accounts extends Component
{
    public $fee_id;
    public $paymethod;
    public $fees;
    public $enrollment;
    public $enrollment_id;
    public $student_id;
    public $fee_date;
    public $recipe;
    public $status = 0;
    public function render()
{
    $enrollment = $this->enrollment;
    $student = $this->student;
    $school = GeneralSetting::first(); // Retrieve the school information
    return view('livewire.admin.students.accounts', compact('enrollment', 'school', 'student'))->layout('Layouts.app');
}
    public function mount($id){
        $this->enrollment = enrollment::find($id);
        $this->student = student::find($id);
    }
    
    public function update($id)
    {   
        $this->validate([
            'fee_date' => 'required',
        ]); 
        $fees=fee::find($id);
        $fees->fee_date = $this->fee_date;
        $fees->save();
           // Send email
    //     $enrollment = $this->enrollment;
    //     $student = student::find($fees->student_id);
    // Mail::to($student->email)->send(new emailstudentfee($enrollment));
        // $this->automateNextMonthFeeSubmission($fee);
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Fee Date Updated Successfully', 
        ]);
        $this->fee_date =" ";
    }
    public function save($id)
    {   
        $this->validate([
        'paymethod' => 'required',
        ]); 
        $fees=fee::find($id);
        $fees->paymethod = $this->paymethod;
        $fees->fee_date = $this->fee_date;
        $fees->status = 1;
        $fees->save();
        $imagePath = $fees->student->image_path;
        $student_id = $fees->student_id;// getting student id form ..
        $fee_date = date('m/d/y', strtotime($this->enrollment->fee_date));
        $fee_date .= "-" . date('m' . '-' . 'y');
        $currentMonthDate = Carbon::createFromFormat('m/d/y-m-y', $fee_date)->format('m/d/y');
        $nextMonthDate = Carbon::createFromFormat('m/d/y', $currentMonthDate)->addMonth() ; // Corrected line
        $nextMonthFee = new Fee();
        $nextMonthFee->student_id = $student_id;
        $nextMonthFee->fee_date = $nextMonthDate->format('Y-m-d'); // Format the date as needed
        $nextMonthFee->fee = $this->enrollment->fee;
        $nextMonthFee->enrollment_id = $this->enrollment->id;
        $nextMonthFee->branch_id = Auth::user()->branch_id;
        $nextMonthFee->save();
        $school = GeneralSetting::first();
        $student = student::find($fees->student_id);
        $enrollment = Enrollment::where('student_id',$fees->student_id)->with('section', 'year')->get();

        $pdf = PDF::loadView('pdf.invoices', array('data' => $fees,  'enrollment' => $enrollment, 'school' => $school,'student' => $student, 'imagePath' => $imagePath));
        $file_name = $fees->student->name."-".$fees->id."-".$fees->enrollment->rollnumber.".pdf";
        $pdf->save(storage_path("app/public/invoice/").$file_name);
        $fees->recipe = $file_name; // Assuming 'recipe' is your column name
        $fees->save();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Fee Paid Successfully', 
        ]);
        return response()->streamDownload(
            fn () => print($pdf->output()),
            $file_name
            );
            
        return redirect('/admin/students/accounts/' . $this->enrollment->id);
        //$fileName = 'Invoice_' . $fee->id . '.pdf';
    }


    public function generateInvoice($id)
    {
        $fees = fee::find($id);
        $student = student::find($fees->student_id);
        $data = [
            'student' => $student,
            'fee' => $fees,
        ];
        $pdf = PDF::loadView('pdf.invoices', array('data' => $fees));
        $file_name = $fees->student->name."-".$fees->id.".pdf";
        $pdf->save(storage_path("app/public/invoice/").$file_name);
        return response()->streamDownload(
            fn () => print($pdf->output()),
            $file_name
        );
       
    }
}