<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mon;
use App\LoaiMon;

class MonController extends Controller
{
    //

    // get danh sach mon
     public function getDanhSach(){
    	$mon = Mon::all();
    	//tranfer data to 
    	return view('admin.mon.danhsach',['mon'=>$mon]);
    }

      // sửa
    public function getThem(){
    
        $loaimon = LoaiMon::all();
        return response($loaimon);

       
    }

       //// thêm 

    public function postThem(Request $request){
    // 	// kiểm tra điều kiện
    	$this->validate($request,[
    		// kiểm tra rỗng, dữ liệu đã tồn tại, giới hạn ký tự nhập

            'Ten'=>'required|unique:Mon,TEN|min:3|max:100',
            'LinkHinh'=>'required|url'

    	],[
            // Thông báo
            'Ten.required'=>'Bạn chưa nhập tên món',
            'Ten.unique'=>'Tên món đã tồn tại',
            'Ten.min'=>'Tên món phải có độ dài từ 3 đến 100 ký tự',
            'Ten.max'=>'Tên món phải có độ dài từ 3 đến 100 ký tự',
            'LinkHinh.required'=>'Bạn chưa nhập đường dẫn của hình',
            'LinkHinh.url'=>'Bạn chưa nhập đúng định dạng url'


    	]);
        
    	$loaimon = new LoaiMon;
    	$loaimon->TENLOAI = $request->Ten;
    	$loaimon->HINH = $request->LinkHinh;
    	$loaimon->save();

    	return redirect('admin/mon/danhsach')->with('thongbao',"Thêm loại món thành công");

    }
}
