@extends('dashboard.layout.layout')

@section('content')
<div class="card border-info bg-transparent">

    <div class="card-body">
        <div class="d-flex justify-content-center">
            {!! $categories->links() !!}
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-custom table table-hover-animation" data-title="{{ trans('dashboard.category.categories') }}" data-create_title="{{ trans('dashboard.category.add_category') }}" data-create_link="{{ route('dashboard.category.create') }}">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>{!! trans('dashboard.category.name_ar') !!}</th>
                        <th>{!! trans('dashboard.category.name_en') !!}</th>
                        <th>{!! trans('dashboard.category.type') !!}</th>
                        <th>{!! trans('dashboard.general.added_date') !!}</th>
                        <th>{!! trans('dashboard.general.control') !!}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr class="{{ $category->id }} text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name_ar }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ trans('dashboard.category.data_type.'.$category->type)}}</td>
                        <td>
                            <div class="badge badge-primary badge-md mr-1 mb-1">{{ $category->created_at->format("Y-m-d") }}</div>
                        </td>
                        <td class="justify-content-center">
                            <a onclick="deleteItem('{{ $category->id }}' , '{{ route('dashboard.category.destroy',$category->id) }}')" class="text-danger" title="{!! trans('dashboard.general.delete') !!}">
                                <i class="icofont-ui-delete"></i>
                            </a>
                            <a href="{!! route('dashboard.category.edit',$category->id) !!}" class="text-primary mr-2" title="{!! trans('dashboard.general.edit') !!}">
                                <i class="icofont-ui-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {!! $categories->links() !!}
        </div>
    </div>
</div>
@include('dashboard.layout.delete_modal')
@endsection


@include('dashboard.category.scripts')
