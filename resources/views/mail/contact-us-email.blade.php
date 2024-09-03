@component('mail::panel')
Message Inquiry
@endcomponent
@component('mail::message')

   <h1 style="text-align:center;color:#0ace7e">Message Inquiry</h1>
    <p>
        <h4>From : {{$username}}</h4>
        <h4>Email : {{$email}}</h4>
        {{$message}}
    </p>
    <br>
    
Thanks,<br>
Best of Regards<br>
{{ config('app.name') }}
@endcomponent


