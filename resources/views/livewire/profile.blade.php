<div>

  <main>
    <div class="container">
         <div class="row">
              <div class="col-sm-1 col-lg-2"></div>
              <div class="col-sm-10 col-lg-8">
                   <form wire:submit.prevent="Updateprofile">
                        <h2 class="dsb-header my-5">Profile Management</h2>
                        <div class="prl-card">
                         <div class="prl-card-header p-0 mx-0">
                              <div class="img">
                                  @if($photo)
                                    <img src="{{$photo->temporaryUrl()}}" class="img-fluid h-100 profile-img">
                                  @elseif(auth()->user()->profile_photo=='')
                                    <img src="{{asset('asset/img-avatar.png')}}" class="img-fluid h-100 profile-img">
                                  @else
                                    <img src="{{auth()->user()->profile_photo}}" class="img-fluid h-100 profile-img">
                                @endif
              
                                <aside class="d-none">
                                  <input type="file" wire:model="photo" id="file-img" wire:change="imagechanger">
                                </aside>
                              </div>
                              <div>
                                  <h2 class="dsb-header-sm mb-0">{{ucwords(auth()->user()->first_name)}}&nbsp;{{ucwords(auth()->user()->last_name)}}</h2>
                                  <small>{{auth()->user()->email}}</small>
                              </div>
                         </div>
                      <div class="prl-card-body mt-5">
                        <!--session error-->
                        @if(session('error'))
                        <p class="text-danger fw-bold">{{session('error')}}</p>
                        <script type="text/javascript">
                              window.scrollTo({top: 0,behavior: 'smooth'});
                      </script>
                      @endif
              
                        <!--session success-->
                        @if(session('succeed'))
                        <p class="text-success fw-bold">{{session('succeed')}}</p>
                          <script type="text/javascript">
                                  setTimeout(function() {
                                  window.location.href = 'dashboard';
                              }, 3000);  
                          </script>
                          @endif
                            @error('photo')
                              <p class="text-danger fw-bold">Oh snap, we dont think this is an image.</p>
                              <script type="text/javascript">
                                window.scrollTo({top: 0,behavior: 'smooth'});
                               </script>
                            @enderror
                          <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                          <label for="">First Name</label>
                                          <input type="text" wire:model="fname" placeholder="Danny" class="form-control">
                                    </div>
                                </div>
                                       <div class="col-md-6 mb-4">
                                            <div class="form-group">
                                                 <label for="">Last Name</label>
                                                 <input type="text" wire:model="lname" placeholder="Amara" class="form-control">
                                            </div>
                                       </div>
                                  </div>
                                  <div class="form-group mb-4">
                                       <label for="">Email Address</label>
                                       <input type="text" wire:model="email" id="" placeholder="dannyamara@gmail.com" class="form-control">
                                  </div>
                                  <div class="row">
                                       <div class="col-md-12 mb-4">
                                            <div class="form-group">
                                                 <label for="">Phone Number (Primary)</label>
                                                 <input type="number" wire:model="phone" placeholder="Phone number primary" class="form-control">
                                            </div>
                                       </div>
                                       <div class="col-md-12 mb-4">
                                            <div class="form-group">
                                                 <label for="">Phone Number (Secondary)</label>
                                                 <input type="number" wire:model="phone" placeholder="Phone number secondary" class="form-control">
                                            </div>
                                       </div>
                                  </div>
                                  <div class="form-group mb-4">
                                       <label for="">Country</label>
                                       <input type="text" wire:model="country" class="form-control">
                                  </div>
                                  <div class="row">
                                       <div class="col-md-6 mb-4">
                                            <div class="form-group">
                                                 <label for="">State</label>
                                                 <input type="text" wire:model="state" placeholder="state" class="form-control">
                                            </div>
                                       </div>
                                       <div class="col-md-6">
                                            <div class="form-group">
                                                 <label for="">City</label>
                                                 <input type="text" wire:model="city" placeholder="city" class="form-control">
                                            </div>
                                       </div>
                                  </div>
                             </div>
                        </div>
                        <div class="prl-card">
                             <div class="prl-card-body">
                                  <div class="form-group mb-4">
                                       <label for="">Crypto Currency</label>
                                       <select name="country" id="" class="form-control" wire:model="cryptotype">
                                             <option value="">Select Crypto Currency</option>
                                             <option value="Bitcoin">Bitcoin</option>
                                             <option value="Ethereum">Ethereum</option>
                                             <option value="Litecoin">Litecoin</option>
                                             <option value="Usdt">USDT Etherum</option>
                                       </select>
                                  </div>
                                  <div class="form-group mb-4">
                                       <label for="">Wallet Address</label>
                                       <input type="text" name="crypto-wallet" wire:model="cryptoaddress" class="form-control">
                                  </div>
                             </div>
                             <div class="text-end">
                              <button wire:loading.attr="disabled" wire:target="Updateprofile" class="rlf-btn rlf-btn-primary">Save Changes</button>
                         </div>
                        </div>
                      </form>

                      <form wire:submit.prevent="UpdatePassword">
                        <div class="prl-card">
                             <!--session error-->
                              @if(session('error-pwsd'))
                              <p class="text-danger fw-bold">{{session('error-pwsd')}}</p>
                              @endif
                    
                              <!--session success-->
                              @if(session('succeed-pwsd'))
                                   <p class="text-success fw-bold">{{session('succeed-pwsd')}}</p>
                                   <script type="text/javascript">
                                        setTimeout(function() {
                                        window.location.href = 'dashboard';
                                        }, 3000);  
                                   </script>
                              @endif
                             <div class="prl-card-body">
                                  <div class="form-group mb-4">
                                       <label for="">Old Password</label>
                                       <input type="password" wire:model="oldpassword"  class="form-control">
                                  </div>
                                  <div class="form-group mb-4">
                                       <label for="">New Password</label>
                                       <input type="password" wire:model="newpassword"  class="form-control">
                                  </div>
                                  <div class="form-group mb-4">
                                       <label for="">Confirm Password</label>
                                       <input type="password" wire:model="confirmpassword"  class="form-control">
                                  </div>
                             </div>
                             <div class="text-end">
                              <button type="submit" class="rlf-btn rlf-btn-primary">Save Changes</button>
                           </div>
                        </div>
                        
                      </form>
                 </div>
              <div class="col-sm-1 col-lg-2"></div>
         </div>
        
    </div>
</main>

</div>