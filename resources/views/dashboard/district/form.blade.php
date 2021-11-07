<div class="bs-stepper-header">
	<div class="step" data-target="#step_locales">
		<button type="button" class="step-trigger">
			<span class="bs-stepper-box">
				<i data-feather="flag" class="font-medium-3"></i>
			</span>
			<span class="bs-stepper-label">
				<span class="bs-stepper-title">{!! trans('dashboard.general.locales') !!}</span>
				{{-- <span class="bs-stepper-subtitle">Setup Account Details</span> --}}
			</span>
		</button>
	</div>
	<div class="line">
		<i data-feather="chevron-right" class="font-medium-2"></i>
	</div>
	<div class="step" data-target="#step_public_data">
		<button type="button" class="step-trigger">
			<span class="bs-stepper-box">
				<i data-feather="settings" class="font-medium-3"></i>
			</span>
			<span class="bs-stepper-label">
				<span class="bs-stepper-title">{{ trans('dashboard.general.public_data') }}</span>
				{{-- <span class="bs-stepper-subtitle">Setup Account Details</span> --}}
			</span>
		</button>
	</div>
	{{-- <div class="line">
		<i data-feather="chevron-right" class="font-medium-2"></i>
	</div> --}}
</div>

<div class="bs-stepper-content">
	<div id="step_locales" class="content">
		<div class="content-header">
			<h5 class="mb-0">{!! trans('dashboard.general.locales') !!}</h5>
		</div>
		<div class="row">
			@foreach (array_chunk(config('translatable.locales'),1) as $chunk)
			<div class="form-group col-md-6">
				@foreach ($chunk as $locale)
				<div class="form-group col-md-12">
					<label class="form-label" for="modern-{{ $locale }}">{{ trans('dashboard.'.$locale.'.name') }} <span class="text-danger">*</span></label>
					{!! Form::text($locale."[name]", isset($district) ? $district->translate($locale)->name : null, ['class' => 'form-control' , 'placeholder' => trans('dashboard.'.$locale.'.name'),'id' => "modern-{{ $locale }}"]) !!}
				</div>
				<div class="form-group col-md-12">
					<label class="form-label" for="modern-{{ $locale }}">{{ trans('dashboard.'.$locale.'.slug') }} </label>
					{!! Form::text($locale."[slug]", isset($district) ? $district->translate($locale)->slug : null, ['class' => 'form-control' , 'placeholder' => trans('dashboard.'.$locale.'.slug'),'id' => "modern-{{ $locale }}"]) !!}
				</div>
				@endforeach
			</div>
			@endforeach
		</div>
		<div class="d-flex justify-content-end">
			<a class="btn btn-primary btn-next">
				<span class="align-middle d-sm-inline-block d-none">{!! trans('dashboard.general.next') !!}</span>
				<i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
			</a>
		</div>
	</div>

	<div id="step_public_data" class="content">
		<div class="content-header">
			<h5 class="mb-0">{{ trans('dashboard.general.public_data') }}</h5>
		</div>

		<div class="row">
	        <div class="form-group col-md-12">
	            <label class="form-label" for="modern-country">{{ trans('dashboard.country.country') }} <span class="text-danger">*</span></label>

				{!! Form::select('country_id', $countries, null , ['class' => 'select2 w-100' , 'placeholder' => trans('dashboard.country.country') , 'id' => 'modern-country']) !!}
	        </div>
	    </div>

		<div class="col-12">
			<div class="form-group">
				<label>{{ trans('dashboard.district.postal_code') }}
					<span class="text-danger">*</span>
				</label>
				{!! Form::text("postal_code", null, ['class' => 'form-control' , 'placeholder' => trans('dashboard.district.postal_code')]) !!}
			</div>
		</div>

		<div class="col-12">
			<div class="form-group">
				<label>{{ trans('dashboard.district.short_cut') }}
					<span class="text-danger">*</span>
				</label>
				{!! Form::text("short_cut", null, ['class' => 'form-control' , 'placeholder' => trans('dashboard.district.short_cut')]) !!}
			</div>
		</div>


		<div class="form-group row">
			<input type="text" id="pac-input" name="location"  value="{{ isset($district)? $district->location :old('lat')}}" class="form-control bg-white" placeholder="ابحث في الخريطة" style="width: 500px;"/>
			<div class="col-lg-12" style="width:100%; height:400px;" id="map"></div>
		</div>

		<div class="form-group row">
			<div class="col-lg-9">
			<input type="hidden" name="lat" value="{{ isset($district)? $district->lat :old('lat')}}" class="form-control" placeholder="latitude" id="lat" >
			</div>
		</div>
		<div class="form-group row">
			<div class="col-lg-9">
			<input type="hidden" name="lng" value="{{ isset($district)? $district->lng :old('lng')}}" class="form-control" placeholder="latitude" id="lng" >
			</div>
		</div>

	

		<div class="d-flex justify-content-between">
			<a class="btn btn-primary btn-prev">
				<i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
				<span class="align-middle d-sm-inline-block d-none">{!! trans('dashboard.general.previous') !!}</span>
			</a>
			<button class="btn btn-primary btn-next" type="submit">
				<span class="align-middle d-sm-inline-block d-none">{!! $btnSubmit !!}</span>
				<i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
			</button>
		</div>
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
<script>
        function initMap() {
			var lat =   24.633333;
			var lng = 46.716667;
            var myLatlng = new google.maps.LatLng(lat, lng);
            var map;
            var myOptions = {
                zoom: 12,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            map = new google.maps.Map(document.getElementById("map"), myOptions);
            // marker refers to a global variable
            marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                draggable: true
            });
            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function () {
                searchBox.setBounds(map.getBounds());
            });
            searchBox.addListener('places_changed', function () {
                var places = searchBox.getPlaces();
                if (places.length == 0) {
                    return;
                }
                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function (place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    // marker refers to a global variable
                    marker.setPosition(place.geometry.location);
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                    document.getElementById("lat").value = place.geometry.location.lat();
                    document.getElementById("lng").value = place.geometry.location.lng();
                        //   document.getElementById("address").value = place.geometry.location.address();
                    console.log(place);
                });
                map.fitBounds(bounds);
            });
            google.maps.event.addListener(marker, "dragend", function (event) {
                // get lat/lon of click
                var clickLat = event.latLng.lat();
                var clickLon = event.latLng.lng();
                // show in input box
                document.getElementById("lat").value = clickLat.toFixed(5);
                document.getElementById("lng").value = clickLon.toFixed(5);
                /*document.getElementById("address").value = event.latLng.address();*/
            });
        }
    </script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap&key=AIzaSyDRymdCLWxCwLHFnwv36iieKAMjiwk8sdc" ></script>

@endsection
