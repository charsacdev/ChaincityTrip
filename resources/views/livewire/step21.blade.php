<div>

    <main>
      <div class="container mb-5">
        <div class="row">
             <div class="col-sm-1"></div>
               <div class="col-sm-10 add-listing-ctn">
                  <form wire:submit.prevent='step1_4'>
                    <div class="mb-5 text-end pb-3">
                        <a href="/listing" class="se-btn">Save Changes</a>
                  </div>
                  <div class="tab">
                    <div class="row align-items-end mt-2">
                         <div class="col-md-1 col-lg-2"></div>
                         <div class="col-sm-12 col-md-10 col-lg-8">
                              <div class="row mt-4">
                                   <div class="col-md-7 mb-3">
                                        <small class="text-primary">Step 2</small>
                                        <h3 class="dsb-header mt-2">Make your place stand out
                                        </h3>
                                        <small>
                                             In this step, you’ll add some of the amenities
                                             your place offers, plus 5 or more photos. Then,
                                             you’ll create a title and description.
                                        </small>
                                   </div>
                                   <div
                                        class="col-md-5 mb-3 d-flex align-items-end justify-content-center">
                                        <img src="{{asset('asset/img/snowball2.png')}}" width="110px"
                                             alt="">
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
                            <a href="/agent/newlisting/step1-4">
                                <button type="button" class="rlf-btn rlf-btn-primary">
                                        <i class="fa fa-arrow-left"></i>&nbsp; Back
                                </button>
                            </a>
                            <a href="/agent/newlisting/step2-2">
                                <button type="button" class="rlf-btn rlf-btn-primary">
                                    Next&nbsp;<i class="fa fa-arrow-right"></i>
                                </button>
                            </a>
                            
                        </div>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-1"></div>
            </div>

            </div>
            </main>
        </div>

</div>