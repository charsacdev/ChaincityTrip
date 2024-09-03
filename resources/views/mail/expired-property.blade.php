@component('mail::panel')
ChainCity Reservation Notification
@endcomponent
@component('mail::message')

   <h1 style="text-align:center;color:#0ace7e">Reservation Expiration Notification</h1>
    <p>Dear {{$UserName}},<br>
      We want to kindly inform you that your <b>Reservation have expired</b> and is avaliable for booking. 
     <br><br>
     Plan to make an extention ? you make a new Reservation again.
   </p>
    
Thanks,<br>
Best of Regards<br>
{{ config('app.name') }}
@endcomponent


