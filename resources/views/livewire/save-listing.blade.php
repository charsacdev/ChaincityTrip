<div>
    
     <div class="container payments mb-5 px-3">
         <div class="row">
          <div class="col-sm-12">
               <h2 class="dsb-header">Your Saved Listing</h2>
               <p class="text-muted">Here are listing saved not yet checked out.</p>
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
                                 <a class="nav-link active" data-bs-toggle="tab" href="#all"></i> All</a>
                         </li>
                         <li class="nav-item">
                                 <a class="nav-link" data-bs-toggle="tab" href="#ongoing"> Ongoing</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" data-bs-toggle="tab" href="#cancelled"> Cancelled</a>
                     </li>
                     </ul>
                 </div>
 
         <div class="tab-content mb-5">
             <div class="tab-pane fade show active" id="all" role="tabpanel">
                 <div class="table-responsive">
                         <table id="example4" class="display" style="min-width: 845px; border: 0;">
                             <thead style="border: 0;">
                             <tr class="th_tpc" style="border: 0;">
                                 <th>Property Details</th>
                                 <th>From</th>
                                 <th>To</th>
                                 <th>Price</th>
                                 <th>Status</th>
                                 <th>Bedrooms</th>
                                 <th>Beds</th>
                                 <th>Baths</th>
                                 <th>View</th>
                                 <th>Action</th>
                             </tr>
                             </thead>
                             <tbody>
                     <!--all listing-->
                     @foreach ($savedListingAll as $item)
                         <tr>
                             <td style="white-space: nowrap">
                                 <div class="d-flex align-items-center justify-content-start gap-2">
                                     <div class="custom-control custom-checkbox ms-2 d-inline d-none">
                                         <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                         <label class="custom-control-label" for="customCheckBox2"></label>
                                     </div>
                                     <div class="apt_nit">
                                         <span>
                                             <img src="{{asset('asset/home.png')}}" class="img-fluid">
                                         </span>
                                     </div>
                                     <div class="apt_ful">
                                        <small>
                                        @if($item->property)
                                            {{$item->property->property_title}}
                                        @endif
                                        </small>
                                         <small class="text-muted">
                                             @if($item->user)
                                                By {{ucwords($item->user->first_name)}}&nbsp;{{ucwords($item->user->last_name)}}
                                             @endif
                                         </small>
                                         
                                     </div>
                                 </div>
                             </td>
                             <td>{{$item->saved_description['checkin']}}</td>
                             <td>{{$item->saved_description['checkout']}}</td>
                             <td>${{number_format($item->saved_description['payable'])}}</td>
                             <td>
                                @if($item->status=="pending")
                                     <span class="text-danger fw-bold">Ongoing</span>
                                 @elseif($item->status=="cancelled")
                                     <span class="text-dark fw-bold">Cancelled</span>
                                 @endif
                             </td>
                             <td>
                                 @if($item->property)
                                     {{$item->property->property_basics['bedroom']['bedroom_number']}}&nbsp;Bedrooms
                                 @else
                                     <p class="text-danger fw-bold">Deleted</p>
                                 @endif
                             </td>
                             <td>
                                 @if($item->property)
                                     {{$item->property->property_basics['beds']['beds_number']}}&nbsp;Beds
                                 @else
                                     <p class="text-danger fw-bold">Deleted</p>
                                 @endif
                             </td>
                             <td>
                                 @if($item->property)
                                     {{$item->property->property_basics['bath']['bath_number']}}&nbsp;Bathroom
                                 @else
                                 <p class="text-danger fw-bold">Deleted</p>
                                 @endif
                             </td>
                             <td align="center">
                                 <div class="lightgallery">
                                     @if($item->property)
                                         @foreach($item->property->property_photos as $photos)
                                             <a href="{{$photos}}" data-sub-html="What the apartment look like"
                                                 data-exthumbimage="{{$photos}}"
                                                 data-src="{{$photos}}">   
                                             </a>
                                         @endforeach
                                     <div class="lg__btn cursor-pointer">
                                         <i class="fa fa-eye" style="cursor:pointer"></i>
                                     </div>
                                     @else
                                         <p class="text-danger fw-bold">Deleted</p>
                                     @endif
                                 </div>
                             </td>
                             <td align="center">
                                <button class="dropdown-item" type="button" wire:click="DeleteListing({{$item->id}})">
                                   <i class="fa fa-trash text-danger fw-bold"></i>
                              </button>
                             </td>
                         </tr>
                     @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
 
             <!--Ongoing Booking-->
                 <div class="tab-pane fade show" id="ongoing" role="tabpanel">
                    <div class="table-responsive">
                         <table id="example4" class="display" style="min-width: 845px; border: 0;">
                             <thead style="border: 0;">
                             <tr class="th_tpc" style="border: 0;">
                                 <th>Property Details</th>
                                 <th>From</th>
                                 <th>To</th>
                                 <th>Price</th>
                                 <th>Status</th>
                                 <th>Bedrooms</th>
                                 <th>Beds</th>
                                 <th>Baths</th>
                                 <th>View</th>
                                 <th>Action</th>
                             </tr>
                             </thead>
                             <tbody>
                     <!--all listing-->
                     @foreach ($savedListingOngoing as $item)
                         <tr>
                             <td style="white-space: nowrap">
                                 <div class="d-flex align-items-center justify-content-start gap-2">
                                     <div class="custom-control custom-checkbox ms-2 d-inline d-none">
                                         <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                         <label class="custom-control-label" for="customCheckBox2"></label>
                                     </div>
                                     <div class="apt_nit">
                                         <span>
                                             <img src="{{asset('asset/home.png')}}" class="img-fluid">
                                         </span>
                                     </div>
                                     <div class="apt_ful">
                                        <small>
                                            @if($item->property)
                                             {{$item->property->property_title}}
                                           @endif
                                        </small>
                                         <small class="text-muted">
                                             @if($item->user)
                                                By {{ucwords($item->user->first_name)}}&nbsp;{{ucwords($item->user->last_name)}}
                                             @endif
                                         </small>
                                         
                                     </div>
                                 </div>
                             </td>
                             <td>{{$item->saved_description['checkin']}}</td>
                             <td>{{$item->saved_description['checkout']}}</td>
                             <td>${{number_format($item->saved_description['payable'])}}</td>
                             <td>
                                @if($item->status=="pending")
                                     <span class="text-danger fw-bold">Ongoing</span>
                                 @elseif($item->status=="cancelled")
                                     <span class="text-dark fw-bold">Cancelled</span>
                                 @endif
                             </td>
                             <td>
                                 @if($item->property)
                                     {{$item->property->property_basics['bedroom']['bedroom_number']}}&nbsp;Bedrooms
                                 @else
                                     <p class="text-danger fw-bold">Deleted</p>
                                 @endif
                             </td>
                             <td>
                                 @if($item->property)
                                     {{$item->property->property_basics['beds']['beds_number']}}&nbsp;Beds
                                 @else
                                     <p class="text-danger fw-bold">Deleted</p>
                                 @endif
                             </td>
                             <td>
                                 @if($item->property)
                                     {{$item->property->property_basics['bath']['bath_number']}}&nbsp;Bathroom
                                 @else
                                 <p class="text-danger fw-bold">Deleted</p>
                                 @endif
                             </td>
                             <td align="center">
                                 <div class="lightgallery">
                                     @if($item->property)
                                         @foreach($item->property->property_photos as $photos)
                                             <a href="{{$photos}}" data-sub-html="What the apartment look like"
                                                 data-exthumbimage="{{$photos}}"
                                                 data-src="{{$photos}}">   
                                             </a>
                                         @endforeach
                                     <div class="lg__btn cursor-pointer">
                                         <i class="fa fa-eye" style="cursor:pointer"></i>
                                     </div>
                                     @else
                                         <p class="text-danger fw-bold">Deleted</p>
                                     @endif
                                 </div>
                             </td>
                             <td align="center">
                                <button class="dropdown-item" type="button" wire:click="DeleteListing({{$item->id}})">
                                   <i class="fa fa-trash text-danger fw-bold"></i>
                              </button>
                             </td>
                         </tr>
                     @endforeach
                     </tbody>
                 </table>
                </div>
            </div>
 
               
                 <!--cancelled Booking-->
                 <div class="tab-pane fade show" id="cancelled" role="tabpanel">
                    <div class="table-responsive">
                         <table id="example4" class="display" style="min-width: 845px; border: 0;">
                             <thead style="border: 0;">
                             <tr class="th_tpc" style="border: 0;white-space:nowrap">
                                 <th>Property Details</th>
                                 <th>From</th>
                                 <th>To</th>
                                 <th>Price</th>
                                 <th>Status</th>
                                 <th>Bedrooms</th>
                                 <th>Beds</th>
                                 <th>Baths</th>
                                 <th>View</th>
                                 <th>Action</th>
                             </tr>
                             </thead>
                             <tbody>
                     <!--all listing-->
                     @foreach ($savedListingcancelled as $item)
                         <tr>
                             <td style="white-space: nowrap">
                                 <div class="d-flex align-items-center justify-content-start gap-2">
                                     <div class="custom-control custom-checkbox ms-2 d-inline d-none">
                                         <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                         <label class="custom-control-label" for="customCheckBox2"></label>
                                     </div>
                                     <div class="apt_nit">
                                         <span>
                                             <img src="{{asset('asset/home.png')}}" class="img-fluid">
                                         </span>
                                     </div>
                                     <div class="apt_ful">
                                        <small>
                                            @if($item->property)
                                             {{$item->property->property_title}}
                                          @endif
                                        </small>
                                         <small class="text-muted">
                                             @if($item->user)
                                                By {{ucwords($item->user->first_name)}}&nbsp;{{ucwords($item->user->last_name)}}
                                             @endif
                                         </small>
                                         
                                     </div>
                                 </div>
                             </td>
                             <td>{{$item->saved_description['checkin']}}</td>
                             <td>{{$item->saved_description['checkout']}}</td>
                             <td>${{number_format($item->saved_description['payable'])}}</td>
                             <td>
                                @if($item->status=="pending")
                                     <span class="text-danger fw-bold">Ongoing</span>
                                 @elseif($item->status=="cancelled")
                                     <span class="text-dark fw-bold">Cancelled</span>
                                 @endif
                             </td>
                             <td>
                                 @if($item->property)
                                     {{$item->property->property_basics['bedroom']['bedroom_number']}}&nbsp;Bedrooms
                                 @else
                                     <p class="text-danger fw-bold">Deleted</p>
                                 @endif
                             </td>
                             <td>
                                 @if($item->property)
                                     {{$item->property->property_basics['beds']['beds_number']}}&nbsp;Beds
                                 @else
                                     <p class="text-danger fw-bold">Deleted</p>
                                 @endif
                             </td>
                             <td>
                                 @if($item->property)
                                     {{$item->property->property_basics['bath']['bath_number']}}&nbsp;Bathroom
                                 @else
                                 <p class="text-danger fw-bold">Deleted</p>
                                 @endif
                             </td>
                             <td align="center">
                                 <div class="lightgallery">
                                     @if($item->property)
                                         @foreach($item->property->property_photos as $photos)
                                             <a href="{{$photos}}" data-sub-html="What the apartment look like"
                                                 data-exthumbimage="{{$photos}}"
                                                 data-src="{{$photos}}">   
                                             </a>
                                         @endforeach
                                     <div class="lg__btn cursor-pointer">
                                         <i class="fa fa-eye" style="cursor:pointer"></i>
                                     </div>
                                     @else
                                         <p class="text-danger fw-bold">Deleted</p>
                                     @endif
                                 </div>
                             </td>
                             <td align="center">
                                <button class="dropdown-item" type="button" wire:click="DeleteListing({{$item->id}})">
                                   <i class="fa fa-trash text-danger fw-bold"></i>
                              </button>
                             </td>
                         </tr>
                     @endforeach
                     </tbody>
                 </table>
                </div>
             </div>
 
          </div>
           </div>
         </div>
    </div>
   </div>
 
 </div>
 