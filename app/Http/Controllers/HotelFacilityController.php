<?php

namespace App\Http\Controllers;

use App\Models\HotelFacility;
use Illuminate\Http\Request;

class HotelFacilityController extends Controller
{

    public function home()
    {
        return view('facilities.home');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('facilities.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('facilities.form');
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
     * @param  \App\Models\HotelFacility  $hotelFacility
     * @return \Illuminate\Http\Response
     */
    public function show(HotelFacility $hotelFacility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HotelFacility  $hotelFacility
     * @return \Illuminate\Http\Response
     */
    public function edit($hotelFacility)
    {
        return view('facilities.form', [
            'facility' => HotelFacility::find($hotelFacility)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HotelFacility  $hotelFacility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HotelFacility $hotelFacility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HotelFacility  $hotelFacility
     * @return \Illuminate\Http\Response
     */
    public function destroy(HotelFacility $hotelFacility)
    {
        //
    }
}
