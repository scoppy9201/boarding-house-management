@extends('layouts.dashboard')
@section('style')
<link rel="stylesheet" href="{{asset('assets/css/treemenu.css')}}">
<style>
.btn-to-right {
    float: right;
}
.tree>li a {
   padding: 2px 6px;
    color: white;
    background: red;
    border-radius: 5px;
    margin-left: 10px;
}
.tree , .tree>li>ul {
    display: flex;
    flex-direction: column;
}
</style>
@endsection
@section('title')
   Menu động
@endsection
@section('content')
    <!-- Container-fluid start -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-header-left">
                        <h3>Menu động
                           <small>
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item">
                                      <a href="{{ route('home') }}">
                                          <i class="fa fa-home"></i>
                                      </a>
                                  </li>
                                  <li class="breadcrumb-item ">- Trang chủ</li>
                              </ol>
                          </small>
                        </h3>
                    </div>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid end -->
    <div class="card-body">
        <div class="row">
           <div class="col-md-6">
              <h5 class="mb-4 text-center bg-success text-white rounded-2 p-10">Thêm menu mới</h5>
              <form accept="{{ route('menus.store')}}" method="post">
                 @csrf
                  @if(count($errors) > 0)
                           <div class="alert alert-danger  alert-dismissible">
                               <button type="button" class="close" data-dismiss="alert">×</button>
                               @foreach($errors->all() as $error)
                                       {{ $error }}<br>
                               @endforeach
                           </div>
                       @endif
                   @if ($message = Session::get('success'))
                    <div class="alert alert-success  alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>   
                            <strong>{{ $message }}</strong>
                    </div>
                 @endif
                 <div class="row">
                    <div class="col-md-12">
                       <div class="form-group">
                          <label>Title</label>
                          <input type="text" name="name" class="form-control">   
                       </div>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-md-12">
                       <div class="form-group">
                          <label>Địa chỉ</label>
                          <input type="text" name="location" class="form-control">   
                       </div>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-md-12">
                       <div class="form-group">
                          <label>Parent</label>
                          <select class="form-control" name="parent_id">
                             <option selected disabled>Danh sách menu</option>
                             @foreach($allMenus as $key => $value)
                                <option value="{{ $key }}">{{ $value}}</option>
                             @endforeach
                          </select>
                       </div>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-md-12">
                       <button class="btn btn-success">Lưu</button>
                    </div>
                 </div>
              </form>
           </div>
           <div class="col-md-6">
              <h5 class="text-center mb-4 bg-info text-white rounded-2 p-10">Menu List</h5>
               <ul id="tree1">
                  @foreach($menus as $menu)
                     <li>
                         {{ $menu->name }}
                        <a href="{{route('menus.delete', $menu->id)}}">X</a>
                         @if(count($menu->childs))
                             @include('dashboard.menu.child',['childs' => $menu->childs])
                         @endif
                     </li>
                  @endforeach
                 </ul>
           </div>
        </div>
     </div>
@endsection
@section('js')
    <script src="{{asset('assets/js/treeview.js')}}"></script>
@endsection
