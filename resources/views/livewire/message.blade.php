<div>
    
    @if(request()->segment(count(request()->segments()))=='message')
       <!--<script>-->
       <!--    $(document).ready(function(){-->
       <!--         $(".chat-area-container").hide();-->
       <!--    })-->
       <!--</script>-->
   @endif
   
    <div class="page-wrapper" style="border:0px solid green;margin-top:-100px">
        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-3 chat-container">
                        <div class="chat-header">
                            <div class="msg_sidebar_ctn">
                                <div class="sm-logo-ctn">
                                    <a href="/dashboard">
                                     <img src="../asset/img/logo.png" class="img-fluid mb-2" alt="">
                                    </a>
                                </div>
                            </div>
                            <h3 class="mb-3 message-header">Messages</h3>
                            <div class="msg_srch_ctn">
                                <i class="fa fa-search"></i>
                                <input type="text" class="msg_srch form-control" style="opacity: .6;"
                                    placeholder="Search message">
                                <span class="filter_icon"><img src="../asset/img/filter.png" alt=""></span>
                            </div>
                        </div>

                        <!---message list--->
                        <div class="chats-ctn msg">
                            @foreach ($messageUser as $item)
                                @if($item->usero->id!=auth()->guard('web')->user()->id)
                                  {{-- {{$item->usero->id}} --}}
                                    <a href="/message/{{base64_encode(auth()->guard('web')->user()->id)}}" style="color:inherit">
                                        <div class="chat mb-4 d-flex align-items-center justify-content-start gap-3">
                                            <div class="img">
                                                <img src="{{$item->usero->profile_photo}}" alt="">
                                            </div>
                                            <div class="w-75">
                                                <div class="d-flex align-items-start justify-content-between">
                                                    <h3 class="dsb-header-xs mb-0 pb-0">{{$item->usero->first_name}}&nbsp;{{$item->usero->last_name}}</h3>
                                                    <small class="op-7 text-xs d-none">Dec 15</small>
                                                </div>
                                                <small class="text-xs op-7">{{$item->message}}</small>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach 
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7 col-lg-9 chat-area-container">
                        <div class="chat-area-header notify" style="border-bottom: none!important;;">
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <div class="d-flex align-items-center justify-content-start gap-3">
                                    <span class="bck">
                                        <a href="/message">
                                          <i class="fa fa-arrow-left"></i>  
                                        </a>
                                        </span>

                                    @if(request()->segment(count(request()->segments()))!=='message')
                                       <!--<script>-->
                                       <!--    $(document).ready(function(){-->
                                       <!--         $(".chat-container").hide();-->
                                       <!--    })-->
                                       <!--</script>-->
                                        <div class="chat_header_img">
                                            <img src="{{auth()->guard('web')->user()->profile_photo}}" class="chat-receiver-img" alt="">
                                        </div>
                                            <div class="chat-receiver-details">
                                                <h3 class="dsb-header-xs mb-0 pb-0">
                                                    {{auth()->guard('web')->user()->first_name}}&nbsp;
                                                    {{auth()->guard('web')->user()->last_name}}
                                                </h3>
                                                <small class="op-7 mt-4">
                                                    <span>@</span>{{auth()->guard('web')->user()->first_name}}
                                                </small>
                                            </div>
                                       @endif
                                   </div>

                                <!--notification tab-->
                                <div class="d-flex align-items-center justify-content-between gap-4">
                                    <div class="nav-item  dropdown d-none">
                                        <a class="nav-link" style="margin-left: 0!important;" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="pinf__ctn">
                                                <div class="pinf_anm bell-ctn"> <i class="fa fa-bell"></i></div>

                                            </div>
                                        </a>
                                        <ul class="dropdown-menu ntf_dpw p-3 drop-notify">
                                            <li
                                                class="d-flex align-items-start justify-content-between border-bottom py-3">
                                                <h3 class="dsb-header-sm text-primary mb-0">Notifications</h3>
                                                <a href="/notification" class="text-dark"> <img
                                                        src="../asset/img/brush.png" width="20px" alt=""> See all <i
                                                        class="fa fa-arrow-right"></i></a>
                                            </li>
                                           
                                            <li class="nav_dpd_itm">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="d-flex align-items-start justify-content-start gap-2">
                                                        <div class="img">
                                                            <img src="../asset/img/bookings_nt_img.png" alt="">
                                                        </div>
                                                        <div>
                                                            <a href="notification.html" class="text-dark">
                                                                <h5 class="ntf_heading"><strong>50 new bookings
                                                                        generated</strong></h5>
                                                                <small class="ntf_stdt">You have 50 new bookings
                                                                    today</small>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <p class="ntf_tme">Yesterday</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <!--navigation tab-menu-->
                                    <div class="nav-item  dropdown">
                                        <a class="nav-link" style="margin-left: 0!important;" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="pinf__ctn">
                                                <div class="pinf_anm">{{ucwords(substr(Auth::guard('web')->user()->first_name, 0, 1))}}{{ucwords(substr(Auth::guard('web')->user()->last_name, 0, 1))}}</div>
                                            </div>
                                        </a>
                                        <ul class="dropdown-menu pfl_dpw">
                                            <li class="p-1"><a class="dropdown-item" href="/profile">Profile</a>
                                            </li>
                                            <li class="p-1"><a class="dropdown-item"
                                                    href="/notification">Notification</a></li>
                                            <li class="p-1"><a class="dropdown-item" href="/message">Messages</a>
                                            </li>
                                            <li class="p-1"><a class="dropdown-item"
                                                    href="/reservations">Reservations</a></li>
                                            <li class="p-1"><a class="dropdown-item" href="/savedlisting">Saved
                                                    Listings</a></li>
                                            <li class="p-1"><a class="dropdown-item" href="/paymenthistory">History</a>
                                            </li>
                                            <hr style="margin-top: .5rem!important;margin-bottom: .5rem!important;">
                                            </li>
                                            <li><a class="dropdown-item d-flex align-items-center justify-content-between"
                                                    href="/logout">
                                                    <span>Logout</span>
                                                    <img src="../asset/icon-logout-red.png" alt=""></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                      {{-- 
                        <div class="chat-area-body no-chat">
                           <div class="d-flex align-items-center justify-content-center flex-column">
                                <div class="img">
                                    <img src="../asset/img/message-text-red.png" style="width: 25px;height: auto;" alt="">
                                </div>
                               <p class="text-dark p-0 m-0">No messages yet.</p>
                               <p class="text-dark p-0 m-0">You can start a conversation.</p>     
                           </div>
                        </div> 
                        --}}

                     @if(request()->segment(count(request()->segments()))!=='message')
                        <!--chat screen-->
                        <div class="chat-area-body">
                            @foreach ($chatcode as $item)
                                <div class="{{ $item->user_id == auth()->guard('web')->user()->id ? 'user-sent' : 'user-received' }} single">
                                    <div class="img">
                                        @if($item->user_id == auth()->guard('web')->user()->id)
                                        @else
                                         <img src="{{$item->user->profile_photo}}">
                                        @endif
                                    </div>
                                    <div class="text-content">
                                        <div>
                                            {{$item->message}}
                                        </div>
                                        <small style="width:auto">
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('H:i:a') }}
                                        </small>
                                    </div>
                                </div>
                               
                               
                              @endforeach

                            </div>
                         @endif

                        <!--footer-->
                        <form action="{{route('sendmessage')}}" method="post">
                            @csrf
                                @foreach ($chatcode as $item)
                               
                                  <div class="chat-area-footer">
                                    <input type="hidden" value="{{auth()->guard('web')->user()->id==$item->user_id?$item->receiver_id:$item->user_id}}" name="receiver_id">
                                    <div class="input-area">
                                        <input type="text" class="form-control" name="message" >
                                    </div>
                                    <div class="send-btn-ctn">
                                        <button style="background-color:inherit;border:0px">
                                           <img src="../asset/img/send.png" alt="">
                                        </button>
                                    </div>
                               </div>
                            @endforeach
                        </form>

                    </div>
                </div>
            </div>
        </main>
    </div>

</div>
