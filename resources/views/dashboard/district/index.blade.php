@extends('dashboard.layout.layout')

@section('content')
<div class="card border-info bg-transparent">

    <div class="card-body">
        <div class="d-flex justify-content-center">
            {!! $districts->links() !!}
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-custom table table-hover-animation" data-title="{{ trans('dashboard.district.districts') }}" data-create_title="{{ trans('dashboard.district.add_district') }}" data-create_link="{{ route('dashboard.district.create') }}">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>{!! trans('dashboard.district.district_name') !!}</th>
                        <th>{!! trans('dashboard.country.country') !!}</th>
                        <th>{!! trans('dashboard.district.location') !!}</th>
                        <th>{!! trans('dashboard.general.added_date') !!}</th>
                        <th>{!! trans('dashboard.general.control') !!}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($districts as $district)
                    <tr class="{{ $district->id }} text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $district->name }}</td>
                        <td>{{ @$district->country->name }}</td>
                        <td>{{ $district->location }}</td>
                        <td>
                            <div class="badge badge-primary badge-md mr-1 mb-1">{{ $district->created_at->format("Y-m-d") }}</div>
                        </td>
                        <td class="justify-content-center">
                            <a onclick="deleteItem('{{ $district->id }}' , '{{ route('dashboard.district.destroy',$district->id) }}')" class="text-danger" title="{!! trans('dashboard.general.delete') !!}">
                                <i class="icofont-ui-delete"></i>
                            </a>
                            <a href="{!! route('dashboard.district.edit',$district->id) !!}" class="text-primary mr-2" title="{!! trans('dashboard.general.edit') !!}">
                                <i class="icofont-ui-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {!! $districts->links() !!}
        </div>
    </div>
</div>
@include('dashboard.layout.delete_modal')
@endsection


@include('dashboard.district.scripts')
