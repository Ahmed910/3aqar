@extends('dashboard.layout.layout')

@section('content')
<div class="card border-info">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">{!! trans('dashboard.frontage.edit_frontage') !!}</h5>
    </div>
    <div class="card-body">
        <section class="modern-horizontal-wizard">
            <div class="bs-stepper wizard-modern modern-wizard-example">
                {!! Form::model($frontage,['route' => ['dashboard.frontage.update',$frontage->id] , 'method' => 'PUT' , 'files' => true ,'class' => 'steps-validation wizard-circle','data-locale' => app()->getLocale() ]) !!}
                   @include('dashboard.frontage.form',['btnSubmit' => trans('dashboard.general.edit')])
                {!! Form::close() !!}
            </div>
        </section>
    </div>

</div>
@endsection
