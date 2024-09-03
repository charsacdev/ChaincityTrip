<div>

<main wire:ignore>
    @foreach($preview as $review)
      <div class="container mb-5">
        <div class="row">
             <div class="col-sm-1"></div>
               <div class="col-sm-10 add-listing-ctn">
                  <form wire:submit.prevent='step3_6'>
                    <div class="mb-5 text-end pb-3">
                        <a href="/listing" class="se-btn">Save Changes</a>
                  </div>
                  <div class="tab" style="display: block">
                        <div class="row">
                             <div class="col-md-1 col-lg-2"></div>
                             <div class="col-sm-12 col-md-10 col-lg-8">
                                  <h3 class="dsb-title-header"><strong>Review your listing</strong>
                                  </h3>
                                  <small>Here's what we'll show to guests. Make sure everything
                                       looks good.</small>
                                  <div class="row align-items-start my-5">
                                       <div class="col-md-6 col-lg-6 mb-3">
                                            <div class="ltg_prvc">
                                                 <div class="img">
                                                      <img src="{{$review->property_photos[0]}}"
                                                           class="img-flui" alt="">
                                                 </div>
                                                 <div class="ltg_content">
                                                      <div
                                                           class="d-flex align-items-center justify-content-between">
                                                           <span class="fw-bold">{{$review->property_title}}</span>
                                                           <span class="fw-bold"><i
                                                                     class="fas fa-star"></i>
                                                                4.5</span>
                                                      </div>
                                                      <p class="text-muted">{{$review->property_city}}</p>
                                                 </div>
                                            </div>
                                       </div>
                                       <div class="col-md-6 col-lg-6 mb-3">
                                            <h5><strong>What's next?</strong></h5>
                                            <div class="d-flex align-items-start gap-3 mt-3">
                                                 <img src="{{asset('asset/img/verify.png')}}" alt="">
                                                 <div>
                                                      <h6><strong>Confirm a few details and
                                                                publish</strong></h6>
                                                      <small>We'll let you know if you need to
                                                           verify your identity or register with
                                                           the local government.</small>
                                                 </div>
                                            </div>
                                            <div class="d-flex align-items-start gap-3 mt-3">
                                                 <img src="{{asset('asset/img/calendar.png')}}" width="20px"
                                                      alt="">
                                                 <div>
                                                      <h6><strong>Setup your calendar</strong></h6>
                                                      <small> Choose which date your llisting is
                                                           available. It will be withing 24 hours
                                                           after you publish.</small>
                                                 </div>
                                            </div>
                                            <div class="d-flex align-items-start gap-3 mt-3">
                                                 <img src="{{asset('asset/img/edit-2.png')}}" width="20px"
                                                      alt="">
                                                 <div>
                                                      <h6><strong>Adjust your settings</strong>
                                                      </h6>
                                                      <small> Set house rules, select a connection
                                                           policy, choose how guests book and
                                                           more.</small>
                                                 </div>
                                            </div>
                                       </div>


                                  </div>
                             </div>
                             <div class="col-md-1 col-lg-2"></div>
                        </div>
                   </div>

                <!--button control-->
                <div class="row mb-4 mt-4">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="/agent/newlisting/step3-5">
                                <button type="button" class="rlf-btn rlf-btn-primary">
                                        <i class="fa fa-arrow-left"></i>&nbsp; Back
                                </button>
                            </a>
                        
                            <button type="submit" class="rlf-btn rlf-btn-primary">
                                Submit&nbsp;<i class="fa fa-arrow-right"></i>
                            </button>
                        
                            
                        </div>
                        </div>
                    </div>
                    </div>
                </form>
                </div>
                <div class="col-sm-1"></div>

                </div>

            </main>
        @endforeach
    </div>