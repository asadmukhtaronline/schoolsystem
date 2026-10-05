<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class quizemail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
  
     public $teacher;
     public $quiz;
     public $class;
     public $section;
 
     /**
      * Create a new message instance.
      */
     public function __construct($teacher, $quiz, $class, $section)
     {
         $this->teacher = $teacher;
         $this->quiz = $quiz;
         $this->class = $class;
         $this->section = $section;
     }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Emailquiz',
        );
    }

    /**
     * Get the message content definition.
     */
  
    public function build()
    {
        return $this->view('email.quizemail')
                    ->subject('New Quiz Created')
                    ->with([
                        'teacherName' => $this->teacher->name,
                        'class' => $this->class,
                        'section' => $this->section,
                        'quiz' => $this->quiz->title,
                        'dueDate' => $this->quiz->due_date,
                        // 'creatorName' => $this->quiz->creator_name,
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
