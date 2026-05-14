<?php

namespace App\Http\Controllers;

use App\Models\wards;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Room;
use App\Models\districts;
use App\Models\CategoryRoom;
class ListRoomController extends Controller
{
    private $yeuCauLoc;
    private $yeucauSapXep = 0;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function filter(Request $request)
    {
        if(isset($request->category_id) || isset($request->name)) {
            // Nếu có điều kiện lọc
            $filters = (object) $request->all(); // Lấy điều kiện mới
            if($request->name != null) {
                $old_wards = "Tất cả";
                $old_category = "Tất cả";
                $filters->category_id  = "Tất cả";
            }else {
                if($request->ward_id == "Tất cả" || $request->ward_id == null) {
                    $old_wards = "Tất cả";
                }else {
                    $old_wards = wards::where('code', $request->ward_id )->first();  
                }
                // Lấy tên loại phòng
                if($request->category_id == "Tất cả" || $request->category_id == null) {
                    $old_category = "Tất cả";
                }else {
                    $old_category = CategoryRoom::where('id', $request->category_id)->first()->name;
                }
            }
            // Lấy tên xã 
            
            // Lưu tên xã
            if(isset($filters->old_wards)) {
                $filters->old_wards = $old_wards;
            }else {
                $filters->old_wards = $old_wards;
            }
        // Lưu tên loại phòng
            if(isset($filters->old_category)) {
                $filters->old_category = $old_category;
            }else {
                $filters->old_category = $old_category;
            }
            // Cập nhật vào session
            session()->put('filters', $filters);
            $sort = ["sapXep" => "created_at", "sortBy" => 'desc'];
            session()->put('sort', $sort);
        }else{
            // Nếu có điều kiện sắp xếp
            if(isset($request->sapXep)) {
                session()->put('sort', $request->all());
            }else {
                $sort = ["sapXep" => "created_at", "sortBy" => 'desc'];
                session()->put('sort', $sort);
            }
        }
        $sort = session()->get('sort');
        $filters = session()->get('filters');
        $room = Room::query()
            ->name($filters)
            ->district($filters)
            ->ward($filters)
            ->category($filters)
            ->price($filters)
            ->area($filters)
            ->addons($filters)
            ->where('status', 1)
            ->orderBy($sort['sapXep'],$sort['sortBy'])
            ->paginate(6);
        $allRoom = Room::query()
            ->name($filters)
            ->district($filters)
            ->ward($filters)
            ->category($filters)
            ->price($filters)
            ->where('status', 1)
            ->area($filters)
            ->orderBy($sort['sapXep'],$sort['sortBy'])
            ->addons($filters)->get();
            $categoryRoom = CategoryRoom::all();
            //Đếm số phòng theo từng loại
            $categoryCount = [];
            foreach ($categoryRoom as $key => $value) {
                $categoryCount+= [$value->name => 0];
            }
            foreach ($allRoom as $key => $value) {
                $categoryCount[$value->categoryRoom->name]++;
            }
            $districts = districts::where('province_code', 01)->get();
            return view('frontend.room.list', compact('room','categoryCount','districts', 'categoryRoom'));
    }
}
