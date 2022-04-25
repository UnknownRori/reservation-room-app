<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomFacility;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('roomfacility.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roomfacility.form', [
            'roomtype' => RoomType::all(),
        ]);
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
     * @param  \App\Models\RoomFacility  $roomFacility
     * @return \Illuminate\Http\Response
     */
    public function show(RoomFacility $roomFacility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoomFacility  $roomFacility
     * @return \Illuminate\Http\Response
     */
    public function edit($roomFacility)
    {
        return view('roomfacility.form', [
            'roomtype' => RoomType::all(),
            'facility' => RoomFacility::findOrFail($roomFacility)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomFacility  $roomFacility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomFacility $roomFacility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomFacility  $roomFacility
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (RoomFacility::destroy($id)) return redirect()->back()->with('msg', ['success', 'Room Facility deletion success!']);
        return redirect()->back()->with('msg', ['danger', 'Room Facility deletion failed!']);
    }
}
