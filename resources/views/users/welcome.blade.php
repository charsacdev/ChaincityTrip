<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ChainCity || Welcome</title>
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
  <link rel="stylesheet" type="text/css" href="{{asset('css/slidercssaccount.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  @livewireStyles
</head>
  <div class="page-wrapper">
    <!--registeration accounts-->
    <div class="container-fluid accounts">
      <div class="row" style="position: relative; overflow: hidden;">
        <div class="prs_bg">
          <img src="{{asset('asset/img/payhighlight.png')}}" class="img-fluid" alt="">
        </div>
        <div class="col-12">
          <div class="rlf__logo">
            <img src="{{asset('asset/img/logo.png')}}" width="60px">
          </div>
        </div>
        <div class="col-md-12" style="min-height: 100vh;">
          <div class="row h-100" >
            <div class="col-sm-12 d-flex align-items-center justify-content-center">
              <div class="row" style="position: relative;">
                <div class="col-12">
                  <div class="rlf_verify form-account">
                    <h2 class="fw-bold rlf-header-md text-center">
                     Welcome to <br> ChainCity!
                    </h2>
                    <p class="text-muted">
                       Redirecting to dashboard &nbsp; <i class="fa fa-spin fa-spinner"></i>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
    $(document).ready(function(){
      setTimeout(() => {
        location.href = '/dashboard';
      }, 3000);
    })
  </script>
</body>
</html>