<div>
    <div class="bg-light p-3 shadow">
        <table class="table-hover table-light table">
            <tr>
                <td>ID</td>
                <td>Photo</td>
                <td>No Room</td>
                <td>Type</td>
                <td>Action</td>
            </tr>
            @foreach ($rooms as $data)
                <tr>
                    <td>
                        {{ $data->id }}
                    </td>
                    <td>
                        <img class="img-fluid" width="50" height="50" src="{{ Storage::url($data->img) }}"
                            alt="{{ $data->no_room }}">
                    </td>
                    <td>
                        {{ $data->no_room }}
                    </td>
                    <td>
                        {{ $data->type }}
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
                                    <a href="{{ route('admin.room.facility.create', $data->no_room) }}"
                                        class="dropdown-item">Add
                                        Facility</a>
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
