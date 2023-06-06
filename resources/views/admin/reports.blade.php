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
                    <h1 class="page-heading d-flex text-dark fw-bold flex-column justify-content-center my-0">Reports</h1>
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
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-30px">T. No.</th>
                                            <th class="min-w-70px">Vehicle No.</th>
                                            <th class="min-w-150px">Transporter</th>
                                            <th class="min-w-70px">G. Weight</th>
                                            <th class="min-w-120px">G. Date</th>
                                            <th class="min-w-70px">T. Weight</th>
                                            <th class="min-w-120px">T. Date</th>
                                            <th class="min-w-70px">Net Weight</th>
                                            <th class="min-w-70px">Material</th>
                                            <th class="min-w-70px">Charge</th>
                                            <th class="min-w-70px">Payment Mode</th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-semibold text-gray-600">
                                        <tr>
                                            <td>1510</td>

                                            <td>GH12FF1510</td>

                                            <td>Harjibhai</td>

                                            <td>1056</td>

                                            <td>24 May, 2023 - 11:47 AM</td>

                                            <td>650</td>
                                            
                                            <td>24 May, 2023 - 11:47 AM</td>
                                    
                                            <td>1650</td>

                                            <td>Rice</td>

                                            <td>655</td>

                                            <td>cash</td>
                                        </tr>
                                        <tr>
                                            <td>150</td>

                                            <td>GH12FF1510</td>

                                            <td>Aarjibhai</td>

                                            <td>1056</td>

                                            <td>24 May, 2023 - 11:47 AM</td>

                                            <td>650</td>
                                            
                                            <td>24 May, 2023 - 11:47 AM</td>
                                    
                                            <td>1650</td>

                                            <td>Rice</td>

                                            <td>655</td>

                                            <td>cash</td>
                                        </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Products-->
                    </div>

                    <div class="col-xl-3">
                        <!--begin::Products-->
                        <div class="card card-flush">
                            <!--begin::Card body-->
                            <div class="card-body">
                                <!--begin::Table-->
                                <div class="">
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

                                <div class="">
                                    <label class="d-flex align-items-center fs-6 fw-bolder mb-2 mt-5">
                                        <span class="required">Select Date Range</span>
                                    </label>
                                    <!--begin::Flatpickr-->
                                    <div class="input-group">
                                        <input class="form-control form-control-solid rounded rounded-end-0" placeholder="Pick date range" id="kt_ecommerce_sales_flatpickr" />
                                        <button class="btn btn-icon btn-light" id="kt_ecommerce_sales_flatpickr_clear">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="currentColor" />
                                                    <rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </button>
                                    </div>
                                    <!--end::Flatpickr-->
                                </div>
                                <!--end::Table-->
                                {{-- <div class="d-flex align-items-center position-relative my-1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Order" />
                                </div> --}}

                                <div class="mt-5">
                                    <a href="" class="btn btn-primary full-button">View Report</a>
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