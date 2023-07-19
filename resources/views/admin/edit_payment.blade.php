@extends('admin.layout.layout')

@section('mainsection')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container new-full-width container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                   
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxxl">
                <!--begin::Row-->
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <!--begin::Col-->
                    <div class="row-xl-9">
                        <!--begin::Products-->
                        <div class="card card-flush">
                            <!--begin::Card body-->
                            <div class="card-body">
                                <!--begin::Table-->
                                <form id="kt_modal_transporter" class="form" method="GET" action="{{route('get_transporter')}}">
                                <div class="row fv-row mb-1">
                                    <div class="col-md-2 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required"><b>Select Transoprter</b></span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                        <div class="col-md-8">
                                            <!--begin::Input-->
                                            @csrf
                                          
                                            <select class="form-select form-select-solid" name="transporter" id="transporter" data-control="select2" data-hide-search="false" data-placeholder="Select Transporter">
                                                <option></option>
                                                @foreach($transporter as $row)
                                                <option value="{{$row->sr_no}}">{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                    <div class="col-md-2">
                                        <button type="submit" id="transporter_submit" name="transporter_submit" class="btn btn-primary">
                                            <span class="indicator-label">View Transporters</span>
                                            <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                </div>
                                </form>
                                                                                         
                                <!--end::Table-->
                                <div class="d-flex d-none align-items-center position-relative my-1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Order" />
                                    
                                </div>
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Products-->
                    </div> 
                    
              
                
                
 
                <div class="col-xl-9">
                    <!--begin::Products-->
                    <div class="card card-flush">
                   
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_sales_table">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-800 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-70px">Receipt No.</th>
                                        <th class="min-w-70px">Date</th>                         
                                        <th class="min-w-70x">Debit</th>
                                        <th class="min-w-70px">Credit</th>
                                        <th class="min-w-70px">Remaining</th>
                                        <th class="min-w-70px">Payment</th>
                                        <th class="min-w-70px">Description</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-semibold text-gray-600">
                              
                                        @php
                                            
                                            $ticketdetails = getTicketdetails($id);
                                            $payment=getPayment($id);
                                            $j=0;$i=0;
                                        @endphp
                                
                                       
                                    @foreach($payment as $row)
                                        @if($ticketdetails[$j]->cdate <> $payment[$i]->date)
                                     
                                            @while($ticketdetails[$j]->cdate <= $payment[$i]->date )
                                     <tr>
                                        <td>{{$ticketdetails[$j]->ticket_no}}</td>
                                      
                                        <td>{{(new DateTime($ticketdetails[$j]->cdate))->format('d-m-Y')}}</td>

                                        <td>{{'₹'.$ticketdetails[$j]->charges}}</td>

                                        <td></td>

                                        <td></td>

                                        <td></td>
                                     
                                        <td>{{$ticketdetails[$j]->remark}}</td>
                                </tr> 
                                            @php $j++ ; @endphp
                                            @endwhile
                                        @else
                                   
                                  <!-- date wise ticket add thavi joie -->
                                       
                                    <tr>
                                        <td>{{$ticketdetails[$j]->ticket_no}}</td>
                                      
                                        <td>{{(new DateTime($ticketdetails[$j]->cdate))->format('d-m-Y')}}</td>

                                        <td>{{'₹'.$ticketdetails[$j]->charges}}</td>

                                        <td></td>

                                        <td></td>

                                        <td></td>
                                     
                                        <td>{{$ticketdetails[$j]->remark}}</td>
                                </tr> 
                                        @php $j++ ; @endphp
                                      
                                    @endif
                                <tr>
                                     
                                     <td><a href="{{route('edit_payment',$payment[$i]->sr_no)}}" data-typeId="{{$payment[$i]->sr_no}}" id="edit" >{{$payment[$i]->receipt_no}}</a></td>

                                     <td data-kt-ecommerce-order-filter="order_id">{{(new DateTime($payment[$i]->date))->format('d-m-Y')}}</td>

                                     <td>{{$payment[$i]->receipt_no}}</td>

                                     <td>{{'₹'. $payment[$i]->amount}}</td>

                                     <td>{{'₹'.$payment[$i]->debit - ($payment[$i]->credit + $payment[$i]->amount) }}</td>

                                     <td>{{ $payment[$i]->payment_mode}}</td>
                                  
                                     <td>{{$payment[$i]->remark}}</td>

                                </tr>
                            
                                        @php  $lastpayment=$payment[$i]->date; $i++; @endphp
                                    @endforeach
                         
                                   

                              
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                   
                    </div>
                    <!--end::Products-->  
                </div> 
                      <!--Begin Add Payment Form-->
                      <div class="col-xl-3" id="addpayment">
                        <!--begin::Products-->
                        <div class="card card-flush">
                            <!--begin::Card body-->
                            
                                <div class="row-md-1 mt-5">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label ">
                                        <span><b><h2> Add Payment </h2></b></span>
                                    </label>
                                    <!--end::Label-->
                                </div>
                          
                            <hr class="solid">
                            <div class="card-body">
                            <form id="kt_modal_add_payment" class="form" method="POST" action="{{route('add_payment')}}">
                                <!--begin::Table-->
                                @csrf
                              
                                <div class="col-md-12 ml-4">
                                    <div class="row-md-1 mb-5">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label ">
                                            <span><b><h4>Transporter:{{$transporter_name[0]->name}}</h4></b></span>
                                            <span><b><h4> Opening Balance: {{$balance[0]->balance}} </h4></b></span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                <div class="row fv-row mb-5">
                                    <div class="col-md-3 text-md-start">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required"><b>Date</b></span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="date" name="date" id="date" class="form-control form-control-solid" value="" required>
                                            <!--end::Input-->
                                        </div>
                                </div>
                                
                                <div class="row fv-row mb-5" hidden>
                                    <div class="col-md-3 text-md-start">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required"><b>id.</b></span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                     
                                            <input type="text" class="form-control form-control-solid" name="id" id="id" value="{{$id}}" data-kt-ecommerce-settings-type="tagify" readonly/>
                                            <!--end::Input-->
                                        </div>
                                </div>

                                <div class="row fv-row mb-5">
                                    <div class="col-md-3 text-md-start">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required"><b>Receipt No.</b></span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                     
                                            <input type="text" class="form-control form-control-solid" name="sr_no" id="sr_no" value="{{$rec_no }}" data-kt-ecommerce-settings-type="tagify" readonly/>
                                            <!--end::Input-->
                                        </div>
                                </div>
                                
                                <div class="row fv-row mb-5">
                                    <div class="col-md-3 text-md-start">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required"><b>Credit</b></span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="amount" id="amount" value="" data-kt-ecommerce-settings-type="tagify" required />
                                            <!--end::Input-->
                                        </div>
                                    
                                </div>

                                <div class="row fv-row mb-5">
                                    <div class="col-md-3 text-md-start">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required"><b>Payment</b></span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <select class="form-select form-select-solid" name="payment" id="payment" data-control="select2" data-hide-search="true" data-placeholder="Mode">
                                                <option></option>
                                                <option value="">Select Mode...</option>
                                                <option value="Cash" selected>Cash</option>
                                                <option value="Gpay">Gpay</option>
                                                <option value="Cheque">Cheque</option>
                                                <option value="Bank Transfer">Bank Transfer</option>
                                                <option value="Account Pays">Account Pays</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                </div>
                                <div class="row fv-row mb-5">
                                    <div class="col-md-3 text-md-start">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required"><b>Description</b></span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="remark" id="remark" value="" data-kt-ecommerce-settings-type="tagify" />
                                            <!--end::Input-->
                                        </div>
                                    
                                </div>
                                <div class="row-md-2 mt-8" style= "display: flex; justify-content: flex-end;">
                                    <button type="submit" id="payment_submit" class="btn btn-primary">
                                        <span class="indicator-label">Save</span>
                                        <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                                                                                         
                                <!--end::Table-->
                                <div class="d-flex d-none align-items-center position-relative my-1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Order" />
                                </div>
                            </form>
                            </div>
                            <!--end::Card body-->   
                        </div>
                        <!--end::Products-->
                        
                    </div>
                    <!--End Add Payment Form-->
                    </div>
                <!--Begin Edit Payment Form--> 
                    <div class="col-xl-3" id="editpayment">
                        <!--begin::Products-->
                        <div class="card card-flush">
                            <!--begin::Card body-->
                            
                                <div class="row-md-1 mt-5">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label ">
                                        <span><b><h2> Edit Payment </h2></b></span>
                                    </label>
                                    <!--end::Label-->
                                </div>
                          
                            <hr class="solid">
                            <div class="card-body">
                            <form id="kt_modal_edit_payment" class="form" method="POST" action="{{route('update_payment')}}">
                                <!--begin::Table-->
                                @csrf
                                <div class="col-md-12 ml-4">
                                    <div class="row-md-1 mb-5">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label ">
                                        <label class="fs-6 fw-semibold form-label ">
                                            <span><b><h4>Transporter: {{$transporter_name[0]->name}}</h4></b></span>
                                            <span><b><h4> Opening Balance: {{$balance[0]->balance}} </h4></b></span>
                                        </label>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                <div class="row fv-row mb-5">
                                    <div class="col-md-3 text-md-start">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required"><b>Date</b></span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="date" name="date1" id="date1" class="form-control form-control-solid" value="" required>
                                            <!--end::Input-->
                                        </div>
                                       
                                </div>
                                
                                <div class="row fv-row mb-5">
                                    <div class="col-md-3 text-md-start">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required"><b>Receipt No.</b></span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                     
                                            <input type="text" class="form-control form-control-solid" name="sr_no1" id="sr_no1" value="" data-kt-ecommerce-settings-type="tagify" readonly/>
                                            <!--end::Input-->
                                        </div>
                                       
                                </div>
                                
                                <div class="row fv-row mb-5">
                                    <div class="col-md-3 text-md-start">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required"><b>Credit</b></span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="amount1" id="amount1" value="" data-kt-ecommerce-settings-type="tagify" required />
                                            <!--end::Input-->
                                        </div>
                                    
                                </div>

                                <div class="row fv-row mb-5">
                                    <div class="col-md-3 text-md-start">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required"><b>Payment</b></span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <select class="form-select form-select-solid" name="payment1" id="payment1" data-control="select2" data-hide-search="true" data-placeholder="Mode">
                                                <option></option>
                                                <option value="">Select Mode...</option>
                                                <option value="Cash" selected>Cash</option>
                                                <option value="Gpay">Gpay</option>
                                                <option value="Cheque">Cheque</option>
                                                <option value="Bank Transfer">Bank Transfer</option>
                                                <option value="Account Pay">Account Pays</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                </div>
                                <div class="row fv-row mb-5">
                                    <div class="col-md-3 text-md-start">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required"><b>Description</b></span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="remark1" id="remark1" value="" data-kt-ecommerce-settings-type="tagify" />
                                            <!--end::Input-->
                                        </div>
                                    
                                </div>
                                <div class="row-md-4 mt-8" style= "display: flex; justify-content: flex-end;">
                                    <button type="submit" id="payment_edit" class="btn btn-primary">
                                        <span class="indicator-label">Save</span>
                                        <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>&nbsp;&nbsp;
                               
                                  
                                    <a href="{{route('delete_payment',$row->sr_no)}}"  class="btn btn-primary btn-md">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg data-kt-ecommerce-order-filter="delete_row"-->
                                                <span class="indicator-label">Delete</span>
                                                <!--end::Svg Icon-->
                                    </a>
                                   
                                   
                                
                                </div>
                                                                                         
                                <!--end::Table-->
                                <div class="d-flex d-none align-items-center position-relative my-1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    
                                    <!--end::Svg Icon-->
                                    <input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Order" />
                                </div>
                            </form>
                    <!--End Edit Payment Form-->    
                </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
</div>
@endsection


@section('pagescript')
<script>
   jQuery(document).ready(function($){
    var currentDateTime = new Date();
    $('#date').flatpickr({
      enableTime: true,
      dateFormat: "Y-m-d",
      defaultDate: currentDateTime
    });
  });
    </script>
<script>
   
    let editLinks1 = document.querySelectorAll('a#edit')
        editLinks1.forEach(link1 => {
            $("#editpayment").hide();
            $("#addpayment").show();
            link1.addEventListener('click', function(event) {
                $("#addpayment").hide();
                $("#editpayment").show();
                event.preventDefault();
                const id = link1.getAttribute('data-typeId');
                $.ajax({
                    url:"{{url('edit_payment')}}" +"/"+ id,
                    type:'GET',
                    success:function(response){
                       
                        $("#date1").val(response['date']); 
                        $("#sr_no1").val(response['receipt_no']); 
                        $("#amount1").val(response['amount']); 
                        $("#remark1").val(response['remark']);  
                        //$("#payment1").val('Gpay');
                    }
                });
            });
        });
</script>


@endsection