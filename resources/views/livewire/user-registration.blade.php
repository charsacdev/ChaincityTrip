<div>
    <!--registration-->
    <div class="row">
     <div class="col-lg-2 col-md-3 col-sm-1"></div>
     <div class="col-lg-8 col-md-6 col-sm-10 py-3">
       <div class="row">
         <div class="col-12">
           <div class="form-account py-3">
             <a href="/">
               <img src="asset/img/logo.png" class="d-block d-md-none">
             </a>
             <h2 class="rlf-header mt-5">Create account</h2>
             <p class="text-muted">
               Let’s get you up and running in ChainCity
             </p>
             <form class="mt-5" id="auth_reg_form" wire:submit.prevent='NewUser'>
                 <!--error-->
                 @if(session('error'))
                     <p style="color:#e21208;font-size:18px">{{session('error')}}</p>
                 @endif
               <div class="mb-3">
                 <label for="">First Name</label>
                 <div class="input-group mb-3 i-group-div">
                   <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                   <input type="text" name="firstname" class="form-control shadow-none"
                     placeholder="Firstname.." wire:model="firstName" required>
                 </div>
               </div>
 
               <div class="mb-3">
                 <label for="">last Name</label>
                 <div class="input-group mb-3 i-group-div">
                   <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                   <input type="text" name="lastname" class="form-control shadow-none"
                     placeholder="Lastname.." wire:model="lastName" required>
                 </div>
               </div>
               <div class="mb-4">
                 <label for="">Email Address</label>
                 <div class="input-group mb-3 i-group-div">
                   <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                   <input type="text" name="email" wire:model="email" class="form-control shadow-none" placeholder="ex. example@gmail.com" required>
                 </div>
                 @error('email')
                 <p style="color:#e21208">keep typing... if email exist you will know😅</p> 
                @enderror
               </div>
 
               <div class="mb-4">
                 <label for="">Create Password</label>
                 <div class="input-group mb-3 i-group-div">
                   <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                   <input type="password" name="password" wire:model="password" class="form-control shadow-none psw_input" placeholder="ex. abc1234" required>
                   <div class="input-group-text rlf-hd">
                     <span class="d-none rlf-hd-show"><i class="fa fa-eye"></i></span>
                     <span class="rlf-hd-hide"><i class="fa fa-eye-slash"></i></span>
                   </div>
                 </div>
               </div>
 
               <div class="mb-4">
                 <label for="">Confirm Password</label>
                 <div class="input-group mb-3 i-group-div">
                   <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                   <input type="password" name="confirm_password" wire:model="confirm_password" class="form-control shadow-none psw_input" placeholder="ex. abc1234">
                   <div class="input-group-text rlf-hd">
                     <span class="d-none rlf-hd-show"><i class="fa fa-eye"></i></span>
                     <span class="rlf-hd-hide"><i class="fa fa-eye-slash"></i></span>
                   </div>
                 </div>
               </div>
 
               <button type="submit" wire:target='NewUser' wire:loading.attr='disabled' id="reg-btn" class="rlf-btn rlf-btn-primary  w-100 my-3">Create Account</button>
             </form>
             <!--google auth-->
             <fieldset>
               <legend><span>&nbsp; or &nbsp;</span></legend>
               <a href="/login/google">
                    <button class="rlf-btn-outline w-100 my-3 mb-5">
                  <img src="{{asset('asset/img/google.png')}}" class="img-fluid">&nbsp; &nbsp; Continue with Google
                </button>
               </a>
 
               <p style="text-align:left !important">Already Have an Account ?
                 <a href="/login" class="text-decoration-none" style="color:#D80450">Login</a>
               </p>
             </fieldset>
           </div>
         </div>
       </div>
     </div>
     <div class="col-lg-2 col-md-3 col-sm-1"></div>
   </div>
 </div>
 