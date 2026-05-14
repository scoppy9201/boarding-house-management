<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Notification;

use Illuminate\Support\Facades\Route;
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function makeToast($result, $textTrue ="Thành công", $textFalse = "Thất bại")
    {
        if($result) {
            return [$textTrue, "green"];
        } else {
           return [$textFalse, "red"];
        }
    }
    public function deleteImagesByName($filename, $path)
    {
        //ImageUpload::where('filename',$filename)->delete();
        $path = public_path() . '\\images\\' . $path . '\\' . $filename;
        if (file_exists($path)) {
            unlink($path);
            return true;
        }
        return false;
    }
    public function MakeNotification($user_id, $title, $nameroute, $element = [])
    {
        
        $link = route($nameroute, $element);
        $result = Notification::create([
            'user_id' =>$user_id,
            'title' => $title,
            'link' => $link,
            'status' => 0

        ]);
        return $result;
    }
}
