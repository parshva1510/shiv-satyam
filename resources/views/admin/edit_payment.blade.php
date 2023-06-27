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
                                            <span class="indicator-label">View</span>
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
                                        <th class="min-w-70px">Action</th>
                                        
                                        {{-- <th class="text-end min-w-70px">Actions</th> --}}
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-semibold text-gray-600">
                                @foreach($payment as $row)  
                                <tr>
                                      
                                        <td>{{$row->receipt_no}}</td>

                                        <td data-kt-ecommerce-order-filter="order_id">{{(new DateTime($row->date))->format('d-m-Y')}}</td>

                                        <td>{{$row->amount + $row->due}}</td>

                                        <td>{{$row->amount}}</td>

                                        <td>{{$row->due}}</td>

                                        <td>{{$row->payment_mode}}</td>
                                     
                                        <td>{{$row->remark}}</td>

                                        <td class="">
                                            <a href="{{route('edit_payment',$row->receipt_no)}}" data-typeId="{{$row->receipt_no}}" id="edit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                            <a href="{{route('delete_payment',$row->receipt_no)}}" data-kt-ecommerce-order-filter="delete_row" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                                                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                                                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                        </td>
                                    </tr> 
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
                                            <span><b><h4>Transporter: {{$row->transporter_name}}</h4></b></span>
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
                                <div class="row-md-2 mt-8">
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
                                            <span><b><h2> Transporter </h2></b></span>
                                            <span><b><h4> Opening Balance: </h4></b></span>
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
                                <div class="row-md-2 mt-8">
                                    <button type="submit" id="payment_edit_submit" class="btn btn-primary">
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
                        alert("success");
                        /*$("#date1").val(response['date']); 
                      
                        $("#remark1").val(response['remark']);  */
                    }
                });
            });
        });
</script>

@endsection