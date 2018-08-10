<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('trangchu',function(){
// 	return view('admin/layout/index');
// });

// Route::get('loaimon',function(){
// 	return view('admin/loaimon/danhsach');
// });


// group admin
Route::group(['prefix'=>'admin'],function(){


	//// LOAI MON
	Route::group(['prefix'=>'loaimon'],function(){
		/// danh sach
		Route::get('danhsach','LoaiMonController@getDanhSach');
		// // post them
		Route::post('them','LoaiMonController@postThem');
		//sửa
		Route::get('sua/{id}','LoaiMonController@getSua');
		Route::post('sua/{id}','LoaiMonController@postSua');
		// xóa
		Route::get('xoa/{id}','LoaiMonController@getXoa');

	});

	//// MON
	Route::group(['prefix'=>'mon'],function(){
		/// danh sach
		Route::get('danhsach','MonController@getDanhSach');

		// // // post them
		Route::get('them','MonController@getThem');
		Route::post('them','MonController@postThem');

		// // // // post sửa

		// // Route::get('sua/{id}','LoaiMonController@getSua');

		// // Route::post('sua/{id}','LoaiMonController@postSua');

		// Route::get('sua/{id}','MonController@getSua');
		// Route::post('sua/{id}','MonController@postSua');



		// // xóa
		// Route::get('xoa/{id}','MonController@getXoa');

	});
});
