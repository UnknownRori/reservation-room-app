<div>
    <div class="bg-light p-3 shadow">
        <p wire:poll.1000ms>
            Current Time : {{ Date::now() }}
        </p>
        <div class="row">
            <div class="col-md">
                <input type="text" wire:model="name" placeholder="Enter Name" class="form-control">
            </div>
            <div class="col-md">
                <select wire:model="room_type" class="form-control">
                    <option value="" selected> -- Select Type -- </option>
                    @foreach ($types as $data)
                        <option value="{{ $data->id }}">{{ Str::ucfirst($data->name) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <table class="table-hover table-light table">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Check in</td>
                <td>Check out</td>
                <td>Room Type</td>
                <td>Total Room</td>
                <td>Check in status</td>
                <td>Check out status</td>
                <td>Action</td>
            </tr>
            @foreach ($orders as $data)
                <tr>
                    <td>
                        {{ $data->id }}
                    </td>
                    <td>
                        {{ $data->User->name }}
                    </td>
                    <td>
                        {{ $data->check_in }}
                    </td>
                    <td>
                        {{ $data->check_out }}
                    </td>
                    <td>
                        {{ $data->RoomType->name }}
                    </td>
                    <td>
                        {{ $data->total_room }}
                    </td>
                    <td>
                        @if ($data->check_in_status)
                            <span class="fas fa-check-circle"></span>
                        @else
                            <span class="fas fa-dot-circle"></span>
                        @endif
                    </td>
                    <td>
                        @if ($data->check_out_status)
                            <span class="fas fa-check-circle"></span>
                        @else
                            <span class="fas fa-dot-circle"></span>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown">
                                Action
                            </a>
                            <div class="dropdown-menu">
                                <a href="{{ route('user.order.show', [$data->User->name, $data->id]) }}"
                                    class="dropdown-item">Show</a>
                                <div class="dropdown-divider"></div>
                                @if (!$data->check_in_status)
                                    <form action="{{ route('receptionist.orders.checkin', $data->id) }}"
                                        method="post">
                                        @csrf
                                        <input type="submit" value="Check in" class="dropdown-item">
                                    </form>
                                @elseif(!$data->check_out_status)
                                    <form action="{{ route('receptionist.orders.checkout', $data->id) }}"
                                        method="post">
                                        @csrf
                                        <input type="submit" value="Check out" class="dropdown-item">
                                    </form>
                                @endif
                                <form action="{{ route('receptionist.orders.destroy', $data->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Delete" class="dropdown-item">
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $orders->links() }}
    </div>
</div>
