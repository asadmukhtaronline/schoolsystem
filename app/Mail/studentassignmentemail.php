<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class studentassignmentemail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $student;
    public $teacher;
    public $assignment;
    public $yearName;
    public $sectionName;

    /**
     * Create a new message instance.
     */
    public function __construct($student, $assignment, $yearName, $sectionName)
    {
        $this->student = $student;
        $this->assignment = $assignment;
        $this->yearName = $yearName;
        $this->sectionName = $sectionName;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->view('email.studentassignmentemail')
                    ->subject('New Assignment Created')
                    ->with([
                        'student' => $this->student,
                        'className' => $this->yearName,
                        'sectionName' => $this->sectionName,
                        'assignmentTitle' => $this->assignment->title,
                        'dueDate' => $this->assignment->due_date,
                        'creatorName' => $this->assignment->creator_name,
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
