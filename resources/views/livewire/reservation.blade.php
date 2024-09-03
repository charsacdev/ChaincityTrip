<div>
    
    <div class="container payments mb-5 px-3">
        <div class="row">
         <div class="col-sm-12">
              <h2 class="dsb-header">Your Reservations</h2>
              <p class="text-muted">Here are persons that have booked your listed property.</p>
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
                                <a class="nav-link" data-bs-toggle="tab" href="#upcoming"> Upcoming</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#completed"> Completed</a>
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
                                <th>Reservation</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Bedrooms</th>
                                <th>Beds</th>
                                <th>Baths</th>
                                <th>View</th>
                            </tr>
                            </thead>
                            <tbody>
                    <!--all listing-->
                    @foreach ($reservationAll as $item)
                     
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
                                        <small class="text-muted">Booked By
                                            @if($item->user)
                                                {{ucwords($item->user->first_name)}}&nbsp;{{ucwords($item->user->last_name)}}
                                            @endif
                                        </small>
                                        <small>
                                            {{$item->user->email}}
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td>{{$item->start_date}}</td>
                            <td>{{$item->end_date}}</td>
                            <td>${{number_format($item->paid_amount)}}</td>
                            <td>
                                @if($item->status=="completed")
                                    <span class="text-success fw-bold">Completed</span>
                                @elseif($item->status=="ongoing")
                                    <span class="text-danger fw-bold">Ongoing</span>
                                @elseif($item->status=="upcoming")
                                    <span class="text-warning fw-bold">Upcoming</span>
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
                                <th>Reservation</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Bedrooms</th>
                                <th>Beds</th>
                                <th>Baths</th>
                                <th>View</th>
                            </tr>
                        </thead>
                    <tbody>
                    <!--all listing-->
                    @foreach ($ongoing as $item)
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
                                        <small class="text-muted">Booked By
                                            @if($item->user)
                                                {{ucwords($item->user->first_name)}}&nbsp;{{ucwords($item->user->last_name)}}
                                            @endif
                                        </small>
                                        <small>
                                            {{$item->user->email}}
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td>{{$item->start_date}}</td>
                            <td>{{$item->end_date}}</td>
                            <td>${{number_format($item->paid_amount)}}</td>
                            <td>
                                @if($item->status=="completed")
                                    <span class="text-success fw-bold">Completed</span>
                                @elseif($item->status=="ongoing")
                                    <span class="text-danger fw-bold">Ongoing</span>
                                @elseif($item->status=="upcoming")
                                    <span class="text-warning fw-bold">Upcoming</span>
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
                          
                           </tr>
                       @endforeach
                      </tbody>
                    </table>
                    </div>
                </div>

                <!--Upcoming Booking-->
                <div class="tab-pane fade show" id="upcoming" role="tabpanel">
                    <div class="table-responsive">
                        <table id="example4" class="display" style="min-width: 845px; border: 0;">
                            <thead style="border: 0;">
                            <tr class="th_tpc" style="border: 0;">
                                <th>Reservation</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Bedrooms</th>
                                <th>Beds</th>
                                <th>Baths</th>
                                <th>View</th>
                            </tr>
                            </thead>
                            <tbody>
                    <!--all listing-->
                    @foreach ($upcoming as $item)
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
                                        <small class="text-muted">Booked By
                                            @if($item->user)
                                                {{ucwords($item->user->first_name)}}&nbsp;{{ucwords($item->user->last_name)}}
                                            @endif
                                        </small>
                                        <small>
                                            {{$item->user->email}}
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td>{{$item->start_date}}</td>
                            <td>{{$item->end_date}}</td>
                            <td>${{number_format($item->paid_amount)}}</td>
                            <td>
                                @if($item->status=="completed")
                                    <span class="text-success fw-bold">Completed</span>
                                @elseif($item->status=="ongoing")
                                    <span class="text-danger fw-bold">Ongoing</span>
                                @elseif($item->status=="upcoming")
                                    <span class="text-warning fw-bold">Upcoming</span>
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
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


               <!--completed Booking-->
                <div class="tab-pane fade show" id="completed" role="tabpanel">
                    <div class="table-responsive">
                        <table id="example4" class="display" style="min-width: 845px; border: 0;">
                            <thead style="border: 0;">
                            <tr class="th_tpc" style="border: 0;">
                                <th>Reservation</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Bedrooms</th>
                                <th>Beds</th>
                                <th>Baths</th>
                                <th>View</th>
                                <th>Review</th>
                            </tr>
                            </thead>
                      <tbody>
                    <!--all listing-->
                    @foreach ($completed as $item)
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
                                        <small class="text-muted">Booked By
                                            @if($item->user)
                                                {{ucwords($item->user->first_name)}}&nbsp;{{ucwords($item->user->last_name)}}
                                            @endif
                                        </small>
                                        <small>
                                            {{$item->user->email}}
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td>{{$item->start_date}}</td>
                            <td>{{$item->end_date}}</td>
                            <td>${{number_format($item->paid_amount)}}</td>
                            <td>
                                @if($item->status=="completed")
                                    <span class="text-success fw-bold">Completed</span>
                                @elseif($item->status=="ongoing")
                                    <span class="text-danger fw-bold">Ongoing</span>
                                @elseif($item->status=="upcoming")
                                    <span class="text-warning fw-bold">Upcoming</span>
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
                                <button class="border-0 bg-light" wire:click="Property({{$item->property->id}})" data-bs-toggle="modal" data-bs-target="#reviewModal">
                                    <i class="fa fa-comments" aria-hidden="true" style="cursor:pointer"></i>
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
                            <tr class="th_tpc" style="border: 0;">
                                <th>Reservation</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Bedrooms</th>
                                <th>Beds</th>
                                <th>Baths</th>
                                <th>View</th>
                            </tr>
                            </thead>
                      <tbody>
                    <!--all listing-->
                    @foreach ($cancelled as $item)
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
                                        <small class="text-muted">Booked By
                                            @if($item->user)
                                                {{ucwords($item->user->first_name)}}&nbsp;{{ucwords($item->user->last_name)}}
                                            @endif
                                        </small>
                                        <small>
                                            {{$item->user->email}}
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td>{{$item->start_date}}</td>
                            <td>{{$item->end_date}}</td>
                            <td>${{number_format($item->paid_amount)}}</td>
                            <td>
                                @if($item->status=="completed")
                                    <span class="text-success fw-bold">Completed</span>
                                @elseif($item->status=="ongoing")
                                    <span class="text-danger fw-bold">Ongoing</span>
                                @elseif($item->status=="upcoming")
                                    <span class="text-warning fw-bold">Upcoming</span>
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



  <!--review popup-->
  <div wire:ignore class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-md">
      <div class="modal-content">
          <button type="button" class="btn-close btn-close-regForm transparency" data-bs-dismiss="modal"
              aria-label="Close"></button>
          <div class="modal-body rounded" style="background: #fff;">
              <div class="container-fluid">
                  <form wire:submit.prevent="AddingReview">
                      <h2 class="nfxb-heading">
                        <i class="fa fa-comments"></i>&nbsp; Review</h2>
                      <p class="text-sm">
                         Hello we would appreciate a short review about your stay in this listing
                      </p>
                      <div class="row mt-5">
                         
                          <div class="col-md-12 mb-3">
                              <div class="form-group">
                                  <label for="">Rating</label>
                                  <select wire:model="rating" class="form-control">
                                      <option value="">Select</option>
                                      <option value="1">1 start rating</option>
                                      <option value="2">2 start rating</option>
                                      <option value="3">3 start rating</option>
                                      <option value="4">4 start rating</option>
                                      <option value="5">5 start rating</option>
                                  </select>
                              </div>
                          </div>
                          
                          <div class="col-md-12 mb-3">
                            <label for="">Review</label>
                             {{$message}}
                             <textarea class="form-control" wire:model="message"></textarea>
                          </div>
                          <input type="hidden" wire:model="propertyId">
                        </div>
                          <button type="submit" class="rlf-btn rlf-btn-primary w-100 my-3">Save</button>
                      </div>
                  </form>
              </div>

          </div>
      </div>
  </div>


</div>
