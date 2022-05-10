<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show($user, Orders $orders)
    {
        if (Auth::user()->name != $user && Auth::user()->roles != 'receptionist') return redirect()->back()->with('msg', ['warning', 'You are not the owner!']);
        return view('orders.show', [
            'order' => $orders
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Orders::destroy($id)) return redirect()->back()->with('msg', ['success', 'Order successfully deleted!']);
        return redirect()->back()->with('msg', ['danger', 'Order failed to delete!']);
    }

    public function check_in($id)
    {
        $orders = Orders::find($id);
        $orders->check_in_status = true;
        if ($orders->save()) return redirect()->back()->with('msg', ['success', 'Check in success!']);
        return redirect()->back()->with('msg' . ['success', 'Check in failed!']);
    }

    public function check_out($id)
    {
        $orders = Orders::find($id);
        $orders->check_out_status = true;
        if ($orders->save()) return redirect()->back()->with('msg', ['success', 'Check out success!']);
        return redirect()->back()->with('msg' . ['success', 'Check out failed!']);
    }

    public function history()
    {
        return view('orders.history');
    }
}
