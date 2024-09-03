<div>

  <main wire:ignore>
    <div class="container mb-5">
      <div class="row">
           <div class="col-sm-1"></div>
             <div class="col-sm-10 add-listing-ctn">
                <form wire:submit.prevent='step2_2'>
                  <div class="mb-5 text-end pb-3">
                      <a href="/listing" class="se-btn">Save Changes</a>
                </div>

                <div class="tab" style="display: block">
                  <div class="row">
                       <div class="col-md-1 col-lg-2"></div>
                       <div class="col-sm-12 col-md-10 col-lg-8">
                            <h3 class="dsb-title-header"><strong>Tell your guests what your
                                      place has to offer.</strong></h3>
                            <div class="row mt-3">
                               
                                 <div class="col-6 col-lg-4">
                                    <label class="w-100">
                                      <div class="apt_sib_self">
                                           Wifi
                                        </div>
                                      <input type="checkbox" id="wifi" name="options[]" wire:model="options" value="wifi">
                                    </label>
                                  </div>
                                    
                                 <div class="col-6 col-lg-4">
                                    <label class="w-100">
                                      <div class="apt_sib_self">
                                           Television
                                      </div>
                                      <input type="checkbox" id="tv" name="options[]" wire:model="options" value="television">
                                    </label>
                                 </div>
                                 <div class="col-6 col-lg-4">
                                    <label class="w-100">
                                        <div class="apt_sib_self">
                                            Kitchen
                                        </div>
                                        <input type="checkbox" id="kt" name="options[]" wire:model="options" value="kitchen">
                                    </label>
                                 </div>
                                 <div class="col-6 col-lg-4">
                                    <label class="w-100">
                                        <div class="apt_sib_self">
                                            Washing Machine
                                        </div>
                                        <input type="checkbox" id="wm" name="options[]" wire:model="options" value="washing machine">
                                    </label>
                                 </div>
                                 <div class="col-6 col-lg-4">
                                    <label class="w-100">
                                        <div class="apt_sib_self">
                                            Free Packing Space
                                        </div>
                                        <input type="checkbox" id="pks" name="options[]" wire:model="options" value="free packing space">
                                    </label>
                                 </div>
                                 <div class="col-6 col-lg-4">
                                    <label class="w-100">
                                        <div class="apt_sib_self">
                                            Air Conditionining
                                        </div>
                                        <input type="checkbox" id="ac" name="options[]" wire:model="options" value="air condition">
                                    </label>
                                 </div>
                                 <div class="col-6 col-lg-4">
                                    <label class="w-100">
                                        <div class="apt_sib_self">
                                            Workspace
                                        </div>
                                        <input type="checkbox" id="workspc" name="options[]" wire:model="options" value="work space">
                                    </label>
                                 </div>
                                 <div class="col-6 col-lg-4">
                                  <label class="w-100">
                                      <div class="apt_sib_self">
                                           Swimming Pool
                                      </div>
                                      <input type="checkbox" id="swpool" name="options[]" wire:model="options" value="swiming pool">
                                  </label>
                                 </div>
                                 <div class="col-6 col-lg-4">
                                   <label class="w-100">
                                      <div class="apt_sib_self">
                                           Hot Tub
                                      </div>
                                      <input type="checkbox" id="hottub" name="options[]" wire:model="options" value="hot tub">
                                   </label>
                                 </div>
                                 <div class="col-6 col-lg-4">
                                  <label class="w-100">
                                      <div class="apt_sib_self">
                                           Gym
                                      </div>
                                      <input type="checkbox" id="gym" name="options[]" wire:model="options" value="gym">
                                  </label>
                                 </div>
                                 <div class="col-6 col-lg-4">
                                      <div class="apt_sib_self">
                                           <span style="font-size: 20px;">+</span>
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
                      <a href="/agent/newlisting/step2-1">
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