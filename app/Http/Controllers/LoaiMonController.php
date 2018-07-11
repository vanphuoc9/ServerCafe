<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiMon;

class LoaiMonController extends Controller
{
    //

    // get ds loai mon
    public function getDanhSach(){
    	$loaimon = LoaiMon::all();
    	//tranfer data to 
    	return view('admin.loaimon.danhsach',['loaimon'=>$loaimon]);
    }

    //// thêm 

    public function postThem(Request $request){
    // 	// kiểm tra điều kiện
    	$this->validate($request,[
    		// kiểm tra rỗng, dữ liệu đã tồn tại, giới hạn ký tự nhập

            'Ten'=>'required|unique:LoaiMon,TENLOAI|min:3|max:100',
            'LinkHinh'=>'required|url'

    	],[
            // Thông báo
            'Ten.required'=>'Bạn chưa nhập tên loại món',
            'Ten.unique'=>'Tên loại món đã tồn tại',
            'Ten.min'=>'Tên loại món phải có độ dài từ 3 đến 100 ký tự',
            'Ten.max'=>'Tên loại món phải có độ dài từ 3 đến 100 ký tự',
            'LinkHinh.required'=>'Bạn chưa nhập đường dẫn của hình',
            'LinkHinh.url'=>'Bạn chưa nhập đúng định dạng url'


    	]);
        
    	$loaimon = new LoaiMon;
    	$loaimon->TENLOAI = $request->Ten;
    	$loaimon->HINH = $request->LinkHinh;
    	$loaimon->save();

    	return redirect('admin/loaimon/danhsach')->with('thongbao',"Thêm loại món thành công");

    }



    // xóa
    public function getXoa($id){
        $loaimon = LoaiMon::find($id);
        $loaimon->delete();
        return redirect('admin/loaimon/danhsach')->with('thongbao','Bạn đã xóa thành công');

    }

    // sửa
    public function getSua(Request $request){
        if($request->ajax()){
            $loaimon = LoaiMon::find($request->id);
           
            return response($loaimon);

        }
    }

    public function postSua(Request $request, $id){
            //  // kiểm tra điều kiện
        $this->validate($request,[
            // kiểm tra rỗng, dữ liệu đã tồn tại, giới hạn ký tự nhập

            'Ten'=>'required|unique:LoaiMon,TENLOAI|min:3|max:100',
            'LinkHinh'=>'required|url'

        ],[
            // Thông báo
            'Ten.required'=>'Bạn chưa nhập tên loại món',
            'Ten.unique'=>'Tên loại món đã tồn tại',
            'Ten.min'=>'Tên loại món phải có độ dài từ 3 đến 100 ký tự',
            'Ten.max'=>'Tên loại món phải có độ dài từ 3 đến 100 ký tự',
            'LinkHinh.required'=>'Bạn chưa nhập đường dẫn của hình',
            'LinkHinh.url'=>'Bạn chưa nhập đúng định dạng url'


        ]);
    
            $loaimon = LoaiMon::find($id);
            $loaimon->TENLOAI = $request->Ten;
            $loaimon->HINH = $request->LinkHinh;
            $loaimon->save();
            return redirect('admin/loaimon/danhsach')->with('thongbao','Bạn đã sửa thành công');

    }



}
