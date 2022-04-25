@extends('Layouts.dashboard')
@if (isset($room))
    @section('title', "Editing {$room->no_room}")
@else
    @section('title', 'Create new room')
@endif
@section('content')
    <div class="container mt-2">
        @if (isset($room))
            @livewire('room-form', ['room' => $room, 'roomtype' => $roomtype])
        @else
            @livewire('room-form', ['room' => null, 'roomtype' => $roomtype])
        @endif
    </div>
@endsection
