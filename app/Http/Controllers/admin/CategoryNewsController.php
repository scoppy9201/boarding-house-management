<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryNews;
use Redirect;
use Illuminate\Support\Str;

class CategoryNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryNews = CategoryNews::all();
        return view('dashboard.categorynews.index', compact('categoryNews'));
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
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|max:500|string',
        ], [
            'name.required' => 'Vui lòng nhập tên.',
            'name.max' => 'Tên không được vượt quá :max ký tự.',
            'description.required' => 'Vui lòng nhập mô tả.',
            'description.max' => 'Mô tả không được vượt quá :max ký tự.',
        ]);
        $slug = Str::slug($request->name);
        $slugCheck = CategoryNews::where('slug', $slug)->get();
        if (count($slugCheck) > 0) {
            $toast = $this->makeToast(false, 'Thêm thành công', 'Loại tin tức  bị trùng');
            $categoryNews = CategoryNews::all();
            return redirect()->back()->with(['toast' => $toast, 'categoryNews' => $categoryNews]);
        }
        $result = CategoryNews::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description
        ]);
        $toast = $this->makeToast($result, 'Thêm thành công', 'Lỗi, thử lại');
        $categoryNews = CategoryNews::all();
        return redirect()->back()->with(['toast' => $toast, 'categoryNews' => $categoryNews]);
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
        $data = CategoryNews::where('id', $id)->first();
        return view('dashboard.categorynews.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|max:500|string',
        ], [
            'name.required' => 'Vui lòng nhập tên.',
            'name.max' => 'Tên không được vượt quá :max ký tự.',
            'description.required' => 'Vui lòng nhập mô tả.',
            'description.max' => 'Mô tả không được vượt quá :max ký tự.',
        ]);
        $slug = Str::slug($request->name);
        $slugCheck = CategoryNews::where('slug', $slug)->where('id', '!=', $id)->get();
        if (count($slugCheck) > 0) {
            $toast = $this->makeToast(false, 'Thêm thành công', 'Loại tin tức bị trùng');
            return redirect()->back()->with(['toast' => $toast]);
        }
        $result = CategoryNews::where('id', $id)->update([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description
        ]);
        $toast = $this->makeToast($result, 'Cập nhật thành công', 'Cập nhật thất bại');
        $categoryNews = CategoryNews::all();
        return redirect()->route('categorynew.index')->with(['toast' => $toast, 'categoryNews' => $categoryNews]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = CategoryNews::where('id', $id)->delete();
        $toast = $this->makeToast($result, 'Xóa thành công', 'Xóa thất bại');
        $categoryNews = CategoryNews::all();
        return redirect()->back()->with(['toast' => $toast, 'categoryNews' => $categoryNews]);
    }
}