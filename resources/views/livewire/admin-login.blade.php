<div>
    <!--chaincity login-->
    <div class="row mt-5">
        <div class="col-lg-2 col-md-3 col-sm-1"></div>
        <div class="col-lg-8 col-md-6 col-sm-10" style="min-height:100vh">
          <div class="row">
            <div class="col-12">
              <div class="form-account py-3">
                <a href="/">
                  <img src="{{asset('asset/img/logo.png')}}" class="d-block d-md-none">
                </a>
                <h2 class="rlf-header mt-5">Admin Login</h2>
                <p class="text-muted">
               Please proceed to login
                </p>
                <form class="mt-5" id="auth_login_form" wire:submit.prevent='logonadmin'>
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
                                window.location.href = 'dashboard';
                            }, 3000);
                        </script>
                    @endif
                  <div class="mb-4">
                    <label for="">Email Address</label>
                    <div class="input-group mb-3 i-group-div">
                      <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                      <input type="text" name="email" wire:model="email" class="form-control shadow-none" placeholder="ex. danny@gmail.com">
                    </div>
                  </div>

                  <div class="mb-4">
                    <label for="">Password</label>
                    <div class="input-group mb-3 i-group-div">
                      <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                      <input type="password" name="password" wire:model="password" class="form-control shadow-none psw_input" placeholder="Password">
                      <div class="input-group-text rlf-hd">
                        <span class="d-none rlf-hd-show"><i class="fa fa-eye"></i></span>
                        <span class="rlf-hd-hide"><i class="fa fa-eye-slash"></i></span>
                      </div>
                    </div>
                    <div class="mt-3 text-end">
                      <a href="/admin/forgotpassword" class="text-dark">Forgot Password?</a>
                    </div>
                  </div>
                  <button type="submit" wire:target='logon' wire:loading.attr='disabled' class="rlf-btn rlf-btn-primary w-100 my-3">Login</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-1"></div>
      </div> 
</div>
