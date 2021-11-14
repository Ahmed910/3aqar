<div class="row">
 <!-- users edit media object start -->
    <div class="col-12">
        <div class="media mb-2">
            @if (isset($mowthq) && $mowthq->image)
            <img src="{{ $mowthq->image }}" alt="{{ $mowthq->fullname }}" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer image-preview" height="90" width="90" />
            @else
            <img src="{{ asset('dashboardAssets/images/backgrounds/placeholder_image.png') }}" alt="users avatar" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer image-preview" height="90" width="90" />
            @endif
            <div class="media-body mt-50">
                <h4>{{ isset($mowthq) ? $mowthq->fullname : trans('dashboard.general.image') }}</h4>
                <div class="col-12 d-flex mt-1 px-0">
                    <label class="btn btn-primary mr-75 mb-0" for="change-picture">
                        <span class="d-none d-sm-block">Change</span>
                        <input class="form-control" type="file" id="change-picture" name="image" hidden accept="image/png, image/jpeg, image/jpg" onchange="readUrl(this)" />
                        <span class="d-block d-sm-none">
                            <i class="mr-0" data-feather="edit"></i>
                        </span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <!-- users edit media object ends -->
    <div class="col-md-12 col-12">
        <div class="form-group">
            <label for="full-name-column">{{ trans('dashboard.mowthq.fullname') }} <span class="text-danger">*</span></label>
            {!! Form::text('fullname', null , ['class' => 'form-control','id' => "full-name-column" , 'placeholder' => trans('dashboard.mowthq.fullname')]) !!}
        </div>
    </div>

    <div class="col-md-12 col-12">
        <div class="form-group">
            <label for="full-name-column">{{ trans('dashboard.mowthq.phone') }} <span class="text-danger">*</span></label>
            {!! Form::number('phone', null , ['class' => 'form-control','id' => "full-name-column" , 'placeholder' => trans('dashboard.mowthq.phone')]) !!}
        </div>
    </div>

</div>

   <div class="row">
        <div class="form-group col-md-12">
            <label class="form-label" for="modern-country">{{ trans('dashboard.city.city') }} <span class="text-danger">*</span></label>

            {!! Form::select('city_id', $cities, null , ['class' => 'select2 w-100' , 'placeholder' => trans('dashboard.city.city') , 'id' => 'modern-country']) !!}
        </div>
	</div>


    {{-- <div class="row">
        <div class="form-group col-md-12">
            <label class="form-label" for="modern-country">{{ trans('dashboard.district.district') }} <span class="text-danger">*</span></label>

            {!! Form::select('district_id', $districts, null , ['class' => 'select2 w-100' , 'placeholder' => trans('dashboard.district.district') , 'id' => 'modern-country']) !!}
        </div>
	</div> --}}


  
        

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
