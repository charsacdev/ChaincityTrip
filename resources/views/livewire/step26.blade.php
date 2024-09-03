<div>

    <main wire:ignore>
      <div class="container mb-5">
        <div class="row">
             <div class="col-sm-1"></div>
               <div class="col-sm-10 add-listing-ctn">
                  <form wire:submit.prevent='step2_6'>
                    <div class="mb-5 text-end pb-3">
                        <a href="/listing" class="se-btn">Save Changes</a>
                  </div>
  
                  <div class="tab" style="display: block">
                        <div class="row">
                             <div class="col-md-1 col-lg-2"></div>
                             <div class="col-sm-12 col-md-10 col-lg-8">
                                  <h3 class="dsb-title-header"><strong>Create your
                                            description</strong></h3>
                                  <div class="row mt-3">
                                       <div class="col-sm-12">
                                            <small>Share what makes your place special.</small>
                                            <div class="d-flex flex-column">
                                                 <div class="form-group mt-4">
                                                      <textarea type="text" name="title" wire:model='description'
                                                           class="form-control description-field"
                                                           style="height: 200px;"
                                                           placeholder="Description"></textarea>
                                                 </div>
                                                 <div><small class="word-count">0/500</small></div>
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
                        <a href="/agent/newlisting/step2-5">
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