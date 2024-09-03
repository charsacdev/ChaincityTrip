<div>

    <main wire:ignore>
      <div class="container mb-5">
        <div class="row">
             <div class="col-sm-1"></div>
               <div class="col-sm-10 add-listing-ctn">
                  <form wire:submit.prevent='step3_5'>
                    <div class="mb-5 text-end pb-3">
                        <a href="/listing" class="se-btn">Save Changes</a>
                  </div>
                  <div class="tab" style="display: block">
                        <div class="row">
                             <div class="col-md-1 col-lg-2"></div>
                             <div class="col-sm-12 col-md-10 col-lg-8">
                                  <h3 class="dsb-title-header"><strong>Almost there, one last step
                                            to go!</strong></h3>
                                  <div class="row mt-5">
                                       <div class="col-12">
                                            <h6><b>How are you hosting in ChainCity?</b></h6>
                                            <label class="d-flex align-items-center justify-content-between mt-3">
                                                 <div>
                                                      <small>Hosting as a private
                                                           individual</small>
                                                 </div>
                                                 <input type="checkbox" value="private housing" wire:model="hosting" class="ckb_discount" style="display: block">
                                            </label>
                                            <label class="d-flex align-items-center justify-content-between mt-3">
                                                 <div>
                                                      <small>Hosting as a business</small>
                                                 </div>
                                                 <input type="checkbox" value="business housing" wire:model="hosting" class="ckb_discount" style="display: block">
                                            </label>
                                            <hr>
                                            <h6><b>Does your place have any of these?</b></h6>
                                            <label class="d-flex align-items-center justify-content-between mt-3">
                                                 <div>
                                                      <small>Security Camera(s)</small>
                                                 </div>
                                                 <input type="checkbox" value="security cameras" wire:model="extra" class="ckb_discount" style="display: block">
                                            </label>
                                            <label class="d-flex align-items-center justify-content-between mt-3">
                                                 <div>
                                                      <small>Weapons</small>
                                                 </div>
                                                 <input type="checkbox"value="weapons" wire:model="extra" class="ckb_discount" style="display: block">
                                            </label>
                                            <label class="d-flex align-items-center justify-content-between mt-3">
                                                 <div>
                                                      <small>Dangerous animals</small>
                                                 </div>
                                                 <input type="checkbox" value="dangerous animals" wire:model="extra" class="ckb_discount" style="display: block">
                                            </label>
                                            <hr>
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
                        <a href="/agent/newlisting/step3-4">
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