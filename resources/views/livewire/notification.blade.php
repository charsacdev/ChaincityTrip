<div>
    
    <div class="page-wrapper" style="border:0px solid green;margin-top:-100px">
        <main>
            <div class="container-fluid">
                <div class="row">
                    {{-- <div class="col-sm-12 col-md-5 col-lg-3 chat-container d-none">
                        <div class="chat-header">
                            <div class="msg_sidebar_ctn">
                                <div class="sm-logo-ctn">
                                    <a href="/">
                                     <img src="../asset/img/logo.png" class="img-fluid mb-2" alt="">
                                    </a>
                                </div>
                            </div>
                            <h3 class="notification-header">Notificatons</h3>
                        </div>
                        <div class="chats-ctn">
                            <div class="notfn active">
                                <img src="../asset/img/element-plus-active.png" class="icon-active d-none" alt="">
                                <img src="../asset/img/element-plus.png" class="icon-inactive" alt="">
                                <span>All</span>

                            </div>
                            <div class="notfn">
                                <img src="../asset/img/msg-active.png" class="icon-active d-none" alt="">
                                <img src="../asset/img/msg.png" class="icon-inactive" alt="">
                                <span>System Notifications</span>

                            </div>
                            <div class="notfn">
                                <img src="../asset/img/announcement-active.png" class="icon-active d-none" alt="">
                                <img src="../asset/img/announcement.png" class="icon-inactive" alt="">
                                <span>Latest Events</span>

                            </div>
                            <div class="notfn">
                                <img src="../asset/img/volume-high-active.png" class="icon-active d-none" alt="">
                                <img src="../asset/img/volume-high.png" class="icon-inactive" alt="">
                                <span>Announcements</span>

                            </div>
                            <div class="notfn">
                                <img src="../asset/img/icon-moneys-black-white.png" class="icon-active d-none" alt="">
                                <img src="../asset/img/moneysn.png" class="icon-inactive" alt="">
                                <span>Payments & Rewards</span>

                            </div>
                        </div>
                    </div> --}}

                    <!--notification page-->
                    <div class="col-sm-12 col-md-12 col-lg-12 chat-area-container">
                        <div class="chat-area-header notify">
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <div class="d-flex align-items-center justify-content-start gap-3">
                                    <span class="bck d-none">
                                        <a href="/dashboard">
                                            <i class="fa fa-arrow-left"></i>
                                        </a>
                                      </span>
                                    <div class="chat_header_img">
                                        <img src="{{auth()->user()->profile_photo}}" alt="">
                                    </div>
                                    <div>
                                        <h3 class="dsb-header-xs mb-0 pb-0">
                                            {{auth()->user()->first_name}}&nbsp;
                                            {{auth()->user()->last_name}}
                                        </h3>
                                        <small class="op-7">
                                            <span>@</span>
                                            {{auth()->user()->first_name}}</small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between gap-4">
                                    <div class="nav-item  dropdown d-none">
                                        <a class="nav-link" style="margin-left: 0!important;" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="pinf__ctn">
                                                <div class="pinf_anm bell-ctn"> <i class="fa fa-bell"></i></div>

                                            </div>
                                        </a>

                                        <!--drop downlist notification--->
                                        <ul class="dropdown-menu ntf_dpw p-3 drop-notify">
                                            <li class="d-flex align-items-start justify-content-between border-bottom py-3">
                                             <h3 class="dsb-header-sm text-primary mb-0">Notifications</h3>
                                             <a href="/notification" class="text-dark"> <img src="../asset/img/brush.png" width="20px" alt=""> See all <i class="fa fa-arrow-right"></i></a>
                                            </li>
                                            @foreach($selectNotification as $item)
                                             <li class="nav_dpd_itm">
                                                  <div class="d-flex align-items-center justify-content-between">
                                                       <div class="d-flex align-items-start justify-content-start gap-2">
                                                            <div class="img">
                                                                 <img src="../asset/img/bookings_nt_img.png" alt="">
                                                            </div>
                                                            <div >
                                                                 <a href="/notification" class="text-dark">
                                                                      <h5 class="ntf_heading"><strong>{{$item->notification_type}}</strong></h5>
                                                                      <small class="ntf_stdt">{{$item->message}}</small>
                                                                 </a>
                                                            </div>
                                                       </div>
                                                       <p class="ntf_tme">{{$item->created_at->format('F j, Y, g:i a') }}</p>
                                                  </div>
                                             </li>
                                             @endforeach
                                         </ul>
                                    </div>

                                    <!--Menu Dropdown-->
                                    <div class="nav-item  dropdown">
                                        <a class="nav-link" style="margin-left: 0!important;" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="pinf__ctn">
                                                <div class="pinf_anm">
                                                    {{ucwords(substr(Auth::guard('web')->user()->first_name, 0, 1))}}{{ucwords(substr(Auth::guard('web')->user()->last_name, 0, 1))}}
                                                </div>
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
                                                    href="reservation.html">Reservations</a></li>
                                            <li class="p-1"><a class="dropdown-item" href="/savedlisting">Saved
                                                    Listings</a></li>
                                            <li class="p-1"><a class="dropdown-item" href="/paymenthistory">History</a>
                                            </li>
                                            <hr style="margin-top: .5rem!important;margin-bottom: .5rem!important;">
                                            <li class="p-1"><a class="dropdown-item" href="javascript:;">Help Center</a>
                                            </li>
                                            <li><a class="dropdown-item d-flex align-items-center justify-content-between"
                                                    href="/logout">
                                                    <span>Logout</span>
                                                    <img src="../asset/img/icon-logout-red.png" alt=""></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end w-100 pb-2 mt-4">
                                <span class="mark-all-read c-pointer">
                                    <img src="../asset/img/brush.png" width="20px" alt=""> &nbsp;
                                    Mark all as read
                                </span>
                            </div>

                        </div>
                        <div class="chat-area-body" style="padding-top: 120px;">
                            <ul class="not_pg p-0 m-0">
                                @foreach($selectNotification as $item)
                                <li class="nav_dpd_itm">
                                     <div class="d-flex align-items-center justify-content-between">
                                          <div class="d-flex align-items-start justify-content-start gap-4">
                                               <div class="img">
                                                    <img src="../asset/img/bookings_nt_img.png" alt="" style="width:30px;height:30px;object-fit:contain">
                                               </div>
                                               <div >
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
                    </div>
                </div>
            </div>
        </main>
    </div>

</div>
