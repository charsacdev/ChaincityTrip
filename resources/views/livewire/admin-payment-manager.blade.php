<div>
    
    <div class="container payments mb-5 px-3">
        <div class="row">
             <div class="col-sm-12">
             </div>

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
             
        <!-- Nav tabs -->
        <div class="custom-tab mt-5" wire:ignore> 
            <div class="tab-container">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#all"></i> All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#completed">Completed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#pending">Pending</a>
                    </li>
                </ul>
            </div>


           <!--all transaction-->
            <div class="tab-content mb-5">
                <div class="tab-pane fade show active" id="all" role="tabpanel">
                    <div class="table-responsive">
                            <table id="example4" class="display" style="min-width: 845px; border: 0;">
                                <thead style="border: 0;">
                                <tr class="th_tpc" style="border: 0;white-space:nowrap">
                                    <th>User Details</th>
                                    <th>Transaction ID</th>
                                    <th>Payment ID</th>
                                    <th>Amount</th>
                                    <th>Transaction Status</th>
                                    <th>Transaction Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                            <!--all listing-->
                            @foreach ($paymentAll as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-start gap-2">
                                            <div class="custom-control custom-checkbox ms-2 d-inline">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                                <label class="custom-control-label" for="customCheckBox2"></label>
                                            </div>
                                            <div class="apt_nit">
                                                <span>
                                                    <img src="{{asset('asset/home.png')}}" class="img-fluid">
                                                </span>
                                            </div>
                                            <div class="apt_ful">
                                                <span>{{ucwords($item->user->first_name)}}&nbsp;{{ucwords($item->user->last_name)}}</span>
                                                <small class="text-muted">{{ucwords($item->user->email)}}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td align="center">{{$item->transaction_id}}</td>
                                    <td align="center">{{$item->payment_id}}</td>
                                    <td align="center">${{number_format($item->amount)}}</td>
                                    <td align="center">
                                        @if($item->transaction_status=="completed")
                                         <p class="text-success fw-bold">{{$item->transaction_status}}</p>
                                        @else
                                          <p class="text-danger fw-bold">{{$item->transaction_status}}</p>
                                        @endif
                                    </td>
                                    <td align="center">{{$item->created_at}}</td>
                                    <td align="center">
                                        <i class="bi bi-three-dots-vertical dropdown-toggle" style="cursor:pointer" data-bs-toggle="dropdown"></i>
                                        <ul class="dropdown-menu dropdown-menu-end drop-action">
                                            <li><button class="dropdown-item" type="button" wire:click="ApproveTxn({{$item->id}})">Completed</button></li>
                                            <li><button class="dropdown-item" type="button" wire:click="DeclineTxn({{$item->id}})">Pending</button></li>
                                        </ul>  
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
               </div>
            </div>
    

                <!---Completed Payment--->
                <div class="tab-pane fade show" id="completed" role="tabpanel">
                    <div class="table-responsive">
                            <table id="example4" class="display" style="min-width: 845px; border: 0;">
                                <thead style="border: 0;">
                                <tr class="th_tpc" style="border: 0;white-space:nowrap">
                                    <th>User Details</th>
                                    <th>Transaction ID</th>
                                    <th>Payment ID</th>
                                    <th>Amount</th>
                                    <th>Transaction Status</th>
                                    <th>Transaction Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                            <!--all listing-->
                            @foreach ($completed as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-start gap-2">
                                            <div class="custom-control custom-checkbox ms-2 d-inline">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                                <label class="custom-control-label" for="customCheckBox2"></label>
                                            </div>
                                            <div class="apt_nit">
                                                <span>
                                                    <img src="{{asset('asset/home.png')}}" class="img-fluid">
                                                </span>
                                            </div>
                                            <div class="apt_ful">
                                                <span>{{ucwords($item->user->first_name)}}&nbsp;{{ucwords($item->user->last_name)}}</span>
                                                <small class="text-muted">{{ucwords($item->user->email)}}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td align="center">{{$item->transaction_id}}</td>
                                    <td align="center">{{$item->payment_id}}</td>
                                    <td align="center">${{number_format($item->amount)}}</td>
                                    <td align="center">
                                        @if($item->transaction_status=="completed")
                                         <p class="text-success fw-bold">{{$item->transaction_status}}</p>
                                        @else
                                          <p class="text-danger fw-bold">{{$item->transaction_status}}</p>
                                        @endif
                                    </td>
                                    <td align="center">{{$item->created_at}}</td>
                                    <td align="center">
                                        <i class="bi bi-three-dots-vertical dropdown-toggle" style="cursor:pointer" data-bs-toggle="dropdown"></i>
                                        <ul class="dropdown-menu dropdown-menu-end drop-action">
                                            <li><button class="dropdown-item" type="button" wire:click="ApproveTxn({{$item->id}})">Completed</button></li>
                                            <li><button class="dropdown-item" type="button" wire:click="DeclineTxn({{$item->id}})">Pending</button></li>
                                        </ul>  
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
                </div>


                <!---Pending Payment--->
                <div class="tab-pane fade show" id="pending" role="tabpanel">
                    <div class="table-responsive">
                            <table id="example4" class="display" style="min-width: 845px; border: 0;">
                                <thead style="border: 0;">
                                <tr class="th_tpc" style="border: 0;white-space:nowrap">
                                    <th>User Details</th>
                                    <th>Transaction ID</th>
                                    <th>Payment ID</th>
                                    <th>Amount</th>
                                    <th>Transaction Status</th>
                                    <th>Transaction Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                            <!--all listing-->
                            @foreach ($pending as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-start gap-2">
                                            <div class="custom-control custom-checkbox ms-2 d-inline">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                                <label class="custom-control-label" for="customCheckBox2"></label>
                                            </div>
                                            <div class="apt_nit">
                                                <span>
                                                    <img src="{{asset('asset/home.png')}}" class="img-fluid">
                                                </span>
                                            </div>
                                            <div class="apt_ful">
                                                <span>{{ucwords($item->user->first_name)}}&nbsp;{{ucwords($item->user->last_name)}}</span>
                                                <small class="text-muted">{{ucwords($item->user->email)}}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td align="center">{{$item->transaction_id}}</td>
                                    <td align="center">{{$item->payment_id}}</td>
                                    <td align="center">${{number_format($item->amount)}}</td>
                                    <td align="center">
                                        @if($item->transaction_status=="completed")
                                         <p class="text-success fw-bold">{{$item->transaction_status}}</p>
                                        @else
                                          <p class="text-danger fw-bold">{{$item->transaction_status}}</p>
                                        @endif
                                    </td>
                                    <td align="center">{{$item->created_at}}</td>
                                    <td align="center">
                                        <i class="bi bi-three-dots-vertical dropdown-toggle" style="cursor:pointer" data-bs-toggle="dropdown"></i>
                                        <ul class="dropdown-menu dropdown-menu-end drop-action">
                                            <li><button class="dropdown-item" type="button" wire:click="ApproveTxn({{$item->id}})">Completed</button></li>
                                            <li><button class="dropdown-item" type="button" wire:click="DeclineTxn({{$item->id}})">Pending</button></li>
                                        </ul>  
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>

             </div>
        </div>

      </div>
   </div>

</div>
