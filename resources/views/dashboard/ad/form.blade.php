<div class="row">
    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="full-name-column">{{ trans('dashboard.ad.name_ar') }} <span class="text-danger">*</span></label>
            {!! Form::text('name_ar', null , ['class' => 'form-control','id' => "full-name-column" , 'placeholder' => trans('dashboard.ad.name_ar')]) !!}
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="phone-column">{{ trans('dashboard.ad.name_en') }} <span class="text-danger">*</span></label>
            {!! Form::text('name', null , ['class' => 'form-control','id' => "phone-column" , 'placeholder' => trans('dashboard.ad.name_en')]) !!}
        </div>
    </div>
</div>
  @if(! isset($ad))
        <div class="row">
	        <div class="form-group col-md-12">
	            <label class="form-label" for="modern-ad">{{ trans('dashboard.category.type') }} <span class="text-danger">*</span></label>
                	<select name="type" class="form-group select2" data-placeholder="day" style="width:100%">
                        <option value="sale">{{ trans('dashboard.category.sale') }}</option>
                        <option value="rent">{{ trans('dashboard.category.rent') }}</option>
                    </select>
	        </div>
	    </div>
    @else
          <div class="row">
	        <div class="form-group col-md-12">
	            <label class="form-label" for="modern-category">{{ trans('dashboard.category.type') }} <span class="text-danger">*</span></label>
                	<select name="type" class="select2" data-placeholder="day">
                        <option value="sale" @if($category->type=='sale')selected @endif>{{ trans('dashboard.category.sale') }}</option>
                        <option value="rent" @if($category->type=='rent')selected @endif>{{ trans('dashboard.category.rent') }}</option>
                    </select>
	        </div>
	    </div>
    @endisset

    <div class="form-group">
        <div class="row">
            <label class="font-medium-1 col-md-2">{{ trans('dashboard.feature.feature') }} <span
                    class="text-danger">*</span></label>
            <div class="col-md-10">
                {!! Form::select("features[]", $features, isset($category) ? $category->features : null, ['class' => 'select2 form-control', 'multiple' => 'multiple']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label class="font-medium-1 col-md-2">{{ trans('dashboard.frontage.frontage') }} <span
                    class="text-danger">*</span></label>
            <div class="col-md-10">
                {!! Form::select("frontages[]", $frontages, isset($category) ? $category->frontages : null, ['class' => 'select2 form-control', 'multiple' => 'multiple']) !!}
            </div>
        </div>
    </div>

    
    <div class="form-group">
        <div class="row">
            <label class="font-medium-1 col-md-2">{{ trans('dashboard.category.periods') }} <span
                    class="text-danger">*</span></label>
            <div class="col-md-10">
                {!! Form::select("periods[]", $periods, isset($category) ? $category->periods : null, ['class' => 'select2 form-control', 'multiple' => 'multiple']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label class="font-medium-1 col-md-2">{{ trans('dashboard.category.populations') }} <span
                    class="text-danger">*</span></label>
            <div class="col-md-10">
                {!! Form::select("population_types[]", $populations, isset($category) ? $category->population_types : null, ['class' => 'select2 form-control', 'multiple' => 'multiple']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label class="font-medium-1 col-md-2">{{ trans('dashboard.category.residences') }} <span
                    class="text-danger">*</span></label>
            <div class="col-md-10">
                {!! Form::select("residence_types[]", $populations, isset($category) ? $category->residence_types : null, ['class' => 'select2 form-control', 'multiple' => 'multiple']) !!}
            </div>
        </div>
    </div>

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
