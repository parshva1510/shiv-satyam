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
										<h1 class="page-heading d-flex text-dark fw-bold flex-column justify-content-center my-0">View Weighment</h1>
										<!--end::Title-->
									</div>
									<!--end::Page title-->
									<form id="kt_modal_add_ticket" class="form" method="GET" action="{{route('ticket_form')}}">
									<!--begin::Actions-->
									
										<!--begin::Primary button-->
										<div class="text-center d-flex flex-stack">
                                       	 
                                       		<button type="submit" id="new_submit" class="btn btn-primary" >
                                            	<span class="indicator-label"  onclick="submitForm()">Add New Weighment</span>
                                            	<span class="indicator-progress">Please wait...
                                         		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        	</button>
                                    	</div>
									</form>
										
										<!--end::Primary button-->
									
									<!--end::Actions-->
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
										<!--begin::Card header-->
										<div class="card-header border-0 pt-6">
											<!--begin::Card title-->
											<div class="card-title">
												<!--begin::Search-->
												<div class="d-flex align-items-center position-relative my-1">
													<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
													<span class="svg-icon svg-icon-1 position-absolute ms-6">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
															<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
													<input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Customers" />
												</div>
												<!--end::Search-->
											</div>
											<!--begin::Card title-->
											<!--begin::Card toolbar-->
											<div class="card-toolbar flex-row-fluid justify-content-end mobflex">
												<!--begin::Toolbar-->
												<div class="d-flex justify-content-end mobileflex" data-kt-customer-table-toolbar="base">
													<!--begin::Daterangepicker-->
													<div class="w-225px me-3 mobilewidth">
													<input class="form-control form-control-solid w-100 mw-250px me-3" placeholder="Pick date range" id="kt_ecommerce_report_views_daterangepicker" />
													</div>
													<!--end::Daterangepicker-->
													<!--begin::Filter menu-->
													 
													<!--end::Filter menu-->
													<div class="card-title">
															<!--begin::Export buttons-->
															<div id="ticket_data_export" class="d-none"></div>
															<!--end::Export buttons-->
														</div>
														<div class="m-0">
															<!--begin::Export dropdown-->
															<button type="button" class="btn btn-light-primary full-button" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
															<span class="svg-icon svg-icon-2">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="currentColor" />
																	<path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="currentColor" />
																	<path opacity="0.3" d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="currentColor" />
																</svg>
															</span>Export
															</button>
															<!--begin::Menu-->
															<div id="ticket_data_export_menu" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" data-kt-menu="true">
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
															<div id="ticket_data_buttons" class="d-none"></div>
															<!--end::Hide default export buttons-->
														</div>
												</div>
												<!--end::Toolbar-->
												<!--begin::Group actions-->
												<div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
													<div class="fw-bold me-5">
													<span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
													<button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
												</div>
												<!--end::Group actions-->
												
											</div>
											<!--end::Card toolbar-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body pt-0">
											<!--begin::Table-->
											<table id="ticket_data" class="table align-middle table-row-dashed fs-6 gy-5" >
												<!--begin::Table head-->
												<thead>
													<!--begin::Table row-->
													<tr class="text-start text-gray-800 fw-bolder fs-7 text-uppercase gs-0">
														<th class="w-10px pe-2">
															<!-- <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
																<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#ticket_data .form-check-input" value="1" />
															</div> -->
														</th>
														<th class="min-w-30px">Ticket. No.</th>
														<th class="min-w-70px">Vehicle No.</th>
														<th class="min-w-150px">Transporter</th>
														<th class="min-w-70px">Date</th>
														<th class="min-w-70px">G. Weight</th>
														<th class="min-w-120px">G. Date</th>
														<th class="min-w-70px">T. Weight</th>
														<th class="min-w-120px">T. Date</th>
														<th class="min-w-70px">Net Weight</th>
														<th class="min-w-70px">Material</th>
														<th class="min-w-70px">Charge</th>
														<th class="min-w-70px">Payment Mode</th>
														<th class="min-w-70px">Remarks</th>
														<th class="text-end min-w-70px">Actions</th>
														

													</tr>
													<!--end::Table row-->
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
												
												<tbody class="fw-semibold text-gray-600">

													@foreach($data as $row)
													
													<tr>
														
														<!--begin::Checkbox-->
														<td>
															<!-- <div class="form-check form-check-sm form-check-custom form-check-solid">
																<input class="form-check-input" type="checkbox" value="1" />
															</div> -->
														</td>
														<!--end::Checkbox-->
														<input type="hidden" class="delete_id" value="{{$row->id}}">
														
														<td>{{$row->ticket_no}}</td>
													
														<td>{{$row->vehicle_no}}</td>	
														
														<td>{{$row->name}}</td>

														<td>@if(isset($row->cdate)){{(new DateTime ($row->cdate))->format('d-m-Y')}}@endif</td>

														<td>{{$row->gross_weight}}</td>

														<td>@if(isset($row->gross_date)){{(new DateTime($row->gross_date))->format('d-m-Y')}}@endif</td>

														<td>{{$row->tare_weight}}</td>
														
														<td>{{(new DateTime($row->tare_date))->format('d-m-Y')}}</td>
												
														<td>{{$row->net_weight}}</td>

														<td>{{$row->material}}</td>

														<td>{{$row->charges}}</td>
														

														@if($row->payment_mode==1)
														
															<td>CASH</td>
														
														@elseif($row->payment_mode==2)
														
															<td>CREDIT</td>
					
														@endif
														<td>{{$row->remarks}}</td>
					
														<td class="text-end">
																<a href="{{route('generate-pdf', $row->id) }}"  target="_blank"   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
																	<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																	
																	
																	<span class="svg-icon svg-icon-2">
																	<svg width="24" height="24" viewBox="0 0 24 24" id="meteor-icon-kit__solid-printer" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path fill-rule="evenodd" clip-rule="evenodd" d="M5.17071 22H3C1.34315 22 0 20.6569 0 19V12C0 10.3431 1.34315 9 3 9H5V1C5 0.447715 5.44772 0 6 0H18C18.5523 0 19 0.447715 19 1V9H21C22.6569 9 24 10.3431 24 12V19C24 20.6569 22.6569 22 21 22H18.8293C18.4175 23.1652 17.3062 24 16 24H8C6.69378 24 5.58254 23.1652 5.17071 22ZM7 2V9H17V2H7ZM8 20C7.44772 20 7 20.4477 7 21C7 21.5523 7.44772 22 8 22H16C16.5523 22 17 21.5523 17 21C17 20.4477 16.5523 20 16 20H8ZM4.5 12C5.32843 12 6 12.6716 6 13.5C6 14.3284 5.32843 15 4.5 15C3.67157 15 3 14.3284 3 13.5C3 12.6716 3.67157 12 4.5 12Z" fill="#758CA3"/></svg>
																	</span>
																		
																	
																	<!--end::Svg Icon-->
																</a>
																<a href="{{route('edit_ticket', $row->id) }}"   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
                                                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </a>

																	<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																	<!-- <span class="svg-icon svg-icon-3">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
																			<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
																		</svg>
																	</span> -->
																	<!--end::Svg Icon-->
																</a>
																@if(session('role')=="Admin")
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
																@endif
														</td>
														
														<!--end::Action=-->
													</tr>
													@endforeach
													
										
                                     
												</tbody>
												<!--end::Table body-->
											</table>
											<!--end::Table-->
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
						<!--end::Footer-->
    
@endsection

@section('pagescript')

<!--begin::Vendors Javascript(used for view weighment page only)-->
<!-- <script src="shiv_satyam/assets/plugins/custom/datatables/datatables.bundle.js"></script> -->
<!--end::Vendors Javascript-->

<!--begin::Custom Javascript(used for  view weighment page only)-->
<!-- <script src="shiv_satyam/assets/js/custom/apps/ecommerce/customers/listing/listing.js"></script>
<script src="shiv_satyam/assets/js/custom/apps/ecommerce/customers/listing/add.js"></script>
<script src="shiv_satyam/assets/js/custom/apps/ecommerce/customers/listing/export.js"></script>
<script src="shiv_satyam/assets/js/custom/apps/ecommerce/reports/views/views.js"></script> -->
<!--end::Custom Javascript-->

<!-- <script>
    jQuery(document).ready(function($){
        $('#datepick1510').flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            mode: "range"
        });
    });
</script> -->

<!--begin::Custom Javascript(used for  view weighment page only)-->
<script src="{{url('public/assets/js/custom/apps/ecommerce/customers/listing/listing.js')}}"></script>

<!--end::Custom Javascript-->
<script>

	// Class definition
	var KTDatatablesExample = function () {
		// Shared variables
		var table = '#ticket_data';
		var datatable;
		
    // Private functions
    var initDatatable = function () {
       

	   // Init datatable --- more info on datatables: https://datatables.net/manual/
	   datatable = $('#ticket_data').DataTable({
		   "info": true,
		   'pageLength': 20,
		   "ordering": false
	   });
	   //console.log(datatable);
   }

		// Hook export buttons
		var exportButtons = () => {
			const documentTitle = 'Weighment Report';
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
						customize: function (doc) {
                                // Here's where you can control the cell padding
                                doc.styles.tableHeader.margin =
                                  doc.styles.tableBodyOdd.margin =
                                  doc.styles.tableBodyEven.margin = [3, 3, 3, 3];
								  doc.pageMargins = [10, 10, 10,10];
								  doc.defaultStyle.fontSize = 8;
								  doc.styles.tableHeader.fontSize = 9;
								  doc.styles.title.fontSize = 20;
								  doc.content[1].margin = [ 25, 0, 25, 0 ] //left, top, right, bottom
                            },

						
						orientation: 'landscape',
						pageSize: 'a4',
						exportOptions: {
							columns: [1,2,3,4,5,6,7,8,9,10,11],
						}
					}
				]
			}).container().appendTo($('#ticket_data_buttons'));
	
			// Hook dropdown menu click event to datatable export buttons
			const exportButtons = document.querySelectorAll('#ticket_data_export_menu [data-kt-export]');
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
			const filterSearch = document.querySelector('[data-kt-customer-table-filter]');
			filterSearch.addEventListener('keyup', function (e) {
				datatable.search(e.target.value).draw();
			});
		}
		
		// Public methods
		return {
			init: function () {
				table = document.querySelector('#ticket_data');
	
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

<!-- date range change karvani -->

<script>
    $(document).ready(function($){
  $("#kt_customers_export_close").click(function(){
    $("#kt_customers_export_modal").modal('hide');
  });
});
</script>

<script>
var start = moment().subtract(29, "days");
var end = moment();

function cb(start, end) {
    $("#kt_ecommerce_report_views_daterangepicker").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
}

$("#kt_ecommerce_report_views_daterangepicker").daterangepicker({
    startDate: start,
    endDate: end,
    ranges: {
    "Today": [moment(), moment()],
    "Yesterday": [moment().subtract(1, "days"), moment().subtract(1, "days")],
    "Last 7 Days": [moment().subtract(6, "days"), moment()],
    "Last 30 Days": [moment().subtract(29, "days"), moment()],
    "This Month": [moment().startOf("month"), moment().endOf("month")],
    "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
    }
}, cb);

cb(start, end);


</script>




<!-- <script>
    $(document).ready(function () {
var table = $('#ticket_data').DataTable({
    scrollY: '200px',
    paging: false,
});

$('input.toggle-vis').on('click', function (e) {
    // e.preventDefault();

    // Get the column API object
    var column = table.column($(this).attr('data-column'));

    // Toggle the visibility
    column.visible(!column.visible());
});
});

</script> -->

{{--<script>
	$("#kt_ecommerce_report_views_daterangepicker").change(function(){
		var date=this.value;
		alert(date);
		$.ajax({
		
                    url:"{{url('getdata')}}"+"/"+date,
                    type:'GET',
                    success:function(response){
                 
                    }
                });
});

	</script>--}}

<script>
    $(document).ready(function() {
        // Add the date range filter
        $('#kt_ecommerce_report_views_daterangepicker').on('change', function() {
            var dateRange = $(this).val().split(' - ');
            var startDate = $.trim(dateRange[0]);
            var endDate = $.trim(dateRange[1]);
			alert(dateRange);alert(startDate);alert(endDate);
			//console.log(dateRange);
            // Loop through each row and show/hide based on date range
           /* $('#ticket_data tbody tr').each(function() {
				var soldDate = formatDate($(this).find('td:nth-child(15)').text());
				
				//console.log(soldDate);
                if (isDateInRange(soldDate, startDate, endDate)) {
					
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });*/
        });

		 // Function to format date as 'DD-MM-YYYY'
		 function formatDate(date) {
            var parts = date.split('-');
            return parts[1] + '-' + parts[0] + '-' + parts[2];
        }


        // Function to check if a date is within the specified range
        function isDateInRange(date, start, end) {
            var soldDate = new Date(date);
            var startDate = new Date(start);
            var endDate = new Date(end);

            if (startDate <= soldDate && soldDate <= endDate) {
                return true;
            }
            return false;
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
                    url:"{{url('delete_ticket')}}" +"/"+ id,
                    type:'GET',
                    success:function(response){
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success',
                            );
                            location.reload();
						//ahiya??ha location remove karu search kar how to redirect from jquery ajax
                            }
                        });
                    }
            });
        });
</script>



@endsection