<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Collection;

class UserController extends Controller
{

    public function uploadstep1(Request $request, $id)
    {
        
        $regex = '/(?:https?:\/\/)?(?:www\.)?(mbasic.facebook|m\.facebook|facebook|fb)\.(com|me)\/(?:(?:\w\.)*#!\/)?(?:pages\/)?(?:[\w\-\.]*\/)*([\w\-\.]*)/';
        $validated = $request->validate([
            'name' => 'required|max:255',
            'PhoneNumber' => 'required|numeric',
            'Zalo' => 'numeric|digits:10',
            'Facebook' => 'url',
        ]);
        
        $result = User::where('id', $id)->update([
            'name' => $request->name,
            'PhoneNumber' => $request->PhoneNumber,
            'Zalo' => $request->Zalo,
            'Facebook' => $request->Facebook,
        ]);
        if($result) {
            return response()->json(['success'=>"Thành công"]);
        }else {
            return response()->json(['error'=>"Lỗi cập nhật, thử lại sau"],400);
        }; 
    }
public function save_description(Request $request, $id)
{
    if($request->description) {
        $result = User::where('id', $id)->update([
            'description' => $request->description
        ]);
        if($result) {
            return response()->json(['success'=>"Thành công"]);
        }else {
            return response()->json(['error'=>"Lỗi cập nhật, thử lại sau"],400);
        };
    }else {
        return response()->json(['error'=>$request->description],400);
    }
    
}

public function uploadstep2(Request $request, $id)
{
    $validated = $request->validate([
       'province' => 'required',
       'wards' => 'required',
       'address' => 'required',
       'lat' => 'required',
       
    ], [
        'lat.required' => "Bạn chưa chọn vị trí trên bản đồ",
       
    ]);
    $address = [
        'province' => $request->province,
        'wards' => $request->wards,
       'address' => $request->address,
       'lat' => $request->lat,
       'long' => $request->long,
    ];
    $result = User::where('id', $id)->update([
      'address' => $address
    ]);
    if(true) {
        return response()->json(['success'=>"Thành công"]);
    }else {
        return response()->json(['error'=>"Lỗi cập nhật, thử lại sau"],400);
    }
}
public function uploadstep3(Request $request, $id)
    {
        $data = User::where('id', $id)->first();
        if($data->profile_photo_path != null && $request->imgPath =='') {
            return response()->json(['success'=>"Thành công"]);
        }
        $oldImage = $data->profile_photo_path;
        $validated = $request->validate([
            'imgPath' => 'required',
           
        ], [
            'imgPath.required' => "Bạn chưa chọn ảnh",
        ]);
        
        $result = User::where('id', $id)->update([
            'profile_photo_path' => $request->imgPath,
        ]);
        if($result) {
            if(isset($oldImage)) {
                $path=public_path().'\\images\\user_avatar\\'.$oldImage;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            return response()->json(['success'=>"Thành công"]);
        }else {
            return response()->json(['error'=>"Lỗi cập nhật, thử lại sau"],400);
        }
      ;
       
    }
public function uploadImage(Request $request)
{
    $image = $request->file('file');
    $imageName = $image->getClientOriginalName();
    $image->move(public_path('images/user_avatar'),$imageName);
    return response()->json(['success'=>$imageName]);
}
public function deleteImage(Request $request)
{
    
    $filename =  $request->get('filename');
    //ImageUpload::where('filename',$filename)->delete();
    $path=public_path().'\\images\\user_avatar\\'.$filename;
    if (file_exists($path)) {
        unlink($path);
        return response()->json(['success'=>$filename]);
    }
    return response()->json(['error'=>$path]);
}

}
