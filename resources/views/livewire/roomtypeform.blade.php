<div class="d-flex align-items-center min-vh-100">
    <div class="col-md-6 bg-light m-auto shadow">
        <form wire:submit.prevent="update" class="p-3">
            @csrf
            <div class="form-group">
                <label>Room Type Name</label>
                <input wire:model="name" type="text" name="name" placeholder="Room Type Name" class="form-control"
                    value="{{ $name }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Photo</label>
                <input wire:model="img" type="file" name="img" class="form-control">
                <div class="my-2" wire:loading wire:target="img">
                    <div class="spinner-border" role="status">
                        <span class="sr-only"></span>
                    </div>
                    Uploading...
                </div>
                @if ($img)
                    <div class="container my-2 text-center">
                        <img class="img-fluid" src="{{ $img->temporaryUrl() }}" width="300" height="300">
                    </div>
                @endif
                @error('img')
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
                        {{ $update ? 'Updating existing room type...' : 'Creating new room type...' }}
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
