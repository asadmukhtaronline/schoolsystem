<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Teachertimetable extends Mailable
{
    use Queueable, SerializesModels;

    public $teacher;
    public $sections;
    public $class;
    public $timetable;
    public $day;

    public function __construct($teacher, $sections, $class, $timetable, $day)
    {
        $this->teacher = $teacher;
        $this->sections = $sections;
        $this->class = $class;
        $this->timetable = $timetable;
        $this->day = $day; // Add the day
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->view('email.teachertimetable')
                    ->subject('Web Educatorz')
                    ->with([
                        'teacher' => $this->teacher,
                        'sections' => $this->sections,
                        'class' => $this->class,
                        // 'day' => $this->day,
                        'timetable' => $this->timetable,
                    ]);
    }
}
