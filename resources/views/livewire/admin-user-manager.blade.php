<div>
    <div class="container payments mb-5 px-3">
        <div class="row">
             <div class="col-sm-12">
                  <!-- <p class="text-muted">Here are persons that have booked your listed property.</p> -->
             </div>

             <!--session message-->
             <div>
                  @if(session('success'))
                        <div class="alert alert-success mt-3" role="alert">
                        {{session('success')}}
                        </div>
                  @elseif(session('error'))
                        <div class="alert alert-danger mt-3" role="alert">
                        {{session('error')}}
                        </div>
                    @endif
             </div>
             
             <!-- Nav tabs -->
             <div class="custom-tab mt-5" wire:ignore> 
                <div class="tab-container">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#chaincityuser"></i>ChainCity Verified Accounts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#chaincityagent">ChainCity Unverified Accounts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tripuser">ChainCity Trip Verified Accounts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tripreseller">Chaincity Trip Unverified Accounts</a>
                        </li>
                    </ul>
                </div>
                   
                <!--chaincity user verified-->
                  <div class="tab-content mb-5">
                       <div class="tab-pane fade show active" id="chaincityuser" role="tabpanel">
                            <div class="table-responsive">
                                 <table id="example4" class="display" style="min-width: 845px; border: 0;">
                                      <thead style="border: 0;">
                                      <tr class="th_tpc" style="border: 0;white-space:nowrap">
                                           <th>Chaincity Accounts</th>
                                           <th>Account Status</th>
                                           <th>Account Type</th>
                                           <th>Account Verification</th>
                                           <th>Listing</th>
                                           <th>Bookings</th>
                                           <th>Saved Listing</th>
                                           <th>Earnings</th>
                                           <th>KYC</th>
                                           <th>Action</th>
                                      </tr>
                                      </thead>
                        <tbody>
                        <!--Chaincity Verified user-->
                        @foreach ($CityVerifiedUser as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center justify-content-start gap-2">
                                        <div class="custom-control custom-checkbox ms-2 d-inline">
                                            <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                            <label class="custom-control-label" for="customCheckBox2"></label>
                                        </div>
                                        <div class="apt_nit">
                                            <span>
                                                <img src="{{$item->profile_photo}}" class="img-fluid">
                                            </span>
                                        </div>
                                        <div class="apt_ful">
                                            <span>{{ucwords($item->first_name)}}&nbsp;{{ucwords($item->last_name)}}</span>
                                            <small class="text-muted">{{$item->email}}</small>
                                        </div>
                                    </div>
                                </td>
                                <td align="center">
                                    @if($item->account_status=="active")
                                       <p class="text-success fw-bold">{{$item->account_status}}</p>
                                    @else
                                       <p class="text-danger fw-bold">{{$item->account_status}}</p>
                                    @endif
                                </td>
                                <td align="center">{{$item->account_type}}</td>
                                <td align="center">
                                    @if($item->account_type=='agent')
                                        <span class="text-success fw-bold">{{$item->account_kyc['verify_status']}}</span>
                                    @else
                                        <span class="text-success fw-bold">Completed</span>
                                    @endif
                                </td>
                                <td align="center">{{count($item->property)}}</td>
                                <td align="center">{{count($item->bookings)}}</td>
                                <td align="center">{{count($item->listingsaved)}}</td>
                                <td align="center">${{number_format($item->account_balance)}}</td>
                                <td align="center">
                                    <div class="lightgallery">
                                        @if($item->account_type=='agent')
                                            <a href="{{$item->account_kyc['photo1']}}" data-sub-html="KYC DOCUMENT"
                                                data-exthumbimage="{{$item->account_kyc['photo1']}}"
                                                data-src="{{$item->account_kyc['photo1']}}">   
                                            </a>
                                            <a href="{{$item->account_kyc['photo2']}}" data-sub-html="KYC DOCUMENT"
                                                data-exthumbimage="{{$item->account_kyc['photo2']}}"
                                                data-src="{{$item->account_kyc['photo2']}}">   
                                            </a>
                                            <div class="lg__btn cursor-pointer">
                                                <i class="fa fa-eye" style="cursor:pointer"></i>
                                            </div>
                                        @else
                                           <span class="text-dark fw-bold">None</span>
                                        @endif    
                                    </div>
                                </td>
                                <td align="center">
                                    <i class="bi bi-three-dots-vertical dropdown-toggle" style="cursor:pointer" data-bs-toggle="dropdown"></i>
                                    <ul class="dropdown-menu dropdown-menu-end drop-action">
                                        <li><button class="dropdown-item" type="button" wire:click="Approveusers({{$item->id}})">Verify</button></li>
                                        <li><button class="dropdown-item" type="button" wire:click="Declineusers({{$item->id}})">Reject</button></li>
                                        <li><button class="dropdown-item" type="button" wire:click="Blockuser({{$item->id}})">Block</button></li>
                                        </ul>  
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>

                <!--Chaincity users unverified--->
                <div class="tab-pane fade show" id="chaincityagent" role="tabpanel">
                    <div class="table-responsive">
                        <table id="example4" class="display" style="min-width: 845px; border: 0;">
                             <thead style="border: 0;">
                             <tr class="th_tpc" style="border: 0;white-space:nowrap">
                                  <th>Chaincity Accounts</th>
                                  <th>Account Status</th>
                                  <th>Account Type</th>
                                  <th>Account Verification</th>
                                  <th>Listing</th>
                                  <th>Bookings</th>
                                  <th>Saved Listing</th>
                                  <th>Earnings</th>
                                  <th>KYC</th>
                                  <th>Action</th>
                             </tr>
                             </thead>
               <tbody>
                
               <!--Chaincity UnVerified user-->
               @foreach ($CityUnVerifiedUser as $item)
                   <tr>
                       <td>
                           <div class="d-flex align-items-center justify-content-start gap-2">
                               <div class="custom-control custom-checkbox ms-2 d-inline">
                                   <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                   <label class="custom-control-label" for="customCheckBox2"></label>
                               </div>
                               <div class="apt_nit">
                                   <span>
                                       <img src="{{$item->profile_photo}}" class="img-fluid">
                                   </span>
                               </div>
                               <div class="apt_ful">
                                   <span>{{ucwords($item->first_name)}}&nbsp;{{ucwords($item->last_name)}}</span>
                                   <small class="text-muted">{{$item->email}}</small>
                               </div>
                           </div>
                       </td>
                       <td align="center">
                           @if($item->account_status=="active")
                              <p class="text-success fw-bold">{{$item->account_status}}</p>
                           @else
                              <p class="text-danger fw-bold">{{$item->account_status}}</p>
                           @endif
                       </td>
                       <td align="center">{{$item->account_type}}</td>
                       <td align="center">
                           @if($item->account_type=='agent' and $item->account_kyc['verify_status']=='completed')
                               <span class="text-success fw-bold">{{$item->account_kyc['verify_status']}}</span>
                           @else
                               <span class="text-danger fw-bold">{{$item->account_kyc['verify_status']}}</span>
                           @endif
                       </td>
                       <td align="center">{{count($item->property)}}</td>
                       <td align="center">{{count($item->bookings)}}</td>
                       <td align="center">{{count($item->listingsaved)}}</td>
                       <td align="center">${{number_format($item->account_balance)}}</td>
                       <td align="center">
                           <div class="lightgallery">
                               @if($item->account_type=='agent')
                                   <a href="{{$item->account_kyc['photo1']}}" data-sub-html="KYC DOCUMENT"
                                       data-exthumbimage="{{$item->account_kyc['photo1']}}"
                                       data-src="{{$item->account_kyc['photo1']}}">   
                                   </a>
                                   <a href="{{$item->account_kyc['photo2']}}" data-sub-html="KYC DOCUMENT"
                                       data-exthumbimage="{{$item->account_kyc['photo2']}}"
                                       data-src="{{$item->account_kyc['photo2']}}">   
                                   </a>
                                   <div class="lg__btn cursor-pointer">
                                       <i class="fa fa-eye" style="cursor:pointer"></i>
                                   </div>
                               @else
                                  <span class="text-dark fw-bold">None</span>
                               @endif    
                           </div>
                       </td>
                       <td align="center">
                           <i class="bi bi-three-dots-vertical dropdown-toggle" style="cursor:pointer" data-bs-toggle="dropdown"></i>
                           <ul class="dropdown-menu dropdown-menu-end drop-action">
                               <li><button class="dropdown-item" type="button" wire:click="Approveusers({{$item->id}})">Verify</button></li>
                               <li><button class="dropdown-item" type="button" wire:click="Declineusers({{$item->id}})">Reject</button></li>
                               <li><button class="dropdown-item" type="button" wire:click="Blockuser({{$item->id}})">Block</button></li>
                               </ul>  
                       </td>
                   </tr>
               @endforeach
               </tbody>
           </table>
           </div>
        </div>

               <!--Chaincity Trip User-->
                {{--<div class="tab-pane fade show" id="tripuser" role="tabpanel">
                    <div class="table-responsive">
                        <table id="example4" class="display" style="min-width: 845px; border: 0;">
                            <thead style="border: 0;">
                                <tr class="th_tpc" style="border: 0;">
                                    <th>Chaincity Trip User</th>
                                    <th>Status</th>
                                    <th>Bedrooms</th>
                                    <th>Beds</th>
                                    <th>Baths</th>
                                    <th>View</th>
                                    <th>Action</th>
                               </tr>
                            </thead>
                                <tbody>
                                 <!--Unapproved listing-->
                                    @foreach ($unlisted as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-start gap-2">
                                                <div class="custom-control custom-checkbox ms-2 d-inline">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                                    <label class="custom-control-label" for="customCheckBox2"></label>
                                                </div>
                                                <div class="apt_nit">
                                                    <span>
                                                        <img src="{{asset('asset/home.png')}}" class="img-fluid">
                                                    </span>
                                                </div>
                                                <div class="apt_ful">
                                                    <span>{{$item->property_title}}</span>
                                                    <small class="text-muted">By {{ucwords($item->user->first_name)}}&nbsp;{{ucwords($item->user->last_name)}}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if($item->property_process['status']=="approved")
                                            <span class="text-success fw-bold">Listed</span>
                                            @elseif($item->property_process['status']=="completed")
                                            <span class="text-danger fw-bold">Unlisted</span>
                                            @elseif($item->property_process['status']=="pending")
                                            <span class="text-warning fw-bold">Inprogress</span>
                                            @endif
                                        </td>
                                        <td>{{$item->property_basics['bedroom']['bedroom_number']}}&nbsp;Bedrooms</td>
                                        <td>{{$item->property_basics['beds']['beds_number']}}&nbsp;Beds</td>
                                        <td>{{$item->property_basics['bath']['bath_number']}}&nbsp;Bathroom</td>
                                        <td align="center">
                                            <div class="lightgallery">
                                                @foreach($item->property_photos as $photos)
                                                <a href="{{$photos}}" data-sub-html="What the apartment look like"
                                                    data-exthumbimage="{{$photos}}"
                                                    data-src="{{$photos}}">   
                                                </a>
                                            @endforeach
                                            <div class="lg__btn cursor-pointer">
                                                <i class="fa fa-eye" style="cursor:pointer"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td align="center">
                                            <i class="bi bi-three-dots-vertical dropdown-toggle" style="cursor:pointer" data-bs-toggle="dropdown"></i>
                                            <ul class="dropdown-menu dropdown-menu-end drop-action">
                                                <li><button class="dropdown-item" type="button" wire:click="Approveusers({{$item->id}})">Approve</button></li>
                                                <li><button class="dropdown-item" type="button" wire:click="Declineusers({{$item->id}})">Decline</button></li>
                                                <li><button class="dropdown-item" type="button" wire:click="Blockuser({{$item->id}})">Delete</button></li>
                                              </ul>  
                                        </td>
                                    </tr>
                                @endforeach
                           </tbody>
                       </table>
                    </div>
                </div>

                <!--Chaincity trip Reseller-->
                <div class="tab-pane fade show" id="tripreseller" role="tabpanel">
                    <div class="table-responsive">
                        <table id="example4" class="display" style="min-width: 845px; border: 0;">
                            <thead style="border: 0;">
                                <tr class="th_tpc" style="border: 0;">
                                    <th>Chaincity Trip Reseller</th>
                                    <th>Status</th>
                                    <th>Bedrooms</th>
                                    <th>Beds</th>
                                    <th>Baths</th>
                                    <th>View</th>
                                    <th>Action</th>
                               </tr>
                            </thead>
                                <tbody>
                                      <!--Inprogress listing-->
                                        @foreach ($inprogress as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-start gap-2">
                                                    <div class="custom-control custom-checkbox ms-2 d-inline">
                                                        <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                                        <label class="custom-control-label" for="customCheckBox2"></label>
                                                    </div>
                                                    <div class="apt_nit">
                                                        <span>
                                                            <img src="{{asset('asset/home.png')}}" class="img-fluid">
                                                        </span>
                                                    </div>
                                                    <div class="apt_ful">
                                                        <span>{{$item->property_title}}</span>
                                                        <small class="text-muted">By {{ucwords($item->user->first_name)}}&nbsp;{{ucwords($item->user->last_name)}}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                @if($item->property_process['status']=="approved")
                                                <span class="text-success fw-bold">Listed</span>
                                                @elseif($item->property_process['status']=="completed")
                                                <span class="text-danger fw-bold">Unlisted</span>
                                                @elseif($item->property_process['status']=="pending")
                                                <span class="text-warning fw-bold">Inprogress</span>
                                                @endif
                                            </td>
                                            <td>{{$item->property_basics['bedroom']['bedroom_number']}}&nbsp;Bedrooms</td>
                                            <td>{{$item->property_basics['beds']['beds_number']}}&nbsp;Beds</td>
                                            <td>{{$item->property_basics['bath']['bath_number']}}&nbsp;Bathroom</td>
                                            <td align="center">
                                                <div class="lightgallery">
                                                    @foreach($item->property_photos as $photos)
                                                    <a href="{{$photos}}" data-sub-html="What the apartment look like"
                                                        data-exthumbimage="{{$photos}}"
                                                        data-src="{{$photos}}">   
                                                    </a>
                                                @endforeach
                                                <div class="lg__btn cursor-pointer">
                                                    <i class="fa fa-eye" style="cursor:pointer"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td align="center">
                                                <i class="bi bi-three-dots-vertical dropdown-toggle" style="cursor:pointer" data-bs-toggle="dropdown"></i>
                                                <ul class="dropdown-menu dropdown-menu-end drop-action">
                                                    <li><button class="dropdown-item" type="button" wire:click="Approveusers({{$item->id}})">Approve</button></li>
                                                    <li><button class="dropdown-item" type="button" wire:click="Declineusers({{$item->id}})">Decline</button></li>
                                                    <li><button class="dropdown-item" type="button" wire:click="Blockuser({{$item->id}})">Delete</button></li>
                                                  </ul>   
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                               </table>
                            </div>
                       </div> --}}

                  </div>
             </div>
        </div>
   </div>
</div>

</div>
