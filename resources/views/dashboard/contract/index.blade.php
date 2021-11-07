@extends('dashboard.layout.layout')

@section('content')
<div class="card border-info bg-transparent">

    <div class="card-body">
        <div class="d-flex justify-content-center">
            {!! $contracts->links() !!}
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-custom table table-hover-animation" }}>
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>{!! trans('dashboard.contract.phone_for_citizen') !!}</th>
                        <th>{!! trans('dashboard.contract.phone_for_owner') !!}</th>
                        <th>{!! trans('dashboard.contract.iban_num') !!}</th>
                        <th>{!! trans('dashboard.contract.aqar_number') !!}</th>
                        <th>{!! trans('dashboard.contract.aqar_address') !!}</th>
                        <th>{!! trans('dashboard.general.added_date') !!}</th>
                        <th>{!! trans('dashboard.general.control') !!}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contracts as $contract)
                    <tr class="{{ $contract->id }} text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contract->phone_for_citizen }}</td>
                        <td>{{ $contract->phone_for_owner }}</td>
                        <td>{{ $contract->iban_num }}</td>
                        <td>{{ $contract->aqar_number }}</td>
                        <td>{{ $contract->aqar_address }}</td>
                        <td>
                            <div class="badge badge-primary badge-md mr-1 mb-1">{{ $contract->created_at->format("Y-m-d") }}</div>
                        </td>
                        <td class="justify-content-center">
                            <a onclick="deleteItem('{{ $contract->id }}' , '{{ route('dashboard.contract.destroy',$contract->id) }}')" class="text-danger" title="{!! trans('dashboard.general.delete') !!}">
                                <i class="icofont-ui-delete"></i>
                            </a>
                             <a href="{!! route('dashboard.contract.show',$contract->id) !!}" class="text-info mr-1">
                                    <i class="icofont-monitor" title="{!! trans('dashboard.general.show') !!}"></i>
                                </a>    
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {!! $contracts->links() !!}
        </div>
    </div>
</div>
@include('dashboard.layout.delete_modal')
@endsection


@include('dashboard.contract.scripts')
