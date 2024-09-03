@component('mail::panel')
ChainCity Registration Completion
@endcomponent
@component('mail::message')
   <h1 style="text-align:center;color:#0ace7e">ChainCity Registration Completion</h1>
    <p>Dear {{$UserName}},<br>
    We are thrilled to info you to that your ChainCity account is ready to be put to use, 
    your trusted partner in finding your dream home.
     <br><br>
    At ChainCity, we understand that buying or selling a home is a significant decision, and we are here to support you every step of the way. Our team of experienced real estate professionals is dedicated to helping you achieve your real estate goals.</p>
    
Thanks,Best of Regards<br>
{{ config('app.name') }}
@endcomponent


