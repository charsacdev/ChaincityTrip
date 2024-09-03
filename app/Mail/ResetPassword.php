<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $email,$authcode,$username;

    public function __construct($email,$authcode,$username)
    {
        $this->email=$email;
        $this->authcode=$authcode;
        $this->username=$username;
    }

    public function build()
    {
        return $this->subject('ChainCity Password Reset link')
                     ->markdown('mail.reset-password')
                     ->with($this->email,$this->authcode,$this->username);
    }

}
