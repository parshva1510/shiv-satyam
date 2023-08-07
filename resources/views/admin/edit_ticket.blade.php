<!-- <option value="1">Cash</option> -->
@extends('admin.layout.layout')
@section('mainsection')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6 mb-5 mt-5">
            <form id="kt_modal_new_target_form" class="form" method="POST" action= "{{!empty($transporter)?route('update_ticket'):route('add_ticket')}}" >
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container new-full-width container-xxl d-flex flex-stack">
                
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold flex-column justify-content-center my-0">{{!empty($transporter)?'Edit Ticket':'Create New Ticket'}}</h1>
                    <!--end::Title-->
                </div>
                            <div  style= "display: flex; justify-content: flex-end;">
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
                                            <!-- data kya 217 no ni id no ? -->
                                            <!--begin::Datepicker-->
                                             <input class="form-control form-control-solid ps-12 pn" id="cdate" placeholder="Select a date" name="cdate" value="{{(new DateTime($transporter['cdate']))->format('d-m-Y')}}"/>
                                            <!--end::Datepicker-->
                                    </div>
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
                    <div class="card-body mobile-padding">
                        <!--begin::Heading-->
                        <div class="card-px text-center pt-9 pb-9">
                            <!--begin:Add Form-->
                            <div id="addticket">
                                
                                    @csrf
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Label-->
                                        <div class="col-md-4 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                                <span class="required">Ticket No.</span>
                                               </label>
                                           
                                            <input type="hidden" name="edit_sr_no" value="{{$transporter['sr_no']}}">
                                            <input type="number" min="0" class="form-control form-control-solid" placeholder="" name="ticket_no" id="ticket_no" value="{{$transporter['ticket_no']}}" readonly>
                                        </div>
                                        <!--end::Label-->
                                        
                                        <!--begin::Label-->
                                        <div class="col-md-4 fv-row">
                                            <div class="row">

                                            
                                                <div class="col-md-12">
                                                    <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                                        <span class="required">Transporter</span>
                                                      
                                                    </label>
                                                    <select class="form-select form-select-solid pn"  style="pointer-events: none;" data-control="select2" data-hide-search="false" data placeholder="Select Account"name="transpoter_no"  required>
                                                        <option class="dropdown-font" value="">Select Account...</option>
                                                        @foreach ($tr_data as $row)
                                                        
                                                        <option value="{{$row->sr_no}}" {{(( !empty($transporter['transporter']['name']) && $transporter['transporter']['name']==$row->name))? "selected":""}}> {{($row->name).'-'.('SS'.$row->sr_no)}} </option>
                                                     
                                                        @endforeach
                                                      
                                         
                                                    </select>
                                                </div>
                                                
                                                
                                            </div>
                                        </div>
                                        <!--end::Label-->	
                                        <!--begin::Label-->
                                        <div class="col-md-4 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                                <span class="required">Vehicle No.</span>
                                            </label>
                                            <input id="NUMBERPLATE" type="text" class="form-control form-control-solid" placeholder="GJ12PM1234" 
                                                name="vehical_no" id="vehical_no" title="Please enter a valid vehicle number." value= "{{$transporter['vehicle_no']}}"
                                                 required oninput="this.value = this.value.toUpperCase();" maxlength="10"  required/>
                                                
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
                                            <input type="number"  id="gross_weight"  class="form-control form-control-solid amount-input" placeholder="0" name="gross_weight" value="{{$transporter['gross_weight']}}" style=" -webkit-appearance: none;"/>
                                           
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
                                                
                                                <input class="form-control form-control-solid ps-12" id="gross_date" placeholder="Select a date" name="gross_date" value="{{(new DateTime($transporter->gross_date .' '. $transporter->gross_time))->format('d-m-Y H:i')}}" />
                                                <!--end::Datepicker-->
                                            </div>
                                      

                                        </div>
                                        <!--end::Label-->

                                        <!--begin::Label-->
                                        <div class="col-md-3 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                                <span class="required">Tare Weight (KG)</span>
                                            </label>
                                            <input type="number" id="tare_wight" min="0" class="form-control form-control-solid amount-input" placeholder="0" name="tare_wight" value="{{$transporter['tare_weight']}}"/>
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
                                                <input class="form-control form-control-solid ps-12" id="tare_date" placeholder="Select a date" name="tare_date" value="{{(new DateTime($transporter->tare_date .' '. $transporter->tare_time))->format('d-m-Y H:i')}}"/>
                                                <!--end::Datepicker-->
                                            </div>
                                        </div>
                                        <!--end::Label-->
                                                                
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Label-->
                                        <!-- <div class="col-md-3 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                                <span class="required">Net Weight</span>
                                            </label>
                                            <input  id="net_weight" type="number" min="0" class="form-control form-control-solid" placeholder="0" name="net_weight" value="{{$transporter['net_weight']}}" required/>
                                        </div> -->
                                        <div class="col-md-3 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                                <span class="required">Net Weight (KG)</span>
                                            </label>
                                            <input type="number" class="form-control form-control-solid" name="net_weight" id="net_weight" value="{{$transporter['net_weight']}}" />
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Label-->
                                        <div class="col-md-3 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                                <span class="required">Material</span>
                                            </label>
                                            
                                            <input id="field2" type="text" class="form-control form-control-solid" placeholder="MATERIAL"  name="material" style="text-transform:uppercase" value="{{$transporter['material']}}" />
                                                    <datalist id="material">
                                                            @foreach($material as $item)
                                                                <option value="{{$item->material}}">{{$item->material}}</option>
                                                            @endforeach
                                                    </datalist>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Label-->
                                        <div class="col-md-3 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                                <span class="required">Charge</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-currency-rupee"></i></span>
                                               
                                                <input id="charges" type="number" min="0" class="form-control form-control-solid" placeholder="0" name="charge" value="{{$transporter['charges']}}"/>
                                               
                                            </div>
                                        </div>
                                        <!--end::Label-->	
                                        <!--begin::Col-->                         
                                        <div class="col-md-3 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bolder mb-2">Payment Mode</label>
                                            <select class="form-select form-select-solid" id="select-payment" data-control="select2" data-hide-search="true" data-placeholder="Select Payment Mode" name="payment_mode" value="">
                                            <option value="">Select Mode...</option>
                                            <option value="1" {{ $transporter['payment_mode'] == "1" && !empty($transporter['payment_mode']) ? 'selected' : '' }} selected>CASH</option>
                                            <option value="2" {{isset($transporter['payment_mode']) && $transporter['payment_mode'] == "2" ? 'selected' : '' }}>CREDIT</option>                       
                                            </select>
                                        
                                        </div>
                                        <!--end::Col-->						
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                
                                    <div class="d-flex flex-column mb-8">
                                        <label class="d-flex align-items-center fs-6 fw-bolder mb-2">Remarks</label>
                                       
                                        <textarea class="form-control form-control-solid" rows="3" name="remarks" id="remark" style="text-transform:capitalize"  placeholder="Remarks" >{{($transporter['remark'])}}</textarea>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="text-center d-flex flex-stack"  style= "display: flex; justify-content: flex-end;">
                                        <button type="submit" id="kt_modal_new_target_form" class="btn btn-primary" >
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                    
                                </form>
                            </div>
                            <!--end:Form-->
                            <!--Begin Edit Form-->
                           
                            <!--End Edit form-->
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

<script src="{{url('public/assets/js/custom/apps/ecommerce/customers/listing/listing.js')}}"></script>
<script src="{{url('public/assets/js/custom/apps/ecommerce/customers/listing/add.js')}}"></script>
<script src="{{url('public/assets/js/custom/apps/ecommerce/customers/listing/export.js')}}"></script>
<script src="{{url('public/assets/js/custom/apps/ecommerce/reports/views/views.js')}}"></script>
<script>
    
    </script>

<script>
  jQuery(document).ready(function($){

    var currentDateTime = new Date();

    $('#gross_date').flatpickr({

      dateFormat: "d-m-Y H:i",
        
    });
    @if(session('role') <>"Admin")
        $('input#gross_date').prop( 'disabled', 'disabled' );
        $('input#tare_date').prop( 'disabled', 'disabled' );
        $('input#charges').prop( 'disabled', 'disabled' );
    @endif
    $('#tare_date').flatpickr({
      dateFormat: "d-m-Y H:i",
    });
    $('#cdate').flatpickr({
   
      dateFormat: "d-m-Y ",
      //defaultDate: currentDateTime
    });
  });
</script>


<!-- <script>
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
    </script> -->
    
    
    <!-- <script>
    var pattern = /^[A-Z]{2}\d{2}[A-Z]{2}\d{4}$/;

    document.addEventListener('DOMContentLoaded', function() {
        var input = document.getElementById('NUMBERPLATE');
        input.addEventListener('input', function() {
            var value = this.value;
            if (pattern.test(value)) {
                console.log('Valid vehicle number: ' + value);
                document.getElementById('number_error').textContent = "";
            } else {
                console.log('Invalid vehicle number: ' + value);
                document.getElementById('number_error').textContent = "Please add a valid vehicle number";
            }
        });
    });

    function submitForm() {
        var vehicleNumber = document.getElementById('NUMBERPLATE').value;
        if (vehicleNumber === '' || !pattern.test(vehicleNumber)) {
            Swal.fire({
                text: "Sorry, looks like there are some errors detected, please try again.",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
            return false; // Prevent form submission
        } else {
            Swal.fire({
                text: "Form has been successfully submitted!",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            }).then(function(t) {
                if (t.isConfirmed) {
                    // Hide the Swal alert or perform any other action
                }
            });
        }
    }
</script> -->








    
    <!-- <script>
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
    </script> -->
    <!-- <script>
        $("#kt_modal_new_target_form").submit(function(){
            var grossweight = document.getElementById('gross_weight').value;
            var tareweight = document.getElementById('tare_wight').value;
            var netweight = document.getElementById('net_weight').value;
            var charge = document.getElementById('charge').value;
        if(grossweight  === '' && tareweight === ''&& netweight ==='' && charge ==='')
        {
            Swal.fire({
                text: "Sorry, looks like there are some errors detected, please try again.",
                icon: "error",
            });
        // Prevent form submission
        } else {
            console.log("updated");
            
            Swal.fire({
                position: 'middle-center',
                icon: 'success',
                title: 'Ticket data has been successfully updated!',
                showConfirmButton: false,
                timer: 1500
                }).then(function() {
                $("#kt_modal_new_target_form").submit();
            
           });
        }
    });
</script> -->
<script>
     var pattern = /^[A-Z]{2}\d{2}[A-Z]{2}\d{4}$/;
        document.addEventListener('DOMContentLoaded', function()
        {
        // var input = document.getElementById('NUMBERPLATE');
        // input.addEventListener('input', function() {
        //     var value = this.value;
        //     if (pattern.test(value)) {
        //         console.log('Valid vehicle number: ' + value);
        //         document.getElementById('number_error').textContent = "";
        //     } else {
        //         console.log('Invalid vehicle number: ' + value);
        //         document.getElementById('number_error').textContent = "Please add a valid vehicle number";
        //     }
        // });
    });
        $("#kt_modal_new_target_form").submit(function(){
            var vehicleNumber = document.getElementById('NUMBERPLATE').value;
            var grossweight = document.getElementById('gross_weight').value;
            var tareweight = document.getElementById('tare_wight').value;
            var netweight = document.getElementById('net_weight').value;
            var charge = document.getElementById('charges').value;
            if (vehicleNumber === '' || !pattern.test(vehicleNumber) ){
     
                document.getElementById('number_error').textContent = "Please add a valid vehicle number";  
                return false;
              

    }else  {
       
                document.getElementById('number_error').textContent = "";
              
            }
        if(grossweight  === '' && tareweight === ''&& netweight ==='' && charge ==='' &&  !pattern.test(vehicleNumber))
        {
            Swal.fire({
                text: "Sorry, looks like there are some errors detected, please try again.",
                icon: "error",
            });
            return false; // Prevent form submission
          }  else {
            Swal.fire({
                position: 'middle-center',
                icon: 'success',
                title: 'Transporter data has been successfully updated!',
                showConfirmButton: false,
                timer: 1500
                }).then(function() {
                $("#kt_modal_new_target_form").submit();
           });
        }
        
    });
</script>
<script>
$(document).ready(function () {
    // Select the input fields for gross weight, tare weight, and net weight
    var $grossWeightInput = $('#gross_weight');
    var $tareWeightInput = $('#tare_wight'); // Change 'tare_weight' to 'tare_wight'
    var $netWeightInput = $('#net_weight');

    // Calculate and update the net weight whenever the gross or tare weight changes
    $('.amount-input').on('input', function () {
        var grossWeight = parseFloat($grossWeightInput.val());
        var tareWeight = parseFloat($tareWeightInput.val());
        var netWeight = grossWeight - tareWeight;

        // Update the net weight input field with the calculated value
        $netWeightInput.val(netWeight);

        // Convert the net weight to words and update the appropriate input field (if needed)
        // You can call the NumToWord function here if you have its implementation
        // NumToWord(netWeight, 'ankers');
    });
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
