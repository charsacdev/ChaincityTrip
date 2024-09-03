@extends('users.accountheader')
@section('account-intro')
<div class="row mt-5">
  <div class="col-lg-2 col-md-3 col-sm-1"></div>
  <div class="col-lg-8 col-md-6 col-sm-10">
    <div class="row">
      <div class="col-12">
        <div class="form-account py-3">
          <a href="/">
            <img src="{{asset('asset/img/logo.png')}}" class="d-block d-md-none">
          </a>
            <div class="form-account py-3" style="height:100vh">
              <div style="margin-top:100px" class="p-2">
                <img src="{{asset('asset/security-safe.png')}}">
                <h2 class="fw-bold" style="color:#000;font-size:40px">Verify email</h2>
                <p>We sent a verification link to your email address
                  <b>{{base64_decode($lastSegment)}}</b>
                    Kindly go to your email and verify account to proceed
                </p>
                <a href="/login" class="text-decoration-none" style="color:#D80450">Back to Login</a></p>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-3 col-sm-1"></div>
@endsection