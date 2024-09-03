<div>
    <!--poplular searches--->
    <div class="container-fluid poplular-search mt-5">
        <h1 class="mt-5 px-3">Popular Resident</h1>
        <div class="row justify-content-start flex-wrap p-2">
          @foreach($selectAsset as $asset)
            <section class="col-md-3">
              <a href="/addreservation/{{base64_encode($asset->id)}}" style="color:inherit">
                <img src="{{$asset->property_photos[0]}}" class="img-fluid">
                <h4 class="p-2 fw-bold">{{$asset->property_title}}<span class="float-end">4.96</span></h4>
                <p class="px-2">{{$asset->property_city}}</p>
                <h6 class="px-2"><span class="fw-bold">${{number_format($asset->property_price)}}</span>&nbsp;1sqm</h6>
              </a>
            </section>
            @endforeach
        </div>
       </div>
    
    <!-- Modal For Complete Registration -->
    <div wire:ignore.self class="modal fade" id="profile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title" id="staticBackdropLabel">
              Complete Registration
            </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body px-4">
            <p class="text-muted px-3">Please take a minute to fill in your information. You will only have to do this once. We promise!</p>
          
          <!--form insert-->
          <form class="row g-3 mt-4 complete-registration" wire:submit.prevent='CompleteRegistration'>
    
              <!--session error-->
              @if(session('error'))
                <p style="color:#e21208;font-size:18px">{{session('error')}}</p>
                <script type="text/javascript">
                    let ModalContent = document.querySelector('.modal-body');
                    ModalContent.scrollTop = -100;
              </script>
              @endif
    
            <!--session success-->
            @if(session('succeed'))
               <script type="text/javascript">
                  $(document).ready(function() {
                      $('#profile').modal('hide');
                      $('.completed-profile-popup').removeClass('d-none');
                      setTimeout(function() {
                       window.location.href = 'dashboard';
                   }, 10000);
                  });
                 
               </script>
            @endif
    
            <div class="col-md-6">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control shadow-none" id="firstname" wire:model="first_name" required>
              </div>
              <div class="col-md-6">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control shadow-none" id="lastname" wire:model="last_name" required>
              </div>
              <div class="col-12">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control shadow-none" id="email"  wire:model="email" readonly required>
              </div>
              <div class="col-6">
                <label for="inputAddress2" class="form-label">Gender</label>
                 <select class="form-control shadow-none shadow-none" wire:model="gender">
                   <option>Select Gender</option>
                   <option>Male</option>
                   <option>Female</option>
                 </select>
              </div>
              <div class="col-md-6">
                <label for="inputCity" class="form-label">Date of Birth</label>
                <input type="date" class="form-control shadow-none shadow-none" id="inputCity" wire:model="dob" required>
              </div>
    
              <div class="col-md-6">
                <label for="state" class="form-label">State</label>
                <select id="state" class="form-select shadow-none" wire:model="state">
                  <option>Select State</option>
                  <option>Abia</option>
                  <option>Adamawa</option>
                </select>
              </div>
    
              <div class="col-md-6">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control shadow-none text-capitalize" id="city" wire:model="city" required>
              </div>
    
              <div class="col-md-12">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="number" class="form-control shadow-none" id="phone" wire:model="phone" required>
              </div>
          </div>
            <div class="modal-footer">
              <button type="submit" wire:target='CompleteRegistration' wire:loading.attr='disabled' class="btn btn-secondary w-100 submit-button">save</button>
            </div>
          </form>
    
        </div>
      </div>
    </div>
    
    @if(Auth::user()->city=="")
    <script>
      $(document).ready(function(){
        //show code popup
        setTimeout(function() {
          $('#profile').modal('show');
        },1000);
      })
    </script>
    @endif
    
    <!---completed profile notification message-->
    <div class="completed-profile-popup p-4 d-none">
        <div class="row justify-content-center flex-wrap">
           <section class="col-md-6 p-3">
               <img src="{{asset('asset/thanks.png')}}">
               <h3 class="fw-bold text-center p-2">Hello {{ucwords(auth()->user()->first_name)}}, thank you for completing your registration with chaincity</h3>
           </section>
        </div>
    </div>
    
    
    <!--agent profile verification-->
    <div wire:ignore.self class="modal fade" id="Agentprofile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel" style="color:#D80450;">Agent Profile Verification&nbsp;<i class="bi bi-patch-check-fill"></i></h1>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                <!--session error-->
                @if(session('error-2'))
                <p style="color:#e21208;font-size:18px">{{session('error-2')}}</p>
                <script type="text/javascript">
                    let ModalContent = document.querySelector('.modal-body');
                    ModalContent.scrollTop = -100;
              </script>
              @endif
    
              <!--session success-->
              @if(session('succeed-2'))
                  <script type="text/javascript">
                    $(document).ready(function() {
                        $('#Agentprofile').modal('hide');
                        $('.completed-agent-popup').removeClass('d-none');
                        setTimeout(function() {
                          window.location.href = 'dashboard';
                      }, 10000);
                    });
                    
                  </script>
              @endif
    
            <form class="row g-3 mt-4 complete-registration" wire:submit.prevent='AgentProfile'>
              <select class="form-control shadow-none" wire:model="verifymethod">
                <option>document type</option>
                <option>Driver License</option>
                <option>Voters Card</option>
                <option>National ID</option>
              </select>
    
              <div class="mt-5 mb-3">
                <h5 class="p-2" style="color:#D80450;">ID front</h5>
                 @error('photo1')
                    <p class="text-danger">'Oh snap, we dont think this is an image.</p>
                  @enderror
                <aside class="agent-verify-profile-image">
                  @if($photo1)
                    <img src="{{$photo1->temporaryUrl()}}" class="img-fluid img-thumbnail mb-2 profile-img" style="width:100%;height:100%;object-fit:contain">
                  @else
                    <img src="{{asset('asset/front-of-id-card.png')}}" class="img-fluid img-thumbnail mb-2 profile-img" style="width:100%;height:100%;object-fit:contain">
                  @endif
                  <div class="d-none">
                    <input type="file" wire:model="photo1" id="file-img" wire:change="imagechanger">
                  </div>
                </aside>
              </div>
    
              <div class="mt-5">
                <h5 class="p-2" style="color:#D80450;">ID back</h5>
                @error('photo2')
                    <p class="text-danger">'Oh snap, we dont think this is an image.</p>
                  @enderror
                <aside class="agent-verify-profile-image">
                  @if($photo2)
                    <img src="{{$photo2->temporaryUrl()}}" class="img-fluid img-thumbnail mb-2 profile-img2" style="width:100%;height:100%;object-fit:contain">
                  @else
                    <img src="{{asset('asset/front-of-id-card.png')}}" class="img-fluid img-thumbnail mb-2 profile-img2" style="width:100%;height:100%;object-fit:contain">
                  @endif
                  <div class="d-none">
                    <input type="file" wire:model="photo2" id="file-img2" wire:change="imagechanger">
                  </div>
                </aside>
              </div>
    
              <!--file upload script and image preview-->
              <script>
                $(document).ready(function(){
                  //id front
                  $(".profile-img").click(function(){
                      $("#file-img").click();
                  }); 
                  
                  //id back
                  $(".profile-img2").click(function(){
                      $("#file-img2").click();
                  }); 
                })
            </script>
            </div>
            <div class="modal-footer">
              <button type="submit" wire:target='AgentProfile' wire:loading.attr='disabled' class="btn w-100 submit-button" style="background-color:#D80450;color:#fff">Request</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    
    
    <!---completed profile notification message-->
    <div class="completed-agent-popup p-4 d-none">
      <div class="row justify-content-center flex-wrap">
         <section class="col-md-6 p-3">
             <img src="{{asset('asset/thanks.png')}}">
             <h3 class="fw-bold text-center p-2">Hello {{ucwords(auth()->user()->first_name)}}, 
              thank you for completing your agent profile registration with chaincity, 
              we will update you as soon as possible regarding your document
            </h3>
         </section>
      </div>
    </div>
    
    <!--handling key and value-->
    {{-- @foreach (auth()->user()->account_kyc as $key=>$value)
    <b>{{$key}}:{{$value}}</b>
    @endforeach
    {{auth()->user()->account_kyc['photo1']}} --}}
    
       
    </div>
    