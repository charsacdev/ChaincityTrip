<div>
  <!--agent unverified error-->
  @if(session('agent-error'))
  <script type="text/javascript">
    $(document).ready(function() {
        //Sweet Alert for complete registration on dashboard page
        swal({
          title: 'Agent profile have not verified yet!',
          imageUrl: '../asset/img/verify.png',
          animation: true,
          showConfirmButton: false,
          timer: 5000
        })
      });
    </script>
  @endif
  
 <!--poplular searches--->
 <div class="container poplular-search mt-3">
  <div class="d-flex align-items-center justify-content-between">
      <h1 class="dsb-header">Popular Resident</h1>
      <div>
          <a href="javascript:;" class="text-dark"> See all <i class="fa fa-arrow-right"></i></a>
      </div>
  </div>
  <div class="row">
    <!--all dashboard page-->
    @foreach($selectAsset as $asset)
        <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
          <div class="psr_ctn">
              <div class="wishlist_icon">
                  <i class="far fa-heart"></i>
              </div>
              <div class="lightgallery">
                 @foreach($asset->property_photos as $photos)
                  <a href="{{$photos}}" data-sub-html="What the apartment look like"
                      data-exthumbimage="{{$photos}}"
                      data-src="{{$photos}}">
                      <div class="lg__btn"><i class="fa fa-eye"></i></div>
                  </a>
                  @break
                @endforeach
              </div>
              <div class="swiper popularSearchSwiper">
                  <div class="swiper-wrapper">
                    @foreach($asset->property_photos as $photos)
                      <div class="swiper-slide">
                          <a href="/addreservation/{{base64_encode($asset->id)}}">
                              <div class="img" style="background-image: url('{{$photos}}');"></div>
                          </a>
                      </div>
                    @endforeach
                  </div>
                  <div class="swiper-pagination"></div>
              </div>
              <div class="hse_desc" style="margin-top:-40px">
                <div class="d-flex align-items-center justify-content-between">
                    <h4><a href="/addreservation/{{base64_encode($asset->id)}}" class="text-dark">{{$asset->property_title}}</a></h4>
                    <span class=""><i class="fas fa-star"></i> 
                      @php($total = 0)
                        @foreach($asset->Rating as $rating)
                          @php($total += $rating->rating) 
                        @endforeach
                        @if($total>0)
                           {{$total/count($asset->rating)}}
                        @endif
                    </span>
                </div>
                <p class="text-muted fw-bold">{{$asset->property_city}}</p>
                <p class="d-none">4000 kilometers away</p>
                <h6>${{number_format($asset->property_price)}} &nbsp;</h6>
            </div>
          </div>
      </div>
    @endforeach
  
  </div>
 </div>
  
   <!-- Complete Registration Modal -->
  <div wire:ignore.self class="modal fade" id="completeRegModal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-md">
       <div class="modal-content">
           <button type="button" class="btn-close btn-close-regForm transparency" data-bs-dismiss="modal"
               aria-label="Close"></button>
           <div class="modal-body rounded" style="background: #fff;">
               <div class="container-fluid">
                   <form action="" id="completeRegForm" wire:submit.prevent='CompleteRegistration'>
                       <h2 class="nfxb-heading" >Complete Registration</h2>
                       <p class="text-sm">
                           Please take a minute to fill in your information. You will only have to do this
                           once. We promise!
                       </p>
                        <!--session error-->
                        @if(session('error'))
                        <p class="text-danger fw-bold">{{session('error')}}</p>
                        <script type="text/javascript">
                            let ModalContent = document.querySelector('.modal-body');
                            ModalContent.scrollTop = -100;
                      </script>
                      @endif

                    <!--session success-->
                    @if(session('succeed'))
                      <script type="text/javascript">
                          $(document).ready(function() {
                              $('#completeRegModal').modal('hide');

                              //Sweet Alert for complete registration on dashboard page
                              swal({
                                title: 'Registration Complete!',
                                imageUrl: '../asset/img/verify.png',
                                animation: true,
                                showConfirmButton: false,
                                timer: 2000
                              })
	
                              setTimeout(function() {
                                 window.location.href = 'dashboard';
                             }, 5000);
                          });
                        
                      </script>
                    @endif
                       <div class="row mt-5">
                           <div class="col-md-6 mb-3">
                               <div class="form-group">
                                   <label for="">First Name</label>
                                   <input type="text" wire:model="first_name" id="" class="form-control" required>
                               </div>
                           </div>
                           <div class="col-md-6 mb-3">
                               <div class="form-group">
                                   <label for="">Last Name</label>
                                   <input type="text" id="" wire:model="last_name" class="form-control" required>
                               </div>
                           </div>
                           <div class="col-md-12 mb-3">
                               <div class="form-group">
                                   <label for="">Email Address</label>
                                   <input type="email" wire:model="email" class="form-control" required>
                               </div>
                           </div>
                           <div class="col-md-6 mb-3">
                               <div class="form-group">
                                   <label for="">Gender</label>
                                   <select class="form-control" wire:model="gender">
                                       <option value="">Select</option>
                                       <option value="">Male</option>
                                       <option value="">Female</option>
                                   </select>
                               </div>
                           </div>
                           <div class="col-md-6 mb-3">
                               <div class="form-group">
                                   <label for="">Date Of Birth</label>
                                   <input type="date" class="form-control" wire:model="dob" required>
                               </div>
                           </div>
                           <div class="col-md-6 mb-3">
                               <div class="form-group">
                                   <label for="">State</label>
                                   <input type="text" name="name" wire:model="state" class="form-control text-capitalize" required>
                               </div>
                           </div>
                           <div class="col-md-6 mb-3">
                               <div class="form-group">
                                   <label for="">City</label>
                                   <input type="text" wire:model="city" class="form-control text-capitalize" required>
                               </div>
                           </div>
                           <div class="col-md-12 mb-3">
                               <div class="form-group">
                                   <label for="">Phone Number</label>
                                   <input type="tel" wire:model="phone" placeholder="ex. +1234567890" class="form-control">
                               </div>
                           </div>
                           
                           <button type="submit" id="completeRegBtn"
                               class="rlf-btn rlf-btn-secondary my-3 ff-btn">Save</button>
                       </div>
                   </form>
               </div>

           </div>
       </div>
   </div>
</div>
  
  @if(auth()->guard('web')->user()->city=="")
  <script>
    $(document).ready(function(){
      //show code popup
      setTimeout(function() {
        $('#completeRegModal').modal('show');
      },1000);
    })
  </script>
@endif
  

 
  <!--agent profile verification-->
  <div wire:ignore.self class="modal fade" id="Agentprofile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
       
        <div class="modal-body" style="background: #fff;">
          <div class="modal-header border-0">
            <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel" style="color:#0ace7e;">Agent Profile Verification&nbsp;<i class="bi bi-patch-check-fill"></i></h1>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
             
  
            <!--session success-->
            @if(session('succeed-2'))
                <script type="text/javascript">
                  $(document).ready(function() {
                      $('#Agentprofile').modal('hide');
                     //Sweet Alert for complete registration on dashboard page
                     swal({
                          title: 'Agent Application submitted',
                          imageUrl: '../asset/img/verify.png',
                          animation: true,
                          showConfirmButton: false,
                          timer: 2000
                        })
                      setTimeout(function() {
                        window.location.href = 'dashboard';
                    }, 10000);
                  });
                  
                </script>
            @endif
  
          <form class="row g-3 mt-4 complete-registration" wire:submit.prevent='AgentProfile'>
            <h5 class="p-2 fw-bold" style="color:#0ace7e;">Document Type</h5>
            <select class="form-control shadow-none" wire:model="verifymethod">
              <option>Document type</option>
              <option>Driver License</option>
              <option>Voters Card</option>
              <option>National ID</option>
            </select>
            
             <!--session error-->
              @if(session('error-2'))
              <p class="text-danger fw-bold">{{session('error-2')}}</p>
              <script type="text/javascript">
                  let ModalContent = document.querySelector('.modal-body');
                  ModalContent.scrollTop = -100;
            </script>
            @endif
  
            <div class="mt-5 mb-3">
              <h5 class="p-2 fw-bold" style="color:#0ace7e;">ID Front</h5>
               @error('photo1')
                  <p class="text-danger fw-bold">Oh snap, we dont think this is an image.</p>
                @enderror
              <aside class="agent-verify-profile-image">
                @if($photo1)
                  <img src="{{$photo1->temporaryUrl()}}" id="img001" class="img-fluid img-thumbnail mb-2 profile-img" style="width:100%;height:100%;object-fit:contain">
                @else
                  <img wire:ignore src="{{asset('asset/front-of-id-card.png')}}" id="img01" class="img-fluid img-thumbnail mb-2 profile-img" style="width:100%;height:100%;object-fit:contain">
                @endif
                <div class="d-none">
                  <input type="file" wire:model="photo1" id="file-img" wire:change="imagechanger">
                </div>
              </aside>
            </div>
  
            <div class="mt-5">
              <h5 class="p-2 fw-bold" style="color:#0ace7e;">ID Back</h5>
              @error('photo2')
                  <p class="text-danger fw-bold">Oh snap, we dont think this is an image.</p>
                @enderror
              <aside class="agent-verify-profile-image">
                @if($photo2)
                  <img src="{{$photo2->temporaryUrl()}}" id="img002" class="img-fluid img-thumbnail mb-2 profile-img2" style="width:100%;height:100%;object-fit:contain">
                @else
                  <img wire:ignore src="{{asset('asset/front-of-id-card.png')}}" id="img02"  class="img-fluid img-thumbnail mb-2 profile-img2" style="width:100%;height:100%;object-fit:contain">
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
                    
                    $("#file-img").change(function(){
                        $("#img01").attr('src','asset/loading.gif');
                    });
                    
                    
                    setInterval(function() {
                        $('#img001').on('load', function(e) {
                            $("#img01").attr('src',$("#img001").attr('src'));
                        })
                    }, 100);
                    
                }); 
                
                //id back
                $(".profile-img2").click(function(){
                    $("#file-img2").click();
                    
                     $("#file-img2").change(function(){
                        $("#img02").attr('src','asset/loading.gif');
                    });
                    
                    
                    setInterval(function() {
                        $('#img002').on('load', function(e) {
                            $("#img02").attr('src',$("#img002").attr('src'));
                        })
                    }, 100);
                }); 
              })
          </script>
          <div class="modal-footer">
            <button type="submit" wire:target='AgentProfile' wire:loading.attr='disabled' class="btn w-100 submit-button" style="background-color:#0ace7e;color:#fff">Request</button>
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  

  <!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
        <div class="modal-body">
            <form class="w-100" action="{{route('searching')}}" method="get">
                <div class="container-fluid p-3">
                    <button type="button" class="btn-close search-btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <div class="col-md-10 m-auto">
                        <div class="row justify-content-center ltn-srh">
                            <div class="col-md-3 col-sm-4 ctn ctn-start">
                                <div class="w-100" style="overflow:hidden;text-overflow: ellipsis;" >
                                    <label>Locations</label>
                                    <br>
                                    <select name="location">
                                      <option>Select your city</option>
                                      @foreach($selectCity as $cities)
                                      <option style="text-overflow: ellipsis;">{{$cities->property_city}}</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-4  ctn">
                                <div class="border-start-end">
                                    <label>Type</label>
                                    <br>
                                    <select name="property_type">
                                      <option>Select property type</option>
                                        @foreach($selectyType as $types)
                                         <option style="text-overflow: ellipsis;">{{$types->property_type}}</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 ctn ctn-end">
                                <div>
                                    <label>Price Range</label>
                                    <br>
                                    <select name="pricerange">
                                      <option>Select rent range</option>
                                      <option value="73">$0 - $73</option>
                                      <option value="173">$75 - $173</option>
                                      <option value="773">$200 - $773</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-12 d-flex ctn ctn-end end">
                                <button class="rlf-btn rlf-btn-primary"><img
                                        src="../asset/img/icon-search-white.png" class="srh-img"
                                        width="20px" alt=""></i> <span
                                        class="srh-text">Search</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
  
  
  
     
  </div>
  