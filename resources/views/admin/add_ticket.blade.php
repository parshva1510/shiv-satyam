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
                            <!--begin:Form-->
                                <form id="kt_modal_new_target_form" class="form" action="#">
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Label-->
                                        <div class="col-md-4 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                                <span class="required">Ticket No.</span>
                                            </label>
                                            <input type="number" min="0" class="form-control form-control-solid" placeholder="1510" name="target_title" readonly/>
                                        </div>
                                        <!--end::Label-->
                                        
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
                                                                    <!-- <form id="kt_modal_add_user_form_1" class="form" action="#"> -->
                                                                        <!--begin::Scroll-->
                                                                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                                                            <!--begin::Input group-->
                                                                            <div class="fv-row mb-7">
                                                                                <!--begin::Label-->
                                                                                <label class="required fw-bolder fs-6 mb-2">A/C No.</label>
                                                                                <!--end::Label-->
                                                                                <!--begin::Input-->
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
                                                                                <input type="text" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Sahal"/>
                                                                                <!--end::Input-->
                                                                            </div>
                                                                            <!--end::Input group-->
                                                                            <!--begin::Input group-->
                                                                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                                <!--begin::Label-->
                                                                                <label class="required fw-bolder fs-6 mb-2">City</label>
                                                                                <!--end::Label-->
                                                                                <!--begin::Input-->
                                                                                <input type="text" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Bhuj"/>
                                                                                <!--end::Input-->
                                                                            </div>
                                                                            <!--end::Input group-->
                                                                            <!--begin::Input group-->
                                                                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                                <!--begin::Label-->
                                                                                <label class="required fw-bolder fs-6 mb-2">Contact No.</label>
                                                                                <!--end::Label-->
                                                                                <!--begin::Input-->
                                                                                <input type="number" min="0" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="6595989565"/>
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
                                                                            <button type="" class="btn btn-primary" data-kt-users-modal-action_1="submit_1">
                                                                                <span class="indicator-label">Submit</span>
                                                                                <span class="indicator-progress">Please wait...
                                                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                                            </button>
                                                                        </div>
                                                                        <!--end::Actions-->
                                                                    <!-- </form> -->
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
                                        <div class="col-md-4 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                                <span class="required">Vehicle No.</span>
                                            </label>
                                            <input id="NUMBERPLATE" type="text" class="form-control form-control-solid" placeholder="GJ-12-PM-####" 
                                                name="target_title" title="Please enter a valid vehicle number." 
                                                autocomplete="off" required oninput="this.value = this.value.toUpperCase();" />
                                            <span class="d-flex number_error" id="number_error"></span>
                                        </div>
                                        <!--end::Label-->												
                                    </div>
                                    <!--end::Input group-->

                                                                                            

                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Label-->
                                        <div class="col-md-3 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                                <span class="required">Gross Weight (KG)</span>
                                            </label>
                                            <input type="number" min="0" class="form-control form-control-solid" placeholder="0" name="target_title"/>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Label-->
                                        <div class="col-md-3 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bolder mb-2 required">Gross Date</label>
                                            <!--begin::Input-->
                                            <div class="position-relative d-flex align-items-center">
                                                <!--begin::Icon-->
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                                <span class="svg-icon svg-icon-2 position-absolute mx-4">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
                                                        <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
                                                        <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <!--end::Icon-->
                                                <!--begin::Datepicker-->
                                                <input class="form-control form-control-solid ps-12" id="new_date" placeholder="Select a date" name="due_date"/>
                                                <!--end::Datepicker-->
                                            </div>
                                        </div>
                                        <!--end::Label-->

                                        <!--begin::Label-->
                                        <div class="col-md-3 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                                <span class="required">Tare Weight (KG)</span>
                                            </label>
                                            <input type="number" min="0" class="form-control form-control-solid" placeholder="0" name="target_title"/>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Label-->
                                        <div class="col-md-3 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bolder mb-2 required">Tare Date</label>
                                            <!--begin::Input-->
                                            <div class="position-relative d-flex align-items-center">
                                                <!--begin::Icon-->
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                                <span class="svg-icon svg-icon-2 position-absolute mx-4">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
                                                        <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
                                                        <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <!--end::Icon-->
                                                <!--begin::Datepicker-->
                                                <input class="form-control form-control-solid ps-12" id="new_date1" placeholder="Select a date" name="due_date"/>
                                                <!--end::Datepicker-->
                                            </div>
                                        </div>
                                        <!--end::Label-->
                                                                
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Label-->
                                        <div class="col-md-3 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                                <span class="required">Net Weight</span>
                                            </label>
                                            <input id="field1" type="number" min="0" class="form-control form-control-solid" placeholder="0" name="target_title" required/>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Label-->
                                        <div class="col-md-3 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                                <span class="required">Material</span>
                                            </label>
                                            <input id="field2" type="text" class="form-control form-control-solid" placeholder="" name="target_title" required/>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Label-->
                                        <div class="col-md-3 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                                <span class="required">Charge</span>
                                            </label>
                                            <input id="field3" type="number" min="0" class="form-control form-control-solid" placeholder="0" name="target_title" required/>
                                        </div>
                                        <!--end::Label-->	
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bolder mb-2">Payment Mode</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select Payment Mode" name="target_assign">
                                                <option value="">Select Mode...</option>
                                                <option value="1">Cash</option>
                                                <option value="2">Gpay</option>
                                                <option value="3">Cheque</option>
                                                <option value="4">Bank Transfer</option>
                                                <option value="5">Baki</option>
                                            </select>
                                        </div>
                                        <!--end::Col-->						
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8">
                                        <label class="d-flex align-items-center fs-6 fw-bolder mb-2">Remarks</label>
                                        <textarea class="form-control form-control-solid" rows="3" name="target_details" placeholder="Remarks"></textarea>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="text-center d-flex flex-stack">
                                        <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Reset</button>
                                        <button type="submit" id="new_submit" class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
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


@section('pagescript')

<script>
    jQuery(document).ready(function($){
        var currentDateTime = new Date();
        $('#new_date').flatpickr({
        enableTime: !0,
        dateFormat: "d M, Y - h:i K",
        defaultDate: currentDateTime
    })

    jQuery(document).ready(function($){
        var currentDateTime = new Date();
        $('#new_date1').flatpickr({
        enableTime: !0,
        dateFormat: "d M, Y - h:i K",
        defaultDate: currentDateTime
    })

    
});

});
</script>

<script>
function myFunction(id) {
// Get the values of the required fields
let field1 = document.getElementById('field1').value;
let field2 = document.getElementById('field2').value;
let field3 = document.getElementById('field3').value;

// Check if any of the required fields are empty
if (field1 === '' || field2 === '' || field3 === '') {
    Swal.fire({
        text: "Sorry, looks like there are some errors detected, please try again.",
        icon: "error",
        buttonsStyling: false,
        confirmButtonText: "Ok, got it!",
        customClass: {
            confirmButton: "btn btn-primary"
        }
    });
} else {
    Swal.fire({
        text: "Form has been successfully submitted!",
        icon: "success",
        buttonsStyling: false,
        confirmButtonText: "Ok, got it!",
        customClass: {
            confirmButton: "btn btn-primary"
        }
    }).then((function(t) {
        t.isConfirmed && o.hide();
    }));
}
}
</script>


<script>

// Get the input element
var input = document.getElementById('NUMBERPLATE');

// Add an input event listener
input.addEventListener('input', function() {
// Get the entered value
var value = this.value;

// Create a regular expression pattern for validation
var pattern = /^[A-Z]{2}\d{2}[A-Z]{1,}\d{4}$/;

// Check if the entered value matches the pattern
if (pattern.test(value)) {
// The entered value is valid
console.log('Valid vehicle number: ' + value);
document.getElementById('number_error').textContent="";
} else {
// The entered value is invalid
console.log('Invalid vehicle number: ' + value);
document.getElementById('number_error').textContent="please add valid vehical number";
}
});


</script>

<script>
// Element to indecate
var button = document.querySelector("#new_submit");

// Handle button click event
button.addEventListener("click", function(e) {
e.preventDefault();
// Activate indicator
button.setAttribute("data-kt-indicator", "on");

// Disable indicator after 3 seconds
setTimeout(function() {
myFunction(1);
button.removeAttribute("data-kt-indicator");
}, 1000);
});
</script>

<script>
$(document).ready(function($){
$("#close_jk").click(function(){
$("#kt_modal_add_user_1").modal('hide');
});
});
</script>
@endsection