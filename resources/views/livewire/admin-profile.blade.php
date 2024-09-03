<div>
    
    <main>
        <div class="container p-0">
             <div class="row">
                  <div class="col-sm-1 col-lg-2"></div>
                  <div class="col-sm-12 col-lg-12 p-0">
                       <form wire:submit.prevent='UpdateprofileAdmin'>
                            <div class="prl-card">
                                 <div class="prl-card-header">
                                   <div class="img">
                                   @if($photo)
                                        <img src="{{$photo->temporaryUrl()}}" class="img-fluid profile-img" style="width:150px;height:70px;border:1px solid gray;border-radius:50%">
                                   @elseif(auth()->guard('admin')->user()->profile_photo=='')
                                        <img src="{{asset('asset/img/Avatars.png')}}" class="img-fluid profile-img" style="width:150px;height:70px;border:1px solid gray;border-radius:50%">
                                   @else
                                   <img src="{{auth()->guard('admin')->user()->profile_photo}}" class="img-fluid mb-2 profile-img" style="width:150px;height:70px;border:1px solid gray;border-radius:50%">
                                   @endif
                    
                                   <div class="d-none">
                                        <input type="file" wire:model="photo" id="file-img" wire:change="imagechanger">
                                   </div>
                    
                                   <!--file upload script and image preview-->
                                   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                   <script>
                                        $(document).ready(function(){
                                             $(".profile-img").click(function(){
                                              $("#file-img").click();
                                              
                                             });   
                                        })
                                    </script>
                               </div>
                              <div>
                                   <h2 class="dsb-header-sm mb-0">{{ucwords(auth()->guard('admin')->user()->first_name)}}&nbsp;{{ucwords(auth()->guard('admin')->user()->last_name)}}</h2>
                                   <small>{{ucwords(auth()->guard('admin')->user()->email)}}</small>
                                </div>
                                 </div>
                                 <div class="prl-card-body mt-5">
                                   @if(session('error'))
                                     <p class="fw-bold" style="color:#e21208;font-size:18px">{{session('error')}}</p>
                                   @endif
                                      <div class="row">
                                           <div class="col-md-6 mb-4">
                                                <div class="form-group">
                                                     <label for="">First Name</label>
                                                     <input type="text" name="firstname" wire:model="fname" class="form-control" required>
                                                </div>
                                           </div>
                                           <div class="col-md-6 mb-4">
                                                <div class="form-group">
                                                     <label for="">Last Name</label>
                                                     <input type="text" name="lastname" wire:model="lname" class="form-control" required>
                                                </div>
                                           </div>
                                      </div>
                                      <div class="form-group mb-4">
                                           <label for="">Email Address</label>
                                           <input type="text" name="email" id="" wire:model="email" class="form-control" required readonly>
                                      </div>
                                      <div class="row">
                                           <div class="col-md-12 mb-4">
                                                <div class="form-group">
                                                     <label for="">Phone Number (Primary)</label>
                                                     <input type="text" name="prim-phone" wire:model="phone" class="form-control" required>
                                                </div>
                                           </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6 form-group mb-4">
                                             <label for="">Country</label>
                                             <input type="text" name="country" wire:model="country" class="form-control" required>
                                        </div>
                                      
                                        <div class="col-md-6 form-group mb-4">
                                             <label for="">Address</label>
                                             <input type="text" name="address" wire:model="address" class="form-control" required>
                                        </div>
                                      </div>
                                      <div class="row">
                                           <div class="col-md-6 mb-4">
                                                <div class="form-group">
                                                     <label for="">State/Province</label>
                                                     <input type="text" name="state" wire:model="state" class="form-control" required>
                                                </div>
                                           </div>
                                           <div class="col-md-6">
                                                <div class="form-group">
                                                     <label for="">City</label>
                                                     <input type="text" name="lastname" wire:model="city" class="form-control" required>
                                                </div>
                                           </div>

                                           <div class="col-md-12 mb-4">
                                             <div class="form-group">
                                                  <label for="">Agent Percentage</label>
                                                  <input type="text" name="agentpercentage" wire:model="agentpercentage" class="form-control" required>
                                             </div>
                                        </div>
                                      </div>
                                 </div>
                                 <div class="text-end">
                                    <button type="submit" class="rlf-btn rlf-btn-primary">Save Changes</button>
                               </div>
                            </div>
                       </form>
                          
                       <form>
                            <div class="prl-card">
                                 <div class="prl-card-body">
                                      <div class="form-group mb-4">
                                           <label for="">Old Password</label>
                                           <input type="password" name="old-password"  class="form-control">
                                      </div>
                                      <div class="form-group mb-4">
                                           <label for="">New Password</label>
                                           <input type="password" name="new-password"  class="form-control">
                                      </div>
                                      <div class="form-group mb-4">
                                           <label for="">Confirm Password</label>
                                           <input type="password" name="confirm-password"  class="form-control">
                                      </div>
                                 </div>
                            </div>
                            <div class="text-end">
                                 <button class="rlf-btn rlf-btn-primary">Save Changes</button>
                            </div>
                            
                       </form>
                  </div>
                  <div class="col-sm-1 col-lg-2"></div>
             </div>
            
        </div>
   </main>
</div>
