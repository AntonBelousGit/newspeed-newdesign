<tr>
    <td style="width: 50px;">
        <label class="fancy-checkbox">
            <input class="checkbox-tick" type="checkbox" name="checkbox">
            <span></span>
        </label>
    </td>
    <td>
        <img src="{{ asset($user->photo) }}" class="rounded-circle avatar" alt="">
        <p class="c_name">{{ $user->username() }}</p>
    </td>
    <td>{{ $user->email }}</td>
    <td data-sort="{{ $user->created_at->timestamp }}" >
        <span class="phone">{{ $user->created_at->format('d M Y / h:i:s') }}</span>
    </td>
    <td>
        @if($user->user_field !== null)
            @php $status = $user->user_field->status_id @endphp
            <span class="">{{ $status == 1 ? 'Not Published' : ( $status == 2 ? 'Published' : 'Premium') }}</span>
        @endif
    </td>
    <td>
        <button type="button" class="btn btn-default btn-sm update_user" onclick="" data-user-id="{{ $user->id }}" title="Edit" data-toggle="modal" data-target="#addcontact" ><i class="fa fa-edit"></i></button>
        <span class="phone">{{ $user->roles()->get()->pluck('name')->first() }}</span>
        {{--                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="" data-toggle="modal" data-target="#addcontact">Create Contact</a>--}}
        {{--        <button type="button" class="btn btn-danger btn-sm js-sweetalert" data-type="confirm" title="Delete"><i class="fa fa-trash-o"></i></button>--}}
    </td>
    <td>
        @if($user->user_field !== null)
            <a href="{{ route('admin.users.edit', ['user'=>$user->id]) }}" class="btn btn-success btn-sm rounded-0"><i class="fa fa-edit"></i></a>
        @endif
    </td>
</tr>
