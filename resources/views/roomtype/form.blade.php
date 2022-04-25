@extends('Layouts.dashboard')
@if (isset($roomtype))
    @section('title', "Editing {$roomtype->name}")
@else
    @section('title', 'Create new room type')
@endif
@section('content')
    Hello World
@endsection
