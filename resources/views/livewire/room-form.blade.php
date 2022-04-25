<div class="d-flex align-items-center min-vh-100">
    <div class="col-md-8 bg-light m-auto shadow">
        <form wire:submit.prevent="update" class="p-3">
            @csrf
            <div class="form-group">
                <label>Room Number</label>
                <input wire:model="no_room" type="text" name="no_room" placeholder="Enter Room Number"
                    class="form-control" value="{{ $no_room }}">
                @error('no_room')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Room Type</label>
                <select name="type" wire:model="room_type_id">
                    @foreach ($roomtype as $data)
                        <option value="{{ $data->id }}">{{ Str::ucfirst($data->name) }}</option>
                    @endforeach
                </select>
                @error('room_type_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                @if (session()->has('message'))
                    <div class="alert alert-{{ session('message')[0] }}">
                        {{ session('message')[1] }}
                    </div>
                @endif

                <div class="row align-content-center items-center text-center">
                    <input type="submit" value="{{ $update ? 'Edit' : 'Create' }}" class="btn btn-primary">
                    <div wire:loading.flex wire:target="update" class="align-items-center px-3">
                        <div class="spinner-border" role="status">
                            <span class="sr-only"></span>
                        </div>
                        {{ $update ? 'Updating existing room...' : 'Creating new room...' }}
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
