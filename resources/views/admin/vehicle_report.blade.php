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
                     
                    <h1 class="page-heading d-flex text-dark fw-bold flex-column justify-content-center my-0">Vehicle Reports</h1>
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
                            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                <div class="card-title">
                                    <!--begin::Search-->
                                    <div class="d-flex align-items-center position-relative my-1">
                                        <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                                                </svg>
                                        </span>
                                        <input type="text" data-kt-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Report" />
                                    </div>
                                    <!--end::Search-->
                                    <!--begin::Export buttons-->
                                    <div id="kt_datatable_example_1_export" class="d-none"></div>
                                    <!--end::Export buttons-->
                                </div>
                                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                    <!--begin::Export dropdown-->
                                    <button type="button" class="btn btn-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                       
                                        Export Data
                                    </button>
                                    <!--begin::Menu-->
                                    <div id="kt_datatable_example_export_menu" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3" data-kt-export="copy">
                                            Copy to clipboard
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3" data-kt-export="excel">
                                            Export as Excel
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3" data-kt-export="csv">
                                            Export as CSV
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3" data-kt-export="pdf">
                                            Export as PDF
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                    <!--end::Export dropdown-->
                            
                                    <!--begin::Hide default export buttons-->
                                    <div id="kt_datatable_example_buttons" class="d-none"></div>
                                    <!--end::Hide default export buttons-->
                                </div>
                            </div>
                            <!--begin::Card body-->
                            <div class="card-body">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_example">
                                    <!--begin::Table head-->
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-gray-800 fw-bolder fs-7 text-uppercase gs-0">
                                            <th class="min-w-30px">Ticket. No.</th>
                                            <th class="min-w-70px">Vehicle No.</th>
                                            <th class="min-w-150px">Transporter</th>
                                            <th class="min-w-70px">G. Weight</th>
                                            <th class="min-w-150px">G. Date</th>
                                            <th class="min-w-70px">T. Weight</th>
                                            <th class="min-w-150px">T. Date</th>
                                            <th class="min-w-70px">Net Weight</th>
                                            <th class="min-w-70px">Material</th>
                                            <th class="min-w-70px">Charge</th>
                                            <th class="min-w-70px">Payment Mode</th>
                                            {{-- <th class="text-end min-w-70px">Actions</th> --}}
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach($data as $row)
                                        <tr>
                                            <td data-kt-ecommerce-order-filter="order_id">{{$row->ticket_no}}</td>

                                            <td>{{$row->vehicle_no}}</td>

                                            <td>{{$row->name}}</td>

                                            <td>{{$row->gross_weight}}</td>

                                            <td>{{(new datetime($row->gross_date))->format('d-m-Y')}}</td>

                                            <td>{{$row->tare_weight}}</td>
                                            
                                            <td>{{(new datetime($row->tare_date))->format('d-m-Y')}}</td>
                                    
                                            <td>{{$row->net_weight}}</td>

                                            <td>{{$row->material}}</td>

                                            <td>{{$row->charges}}</td>

                                            @if($row->payment_mode==1)
														
                                            <td>CASH</td>
                                                    
                                            @elseif($row->payment_mode==2)
                                                    
                                            <td>CREDIT</td>
                                                    
                                            @endif

                                       
                                  
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

                    <div class="col-xl-3">
                        <!--begin::Products-->
                        <div class="card card-flush">
                            <!--begin::Card body-->
                            <div class="card-body">
                                <form id="kt_modal_transporter" class="form" method="GET" action="{{route('show_vehicle_report')}}">
                                <!--begin::Table-->
                                <div class="">
                                    <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                        <span class="required">Vehicle</span>
                                    </label>
                                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="false" data-placeholder="Select Account" name="vehicle" id="vehicle">
                                    <option class="dropdown-font" value="">Select Account...</option>
                                                        @foreach ($vehicle as $row)
                                                        <option value="{{$row->vehicle_no}}" {{ ($id == $row->vehicle_no) ? "selected" : "" }}>{{$row->vehicle_no}}</option>
                                                        
                                                        @endforeach
                                    </select>
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
                                <div class="mt-5">
                                        <button type="submit" id="transporter_submit" name="transporter_submit" class="btn btn-primary full-button">
                                            <span class="indicator-label">View Report</span>
                                            <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                </div>
                                </form>
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


<!--begin::Custom Javascript(used for report page only)-->
<script src="{{url('public/assets/js/custom/apps/ecommerce/sales/listing.js')}}"></script>
{{-- <script src="{{url('public/assets/js/custom/apps/ecommerce/customers/listing/listing.js')}}"></script> --}}
<!--end::Custom Javascript-->



<script>

// Class definition
var KTDatatablesExample = function () {
    // Shared variables
    var table = '#kt_datatable_example';
    var datatable;

    // Private functions
    var initDatatable = function () {
       

        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $('#kt_datatable_example').DataTable({
            "info": true,
            'pageLength': 10,
            "ordering": false
        });
        //console.log(datatable);
    }

    // Hook export buttons
    var exportButtons = () => {
        const documentTitle = 'Vehicle Report trtrhth';
        var buttons = new $.fn.dataTable.Buttons(table, {
            buttons: [
                {
                    extend: 'copyHtml5',
                    title: documentTitle
                },
                {
                    extend: 'excelHtml5',
                    title: documentTitle
                },
                {
                    extend: 'csvHtml5',
                    title: documentTitle
                },
                {
                    extend: 'pdf',
                    title: documentTitle,
                    orientation: 'landscape',
                }
            ]
        }).container().appendTo($('#kt_datatable_example_buttons'));

        // Hook dropdown menu click event to datatable export buttons
        const exportButtons = document.querySelectorAll('#kt_datatable_example_export_menu [data-kt-export]');
        exportButtons.forEach(exportButton => {
            exportButton.addEventListener('click', e => {
                e.preventDefault();

                // Get clicked export value
                const exportValue = e.target.getAttribute('data-kt-export');
                const target = document.querySelector('.dt-buttons .buttons-' + exportValue);

                // Trigger click event on hidden datatable export buttons
                target.click();
            });
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    // Public methods
    return {
        init: function () {
            table = document.querySelector('#kt_datatable_example');

            if ( !table ) {
                return;
            }

            initDatatable();
            exportButtons();
            handleSearchDatatable();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatablesExample.init();
});

</script>
@endsection