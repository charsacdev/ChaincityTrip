<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewuserrRegistration extends Mailable
{
    use Queueable, SerializesModels;

    public $useremail,$UserName,$authcode;

    public function __construct($useremail,$UserName,$authcode)
    {
        $this->useremail=$useremail;
        $this->UserName=$UserName;
        $this->authcode=$authcode;
    }

    
    public function build()
    {
        return $this->subject('ChainCity New Account Creation')
                       ->markdown('mail.newuserr-registration')
                       ->with($this->useremail,$this->UserName,$this->authcode);
    }

}
