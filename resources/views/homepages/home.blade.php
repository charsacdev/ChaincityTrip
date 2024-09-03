<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ChainCity Trip - Home</title>
  <link rel="shortcut icon" type="text/css" href="asset/img/logo.png">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('vendor/bootstrap/bootstrap.min.css')}}">

  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="{{asset('vendor/fontawesome/all.min.css')}}">

  <!-- Datatables CSS -->
  <link rel="stylesheet" href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}">

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="{{asset('vendor/swiper/swiper-bundle.min.css')}}">

  <!--Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('css/slidercssaccount.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
  <div class="page-wrapper">
    <header class="ct-header">
      <div class="overlay">
        <nav class="navbar navbar-expand-lg">
          <div class="container cosynav">
            <a class="navbar-brand" href=""><img src="asset/img/logo.png" class="img-fluid" id="log" alt="logo"></a>

            <!-- Nav Item -->
            <ul class="navbar-nav ma-auto  nav-sm">
              <!-- Logo on small screen -->
              <div class="sm-logo-ctn d-lg-none ">
                <img src="{{asset('asset/img/logo.png')}}" class="img-fluid mb-2" alt="">
              </div>
              <!-- <span class="close d-lg-none d-sm-block">&times;</span> -->
              <li class="nav-item">
                <a class="nav-link active" href="/">Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="/faq">Faq</a>
              </li>
              <li class="nav-item">
                <a class="nav-link getstarted-btn" href="/contact">Contact us</a>
              </li>

              <li class="nav-item nav-bg-ml">
                <a href="/register" class="nav-link auth-btn register">
                  Sign up
                </a>
              </li>
              <li class="nav-item">
                <a href="/login" class="nav-link auth-btn login">
                  Login
                </a>
              </li>
            </ul>

            <!-- Harmburger menu icon -->
            <div class="menu-btn d-lg-none d-sm-block">
              <div class="menu-btn-burger"></div>
            </div>
          </div>
        </nav>
        <div class="home-banner">
          <div class="container">
            <div class="banner-content">
              <div class="row">
                <div class="col-md-7">
                  <span class="banner-tag">real estate</span>
                  <h1 class="banner-title">Let's hunt for your dream residence</h1>
                  <p class="sub-title mb-5">Explore our range of beautiful properties with the addition of separate
                    accomodation suitable for you.</p>
                </div>
              </div>
            </div>
            <img src="{{asset('asset/img/chaincity-trip-banner-img.png')}}" class="banner-img" alt="">

            <div class="custom-tab">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" data-bs-toggle="tab" href="#buy"></i> Buy</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#rent"> Rent</a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="buy" role="tabpanel">
                  <form class="w-100" action="{{route('searchlisting')}}" method="post">
                    @csrf
                  <div class="banner-srh">
                    <div class="ctn">
                      <label>Location</label>
                      <br>
                      <select name="location">
                        <option>Select your city</option>
                        @foreach($city as $cities)
                          <option style="text-overflow: ellipsis;">{{$cities->property_city}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="ctn">
                      <label>Type</label>
                      <br>
                      <select name="property_type">
                        <option>Select property type</option>
                        @foreach($type as $types)
                          <option style="text-overflow: ellipsis;">{{$types->property_type}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="ctn">
                      <label>Price Range</label>
                      <br>
                      <select name="pricerange">
                        <option>Select rent range</option>
                        <option value="73">$0 - $73</option>
                        <option value="173">$75 - $173</option>
                        <option value="773">$200 - $773</option>
                      </select>
                    </div>
                    <div class="ctn">
                      <button class="rlf-btn rlf-btn-primary">Search</button>
                    </div>
                  </div>
                  </form>
              </div>
                <div class="tab-pane fade show" id="rent" role="tabpanel">
                  <form class="w-100" action="{{route('searchlisting')}}" method="post">
                    @csrf
                  <div class="banner-srh">
                    <div class="ctn">
                      <label>Location</label>
                      <br>
                      <select name="location">
                        <option>Select your city</option>
                        @foreach($city as $cities)
                         <option style="text-overflow: ellipsis;">{{$cities->property_city}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="ctn">
                      <label>Type</label>
                      <br>
                      <select name="property_type">
                        <option>Select property type</option>
                        @foreach($type as $types)
                          <option style="text-overflow: ellipsis;">{{$types->property_type}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="ctn">
                      <label>Price Range</label>
                      <br>
                      <select name="pricerange">
                        <option>Select rent range</option>
                        <option value="73">$0 - $73</option>
                        <option value="173">$75 - $173</option>
                        <option value="773">$200 - $773</option>
                      </select>
                    </div>
                    <div class="ctn">
                      <button class="rlf-btn rlf-btn-primary">Search</button>
                    </div>
                  </div>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </header>

    <main>
      <section class="ct-section">
        <div class="container">
          <span class="ct-tag ct-tag-secondary">discover</span>
          <div class="d-flex align-items-end justify-content-between">
            <div>
              <h2 class="ct-header-title">Best recommendation</h2>
              <span class="spt-text">Discover our exclusive selection of the finest one-of-a-kind luxury properties
                architectural masterpieces.</span>
            </div>
           
          </div>
          <a href="/property" class="text-dark d-flex align-items-center justify-content-end gap-2 sem-ctn">
            <span>Learn More </span>
            <img src="{{asset('asset/img/icon-arrow-right-green.png')}}" alt="">
          </a>
          <div class="row">
            <div class="col-sm-12">
              <div class="ct-card-ctn">
                @foreach($data as $asset)
                <a href="/addreservation/{{base64_encode($asset->id)}}" class="text-dark">
                  <div class="ct-card">
                    <div class="ct-card-img">
                      <img src="{{asset('asset/img/home-img2.png')}}" alt="">
                    </div>
                    <h3 class="ct-card-title">{{$asset->property_title}}</h3>
                    <p class="ct-card-locale">{{$asset->property_city}}</p>
                    <div class="d-flex align-items-center  justify-content-start">
                      <h3 class="ct-card-price">${{number_format($asset->property_price)}}</h3>
                      <div class="sm-tag">
                        <span class="mx-0">{{$asset->property_type}}</span>
                      </div>
                    </div>
                    <div class="ct-card-btn ct-btn-outline">send inquiry</div>
                  </div>
                </a>
                @endforeach
                
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="ct-section" style="background-color: var(--ct-bg-color);">
        <div class="container">
          <span class="ct-tag ct-tag-primary">Our benefits</span>
          <h2 class="ct-header-title">Giving you peace <br> of mind</h2>
          <div class="row mt-5">
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
              <div class="ct-card-2">
                <img src="{{asset('asset/img/icon-love.png')}}" alt="">
                <h3 class="ct-card-2-title">Comfortable</h3>
                <p class="ct-card-2-text">
                  Enjoy lifestyle amenities designed to provide every homeowners modern comfort, 
                  a stone's throw away from schools, churches and hospitals.
                </p>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
              <div class="ct-card-2">
                <img src="{{asset('asset/img/icon-checked.png')}}" alt="">
                <h3 class="ct-card-2-title">Extra security</h3>
                <p class="ct-card-2-text">
                  You can connect with potential tenants without having to share your phone number.
                  We also require all users to register to validate their legitimacy.
                </p>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
              <div class="ct-card-2">
                <img src="{{asset('asset/img/icon-star-slashed.png')}}" alt="">
                <h3 class="ct-card-2-title">Luxury</h3>
                <p class="ct-card-2-text">
                  Find out how we provide the highest standard of professional property management
                  to give you all the benefits of property.
                </p>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
              <div class="ct-card-2">
                <img src="{{asset('asset/img/icon-inside-star.png')}}" alt="">
                <h3 class="ct-card-2-title">Best price</h3>
                <p class="ct-card-2-text">
                  Not sure what you should be charging for your property? Let us do the numbers for you - 
                  contact us today for a free rental appraisal on your home.
                </p>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
              <div class="ct-card-2">
                <img src="{{asset('asset/img/icon-map-green.png')}}" alt="">
                <h3 class="ct-card-2-title">Strategic location</h3>
                <p class="ct-card-2-text">
                  Located in the city center close to the shopping center. Very good for areas
                  sorrounded by international education centers, start-up office centers. 
                </p>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
              <div class="ct-card-2">
                <img src="{{asset('asset/img/icon-circle-segment.png')}}" alt="">
                <h3 class="ct-card-2-title">Efficiency</h3>
                <p class="ct-card-2-text">
                   Schedule visits to multiple properties at once in one day without having 
                   to call them one by one. Check everything and find the best properties for rent.
                </p>
              </div>
            </div>
          </div>
        </div>

      </section>
      <section class="ct-section mt-100">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="ct-abt-ctn">
                <div class="ct-card-sm">
                  <img src="asset/img/icon-rounded-checked.png" class="ct-card-tp-img" alt="">
                  <h3 class="ct-card-sm-title">4.8</h3>
                  <div class="d-flex align-items-center justify-content-between my-3 ct-card-star">
                    <img src="asset/img/icon-star-slashed.png" width="20px" alt="">
                    <img src="asset/img/icon-star-slashed.png" width="20px" alt="">
                    <img src="asset/img/icon-star-slashed.png" width="20px" alt="">
                    <img src="asset/img/icon-star-slashed.png" width="20px" alt="">
                    <img src="asset/img/icon-star-slashed.png" width="20px" alt="">
                  </div>
                  <div class="ct-card-sm-spt-text">Trusted on</div>
                  <div class="ct-card-sm-rvw">500+ Reviews</div>
                </div>
                <img src="asset/img/ct-img.png" class="img-fluid" alt="">
                <div class="ct-card-sm-stat">
                  <div class="d-flex align-items-center justify-content-start gap-3">
                    <h3 class="ct-card-sm-stat-num">250+</h3>
                    <span class="ct-card-sm-stat-spt-text">Property <br> Sale</span>
                  </div>
                  <div class="d-flex align-items-center justify-content-start gap-3">
                    <h3 class="ct-card-sm-stat-num">250+</h3>
                    <span class="ct-card-sm-stat-spt-text">Property <br> Rent</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="ct-ab-ctn">
                <div class="ct-tag ct-tag-secondary">about us</div>
                <h3 class="ct-header-title">How much is your property worth now?</h3>
                <p>
                  We have built our reputation as true local area experts. We have gained more knowlege
                  about buyer interests, our neighborhood and the market than any other 
                  brand because we live locally and work for local people.
                </p>
                <a href="javascript:;" class="ct-ab-ctn-btn">learn more</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section>
        <div class="container">
          <div class="ct-tag ct-tag-secondary">customer testimonial</div>
          <h3 class="ct-header-title">People say about us?</h3>
          <a href="javascript:;" class="text-dark d-flex align-items-center justify-content-end gap-2 sem-ctn">
            <span>See More </span>
            <img src="asset/img/icon-arrow-right-green.png"  alt="">
          </a>
          <div class="row mt-5">
            @foreach ($reviews as $item)
                <div class="col-md-4 mb-3">
                  <div class="ct-tm-card">
                    <p class="fw-bold d-none">
                      It proved to be the exactly the kind <br> of home we wanted
                    </p>
                    <p class="fs-14">
                      {{$item->rating_message}}
                    </p>
                    <div class="d-flex align-items-center justify-content-start gap-3 mt-5">
                      <div class="img">
                        <img src="{{$item->user->profile_photo}}" alt="">
                      </div>
                      <div>
                        <h5 class="tfy-nm">{{$item->user->first_name}}&nbsp;{{$item->user->last_name}}</h5>
                        <span class="tfy-pt d-none">Marketing Manager</span>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
           
          </div>
        </div>
      </section>
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
  <script src="{{asset('js/plugins_init.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
  <script>
    $(document).ready(function () {
      $('.seem-btn').on('click', function () {
        location.href = 'properties.html';
      })

      // alert($('.ct-card').innerWidth())
    })
  </script>
</body>

</html>