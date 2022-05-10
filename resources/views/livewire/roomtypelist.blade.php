<div>
    <div class="bg-light p-3 shadow">
        <div class="d-flex my-3">
            <div class="col-md-6">
                <input type="text" wire:model="search" placeholder="Enter Room Type" class="form-control">
            </div>
            <div class="col-md-6 text-right">
                <x-create-button>
                    <x-slot name="route">{{ route('admin.roomtype.create') }}</x-slot>
                </x-create-button>
            </div>
        </div>
        <table class="table-hover table-light table">
            <tr>
                <td>ID</td>
                <td>Photo</td>
                <td>Name</td>
                <td>Total Room</td>
                <td>Total Facility</td>
                <td>Total Used</td>
                <td>Action</td>
            </tr>
            @foreach ($types as $data)
                <tr>
                    <td>
                        {{ $data->id }}
                    </td>
                    <td>
                        <a href="{{ $data->img ? Storage::url($data->img) : '#' }}"
                            title="Image URI">{{ $data->name }}</a>
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
                        {{ $data->room_used }}
                    </td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown">
                                Action
                            </a>
                            <div class="dropdown-menu">
                                @if (Auth::user()->roles == 'admin')
                                    <a href="{{ route('admin.roomtype.edit', $data->id) }}" class="dropdown-item">Edit
                                        Type</a>
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
