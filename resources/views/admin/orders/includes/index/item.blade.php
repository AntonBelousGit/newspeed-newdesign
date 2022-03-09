<tr>
    <td style="width: 50px;">
        <label class="fancy-checkbox">
            <input class="checkbox-tick" type="checkbox" name="checkbox">
            <span></span>
        </label>
    </td>
    <td>
        {{ $order->id }}
    </td>
    <td>
{{ $order->user->name }}
    </td>
    <td>
        {{ $order->created_at }}
    </td>
    <td>
        {{ $order->updated_at }}
    </td>
    <td>
        {{ $order->status->name }}
    </td>
    <td>
        <a href="{{ route('admin.order.edit', ['order'=>$order->id]) }}" class="btn btn-success btn-sm rounded-0"><i class="fa fa-edit"></i></a>
    </td>
</tr>
