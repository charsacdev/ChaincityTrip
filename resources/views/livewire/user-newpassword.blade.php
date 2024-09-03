<div>
   <!--new password-->
   <div class="row" style="min-height:100vh">
    <div class="col-lg-2 col-md-3 col-sm-1"></div>
    <div class="col-lg-8 col-md-6 col-sm-10">
      <div class="row">
        <div class="col-12">
          <div class="form-account py-3">
            <a href="/">
              <img src="asset/img/logo.png" class="d-block d-md-none">
            </a>
            <h2 class="fw-bold rlf-header-md mt-5">
                Reset Password
            </h2>
            <p class="text-muted">
              Password should be minimum of <span class="text-primary">8 characters</span> including <span class="text-primary">uppercase</span>,
              <span class="text-primary">lowercase </span> and <span class="text-primary">at lease one special character.</span>
            </p>
            <form class="mt-5" id="auth_reset_pswd_form" wire:submit.prevent='DetailsUpdate'>
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
                                window.location = '/password-complete';
                            }, 3000);
                        </script>
                    @endif

              <div class="mb-4">
                <label for="">New Password</label>
                <div class="input-group mb-3 i-group-div">
                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                  <input type="password" wire:model='newpassword' name="new_password" class="form-control shadow-none psw_input" placeholder="Password" required>
                  <div class="input-group-text rlf-hd">
                    <span class="d-none rlf-hd-show"><i class="fa fa-eye"></i></span>
                    <span class="rlf-hd-hide"><i class="fa fa-eye-slash"></i></span>
                  </div>
                </div>
              </div>
              <div class="mb-4">
                <label for="">Confirm New Password</label>
                <div class="input-group mb-3 i-group-div">
                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                  <input type="password" wire:model='oldpassword' name="confirm_new_password" class="form-control shadow-none psw_input" placeholder="Password" required>
                  <div class="input-group-text rlf-hd">
                    <span class="d-none rlf-hd-show"><i class="fa fa-eye"></i></span>
                    <span class="rlf-hd-hide"><i class="fa fa-eye-slash"></i></span>
                  </div>
                </div>
              </div>
              <input type="hidden" wire:model='email' class="form-control shadow-none">
              <input type="hidden" wire:model='authcode' class="form-control shadow-none">
              <button type="submit" id="reset-btn" class="rlf-btn rlf-btn-primary text-light w-100 my-3">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-2 col-md-3 col-sm-1"></div>
  </div>
</div>
