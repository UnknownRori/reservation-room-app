@extends('Layouts.dashboard')
@if (isset($facility))
    @section('title', "Editing {$facility->id}")
@else
    @section('title', 'Create new hotel facility')
@endif
@section('content')
    <div class="container mt-2">
        @if (isset($facility))
            @livewire('hotelfacilityform', [$facility])
        @else
            @livewire('hotelfacilityform')
        @endif
    </div>
@endsection
