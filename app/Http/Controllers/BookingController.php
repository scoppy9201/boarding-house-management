<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingInformation;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $Rooms = Room::where('chutro_id', $user->id)->get();
        $BookingList =  array();
        foreach ($Rooms as $key => $value) {
            foreach ($value->getBooking as $item) {
                array_push($BookingList,$item);
            }
        }
    
        return view('frontend.booking.show', compact('BookingList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( string $id)
    {
        $user = Auth::user();
        $BookList = Room::where('chutro_id', $user->id)->where('id', $id)->first()->getBooking;
       
        $BookingList =array_reverse($BookList->all());
        return view('frontend.booking.show', compact('BookingList'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
