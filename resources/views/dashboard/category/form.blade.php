<div class="row">
    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="full-name-column">{{ trans('dashboard.category.name_ar') }} <span class="text-danger">*</span></label>
            {!! Form::text('name_ar', null , ['class' => 'form-control','id' => "full-name-column" , 'placeholder' => trans('dashboard.category.name_ar')]) !!}
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="phone-column">{{ trans('dashboard.category.name_en') }} <span class="text-danger">*</span></label>
            {!! Form::text('name', null , ['class' => 'form-control','id' => "phone-column" , 'placeholder' => trans('dashboard.category.name_en')]) !!}
        </div>
    </div>
</div>
  @if(! isset($category))
        <div class="row">
	        <div class="form-group col-md-12">
	            <label class="form-label" for="modern-category">{{ trans('dashboard.category.type') }} <span class="text-danger">*</span></label>
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


    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="ordering-column">{{ trans('dashboard.category.ordering') }} <span
                        class="text-danger">*</span></label>
                {!! Form::number('ordering', null, ['class' => 'form-control', 'id' => 'ordering-column', 'placeholder' => trans('dashboard.frontage.ordering')]) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        @if(isset($category))
            @foreach ($category->featuresPivot as $featurePivot)
                <div class="row col-12">
                    <label class="font-medium-1 col-md-2">{{ trans('dashboard.feature.feature') }} <span class="text-danger">*</span></label>
                    <div class="col-md-4">
                        {!! Form::select("features[$loop->iteration][feature_id]", $features, $featurePivot->feature_id, ['class' => 'select2 form-control']) !!}
                    </div>
                    <div class="col-md-4">
                        {!! Form::number("features[$loop->iteration][ordering]", $featurePivot->ordering, ['class' => 'form-control', 'id' => 'ordering-column', 'placeholder' => trans('dashboard.frontage.ordering')]) !!}
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-icon btn-success mr-1 mb-1 waves-effect waves-light add"><i class="icofont-plus"></i></button>
                        <button type="button" class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light minus"><i class="icofont-bin"></i></button>
                    </div>
                </div>
            @endforeach
        @else
            <div class="row col-12">
                <label class="font-medium-1 col-md-2">{{ trans('dashboard.feature.feature') }} <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    {!! Form::select("features[0][feature_id]", $features, isset($category) ? $category->features : null, ['class' => 'select2 form-control']) !!}
                </div>
                <div class="col-md-4">
                    {!! Form::number('features[0][ordering]', null, ['class' => 'form-control', 'id' => 'ordering-column', 'placeholder' => trans('dashboard.frontage.ordering')]) !!}
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-icon btn-success mr-1 mb-1 waves-effect waves-light add"><i class="icofont-plus"></i></button>
                    <button type="button" class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light minus"><i class="icofont-bin"></i></button>
                </div>
            </div>
        @endif
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
                {!! Form::select("residence_types[]", $residences, isset($category) ? $category->residence_types : null, ['class' => 'select2 form-control', 'multiple' => 'multiple']) !!}
            </div>
        </div>
    </div>

    <div class="form-group col-12">
        <label class="form-label" for="modern-ban_state">
            {{ trans('dashboard.feature.has_floor') }}
        </label>
        <div class="demo-inline-spacing">
            <div class="custom-control custom-control-success custom-radio col-md-6">
                {!! Form::radio('is_ground_floor', 1, !isset($feature) || (isset($feature) && $feature->is_ground_floor) ? 'checked' : null , ['class' => 'custom-control-input' , 'id' => 'is_ground_floor']) !!}
                <label class="custom-control-label" for="is_ground_floor">{!! trans('dashboard.feature.is_ground_floor') !!}</label>
            </div>

            <div class="custom-control custom-control-danger custom-radio">
                {!! Form::radio('is_ground_floor', 0, isset($feature) && !$feature->is_ground_floor ? 'checked' : null , ['class' => 'custom-control-input' , 'id' => 'hasnt_floor']) !!}
                <label class="custom-control-label" for="hasnt_floor">{!! trans('dashboard.feature.hasnt_floor') !!}</label>
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
<script>
    $(document).ready(function () {
        var counter = 0,
            myid = 1;
            counter =  @isset($category) {!! $category->features->count() !!} @else 1 @endisset;
        $(document).on("click", '.add', function () {
            counter++;
            myid++;
            $(this).parent().parent().parent().append([
                `<div class="row col-12">
                    <label class="font-medium-1 col-md-2">{{ trans('dashboard.feature.feature') }} <span class="text-danger">*</span></label>
                    <div class="col-md-4">
                        {!! Form::select("features[` + myid + `][feature_id]", $features, isset($category) ? $category->features : null, ['class' => 'select2 form-control']) !!}
                    </div>
                    <div class="col-md-4">
                        {!! Form::number('features[` + myid + `][ordering]', null, ['class' => 'form-control', 'id' => 'ordering-column', 'placeholder' => trans('dashboard.frontage.ordering')]) !!}
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-icon btn-success mr-1 mb-1 waves-effect waves-light add"><i class="icofont-plus"></i></button>
                        <button type="button" class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light minus"><i class="icofont-bin"></i></button>
                    </div>
                </div>`
            ].join(''));
            $('.add').show();
            // $('.dod').children().last().find('.add').hide();
            // $(".minus").hide();

            $('.dod').children().last().find('.minus').show();
            // $(".dod").children().find(".minus").show();

            // if (counter > 1) {
            //     $('.dod').find('.flex-div').addClass('bbb');
            // } else {
            //     $('.dod').find('.flex-div').removeClass('bbb');
            // }
            if(counter > 1){
                $(".kkk").find('.minus').show();
            }

            console.log(counter);
        })

        $(document).on("click", '.minus', function () {
            counter--;
            if (counter === 1) {
                $('.dod').find('.flex-div').addClass('kkk');
            } else {
                $('.dod').find('.flex-div').removeClass('kkk');
            }
            $(this).parent().parent().remove();
            $('.dod').children().last().find('.minus').show();
            // $('.dod').children().last().find('.add').hide();
            $(".kkk").find('.minus').hide();
            $(".kkk").find('.add').show();
            console.log(counter);
        });
        console.log(counter);
        $('.dod').children().find('.minus').show();
        if(counter > 1){
            $(".kkk").find('.minus').show();
        }
    });
</script>
@endsection
