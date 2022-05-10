@extends('Layouts.app')
@section('title', $order->user->name . ' ' . $order->check_in)
@section('content')
    <div class="container mt-2 my-4">
        <div class="col-md-6 shadow bg-light rounded mx-auto p-3">
            <h3 class="text-center">
                {{ $order->user->name }}
            </h3>
            <table class="table table-hover table-light">
                <tr>
                    <td>
                        Room Type
                    </td>
                    <td>
                        {{ $order->roomtype->name }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Total Room
                    </td>
                    <td>
                        {{ $order->total_room }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Check In
                    </td>
                    <td>
                        {{ $order->check_in }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Check Out
                    </td>
                    <td>
                        {{ $order->check_out }}
                    </td>
                </tr>
            </table>
            <div class="row p-2">
                <button class="btn btn-primary mx-2" onclick="window.print()">Print</button>
                @if (Auth::user()->roles == 'receptionist')
                    @if (!$order->check_in_status)
                        <form action="{{ route('receptionist.orders.checkin', $order->id) }}" class="mx-2"
                            method="post">
                            @csrf
                            <input type="submit" value="Check in" class="btn btn-primary">
                        </form>
                    @elseif(!$order->check_out_status)
                        <form action="{{ route('receptionist.orders.checkout', $order->id) }}" class="mx-2"
                            method="post">
                            @csrf
                            <input type="submit" value="Check out" class="btn btn-primary">
                        </form>
                    @endif
                    <form action="{{ route('receptionist.orders.destroy', $order->id) }}" class="mx-2"
                        method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" class="btn btn-primary">
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
