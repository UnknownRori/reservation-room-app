<div>
    <div class="bg-light p-3 shadow">
        <div class="d-flex my-2">
            <div class="col-md-5">
                <input type="text" wire:model="name" placeholder="Enter Search Facility Name" class="form-control">
            </div>
            <div class="col-md-5">
                <select wire:model="type" class="form-control">
                    <option value="" selected> -- Select Type -- </option>
                    @foreach ($types as $data)
                        <option value="{{ $data->id }}">{{ Str::ucfirst($data->name) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 text-right">
                <x-create-button>
                    <x-slot name="route">{{ route('admin.room.facility.create') }}</x-slot>
                </x-create-button>
            </div>
        </div>
        <table class="table-hover table-light table">
            <tr>
                <td>ID</td>
                <td>Photo</td>
                <td>Name</td>
                <td>Description</td>
                <td>Type</td>
                <td>Action</td>
            </tr>
            @foreach ($facility as $data)
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
                        {{ $data->description }}
                    </td>
                    <td>
                        {{ $data->RoomType->name }}
                    </td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown">
                                Action
                            </a>
                            <div class="dropdown-menu">
                                <a href="{{ route('admin.room.facility.edit', $data->id) }}"
                                    class="dropdown-item">Edit</a>
                                <form action="{{ route('admin.room.facility.destroy', $data->id) }}" method="post">
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
        {{ $facility->links() }}
    </div>
</div>
