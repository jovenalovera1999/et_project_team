<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('EmailSend.template')->subject($this->details['subject']);
        // return $this->subject($this->details['subject'])
        // ->view($this->details['message']);

//         return $this->markdown('emails.template')->with(['data' => $details['message']);
// Mark Jun Gersaniva3:40 PM
// @component('mail::message')
// # FIT-ALL {{ $data->description }}

// {!! $data->message !!}

// @endcomponent
    }
}
