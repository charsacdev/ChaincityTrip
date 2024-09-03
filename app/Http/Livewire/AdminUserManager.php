<?php

namespace App\Http\Livewire;
use App\Models\UsersTable;

use Livewire\Component;

class AdminUserManager extends Component
{
     #all users
     public $CityVerifiedUser,$CityUnVerifiedUser,$unlisted,$inprogress;


     public function mount(){
         #all users
         $this->CityVerifiedUser=UsersTable::with('property','bookings','listingsaved')->where(['account_kyc->verify_status'=>'completed'])->get();
         $this->CityUnVerifiedUser=UsersTable::with('property','bookings','listingsaved')->where(['account_kyc->verify_status'=>'pending'])->get();
         #$this->listed=PropertyTable::with('user')->where('property_process->status','approved')->get();
         #$this->unlisted=PropertyTable::with('user')->where('property_process->status','completed')->get();
         #$this->inprogress=PropertyTable::with('user')->where('property_process->status','pending')->get();

     }

    
    #approve users
    public function Approveusers($id){
        try{
            $approveListing=UsersTable::where(['id'=>$id])->update([
                'account_kyc->verify_status'=>'completed'
            ]);
            if($approveListing){
                session()->flash('success','user account have been verified successfully');
                return redirect('/admin/users');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/admin/users');
        }
    }

     #decline users
     public function Declineusers($id){
        try{
            $declinedListing=UsersTable::where(['id'=>$id])->update([
                'account_kyc->verify_status'=>'pending'
            ]);
            if($declinedListing){
                session()->flash('success','User verification was declined, user will receive an email shortly');
                return redirect('/admin/users');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/admin/user');
        }
    }


     #block user
     public function Blockuser($id){
        try{
            $blockuser=UsersTable::where(['id'=>$id])->update([
                'account_kyc->verify_status'=>'pending',
                'account_status'=>'blocked'
            ]);
            if($blockuser){
                session()->flash('success','User have been blockd and will receive an email shortly');
                return redirect('/admin/users');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/admin/users');
        }
    }



    public function render()
    {
        return view('livewire.admin-user-manager');
    }
}
