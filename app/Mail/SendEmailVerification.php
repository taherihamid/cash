<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $personal_id;
    public $api_key;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$personal_id ,$password,$api_key)
    {
        $this->email = $email;
        $this->personal_id= $personal_id;
        $this->api_key = $api_key;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.confirmation');
    }
}
