<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ChainCity || Account Login</title>
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

<body>
  <div class="page-wrapper">
    <!--registeration accounts-->
    <div class="container-fluid accounts">
      <div class="row">
        <div class="col-md-6 d-none col-lg-6 d-lg-block px-0 mx-0">
          <div class="rlf-banner">
            <div class="rlf-overlay"></div>
            <div class="rlf-container">
              <div class="rlf__logo">
                <a href="/">
                  <img src="{{asset('asset/img/logo.png')}}" width="60px">
                </a>
              </div>
              <div class="rlf__swiper">
                <div class="rlf_comment">
                  <i class="fa fa-comment-alt"></i>
                </div>
                <div class="swiper authSwiper">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <p class="text-light">
                        "I was thrilled with my experience working with ChainCity. The agent was knowledgeable,
                        friendly, and
                        made the process a breeze. I'd highly recommend ChainCity to anyone looking to buy or sell a
                        home."
                      </p>
                      <h5 class="text-light">Danny Amara</h5>
                      <h6 class="text-light">CEO AMD</h6>
                    </div>
                    <div class="swiper-slide p-3">
                      <br>
                      <i class="bi bi-chat-square-text-fill"></i>
                      <br>
                      <p class="text-light">
                        "I was thrilled with my experience working with ChainCity. The agent was knowledgeable,
                        friendly, and
                        made the process a breeze. I'd highly recommend ChainCity to anyone looking to buy or sell a
                        home."
                      </p>
                      <h5 class="text-light">Samuel Dike</h5>
                      <h6 class="text-light">CEO Tutapis</h6>
                    </div>
                    <div class="swiper-slide p-3">
                      <br>
                      <i class="bi bi-chat-square-text-fill"></i>
                      <br>
                      <p class="text-light">
                        "I was thrilled with my experience working with ChainCity. The agent was knowledgeable,
                        friendly, and
                        made the process a breeze. I'd highly recommend ChainCity to anyone looking to buy or sell a
                        home."
                      </p>
                      <h5 class="text-light">Michael Charsac</h5>
                      <h6 class="text-light">CEO Charsac</h6>
                    </div>
                  </div>
                  <div class="swiper-pagination"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

            <!--account header--->
            <div class="col-md-12 col-lg-6">
                @yield('account-intro')
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
          // $('.rlf-btn').on('click', function(){
          //   location.href = 'welcome.html';
          // });
        })
      </script>
    </body>
    @livewireScripts
  </html>
