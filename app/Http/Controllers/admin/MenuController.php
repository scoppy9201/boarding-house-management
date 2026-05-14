<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\menu;
use PhpParser\Node\Expr\BinaryOp\BooleanOr;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = menu::where('parent_id',0)->get();
       
        $allMenus = menu::pluck('name','id')->all();
        return view('dashboard.menu.index', compact('menus', 'allMenus'));
    }
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required',
        ]);

        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        $result =  menu::create($input);
        $toast = $this->makeToast($result, 'Thêm Thành công', 'Thêm thất bại');
        return redirect()->route('menus.index')->with(['toast' =>$toast]);
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
    public function delete($id)
    {
        
        $childs = menu::where('id', $id)->first()->Childs;
        if(count($childs) == 0) {
            $result = menu::where('id', $id)->delete();
            $toast = $this->makeToast($result, "Xóa thành công", "Lỗi khi xóa, thử lại");
            return redirect()->route('menus.index')->with(['toast' =>$toast]);
        }else {
            foreach ($childs as $value) {
               
                $result = $this->deleteChild($value->id);
                if(!$result) {
                    $toast = $this->makeToast($result, "Xóa thành công", "Lỗi khi xóa, thử lại");
                    $menus = menu::where('parent_id',0)->get();
                    $allMenus = menu::pluck('name','id')->all();
                    return redirect()->route('menus.index')->with(['toast' =>$toast]);
                }
            }
        }
        $result = menu::where('id', $id)->delete();
        $toast = $this->makeToast($result, "Xóa thành công", "Lỗi khi xóa, thử lại");
        $menus = menu::where('parent_id',0)->get();
        $allMenus = menu::pluck('name','id')->all();
        return redirect()->route('menus.index')->with(['toast' =>$toast]);
        
    }
    public function deleteChild($id)
    {
        $childs = menu::where('id', $id)->first()->Childs;
        if(count($childs) == 0) {
            $result = menu::where('id', $id)->delete();
            $toast = $this->makeToast($result, "Xóa thành công", "Lỗi khi xóa, thử lại");
            return redirect()->route('menus.index')->with(['toast' =>$toast]);
        }else {
            foreach ($childs as $value) {
                $result =   $this->deleteChild($value->id);
                if(!$result) {
                    $toast = $this->makeToast($result, "Xóa thành công", "Lỗi khi xóa, thử lại");
                    $menus = menu::where('parent_id',0)->get();
                    $allMenus = menu::pluck('name','id')->all();
                    return redirect()->route('menus.index')->with(['toast' =>$toast]);
                }
            }
        }
        $result = menu::where('id', $id)->delete();
        $toast = $this->makeToast($result, "Xóa thành công", "Lỗi khi xóa, thử lại");
       return redirect()->route('menus.index')->with(['toast' =>$toast]);
    }
}
