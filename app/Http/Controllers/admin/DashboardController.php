<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Carbon::setLocale('vi');
        $roomsInMonth = Room::whereMonth('created_at',  Carbon::now()->month)
                        ->whereYear('created_at', Carbon::now()->year)->get();
        $userInMonth = User::whereMonth('created_at',  Carbon::now()->month)
                        ->whereYear('created_at', Carbon::now()->year)->get();
        $userLastMonth = User::whereMonth('created_at',  Carbon::now()->subMonth()->month)
                        ->whereYear('created_at', Carbon::now()->subMonth()->year)->get();
        $numberRoomInWeek = array();
        for ($i=7; $i >= 0; $i--) { 
            if($i == 0) {
                $thu = "Today";
            }else {
                $thu = (Carbon::now()->subDays($i))->format('l');
            }
            $value = count(Room::whereDay('created_at',  Carbon::now()->subDays($i)->day -$i)->whereMonth('created_at',  Carbon::now()->subDays($i)->month)->whereYear('created_at', Carbon::now()->subDays($i)->year)->get());
            array_push($numberRoomInWeek, [
                'thu' => $thu,
                'value' => $value
            ]);
          
        }
      
        $numberRoomInMonth = count($roomsInMonth);
        $numberUserInMonth = count($userInMonth);
        $numberUserLastMonth = count($userLastMonth);
        if($numberUserLastMonth == 0) {
            $percentageUser = 100;
        }else {
            $percentageUser = round(($numberUserInMonth / $numberUserLastMonth) *100, 1);
        }
        // $roomsInDay = Room::whereDay('created_at', Carbon::now()->day)
        //                 ->whereMonth('created_at',  Carbon::now()->month)
        //                 ->whereYear('created_at', Carbon::now()->year)->get();
        // dd($roomsInMonth);
                
        return view('dashboard.home', compact('numberRoomInMonth', 'numberUserInMonth', 'numberUserLastMonth', 'percentageUser', 'numberRoomInWeek'));
    }
}
