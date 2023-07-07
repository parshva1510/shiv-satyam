
                             
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
                    <h1 class="page-heading d-flex text-dark fw-bold flex-column justify-content-center my-0">Transporters</h1>
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
                    <div class="col-xl-8">
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
                                            <th class="min-w-70px">A/c No</th>
                                            <th class="min-w-70px">Transporter</th>
                                            <th class="min-w-70px">City</th>
                                            <th class="min-w-70px">Mobile No</th>
                                            <th class="min-w-70px">Remark</th>
                                            <th class="text-end min-w-70px">Actions</th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-semibold text-gray-600">
                                    @foreach($data as $row)
                                        <tr id="cid{{$row->sr_no}}">
                                        <input type="hidden" class="delete_id" value="{{$row->sr_no}}">
                                            <td data-kt-ecommerce-order-filter="order-id">{{'SS'.$row->sr_no}}</td>

                                            <td>{{$row->name}}</td>

                                            <td>{{$row->city}}</td>

                                            <td>{{$row->contact}}</td>

                                            <td>{{$row->remark}}</td>
                                    
                                            <td class="text-end">
                                            <a href="{{route('edit_client', $row->sr_no)}}" data-typeId="{{$row->sr_no}}" id="edit"  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
                                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                                <button type="button"  data-kt-ecommerce-order-filter="delete_row" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm servicedeletebtn">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
                                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
                                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </button>
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

                    <div class="col-xl-4" id="addclient">
                        <!--begin::Products-->
                        <div class="card card-flush">
                            <!--begin::Card body-->
                            <div class="card-body">
                                <!--begin::form-->
                                <form id="kt_modal_add_transporter" class="form" method="POST" action="{{route('add_client')}}">
                                @csrf
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-bolder fs-6 mb-2">Transporter A/c No.</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    
                                    <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 readonly" name="ac_no" id="ac_no" value="{{'SS'.$sr_no+1}}" readonly>
                                    
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-bolder fs-6 mb-2">Name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 readonly" name="name" id="name" value="" placeholder="" required/>
                                  
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                    <label class="required fw-bolder fs-6 mb-2">Mobile No</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 readonly" name="contact" id="contact" placeholder="" maxlength="10" minlength="10" required/>
                                        <!--end::Input-->
                                </div>
                                    <!--begin::Table-->
                                <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                    <label class="required fw-bolder fs-6 mb-2">City</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 readonly" name="city" id="city" placeholder="" required/>
                                        <!--end::Input-->
                                </div>
                                
                                <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                    <label class="fw-bolder fs-6 mb-2">Remark</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 readonly" name="remark" id="remark" placeholder=""/>
                                        <!--end::Input-->
                                </div> 
                                <div class="row-md-6 mt-8"style= "display: flex; justify-content: flex-end;">    
                                <button type="" id="new_submit" class="btn btn-primary">
                                    <span class="indicator-label">Add Transporter</span>
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
                    <!--Edit Module-->
                    <div class="col-xl-4" id="editclient">
                        <!--begin::Products-->
                        <div class="card card-flush">
                            <!--begin::Card body-->
                            <div class="card-body">
                                <!--begin::form-->
                                <form id="kt_modal_edit_transporter" class="form" method="POST" action="{{route('update_client')}}">
                                @csrf
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-bolder fs-6 mb-2">A/c No.</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    
                                    <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 readonly" name="ac_no1" id="ac_no1" value="{{'SS'.$sr_no+1}}" readonly>
                                    
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-bolder fs-6 mb-2">Name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 readonly" name="name1" id="name1" value="" placeholder="" required/>
                                  
                                    <!--end::Input-->
                                </div>
                                    <!--begin::Table-->
                                <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                    <label class="required fw-bolder fs-6 mb-2">City</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 readonly" name="city1" id="city1" placeholder="" required/>
                                        <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                    <label class="required fw-bolder fs-6 mb-2">Contact</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 readonly" name="contact1" id="contact1" placeholder="" maxlength="10" required/>
                                        <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                    <label class="fw-bolder fs-6 mb-2">Remark</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 readonly" name="remark1" id="remark1" placeholder=""/>
                                        <!--end::Input-->
                                </div>     
                                <button type="" id="new_submit" class="btn btn-primary">
                                    <span class="indicator-label">Save</span>
                                    <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                
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
                    <!--End Edit Module-->
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
    let editLinks1 = document.querySelectorAll('a#edit')
        editLinks1.forEach(link1 => {
            $("#editclient").hide();
            $("#addclient").show();
            link1.addEventListener('click', function(event) {
                $("#addclient").hide();
                $("#editclient").show();
                event.preventDefault();
                const id = link1.getAttribute('data-typeId');
                $.ajax({
                    url:"{{url('edit_client')}}" +"/"+ id,
                    type:'GET',
                    success:function(response){
                        $("#ac_no1").val("SS"+response['sr_no']); 
                        $("#name1").val(response['name']); 
                        $("#city1").val(response['city']); 
                        $("#contact1").val(response['contact']);
                        $("#remark1").val(response['remark']);  
                    }
                });
            });
        });
        </script>
        <script>
        $("#kt_modal_edit_transporter").submit(function(){
        var name=document.getElementById("name1").value;
        var city=document.getElementById("city1").value;
        var contact=document.getElementById("contact1").value;
        if(name ==='' && city === '' && contact ==='')
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
                title: 'Transporter data has been successfully updated!',
                showConfirmButton: false,
                timer: 1500
                }).then(function() {
                $("#kt_modal_edit_transporter").submit();
           });
        }
    });
</script>
<script>
    $("#kt_modal_add_transporter").submit(function(){
        var name=document.getElementById("name").value;
        var city=document.getElementById("city").value;
        var contact=document.getElementById("contact").value;
        if(name ==='' && city === '' && contact ==='')
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
                title: 'Transporter data has been successfully submitted!',
                showConfirmButton: false,
                timer: 1500
                }).then(function() {
                $("#kt_modal_add_transporter").submit();
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
                    url:"{{url('delete_client')}}" +"/"+ id,
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