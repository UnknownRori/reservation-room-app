<div>
    <div class="bg-light p-3 shadow">
        <div class="d-flex my-2">
            <div class="col-md">
                <input type="text" wire:model="no_room" placeholder="Enter Search Room Number" class="form-control">
            </div>
            <div class="col-md">
                <select wire:model="room_type" class="form-control">
                    <option value="" selected> -- Select Type -- </option>
                    @foreach ($types as $data)
                        <option value="{{ $data->id }}">{{ Str::ucfirst($data->name) }}</option>
                    @endforeach
                </select>
            </div>
            @if (Auth::user()->roles == 'admin')
                <div class="col-md-2 text-right">
                    <x-create-button>
                        <x-slot name="route">{{ route('admin.rooms.create') }}</x-slot>
                    </x-create-button>
                </div>
            @endif
        </div>
        <table class="table-hover table-light table">
            <tr>
                <td>ID</td>
                <td>Room Number</td>
                <td>Type</td>
                <td>In Use</td>
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
                        @if ($data->used)
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
                                @if (Auth::user()->roles == 'admin')
                                    <a href="{{ route('admin.rooms.edit', $data->id) }}" class="dropdown-item">Edit
                                        Room</a>
                                    <form action="{{ route('admin.rooms.destroy', $data->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="Delete" class="dropdown-item">
                                    </form>
                                @elseif (Auth::user()->roles == 'receptionist')
                                    @if ($data->used)
                                        <form action="{{ route('receptionist.rooms.checkout', $data->id) }}"
                                            method="post">
                                            @csrf
                                            <input type="submit" value="Check out" class="dropdown-item">
                                        </form>
                                    @else
                                        <form action="{{ route('receptionist.rooms.checkin', $data->id) }}"
                                            method="post">
                                            @csrf
                                            <input type="submit" value="Check in" class="dropdown-item">
                                        </form>
                                    @endif
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
