<div>
    <div class="bg-light p-3 shadow">
        <p wire:poll.1000ms>
            Current Time : {{ Date::now() }}
        </p>
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
                <td>Show</td>
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
                        <a href="{{ route('user.order.show', [$data->User->name, $data->id]) }}">Show</a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $orders->links() }}
    </div>
</div>
