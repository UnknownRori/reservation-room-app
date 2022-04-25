<div>
    <div class="bg-light mt-3 p-3 shadow">
        <div class="container my-2">
            <div class="col-md-5 text-right">
                <input type="text" wire:model="search" placeholder="Enter Search" class="form-control">
            </div>
        </div>
        <table class="table-hover table">
            <tr>
                <td>ID</td>
                <td>Image</td>
                <td>Name</td>
                <td>Description</td>
                <td>Action</td>
            </tr>
            @foreach ($facilities as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>
                        <a href="{{ Storage::url($data->img) }}">{{ $data->name }}</a>
                    </td>
                    <td>
                        {{ $data->name }}
                    </td>
                    <td>
                        {{ $data->description }}
                    </td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown">
                                Action
                            </a>
                            <div class="dropdown-menu">
                                <a href="{{ route('admin.facility.edit', $data->id) }}" class="dropdown-item">Edit</a>
                                <form action="{{ route('admin.facility.edit', $data->id) }}" method="post">
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
        {{ $facilities->links() }}
    </div>
</div>
