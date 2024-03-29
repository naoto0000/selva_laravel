<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AuthMail extends Mailable
{
    use Queueable, SerializesModels;

    public $auth_code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($authNumber)
    {
        $this->auth_code = $authNumber;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->text('partials.auth_mail', ['auth_code' => $this->auth_code]);
    }
}
