@extends('dashboard.layout.layout')

@section('content')
<div class="card border-info bg-transparent">

    <div class="card-body">
        <div class="d-flex justify-content-center">
            {!! $frontages->links() !!}
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-custom table table-hover-animation" data-title="{{ trans('dashboard.frontage.frontages') }}" data-create_title="{{ trans('dashboard.frontage.add_frontage') }}" data-create_link="{{ route('dashboard.frontage.create') }}">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>{!! trans('dashboard.frontage.name_ar') !!}</th>
                        <th>{!! trans('dashboard.frontage.name_en') !!}</th>
                        <th>{!! trans('dashboard.frontage.ordering') !!}</th>
                        <th>{!! trans('dashboard.general.added_date') !!}</th>
                        <th>{!! trans('dashboard.general.control') !!}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($frontages as $frontage)
                    <tr class="{{ $frontage->id }} text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $frontage->name_ar }}</td>
                        <td>{{ $frontage->name }}</td>
                        <td>{{ $frontage->ordering }}</td>
                        <td>
                            <div class="badge badge-primary badge-md mr-1 mb-1">{{ $frontage->created_at->format("Y-m-d") }}</div>
                        </td>
                        <td class="justify-content-center">
                            <a onclick="deleteItem('{{ $frontage->id }}' , '{{ route('dashboard.frontage.destroy',$frontage->id) }}')" class="text-danger" title="{!! trans('dashboard.general.delete') !!}">
                                <i class="icofont-ui-delete"></i>
                            </a>
                            <a href="{!! route('dashboard.frontage.edit',$frontage->id) !!}" class="text-primary mr-2" title="{!! trans('dashboard.general.edit') !!}">
                                <i class="icofont-ui-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {!! $frontages->links() !!}
        </div>
    </div>
</div>
@include('dashboard.layout.delete_modal')
@endsection


@include('dashboard.frontage.scripts')
