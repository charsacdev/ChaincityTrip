<div>

  <main wire:ignore>
    <div class="container mb-5">
      <div class="row">
           <div class="col-sm-1"></div>
             <div class="col-sm-10 add-listing-ctn">
                <form wire:submit.prevent='step2_4'>
                  <div class="mb-5 text-end pb-3">
                      <a href="/listing" class="se-btn">Save Changes</a>
                </div>

                <div class="tab" style="display: block">
                <div class="row">
                    <div class="col-md-1 col-lg-2"></div>
                    <div class="col-sm-12 col-md-10 col-lg-8">
                          <h3 class="dsb-title-header"><strong>Now, let's give your house a
                                    title</strong></h3>
                          <div class="row mt-3">
                              <div class="col-sm-12">
                                    <small>Short titles work best. Have fun with it—you can
                                        always change it later.</small>
                                    <div class="row d-flex flex-column">
                                        <div class="form-group mt-4">
                                              <input type="text" name="title" wire:model="title" required
                                                  class="form-control title-field"
                                                  style="height: 100px;"
                                                  placeholder="Title" />
                                        </div>
                                        <div><small class="word-count">0/30</small></div>
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