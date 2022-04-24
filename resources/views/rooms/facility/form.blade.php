@extends('Layouts.app')
@if (isset($facility))
    @section('title', "Editing {$facility->name}")
@else
    @section('title', 'Create new room facility')
@endif
@section('content')
    <div class="container mt-2">
        @if (isset($facility))
            @livewire('roomfacilityform', ['roomfacility' => $facility])
        @else
            @livewire('roomfacilityform', ['room' => $room])
        @endif
    </div>
@endsection
