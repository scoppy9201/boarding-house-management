<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;
use Illuminate\Database\Eloquent\Builder;
use Redirect;
use App\Models\CategoryNews;
use App\Models\CommentNews;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = news::where('status', 1)->orderBy('created_at', 'desc')->paginate(10);
        $rooms = Room::where('status', 1)->orderBy('created_at','desc')->take(3)->get(); 
        $category = categoryNews::all();
        return view('frontend.news.index', compact('news', 'category','rooms'));
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
    public function show(string $slug)
    {
        $news = news::where('slug', $slug)->first();     
        news::where('slug', $slug)->update(['view' => $news->view+=1]);
        $category = categoryNews::all();
        $rooms = Room::where('status', 1)->orderBy('created_at','desc')->take(3)->get(); 
        return view('frontend.news.show', compact('news', 'category','rooms'));
    }
    public function search(Request $request)
    {
        $search = $request->title;
        $news = news::query()->title($request)->paginate(10);
        $rooms = Room::where('status', 1)->orderBy('created_at','desc')->take(3)->get(); 
        $category = categoryNews::all();
        return view('frontend.news.filter', compact('news', 'category','rooms', 'search'));
    }
    public function filter($id)
    {
        $search = categoryNews::where('id', $id)->first()->name;
        $news = news::where('category_id', $id)->paginate(10);
        $rooms = Room::where('status', 1)->orderBy('created_at','desc')->take(3)->get(); 
        $category = categoryNews::all();
        return view('frontend.news.filter', compact('news', 'category','rooms', 'search'));
    }
    public function comment(Request $request, $id)
    {
        $request->validate([
            'content' =>'string|max:500|required'
        ]);
        $author_id = Auth::user()->id;
        $result = CommentNews::create([
            'news_id' => $id,
            'author_id' => $author_id,
            'content' => $request->content
        ]);
        if($result) {
            $news = news::where('id', $id)->first();
            $user_id = $news->getUser->id;
            $title = "Bài viết của bạn có một bình luận mới";
            $route = 'frontend.news.show';
            $element = [$news->slug];
            $notification = $this->MakeNotification($user_id, $title, $route, $element);
        }
        $toast = $this->makeToast($result, 'Bình luận đã được gửi', 'Lỗi, Thử lại');
        return Redirect::back()->with(['toast' => $toast ]);
    }
    public function deleteComment($id)
    {
        $comment = CommentNews::where('id', $id)->first();
        if($comment->getUser->id == Auth::user()->id || $comment->getUser->author_id == Auth::user()->id) {
            $result = CommentNews::where('id', $id)->delete();
            $toast = $this->makeToast($result, 'Xóa thành công', 'Lỗi, Thử lại');
        return Redirect::back()->with(['toast' => $toast ]);
        }else {
            $toast = $this->makeToast(false, 'Xóa thành công', 'Lỗi, Thử lại');
            return Redirect::back()->with(['toast' => $toast ]);
        }
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
}
