@extends('dashboard.layout.layout')

@section('content')
<div class="card border-info">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">{!! trans('dashboard.bank.edit_bank') !!}</h5>
    </div>
    <div class="card-body">
        <section class="modern-horizontal-wizard">
            <div class="bs-stepper wizard-modern modern-wizard-example">
                {!! Form::model($bank,['route' => ['dashboard.bank.update',$bank->id] , 'method' => 'PUT' , 'files' => true ,'class' => 'steps-validation wizard-circle','data-locale' => app()->getLocale() ]) !!}
                   @include('dashboard.bank.form',['btnSubmit' => trans('dashboard.general.edit')])
                {!! Form::close() !!}
            </div>
        </section>
    </div>

</div>
@endsection
