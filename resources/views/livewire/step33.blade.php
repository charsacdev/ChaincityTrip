<div>

    <main wire:ignore>
      <div class="container mb-5">
        <div class="row">
             <div class="col-sm-1"></div>
               <div class="col-sm-10 add-listing-ctn">
                  <form wire:submit.prevent='step3_3'>
                    <div class="mb-5 text-end pb-3">
                        <a href="/listing" class="se-btn">Save Changes</a>
                  </div>
                  <div class="tab" style="display: block">
                        <div class="row">
                             <div class="col-md-1 col-lg-2"></div>
                             <div class="col-sm-12 col-md-10 col-lg-8">
                                  <h3 class="dsb-header"><strong>It is time to set your
                                            price</strong></h3>
                                  <small>You can change your price anytime</small>
                                  <div class="row mt-5">
                                       <div class="col-12">
                                            <input type="text" class="form-control lst_prc"
                                                 name="price" placeholder="$65" wire:model="price">
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
                        <a href="/agent/newlisting/step3-2">
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