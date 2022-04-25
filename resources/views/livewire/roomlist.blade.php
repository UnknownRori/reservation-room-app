<div>
    <div class="bg-light p-3 shadow">
        <div class="d-flex my-2">
            <div class="col-md-6">
                <label>Room Number</label>
                <input type="text" wire:model="no_room" placeholder="Enter Search Room Number" class="form-control">
            </div>
            <div class="col-md-6">
                <label>Room Type</label>
                <select wire:model="room_type" class="form-control">
                    <option value=""></option>
                    @foreach ($types as $data)
                        <option value="{{ $data->id }}">{{ Str::ucfirst($data->name) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <table class="table-hover table-light table">
            <tr>
                <td>ID</td>
                <td>Room Number</td>
                <td>Type</td>
                <td>Action</td>
            </tr>
            @foreach ($rooms as $data)
                <tr>
                    <td>
                        {{ $data->id }}
                    </td>
                    <td>
                        {{ $data->no_room }}
                    </td>
                    <td>
                        {{ Str::ucfirst($data->RoomType->name) }}
                    </td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown">
                                Action
                            </a>
                            <div class="dropdown-menu">
                                <a href="{{ route('rooms.show', $data->no_room) }}" class="dropdown-item">Show</a>
                                @if (Auth::user()->roles == 'admin')
                                    <a href="{{ route('admin.rooms.edit', $data->no_room) }}"
                                        class="dropdown-item">Edit
                                        Room</a>
                                    <form action="{{ route('admin.rooms.destroy', $data->no_room) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="Delete" class="dropdown-item">
                                    </form>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $rooms->links() }}
    </div>
</div>
