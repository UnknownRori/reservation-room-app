<div class="d-flex align-items-center min-vh-100">
    <div class="col-md-6 bg-light m-auto shadow">
        <form wire:submit.prevent="update" class="p-3">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input wire:model="name" type="text" name="Name" placeholder="Enter Name" class="form-control">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Email</label>
                <input wire:model="email" type="email" name="email" placeholder="Enter Email" class="form-control">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Password</label>
                <input wire:model="password" type="password" name="password" placeholder="Enter Password"
                    class="form-control">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                @if (session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="row">
                    <input type="submit" value="Register" class="btn btn-primary">
                    <div wire:loading wire:target="update" class="pl-3">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Authenticating...</span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
