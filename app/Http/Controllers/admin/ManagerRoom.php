<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Notification;
use Redirect;

class ManagerRoom extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $room = Room::all();
        return view('dashboard.room.index', compact('room'));
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
        $room = Room::where("id", $id)->first();
        $this->deleteImagesByName($room->main_img, 'main_room');
        if($room->list_img){
            foreach (json_decode($room->list_img) as $key => $value) {
                // $this->deleteImagesByName($value, 'multi_room');
            }
        }
        $result = Room::where('id', $id)->delete();
        if($result) {
           
            $title = "Phòng trọ: ".$room->name." của bạn đã bị hệ thống xóa bởi có nhiều sai phạm";
            $routename = 'user.index';
            $notification = $this->MakeNotification($room->chutro_id,$title, $routename);
        }
        $toast = $this->makeToast($result, 'Xóa thành công', 'Xóa thất bại');
        $room = Room::all();
        return view('dashboard.room.index', compact('toast', 'room'));
    }
    public function hideRoom($id)
    {
        $result = Room::where('id', $id)->update([
            'status' => 0,
        ]);
        if($result) {
            $user_id = Room::where("id", $id)->first()->chutro_id;
            $title = "Phòng trọ của bạn đã bị hệ thống ẩn bởi thông tin không đúng, đủ";
            $routename = 'Room.show';
            $element = [$id];
            $notification = $this->MakeNotification($user_id,$title, $routename, $element);
        }
        $toast = $this->makeToast($result, 'Ẩn thành công', 'Ẩn thất bại');
        return Redirect::back()->with(['toast' => $toast ]);
    }
    public function showRoom($id)
    {
        $result = Room::where('id', $id)->update([
            'status' => 1,
        ]);
        if($result) {
            $user_id = Room::where("id", $id)->first()->chutro_id;
            $title = "Phòng trọ của bạn đã được hiện trở lại";
            $routename = 'Room.show';
            $element = [$id];
            $notification = $this->MakeNotification($user_id,$title, $routename, $element);
        }
        $toast = $this->makeToast($result, 'Hiện thành công', 'Hiện thất bại');
        return Redirect::back()->with(['toast' => $toast ]);
    }
}
