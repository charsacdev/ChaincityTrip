<div>
  <main>
    <div class="container payments mb-5">
         <div class="row">
              <div class="col-sm-12 mt-3">
                   <h2 class="dsb-header">Payment History</h2>
              </div>

              <!-- Nav tabs -->
              <div class="custom-tab mt-5">
                   
                   <ul class="nav nav-tabs">
                        <li class="nav-item">
                             <a class="nav-link active" data-bs-toggle="tab" href="#all"></i> All</a>
                        </li>
                        <li class="nav-item">
                             <a class="nav-link" data-bs-toggle="tab" href="#successful"> Successful</a>
                        </li>
                        <li class="nav-item">
                             <a class="nav-link" data-bs-toggle="tab" href="#pending"> Pending</a>
                        </li>
                        <li class="nav-item">
                             <a class="nav-link" data-bs-toggle="tab" href="#rejected"> Rejected</a>
                        </li>
                        <li class="nav-item">
                             <a class="nav-link" data-bs-toggle="tab" href="#nopayment"> No payment template</a>
                        </li>
                   </ul>
                   <div class="tab-content mb-5">
                        <div class="tab-pane fade show active" id="all" role="tabpanel">
                             <div class="table-responsive">
                                  <table id="example4" class="display" style="min-width: 845px; border: 0;">
                                       <thead style="border: 0;">
                                            <tr class="th_tpc" style="border: 0;">
                                                 <th>Name</th>
                                                 <th>Transaction ID</th>
                                                 <th>Amount</th>
                                                 <th>Payment Method</th>
                                                 <th>Date</th>
                                                 <th>Status</th>
                                            </tr>
                                       </thead>
                              <tbody>
                         @foreach ($paymentAll as $item)
                               <tr>
                                   <td>
                                        <div
                                             class="d-flex align-items-center justify-content-start gap-2">
                                             <div
                                                  class="custom-control custom-checkbox ms-2 d-inline">
                                                  <input type="checkbox"
                                                       class="custom-control-input"
                                                       id="customCheckBox2" required="">
                                                  <label class="custom-control-label"
                                                       for="customCheckBox2"></label>
                                             </div>
                                             <div class="apt_nit">
                                                  <span>
                                                       {{substr(auth()->user()->first_name, 0, 1)}}
                                                  </span>
                                             </div>
                                             <div class="apt_ful">
                                                  <span> {{auth()->user()->first_name}} {{auth()->user()->last_name}}</span>
                                                  <small class="text-muted">By {{auth()->user()->first_name}} {{auth()->user()->last_name}}</small>
                                             </div>
                                        </div>
                                   </td>
                                   <td>{{$item->payment_id}}</td>
                                   <td>${{number_format($item->amount)}}</td>
                                   <td>
                                        <span class="custom-badge custom-badge-primary">Crypto</span>
                                   </td>
                                   <td>{{ \Carbon\Carbon::parse($item->created_at)->format('Y-M-d') }} | {{ \Carbon\Carbon::parse($item->created_at)->format('H:i:a') }}</td>
                                   <td>
                                        @if($item->transaction_status=="completed")
                                          <span class="custom-badge custom-badge-success fw-bold">Successful</span>
                                        @elseif($item->transaction_status=="pending")
                                          <span class="custom-badge custom-badge-warning fw-bold">Pending</span>
                                        @elseif($item->transaction_status=="cancelled")
                                          <span class="custom-badge custom-badge-danger fw-bold">Rejected</span>
                                        @endif
                                   </td>
                              </tr>
                              @endforeach
                         </tbody>
                     </table>
                    </div>
               </div>

               <!--successfull payment-->
               <div class="tab-pane fade show" id="successful" role="tabpanel">
                    <div class="table-responsive">
                         <table id="example4" class="display" style="min-width: 845px; border: 0;">
                              <thead style="border: 0;">
                                   <tr class="th_tpc" style="border: 0;">
                                        <th>Name</th>
                                        <th>Transaction ID</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                   </tr>
                              </thead>
                     <tbody>
                 @foreach($completed as $item)
                      <tr>
                          <td>
                               <div
                                    class="d-flex align-items-center justify-content-start gap-2">
                                    <div
                                         class="custom-control custom-checkbox ms-2 d-inline">
                                         <input type="checkbox"
                                              class="custom-control-input"
                                              id="customCheckBox2" required="">
                                         <label class="custom-control-label"
                                              for="customCheckBox2"></label>
                                    </div>
                                    <div class="apt_nit">
                                         <span>
                                              {{substr(auth()->user()->first_name, 0, 1)}}
                                         </span>
                                    </div>
                                    <div class="apt_ful">
                                         <span> {{auth()->user()->first_name}} {{auth()->user()->last_name}}</span>
                                         <small class="text-muted">By {{auth()->user()->first_name}} {{auth()->user()->last_name}}</small>
                                    </div>
                               </div>
                          </td>
                          <td>{{$item->payment_id}}</td>
                          <td>${{number_format($item->amount)}}</td>
                          <td>
                               <span class="custom-badge custom-badge-primary">Crypto</span>
                          </td>
                          <td>{{ \Carbon\Carbon::parse($item->created_at)->format('Y-M-d') }} | {{ \Carbon\Carbon::parse($item->created_at)->format('H:i:a') }}</td>
                          <td>
                               @if($item->transaction_status=="completed")
                                 <span class="custom-badge custom-badge-success fw-bold">Successful</span>
                               @elseif($item->transaction_status=="pending")
                                 <span class="custom-badge custom-badge-warning fw-bold">Pending</span>
                               @elseif($item->transaction_status=="cancelled")
                                 <span class="custom-badge custom-badge-danger fw-bold">Rejected</span>
                               @endif
                          </td>
                     </tr>
                     @endforeach
                </tbody>
            </table>
           </div>
          </div>
          
          <!--pending payments--->
          <div class="tab-pane fade show" id="pending" role="tabpanel">
               <div class="table-responsive">
                    <table id="example4" class="display" style="min-width: 845px; border: 0;">
                         <thead style="border: 0;">
                              <tr class="th_tpc" style="border: 0;">
                                   <th>Name</th>
                                   <th>Transaction ID</th>
                                   <th>Amount</th>
                                   <th>Payment Method</th>
                                   <th>Date</th>
                                   <th>Status</th>
                              </tr>
                         </thead>
                <tbody>
           @foreach($pending as $item)
                 <tr>
                     <td>
                          <div
                               class="d-flex align-items-center justify-content-start gap-2">
                               <div
                                    class="custom-control custom-checkbox ms-2 d-inline">
                                    <input type="checkbox"
                                         class="custom-control-input"
                                         id="customCheckBox2" required="">
                                    <label class="custom-control-label"
                                         for="customCheckBox2"></label>
                               </div>
                               <div class="apt_nit">
                                    <span>
                                         {{substr(auth()->user()->first_name, 0, 1)}}
                                    </span>
                               </div>
                               <div class="apt_ful">
                                    <span> {{auth()->user()->first_name}} {{auth()->user()->last_name}}</span>
                                    <small class="text-muted">By {{auth()->user()->first_name}} {{auth()->user()->last_name}}</small>
                               </div>
                          </div>
                     </td>
                     <td>{{$item->payment_id}}</td>
                     <td>${{number_format($item->amount)}}</td>
                     <td>
                          <span class="custom-badge custom-badge-primary">Crypto</span>
                     </td>
                     <td>{{ \Carbon\Carbon::parse($item->created_at)->format('Y-M-d') }} | {{ \Carbon\Carbon::parse($item->created_at)->format('H:i:a') }}</td>
                     <td>
                          @if($item->transaction_status=="completed")
                            <span class="custom-badge custom-badge-success fw-bold">Successful</span>
                          @elseif($item->transaction_status=="pending")
                            <span class="custom-badge custom-badge-warning fw-bold">Pending</span>
                          @elseif($item->transaction_status=="cancelled")
                            <span class="custom-badge custom-badge-danger fw-bold">Rejected</span>
                          @endif
                     </td>
                </tr>
                @endforeach
           </tbody>
       </table>
      </div>
     </div>

     <!--rejected payments--->
     <div class="tab-pane fade show" id="rejected" role="tabpanel">
          <div class="table-responsive">
               <table id="example4" class="display" style="min-width: 845px; border: 0;">
                    <thead style="border: 0;">
                         <tr class="th_tpc" style="border: 0;">
                              <th>Name</th>
                              <th>Transaction ID</th>
                              <th>Amount</th>
                              <th>Payment Method</th>
                              <th>Date</th>
                              <th>Status</th>
                         </tr>
                    </thead>
           <tbody>
      @foreach($cancelled as $item)
            <tr>
                <td>
                     <div
                          class="d-flex align-items-center justify-content-start gap-2">
                          <div
                               class="custom-control custom-checkbox ms-2 d-inline">
                               <input type="checkbox"
                                    class="custom-control-input"
                                    id="customCheckBox2" required="">
                               <label class="custom-control-label"
                                    for="customCheckBox2"></label>
                          </div>
                          <div class="apt_nit">
                               <span>
                                    {{substr(auth()->user()->first_name, 0, 1)}}
                               </span>
                          </div>
                          <div class="apt_ful">
                               <span> {{auth()->user()->first_name}} {{auth()->user()->last_name}}</span>
                               <small class="text-muted">By {{auth()->user()->first_name}} {{auth()->user()->last_name}}</small>
                          </div>
                     </div>
                </td>
                <td>{{$item->payment_id}}</td>
                <td>${{number_format($item->amount)}}</td>
                <td>
                     <span class="custom-badge custom-badge-primary">Crypto</span>
                </td>
                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('Y-M-d') }} | {{ \Carbon\Carbon::parse($item->created_at)->format('H:i:a') }}</td>
                <td>
                     @if($item->transaction_status=="completed")
                       <span class="custom-badge custom-badge-success fw-bold">Successful</span>
                     @elseif($item->transaction_status=="pending")
                       <span class="custom-badge custom-badge-warning fw-bold">Pending</span>
                     @elseif($item->transaction_status=="cancelled")
                       <span class="custom-badge custom-badge-danger fw-bold">Rejected</span>
                     @endif
                </td>
           </tr>
           @endforeach
      </tbody>
  </table>
 </div>
</div>

          <div class="tab-pane fade show" id="nopayment" role="tabpanel">
               <div class="d-flex align-items-center justify-content-center">
                    <div class="nr_ctn">
                         <div class="img">
                              <img src="../asset/img/homeabout.png" class="img-fluid" alt="">
                         </div>
                         <p>You don't have any payment history.</p>
                    </div>
               </div>
                  </div>
                   </div>
              </div>
         </div>
    </div>
 </main>
</div>