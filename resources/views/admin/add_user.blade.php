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
                    <h1 class="page-heading d-flex text-dark fw-bold flex-column justify-content-center my-0">Add User</h1>
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
                                            <th class="min-w-70px">Id</th>
                                            <th class="min-w-30px">User name</th>
                                            <th class="min-w-30px">Full name</th>
                                            <th class="min-w-70px">Role</th>
                                            <th class="min-w-30px">Cotact No</th>
                                            <th class="text-end min-w-70px">Actions</th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach($user as $row)
                                        <tr id="id{{$row->id}}">
                                            <td>{{$row->id}}</td>

                                            <td>{{$row->username}}</td>

                                            <td>{{$row->f_name}}</td>

                                            @if($row->role==1)
                                                <td>Admin</td>
                                            @else
                                                <td>Operator</td>
                                            @endif

                                            <td>{{$row->contact}}</td>

                                            <td class="text-end">
                                                <a href="{{route('edit_user', $row->id)}}" data-typeId="{{$row->id}}" id="edit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
                                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                                <a href="{{route('delete_user', $row->id)}}" data-kt-ecommerce-order-filter="delete_row" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
                                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
                                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
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

                    <div class="col-xl-4" id="adduser">
                        <!--begin::Products-->
                        <div class="card card-flush">
                            <!--begin::Card body-->
                            <div class="card-body">
                                <!--begin::Form-->
                                <form id="kt_modal_add_user" class="form" method="POST" action="{{route('add_user')}}">
                                <div class="fv-row mb-7" hidden>
                                        <!--begin::Label-->
                                        <label class="required fw-bolder fs-6 mb-2">Id</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        @csrf
                                        <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 readonly" name="id" id="id" value="{{$id + 1}}" placeholder="" readonly/>
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fw-bolder fs-6 mb-2">User Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        @csrf
                                        <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 readonly" name="username" id="username" placeholder="Enter Username" required/>
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fw-bolder fs-6 mb-2">Password</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="password" class="form-control form-control-solid mb-3 mb-lg-0 readonly" name="password" id="password" placeholder="Enter Password" required/>
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fw-bolder fs-6 mb-2">Confirm Password</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="password" class="form-control form-control-solid mb-3 mb-lg-0 readonly" name="vpassword" id="vpassword" placeholder="Retype Password" required/>
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fw-bolder fs-6 mb-2">Full Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        @csrf
                                        <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 readonly" name="f_name" id="f_name" placeholder="Enter Full Name" required/>
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fw-bolder fs-6 mb-2">Contact Number</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        @csrf
                                        <input type="number" class="form-control form-control-solid mb-3 mb-lg-0 readonly" name="contact" id="contact" placeholder="Enter Contact Number" maxlength=10 required/>
                                        <!--end::Input-->
                                    </div>
                                  
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fw-bolder fs-6 mb-2">Role</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-control form-control-solid mb-3 mb-lg-0 readonly" name="role" id="role" placeholder="">        
                                        <option value="">Select Mode...</option>    
                                        <option value="1">Admin</option>
                                        <option value="2">Operator</option>
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                                                   
                                
                                <button type="submit" id="new_submit" class="btn btn-primary">
                                    <span class="indicator-label">Add</span>
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
                <!--Edit Module-->
                <div class="col-xl-4" id="edituser">
                        <!--begin::Products-->
                        <div class="card card-flush">
                            <!--begin::Card body-->
                            <div class="card-body">
                                <!--begin::Form-->
                                <form id="kt_modal_edit_user" class="form" method="POST" action="{{route('update_user')}}">
                                <div class="fv-row mb-7" hidden>
                                        <!--begin::Label-->
                                        <label class="required fw-bolder fs-6 mb-2">Id</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        @csrf
                                        <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 readonly" name="id1" id="id1" placeholder="" readonly/>
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fw-bolder fs-6 mb-2">User Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        @csrf
                                        <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 readonly" name="username1" id="username1" placeholder="Enter Username" required/>
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class=" fw-bolder fs-6 mb-2">Old Password</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="password" class="form-control form-control-solid mb-3 mb-lg-0 readonly" name="password1" id="password1" placeholder="Enter Password" />
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class=" fw-bolder fs-6 mb-2">New Password</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="password" class="form-control form-control-solid mb-3 mb-lg-0 readonly" name="vpassword1" id="vpassword1" placeholder="Retype Password"/>
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fw-bolder fs-6 mb-2">Full Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 readonly" name="f_name1" id="f_name1" placeholder="Enter Full Name" required/>
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fw-bolder fs-6 mb-2">Contact Number</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" class="form-control form-control-solid mb-3 mb-lg-0 readonly" name="contact1" id="contact1" placeholder="Enter Contact Number" maxlength=10 required/>
                                        <!--end::Input-->
                                    </div>
                                  
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fw-bolder fs-6 mb-2">Role</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-control form-control-solid mb-3 mb-lg-0 readonly" name="role1" id="role1" placeholder="" >
		                                        <option value="">Select Mode...</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Operator</option>
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                                                   
                                
                                <button type="submit" id="new_submit1" class="btn btn-primary">
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
                <!--End Module-->
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
            $("#edituser").hide();
            $("#adduser").show();
            link1.addEventListener('click', function(event) {
                $("#adduser").hide();
                $("#edituser").show();
                event.preventDefault();
                const id = link1.getAttribute('data-typeId');
                //console.log(id);
                $.ajax({
                    url:"{{url('edit_user')}}" +"/"+ id,
                    type:'GET',
                    success:function(response){
                        $("#id1").val(response['id']); 
                        $("#password1").val(""); 
                        $("#vpassword1").val(""); 
                        $("#username1").val(response['username']); 
                        $("#f_name1").val(response['f_name']); 
                        $("#role1").val(response['role']); 
                        $("#contact1").val(response['contact']);
                    }
                });
            });
        });
</script>
<script>
  $(document).ready(function(){
        $("#vpassword").focusout(function(){
           if(document.getElementById("password").value != document.getElementById("vpassword").value)
        {
            alert("Password does not Match");
            $("#password").val("");
            $("#vpassword").val("");
            document.getElementById("password").focus();
        }
        
        });  });
       /* $("#vpassword1").focusout(function(){
           if(document.getElementById("password1").value != document.getElementById("vpassword1").value)
        {
            alert("Password does not Match");
            $("#password1").val("");
            $("#vpassword1").val("");
            document.getElementById("password1").focus();
        } 
        });
        $("#contact").focusout(function(){
           if(document.getElementById("contact").value.length < 10  )
           {
                alert("check no");
           }
           document.getElementById("contact").value="";
        });
    });*/
</script>
@endsection