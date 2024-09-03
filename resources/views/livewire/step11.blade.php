<div>

  <main wire:ignore>
    <div class="container mb-5">
      <div class="row">
           <div class="col-sm-1"></div>
             <div class="col-sm-10 add-listing-ctn">
                <form wire:submit.prevent='step1_1'>
                  <div class="tabs mb-5 mt-3 pb-3">
                      <div class="mb-5 text-end pb-3">
                            <a href="/listing" class="se-btn">Save Changes</a>
                      </div>
                    <div class="tab">
                    <div class="row">
                      <div class="col-md-1 col-lg-2"></div>
                        <div class="col-sm-12 col-md-10 col-lg-8">
                            <h3 class="dsb-title-header"><strong>Which of these best
                                      describes your place?</strong></h3>
                            <div class="row mt-3">
                              @if(session('error'))
                                  <p class="text-center" style="color:#e21208;font-size:18px">{{session('error')}}</p>
                              @endif
                              
                                <label class="col-6 col-lg-4 apt_sib">
                                      <div class="apt_desc">
                                           House
                                          <input type="radio" id="house" name="options" value="house" wire:model="options">
                                      </div>
                                    </label>
                                <label class="col-6 col-lg-4 apt_sib">
                                      <div class="apt_desc">
                                          Apartment
                                          <input type="radio" id="apartment" name="options" value="apartment" wire:model="options">
                                      </div>
                                </label>
                                <label class="col-6 col-lg-4 apt_sib">
                                      <div class="apt_desc">
                                          Barn
                                          <input type="radio" id="barn" name="options" value="barn" wire:model="options">
                                      </div>
                                </label>
                                <label class="col-6 col-lg-4 apt_sib">
                                      <div class="apt_desc">
                                          Boat
                                          <input type="radio" id="boat" name="options" value="boat" wire:model="options">
                                      </div>
                                </label>
                                <label class="col-6 col-lg-4 apt_sib">
                                      <div class="apt_desc">
                                          Cabin
                                          <input type="radio" id="cabin" name="options" value="cabin" wire:model="options">
                                      </div>
                                </label>
                                <label class="col-6 col-lg-4 apt_sib">
                                      <div class="apt_desc">
                                          Casa Particular
                                          <input type="radio" id="casa" name="options" value="casa" wire:model="options">
                                      </div>
                                </label>
                                <label class="col-6 col-lg-4 apt_sib">
                                      <div class="apt_desc">
                                          Hotel
                                          <input type="radio" id="hotel" name="options" value="hotel" wire:model="options">
                                      </div>
                                </label>
                                <label class="col-6 col-lg-4 apt_sib">
                                      <div class="apt_desc">
                                          Castle
                                          <input type="radio" id="castle" name="options" value="castle" wire:model="options">
                                      </div>
                                </label>
                                <label class="col-6 col-lg-4 apt_sib">
                                      <div class="apt_desc">
                                          Cave
                                          <input type="radio" id="cave" name="options" value="cave" wire:model="options">
                                      </div>
                                </label>
                                <label class="col-6 col-lg-4 apt_sib">
                                      <div class="apt_desc">
                                          Container
                                          <input type="radio" id="container" name="options" value="container" wire:model="options">
                                      </div>
                                </label>
                                <label class="col-6 col-lg-4 apt_sib">
                                      <div class="apt_desc">
                                          Camper
                                          <input type="radio" id="camper" name="options" value="camper" wire:model="options">
                                      </div>
                                </label>
                                <label class="col-6 col-lg-4 apt_sib">
                                      <div class="apt_desc">
                                          Dome
                                          <input type="radio" id="dome" name="options" value="dome" wire:model="options">
                                      </div>
                                    </label>
                        </div>
                  </div>
                  <div class="col-md-1 col-lg-2"></div>
              </div>
          </div>
          <!--button control-->
          <div class="row mb-4 mt-4">
            <div class="col-12">
                 <div class="d-flex align-items-center justify-content-between">
                      <a href="/agent/newlisting">
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