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

      // get thêm
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
            'LinkHinh'=>'required|url',
            'MoTa'=>'required',
            'DonGia'=>'required|numeric',
            'LoaiMonAn'=>'required'

    	],[
            // Thông báo
            'Ten.required'=>'Bạn chưa nhập tên món',
            'Ten.unique'=>'Tên món đã tồn tại',
            'Ten.min'=>'Tên món phải có độ dài từ 3 đến 100 ký tự',
            'Ten.max'=>'Tên món phải có độ dài từ 3 đến 100 ký tự',
            'LinkHinh.required'=>'Bạn chưa nhập đường dẫn của hình',
            'LinkHinh.url'=>'Bạn chưa nhập đúng định dạng url',
            'MoTa.required'=>'Bạn chưa nhập mô tả món',
            'DonGia.required'=>'Bạn chưa nhập đơn giá',
            'DonGia.numeric'=>'Bạn chưa nhập đúng định dạng',
            'LoaiMon.required'=>'Bạn chưa nhập loại món'


    	]);
        
    	$mon = new Mon;
        $mon->MALOAI = $request->LoaiMonAn;
    	$mon->TEN = $request->Ten;
    	$mon->HINH = $request->LinkHinh;
        $mon->MOTA = $request->MoTa;
        $mon->DONGIA = $request->DonGia;
    	$mon->save();

    	return redirect('admin/mon/danhsach')->with('thongbao',"Thêm món thành công");

    }

        // sửa
    public function getSua(Request $request){
        if($request->ajax()){
            $mon = Mon::find($request->id);
           
            return response($mon);

        }
    }

    public function postSua(Request $request, $id){
     //     // kiểm tra điều kiện
        $this->validate($request,[
            // kiểm tra rỗng, dữ liệu đã tồn tại, giới hạn ký tự nhập

            'Ten'=>'required|unique:Mon,TEN|min:3|max:100',
            'LinkHinh'=>'required|url',
            'MoTa'=>'required',
            'DonGia'=>'required|numeric',
            'LoaiMonAn'=>'required'

        ],[
            // Thông báo
            'Ten.required'=>'Bạn chưa nhập tên món',
            'Ten.unique'=>'Tên món đã tồn tại',
            'Ten.min'=>'Tên món phải có độ dài từ 3 đến 100 ký tự',
            'Ten.max'=>'Tên món phải có độ dài từ 3 đến 100 ký tự',
            'LinkHinh.required'=>'Bạn chưa nhập đường dẫn của hình',
            'LinkHinh.url'=>'Bạn chưa nhập đúng định dạng url',
            'MoTa.required'=>'Bạn chưa nhập mô tả món',
            'DonGia.required'=>'Bạn chưa nhập đơn giá',
            'DonGia.numeric'=>'Bạn chưa nhập đúng định dạng',
            'LoaiMon.required'=>'Bạn chưa nhập loại món'


        ]);
        
        $mon = Mon::find($id);
        $mon->MALOAI = $request->LoaiMonAn;
        $mon->TEN = $request->Ten;
        $mon->HINH = $request->LinkHinh;
        $mon->MOTA = $request->MoTa;
        $mon->DONGIA = $request->DonGia;
        $mon->save();

        return redirect('admin/mon/danhsach')->with('thongbao',"Sửa món thành công");

    }



        // xóa
    public function getXoa($id){
        $mon = Mon::find($id);
        $mon->delete();
        return redirect('admin/mon/danhsach')->with('thongbao','Bạn đã xóa thành công');

    }
}
