<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeedbackMail extends Mailable
{
    use Queueable, SerializesModels;
    public $feedbackInfo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($feedbackInfo)
    {
        $this->feedbackInfo = $feedbackInfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.FeedbackSendMail')
            ->subject("New Feedback Notification")
            ->with('feedbackInfo', $this->feedbackInfo);
    }
}
