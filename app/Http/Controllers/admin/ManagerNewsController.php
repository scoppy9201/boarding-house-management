<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news;
use App\Models\CategoryNews;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Carbon\Carbon;
class ManagerNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = news::all();
        Carbon::setLocale('vi');
        $current = Carbon::now();
        return view('dashboard.news.index', compact('news', 'current'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = CategoryNews::all();
        $user =Auth::user();
        return view('dashboard.news.create', compact('category', 'user'));
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
    public function edit(string $slug)
    {
        $data = news::where('slug', $slug)->first();
        $category = CategoryNews::all();
        $user =Auth::user();
        return view('dashboard.news.edit', compact('data','category','user'));
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
    public function destroy(string $slug)
    {
        $data = news::where('slug', $slug)->first();
        $this->deleteImagesByName($data->thumbnail, 'thumbnail_news');
        $result = news::where('slug', $slug)->delete();
        $toast = $this->makeToast($result, 'Xóa thành công', 'Xóa thất bại');
        return Redirect::route('news.index')->with(['toast' => $toast ]);
    }
    public function confirmAdd($slug)
    {
        $News = news::where('slug', '=', $slug)->get();
        if(count($News) > 0) {
            $toast = $this->makeToast(true, "Thêm thành công");
            return Redirect::route('news.index')->with(['toast' => $toast ]);
        }else {
            $toast = $this->makeToast(false, "Thêm thành công");
            return Redirect::route('news.index')->with(['toast' => $toast ]);
        }
    }
    public function confirmUpdate($slug)
    {
        $News = news::where('slug', '=', $slug)->get();
        if(count($News) > 0) {
            $toast = $this->makeToast(true, "Cập nhật thành công");
            return Redirect::route('news.index')->with(['toast' => $toast ]);
        }else {
            $toast = $this->makeToast(false, "Thêm thành công");
            return Redirect::route('news.index')->with(['toast' => $toast ]);
        }
    }
    public function status($slug)
    {
        $News = news::where('slug', '=', $slug)->first();
        if($News->status == 1 ) {
            $result = news::where('slug', '=', $slug)->update(['status' => 0]);
            $toast = $this->makeToast($result, 'Ẩn thành công', 'Ẩn thất bại');
            return Redirect::route('news.index')->with(['toast' => $toast ]);
        }else {
            $result = news::where('slug', '=', $slug)->update(['status' => 1]);
            $toast = $this->makeToast($result, 'Hiển thị thành công', 'Hiển thị thất bại');
            return Redirect::route('news.index')->with(['toast' => $toast ]);
        }
    }
}
