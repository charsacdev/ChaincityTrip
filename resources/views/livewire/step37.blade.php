<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>ChainCity || Password Reset</title>
     <link rel="shortcut icon" type="text/css" href="{{asset('asset/img/chaincitylogo.jpg')}}">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="{{asset('vendor/bootstrap/bootstrap.min.css')}}">

     <!-- Fontawesome CSS -->
     <link rel="stylesheet" href="{{asset('vendor/fontawesome/all.min.css')}}">

     <!-- Datatables CSS -->
     <link rel="stylesheet" href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}">

     <!-- Swiper CSS -->
     <link rel="stylesheet" href="{{asset('vendor/swiper/swiper-bundle.min.css')}}">

     <!--Custom CSS-->
     <link rel="stylesheet" type="text/css" href="{{asset('asset/css/slidercssaccount.css')}}">
     <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
</head>

<body>
     <div class="page-wrapper">
          <!--registeration accounts-->
          <div class="container-fluid accounts">
               <div class="row">
                    <div class="col-md-5 d-none col-lg-6 d-lg-block px-0 mx-0">
                         <div class="rlf-banner">
                              <div class="rlf-overlay"></div>
                              <div class="rlf-container">
                                   <div class="rlf__logo">
                                        <img src="{{asset('asset/img/logo.png')}}" width="60px">
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="col-md-12 col-lg-12" style="min-height: 100vh;border:0px solid green">
                         <div class="row h-100">
                              <div class="col-lg-2 col-md-3 col-sm-1"></div>
                              <div class="col-lg-8 col-md-6 col-sm-10 d-flex align-items-center justify-content-start">
                                   <div class="row">
                                        <div class="col-12">
                                             <img src="{{asset('asset/img/headcap.png')}}" width="80px" alt="">
                                             <h3 class="dsb-header fw-bold">Congratulations, <br> &nbsp;{{ucwords(auth()->user()->last_name)}}!</h3>
                                             <small>From ChainCity team to you -- welcome onboard. Thank you for sharing your home and helping to create an 
                                                  incredible experiences for our guests.
                                             </small>
                                        </div>
                                        <a href="/listing" class="text-decoration-none fw-bold p-3" style="color:#D80450">View Listing</a></p>
                                   </div>
                              </div>
                              <div class="col-lg-2 col-md-3 col-sm-1"></div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</body>

</html>
