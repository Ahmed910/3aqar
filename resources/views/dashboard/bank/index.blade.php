@extends('dashboard.layout.layout')

@section('content')
<div class="card border-info bg-transparent">

    <div class="card-body">
        <div class="d-flex justify-content-center">
            {!! $banks->links() !!}
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-custom table table-hover-animation" data-title="{{ trans('dashboard.bank.banks') }}" data-create_title="{{ trans('dashboard.bank.add_bank') }}" data-create_link="{{ route('dashboard.bank.create') }}">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>{!! trans('dashboard.bank.image') !!}</th>
                        <th>{!! trans('dashboard.bank.account_holder_name') !!}</th>
                        <th>{!! trans('dashboard.bank.bank_name') !!}</th>
                        <th>{!! trans('dashboard.bank.account_number') !!}</th>
                        <th>{!! trans('dashboard.bank.iban_number') !!}</th>
                        <th>{!! trans('dashboard.general.added_date') !!}</th>
                        <th>{!! trans('dashboard.general.control') !!}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banks as $bank)
                    <tr class="{{ $bank->id }} text-center">
                        <td>{{ $loop->iteration }}</td>
                         <td class="product-img sorting_1">
                            <a href="{{ $bank->bank_image }}" data-fancybox="gallery">
                                <img src="{{ $bank->bank_image }}" alt="" style="width:60px; height:60px;" class="img-preview rounded">
                            </a>
                        </td>
                        <td>{{ $bank->account_holder_name }}</td>
                         <td>{{ $bank->bank_name }}</td>
                          <td>{{ $bank->account_number }}</td>
                           <td>{{ $bank->iban_number }}</td>
                        <td>
                            <div class="badge badge-primary badge-md mr-1 mb-1">{{ $bank->created_at }}</div>
                        </td>
                        <td class="justify-content-center">
                            <a onclick="deleteItem('{{ $bank->id }}' , '{{ route('dashboard.bank.destroy',$bank->id) }}')" class="text-danger" title="{!! trans('dashboard.general.delete') !!}">
                                <i data-feather='trash-2' class="font-medium-3"></i>
                            </a>
                            <a href="{!! route('dashboard.bank.edit',$bank->id) !!}" class="text-primary mr-2" title="{!! trans('dashboard.general.edit') !!}">
                                <i data-feather='edit' class="font-medium-3"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {!! $banks->links() !!}
        </div>
    </div>
</div>
@include('dashboard.layout.delete_modal')
@endsection


@include('dashboard.bank.styles')
@include('dashboard.bank.scripts')
