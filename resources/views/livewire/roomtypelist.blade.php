<div>
    <div class="bg-light p-3 shadow">
        <div class="d-flex my-3">
            <div class="col-md-6">
                <input type="text" wire:model="search" placeholder="Enter Room Type" class="form-control">
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('admin.roomtype.create') }}" class="btn btn-primary">Create new Type</a>
            </div>
        </div>
        <table class="table-hover table-light table">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Total Room</td>
                <td>Total Facility</td>
                <td>Action</td>
            </tr>
            @foreach ($types as $data)
                <tr>
                    <td>
                        {{ $data->id }}
                    </td>
                    <td>
                        {{ $data->name }}
                    </td>
                    <td>
                        {{ $data->room_count }}
                    </td>
                    <td>
                        {{ $data->room_facility_count }}
                    </td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown">
                                Action
                            </a>
                            <div class="dropdown-menu">
                                <a href="{{ route('rooms.show', $data->name) }}" class="dropdown-item">Show</a>
                                @if (Auth::user()->roles == 'admin')
                                    <a href="{{ route('admin.roomtype.edit', $data->id) }}"
                                        class="dropdown-item">Edit
                                        Room</a>
                                    <form action="{{ route('admin.roomtype.destroy', $data->id) }}" method="post">
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
        {{ $types->links() }}
    </div>
</div>
