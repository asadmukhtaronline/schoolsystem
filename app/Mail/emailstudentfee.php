<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class emailstudentfee extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $enrollment;
    public $classTitle;
    public $sectionTitle;
    public $fee;
    public $feeDate;

    /**
     * Create a new message instance.
     */
    public function __construct($enrollment)
    {
        $this->enrollment = $enrollment;
        $this->student = $enrollment->student;
        $this->classTitle = $enrollment->year->title;
        $this->sectionTitle = $enrollment->section->title;
        $this->fee = $enrollment->fee;
        $this->feeDate = $enrollment->fee_date;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->view('email.emailstudentfee')
                    ->subject('Student Fee Payment Confirmation')
                    ->with([
                        'studentName' => $this->student->name,
                        'classTitle' => $this->classTitle,
                        'sectionTitle' => $this->sectionTitle,
                        'fee' => $this->fee,
                        'feeDate' => $this->feeDate,
                    ]);
    }
}
