<?php

namespace App\Http\Livewire;
use App\Models\PropertyTable;
use App\Models\SavedListingTable;
use App\Models\ReservationTable;

use Livewire\Component;

class AdminBookingManager extends Component
{
     #property reservation
     public $reservationAll,$ongoing,$upcoming,$completed,$cancelled;


     public function mount(){
         #all reservations
         $this->reservationAll=ReservationTable::with('user','property')->get();
         $this->ongoing=ReservationTable::with('user')->where('status','ongoing')->get();
         $this->upcoming=ReservationTable::with('user')->where('status','upcoming')->get();
         $this->completed=ReservationTable::with('user')->where('status','completed')->get();
         $this->cancelled=ReservationTable::with('user')->where('status','cancelled')->get();

     }

    
    #completed Booking
    public function CompletedBooking($id){
        try{
            $completedBooking=ReservationTable::where(['id'=>$id])->update([
                'status'=>'completed'
            ]);
            if($completedBooking){
                session()->flash('success','Reservation have been manually marked as completed,user will receive an email shortly');
                return redirect('/admin/booking');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/admin/booking');
        }
    }

    #ongoing booking
    public function OngoingBooking($id){
        try{
            $ongoingBooking=ReservationTable::where(['id'=>$id])->update([
                'status'=>'ongoing'
            ]);
            if($ongoingBooking){
                session()->flash('success','Reservation have been manually marked as ongoing,user will receive an email shortly');
                return redirect('/admin/booking');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/admin/booking');
        }
    }

    #upcoming booking
    public function UpcomingBooking($id){
        try{
            $upcomingBooking=ReservationTable::where(['id'=>$id])->update([
                'status'=>'upcoming'
            ]);
            if($upcomingBooking){
                session()->flash('success','Reservation have been manually marked as upcoming,user will receive an email shortly');
                return redirect('/admin/booking');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/admin/booking');
        }
    }

    
    #cancelled booking
    public function CancelledBooking($id){
        try{
            $cancelledBooking=ReservationTable::where(['id'=>$id])->update([
                'status'=>'cancelled'
            ]);
            if($cancelledBooking){
                session()->flash('success','Reservation have been manually marked as cancelled,user will receive an email shortly');
                return redirect('/admin/booking');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/admin/booking');
        }
    }

    public function render()
    {
        return view('livewire.admin-booking-manager');
    }
}
