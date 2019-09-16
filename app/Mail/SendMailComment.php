<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailComment extends Mailable
{
    use Queueable, SerializesModels;
    public $getComment;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($getComment)
    {
        $this->getComment = $getComment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.comment');
    }
}
