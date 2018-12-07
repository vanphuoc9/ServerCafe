<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// phải có thư viên này để sử dụng lớp đăng nhập
use Illuminate\Support\Facades\Auth;

use App\User;

class UserController extends Controller
{
    //
       // get danh sach
    public function getDanhSach(){
    	$user = User::paginate(3);
    	return view('admin.user.danhsach',['user'=>$user]);
    
    }

         //// thêm 

    public function postThem(Request $request){
    // 	// kiểm tra điều kiện
    	$this->validate($request,[
    		// kiểm tra rỗng, dữ liệu đã tồn tại, giới hạn ký tự nhập
    		// HoTen Email SDT DiaChi password quyen

            'Ten'=>'unique:nguoidung,TENDANGNHAP',
            'Email'=>'unique:nguoidung,EMAIL'

    	],[
            // Thông báo
            'Ten.unique'=>'Tên đăng nhập đã tồn tại',
            'Email.unique'=>'Email đã tồn tại'
    	]);
        
    	$user = new User;
    	$user->TENDANGNHAP = $request->Ten;
    	$user->MATKHAU = bcrypt($request->password);
    	$user->TEN = $request->HoTen;
    	$user->EMAIL = $request->Email;
    	$user->DIACHI = $request->DiaChi;
    	$user->SODIENTHOAI = $request->SDT;
    	$user->QUYEN = $request->quyen;
    	$user->save();

    	return redirect('admin/user/danhsach')->with('thongbao',"Thêm người dùng thành công");

    }

    // sửa
    public function getSua(Request $request){
        if($request->ajax()){
            $user = User::find($request->id);
           
            return response($user);

        }
    }

    public function postSua(Request $request, $id){
            //  // kiểm tra điều kiện
      
    
            $user = User::find($id);
        	if($request->changePassword == 'on'){
        		$user->MATKHAU = bcrypt($request->password);
        	}
	    	$user->TEN = $request->HoTen;
	    	$user->EMAIL = $request->Email;
	    	$user->DIACHI = $request->DiaChi;
	    	$user->SODIENTHOAI = $request->SDT;
	    	$user->QUYEN = $request->quyen;
            $user->save();
            return redirect('admin/user/danhsach')->with('thongbao','Bạn đã sửa thành công');

    }

       // xóa
    public function getXoa($id){
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/danhsach')->with('thongbao','Bạn đã xóa thành công');

    }

}
