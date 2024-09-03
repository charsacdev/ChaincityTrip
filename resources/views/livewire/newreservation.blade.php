<div>
     <main>
     @foreach($selectAsset as $asset)
       <div class="container">
            <div class="row">
                 <div class="col-sm-12">
                      <h1 class="dsb-header mb-0">{{$asset->property_title}}</h1>
                      <span>{{$asset->property_city}}</span>
                      <div class="prdba_img">
                           <img src="{{$asset->property_photos[0]}}" style="width: 100%;" alt="">
                           <div class="prodba_prdimg">
                                <div class="lightgallery">
                                   @foreach($asset->property_photos as $assetphoto)
                                       <a href="{{$assetphoto}}"
                                           data-sub-html="What the apartment look like"
                                           data-exthumbimage="{{$assetphoto}}"
                                           data-src="{{$assetphoto}}">
                                         </a>
                                       @endforeach
                                     <div class="lg__btn prod">
                                       <img src="../asset/img/video-horizontal.png" class="img_icon" alt=""> 
                                       <span class="text-dark"><b>Show all photos</b></span>
                                     </div>
                                </div>
                           </div>
                      </div>
                 </div>
            </div>
            <div class="row">
                 <div class="col-lg-7 mb-sm-5 mb-lg-2">
                      <div class="d-flex align-items-center justify-content-between">
                           <div>
                                <h2 class="dsb-header-sm">Entire rental unit hosted by {{ucwords($asset->user->last_name)}}</h2>
                                <span class="text-sm">
                                   @foreach($asset->property_basics as $category=>$details)
                                     @foreach($details as $detail)
                                         {{htmlspecialchars(ucwords($detail))}}&nbsp;
                                     @endforeach   
                                 @endforeach
                               </span>
                           </div>
                           <div class="hstd">
                                <div class="img">
                                     <img src="{{$asset->user->profile_photo}}" alt="">
                                </div>
                           </div>
                      </div>
                      <hr>
                      <div class="d-flex align-items-start justify-content-start gap-3 mb-3">
                           <img src="../asset/img/home.png" alt="">
                           <div>
                                <h5 class="dsb-header-xm mb-0">Entire Home</h5>
                                <span class="text-sm text-muted">You'll have the apartment to yourself.</span>
                           </div>
                      </div>
                      <div class="d-flex align-items-start justify-content-start gap-3 mb-3">
                           <img src="../asset/img/magic-star.png" alt="">
                           <div>
                                <h5 class="dsb-header-xm mb-0">Enhanced clean</h5>
                                <span class="text-sm text-muted">This host is committed to Airbnb's 5-step
                                     enhanced cleaning process.</span>
                           </div>
                      </div>
                      <div class="d-flex align-items-start justify-content-start gap-3 mb-3">
                           <img src="../asset/img/ticket-star.png" alt="">
                           <div>
                                <h5 class="dsb-header-xm mb-0">Self check-in</h5>
                                <span class="text-sm text-muted">check yourself in with the keypad.</span>
                           </div>
                      </div>
                      <div class="d-flex align-items-start justify-content-start gap-3 mb-3 d-none">
                           <img src="../asset/img/stickynote.png" alt="">
                           <div>
                                <h5 class="dsb-header-xm mb-0">Free cancellation before feb 14</h5>
                           </div>
                      </div>
                      <hr>
                      <div>
                           <div class="apt_desc_ctn full-description-content">
                             {{$asset->property_description_text}}
                           </div>
                           <a href="javascript:;" class="text-muted text-sm show-more-btn">Show more &nbsp;<i
                                     class="fa fa-arrow-right"></i></a>
                           <a href="javascript:;" class="text-muted text-sm show-less-btn d-none">Show less &nbsp;<i
                                     class="fa fa-arrow-right"></i></a>
                      </div>
                      
                      <hr>
                      <div>
                           <h4 class="dsb-header-sm mb-3">Where you'll sleep</h4>
                           <img src="{{$asset->property_photos[0]}}" class="rounded" width="300px" alt="">
                           <h5 class="dsb-header-xm mb-0 mt-2">Rental Unit</h5>
                            @foreach($asset->property_basics as $category=>$details)
                                 @foreach($details as $detail)
                                 <span class="text-sm">{{htmlspecialchars(ucwords($detail))}}</span>
                                 @endforeach   
                             @endforeach
                      </div>
                      <hr>
                      <div>
                           <h4 class="dsb-header-sm mb-3">What this place offers</h4>
                           <div class="row">
                             @foreach($asset->property_offers as $offers)
                             <div class="col-sm-6 mb-3">
                               <div class="d-flex align-items-center justify-content-start gap-4">
                                    <img src="../asset/img/star2.png" alt="">
                                    <span class="text-sm">{{htmlspecialchars($offers)}}</span>
                                     </div>
                               </div>
                            @endforeach
                         </div>
                      </div>
                      <hr>
                      <div wire:ignore>
                         <div class="dsb-header-sm">
                           <span class="dsb-header-sm" id="numOfDays">0</span> 
                           nights in {{$asset->property_city}}</div>
                         <span id="stayDuration"> </span>
     
                         <div class="form-group my-3" style="width: 300px;">
                               <h3 class="dsb-header-xs">Select Check-in & Checkout date</h3>
                               <input type="text" value=""  class="input-limit-datepicker form-control" />
                         </div>
                      </div>
                     
                 </div>
                 <div class="col-lg-1"></div>
                 <div class="col-lg-4 mt-2">
                      <form wire:submit.prevent="Addreservation">
                           <div class="reserve-card">
                                <div class="d-flex align-items-center justify-content-between">
                                     <h3 class="dsb-header-xm p-0 m-0">${{number_format($asset->property_price)}}/night</h3>
                                     <div class="d-flex align-items-center justify-content-end gap-2">
                                          <img src="../asset/img/star1.png" width="20px" alt="">
                                          <span class="text-xs">5.0</span>
                                          <span class="text-xs">{{$selectReviews->count()}} reviews</span>
                                     </div>
                                </div>
                                <div class="row mt-3 border rounded">
                                   <div class="form-group my-3" style="width: 300px;">
                                        <h3 class="dsb-header-xs text-center">Check-in | Checkout date</h3>
                                        <input type="text" value=""  class="input-limit-datepicker form-control text-center" />
                                  </div>
                                     {{-- <div class="col-6 bottom-border pt-3" wire:ignore.self>
                                          <h3 class="dsb-header-xs mb-0">CHECK-IN</h3>
                                          <p class="mb-1" class="check-in-ctn" style="border:0px">
                                            <input type="text" wire:model="checkin" readonly class="check-in-ctn" style="width:100%;border:0px;outline:0px" placeholder="none">
                                         </p>
                                     </div>
                                     <script>
                                          document.addEventListener("DOMContentLoaded", () => {
     
                                              Livewire.hook('component.initialized', (component) => {
                                                 //alert('yes');
                                              });
                                          })
                                       </script>
                                     <div class="col-6 left-border bottom-border pt-3">
                                          <h3 class="dsb-header-xs mb-0">CHECKOUT</h3>
                                          <p class="mb-1" class="check-out-ctn" style="border:0px">
                                           <input type="text" wire:model="checkout" readonly class="check-out-ctn" style="width:100%;border:0px;outline:0px" placeholder="none">
                                        </p>
                                     </div> --}}
                                     <div class="col-sm-12 py-3">
                                          <h3 class="dsb-header-xs mb-0">GUEST'S</h3>
                                          <div class="gst-ctn" wire:ignore.self>
                                               <select name="guests" wire:model="guest" wire:change="calculations" id="" class="form-contro gst_num">
                                                   <option value="">How many ?</option>
                                                   <option value="1">1 guest</option>
                                                    <option value="2">2 guests</option>
                                                    <option value="3">3 guests</option>
                                                    <option value="4">4 guests</option>
                                                    <option value="5">5 guests</option>
                                               </select>
                                               <input type="hidden" wire:model="duration" class="duration">
                                               <input type="hidden" wire:model="price" value="{{$asset->property_price}}">
                                              @if(session('error'))
                                                <p class="p-2 mb-0" style="color:#e21208">{{session('error')}}</p>
                                              @endif
                                           </div>
                                     </div>
                                </div>
                                <div class="row">
                                    @auth
                                     <button type="submit" class="rlf-btn rlf-btn-primary my-3 reserve-btn">Reserve</button>
                                   @endauth
                                   @guest
                                     <button type="button" onclick="redirectToLogin()"  class="rlf-btn rlf-btn-primary my-3 reserve-btn">Reserve</button>
                                     <script>
                                        function redirectToLogin() {
                                            window.location.href = '/login';
                                        }
                                    </script>
                                    
                                   @endguest
                                     <div class="text-center mb-3">
                                          <p>You won't be charged yet</p>
                                     </div>
                                     <div class="col-sm-12">
                                          <div class="d-flex align-items-center justify-content-between mb-3">
                                               <span>${{number_format($price)}} &times;{{$nights}} nights</span>
                                               <span>${{number_format($totalPrice)}}</span>
                                          </div>
                                          <div class="d-flex align-items-center justify-content-between mb-3">
                                               <span>{{ucwords($discount['duration'])}} discount</span>
                                               <span class="text-success">-${{number_format($percentDiscount)}}</span>
                                          </div>
                                          <div class="d-flex align-items-center justify-content-between mb-3 d-none">
                                               <span>Cleaning fee</span>
                                               <span>$55</span>
                                          </div>
                                          <div class="d-flex align-items-center justify-content-between mb-3 d-none">
                                               <span>Service fee</span>
                                               <span>$95</span>
                                          </div>
                                          <div class="d-flex align-items-center justify-content-between mb-3 d-none">
                                               <span>Occupancy taxes & fees</span>
                                               <span>$95</span>
                                          </div>
                                          <hr>
                                          <div class="d-flex align-items-center justify-content-between">
                                               <h3 class="dsb-header-xs">Total</h3>
                                               <h3 class="dsb-header-xs">${{number_format($payablePrice)}}</h3>
                                          </div>
                                     </div>
                                </div>
                           </div>
                      </form>
                 </div>
            </div>
            <hr>
            <div class="row">
                 <div class="col-sm-12">
                      <div>
                           <div class="d-flex align-items-center justify-content-start gap-2 mb-5">
                                <img src="../asset/img/star.png" width="20px" alt="">
                                <span class="text-md">5.0</span>
                                <span class="text-md">7 reviews</span>
                           </div>
                           <div class="row">
                                <div class="col-md-6">
                                     <div class="d-flex align-items-center justify-content-between pr-md-2">
                                          <span>Cleanliness</span>
                                          <div class="d-flex align-items-center gap-3">
                                               <div class="prg_ctn">
                                                    <div class="prg" style="width: 100px;"></div>
                                               </div>
                                               <span>5.0</span>
                                          </div>
                                     </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="d-flex align-items-center justify-content-between pr-md-2">
                                          <span>Accuracy</span>
                                          <div class="d-flex align-items-center gap-3">
                                               <div class="prg_ctn">
                                                    <div class="prg" style="width: 80px;"></div>
                                               </div>
                                               <span>4.0</span>
                                          </div>
                                     </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="d-flex align-items-center justify-content-between pr-md-2">
                                          <span>Communication</span>
                                          <div class="d-flex align-items-center gap-3">
                                               <div class="prg_ctn">
                                                    <div class="prg" style="width: 60px;"></div>
                                               </div>
                                               <span>3.0</span>
                                          </div>
                                     </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="d-flex align-items-center justify-content-between pr-md-2">
                                          <span>Location</span>
                                          <div class="d-flex align-items-center gap-3">
                                               <div class="prg_ctn">
                                                    <div class="prg" style="width: 40px;"></div>
                                               </div>
                                               <span>2.0</span>
                                          </div>
                                     </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="d-flex align-items-center justify-content-between pr-md-2">
                                          <span>Check-in</span>
                                          <div class="d-flex align-items-center gap-3">
                                               <div class="prg_ctn">
                                                    <div class="prg" style="width: 20px;"></div>
                                               </div>
                                               <span>1.0</span>
                                          </div>
                                     </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="d-flex align-items-center justify-content-between pr-md-2">
                                          <span>Value</span>
                                          <div class="d-flex align-items-center gap-3">
                                               <div class="prg_ctn">
                                                    <div class="prg" style="width: 100px;"></div>
                                               </div>
                                               <span>5.0</span>
                                          </div>
                                     </div>
                                </div>
                           </div>
                           <div class="row mt-5 all-reviews-ctn">
                              @foreach ($selectReviews as $item)
                                <div class="col-md-6 mb-3">
                                     <div class="reviewer-card">
                                          <div class="reviewer-card-header">
                                               <div class="img">
                                                    <img src="{{$item->user->profile_photo}}" alt="">
                                               </div>
                                               <div>
                                                    <div class="fw-bold custom-fs-1">{{$item->user->first_name}}</div>
                                                    <small class="text-muted">October, 2024</small>
                                               </div>
                                          </div>
                                          <div class="reviewer-card-body">
                                               <div class="d-flex align-items-center justify-content-end gap-1 mb-3">
                                                    <img src="../asset/img/star.png" width="15px" alt=""> 
                                                    <span class="text-sm text-muted">{{$item->rating}}</span>
                                               </div>
                                               <p class="text-sm text-dark">
                                                  {{$item->rating_message}}
                                               </p>
                                          </div>
                                     </div>
                                </div>
                               @endforeach
                              <div class="col-12 d-none">
                                   <button class="btn btn-outline border all-reviews-btn">Show all reviews</button>
                              </div>
                           </div>
                      </div>
                 </div>
            </div>
            <hr>
            <div>
                 <h3 class="dsb-header">Where you'll be</h3>
                 <div class="row">
                      <div class="col-sm-12">
                       <style>
                         #map { height: 400px; }
                       </style>
                       <div id="map" style="border:1px solid gray;border-radius:12px"></div>
                       <script>
                           //map leaf map location
                           var map = L.map('map').setView([{{$asset->property_location['point2']}},{{$asset->property_location['point1']}}], 13);
                           L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                               maxZoom: 19,
                           }).addTo(map);
                           var locations = [
                               { name: "Location A", lat:{{$asset->property_location['point2']}}, lon:{{$asset->property_location['point1']}} },
                           ];
                   
                           locations.forEach(function(location) {
                               L.marker([location.lat, location.lon]).addTo(map)
                                   .bindPopup(location.name);
                           });
                       </script>
                      </div>
                 </div>
                 <h3 class="dsb-header-sm mt-3">{{$asset->property_city}}</h3>
            
                 <div class="apt_desc_ctn short-description-content">{{$asset->property_description_text}}</div>
                 <a href="javascript:;" class="text-muted text-sm show-more-short-btn">Show more &nbsp;<i
                           class="fa fa-arrow-right"></i></a>
                 <a href="javascript:;" class="text-muted text-sm show-less-short-btn d-none">Show less &nbsp;<i
                           class="fa fa-arrow-right"></i></a>
            </div>
            <hr>
            <div>
                 <div class="row">
                      <div class="col-md-6 col-lg-5">
                           <div class="host-ctn d-flex align-items-center justify-content-start gap-3">
                                <div class="img">
                                     <img src="{{$asset->user->profile_photo}}" alt="">
                                </div>
                                <div>
                                     <h3 class="dsb-header-sm mb-0">Hosted by {{ucwords($asset->user->last_name)}}</h3>
                                     <small class="text-muted">Joined may, {{\Carbon\Carbon::parse($asset->user->created_at)->format('F Y')}}</small>
                                </div>
                           </div>
                           <div class="d-flex align-items-center justify-content-start gap-3 my-3">
                                <div class="d-flex align-items-center justify-content-start gap-1">
                                     <img src="../asset/img/star.png" width="15px" alt="">
                                     <small>{{count($selectReviews)}} Reviews</small>
                                </div>
                                <div class="d-flex align-items-center justify-content-start gap-1">
                                     <img src="../asset/img/shield-tick.png" width="15px" alt="">
                                     <small>Identity verified</small>
                                </div>
                                <div class="d-flex align-items-center justify-content-start gap-1">
                                     <img src="../asset/img/cup.png" width="15px" alt="">
                                     <small>Superhost</small>
                                </div>
                           </div>
                           <h3 class="dsb-header-xm text-sm my-4">{{ucwords($asset->user->last_name)}} is superhost</h3>
                           <p class="text-sm">
                                Superhosts are experienced, highly rated hosts who are committed to providing great stays for guests.
                           </p>
                           <p class="text-sm">
                                Respone rate: 100%
                           </p>
                           <p class="text-sm">
                                Response time: within an hour
                           </p>
                             <a href="mailto:{{$asset->user->email}}">
                               <button class="btn ch-btn mt-3 mb-4">Contact Host</button>
                             </a>
                           <div class="d-flex align-items-start justify-content-start gap-3 my-3">
                                <img src="../asset/img/security.png" width="30px" alt="">
                                <p class="text-sm"> To protect your payment, never transfer money or communicate outside of the Airbnb website or app.</p>
                           </div>
                      </div>
                 </div>
            </div>
            
       </div>
     </main>
     @endforeach
     
     </div>