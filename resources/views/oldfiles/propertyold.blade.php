<div>
    <!--new reservation page-->
    <div class="container-fluid" style="margin-top:100px">
      @foreach($selectAsset as $asset)
        <h1 class="px-2 fw-bold">{{$asset->property_title}}</h1>
        <p class="px-2 text-muted">{{$asset->property_city}}</p>
        <div class="row justify-content-center flex-wrap">
             <!--slider carousel-->
             <section class="col-md-12 p-3">
                <!-- Swiper -->
                <div class="swiper mySwiper">
                  <div class="swiper-wrapper">
                    @foreach($asset->property_photos as $assetphoto)
                      <div class="swiper-slide p-0">
                        <img src="{{$assetphoto}}" class="img-fluid">
                      </div>
                    @endforeach
    
                  </div>
                  <div class="swiper-button-next"></div>
                  <div class="swiper-button-prev"></div>
                  <div class="swiper-pagination" style="color:#fff;font-weight:bold;"></div>
                </div>
      
                <!-- Initialize Swiper -->
                <script>
                  var swiper = new Swiper(".mySwiper", {
                    pagination: {
                      el: ".swiper-pagination",
                      type: "fraction",
                    },
                    navigation: {
                      nextEl: ".swiper-button-next",
                      prevEl: ".swiper-button-prev",
                    },
                  });
                </script>
             </section>
             <section class="col-md-12">
               <div class="row justify-content-center flex-wrap mt-4">
                   <aside class="col-md-8 px-4">
                      <div class="d-flex" style="border-bottom:1px solid gray">
                        <article class="col-10 px-3">
                           <h3 class="fw-bold">Entire rental unit hosted by {{ucwords($asset->user->last_name)}}</h3>
                            <p class="d-flex text-muted">
                                @foreach($asset->property_basics as $category=>$details)
                                      @foreach($details as $detail)
                                          {{htmlspecialchars(ucwords($detail))}}&nbsp;
                                      @endforeach   
                                @endforeach
                            </p>
                        </article>
                        <article>
                          <img src="{{$asset->user->profile_photo}}" class="img-fluid">
                        </article>
                      </div>
      
                    <!--house details-->
                     <ul class="house-details-ul">
                         <li class="d-flex">
                          <img src="{{asset('asset/home.png')}}" class="img-fluid" style="width:20px;height:20px">
                           <aside class="px-2">
                              <h5 class="fw-bold">Entire home</h5>
                              <p>You’ll have the apartment to yourself</p>
                           </aside>
                         </li>
                         <li class="d-flex">
                          <img src="{{asset('asset/magic-star.png')}}" class="img-fluid" style="width:20px;height:20px">
                           <aside class="px-2">
                              <h5 class="fw-bold">Enhanced Clean</h5>
                              <p>This Host committed to Airbnb’s 5-step enhanced cleaning process. Show more</p>
                           </aside>
                         </li>
                         <li class="d-flex">
                          <img src="{{asset('asset/ticket-star.png')}}" class="img-fluid" style="width:20px;height:20px">
                           <aside class="px-2">
                              <h5 class="fw-bold">Self check-in</h5>
                              <p>Check yourself in with the keypad.</p>
                           </aside>
                         </li>
                         <li class="d-flex d-none">
                          <img src="{{asset('asset/stickynote.png')}}" class="img-fluid" style="width:20px;height:20px">
                           <aside class="px-2">
                              <h5 class="fw-bold">Free cancellation before Feb 14</h5>
                           </aside>
                         </li>
                       </ul>
                       <p class="p-md-2 p-1 text-muted">
                         {{$asset->property_description_text}}
                      </p>
      
                       
                       <section class="col-md-12">
                         <div class="row justify-content-center flex-wrap">
                          <!--where you will sleep-->
                            <div class="col-md-6">
                               <h3 class="fw-bold">Where you will sleep</h3>
                               <img src="{{$asset->property_photos[0]}}" class="img-fluid" style="width:100%;height:80%">
                               {{-- <h4 class="fw-bold p-2">Bedroom</h4>
                               <p class="text-muted p-2">1 guest Bedroom</p>  --}}
                            </div>
      
                            <!--offers-->
                             <div class="col-md-6 mb-3 p-4">
                                <h4 class="fw-bold">What this place offers</h4>
                                <ul class="offers-ul">
                                 @foreach($asset->property_offers as $offers)
                                    <li>
                                      <img src="{{asset('asset/star.png')}}" class="img-fluid" style="width:20px;height:20px">
                                      <span>{{htmlspecialchars($offers)}}</span>
                                    </li>
                                   @endforeach
                                 </ul>
                             </div>
                         </div>
                        
                       </section>
      
                       
      
                       <!--calender dates-->
                       <section class="col-md-12">
                             <div class="row justify-content-center flex-wrap" style="border:0px solid green">
                                <div class="col-sm-6 mb-3" style="border:0px solid green">
                                  <div class="input-group" id="datetimepicker2" data-td-target-input="nearest">
                                      <h5 class="fw-bold p-0" style="color:#D80450">
                                        <i class="bi bi-calendar-check-fill"></i>&nbsp;Check-In
                                      </h5>
                                      <input type="text" id="date-picker" style="visibility:hidden;height:10px">
                                   </div>
                                 </div>
      
                                 <div class="col-sm-6" style="border:0px solid green">
                                   <div class="input-group" id="datetimepicker1" data-td-target-input="nearest">
                                      <h5 class="fw-bold p-0" style="color:#D80450">
                                        <i class="bi bi-calendar-check-fill"></i>&nbsp;Check-Out
                                      </h5>
                                      <input type="text" id="date-picker2" style="visibility:hidden;height:10px">
                                    </div>
                                  </div>
                                </div>
                              <script>
                                //from date
                                  const datePicker = flatpickr("#date-picker", {
                                    inline: true,
                                    dateFormat: "Y-m-d",
                                    allowInput: false,
                                    minDate: "today",
                                  });
      
                                  //to date
                                   const datePicker2 = flatpickr("#date-picker2", {
                                    inline: true,
                                    dateFormat: "Y-m-d",
                                    allowInput: false,
                                    minDate: "today",
                                  });
      
                                
                                 //check date
                                 let check=document.querySelector("body").addEventListener("mouseover",function(){
                                    let from= new Date(document.querySelector("#date-picker").value);
                                    let too= new Date(document.querySelector("#date-picker2").value);
      
                                    //check-in and checkout value to the correct once
                                    document.querySelector("#check-in").value=from;
                                    document.querySelector("#check-out").value=too;
                                   
                                    if(from > too){
                                        let toDateInput = document.querySelector("#date-picker").value;
                                        datePicker2.set("minDate", toDateInput);
                                    }
                                    else{
                                       //let toDateInput = document.querySelector("#date-picker").value;
                                        datePicker2.set("minDate", "today");
                                    }
                                    
                                 })
                              </script>
                        </section>
                    </aside>
                  <aside class="col-md-4 check-holder">
                    <div class="p-3 px-4">
                        <h5 class="mt-4">
                           <span class="fw-bold">$75/night</span>
                           <span class="float-end">5.0&nbsp; 7reviews</span>
                         </h5>
                      <!--check-ins-->
                       <ul class="p-0 checks-ul" style="border:0px solid green;list-style:none">
                         <li class="row justify-content-center flex-wrap d-flex">
                            <aside class="col-md-6 pt-2">
                              <h5>CHECK-IN</h5>
                              <input type="text" readonly="" id="check-in" placeholder="Select from calender">
                            </aside>
                            <aside class="col-md-6 pt-2" style="border-left:1px solid gray">
                              <h5>CHECKOUT</h5>
                              <input type="text" readonly="" id="check-out" placeholder="Select from calender">
                            </aside>
                          </li>
                          <li class="row justify-content-center flex-wrap" style="border-top:0px !important">
                            <aside class="col-md-12 p-2">
                              <h6 class="text-muted">GUESTS</h6>
                              <select style="background-color:#fff;border:0px;width:100%">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                              </select>
                            </aside>
                          </li>
                          <li>
                            <a href="/checkout"><button>Reserve</button></a>
                          </li>
                        </ul>
                        <p class="text-center text-muted">Your wont be charged yet</p>
      
                        <!--listing pricing-->
                         <ul class="checkout-price">
                            <li>
                              <span>$79 x 7 nights</span>
                              <span class="float-end">$555</span>
                            </li>
                            <li>
                              <span>Weekly Discount</span>
                              <span class="float-end">-$28</span>
                            </li>
                            <li>
                              <span>Cleaning Fees</span>
                              <span class="float-end">$62</span>
                            </li>
                            <li>
                              <span>Service Fees</span>
                              <span class="float-end">$83</span>
                            </li>
                            <li>
                              <span>Occupancy taxes and fees</span>
                              <span class="float-end">$29</span>
                            </li>
                            <li class="p-2 mt-4" style="border-top:1px solid gray">
                              <span class="fw-bold">Total</span>
                              <span class="float-end">$555</span>
                            </li>
                        </ul>
                        </div>
                        <p class="text-center text-muted p-2 mt-2"><i class="bi bi-flag-fill"></i>&nbsp;Report this listing</p>
                   </aside>
                   
               </div>
            </section>
      
      
            <!--listing reviews--->
            <div class="container-fluid listing-reviews p-3">
               <section class="row justify-content-center flex-wrap p-3">
                   <aside class="col-md-10">
                      <h4>
                       <span class="fw-bold">
                        <img src="{{asset('asset/star.png')}}">
                         5.0
                        </span>
                        &nbsp;
                       <span style="font-size:18px;font-weight:bold">7 reviews</span>
                     </h4>
                   </aside>
      
                   <aside class="col-md-5 p-2">
                      <ul>
                        <li>
                          Cleanliness
                          <span class="float-end">
                            <img src="{{asset('asset/bar.png')}}">
                             5.0
                           </span>
                        </li>
                        <li>
                          Communication
                          <span class="float-end">
                            <img src="{{asset('asset/bar.png')}}">
                             5.0
                           </span>
                        </li>
                        <li>
                          Check-in
                          <span class="float-end">
                            <img src="{{asset('asset/bar.png')}}">
                             5.0
                           </span>
                        </li>
                      </ul>
                   </aside>
                   <aside class="col-md-5 p-2">
                     <ul>
                        <li>
                          Accuracy
                          <span class="float-end">
                            <img src="{{asset('asset/bar.png')}}">
                             5.0
                           </span>
                        </li>
                        <li>
                          Location
                          <span class="float-end">
                            <img src="{{asset('asset/bar.png')}}">
                             5.0
                           </span>
                        </li>
                        <li>
                          Value
                          <span class="float-end">
                            <img src="{{asset('asset/bar.png')}}">
                             5.0
                           </span>
                        </li>
                      </ul>
                   </aside>
               </section>
            </div>
      
        <!--Testimony-->
         <div class="Testify">
            <div class="rows justify-content-center flex-wrap d-flex">
              <section class="col-md-5 p-3 m-2">
                <aside class="d-flex">
                  <img src="{{asset('asset/testify1.png')}}" class="img-fluid">
                  <div class="mt-4 mx-4">
                    <h5>Jane Cooper</h5>
                    <p>Marketing Coordinator</p>
                    <span class="float-end">4.5</span>
                  </div>
                </aside>
                <h5>Great Work</h5>
                <p>“I can't thank ChainCity Company enough for their outstanding service. From the moment I started working with them, their team of dedicated professionals went above and beyond to help me find my dream home.”
                </p>
              </section>
              <section class="col-md-5 p-3 m-2">
                <aside class="d-flex">
                  <img src="{{asset('asset/testify1.png')}}" class="img-fluid">
                  <div class="mt-4 mx-4">
                    <h5>Jane Cooper</h5>
                    <p>Marketing Coordinator</p>
                    <span class="float-end">4.5</span>
                  </div>
                </aside>
                <h5>Great Work</h5>
                <p>“I can't thank ChainCity Company enough for their outstanding service. From the moment I started working with them, their team of dedicated professionals went above and beyond to help me find my dream home.”
                </p>
              </section>
              <section class="col-md-5 p-3 m-2">
                <aside class="d-flex">
                  <img src="{{asset('asset/testify1.png')}}" class="img-fluid">
                  <div class="mt-4 mx-4">
                    <h5>Jane Cooper</h5>
                    <p>Marketing Coordinator</p>
                    <span class="float-end">4.5</span>
                  </div>
                </aside>
                <h5>Great Work</h5>
                <p>“I can't thank ChainCity Company enough for their outstanding service. From the moment I started working with them, their team of dedicated professionals went above and beyond to help me find my dream home.”
                </p>
              </section>
              <section class="col-md-5 p-3 m-2">
                <aside class="d-flex">
                  <img src="{{asset('asset/testify1.png')}}" class="img-fluid">
                  <div class="mt-4 mx-4">
                    <h5>Jane Cooper</h5>
                    <p>Marketing Coordinator</p>
                    <span class="float-end">4.5</span>
                  </div>
                </aside>
                <h5>Great Work</h5>
                <p>“I can't thank ChainCity Company enough for their outstanding service. From the moment I started working with them, their team of dedicated professionals went above and beyond to help me find my dream home.”
                </p>
              </section>
      
            </div>
          </div>
      
      
          <!--map where you will be--->
          <div class="container-fluid mt-5 map">
             <div class="rows justify-content-center flex-wrap">
                <h1 class="col-md-12">Where you will be</h1>
                <section class="col-md-12">
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
                 </section>
                <section class="col-md-12 p-2 px-3 mt-4 mx-1" style="border-bottom:1px solid gray">
                  <h3>{{$asset->property_city}}</h3>
                  <p class="d-none">
                    Very dynamic and appreciated district by the people of Bordeaux thanks to rue St James and place Fernand Lafargue. Home to many historical monuments such as the Grosse Cloche, the Porte de Bourgogne and the Porte Cailhau, and cultural sites such as the Aquitaine Museum.
                  </p>
                  
                </section>
             </div>
          </div>
      
      
          <!--Hosted by-->
          <div class="container-fluid hosted-by mt-5">
            <div class="row justify-content-center flex-wrap p-2">
              <div class="col-md-10">
               <section class="d-flex">
                   <aside class="">
                     <img src="{{$asset->user->profile_photo}}" class="img-fluid img-thumbnail">
                   </aside>
                   <aside class="px-3">
                     <h4 class="fw-bold">Hosted by {{ucwords($asset->user->last_name)}}</h4>
                     <p class="text-muted">Joined {{\Carbon\Carbon::parse($asset->user->created_at)->format('F Y')}}</p>
                   </aside>
               </section>
               <ul class="d-flex">
                 <li>
                  <img src="{{asset('asset/star.png')}}">
                   <p>12 Reviews</p>
                 </li>
                 <li>
                   <img src="{{asset('asset/shield-tick.png')}}">
                    <p>Identity verified</p>
                 </li>
                 <li>
                  <img src="{{asset('asset/cup.png')}}">
                  <p>Superhost</p>
                </li>
               </ul>
      
               <section>
                  <h4 class="fw-bold">{{ucwords($asset->user->last_name)}} is a Superhost</h4>
                  <p class="text-muted">
                     Superhosts are experienced, highly rated hosts who are committed to providing great stays for guests.
                   </p>
                   <p class="text-muted">Response rate: 100%</p>
                   <p class="text-muted">Response time: within an hour</p>
                   <a href="mailto:{{$asset->user->email}}">
                     <button class="host-button">contact host</button>
                   </a>
               </section>
      
               <div class="d-flex p-3 mt-4" style="border:1px solid gray;border-radius:5px">
                  <img src="{{asset('asset/security.png')}}" style="width:40px;height:40px">
                  <p class="p-3" style="width:80%">
                    To protect your payment, never transfer money or communicate outside of the Airbnb website or app.
                  </p>
               </div>
             </div>
          </div>
        </div>
      </div>
      </div>
      @endforeach
    
    
    </div>
    