@extends('Layouts.app')
@section('title', $roomtype->name)
@section('content')
    <div class="container">
        @livewire('roomtypeshow', ['room' => $roomtype])
    </div>
@endsection
