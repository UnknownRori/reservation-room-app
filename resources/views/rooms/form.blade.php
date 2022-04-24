@extends('Layouts.app')
@if (isset($room))
    @section('title', "Editing {$room->no_room}")
@else
    @section('title', 'Create new Room')
@endif
@section('content')
    <div class="container mt-2">
        @if (isset($room))
            @livewire('room-form', [$room->id])
        @else
            @livewire('room-form')
        @endif
    </div>
@endsection
