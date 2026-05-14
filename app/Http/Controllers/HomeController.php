<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\CategoryRoom;
use App\Models\districts;
use App\Models\news;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sort = ["sapXep" => "created_at", "sortBy" => 'desc'];
        $rooms = Room::where('status', 1)->orderBy($sort['sapXep'],$sort['sortBy'])->take(6)->get(); 
        $news = news::where('status', 1)->orderBy('view','desc')->take(3)->get(); 
        $categoryRoom = CategoryRoom::all();
        $districts = districts::where('province_code', 01)->get();
        return view('frontend.home', compact('rooms', 'categoryRoom', 'districts','news'));
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
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
}
