<div>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChainCity-Trip || Dashboard</title>

    <!--asset-->
    <link rel="shortcut icon" type="text/css" href="{{asset('asset/img/chaincitylogo.jpg')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://preview.colorlib.com/theme/bootstrap/css-table-19/css/style.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('vendor/fontawesome/all.min.css')}}">
    <!-- Datatables CSS -->
    <link rel="stylesheet" href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}">

    <!-- Bootstrap daterangepicker -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-daterangepicker/daterangepicker.css')}}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{asset('vendor/swiper/swiper-bundle.min.css')}}">

    <!-- Lightgallery CSS -->
    <link rel="stylesheet" href="{{asset('vendor/lightgallery/css/lightgallery.min.css')}}">
    
     <!-- Dropify CDN -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer">




    <!--Custom CSS-->
    <link rel="stylesheet" href="{{asset('css/plugin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/chaincitydashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!--map leaf data-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script src="{{asset('vendor/jquery/jQuery3.6.1.min.js')}}"></script>
    @livewireStyles
</head>
<body>
    <div class="page-wrapper">
        <header class="header2">
        <!---logged In user-->
        @auth
          @if(request()->segment(count(request()->segments()))==="message" || request()->segment(count(request()->segments()))==="notification")
          
          @else
          <nav class="navbar">
            <div class="container cosynav">
                <a class="navbar-brand" href="/dashboard">
                    <img src="{{asset('asset/img/logo.png')}}" class="img-fluid" id="log"
                        alt="logo">
                  </a>
                <!-- Search -->
                <button class="btn_sc" data-bs-toggle="modal" data-bs-target="#searchModal">
                    <span class="text-muted sc_icon_ctn">
                        <i class="fa fa-search"></i> &nbsp;
                        <span class="search_keyword" style="opacity: .6;">Search here...</span>
                    </span>
                    <span class="filter_icon"><img src="../asset/img/filter.png" alt=""></span>
                </button>

                <div class="d-flex align-items-center justify-content-between gap-5 header2-nav-links">
                    <a class="nav-link" href="/listing">Listing</a>
                    <a class="nav-link active" href="/reservations">Reservation</a>
                    <a class="nav-link p-relative" href="/message">Messages <span class="msg-alert"></span></a>
                    <!--<a class="nav-link" href="insight">Insights</a>-->
                    @if(auth()->guard('web')->user()->account_kyc['verify_status']=="pending")
                     <a class="nav-link d-none d-md-block" href="#" data-bs-toggle="modal" data-bs-target="#Agentprofile">Become an Agent</a>
                    @endif
                </div>


                <div class="d-flex align-items-center justify-content-between gap-3">
                    <div class="nav-item  dropdown">
                        <a class="nav-link" style="margin-left: 0!important;" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="pinf__ctn">
                                <div class="pinf_anm bell-ctn" style="background:#000;"> 
                                    <i class="fa fa-bell" style="color:#fff"></i></div>

                            </div>
                        </a>
                        <ul class="dropdown-menu ntf_dpw p-3 drop-notify">
                            <li class="d-flex align-items-start justify-content-between border-bottom py-3">
                                <h3 class="dsb-header-sm text-primary mb-0">Notifications</h3>
                                <a href="/notification" class="text-dark"> <img src="../asset/img/brush.png"
                                        width="20px" alt=""> See all <i class="fa fa-arrow-right"></i></a>
                            </li>
                        
                            @foreach ($selectNotification as $item)
                            <li class="nav_dpd_itm">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-start justify-content-start gap-2">
                                        <div class="img">
                                            <img src="../asset/img/bookings_nt_img.png" alt="">
                                        </div>
                                        <div>
                                            <a href="/notification" class="text-dark">
                                                <h5 class="ntf_heading"><strong>{{$item->notification_type}}</strong></h5>
                                                <small class="ntf_stdt">{{$item->message}}</small>
                                            </a>
                                        </div>
                                    </div>
                                    <p class="ntf_tme text-muted">{{$item->created_at->format('F j, Y, g:i a') }}</p>
                                </div>
                            </li>

                        @endforeach   
                        </ul>
                    </div>

                    <div class="nav-item  dropdown">
                        <a class="nav-link" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="pinf__ctn">
                                <div class="pinf_anm" style="background:#000">
                                    {{ucwords(substr(Auth::guard('web')->user()->first_name, 0, 1))}}{{ucwords(substr(Auth::guard('web')->user()->last_name, 0, 1))}}
                                </div>
                            </div>
                       
                        <ul class="dropdown-menu pfl_dpw">
                            <li class="p-1"><a class="dropdown-item" href="/profile">Profile</a>
                            </li>
                            <li class="p-1"><a class="dropdown-item" href="/notification">Notification</a></li>
                            <li class="p-1"><a class="dropdown-item" href="/message">Messages</a>
                            </li>
                            <li class="p-1"><a class="dropdown-item" href="/reservations">Reservations</a></li>
                            <li class="p-1"><a class="dropdown-item" href="/listing">Listings</a></li>
                            <li class="p-1"><a class="dropdown-item" href="/savedlisting">Saved Listings</a></li>
                            </li>

                            @if(auth()->guard('web')->user()->account_kyc['verify_status']=="pending")
                                <li class="p-1 ba-agt">
                                    <a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#Agentprofile">Become an
                                        Agent
                                    </a>
                                </li>
                            @endif
                            
                            <hr style="margin-top: .5rem!important;margin-bottom: .5rem!important;">
                            <li><a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="/logout">
                                    <span>Logout</span>
                                    <img src="{{asset('asset/icon-logout-red.png')}}" alt=""></a>
                            </li>
                         </ul>
                        </a>
                    </div>
                </div>
            </div>
          </nav>
          @endif
        @endauth

          <!--not logged in user-->
          @guest
            <nav class="navbar navbar-expand-lg">
                <div class="container cosynav">
                    <a class="navbar-brand" href="/">
                        <img src="{{asset('asset/img/logo.png')}}" class="img-fluid" id="log"
                            alt="logo">
                    </a>
                    
                    <!-- Nav Item -->
                    <ul class="navbar-nav ma-auto  nav-sm">
                        <!-- Logo on small screen -->
                        <div class="sm-logo-ctn d-lg-none ">
                            <img src="../asset/img/logo.png" class="img-fluid mb-2" alt="">
                        </div>
                        <li class="nav-item">
                            <a class="nav-link active" href="dashboard.html">Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:;">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="javascript:;">Faq</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link getstarted-btn" href="javascript:;">Contact us</a>
                        </li>
                        <li class="nav-item d-flex">
                            <a href="/login" class="nav-link auth-btn">
                              <img src="{{asset('asset/icon-user-white.png')}}" alt="">
                              Login
                            </a>
                          
                            <a href="/register" class="nav-link auth-btn">
                              <img src="{{asset('asset/icon-user-plus.png')}}" alt="">
                              Register
                            </a>
                          </li>
                    </ul>
                    <!-- Harmburger menu icon -->
                    <div class="menu-btn d-lg-none d-sm-block">
                        <div class="menu-btn-burger"></div>
                    </div>
                </div>
             </nav>
            @endguest
        </header>

<!--user dashboard content---->
    @yield('content')

     <!--session success-->
     @if(session('mailchimp'))
     <script type="text/javascript">
       $(document).ready(function() {
         swal({
               title: 'Thank your for joining our news letter!',
               imageUrl: '../asset/img/verify.png',
               animation: true,
               showConfirmButton: false,
               timer: 5000
             })
       });
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
  
    

 <!--footer--->
 <footer class="mt-5 pt-5">
    <div class="container">
        <div class="row justify-content-center flex-wrap footer">
            <div class="col-md-7 mt-3">
                <div class="col-12 text-start mb-3">
                    <a href="javascript:;">
                        <img src="{{asset('asset/img/logo.png')}}">
                    </a>
                </div>
                <ul class="links">
                    <li><a href="javascript:;"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="javascript:;"><i class="fas fa-users"></i> About</a></li>
                    <li><a href="javascript:;"><i class="fas fa-question"></i> FAQ</a></li>
                    <li><a href="javascript:;"><i class="fas fa-phone-alt"></i> Contact us</a></li>
                </ul>
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                  <small>Receive the most recent news and updates directly in your email inbox!</small>
                </div>
                <form action="/subscribe" method="POST">
                  @csrf
                  <div class="form-group footer-newsletter">
                    <div class="input-group">
                      <input type="text" name="email" placeholder="Enter Email" class="form-control" required>
                      <div class="input-group-append">
                        <button class="input-group-text">Subscribe</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            <hr>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-4 col-lg-4">
                        <ul class="socials">
                            <li><a href="javascript:;"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <div class="d-none d-lg-block col-lg-4"></div>
                    <div class="col-sm-8 col-12 col-lg-4 text-end text-fl-center">
                        <a href="/terms" class="text-decoration-none text-muted me-2">Terms of service</a>
                        <a href="/privacy" class="text-decoration-none text-muted me-2">Privacy policy</a>
                    </div>
                </div>
                <div class="row">
                    <hr>
                    <div class="col-sm-12 text-center pb-3 sub-footer">
                        ChainCity &copy; 2023.
                        Powered by <a href="https://tutapis.com" target="_blank">Tutapis</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>






<!-- JS FILES -->
<script src="{{asset('vendor/popper/popper.js')}}"></script>
<script src="{{asset('vendor/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/fontawesome/all.min.js')}}"></script>
<script src="{{asset('vendor/jquery-validate/jquery.validate.js')}}"></script>
<script src="{{asset('vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('vendor/lightgallery/js/lightgallery-all.min.js')}}"></script>
<script src="{{asset('vendor/fileuploads/js/fileupload.js')}}"></script>
<script src="{{asset('vendor/darggable/jquery-ui-darggable.min.js')}}"></script>
<script src="{{asset('vendor/moment/moment.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('vendor/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{asset('js/listing.js')}}"></script>
<script src="{{asset('js/plugins_init.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script>
    $(document).ready(function(){
        var completeReg = 0;
        if (!completeReg) {
            setTimeout(() => {
                $('#completeRegModalBtn').click();
            }, 1);
        }
        

        $('#flexSwitchCheckDefaultPswd').on('change', function(){
            $('.pswd-ctn').toggleClass('d-none');
        });

        var wordLength = 250;
               var fullDescriptionContent = $('.full-description-content');
               var fullDescriptionOriginalContent = fullDescriptionContent.text();
               // var fullWordLength = wordCount(fullDescriptionContent);

               var shortDescriptionContent = $('.short-description-content');
               var shortDescriptionOriginalContent = shortDescriptionContent.text();
              

               setInitialDisplay(fullDescriptionContent, wordLength);
               setInitialDisplay(shortDescriptionContent, wordLength);

               //Function to set initial display
               function setInitialDisplay(input, n) {
                    var content = input.text().split(' ').slice(0, n).join(' ');
                    input.text(content + '...');
               }

               //Function to set initial display
               function setDisplayWords(input, text) {
                    input.text(text);
               }

               // Show the full content when show-more-btn is clicked
               $('.show-more-btn').on('click', function () {

                    setDisplayWords(fullDescriptionContent, fullDescriptionOriginalContent);

                    $(this).addClass('d-none');
                    $(this).siblings('.show-less-btn').removeClass('d-none');
               });
               $('.show-more-short-btn').on('click', function () {

                    setDisplayWords(shortDescriptionContent, shortDescriptionOriginalContent);

                    $(this).addClass('d-none');
                    $(this).siblings('.show-less-short-btn').removeClass('d-none');
               });

               // Reset to initial display
               $('body').on('click', '.show-less-btn', function () {
                    
                    setInitialDisplay(fullDescriptionContent, wordLength);

                    $(this).addClass('d-none');
                    $(this).siblings('.show-more-btn').removeClass('d-none');
               });
               $('body').on('click', '.show-less-short-btn', function () {
                    
                    setInitialDisplay(shortDescriptionContent, wordLength);

                    $(this).addClass('d-none');
                    $(this).siblings('.show-more-short-btn').removeClass('d-none');
               });

               //profile image
               $(".profile-img").click(function(){
                   $("#file-img").click();
              }); 

              //adding listing button
              if (window.location.pathname === '/listing') {
                  var addBtn = '<div class="text-start mt-2"> ' +
                            '<a href="/insight" class="rlf-btn rlf-btn-primary cta-btn">Create Listing &nbsp; <i class="fa fa-plus"></i></a> ' +
                         '</div>';

                 $('.dataTables_info').before(addBtn);
              }

              //message page
              $('.img-icon').on('click', function(){
                    $(this).parents('.chat-area-footer').find('.file_to_share').click();
               });

               $('.chat').on('click', function(){
                    $(this).addClass('active');
                    $(this).siblings('.chat').removeClass('active');

                    $('.chat-receiver-img').removeClass('d-none');
                    $('.chat-receiver-details').removeClass('d-none');
                    $('.chat-area-body').removeClass('d-none');
                    $('.chat-area-body.no-chat').addClass('d-none');
                    $('.chat-area-footer').removeClass('d-none');
                    
               })


               var screenWidth = $(window).width();
               if(screenWidth <= 767){
                    $('.chat').on('click', function(){
                         
                         $(this).parents('.chat-container').addClass('d-none');
                         $(this).parents('.chat-container').siblings('.chat-area-container').removeClass('d-none');
                    
                    });

                    $('.bck').on('click', function(){
                         $(this).parents('.chat-area-container').addClass('d-none');
                         $(this).parents('.chat-area-container').siblings('.chat-container').removeClass('d-none');
                    });

               }
                
    });
</script>
@livewireScripts
</div>
</body>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6585563807843602b804b3f2/1hi8dhkr8';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</html>
  
</div>
