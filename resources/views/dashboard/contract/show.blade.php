@extends('dashboard.layout.layout')

@section('content')
<style>
.features{
    text-align: center;
    position: relative;
}

.features::after{
    position: absolute;
    content: "";
    background-color: #00cfe8;
    left:0;
    width:46%;
    height: 1px;
        top:12px
}

.features::before{
    position: absolute;
    content: "";
    background-color: #00cfe8;
    right:0;
    width:46%;
    height: 1px;
    top:12px
}
</style>

<div class="content-body">
    <div id="user-profile">
        <div class="row">
            <div class="col-12">
                <div class="card profile-header mb-2 border-info">
                    <img class="card-img-top" src="{{ asset('dashboardAssets') }}/images/profile/user-uploads/timeline.jpg" alt="" />

                

                    <div class="profile-header-nav">
                        <nav class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                            <button class="btn btn-icon navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <i data-feather="align-justify" class="font-medium-5"></i>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div class="profile-tabs d-flex justify-content-between flex-wrap mt-1 mt-md-0">

                                    <ul class="nav nav-pills nav-fill mb-0">
                                        {{-- <li class="nav-item">
                                            <a class="nav-link active" id="profile-tab-fill" data-toggle="pill" href="#profile-fill" aria-expanded="true">
                                                {!! trans('dashboard.user.profile') !!}
                                            </a>
                                        </li> --}}
                                        {{-- <li class="nav-item">
                                            <a class="nav-link" id="order-tab-fill" data-toggle="pill" href="#order-fill" aria-expanded="false">
                                                {!! trans('dashboard.order.orders') !!}
                                            </a>
                                        </li> --}}
                                        {{-- <li class="nav-item">
                                            <a class="nav-link" id="transfer-tab-fill" data-toggle="pill"
                                                href="#transfer-fill" aria-expanded="false">
                                                {!! trans('dashboard.transfer_request.transfer_requests') !!}
                                            </a>
                                        </li> --}}
                                        {{-- <li class="nav-item">
                                            <a class="nav-link" id="wallet-tab-fill" data-toggle="pill"
                                                href="#wallet-fill" aria-expanded="false">
                                                {!! trans('dashboard.user.wallet') !!}
                                            </a>
                                        </li> --}}
                                        {{-- <li class="nav-item">
                                            <a class="nav-link" id="packages-tab-fill" data-toggle="pill"
                                                href="#packages-fill" aria-expanded="false">
                                                {!! trans('dashboard.driver.driver_packages') !!}
                                            </a>
                                        </li> --}}
                                    </ul>
                                    <div>
                                     
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <section id="profile-info">
            <div class="row">
                <div class="col-lg-9 col-12 order-1 order-lg-2">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="profile-fill" aria-labelledby="profile-tab-fill" aria-expanded="true">
                            <div class="card  border-info">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                            <label class="col-form-label col-md-4">{{ trans('dashboard.contract.building_date') }}</label>
                                            <div class="input-group mb-2 col-md-8">
                                                <input type="text" class="form-control" value="{{ $contract->building_date }}" aria-describedby="basic-addon-fullname" />
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label class="col-form-label col-md-4">{{ trans('dashboard.contract.aqar_number') }}</label>
                                                <div class="input-group mb-2 col-md-8">
                                                    <input type="text" class="form-control" value="{{ $contract->aqar_number }}" aria-describedby="basic-addon-phone" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                            <label class="col-form-label col-md-4">{{ trans('dashboard.contract.aqar_address') }}</label>
                                            <div class="input-group mb-2 col-md-8">
                                                <input type="text" class="form-control" value="{{ $contract->aqar_address }}" aria-describedby="basic-addon-email" />
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label class="col-form-label col-md-4">{{ trans('dashboard.contract.iban_num') }}</label>
                                                <div class="input-group mb-2 col-md-8">
                                                    <input type="text" class="form-control" value="{{ $contract->iban_num }}" aria-describedby="basic-addon-wallet" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                            <label class="col-form-label col-md-4">{{ trans('dashboard.contract.phone_for_owner') }}</label>
                                            <div class="input-group mb-2 col-md-8">
                                                <input type="text" class="form-control" value="{{ $contract->phone_for_owner }}" aria-describedby="basic-addon-calendar" />
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label class="col-form-label col-md-4">{{ trans('dashboard.contract.phone_for_citizen') }}</label>
                                                <div class="input-group mb-2 col-md-8">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-clock"><i data-feather="clock"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" value="{{ $contract->phone_for_citizen }}" aria-describedby="basic-addon-clock" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>                         
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </section>
        <!--/ profile info section -->
    </div>

</div>
@endsection

@section('vendor_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets') }}/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets') }}/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets') }}/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets') }}/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets') }}/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets') }}/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets') }}/vendors/css/pickers/flatpickr/flatpickr.min.css">
@endsection
@section('page_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets') }}/css/{{ LaravelLocalization::getCurrentLocaleDirection() }}/pages/page-profile.css">

<link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets') }}/css/{{ LaravelLocalization::getCurrentLocaleDirection() }}/pages/card-analytics.css">

<link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets') }}/css/{{ LaravelLocalization::getCurrentLocaleDirection() }}/pages/data-list-view.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

<link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets') }}/css/{{ LaravelLocalization::getCurrentLocaleDirection() }}/plugins/forms/pickers/form-flat-pickr.css">
<link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets') }}/css/{{ LaravelLocalization::getCurrentLocaleDirection() }}/plugins/forms/pickers/form-pickadate.css">

<link rel="stylesheet" href="{{ asset('dashboardAssets') }}/css/custom/custom_rate.css">
<style media="screen">
    div.dt-buttons {
        float: left;

    }
</style>
@endsection

@section('vendor_scripts')
    <script src="{{ asset('dashboardAssets') }}/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="{{ asset('dashboardAssets') }}/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="{{ asset('dashboardAssets') }}/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="{{ asset('dashboardAssets') }}/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="{{ asset('dashboardAssets') }}/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="{{ asset('dashboardAssets') }}/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="{{ asset('dashboardAssets') }}/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="{{ asset('dashboardAssets') }}/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>

    <script src="{{ asset('dashboardAssets') }}/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="{{ asset('dashboardAssets') }}/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="{{ asset('dashboardAssets') }}/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="{{ asset('dashboardAssets') }}/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="{{ asset('dashboardAssets') }}/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="{{ asset('dashboardAssets') }}/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
@endsection

@section('page_scripts')
<!-- BEGIN: Page JS-->
<script src="{{ asset('dashboardAssets') }}/js/scripts/pages/page-profile.js"></script>
<!-- END: Page JS-->

{{-- <script src="{{ asset('dashboardAssets') }}/js/scripts/forms/select/form-select2.js"></script> --}}
<script src="{{ asset('dashboardAssets') }}/js/scripts/tables/table-datatables-basic.js"></script>

<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>


@endsection
