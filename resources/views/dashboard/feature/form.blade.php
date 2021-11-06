<div class="row">
    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="full-name-column">{{ trans('dashboard.feature.name_ar') }} <span class="text-danger">*</span></label>
            {!! Form::text('name_ar', null , ['class' => 'form-control','id' => "full-name-column" , 'placeholder' => trans('dashboard.feature.name_ar')]) !!}
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="phone-column">{{ trans('dashboard.feature.name_en') }} <span class="text-danger">*</span></label>
            {!! Form::text('name', null , ['class' => 'form-control','id' => "phone-column" , 'placeholder' => trans('dashboard.general.name_en')]) !!}
        </div>
    </div>
</div>


    @if(! isset($feature))
        <div class="row">
	        <div class="form-group col-md-12">
	            <label class="form-label" for="modern-feature">{{ trans('dashboard.feature.data_type') }} <span class="text-danger">*</span></label>
                	<select name="data_type" class="form-group select2" data-placeholder="day" style="width:100%">
                        <option value="text">{{ trans('dashboard.feature.text') }}</option>
                        <option value="number">{{ trans('dashboard.feature.number') }}</option>
                        <option value="switch">{{ trans('dashboard.feature.switch') }}</option>
                    </select>
	        </div>
	    </div>
    @else
          <div class="row">
	        <div class="form-group col-md-12">
	            <label class="form-label" for="modern-feature">{{ trans('dashboard.feature.dtat_type') }} <span class="text-danger">*</span></label>
                	<select name="data_type" class="select2" data-placeholder="day">
                        <option value="text" @if($feature->data_type=='text')selected @endif>{{ trans('dashboard.feature.type.text') }}</option>
                        <option value="number" @if($feature->data_type=='number')selected @endif>{{ trans('dashboard.feature.type.number') }}</option>
                        <option value="switch" @if($feature->data_type=='switch')selected @endif>{{ trans('dashboard.feature.type.switch') }}</option>
                    </select>
	        </div>
	    </div>
    @endisset
        

    <div class="col-12 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">{{ $btnSubmit }}</button>
    </div>
</div>




@section('vendor_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets') }}/vendors/css/forms/wizard/bs-stepper.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets') }}/vendors/css/forms/select/select2.min.css">
@endsection
@section('page_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets') }}/css/{{ LaravelLocalization::getCurrentLocaleDirection() }}/core/menu/menu-types/horizontal-menu.css">
<link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets') }}/css/{{ LaravelLocalization::getCurrentLocaleDirection() }}/plugins/forms/form-validation.css">
<link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets') }}/css/{{ LaravelLocalization::getCurrentLocaleDirection() }}/plugins/forms/form-wizard.css">
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