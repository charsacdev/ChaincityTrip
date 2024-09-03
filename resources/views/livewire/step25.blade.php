<div>

    <main wire:ignore>
      <div class="container mb-5">
        <div class="row">
             <div class="col-sm-1"></div>
               <div class="col-sm-10 add-listing-ctn">
                  <form wire:submit.prevent='step2_5'>
                    <div class="mb-5 text-end pb-3">
                        <a href="/listing" class="se-btn">Save Changes</a>
                  </div>
  
                  <div class="tab" style="display: block">
                    <div class="row">
                        <div class="col-md-1 col-lg-2"></div>
                        <div class="col-sm-12 col-md-10 col-lg-8">
                             <h3 class="dsb-title-header"><strong>Next, let's describe your
                                       house</strong></h3>
                             <small>Choose up to 2 highlights. We'll use these to get your
                                  description started.</small>
                             <div class="row mt-5">

                                
                                  <div class="col-6 col-lg-4">
                                     <label class="w-100">
                                       <div class="apt_sib_self">
                                           Peaceful
                                         </div>
                                         <input type="checkbox" id="peaceful" name="options[]" wire:model="options" value="peaceful">
                                     </label>
                                  </div>

                                  <div class="col-6 col-lg-4">
                                       
                                        <label class="w-100">
                                          <div class="apt_sib_self">
                                            Unique
                                          </div>
                                            <input type="checkbox" id="unique" name="options[]" wire:model="options" value="unique">
                                        </label>
                                  </div>
                                  <div class="col-6 col-lg-4">
                                    <label class="w-100">
                                       <div class="apt_sib_self">
                                            Stylish
                                          </div>
                                            <input type="checkbox" id="stylish" name="options[]" wire:model="options" value="stylish">
                                       
                                      </label>
                                  </div>
                                  <div class="col-6 col-lg-4">
                                    <label class="w-100">
                                       <div class="apt_sib_self">
                                            Family-friendly
                                          </div>
                                            <input type="checkbox" id="fam" name="options[]" wire:model="options" value="family friendly">
                                       
                                      </label>
                                  </div>
                                  <div class="col-6 col-lg-4">
                                    <label class="w-100">
                                        <div class="apt_sib_self">
                                            Spacious
                                          </div>
                                              <input type="checkbox" id="spacious" name="options[]" wire:model="options" value="spacious">
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
                        <a href="/agent/newlisting/step2-4">
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