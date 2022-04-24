<div class="d-flex align-items-center min-vh-100">
    <div class="col-md-6 bg-light m-auto shadow">
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
                <select name="type" wire:model="type">
                    <option value="{{ $type }}">{{ Str::ucfirst($type) }}</option>
                    @if ($type != 'superior')
                        <option value="superior">Superior</option>
                    @endif
                    @if ($type != 'deluxe')
                        <option value="deluxe">Deluxe</option>
                    @endif
                </select>
                @error('type')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Photo</label>
                <input wire:model="img" type="file" name="img" class="form-control">
                @if ($img)
                    <div class="container my-2 text-center">
                        <img class="img-fluid" src="{{ $img->temporaryUrl() }}" width="300" height="300">
                    </div>
                @endif
                @error('password')
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
                        Creating Room...
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
