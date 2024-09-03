<div>

    <main wire:ignore>
      <div class="container mb-5">
        <div class="row">
             <div class="col-sm-1"></div>
               <div class="col-sm-10 add-listing-ctn">
                  <form wire:submit.prevent='step3_2'>
                    <div class="mb-5 text-end pb-3">
                        <a href="/listing" class="se-btn">Save Changes</a>
                  </div>
                  <div class="tab" style="display: block">
                        <div class="row">
                             <div class="col-md-1 col-lg-2"></div>
                             <div class="col-sm-12 col-md-10 col-lg-8">
                                  <h3 class="dsb-title-header"><strong>Decide how you’ll confirm
                                            reservations</strong></h3>
                                  <div class="row mt-4">
                                       <div class="col-12">
                                            <label class="gst_plc  w-100">
                                                <h5>Use instant book</h5>
                                                    <small>Guests can book automatically.</small>
                                                    <input type="radio" id="instant" name="options" value="instant" wire:model="options">
                                            </label>

                                            <label class="gst_plc w-100">
                                                 <h5>Approve or decline requests</h5>
                                                 <small>Guests must ask if they can book.</small>
                                                 <input type="radio" id="approve" name="options" value="approval" wire:model="options">
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
                        <a href="/agent/newlisting/step3-1">
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