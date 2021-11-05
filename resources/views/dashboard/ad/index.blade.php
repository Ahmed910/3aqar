@extends('dashboard.layout.layout')

@section('content')
<div class="card border-info bg-transparent">

    <div class="card-body">
        <div class="d-flex justify-content-center">
            {!! $ads->links() !!}
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-custom table table-hover-animation" }}>
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>{!! trans('dashboard.ad.type') !!}</th>
                        <th>{!! trans('dashboard.ad.user') !!}</th>
                        <th>{!! trans('dashboard.ad.category') !!}</th>
                        <th>{!! trans('dashboard.ad.price') !!}</th>
                        <th>{!! trans('dashboard.general.added_date') !!}</th>
                        <th>{!! trans('dashboard.general.control') !!}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ads as $ad)
                    <tr class="{{ $ad->id }} text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ad->type }}</td>
                        <td>{{ @$ad->user->fullname}}</td>
                        <td>{{ @$ad->category->name_ar}}</td>
                        <td>
                            <div class="badge badge-primary badge-md mr-1 mb-1">{{ $ad->created_at->format("Y-m-d") }}</div>
                        </td>
                        <td class="justify-content-center">
                            <a onclick="deleteItem('{{ $ad->id }}' , '{{ route('dashboard.ad.destroy',$ad->id) }}')" class="text-danger" title="{!! trans('dashboard.general.delete') !!}">
                                <i data-feather='trash-2' class="font-medium-3"></i>
                            </a>
                            <a href="{!! route('dashboard.ad.edit',$ad->id) !!}" class="text-primary mr-2" title="{!! trans('dashboard.general.edit') !!}">
                                <i data-feather='edit' class="font-medium-3"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {!! $ads->links() !!}
        </div>
    </div>
</div>
@include('dashboard.layout.delete_modal')
@endsection


@include('dashboard.ad.scripts')
