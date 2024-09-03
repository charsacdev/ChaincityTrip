<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Mail\ContactUsEmail;
use Spatie\Newsletter\NewsletterFacade as Newsletter;

class ContactUspage extends Controller
{
    public function contactUsemail(Request $request){

        $username=$request->fullname;
        $email=$request->email;
        $message=$request->message;

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactUsEmail($username,$email,$message));
        
        return redirect('/contact')->with('succeed', 'We have received your message will give a reply as soon as possible');
        
    }

     #mailchimp
     public function subscribe(Request $request){
        $email = $request->input('email');
        Newsletter::addTags(['ChaincityTrip'],$email);
        session()->flash('mailchimp','Thank for joining our news later');
        return redirect()->back();
    }
}
