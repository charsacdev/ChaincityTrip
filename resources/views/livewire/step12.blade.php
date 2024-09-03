<div>

  <main wire:ignore>
    <div class="container mb-5">
      <div class="row">
           <div class="col-sm-1"></div>
             <div class="col-sm-10 add-listing-ctn">
                <form wire:submit.prevent='step1_2'>
                  <div class="tabs mb-5 mt-3 pb-3">
                      <div class="mb-5 text-end pb-3">
                            <a href="/listing" class="se-btn">Save Changes</a>
                      </div>
                      <div class="tab mt-5">
                      <div class="row">
                          <div class="col-md-1 col-lg-2"></div>
                          <div class="col-sm-12 col-md-10 col-lg-8">
                                <h3 class="dsb-title-header"><strong>What type of place will
                                          guests have?</strong></h3>
                                <div class="row mt-3">
                                  @if(session('error'))
                                    <p class="text-center" style="color:#e21208;font-size:18px">{{session('error')}}</p>
                                @endif
                                    <div class="col-12">
                                          <label class="gst_plc w-100">
                                              <h5>An entire place</h5>
                                              <small>Guests have the whole place to
                                                    themselves.
                                                </small>
                                                <input type="radio"  name="options" value="place" wire:model="options">
                                          </label>
                                          <label class="gst_plc w-100">
                                              <h5>A room</h5>
                                              <small>Guests have their own room in a home, plus
                                                    access to shared spaces.</small>
                                                  <input type="radio"  name="options" value="room" wire:model="options">
                                          </label>
                                          <label class="gst_plc w-100">
                                              <h5>A shared room</h5>
                                              <small>Guests sleep in a room or common area that
                                                    may be shared with you or others.</small>
                                                  <input type="radio"  name="options" value="shared room" wire:model="options">
                                          </label>
                                    </div>
                                </div>
                          </div>
                          <div class="col-md-1 col-lg-2"></div>
                      </div>
                      
                    </div>
                      
                    </div>
                    
            <!--button control-->
          <div class="row mb-4 mt-4">
            <div class="col-12">
                 <div class="d-flex align-items-center justify-content-between">
                      <a href="/agent/newlisting/step1-1">
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
