<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ChainCity - Property</title>
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


  <!--Custom CSS-->
  <link rel="stylesheet" href="{{asset('css/plugin.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/chaincitydashboard.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
  <div class="page-wrapper">
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container cosynav">
              <a class="navbar-brand" href="/">
                <img src="asset/img/logo.png" class="img-fluid" id="log"
                  alt="logo">
                </a>
            
              <!-- Nav Item -->
              <ul class="navbar-nav ma-auto  nav-sm">
                <!-- Logo on small screen -->
                <div class="sm-logo-ctn d-lg-none ">
                  <img src="asset/img/logo.png" class="img-fluid mb-2" alt="">
                </div>
                <!-- <span class="close d-lg-none d-sm-block">&times;</span> -->
                <li class="nav-item">
                  <a class="nav-link" href="/">Home </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="/about">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="/faq">Faq</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/contact">Contact us</a>
                </li>
                <li class="nav-item nav-bg-ml">
                  <a href="/login" class="nav-link auth-btn">
                    <img src="asset/img/icon-user-white.png" alt=""> Login
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/register" class="nav-link auth-btn">
                    <img src="asset/img/icon-user-plus.png" alt=""> Register
                  </a>
                </li>
              </ul>
  
              <!-- Harmburger menu icon -->
              <div class="menu-btn d-lg-none d-sm-block">
                <div class="menu-btn-burger"></div>
              </div>
            </div>
          </nav>
    </header>
        
     
    <main>
        <!--poplular searches--->
        <div class="container poplular-search mt-3">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="dsb-header">Popular Resident</h1>
                <div>
                    <a href="javascript:;" class="text-dark"> See all <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="row">
                @foreach($data as $asset)
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
                        <div class="hse_desc">
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
                            <p class="text-muted">{{$asset->property_city}}</p>
                            <h6>${{number_format($asset->property_price)}} &nbsp; 1sqm</h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Search Modal -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container-fluid p-3">
                            <button type="button" class="btn-close search-btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            <div class="col-md-10 m-auto">
                                <div class="row justify-content-center ltn-srh">
                                    <div class="col-md-3 col-sm-4 ctn ctn-start">
                                        <div>
                                            <label>Locations</label>
                                            <br>
                                            <select name="location">
                                                <option>Select your city</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-4  ctn">
                                        <div class="border-start-end">
                                            <label>Type</label>
                                            <br>
                                            <select name="property-type">
                                                <option>Select property type</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 ctn ctn-end">
                                        <div>
                                            <label>Price Range</label>
                                            <br>
                                            <select name="price-range">
                                                <option>Select rent range</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-12 d-flex ctn ctn-end end">
                                        <button class="rlf-btn rlf-btn-primary"><img
                                                src="asset/img/icon-search-white.png" class="srh-img"
                                                width="20px" alt=""></i> <span
                                                class="srh-text">Search</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!--footer--->
    <footer class="mt-5 pt-5">
      <div class="container">
        <div class="row justify-content-center flex-wrap footer">
          <div class="col-md-12 mt-3">
            <div class="col-12 text-center mb-3">
              <a href="javascript:;">
                <img src="asset/img/logo.png">
              </a>
            </div>
            <div class="col-12 d-flex align-items-center justify-content-center">
              <ul class="links footer-links justify-content-center">
                <li><a href="/" class="active"> Home</a></li>
                <li><a href="/about"> About</a></li>
                <li><a href="/faq"> FAQ</a></li>
                <li><a href="/contact"> Contact us</a></li>
              </ul>
            </div>
           
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
              
             <div class="col-sm-12 text-center pb-3 sub-footer mt-5">
                ChainCity &copy; <span id="year"></span>.
                Powered by <a href="https://tutapis.com" class="tutapis" target="_blank">Tutapis</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

  </div>


<!-- JS FILES -->
<script src="{{asset('vendor/jquery/jQuery3.6.1.min.js')}}"></script>
<script src="{{asset('vendor/popper/popper.js')}}"></script>
<script src="{{asset('vendor/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/fontawesome/all.min.js')}}"></script>
<script src="{{asset('vendor/jquery-validate/jquery.validate.js')}}"></script>
<script src="{{asset('vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('vendor/lightgallery/js/lightgallery-all.min.js')}}"></script>
<script src="{{asset('vendor/moment/moment.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('vendor/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{asset('js/plugins_init.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
</body>

</html>