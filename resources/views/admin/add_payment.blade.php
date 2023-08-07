@extends('admin.layout.layout')

@section('mainsection')
@section('pagecss')
<link rel="stylesheet" href="https://sweetalert2.github.io/styles/bootstrap4-buttons.css"/>
@endsection
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
                                                <option value="{{$row->sr_no}}">{{$row->name.'-'.('SS'.$row->sr_no)}}</option>
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
                    
              
                
                
 
              
                    </div>
               
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
                      
                        if(response['payment_mode']==="Gpay"){
                            $("#payment1 option[value='Gpay']").attr('selected', 'selected');}
                        if(response['payment_mode']==="Cash"){
                            $("#payment1 option[value='Cash']").attr('selected', 'selected');}
                        if(response['payment_mode']==="Cheque"){
                            $("#payment1 option[value='Cheque']").attr('selected', 'selected');}
                        if(response['payment_mode']==="Bank Transfer"){
                            $("#payment1 option[value='Bank Transfer']").attr('selected', 'selected');}
                        if(response['payment_mode']==="Account Pays"){
                            $("#payment1 option[value='Account Pays']").attr('selected', 'selected');}
                        
                      
                    }
                });
            });
        });
</script>
<script>
    $("#kt_modal_edit_payment").submit(function(){
        var amount1=document.getElementById("amount1").value;
        var remark=document.getElementById("remark1").value;
        if(amount1 ==='' && remark1 === '')
        {
            Swal.fire({
                text: "Sorry, looks like there are some errors detected, please try again.",
                icon: "error",
            });
            return false; // Prevent form submission
        } else {
            Swal.fire({
                position: 'middle-center',
                icon: 'success',
                title: 'Payment has been successfully updated!',
                showConfirmButton: false,
                timer: 1500
                }).then(function() {
                $("kt_modal_edit_payment").submit();
           });
        }
    });
</script>
<script>
    $("#kt_modal_add_payment").submit(function(){
        var amount=document.getElementById("amount").value;
        var remark=document.getElementById("remark").value;
        if(amount ==='' && remark === '')
        {
            Swal.fire({
                text: "Sorry, looks like there are some errors detected, please try again.",
                icon: "error",
            });
            return false; // Prevent form submission
        } else {
            Swal.fire({
                position: 'middle-center',
                icon: 'success',
                title: 'Payment has been successfully added!',
                showConfirmButton: false,
                timer: 1500
                }).then(function() {
                $("kt_modal_add_payment").submit();
           });
        }
    });
</script>
<script>
    $(".servicedeletebtn").click(function(e){
            e.preventDefault();
            var id=$(this).closest("tr").find(".delete_id").val();
                 Swal.fire({
                    title: 'Are you sure?',
                    text: "Once deleted, You will not be able to recover this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085D6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url:"{{url('delete_payment')}}" +"/"+ id,
                    type:'GET',
                    success:function(response){
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success',
                            );
                            location.reload();
                            }
                        });
                    }
            });
        });
</script>


@endsection