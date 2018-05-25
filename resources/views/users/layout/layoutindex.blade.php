<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>OWL | Học viện cú đêm</title>
	<link rel="shortcut icon" href="images/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
    	$(".dropbtn").click(function(){
        	$(".dropdown-content").slideToggle("slow");
    	});
    	$("#comment").click(function(){
        	$(".comment").slideToggle("slow");
    	});
	});
	</script>
</head>
<body>
	<!-- Phan thanh menu -->
	<div class="navbar">
		<div class="navbar-left">
			<a href="{{route('index')}}"><img src="images/logo2.png" width="90px" height="49px"></a>
		</div>
		<div class="search">
			<input type="text" name="search" placeholder="Tìm bạn bè...">
			<a href=""><i class="fa fa-search fa-lg"></i></a>
		</div>
		<div class="navbar-mid"><a href="">
			<a href=""><i class="fa fa-university"> Học viện</i></a>
			<a href=""><i class="fa fa-book"> Tự học</i></a>
		</div>
		<div class="navbar-right">
			<a href=""><i class="fa fa-user-plus fa-2x" style="position: absolute;top: 25px;left: 10px;"></i></a>
			<a href=""><i class="fa fa-comments fa-2x" style="position: absolute;top: 25px;left: 80px;"></i></a>
			<a href=""><i class="fa fa-bell fa-2x" style="position: absolute;top: 25px;left: 150px;"></i></a>
			<!-- Phan so xuong trang ca nhan -->
			<div class="dropdown">
				<a class="dropbtn"><img src="images/{{session('anhdaidien')}}" style="position: absolute;top: 5px;left: 220px;"></a>
				<div class="dropdown-content">
    				<a href="profile={{session('mathanhvien')}}"><i class="fa fa-address-book"></i> Trang cá nhân</a>
    				<a href="#"><i class="fa fa-cog"></i> Cài đặt</a>
    				<a href="#"><i class="fa fa-comment"></i> Trợ giúp</a>
    				<a href="{{route('logout')}}" style="border: none;"><i class="fa fa-mail-reply"></i> Đăng xuất</a>
  				</div>
  			</div>
		</div>
	</div>
	@yield('content')
</body>
</html>