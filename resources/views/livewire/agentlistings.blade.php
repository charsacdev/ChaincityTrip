<div>
    
  <div class="container payments mb-5 px-3">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="dsb-header">Your Listings</h2>
          <p class="text-muted d-none">Here are listing saved not yet checked out.</p>
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
                <ul class="nav nav-tabs" >
                     <li class="nav-item">
                          <a class="nav-link active" data-bs-toggle="tab" href="#all"></i> All</a>
                     </li>
                     <li class="nav-item">
                          <a class="nav-link" data-bs-toggle="tab" href="#listed"> Listed</a>
                     </li>
                     <li class="nav-item">
                          <a class="nav-link" data-bs-toggle="tab" href="#unlisted"> Unlisted</a>
                     </li>

                  </ul>
              </div>
                <div class="tab-content mb-5">
                     <div class="tab-pane fade show active" id="all" role="tabpanel">
                          <div class="table-responsive">
                               <table id="example4" class="display" style="min-width: 845px; border: 0;">
                                    <thead style="border: 0;">
                                    <tr class="th_tpc" style="border: 0;white-space:nowrap">
                                         <th>All Listing</th>
                                         <th>Status</th>
                                         <th>Price</th>
                                         <th>Bedrooms</th>
                                         <th>Beds</th>
                                         <th>Baths</th>
                                         <th>View</th>
                                         <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                     <!--all listing-->
                                      @foreach ($listingAll as $item)
                                          <tr style="white-space:nowrap">
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
                                                  @else
                                                  <span class="text-info fw-bold">Booked</span>
                                                  @endif
                                              </td>
                                              <td>${{$item->property_price}}</td>
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

              <!---Approved Listing--->
              <div class="tab-pane fade show" id="listed" role="tabpanel">
                  <div class="table-responsive">
                          <table id="example4" class="display" style="min-width: 845px; border: 0;">
                              <thead style="border: 0;">
                                  <tr class="th_tpc" style="border: 0;white-space:nowrap">
                                      <th>Approved Listing</th>
                                      <th>Status</th>
                                      <th>Price</th>
                                      <th>Bedrooms</th>
                                      <th>Beds</th>
                                      <th>Baths</th>
                                      <th>View</th>
                                      <th>Action</th>
                                 </tr>
                              </thead>
                                  <tbody>
                                        <!--Approve listing-->
                                          @foreach ($listed as $item)
                                          <tr style="white-space:nowrap">
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
                                              <td>${{$item->property_price}}</td>
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
                                                <button class="dropdown-item" type="button" wire:click="SavedListingDelete({{$item->id}})">
                                                   <i class="fa fa-trash text-danger fw-bold"></i>
                                              </button>
                                             </td>
                                          </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                      </div>
                  </div>

             <!--Unapproved Listing-->
              <div class="tab-pane fade show" id="unlisted" role="tabpanel">
                  <div class="table-responsive">
                      <table id="example4" class="display" style="min-width: 845px; border: 0;">
                          <thead style="border: 0;">
                              <tr class="th_tpc" style="border: 0;white-space:nowrap">
                                  <th>Unapproved Listing</th>
                                  <th>Status</th>
                                  <th>Price</th>
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
                                      <td>${{$item->property_price}}</td>
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
                                        <button class="dropdown-item" type="button" wire:click="SavedListingDelete({{$item->id}})">
                                           <i class="fa fa-trash text-danger fw-bold"></i>
                                      </button>
                                     </td>
                                  </tr>
                              @endforeach
                         </tbody>
                     </table>
                  </div>
              </div>

              <!--Inprogress-->
              <div class="tab-pane fade show" id="inprogress" role="tabpanel">
                  <div class="table-responsive">
                      <table id="example4" class="display" style="min-width: 845px; border: 0;">
                          <thead style="border: 0;">
                              <tr class="th_tpc" style="border: 0;white-space:nowrap">
                                  <th>Inprogress Listing</th>
                                  <th>Status</th>
                                  <th>Price</th>
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
                                      <tr style="white-space:nowrap">
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
                                          <td>${{$item->property_price}}</td>
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
                                            <button class="dropdown-item" type="button" wire:click="SavedListingDelete({{$item->id}})">
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
