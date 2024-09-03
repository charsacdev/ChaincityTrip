<div>

    <main wire:ignore>
      <div class="container mb-5">
        <div class="row">
             <div class="col-sm-1"></div>
               <div class="col-sm-10 add-listing-ctn">
                  <form wire:submit.prevent='step3_4'>
                    <div class="mb-5 text-end pb-3">
                        <a href="/listing" class="se-btn">Save Changes</a>
                  </div>
                  <div class="tab" style="display: block">
                    <div class="row">
                    <div class="col-md-1 col-lg-2"></div>
                    <div class="col-sm-12 col-md-10 col-lg-8">
                        <h3 class="dsb-title-header"><strong>Add discounts to your
                                listing</strong></h3>
                        <small>Help your place stand out to get booked faster and earn
                            your first reviews.</small>
                    <div class="row mt-4">
                        <div class="col-12">
                            <label class="gst_plc w-100">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center justify-content-center gap-3">
                                            <h5 class="text-primary"><b>15%</b></h5>
                                            <div>
                                                <h6 class="mb-0 pb-0"><b>New
                                                            Listing Promotion</b>
                                                </h6>
                                                <small class="text-sm">Offer 20%
                                                        off of your bookings</small>
                                            </div>
                                        </div>
                                        <input type="radio" value="new-listing" name="options" wire:model="options" class="ckb_discount"> 
                                    </div>
                              </label>
                              <label class="gst_plc w-100">
                                    <div
                                        class="d-flex align-items-center justify-content-between">
                                        <div
                                            class="d-flex align-items-center justify-content-center gap-3">
                                            <h5 class="text-primary"><b>10%</b></h5>
                                            <div>
                                                <h6 class="mb-0 pb-0"><b>Weekly
                                                            discounts</b></h6>
                                                <small class="text-sm">For stays of
                                                        7 nights or more</small>
                                            </div>
                                        </div>
                                        
                                            <input type="radio" value="weekly" name="options" wire:model="options"
                                                class="ckb_discount">
                                    </div>
                                </label>
                                <label class="gst_plc w-100">
                                            <div
                                                class="d-flex align-items-center justify-content-between">
                                                <div
                                                    class="d-flex align-items-center justify-content-center gap-3">
                                                    <h5 class="text-primary"><b>20%</b></h5>
                                                    <div>
                                                        <h6 class="mb-0 pb-0"><b>Monthly
                                                                    discounts</b></h6>
                                                        <small class="text-sm">For stays of
                                                                28 nights or more</small>
                                                    </div>
                                                </div>
                                               
                                                    <input type="radio" value="monthly" name="options" wire:model="options"
                                                        class="ckb_discount">
                                            </div>
                                    </label>
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
                        <a href="/agent/newlisting/step3-3">
                            <button type="button" class="rlf-btn rlf-btn-primary">
                                    <i class="fa fa-arrow-left"></i>&nbsp; Back
                            </button>
                        </a>
                     
                        <button type="submit" class="rlf-btn rlf-btn-primary">
                            Next&nbsp;<i class="fa fa-arrow-right"></i>
                        </button>
                    
                        
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