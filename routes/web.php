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
// test pdf


// group admin
Route::group(['prefix'=>'admin'],function(){


	//// LOAI MON
	Route::group(['prefix'=>'loaisanpham'],function(){
		/// danh sach
		Route::get('danhsach','LoaiSanPhamController@getDanhSach');
		// // post them
		Route::post('them','LoaiSanPhamController@postThem');
		//sửa
		Route::get('sua/{id}','LoaiSanPhamController@getSua');
		Route::post('sua/{id}','LoaiSanPhamController@postSua');
		// xóa
		Route::get('xoa/{id}','LoaiSanPhamController@getXoa');

	});

	 /// User
    Route::group(['prefix'=>'user'],function(){
        // Gọi tới Controller ==> goi hàm getDanhSach==> hiện thị view
        Route::get('danhsach','UserController@getDanhSach');
        // // post them
		Route::post('them','UserController@postThem');
		//sửa
		Route::get('sua/{id}','UserController@getSua');
		Route::post('sua/{id}','UserController@postSua');
		// xóa
		Route::get('xoa/{id}','UserController@getXoa');
     
  
    });

	// //// MON
	// Route::group(['prefix'=>'mon'],function(){
	// 	/// danh sach
	// 	Route::get('danhsach','MonController@getDanhSach');

	// 	// // // post them
	// 	Route::get('them','MonController@getThem');
	// 	Route::post('them','MonController@postThem');

	// 	// // // // post sửa

	// 	Route::get('sua/{id}','MonController@getSua');
	// 	Route::post('sua/{id}','MonController@postSua');



	// 	// xóa
	// 	Route::get('xoa/{id}','MonController@getXoa');

	// 	Route::get('pdf','PDFController@getPDF');

	// });

	


	
});
