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
                    <h1 class="page-heading d-flex text-dark fw-bold flex-column justify-content-center my-0">Change Password</h1>
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
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Content-->
                    <div id="kt_account_settings_signin_method" class="collapse show">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Email Address-->
                            <div class="d-flex flex-wrap align-items-center">
                                <div id="kt_signin_password_edit" class="flex-row-fluid">
                                    <!--begin::Form-->
                                    <form id="kt_signin_change_password" class="form" novalidate="novalidate">
                                        <div class="row mb-1">
                                            <div class="col-lg-4">
                                                <div class="fv-row mb-0">
                                                    <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Current Password</label>
                                                    <input type="password" class="form-control form-control-lg form-control-solid" name="currentpassword" id="currentpassword" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="fv-row mb-0">
                                                    <label for="newpassword" class="form-label fs-6 fw-bold mb-3">New Password</label>
                                                    <input type="password" class="form-control form-control-lg form-control-solid" name="newpassword" id="newpassword" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="fv-row mb-0">
                                                    <label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">Confirm New Password</label>
                                                    <input type="password" class="form-control form-control-lg form-control-solid" name="confirmpassword" id="confirmpassword" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-text mb-5">Password must be at least 8 character and contain symbols</div>
                                        <div class="d-flex">
                                            <button id="kt_password_submit" type="button" class="btn btn-primary me-2 px-6">Update Password</button>
                                            <button id="kt_password_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                                        </div>
                                    </form>
                                    <!--end::Form-->
                                </div>
                            </div>
                            <!--end::Email Address-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Content-->
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

		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="{{url('public/assets/js/custom/account/settings/signin-methods.js')}}"></script>
		<script src="{{url('public/assets/js/custom/account/settings/profile-details.js')}}"></script>
		<script src="{{url('public/assets/js/custom/account/settings/deactivate-account.js')}}"></script>
		<script src="{{url('public/assets/js/custom/pages/user-profile/general.js')}}"></script>
		<script src="{{url('public/assets/js/widgets.bundle.js')}}"></script>
		<script src="{{url('public/assets/js/custom/widgets.js')}}"></script>
		<script src="{{url('public/assets/js/custom/apps/chat/chat.js')}}"></script>
		<script src="{{url('public/assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
		<script src="{{url('public/assets/js/custom/utilities/modals/create-app.js')}}"></script>
		<script src="{{url('public/assets/js/custom/utilities/modals/offer-a-deal/type.js')}}"></script>
		<script src="{{url('public/assets/js/custom/utilities/modals/offer-a-deal/details.js')}}"></script>
		<script src="{{url('public/assets/js/custom/utilities/modals/offer-a-deal/finance.js')}}"></script>
		<script src="{{url('public/assets/js/custom/utilities/modals/offer-a-deal/complete.js')}}"></script>
		<script src="{{url('public/assets/js/custom/utilities/modals/offer-a-deal/main.js')}}"></script>
		<script src="{{url('public/assets/js/custom/utilities/modals/two-factor-authentication.js')}}"></script>
		<script src="{{url('public/assets/js/custom/utilities/modals/users-search.js')}}"></script>
		<!--end::Custom Javascript-->
@endsection

