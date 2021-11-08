<div class="row">
    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="full-name-column">{{ trans('dashboard.frontage.name_ar') }} <span
                    class="text-danger">*</span></label>
            {!! Form::text('name_ar', null, ['class' => 'form-control', 'id' => 'full-name-column', 'placeholder' => trans('dashboard.frontage.name_ar')]) !!}
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="phone-column">{{ trans('dashboard.frontage.name_en') }} <span
                    class="text-danger">*</span></label>
            {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'phone-column', 'placeholder' => trans('dashboard.frontage.name_en')]) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="ordering-column">{{ trans('dashboard.frontage.ordering') }} <span
                    class="text-danger">*</span></label>
            {!! Form::number('ordering', null, ['class' => 'form-control', 'id' => 'ordering-column', 'placeholder' => trans('dashboard.frontage.ordering')]) !!}
        </div>
    </div>
</div>

<div class="col-12 d-flex justify-content-end">
    <button type="submit" class="btn btn-primary">{{ $btnSubmit }}</button>
</div>
</div>




@section('vendor_styles')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dashboardAssets') }}/vendors/css/forms/wizard/bs-stepper.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets') }}/vendors/css/forms/select/select2.min.css">
@endsection
@section('page_styles')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dashboardAssets') }}/css/{{ LaravelLocalization::getCurrentLocaleDirection() }}/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dashboardAssets') }}/css/{{ LaravelLocalization::getCurrentLocaleDirection() }}/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dashboardAssets') }}/css/{{ LaravelLocalization::getCurrentLocaleDirection() }}/plugins/forms/form-wizard.css">
@endsection
@section('vendor_scripts')
    <script src="{{ asset('dashboardAssets') }}/vendors/js/ui/jquery.sticky.js"></script>
    <script src="{{ asset('dashboardAssets') }}/vendors/js/forms/wizard/bs-stepper.min.js"></script>
    <script src="{{ asset('dashboardAssets') }}/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="{{ asset('dashboardAssets') }}/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection
@section('page_scripts')
    <script src="{{ asset('dashboardAssets') }}/js/scripts/forms/form-wizard.js"></script>
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
@endsection
