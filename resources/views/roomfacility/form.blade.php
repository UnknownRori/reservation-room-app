@extends('Layouts.dashboard')
@if (isset($facility))
    @section('title', "Editing {$facility->name}")
@else
    @section('title', 'Create new room facility')
@endif
@section('content')
    <div class="container mt-2">
        @if (isset($facility))
            @livewire('roomfacilityform', ['roomtype' => $roomtype, 'roomfacility' => $facility])
        @else
            @livewire('roomfacilityform', ['roomtype' => $roomtype])
        @endif
    </div>
@endsection
