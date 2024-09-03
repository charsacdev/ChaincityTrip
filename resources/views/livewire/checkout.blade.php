<div>
  <main>
    <div class="container">
      <div class="row ckout-bg" style="background: url('../asset/img/payhighlight.png');" >
           <div class="col-sm-12 my-4 mb-5">
                <a href="/dashboard" class="text-muted"><i class="fa fa-arrow-left"></i> Back</a>
           </div>
           <div class="col-lg-6 mb-5">
                <div class="ckot ckot-l">
                     <h3 class="dsb-header-sm">Checkout</h3>
                     <p class="mt-2 mb-5">Listing(s) you are about to make payment for</p>

                      <!--session message-->
                         <div>
                              @if(session('success'))
                                   <div class="alert alert-success mt-3" role="alert">
                                   {{session('success')}}
                                   </div>
                              @elseif(session('error'))
                                   <div class="alert alert-danger mt-3" role="alert">
                                   {{session('error')}}
                                   </div>
                              @endif
                         </div>
                     @foreach($allsavedlisting as $listing) 
                       @if($listing->property)
                          <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center justify-content-start gap-3">
                                    <img src="../asset/img/verify.png" width="20" alt="">
                                    <p class="m-0 p-0 text-muted">
                                        {{$listing->property->property_title}}
                                     
                                   </p>
                                </div>
                                <div class="d-flex align-items-center justify-content-start gap-3">
                                   <h3 class="dsb-header-xs m-0 p-0">${{number_format($listing->saved_description['payable'])}}</h3>
                                   <button class="dropdown-item" type="button" wire:click="SavedListingDelete({{$listing->id}})">
                                        <i class="fa fa-trash text-danger fw-bold"></i>
                                   </button>
                                </div>
                            </div>
                          @endif
                      @endforeach
                     
                    
                     <div class="text-end mt-5 d-none">
                         <a href="/savedlisting">
                          <button class="rlf-btn rlf-btn-primary">Review listings</button>
                         </a>
                     </div>
                </div>
           </div>
           <div class="col-lg-6 mb-5">
                <div class="ckot ckot-r">
                     <h3 class="dsb-header-sm">Choose payment method</h3>
                     <div>
                         @if(session('success'))
                               <div class="alert alert-success mt-3" role="alert">
                               {{session('success')}}
                               </div>
                         @elseif(session('error'))
                               <div class="alert alert-danger mt-3" role="alert">
                               {{session('error')}}
                               </div>
                           @endif
                    </div>
                     <div class="my-5">
                          <img src="../asset/img/crypto-img.png" width="180px">
                     </div>
                     <!--coinbase payment-->
                     <form action="{{route('checkount.coinbase')}}" method="POST">
                       @csrf
                          <div class="form-group mb-3 d-none">
                               <label for="">Select Crypto</label>
                               <select name="crypto" class="form-control">
                                    <option value="">Select</option>
                               </select>
                          </div>
                          <div class="form-group mb-3">
                             <h3 class="fw-bold text-center">${{number_format($total)}}</h3>
                         </div>
                          <div class="form-group mb-3">
                            <p class="text-muted">Please <span class="fw-bold text-primary">Once you click on make payment you will be redirected to coinbase</span>. Sending other tokens to the address can result to permanet loose.</p>
                               <!--hidden field-->
                               <input type="hidden" value="{{auth()->user()->id}}" name="userid">
                               <input type="hidden" value="{{$total}}" name="amount">
                          </div>
                          <button class="rlf-btn rlf-btn-primary w-100 mt-3">Make Payment</button>
                     </form>
                </div>
           </div>
      </div>
    </div>
 </main>
 
</div>
