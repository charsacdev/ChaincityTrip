@extends('users.dashboardheader')
 @section('content')
    @livewire('message',['chatcode'=>$chatcode])
@endsection
