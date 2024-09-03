<!DOCTYPE html>
<html>
<head>
	<title>ChainCity||Accounts</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
	<!--asset-->
	<link rel="shortcut icon" type="text/css" href="{{asset('asset/chaincitylogo.jpg')}}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--chaincity css-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/chaincityaccount.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/slidercssaccount.css')}}">

    <!--chaincity js--->
    <script src="{{asset('js/jquerylink.js')}}"></script>
    <script src="{{asset('js/chaincity.js')}}"></script>

    <!--swipper slider css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
     <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

     <!--boostrape icon-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
     @livewireStyles
  </head>
<body>

    <!--completed listing-->
    <div class="container-fluid accounts">
        <div class="row justify-content-center flex-wrap">
            <section class="col-md-6 d-none d-md-block p-3" style="height:100vh;">
            </section>

            <!--completed listing--->
            <section class="col-md-6 p-md-5 p-3 form-account" style="height:100vh;overflow:auto">
                @yield('account-intro')
            </section>

        </div>
    </div>
</body>
@livewireScripts
</html>

