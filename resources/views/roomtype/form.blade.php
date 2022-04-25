@extends('Layouts.dashboard')
@if (isset($roomtype))
    @section('title', "Editing {$roomtype->name}")
@else
    @section('title', 'Create new room type')
@endif
@section('content')
    <div class="container">
        @if (isset($roomtype))
            @livewire('roomtypeform', [$roomtype])
        @else
            @livewire('roomtypeform')
        @endif
    </div>
@endsection
