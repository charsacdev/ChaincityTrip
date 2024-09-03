<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $username,$email,$message;

    public function __construct($username,$email,$message)
    {
        $this->username=$username;
        $this->email=$email;
        $this->message=$message;
    }

    
    public function build()
    {
        return $this->subject('Message Inquiry')
                       ->markdown('mail.contact-us-email')
                       ->with($this->username,$this->email,$this->message);
    }


}
