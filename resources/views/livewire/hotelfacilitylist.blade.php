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
                <td>Room Type</td>
                <td>Image</td>
                <td>Name</td>
                <td>Description</td>
            </tr>
            @foreach ($facilities as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>
                        <a href="{{ Storage::url($data->img) }}">{{ $data->name }}</a>
                    </td>
                    <td>
                        {{ Str::ucfirst($data->RoomType->name) }}
                    </td>
                    <td>
                        {{ $data->name }}
                    </td>
                    <td>
                        {{ $data->description }}
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $facilities->links() }}
    </div>
</div>
