@extends('dashboard.layout.layout')

@if(\Illuminate\Support\Facades\Auth::check() && isset($clients_count))
@section('content')
    <!-- Stats Vertical Card -->
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card card-congratulations">
                <div class="card-body text-center">
                    <img
                        src="{{ asset('dashboardAssets') }}/images/elements/decore-right.png"
                        class="congratulations-img-left"
                        alt="card-img-left"
                    />
                    <img
                        src="{{ asset('dashboardAssets') }}/images/elements/decore-left.png"
                        class="congratulations-img-right"
                        alt="card-img-right"
                    />
                    <div class="avatar avatar-xl bg-primary shadow">
                        <div class="avatar-content">
                            <i data-feather="award" class="font-large-1"></i>
                        </div>
                    </div>
                    <div class="text-center">
                        <h1 class="mb-2 text-white">{!! trans('dashboard.messages.welcome',['name' => auth()->user()->name]) !!}</h1>
                        <p class="m-auto w-75">{{ trans('dashboard.messages.welcome_text', ['project_name' => setting('project_name')]) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12 animate__animated animate__fadeInUp">
            <div class="card">
                <div class="card-header flex-column align-items-start pb-0">
                    <div class="avatar bg-light-success p-50 m-0">
                        <div class="avatar-content">
                            <a href="{{ route('dashboard.client.index') }}">
                                <i class="fa fa-user text-success font-medium-5"></i>
                            </a>
                        </div>
                    </div>
                    <h2 class="fw-bolder mt-1">{{ $clients_count }}</h2>
                    <p class="card-text">{{ trans('dashboard.client.clients') }}</p>
                </div>
                <div id="line-area-chart-5"></div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12 animate__animated animate__fadeInUp">
            <div class="card">
                <div class="card-header flex-column align-items-start pb-0">
                    <div class="avatar bg-light-warning p-50 m-0">
                        <div class="avatar-content">
                            <a href="{{ route('dashboard.manager.index') }}">
                                <i class="fa fa-car text-success text-warning font-medium-5"></i>
                            </a>
                        </div>
                    </div>
                    <h2 class="fw-bolder mt-1">{{ $managers_count }}</h2>
                    <p class="card-text">{{ trans('dashboard.driver.drivers') }}</p>
                </div>
                <div id="line-area-chart-6"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-9">
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header rounded rounded d-flex align-items-start pb-0">
                            <div>
                                <h2 class="text-bold-700 mb-0">{{ $features_count }}</h2>
                                <p>{{ trans('dashboard.provider.providers') }}</p>
                            </div>
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <a href="{{ route('dashboard.feature.index') }}">
                                        <i class="fas fa-briefcase text-success font-medium-5"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header rounded rounded d-flex align-items-start pb-0">
                            <div>
                                <h2 class="text-bold-700 mb-0">{{$categories_count}}</h2>
                                <p>{{trans('dashboard.branch.branch_count')}}</p>
                            </div>
                            <div class="avatar bg-rgba-warning p-50 m-0">
                                <div class="avatar-content">
                                    <a href="{{ route('dashboard.category.index') }}?status=deactive">
                                        <i class="fas fa-store text-warning font-medium-5"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header rounded rounded d-flex align-items-start pb-0">
                            <div>
                                <h2 class="text-bold-700 mb-0">{{ $clients_is_active_count }}</h2>
                                <p>{{ trans('dashboard.general.active_client') }}</p>
                            </div>
                            <div class="avatar bg-rgba-primary p-50 m-0">
                                <div class="avatar-content">
                                    <a href="{{ route('dashboard.client.index') }}?status=deactive">
                                        <i class="fas fa-check-circle text-primary font-medium-5" ></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header rounded rounded d-flex align-items-start pb-0">
                            <div>
                                <h2 class="text-bold-700 mb-0">{{ $clients_is_inactive_count }}</h2>
                                <p>{{ trans('dashboard.client.deacive_clients') }}</p>
                            </div>
                            <div class="avatar bg-rgba-danger p-45 m-0">
                                <div class="avatar-content">
                                    <a href="{{ route('dashboard.client.index') }}?status=deactive">
                                        <i class="fas fa-exclamation-circle text-danger font-medium-5"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header rounded rounded d-flex align-items-start pb-0">
                            <div>
                                <h2 class="text-bold-700 mb-0">{{ $clients_is_ban_count }}</h2>
                                <p>{{ trans('dashboard.client.banned_clients') }}</p>
                            </div>
                            <div class="avatar bg-rgba-danger p-45 m-0">
                                <div class="avatar-content">
                                    <a href="{{ route('dashboard.client.index') }}?status=ban">
                                        <i class="fas fa-exclamation-circle text-danger font-medium-5"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header rounded rounded d-flex align-items-start pb-0">
                            <div>
                                <h2 class="text-bold-700 mb-0">{{ $ads_count }}</h2>
                                <p>{{ trans('dashboard.driver.deacive_drivers') }}</p>
                            </div>
                            <div class="avatar bg-rgba-danger p-45 m-0">
                                <div class="avatar-content">
                                    <a href="{{ route('dashboard.ad.index') }}?status=deactive">
                                        <i class="fas fa-exclamation-circle text-danger font-medium-5"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="row">
                <div class="col-12">
                    <div class="card text-center" style="color: #ffffff;display: flex;align-items: center;justify-content: center;">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                    <div class="avatar-content">
                                        <i class="fa fa-clock text-info font-medium-5"></i>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="clock text-center">
                                        <span id="Date" class="" style="color: #ffffff"></span>
                                        <p id="islamicDate" class="" style="color: #ffffff"></p>
                                        <span class="">
                                            <ul style="color: #ffffff">
                                                <li id="hours"></li>
                                                <li id="point">:</li>
                                                <li id="min"></li>
                                                <li id="point">:</li>
                                                <li id="sec"></li>
                                            </ul>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Stats Vertical Card -->
   

   
    
@endsection

@include('dashboard.home.scripts')
@endif
