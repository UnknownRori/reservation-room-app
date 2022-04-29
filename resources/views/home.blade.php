@extends('Layouts.app')
@section('title', 'Home')
@section('content')
    <div class="container">
        <div class="col-md-8 m-auto my-3">
            @livewire('orders-form')
        </div>
    </div>
@endsection
