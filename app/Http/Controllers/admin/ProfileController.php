<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
 
        return view('dashboard.profile.index', compact('user'));
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
    public function ChangePassword(Request $request)
    {
        $request->validate([
            'OldPassword' => 'required',
            'NewPassword' => 'required|min:8|string|confirmed',
        ], [
            'NewPassword.confirmed' => "Nhập lại mật khẩu chưa chính xác",
            "NewPassword.min" => "Mật khẩu mới phải có tối thiểu 8 ký tự"
        ]);
        $user = Auth::user();
        if(Hash::check($request->OldPassword, $user->password) ) {
            $newsPassword = Hash::make($request->NewPassword);
            $result = User::where('id', $user->id)->update(['password'=> $newsPassword]);
            $toast = $this->makeToast($result , 'Đổi mật khẩu thành công.', 'Lỗi, Thử lại');
            return Redirect::back()->with(['toast' => $toast ]);

        }else {
         
            $toast = $this->makeToast(false, 'Thành công', 'Mật khẩu cũ không chính xác');
            return Redirect::back()->with(['toast' => $toast ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
