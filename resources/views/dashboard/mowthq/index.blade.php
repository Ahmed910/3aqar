@extends('dashboard.layout.layout')

@section('content')
<div class="card border-info bg-transparent">

    <div class="card-body">
        <div class="d-flex justify-content-center">
            {!! $mowthqs->links() !!}
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-custom table table-hover-animation" data-title="{{ trans('dashboard.mowthq.mowthqs') }}" data-create_title="{{ trans('dashboard.mowthq.add_mowthq') }}" data-create_link="{{ route('dashboard.mowthq.create') }}">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>{!! trans('dashboard.mowthq.image') !!}</th>
                        <th>{!! trans('dashboard.mowthq.name') !!}</th>
                        <th>{!! trans('dashboard.city.city') !!}</th>
                        <th>{!! trans('dashboard.mowthq.phone') !!}</th>
                        <th>{!! trans('dashboard.general.added_date') !!}</th>
                        <th>{!! trans('dashboard.general.control') !!}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mowthqs as $mowthq)
                    <tr class="{{ $mowthq->id }} text-center">
                        <td>{{ $loop->iteration }}</td>
                         <td class="product-img sorting_1">
                            <a href="{{ $mowthq->image }}" data-fancybox="gallery">
                                <img src="{{ $mowthq->image }}" alt="" style="width:60px; height:60px;" class="img-preview rounded">
                            </a>
                        </td>
                        <td>{{ $mowthq->fullname }}</td>
                        <td>{{ @$mowthq->city->name }}</td>
                         <td>{{ @$mowthq->phone }}</td>
                        <td>
                            <div class="badge badge-primary badge-md mr-1 mb-1">{{ $mowthq->created_at }}</div>
                        </td>
                        <td class="justify-content-center">
                            <a onclick="deleteItem('{{ $mowthq->id }}' , '{{ route('dashboard.mowthq.destroy',$mowthq->id) }}')" class="text-danger" title="{!! trans('dashboard.general.delete') !!}">
                                <i class="icofont-ui-delete"></i>
                            </a>
                            <a href="{!! route('dashboard.mowthq.edit',$mowthq->id) !!}" class="text-primary mr-2" title="{!! trans('dashboard.general.edit') !!}">
                                <i class="icofont-ui-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {!! $mowthqs->links() !!}
        </div>
    </div>
</div>
@include('dashboard.layout.delete_modal')
@endsection


@include('dashboard.mowthq.styles')
@include('dashboard.mowthq.scripts')
