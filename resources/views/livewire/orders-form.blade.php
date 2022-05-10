<div>
    <div class="bg-light m-auto m-3 p-3 shadow">
        <h4 class="text-center">Reserve room</h4>
        <form wire:submit.prevent="update" class="m-3">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control"
                    value="{{ Auth::check() ? Auth::user()->name : 'User must logged in first!' }}" disabled>
            </div>
            <div class="form-group">
                <label for="">Check in date</label>
                <input wire:model="check_in" type="date" name="check_in"
                    class="form-control {{ Auth::check() ? '' : 'disabled' }}" {{ Auth::check() ? '' : 'disabled' }}
                    required>
                @error('check_in')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Check out date</label>
                <input wire:model="check_out" type="date" name="check_out"
                    class="form-control {{ Auth::check() ? '' : 'disabled' }}" {{ Auth::check() ? '' : 'disabled' }}
                    required>
                @error('check_out')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Room Type</label>
                <select name="type" wire:model="room_type_id">
                    <option value=""> -- Select Room Type -- </option>
                    @foreach ($type as $data)
                        <option value="{{ $data->id }}">{{ Str::ucfirst($data->name) }}</option>
                    @endforeach
                </select>
                @error('room_type_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Total room</label>
                <input wire:model="total_room" type="number" name="total_room"
                    class="form-control {{ Auth::check() ? '' : 'disabled' }}"
                    {{ Auth::check() ? '' : 'disabled' }} required>
                @error('total_room')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                @if (session()->has('message'))
                    <div class="alert alert-{{ session('message')[0] }}">
                        {{ session('message')[1] }}
                        @if (isset(session('message')[2]))
                            Please print the
                            <a href="{{ route('user.order.show', session('message')[2]) }}">Receipt</a>
                            .
                        @endif
                    </div>
                @endif
                <div class="row align-content-center items-center text-center">
                    <input type="submit" title="{{ Auth::check() ? '' : 'Log in first' }}" value="Order"
                        class="btn btn-primary {{ Auth::check() ? '' : 'disabled' }}"
                        {{ Auth::check() ? '' : 'disabled' }}>
                    <div wire:loading.flex wire:target="update" class="align-items-center px-3">
                        <div class="spinner-border" role="status">
                            <span class="sr-only"></span>
                        </div>
                        Ordering room...
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
