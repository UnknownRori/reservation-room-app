@extends('Layouts.dashboard')
@section('title', 'Orders List')
@section('content')
    <div class="container mt-2">
        @livewire('orderslist')
    </div>
@endsection
