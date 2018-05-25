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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['prefix'=>'/'],function(){
	//Route dang nhap
	Route::get('login{error?}',function($error='Bạn phải đăng nhập'){
		return view('users.login',['error'=>$error]);
	})->name('login');
	//Route dang ky
	Route::get('register',function(){
		return view('users.register');
	})->name('register');
	//Route xac thuc dang ky tai khoan
	Route::post('getregister','UserController@register')->name('getregister');
	//Route xac thuc tai khoan dang nhap
	Route::post('getlogin','UserController@login')->name('getlogin');
	//Route dang xuat
	Route::get('logout','UserController@logout')->name('logout');
	//Route trang chu
	Route::get('index','UserController@Index')->name('index')->middleware('owlmiddle');
	//Route dang tai status
	Route::post('upstatus','UserController@UpStatus')->name('upstatus');
	//Route trang ca nhan
	Route::get('profile={id}','UserController@Profile')->name('profile')->middleware('owlmiddle');
	Route::get('stt={stt}','UserController@Like')->name('like');
});

//Route trang chu admin
Route::group(['prefix'=>'admin'],function(){
	//Route trang dang nhap admin/login
	Route::get('login',function(){
		return view('admin.login_admin');
	});
	//Route trang danh sach admin/adminee
	Route::get('admineee',function(){
		return view('admin.index');
	});
});

Route::get('taobang',function(){
	Schema::create('nguoidung',function($table){
		$table->increments('id');
		$table->string('hoten');
	});

	echo "Đã tạo bảng thành công";
});