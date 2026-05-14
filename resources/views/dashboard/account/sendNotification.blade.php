@extends('layouts.dashboard')
@section('style')
    <style>
        .btn-to-right {
            float: right;
        }

        .image_edit {
            max-height: 300px;
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
                        <h3>Gửi thông báo
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

                    <a href="{{ route('account.index') }}" class="btn btn-outline-warning btn-to-right">Quay lại</a>

                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid end -->

    <!-- Container-fluid start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Nhập nội dung thông báo bạn muốn gửi cho {{ $user->name }}</h5>
                    </div>
                    <div class="card-body admin-form row" >
                        <form id="form_create" class="col-sm-6 order-2 order-sm-1" method="POST" action="{{ route('account.sendNotification', $user->id) }}"
                            >
                            @csrf
                            <div class="form-group  col-sm-12">
                                <label>Nội dung <span class="font-danger">*</span></label>

                                <textarea name="message" id="name_room" class="form-control" cols="150" rows="8"></textarea>
                            </div>
                            <div class="col-sm-12 d-flex flex-end" >
                                <button type="submit" class="btn btn-primary">Gửi thông báo</button>
                            </div>
                        </form>
                        <div  class="col-sm-6 text-center order-1 order-sm-2 ">
                            <img src="{{asset('assets/images/Learning languages-cuate.png')}}" width="300" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid end -->
@endsection
@section('js')
    @error('message')
        <script>
            Toastify({
                text: "{{ $message }}",
                className: "info",
                style: {
                    background: "red",
                }
            }).showToast();
        </script>
    @enderror

    <script>
        function submitform() {
            // Get first form element
            var $form = $('#form_create')[0];

            // Check if valid using HTML5 checkValidity() builtin function
            if ($form.checkValidity()) {
                console.log('valid');
                $form.submit();
            } else {
                makeToast('Bạn cần nhập đầy đủ các trường', 'red')
            }

            return false
        }
    </script>
    <script>
        function makeToast(title, color = "green") {
            Toastify({
                text: title,
                className: "info",
                style: {
                    background: color,
                }
            }).showToast();
        }
    </script>
    
@endsection
