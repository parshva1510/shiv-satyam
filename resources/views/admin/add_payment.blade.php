
                             
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
                    
                    <div class="col-xl-8">
                        <!--begin::Products-->
                        <div class="card card-flush">
                            <!--begin::Card body-->
                            <div class="card-body">
                                <!--begin::Table-->
                                <div class="row fv-row mb-1">
                                    <div class="col-md-2 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required"><b>Select Company Name</b></span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                        <div class="col-md-5">
                                            <!--begin::Input-->
                                            <select class="form-select form-select-solid" name="theme" data-control="select2" data-hide-search="true" data-placeholder="Select Company">
                                                <option></option>
                                                <option value="Default">Default</option>
                                                <option value="Minimalist">Minimalist</option>
                                                <option value="Dark">Dark</option>
                                                <option value="High_Contrast">High Contrast</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                    <div class="col-md-2">
                                        <button type="submit" id="new_submit" class="btn btn-primary">
                                            <span class="indicator-label">View</span>
                                            <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
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
                                
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Products-->
                    </div>

                    <div class="col-xl-8">
                        <!--begin::Products-->
                        <div class="card card-flush">
                            <!--begin::Card body-->
                            <div class="card-body">
                                <!--begin::Table-->
                                <h3> Add Payment </h3>
                                <p></p>
                                    <hr class="solid">
                                    <h4> Opening Balance: </h4>
                                    &nbsp;
                                    &nbsp;
                                    <div class="col-md-6">
                                <div class="row fv-row mb-5">
                                    <div class="col-md-2 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required"><b>Date</b></span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    
                                        <div class="col-md-5">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="meta_keywords" value="" data-kt-ecommerce-settings-type="tagify" />
                                            <!--end::Input-->
                                        </div>
                                        <div class="col-md-5">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="meta_keywords" value="" data-kt-ecommerce-settings-type="tagify" />
                                            <!--end::Input-->
                                        </div>
                                        
                                </div>
                                
                                <div class="row fv-row mb-5">
                                    <div class="col-md-2 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required"><b>Credit</b></span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                        <div class="col-md-5">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="meta_keywords" value="" data-kt-ecommerce-settings-type="tagify" />
                                            <!--end::Input-->
                                        </div>
                                    
                                </div>

                                <div class="row fv-row mb-5">
                                    <div class="col-md-2 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required"><b>Payment Mode</b></span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                        <div class="col-md-5">
                                            <!--begin::Input-->
                                            <select class="form-select form-select-solid" name="theme" data-control="select2" data-hide-search="true" data-placeholder="Mode">
                                                <option></option>
                                                <option value="Dark">Online</option>
                                                <option value="High_Contrast">Cash</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                    {{-- <div class="col-md-2">
                                        <button type="submit" id="new_submit" class="btn btn-primary">
                                            <span class="indicator-label">View</span>
                                            <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div> --}}
                                    
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

@endsection