<div>

   <main>
     <div class="container mb-5">
       <div class="row">
            <div class="col-sm-1"></div>
              <div class="col-sm-10 add-listing-ctn">
                 <form wire:submit.prevent='Addproperty'>
                   <div class="mb-5 text-end pb-3">
                       <a href="/listing" class="se-btn">Save Changes</a>
                 </div>
 
                 <div wire:ignore class="tab" style="display: block">
                  <div class="row">
                     <div class="col-md-1 col-lg-2"></div>
                     <div class="col-sm-12 col-md-10 col-lg-8">
                          <h3 class="dsb-title-header"><strong>Add at least 5 photos of
                                    your house</strong></h3>
                          <div class="row mt-3">
                               <div class="col-sm-12">
                                    <input type="file" wire:model="photo" class="dropify" data-height="300"
                                         data-allowed-file-extensions="jpg jpeg png gif"
                                         accept="image/*" multiple>
                               </div>
                          </div>
                     </div>
                     <div class="col-md-1 col-lg-2"></div>
                </div>
           </div>

         @if($photo)
           <div class="tab mt-5" style="display: block">
            <div class="row h-100">
                 <div class="col-md-1 col-lg-2"></div>
                 <div class="col-sm-12 col-md-10 col-lg-8">
                      <div class="row">
                           <div
                                class="col-12 d-flex align-items-center flex-column justify-content-center h100 text-center">
                                <p class="text-dark w-50 text-center">We are magically
                                     arranging your photos to show off your space</p>
                                <small class="text-muted"> {{count($photo)}} uploaded</small>
                                <p class="text-center mt-3">
                                     <i class="fa fa-spin fa-spinner"></i>
                                </p>
                           </div>
                      </div>
                 </div>
                 <div class="col-md-1 col-lg-2"></div>
            </div>
       </div>

       <div class="tab" style="display: block">
            <div class="row">
                 <div class="col-12">
                      <h3 class="dsb-title-header"><strong>Ta-da! How does this
                                look!</strong></h3>
                      <small class="text-muted"><b>Drag to rearrange</b></small>
                      <div class="row mt-3 sortable">
                           <!--preview photos-->
                           @foreach ($photo as $photos)
                              <div class="col-md-6 col-lg-4 mb-3 card-draggable">
                                 <img src="{{ $photos->temporaryUrl() }}"
                                    class="img-fluid rounded" alt="">
                              </div>
                           @endforeach
                           <div class="col-md-6 col-lg-4 mb-3">
                                <div class="anpte_ctn rounded">
                                     +
                                </div>
                           </div>
                      </div>
                 </div>
            </div>
       </div>
       @endif

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