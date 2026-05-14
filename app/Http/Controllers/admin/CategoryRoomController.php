<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\CategoryRoom;
use Illuminate\Support\Facades\Validator;

class CategoryRoomController extends Controller
{

    public function index()
    {
        $data = CategoryRoom::all();
        return view('dashboard.categoryroom.index', compact('data'));
    }
    
    public function create()
    {
        return view('dashboard.categoryroom.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:category_rooms|max:255',
            'description' => 'max:500',
            'path_img' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên.',
            'name.unique' => 'Tên đã bị trùng vui lòng nhập tên khác',
            'name.max' => 'Tên không được vượt quá :max ký tự.',
            'description.max' => 'Mô tả không được vượt quá :max ký tự.',
            'path_img.required' => 'Vui lòng chọn hình ảnh.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('name') && $errors->get('name')[0] == 'Tên đã bị trùng vui lòng nhập tên khác') {
                $this->deleteImagebyPath($request->path_img);
            }
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $loaiPhong = new CategoryRoom;
        $loaiPhong->name = $request->name;
        $loaiPhong->image = $request->path_img;
        $loaiPhong->description = $request->description ?? null;
        $result = $loaiPhong->save();
        $toast = $this->makeToast($result, 'Thêm thành công', 'Thêm thất bại');
        return redirect()->route('loai_phong')->with('toast', $toast);
    }
    
    public function upload(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images/categoryroom'), $imageName);
        return response()->json(['success' => $imageName]);
    }
    
    function show(string $id)
    {
    }
    
    public function edit(string $id)
    {

        $data = CategoryRoom::where('id', $id)->first();
        return view('dashboard.categoryroom.edit', compact('data'));
    }
    
    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:category_rooms,name,' . $request->id,
            'description' => 'max:500',
            'path_img' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên.',
            'name.unique' => 'Tên đã bị trùng vui lòng nhập tên khác',
            'name.max' => 'Tên không được vượt quá :max ký tự.',
            'description.max' => 'Mô tả không được vượt quá :max ký tự.',
            'path_img.required' => 'Vui lòng chọn hình ảnh.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $oldData = CategoryRoom::where('id', $request->id)->first();
        if ($request->path_img  == $oldData->image) {
            $newImagePath = $oldData->image;
        } else {
            $this->deleteImagebyPath($oldData->image);
            $newImagePath = $request->path_img;
        }
        $result = CategoryRoom::where('id', $request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' =>  $newImagePath
        ]);
        $toast = $this->makeToast($result, 'Cập nhật thành công', 'Cập nhật thất bại');
        return redirect()->route('loai_phong')->with('toast', $toast);
    }
    
    public function destroy(string $id)
    {
        $data = CategoryRoom::where('id', $id)->first();
        $this->deleteImagebyPath($data->image);
        $result = CategoryRoom::where('id', $id)->delete();
        $toast = $this->makeToast($result, 'Xóa thành công', 'Xóa thất bại');
        $data = CategoryRoom::all();
        return redirect()->route('loai_phong')->with('toast', $toast);
    }
    
    public function deleteImagebyPath($link)
    {
        $filename = $link;
        $path = public_path() . '\\images\\categoryroom\\' . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
    }
    
    public function deleteImage(Request $request)
    {
        $filename =  $request->get('filename');
        $path = public_path() . '\\images\\categoryroom\\' . $filename;
        if (file_exists($path)) {
            unlink($path);
            return response()->json(['success' => $filename]);
        }
        return response()->json(['error' => $path]);
    }
}