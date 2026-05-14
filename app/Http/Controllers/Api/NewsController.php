<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news;
use Illuminate\Support\Str;
use Redirect;

class NewsController extends Controller
{
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
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
            'short_content' => 'required',
            'content' => 'required',
            'thumbnail' => 'required',
            'author_id' => 'required',
            
        ],[
            'author_id.required' => "Bạn chưa đăng nhập",
            'name.max' => "Tên tiêu đề không dài quá 255 ký tự",
            'name.required' => "Bạn cần điền trường tên bài viết",
            'category_id.required' => "Bạn cần chọn loại bài viết",
            'short_content.required' => "Bạn cần điền phần tóm tắt",
            'content.required' => "Bạn cần điền nội dung bài viết",
            'thumbnail.required' => "Bạn cần chọn ảnh bài viết",
        ]);
       
        $slug = $this->makeSlugUnique($request->name);
        $result = news::create([
            'title' => $request->name,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'author_id' =>  $request->author_id,
            'content' => $request->content,
            'short_content' => $request->short_content,
            'thumbnail' => $request->thumbnail,
            'key_words' => json_encode($request->keyword) ,
            'view' => 0
        ]);
        if ($result) {
            return response()->json(['data' => "Thành công", 'slug' => $slug]);
        } else {
            return response()->json(['error' => "Lỗi cập nhật"], 400);
        }
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
    public function update(Request $request)
    {
        $request->validate([
            'slug' =>'required',
            'name' => 'required|max:255',
            'category_id' => 'required',
            'short_content' => 'required',
            'content' => 'required',
            'thumbnail' => 'required',
            'author_id' => 'required'
            
        ],[
            'author_id.required' => "Bạn chưa đăng nhập",
            'name.max' => "Tên tiêu đề không dài quá 255 ký tự",
            'name.required' => "Bạn cần điền trường tên bài viết",
            'slug.required' => "Lỗi, thử lại sau !!!",
            'category_id.required' => "Bạn cần chọn loại bài viết",
            'short_content.required' => "Bạn cần điền phần tóm tắt",
            'content.required' => "Bạn cần điền nội dung bài viết",
            'thumbnail.required' => "Bạn cần chọn ảnh bài viết"
        ]);
       
        $slug = $request->slug;
        $news = news::where('slug', $slug)->first();
        if($news->thumbnail != $request->thumbnail) {
            $this->deleteImagesByName($news->thumbnail, 'thumbnail_news');
        }
        $result = news::where('slug', $slug)->update([
            'title' => $request->name,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'author_id' =>  $request->author_id,
            'content' => $request->content,
            'short_content' => $request->short_content,
            'thumbnail' => $request->thumbnail,
            'key_words' => json_encode($request->keyword) 
        ]);
        if ($result) {
            return response()->json(['data' => "Thành công", 'slug' => $slug]);
        } else {
            return response()->json(['error' => "Lỗi cập nhật"], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function upload(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images/thumbnail_news'), $imageName);
        return response()->json(['success' => $imageName]);
    }
    public function makeSlugUnique($string)
    {
        $slug = Str::slug($string);
        do {
            $code = random_int(100000, 999999);
        } while (news::where("slug", "=", $slug.$code)->first());
  
        return $slug.$code;
    }
}