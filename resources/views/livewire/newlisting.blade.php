<div>
{{-- @if(request()->segment(count(request()->segments()))==="step2-3")--}}


<!--redirect user to last process-->
@if(session('links'))
  <script>
       let linkUrl = @json(session('links'));
       window.location=linkUrl;
    </script>
@endif

<main>
  <div class="container mb-5">
    <div class="row">
         <div class="col-sm-1"></div>
           <div class="col-sm-10 add-listing-ctn">
              <form>
                   <div class="tabs mb-5 mt-3 pb-3">
                        <div class="mb-5 text-end pb-3">
                             <a href="/listing" class="se-btn">Save Changes</a>
                        </div>
                        <div class="tab">
                          <div class="row align-items-center justify-content-center">
                               <div class="col-md-6 mb-3 pr-5">
                                    <h1 class="dsb-header">It's easy to get started in </h1>
                                    <h1 class="dsb-header-md text-primary">ChainCity</h1>
                               </div>
                               <div class="col-md-6 mb-3">
                                    <div class="d-flex align-items-end justify-content-start">
                                         <div
                                              class="d-flex align-items-start justify-content-start gap-1">
                                              <h6><b>1.</b></h6>
                                              <div>
                                                   <h6><b>Tell us about your place</b></h6>
                                                   <small>Share some basic info, like where it is and
                                                        how many guest can stay.</small>
                                              </div>
                                         </div>
                                         <img src="{{asset('asset/img/solar2.png')}}" width="80px" alt="">
                                    </div>
                                    <hr>
                                    <div class="d-flex align-items-end justify-content-start">
                                         <div
                                              class="d-flex align-items-start justify-content-start gap-1">
                                              <h6><b>2.</b></h6>
                                              <div>
                                                   <h6><b>Make it stand out</b></h6>
                                                   <small>Add 5 or more photos plus a title and
                                                        description -- we'll help you out.</small>
                                              </div>
                                         </div>
                                         <img src="{{asset('asset/img/snowball2.png')}}" width="50px" alt="">
                                    </div>
                                    <hr>
                                    <div class="d-flex align-items-end justify-content-start">
                                         <div
                                              class="d-flex align-items-start justify-content-start gap-1">
                                              <h6><b>3.</b></h6>
                                              <div>
                                                   <h6><b>Finish Up and Publish</b></h6>
                                                   <small>Choose if you'd like to start with
                                                        experienced guest, set a starting price and
                                                        publish your listing.</small>
                                              </div>
                                         </div>
                                         <img src="{{asset('asset/img/house3.png')}}" width="90px" alt="">
                                    </div>
                                    <hr>
                               </div>
                          </div>
                     </div>
                    <!--button control-->
                    <div class="row mb-4 mt-4">
                      <div class="col-12">
                           <div class="d-flex align-items-center justify-content-between">
                                <button type="button"
                                     class="rlf-btn rlf-btn-outline tab_previous"><i
                                          class="fa fa-arrow-left"></i>&nbsp; Back</button>
                                
                                <a href="/agent/newlisting/getstarted">
                                  <button type="button" class="rlf-btn rlf-btn-primary   tab_next">Get Started</button>
                                </a>
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
