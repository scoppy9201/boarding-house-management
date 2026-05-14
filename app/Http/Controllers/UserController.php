<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $authUser = Auth::user();
        $data = User::where('id', $user->id)->first();
        $Room = Room::where('chutro_id', $user->id)->whereNotNull('status')->paginate(6);
        $Room->withPath('/users/phongtro');
        if($data->profile_photo_path == null) {
            return view('frontend.user.update')->with('user', $data);
        }else {
            return view('frontend.user.index', compact('Room', 'authUser'))->with('user', $data);
        }
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
        $authUser = Auth::user();
        $user = User::where('id', $id)->first();
        $Room = Room::where('chutro_id', $id)->whereNotNull('status')->paginate(6);
        return view('frontend.user.index', compact('Room', 'authUser',))->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $data = User::where('id', $user->id)->first();
        return view('frontend.user.update')->with('user', $data);
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
    public function changePassword()
    {
        return view('frontend.user.changepassword');
    }
}
