<div>
    <!--forgot password--> 
      <div class="row h-100" style="min-height:100vh">
             <div class="col-lg-2 col-md-3 col-sm-1"></div>
             <div class="col-lg-8 col-md-6 col-sm-10 d-flex align-items-center justify-content-center">
               <div class="row">
                 <div class="col-12">
                   <div class="form-account">
                     <a href="/">
                       <img src="asset/img/logo.png" class="d-block d-md-none mb-5">
                     </a>
                     <h2 class="text-primary rlf-header">Hello Admin,&nbsp;Forgot Your Password?</h2>
                     <h2 class="rlf-header">Don't worry we have a Spare Key</h2>
                     <p class="text-muted">
                      Have you remembered your password? <a href="/admin/login" class="text-primary">Login</a>
                     </p>
                     <form class="mt-5" id="auth_login_form" wire:submit.prevent='ResetPasswordAdmin'>
                      <!--error-->
                          @if(session('error'))
                          <p style="color:#e21208;font-size:18px">{{session('error')}}</p>
                        @endif
  
                        <!--session-->
                        @if(session('succeed'))
                          <p style="color:#1a7807;font-size:18px">{{session('succeed')}}</p>
                          
                            <!--redirect user-->
                            <script type="text/javascript">
                                setTimeout(function() {
                                    window.location.href = 'login';
                                }, 3000);
                            </script>
                        @endif
                       <div class="mb-4">
                         <label for="">Email Address</label>
                         <div class="input-group mb-3 i-group-div">
                           <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                           <input type="email" name="email" wire:model="UserEmail" class="form-control shadow-none" placeholder="ex. danny@gmail.com" required>
                         </div>
                       </div>
                       <button type="submit" class="rlf-btn bg-secondary text-light w-100 my-3">Submit</button>
                     </form>
                   </div>
                 </div>
               </div>
             </div>
             <div class="col-lg-2 col-md-3 col-sm-1"></div>
           </div>
       </div>
  