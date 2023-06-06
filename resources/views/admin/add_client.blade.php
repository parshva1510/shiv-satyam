@extends('admin.layout.layout')
@section('mainsection')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6 mb-5 mt-5">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container new-full-width container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold flex-column justify-content-center my-0">Create New Ticket</h1>
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
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Heading-->
                        <div class="card-px text-center pt-9 pb-9">
                         
                               
                                        
                                        <!--begin::Label-->
                                        <div class="col-md-4 fv-row">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                                        <span class="required">Transporter</span>
                                                    </label>
                                                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select Account" name="target_assign">
                                                        <option class="dropdown-font" value="">Select Account...</option>
                                                        <option class="dropdown-font" value="1">1. Karan</option>
                                                        <option class="dropdown-font" value="2">2. Sahal</option>
                                                        <option class="dropdown-font" value="3">3. Junaid</option>
                                                        <option class="dropdown-font" value="4">4. Sahil</option>
                                                        <option class="dropdown-font" value="5">5. Baba</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-4 mt-8">
                                                    <!--begin::Add user-->
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user_1">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                                        <span class="svg-icon svg-icon-2">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Add New
                                                    </button>
                                                    <!--end::Add user-->

                                                    <div class="modal fade" id="kt_modal_add_user_1" tabindex="-1" aria-hidden="true">
                                                        <!--begin::Modal dialog-->
                                                        <div class="modal-dialog modal-dialog-centered mw-650px">
                                                            <!--begin::Modal content-->
                                                            <div class="modal-content">
                                                                <!--begin::Modal header-->
                                                                <div class="modal-header" id="kt_modal_add_user_1_header">
                                                                    <!--begin::Modal title-->
                                                                    <h2 class="fw-bold">Add Transporter</h2>
                                                                    <!--end::Modal title-->
                                                                    <!--begin::Close-->
                                                                    <div class="btn btn-icon btn-sm btn-active-icon-primary" id="close_jk" data-kt-users-modal-action_1="close">
                                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                                        <span class="svg-icon svg-icon-1">
                                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </div>
                                                                    <!--end::Close-->
                                                                </div>
                                                                <!--end::Modal header-->
                                                                <!--begin::Modal body-->
                                                                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7 text-start">
                                                                    <!--begin::Form-->
                                                                     <form id="kt_modal_add_transporter1" class="form" method="POST" action="{{route('add_transporter')}}">
                                                                        <!--begin::Scroll-->
                                                                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                                                            <!--begin::Input group-->
                                                                            <div class="fv-row mb-7">
                                                                                <!--begin::Label-->
                                                                                <label class="required fw-bolder fs-6 mb-2">A/C No.</label>
                                                                                <!--end::Label-->
                                                                                <!--begin::Input-->
                                                                                @csrf
                                                                                <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 readonly" placeholder="1510"/>
                                                                                <!--end::Input-->
                                                                            </div>
                                                                            <!--end::Input group-->
                                                                            <!--begin::Input group-->
                                                                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                                <!--begin::Label-->
                                                                                <label class="required fw-bolder fs-6 mb-2">Name</label>
                                                                                <!--end::Label-->
                                                                                <!--begin::Input-->
                                                                                <input type="text" class="form-control form-control-solid mb-3 mb-lg-0" name="name" id="name" placeholder="Sahal"/>
                                                                                <!--end::Input-->
                                                                            </div>
                                                                            <!--end::Input group-->
                                                                            <!--begin::Input group-->
                                                                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                                <!--begin::Label-->
                                                                                <label class="required fw-bolder fs-6 mb-2">City</label>
                                                                                <!--end::Label-->
                                                                                <!--begin::Input-->
                                                                                <input type="text" class="form-control form-control-solid mb-3 mb-lg-0" name="city" id="city" placeholder="Bhuj"/>
                                                                                <!--end::Input-->
                                                                            </div>
                                                                            <!--end::Input group-->
                                                                            <!--begin::Input group-->
                                                                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                                <!--begin::Label-->
                                                                                <label class="required fw-bolder fs-6 mb-2">Contact No.</label>
                                                                                <!--end::Label-->
                                                                                <!--begin::Input-->
                                                                                <input type="number" min="0" class="form-control form-control-solid mb-3 mb-lg-0" name="contact" id="contact" placeholder="6595989565"/>
                                                                                <!--end::Input-->
                                                                            </div>
                                                                            <!--end::Input group-->
                                                                            <!--begin::Input group-->
                                                                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                                <!--begin::Label-->
                                                                                <label class="required fw-bolder fs-6 mb-2">Remark</label>
                                                                                <!--end::Label-->
                                                                                <!--begin::Input-->
                                                                                <textarea class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Remarks"></textarea>
                                                                                <!--end::Input-->
                                                                            </div>
                                                                            <!--end::Input group-->
                                                                        </div>
                                                                        <!--end::Scroll-->
                                                                        <!--begin::Actions-->
                                                                        <div class="text-center d-flex flex-stack pt-5">
                                                                            <button type="" class="btn btn-light me-3" data-kt-users-modal-action_1="cancel_1">Reset</button>
                                                                            <button type="" class="btn btn-primary" >
                                                                                <span class="indicator-label">Submit</span>
                                                                                <span class="indicator-progress">Please wait...
                                                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                                            </button>
                                                                        </div>
                                                                        <!--end::Actions-->
                                                                     </form>
                                                                    <!--end::Form-->
                                                                </div>
                                                                <!--end::Modal body-->
                                                            </div>
                                                            <!--end::Modal content-->
                                                        </div>
                                                        <!--end::Modal dialog-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Label-->	
                                        <!--begin::Label-->
                                </form>
                            <!--end:Form-->
                        </div>
                        <!--end::Heading-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
</div>

@endsection


