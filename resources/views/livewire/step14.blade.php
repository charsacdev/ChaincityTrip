<div>

    <main>
      <div class="container mb-5">
        <div class="row">
             <div class="col-sm-1"></div>
               <div class="col-sm-10 add-listing-ctn">
                  <form wire:submit.prevent='step1_4'>
                    <div class="mb-5 text-end pb-3">
                        <a href="/listing" class="se-btn">Save Changes</a>
                  </div>
                    <div class="tab" style="display:block">
                        <div class="row">
                    <div class="col-md-1 col-lg-2"></div>
                    <div class="col-sm-12 col-md-10 col-lg-8">
                        <h3 class="dsb-title-header"><strong>Share some basics about your
                                place</strong></h3>
                    <div class="row mt-4 mb-5">
                        <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between mt-1">
                                <div><small>Guests</small></div>
                                <div
                                    class="d-flex align-items-center justify-content-center gap-2">
                                    <button type="button" class="btn-counter" wire:click='guestDecrease'>-</button>
                                    <span class="counterValue">
                                    <input type="text" size="1" wire:model="guest_number" class="counterValue shadow-none border-0 text-center">
                                    </span>
                                    <button type="button" class="btn-counter" wire:click='guestIncrease'>+</button>
                                    <!--hidden fields-->
                                    <input type="hidden" value="guest" wire:model="guest">
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                    <div><small>Bedrooms</small></div>
                                        <div class="d-flex align-items-center justify-content-center gap-2">
                                        <button type="button" class="btn-counter" wire:click='bedroomDecrease'>-</button>
                                        <span class="counterValue">
                                            <input type="text" size="1" value="1" wire:model="bedroom_number" class="counterValue shadow-none border-0 text-center">
                                        </span>
                                        <button type="button" class="btn-counter" wire:click='bedroomIncrease'>+</button>
                                        <!--hidden fields-->
                                        <input type="hidden" value="bedroom" wire:model="bedroom">
                                        <input type="hidden" value="1" wire:model="bedroom_number" class="counterValue">
                                    </div>
                            </div>
                            <hr>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                    <div><small>Beds</small></div>
                                    <div
                                        class="d-flex align-items-center justify-content-center gap-2">
                                        <button type="button" class="btn-counter" wire:click='bedsDecrease'>-</button>
                                        <span class="counterValue">
                                        <input type="text" size="1" value="1" wire:model="beds_number" class="counterValue shadow-none border-0 text-center">
                                        </span>
                                        <button type="button" class="btn-counter" wire:click='bedsIncrease'>+</button>
                                        <!--hidden fields-->
                                        <input type="hidden" value="beds" wire:model="beds">
                                        <input type="hidden" value="1" wire:model="beds_number" class="counterValue">
                                    </div>
                            </div>
                            <hr>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                    <div><small>Bathrooms</small></div>
                                    <div
                                        class="d-flex align-items-center justify-content-center gap-2">
                                        <button type="button" class="btn-counter" wire:click='bathDecrease'>-</button>
                                        <span class="counterValue">
                                         <input type="text" size="1" value="1" wire:model="bath_number" class="counterValue shadow-none border-0 text-center">
                                        </span>
                                        <button type="button" class="btn-counter" wire:click='bathIncrease'>+</button>
                                        <!--hidden fields-->
                                        <input type="hidden" value="bath" wire:model="bath">
                                        <input type="hidden" value="1" wire:model="bath_number" class="counterValue">
                                    </div>
                            </div>
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
                            <a href="agent/newlisting/step1-3">
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