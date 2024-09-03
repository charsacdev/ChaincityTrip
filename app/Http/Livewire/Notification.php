<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\CtripNotification;

class Notification extends Component
{
    public $selectNotification;

    #mount function
    public function mount(){
        $this->selectNotification=CtripNotification::where(['user_id'=>auth()->user()->id])->get();
    }

    public function render(){

        return view('livewire.notification');
    }
}
