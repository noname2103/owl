<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class UserController extends Controller
{
    //Kiem tra tai khoan dang nhap
    public function login(Request $request)
    {
    	$email = $request['email'];
    	$password = $request['password'];

    	$member = DB::table('thanhvien')->where([
    		['email','=',$email],
    		['matkhau','=',$password],
    		])->first();
    	if(!empty($member))
        {
            session()->put('mathanhvien',$member->mathanhvien);
            session()->put('anhdaidien',$member->anhdaidien);
    		session()->put('tenthanhvien',$member->tenthanhvien);
    		return redirect()->route('index');
    		//var_dump($member);
        }
    	else
    		return redirect()->route('login',['error'=>'Tài khoản hoặc mật khẩu không đúng!']);
    		/*return view('users.login',['error'=>'Sai ten dang nhap hoac mat khau!']);*/
    	/*if(Auth::attempt(['tenthanhvien'=>$username,'matkhau'=>$password]))
    	{
    		return view('users.index');
    	}
    	else
    	{
    		return view('users.login');
    	}*/
    }

    // Dang ky tai khoan
    public function register(Request $request)
    {
        $hoten = $request['firstname']." ".$request['lastname'];
        $email = $request['email'];
        $matkhau = $request['password'];

        DB::table('thanhvien')->insert([
                'tenthanhvien' => $hoten,
                'email' => $email,
                'matkhau' => bcrypt($matkhau),
                'anhdaidien' => 'avatar.jpg'
        ]);
        return redirect()->route('login');
    }

    // Dang xuat tai khoan
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }

    // Dong thoi gian trang chu
    public function Index()
    {
        $status = DB::table('status')->orderBy('ngaygio','desc')->get();
        return view('users.index',['status'=>$status]);
    }

    // Bay to yeu thich mot bai viet
    public function Like($stt)
    {
        // Kiem tra nguoi dung da like bai viet chua
        $like = DB::table('yeuthich')->where([
            ['mathanhvien','=',session('mathanhvien')],
            ['mastatus','=',$stt],
            ])->first();
        // Neu chua like thi them like
        if(empty($like))
        {
            DB::table('yeuthich')->insert([
                'mathanhvien' => session('mathanhvien'),
                'mastatus' => $stt
            ]);
            DB::table('status')->where('mastatus','=',$stt)->increment('soyeuthich',1);
        }
        // Neu da like thi xoa like di
        else
        {
            DB::table('yeuthich')->where([
                ['mathanhvien','=',session('mathanhvien')],
                ['mastatus','=',$stt],
            ])->delete();
            DB::table('status')->where('mastatus','=',$stt)->decrement('soyeuthich',1);
        }
        return redirect()->route('index');
    }

    // Dang tai 1 status
    public function UpStatus(Request $request)
    {
        DB::table('status')->insert([
            'mathanhvien' => session('mathanhvien'),
            'ngaygio' => date('Y-m-d H:i:s'),
            'noidung' => $request['status']
        ]);

        return redirect()->route('index');
        /*$status = new Status;
        $status->mathanhvien = session('mathanhvien');
        $status->ngaygio = new datetime();
        $status->noidung = $request['status'];
        $status->save();*/
    }

    // Trang ca nhan cua 1 thanh vien
    public function Profile($id)
    {
        // echo $id;
        $member = DB::table('thanhvien')->where('mathanhvien','=',$id)->first();
        $status = DB::table('status')->where('mathanhvien','=',$id)->orderBy('ngaygio','desc')->get();
        return view('users.profile',['member'=>$member,'status'=>$status]);
        /*foreach ($status as $row) {
            echo $row->noidung."<br>";
        }*/
    }
}
