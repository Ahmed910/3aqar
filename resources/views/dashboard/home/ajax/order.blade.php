@foreach ($orders as $order)
    <tr>
        <td>#{{ $order->id }}</td>
        <td>{{ $order->client->fullname }}</td>
        <td><i class="fa fa-circle font-small-3 {{ $css_class }} mr-50"></i>{{ trans('dashboard.order.statuses.'.$order->order_status) }}</td>
        <td class="p-1">
            <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                @foreach ($order->orderProducts as $product)
                <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="{{ $product->product->name }}" class="avatar pull-up">
                    <img class="media-object rounded-circle" src="{{ $product->product->image }}" alt="{{ $product->product->name }}" height="30" width="30">
                </li>
                @endforeach
            </ul>
        </td>

        <td>
            {{ $order->total_price }}
        </td>
        <td>{{ $order->created_at->isoFormat("D MMMM , Y ( h:mm a )") }}</td>
        <td class="text-center font-medium-1">
            <a href="{!! route('dashboard.order.show',$order->id) !!}" class="text-primary mr-2 font-medium-3">
                <i class="feather icon-monitor"></i>
            </a>
        </td>
    </tr>
@endforeach
