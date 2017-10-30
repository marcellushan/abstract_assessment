<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Assessment;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($return_reason, $assessment_id)
    {
        $this->return_reason = $return_reason;
        $this->assessment_id = $assessment_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $assessment = Assessment::find($this->assessment_id);
//        $message = $this->message;
        $return_reason = $this->return_reason;
        return $this->from('assessment@highlands.edu')
            ->subject('Additional assessment information required')
            ->view('emails.returned')->with(compact('return_reason','assessment'));
    }
}
