@extends('dashboard.layout.layout')

@section('content')
<div id="user-profile">
    <div class="row">
        <div class="col-12">
            <div class="profile-header mb-2 border-info rounded">
                <div class="relative">
                    <div class="cover-container">
                        <img class="img-fluid bg-cover rounded-top w-100" src="{{ asset('dashboardAssets') }}/images/banner/banner-9.jpg" alt="{{ $client->fullname }}" style="height:345px;">
                    </div>
                    <div class="profile-img-container d-flex align-items-center justify-content-between">
                        <img src="{{ $client->avatar }}" class="rounded-circle img-border box-shadow-1" alt="Card image">
                        <div class="float-right">
                            <a href="{{ route('dashboard.client.edit',$client->id) }}" class="btn btn-icon btn-icon rounded-circle btn-primary mr-1">
                                <i class="feather icon-edit-2"></i>
                            </a>
                            {{-- <button type="button" class="btn btn-icon btn-icon rounded-circle btn-primary">
                                <i class="feather icon-settings"></i>
                            </button> --}}
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end align-items-center profile-header-nav rounded-bottom">
                    <nav class="navbar navbar-expand-sm w-100 pr-0">
                        <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"><i class="feather icon-align-justify"></i></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="nav navbar-nav d-flex justify-content-start w-75 ml-sm-auto" role="tablist">
                                <li class="nav-item px-sm-0">
                                    <a href="#profile" data-toggle="tab" id="profile-tab" aria-controls="profile" class="nav-link font-small-3" aria-selected="true">
                                        <i class="feather icon-user mr-50 font-medium-3"></i>
                                        {!! trans('dashboard.user.profile') !!}
                                    </a>

                                </li>
                                <li class="nav-item px-sm-0">
                                    <a href="#social" data-toggle="tab" id="social-tab" aria-controls="social" class="nav-link font-small-3" aria-selected="false">
                                        <i class="feather icon-globe mr-50 font-medium-3"></i>
                                        {!! trans('dashboard.user.orders') !!}
                                    </a>
                                </li>
                                <li class="nav-item px-sm-0">
                                    <a href="#orders" data-toggle="tab" id="orders-tab" aria-controls="orders" class="nav-link font-small-3" aria-selected="false">
                                        <i class="feather icon-briefcase mr-50 font-medium-3"></i>
                                        {!! trans('dashboard.user.sub_order') !!}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section id="profile-info" class="row">
        <!-- Basic datatable -->
        <div class="col-md-9">
            <div class="card border-info">

                <div class="card-body">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade show active" id="profile" aria-labelledby="profile-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">{{ trans('dashboard.user.fullname') }}</label>
                                        <div class="col-md-10 position-relative has-icon-left">
                                            <input type="text" value="{{ $client->fullname }}" class="form-control" readonly>
                                            <div class="form-control-position">
                                                <i class="feather icon-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">{{ trans('dashboard.general.phone') }}</label>
                                        <div class="col-md-10 position-relative has-icon-left">
                                        @if($client->phone != null)
                                            <input type="text" value="{{ $client->phone }}" class="form-control" readonly>
                                        @else
                                            <input type="text" value="{{trans('dashboard.client.not_have_phone')}}" class="form-control" readonly>
                                        @endif                                            <div class="form-control-position">
                                                <i class="feather icon-phone"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">{{ trans('dashboard.general.email') }}</label>
                                        <div class="col-md-10 position-relative has-icon-left">
                                        @if($client->email != null)
                                            <input type="text" value="{{ $client->email }}" class="form-control" readonly>
                                        @else
                                            <input type="text" value="{{trans('dashboard.client.not_have_email')}}" class="form-control" readonly>
                                        @endif
                                            <div class="form-control-position">
                                                <i class="feather icon-mail"></i>
                                            </div>
                                        </div>
                                    </div>
                               {{--     <div class="form-group row">
                                        <label class="col-form-label col-lg-2">{{ trans('dashboard.nationality.nationality') }}</label>
                                        <div class="col-md-10 position-relative has-icon-left">
                                            <input type="text" value="{{ optional($client->nationality)->name }}" class="form-control" readonly>
                                            <div class="form-control-position">
                                                <i class="feather icon-flag"></i>
                                        </div>
                                    </div> 
                                    </div>--}}
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">{{ trans('dashboard.country.country') }}</label>
                                        <div class="col-md-10 position-relative has-icon-left">
                                            <input type="text" value="{{ optional($client->country)->name }}" class="form-control" readonly>
                                            <div class="form-control-position">
                                                <i class="feather icon-flag"></i>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">{{ trans('dashboard.city.city') }}</label>
                                        <div class="col-md-10 position-relative has-icon-left">
                                            <input type="text" value="{{ optional($client->city)->name }}" class="form-control" readonly>
                                            <div class="form-control-position">
                                                <i class="feather icon-flag"></i>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">{{ trans('dashboard.general.identity_number') }}</label>
                                        <div class="col-md-4 position-relative has-icon-left">
                                            <input type="text" value="{{ $client->identity_number }}" class="form-control" readonly>
                                            <div class="form-control-position">
                                                <i class="feather icon-flag"></i>
                                            </div>
                                        </div>
                                        <label class="col-form-label col-lg-2">{{ trans('dashboard.general.date_of_birth') }}</label>
                                        <div class="col-md-4 position-relative has-icon-left">
                                            <input type="text" value="{{ $client->date_of_birth }}" class="form-control" readonly>
                                            <div class="form-control-position">
                                                <i class="feather icon-flag"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">{!! trans('dashboard.user.active_state') !!}</label>
                                        <div class="col-md-4 position-relative has-icon-left">
                                            <input type="text" value="{!! $client->is_active ? trans('dashboard.user.active') : trans('dashboard.user.not_active') !!}" class="form-control" readonly>
                                            <div class="form-control-position">
                                                <i class="feather icon-log-in"></i>
                                            </div>
                                        </div>
                                        <label class="col-form-label col-lg-2">{!! trans('dashboard.user.ban_state') !!}</label>
                                        <div class="col-md-4 position-relative has-icon-left">
                                            <input type="text" value="{!! $client->is_ban ? trans('dashboard.user.ban') : trans('dashboard.user.not_ban') !!}" class="form-control" readonly>
                                            <div class="form-control-position">
                                                <i class="feather icon-slash"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">{!! trans('dashboard.user.ban_reason') !!}</label>
                                        <div class="col-md-10">
                                            {!! Form::textarea("", $client->is_ban ? $client->ban_reason : null, ['class' => 'form-control','readonly']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="tab-pane fade " id="social" aria-labelledby="social-tab">
                            <div class="card border-info">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center">               
                                            </div>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered dataex-html5-selectors">
                                    <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>{!! trans('dashboard.reservation.patient_name') !!}</th>
                                                <th>{!! trans('dashboard.reservation.clinic_name') !!}</th>
                                                <th>{!! trans('dashboard.reservation.doctor_name') !!}</th>
                                                <th>{!! trans('dashboard.reservation.specialization') !!}</th>
                                                <th>{!! trans('dashboard.reservation.price') !!}</th>
                                                <th>{!! trans('dashboard.reservation.date') !!}</th>
                                                <th>{!! trans('dashboard.general.added_date') !!}</th>
                                                <th>{!! trans('dashboard.general.control') !!}</th>
                                            </tr>
                                        </thead>
                                    <tbody>
    
                                    </tbody>
                                                        
                                    </table>
                            </div>
                    <div class="d-flex justify-content-center">
                    </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade " id="orders" aria-labelledby="orders-tab">
                <div class="card border-info">
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered dataex-html5-selectors">
                            <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>{!! trans('dashboard.consultation.patient_name') !!}</th>
                        <th>{!! trans('dashboard.consultation.clinic_name') !!}</th>
                        <th>{!! trans('dashboard.consultation.doctor_name') !!}</th>
                        <th>{!! trans('dashboard.consultation.specialization') !!}</th>
                        <th>{!! trans('dashboard.consultation.price') !!}</th>
                        <th>{!! trans('dashboard.consultation.date') !!}</th>
                        <th>{!! trans('dashboard.general.added_date') !!}</th>
                        <th>{!! trans('dashboard.general.control') !!}</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">
                            
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
        <div class="col-md-3">
            <div class="card border-info">
                    <div class="card-header">
                        <h4 class="card-title">{!! trans('dashboard.notification.notification') !!}</h4>
                    </div>
                    <div class="card-content">
                    <div class="card-body">
                            <form action="{!! route('dashboard.notification.store') !!}" method="post" class="form">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $client->id }}">
                                <input type="hidden" name="user_type" value="client">
                            {{-- <div class="form-body"> --}}
                                <div class="form-group">
                                    <div class="col-12">
                                        {!! Form::text("title", null, ['class'=>"form-control",'placeholder'=>trans('dashboard.chat.type_title')]) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-12">
                                      {!! Form::textarea("body", null, ['class'=>"form-control",'rows' => 4,'placeholder'=>trans('dashboard.chat.type_message')]) !!}
                                    </div>
                                </div>
                            {{-- </div> --}}

                            <div class=" d-flex justify-content-end">
                                <button type="submit" class="btn btn-success waves-effect waves-light"><b><i class="feather icon-send mr-1"></i></b> {{ trans('dashboard.general.send') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /basic datatable -->
    </section>
</div>
@endsection
@section('vendor_styles')

<link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets') }}/vendors/css/tables/datatable/datatables.min.css">

@endsection
@section('page_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets') }}/{{ LaravelLocalization::getCurrentLocaleDirection() }}/css/pages/users.css">
<link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets') }}/{{ LaravelLocalization::getCurrentLocaleDirection() }}/css/pages/data-list-view.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

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

@endsection
@section('page_scripts')
<script src="{{ asset('dashboardAssets') }}/js/scripts/pages/user-profile.js"></script>
<script src="{{ asset('dashboardAssets') }}/js/scripts/datatables/datatable.js"></script>
<script src="{{ asset('dashboardAssets') }}/js/scripts/navs/navs.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
@endsection
