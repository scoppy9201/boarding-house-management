<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::namespace('App\Http\Controllers\Api')->group(function() {
    // Cập nhật thông tin cá nhân
    Route::put('upload-step-1/{id}','UserController@uploadstep1')->name('upload_step_1');
    Route::put('save-description/{id}','UserController@save_description')->name('save_description');
    Route::put('upload-step-2/{id}','UserController@uploadstep2')->name('upload_step_2');
    Route::put('upload-step-3/{id}','UserController@uploadstep3')->name('upload_step_3');
    Route::post('upload-image-user','UserController@uploadImage')->name('upload_avatar');
    Route::post('delete-image-user','UserController@deleteImage')->name('delete_avatar');
    // Tạo phòng trọ
    Route::post('create-room-step-1','RoomController@createStep1')->name('create_room_step_1');
    Route::put('create-room-step-2/{id}','RoomController@createStep2')->name('create_room_step_2');
    Route::put('create-room-step-3/{id}','RoomController@createStep3')->name('create_room_step_3');
    Route::post('get-wards','RoomController@getWards')->name('get_wards');
    Route::post('upload-main-image-room','RoomController@uploadMainImageRoom')->name('upload_main_image_room');
    Route::post('upload-multi-image-room','RoomController@uploadMultiImageRoom')->name('upload_multi_image_room');
    Route::put('delete-image/{path}','RoomController@deleteImages')->name('delete_image');
    Route::put('delete-image-update/{path}','RoomController@deleteImagesForUpdate')->name('delete_image_update');
    // Đăng bài viết
    Route::post('upload-anh-bai-viet', 'NewsController@upload')->name('news.uploadThumnail');
    Route::post('luu-bai-viet','NewsController@store')->name('news.api.store');
    Route::post('cap-nhat-bai-viet','NewsController@update')->name('news.api.update');
})->middleware('auth:api');

Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact admin@gmail.com'], 404);
});
