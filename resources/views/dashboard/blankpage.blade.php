@extends('layouts.dashboard')
@section('style')
<style>
.btn-to-right {
    float: right;
}

</style>
@endsection
@section('content')
    <!-- Container-fluid start -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-header-left">
                        <h3>Quản lý loại phòng trọ
                           <small>
                            {{-- <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('home')}}">
                                        <i class="fa fa-home"></i>
                                    </a>
                                </li>
                                
                            </ol>     --}}
                        </small> 
                        </h3>
                    </div>
                </div>
                <div class="col-sm-6">

                    <a href="{{route('them_loai_phong')}}" class="btn btn-outline-success btn-to-right">Thêm loại phòng</a>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid end -->
@endsection
