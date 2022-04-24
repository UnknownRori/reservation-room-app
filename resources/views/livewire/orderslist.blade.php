<div>
    <div class="bg-light p-3 shadow">
        <table class="table-hover table-light table">
            <tr>
                <td>ID</td>
                <td>Check in</td>
                <td>Check out</td>
                <td>Room Type</td>
                <td>Total Room</td>
                <td>Create Date</td>
                <td>Action</td>
            </tr>
            @foreach ($orders as $data)
                <tr>
                    <td>
                        {{ $data->id }}
                    </td>
                    <td>
                        {{ $data->check_in }}
                    </td>
                    <td>
                        {{ $data->check_out }}
                    </td>
                    <td>
                        {{ $data->room_type }}
                    </td>
                    <td>
                        {{ $data->total_room }}
                    </td>
                    <td>
                        {{ $data->created_at }}
                    </td>
                    <td>
                        Action
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $orders->links() }}
    </div>
</div>