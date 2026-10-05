<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Teacher;
use App\Models\Section;
use App\Models\Year;

class TeacherAssignedSectionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $teacher;
    public $sections;
    public $class;

    /**
     * Create a new message instance.
     *
     * @return void
     */
   
    public function __construct($teacher, $sections, $class)
    {
        $this->teacher = $teacher;
        $this->sections = $sections;
        $this->class = $class;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.teacher_assigned_section')
                    ->subject('Webeductorz');
    }
}
