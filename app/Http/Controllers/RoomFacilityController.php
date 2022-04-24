<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomFacility;
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
        return view('rooms.facility.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($room)
    {
        return view('rooms.facility.form', [
            'room' => Room::where('no_room', $room)->first()
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
        return view('rooms.facility.form', [
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
    public function destroy(RoomFacility $roomFacility)
    {
        if (Room::destroy($roomFacility->id)) return redirect()->back()->with('msg', ['success', 'Room Facility deletion success!']);
        return redirect()->back()->with('msg', ['danger', 'Room Facility deletion failed!']);
    }
}
