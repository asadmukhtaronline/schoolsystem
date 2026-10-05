<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;  
use Illuminate\Queue\SerializesModels;

class Teaemailassignment extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $teacher;
    public $assignment;
    public $yearName;
    public $sectionName;

    /**
     * Create a new message instance.
     */
    public function __construct($teacher, $assignment, $yearName, $sectionName)
    {
        $this->teacher = $teacher;
        $this->assignment = $assignment;
        $this->yearName = $yearName;
        $this->sectionName = $sectionName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Assignment Created',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('email.teaemailassignment')
                    ->subject('New Assignment Created')
                    ->with([
                        'teacher' => $this->teacher,
                        'className' => $this->yearName,
                        'sectionName' => $this->sectionName,
                        'assignmentTitle' => $this->assignment->title,
                        'dueDate' => $this->assignment->due_date,
                        'creatorName' => $this->assignment->creator_name,
                    ]);
    }

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
