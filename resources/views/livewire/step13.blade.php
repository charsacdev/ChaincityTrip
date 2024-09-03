<div>

    <main>
      <div class="container mb-5">
        <div class="row">
             <div class="col-sm-1"></div>
               <div class="col-sm-10 add-listing-ctn">
                  <form wire:submit.prevent='step1_3'>
                    <div class="tabs mb-5 mt-3 pb-3" style="display:block">
                        <div class="mb-5 text-end pb-3">
                              <a href="/listing" class="se-btn">Save Changes</a>
                        </div>

                     <div class="tab" style="display:block">
                       <div class="row">
                            <div class="col-md-1 col-lg-2"></div>
                            <div class="col-sm-12 col-md-10 col-lg-8">
                                <h3 class="dsb-title-header"><strong>Where is your place
                                        located?</strong></h3>
                                <div class="row mt-3 mb-5">
                                    <div class="col-12">
                                        <div class="map">
                                                <div class="input-group mb-3 p-1">
                                                    <span class="input-group-text"
                                                        id="basic-addon1">
                                                        <i class="fa fa-map"></i>
                                                    </span>
                                                 <input type="text"
                                                        wire:model="search" wire:keydown="SearchLocation"
                                                        class="form-control shadow-none"
                                                        placeholder="Enter Address"
                                                        aria-label="Username"
                                                        aria-describedby="basic-addon1">

                                                        <!--search list-->
                                                        @if($search and $searchresult)
                                                            <div wire:ignore.self style="width:100%;border:1px solid gray;background-color:#ffff">
                                                                <ul class="p-0" style="list-style:none;text-align:left">
                                                                    @foreach($searchresult as $location)
                                                                        <li wire:click="PlaceLocation('{{$location['Place']['Geometry']['Point'][0]}}','{{$location['Place']['Geometry']['Point'][1]}}','{{ $location['Place']['Label']}}','{{ $location['Place']['Country']}}')" class="p-2" style="border-bottom:1px solid gray">{{ $location['Place']['Label']}}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            @endif
                                                        
                                                       </div>
                                                <iframe width="100%" height="100%" src="https://www.openstreetmap.org/export/embed.html?bbox=-32.03613281250001%2C33.211116472416855%2C17.006835937500004%2C51.998410382390325&amp;layer=mapnik" style="border: 0px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/#map=5/43.325/-7.515">View Larger Map</a></small>
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
                      <a href="/agent/newlisting/step1-2">
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