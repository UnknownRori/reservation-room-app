@extends('Layouts.dashboard')
@section('title', 'Rooms List')
@section('content')
    <div class="container mt-2">
        @livewire('roomlist')
    </div>
@endsection
