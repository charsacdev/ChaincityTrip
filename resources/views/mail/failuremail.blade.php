@component('mail::panel')
ChainCity Payment Notification
@endcomponent
@component('mail::message')

   <h1 style="text-align:center;color:#0ace7e">Failed Payment Notification</h1>
    <p>Dear {{$UserName}},<br>
      We are sorry to inform you to that your <b>payment was unsuccessful</b> and your reservation can not be made at this time 
     <br><br>
    At ChainCity, we understand that buying or selling a home is a significant decision, and we are here to support you every step of the way. Our team of experienced real estate professionals is dedicated to helping you achieve your real estate goals.</p>
    
Thanks,<br>
Best of Regards<br>
{{ config('app.name') }}
@endcomponent


