<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiSanPham;

class LoaiSanPhamController extends Controller
{
    //
        // get ds loai mon
    public function getDanhSach(){
    	$loaisanpham = LoaiSanPham::paginate(3);
    	//tranfer data to 
    	return view('admin.loaisanpham.danhsach',['loaisanpham'=>$loaisanpham]);
    }

        //// thêm 

    public function postThem(Request $request){
    // 	// kiểm tra điều kiện
    	$this->validate($request,[
    		// kiểm tra rỗng, dữ liệu đã tồn tại, giới hạn ký tự nhập

            'Ten'=>'required|unique:LoaiSanPham,TENLOAI|min:3|max:100',
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
        
    	$LoaiSanPham = new LoaiSanPham;
    	$LoaiSanPham->TENLOAI = $request->Ten;
    	$LoaiSanPham->HINH = $request->LinkHinh;
    	$LoaiSanPham->save();

    	return redirect('admin/loaisanpham/danhsach')->with('thongbao',"Thêm loại sản phẩm thành công");

    }

     // sửa
    public function getSua(Request $request){
        if($request->ajax()){
            $loaisanpham = LoaiSanPham::find($request->id);
           
            return response($loaisanpham);

        }
    }

    public function postSua(Request $request, $id){
            //  // kiểm tra điều kiện
        $this->validate($request,[
            // kiểm tra rỗng, dữ liệu đã tồn tại, giới hạn ký tự nhập

            'Ten'=>'required|min:3|max:100',
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
    
            $loaisanpham = LoaiSanPham::find($id);
            $loaisanpham->TENLOAI = $request->Ten;
            $loaisanpham->HINH = $request->LinkHinh;
            $loaisanpham->save();
            return redirect('admin/loaisanpham/danhsach')->with('thongbao','Bạn đã sửa thành công');

    }


     // xóa
    public function getXoa($id){
        $loaisanpham = LoaiSanPham::find($id);
        $loaisanpham->delete();
        return redirect('admin/loaisanpham/danhsach')->with('thongbao','Bạn đã xóa thành công');

    }



    


}
