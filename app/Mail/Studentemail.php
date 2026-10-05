<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Studentemail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $admissionform;
    public $class;
    public $section;
    public $fee;
   
    public function __construct($admissionform, $class, $section, $fee)
    {
        $this->admissionform = $admissionform;
        $this->class = $class;
        $this->section = $section;
        $this->fee = $fee;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Studentemail',
        );
    }
    public function build()
    {
        return $this->view('email.studentemail')
                    ->subject('Student Enrollment Details')
                    ->with([
                        'section' => $this->section->title,
                        'class' => $this->class->title,
                        'student' => $this->admissionform->name,
                        'fee' => $this->fee->fee,
                        'fee_date' => $this->fee->fee_date,
                        'monthly_fee' => $this->admissionform, // Corrected here
                    ]);
    }
    
    /**
     * Get the message content definition.
     */
   

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
