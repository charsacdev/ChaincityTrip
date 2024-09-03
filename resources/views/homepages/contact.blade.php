<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ChainCity - Contact Us</title>
  <link rel="shortcut icon" type="text/css" href="{{asset('asset/img/chaincitylogo.jpg')}}">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">

  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="vendor/fontawesome/all.min.css">

  <!-- Datatables CSS -->
  <link rel="stylesheet" href="vendor/datatables/css/jquery.dataTables.min.css">

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="vendor/swiper/swiper-bundle.min.css">

  <!--Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('css/slidercssaccount.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/plugin.css')}}">

  <script src="{{asset('vendor/jquery/jQuery3.6.1.min.js')}}"></script>
</head>

<body>
  <div class="page-wrapper">
    <header class="header1 bread-crumb auth">
      <div class="overlay">
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
                <a class="nav-link" href="/about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="/faq">Faq</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="/contact">Contact us</a>
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

        <!-- BreadCrumb -->
        <div class="container">
          <div class="breadcrumb">
            <h2 class="title">Contact us</h2>
            <p class="support-text">We are only a messag away</p>
          </div>
        
        </div>
      </div>
    </header>

    <main>
      <div class="container">
        <section class="cnt-ctn">
          <div class="row">
            <div class="col-lg-6">
              <form action="{{route('contactmessage')}}" method="POST">
                @csrf
                <h3 class="title">Send message</h3>
                <p>Fill out the contact form below and send your message. We will get back to you as soon as possible.</p>
                  <!--error-->
                  @if(session('error'))
                    <p style="color:#e21208;font-size:18px">{{session('error')}}</p>
                  @endif

                  <!--session-->
                  @if(session('succeed'))
                    <p style="color:#1a7807;font-size:18px">{{session('succeed')}}</p>
                  @endif
                
                <div class="row">
                  <div class="mb-2">
                    <label for="">Full Name</label>
                    <div class="input-group mb-3 i-group-div">
                      <span class="input-group-text pr-0" id="basic-addon1">
                        <img src="asset/img/icon-user.png" alt="">
                      </span>
                      <input type="text" name="fullname" class="form-control shadow-none"
                        placeholder="First name, Middle name, Last Name" required>
                    </div>
                  </div>
                  <div class="mb-2">
                    <label for="">Email Address</label>
                    <div class="input-group mb-3 i-group-div">
                      <span class="input-group-text pr-0" id="basic-addon1">
                        <img src="asset/img/icon-envelope.png" alt="">
                      </span>
                      <input type="text" name="email" class="form-control shadow-none" placeholder="ex.  hello@gmail.com" required>
                    </div>
                  </div>
                  <div class="mb-2">
                    <label for="">Message</label>
                    <textarea name="message" cols="30" rows="10" class="form-control" required></textarea>
                  </div>
                </div>
                <button type="submit" id="reg-btn" class="rlf-btn rlf-btn-primary  w-100 my-3">Send message</button>
              </form>
            </div>
            <div class="col-lg-6">
              <iframe width="100%" height="100%"
                src="https://www.openstreetmap.org/export/embed.html?bbox=8.125376701354982%2C6.29994254043689%2C8.173270225524904%2C6.325023768154313&amp;layer=mapnik&amp;marker=6.312483306114125%2C8.149323463439941"
                style="border: 1px solid gray;border-radius:9px"></iframe>
            </div>
          </div>
        </section>

    </main>

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

  <!--footer--->
  <footer class="mt-5 pt-5">
    <div class="container">
        <div class="row justify-content-center flex-wrap footer">
            <div class="col-md-7 mt-3">
                <div class="col-12 text-start mb-3">
                    <a href="javascript:;">
                        <img src="asset/img/logo.png">
                    </a>
                </div>
                <ul class="links footer-links">
                    <li><a href="/" > Home</a></li>
                    <li><a href="/about"> About</a></li>
                    <li><a href="/faq"> FAQ</a></li>
                    <li><a href="/contact" class="active"> Contact us</a></li>
                </ul>
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                    <small>Receive the most recent news and updates directly in your email inbox!</small>
                </div>
                <form action="javascript:;">
                    <div class="form-group footer-newsletter">
                        <div class="input-group">
                            <input type="text" name="email" placeholder="Enter Email" class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text">Subscribe</span>
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
  <script src="vendor/popper/popper.js"></script>
  <script src="vendor/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
  <script src="vendor/fontawesome/all.min.js"></script>
  <script src="vendor/jquery-validate/jquery.validate.js"></script>
  <script src="vendor/swiper/swiper-bundle.min.js"></script>
  <script src="asset/js/plugins_init.js"></script>
  <script src="asset/js/main.js"></script>
  <script src="{{asset('vendor/sweet-alert/sweetalert.min.js')}}"></script>
  <script>
  </script>
</body>

</html>