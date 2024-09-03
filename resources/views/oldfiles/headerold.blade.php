<!DOCTYPE html>
<html>
<head>
	<title>ChainCity||Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
	<!--asset-->
	<link rel="shortcut icon" type="text/css" href="{{asset('asset/chaincitylogo.jpg')}}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--chaincity css-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/chaincitydashboard.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/slidercss2.css')}}">

     <!--chaincity js-->
     <script src="{{asset('js/jquerylink.js')}}" type="text/javascript"></script>
     <script src="{{asset('js/chaincity.js')}}" type="text/javascript"></script>

    <!--swipper slider css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
     <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

     <!--boostrape icon-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

     <!--data tables-->
     <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
     <link rel="stylesheet" href="https://preview.colorlib.com/theme/bootstrap/css-table-19/css/style.css">

     <!---date picker--->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
     <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

      <!--data tables-->
      <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="{{asset('css/table.css')}}">

      <!--map leaf data-->
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
      <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
      @livewireStyles
  </head>
<body>


<!---navigation dashboard---->
<nav>
   <div class="container-fluid">
      <section class="row justify-content-center p-0 p-md-2">
           <aside class="col-md-1 text-center d-flex p-2 p-md-0">
              <div class="">
                <a href="/dashboard">
                  <img src="{{asset('asset/logo.png')}}" class="img-fluid col-md-4" style="width:100%;height:60%;object-fit:contain;">
                </a>
                </div>
               <div style="width:80%" class="d-block d-md-none">
                <button class="col-md-4 d-flex p-1 float-end position-relative" data-bs-toggle="dropdown">
                    <aside style="width:60px" class="p-1 pt-2">
                       {{ucwords(substr(Auth::guard('web')->user()->first_name, 0, 1))}}{{ucwords(substr(Auth::guard('web')->user()->last_name, 0, 1))}}
                   </aside>
                    <aside style="width:100%;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;" class="p-2">
                        <p>{{ucwords(Auth::guard('web')->user()->first_name)}}</p>
                    </aside>
                    <span class="position-absolute translate-middle badge border border-light rounded-circle bg-success p-2" style="top:40px;left:40px">
                       </span>
               </button>
                    <!--drop menu-->
                  <ul class="dropdown-menu" style="width:200px">
                    <li class="p-1"><a class="dropdown-item" href="/dashboard">Dashbard</a></li>
                    <li class="p-1"><a class="dropdown-item" href="/profile">Profile</a></li>
                    <li class="p-1"><a class="dropdown-item" href="#">Notification</a></li>
                    <li class="p-1"><a class="dropdown-item" href="#">Message</a></li>
                    <li class="p-1"><a class="dropdown-item" href="/reservations">Reservation</a></li>
                    <li class="p-1"><a class="dropdown-item" href="/savedlisting">Saved Listing</a></li>
                    <li class="p-1"><a class="dropdown-item" href="/paymenthistory">History</a></li>
                    <li class="p-1"><a class="dropdown-item" href="/paymenthistory">History</a></li>
                    <li class="p-1"><hr class="dropdown-divider"></li>
                    <li class="p-1"><a class="dropdown-item" href="agent/dashboard">History</a></li>
                    <li class="p-1"><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="/logout">Logout
                            <span class="float-end">
                            <i class="bi bi-box-arrow-right"></i>
                           </span>
                        </a>

                    </li>
                  </ul>
                </div>
            </aside>
           <aside class="col-md-4 p-2 px-3">
               <div class="input-group input-group-sm mb-3 input-group-nav p-1">
                  <span class="input-group-text" id="inputGroup-sizing-sm">
                    <i class="bi bi-search"></i></span>
                  <input type="text" class="form-control shadow-none search-listing-input" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Search Here..">
                </div>
            </aside>
            <aside class="col-6 row justify-content-center flex-wrap d-none d-md-flex">
                <ul class="col-md-9 d-flex p-3" style="border:0px solid green">
                   <a href="/dashboard"><li class="mx-2">Dashboard</li></a>
                   <a href="/reservations"><li class="mx-2">Reservations</li></a>
                   <a href="/savedlisting"><li class="mx-2">Saved Listing</li></a>
                   <a href="/paymenthistory"><li class="mx-2">History</li></a>
                </ul>
                <button class="col-md-4 d-flex p-1 position-relative" data-bs-toggle="dropdown">
                    <aside style="width:60px" class="p-1 pt-2">
                       {{ucwords(substr(Auth::guard('web')->user()->first_name, 0, 1))}}{{ucwords(substr(Auth::guard('web')->user()->last_name, 0, 1))}}
                   </aside>
                    <aside style="width:100%;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;" class="p-2">
                        <p>{{ucwords(Auth::guard('web')->user()->first_name)}}</p>
                    </aside>
                    <span class="position-absolute translate-middle badge border border-light rounded-circle bg-success p-2" style="top:40px;left:40px">
                       </span>
               </button>
                <!--drop menu-->
                  <ul class="dropdown-menu" style="width:200px">
                    <li class="p-1"><a class="dropdown-item" href="/dashboard">Dashbard</a></li>
                    <li class="p-1"><a class="dropdown-item" href="/profile">Profile</a></li>
                    <li class="p-1"><a class="dropdown-item" href="#">Notification</a></li>
                    <li class="p-1"><a class="dropdown-item" href="#">Message</a></li>
                    <li class="p-1"><a class="dropdown-item" href="/reservations">Reservation</a></li>
                    <li class="p-1"><a class="dropdown-item" href="/savedlisting">Saved Listing</a></li>
                    <li class="p-1"><a class="dropdown-item" href="/paymenthistory">History</a></li>
                    <li class="p-1"><hr class="dropdown-divider"></li>
                    @if(auth()->user()->account_kyc['verify_status']!=='completed')
                     <li class="p-1"><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Agentprofile">Agent</a></li>
                    @else
                    <li class="p-1"><a class="dropdown-item" href="/agent/earnings">Agent</a></li>
                    @endif
                    <li class="p-1"><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="/logout">Logout
                            <span class="float-end">
                            <i class="bi bi-box-arrow-right"></i>
                           </span>
                        </a>

                    </li>
                  </ul>
            </aside>
      </section>
   </div>
</nav>

<!--search listing--->
<div class="container-fluid search-listing p-3 d-none">
  <!--listing-->
  <button class="float-end listpopup-button"><i class="bi bi-x-lg"></i></button>
          <div class="col-md-10 m-auto" style="border:0px solid yellow;">
              <section class="row justify-content-center input-group listing">
                  <aside class="col-md-3">
                      <label>Location</label>
                      <br>
                      <select>
                           <option>select city</option>
                      </select>
                  </aside>

                  <aside class="col-md-3">
                      <label>Location</label>
                      <br>
                      <select>
                           <option>select city</option>
                      </select>
                  </aside>

                  <aside class="col-md-3">
                      <label>Location</label>
                      <br>
                      <select>
                           <option>select city</option>
                      </select>
                  </aside>

                  <aside class="col-md-3">
                      <button class="btn btn-primary btn-search"><i class="bi bi-search"></i>&nbsp;search</button>
                  </aside>
              </section>
          </div>
    </div>

<!--user dashboard content---->
    @yield('content')


<!--footer--->
<div class="container-fluid">
    <div class="row justify-content-center flex-wrap p-3 footer">
       <section class="col-md-10 p-4">
        <img src="{{asset('asset/logo.png')}}">
       </section>
        <section class="col-md-10 p-1 mt-3" style="border-bottom:1px solid gray">
           <ul>
            <a href="#"><li class="me-2"><i class="bi bi-house-fill"></i>&nbsp;Home</li></a>
            <a href="#"><li class="me-2"><i class="bi bi-people-fill"></i>&nbsp;About</li></a>
            <a href="#"><li class="me-2"><i class="bi bi-question-octagon"></i>&nbsp;FAQ</li></a>
            <a href="#"><li class="me-2"><i class="bi bi-telephone-fill"></i>&nbsp;Contact Us</li></a>
           </ul>
        </section>
         <section class="col-md-10 p-4">
            <aside class="float-start">
               <ul>
                <a href="#"><li class="me-2"><i class="bi bi-facebook"></i></li></a>
                <a href="#"><li class="me-2"><i class="bi bi-twitter"></i></li></a>
                <a href="#"><li class="me-2"><i class="bi bi-instagram"></i></li></a>
                <a href="#"><li class="me-2"><i class="bi bi-linkedin"></i></li></a>
               </ul>
            </aside>
            <aside class="float-end d-flex">
               <a href="" class="text-decoration-none text-muted me-2">Terms of service</a>
               <a href="" class="text-decoration-none text-muted me-2">Privacy policy</a>
               </ul>
            </aside>
         </section>
    </div>

   @livewireScripts
</div>