@extends('users.layout.layoutindex')
@section('content')
<div class="nav-profile">
		<img src="images/{{$member->anhdaidien}}">
		<div class="clearfix"></div>
		<h2 style="text-align: center;margin-bottom: 5px;">{{$member->tenthanhvien}}</h2>
		<a href="" class="nav-active"><i class="fa fa-clock-o"></i> Dòng thời gian</a>
		<a href=""><i class="fa fa-drivers-license-o"></i> Thông tin</a>
		<a href=""><i class="fa fa-image"></i> Ảnh</a>
		<a href=""><i class="fa fa-film"></i> Video</a>
		<a href=""><i class="fa fa-cog"></i> Cài đặt</a>
		<ol>
	</div>

	<div class="new-feed" style="margin: 70px 0px 10px 27%;">
		<div class="up-stt">
			<i class="fa fa-edit fa-lg" style="color: rgb(206,224,241);float: left;"></i>
			<textarea placeholder="Chia sẻ với bạn bè: Tâm trạng bạn thế nào?"></textarea>
			<i class="fa fa-frown-o fa-lg" style="float: right;"></i>
		</div>
		<div class="tool-stt">
			<input type="file" name="file" id="file" class="inputfile" style="display: none;">
			<label class="fa fa-image" style="float: left;" for="file" title="Đăng ảnh"> Đăng ảnh</label>
			<label class="fa fa-link" style="float: left;" for="file" title="Liên kết"> Liên kết</label>
			<input type="submit" name="submit" style="float: right;" value="Đăng bài">
		</div>
		@foreach($status as $row)
		<?php
			$author = DB::table('thanhvien')->where('mathanhvien','=',$row->mathanhvien)->first();
		?>
				<!-- Phan 1 status -->
				<div class="status">
					<i class="fa fa-angle-down fa-lg" style="position: absolute;top: 10px;right: 20px;color: gray;"></i>
					<!-- phan thong tin nguoi dang -->
					<div class="meminfo">
						<img src="images/{{$author->anhdaidien}}">
						<ol>
							<li><a href="profile={{$row->mathanhvien}}" style="font-size: 21px;">{{$author->tenthanhvien}}</a></li>
							<li><p>Thành viên - {{$row->ngaygio}}</p></li>
						</ol>
					</div>
					<div class="clearfix"></div>
					<!-- Phan noi dung status -->
					<div class="content">
						<p>{{$row->noidung}}</p>
						<img src="images/xinchaotinhyeu.jpg">
					</div>
					<div class="clearfix"></div>
					<!-- binh luan, like, share -->
					<div class="like">
						<i class="fa fa-heart" style="color: red;margin-top: 10px;"> 1,6k yêu thích</i>
						<hr style="background-color: rgb(229,229,229);margin: 10px 0px 5px;">
						<ol>
							<li><a href=""><i class="fa fa-heart-o"> Yêu thích</i></a></li>
							<li><a id="comment"><i class="fa fa-comment-o"> Bình luận</i></a></li>
							<li><a href=""><i class="fa fa-link"> Chia sẻ</i></a></li>
						</ol>
					</div>
					<div class="comment">
						<img src="images/avatar.jpg">
						<input type="text" name="" placeholder="Viết bình luận...">
					</div>
				</div>
		@endforeach
		

		<!-- Phan 1 status -->
		<div class="status">
			<i class="fa fa-angle-down fa-lg" style="position: absolute;top: 10px;right: 20px;color: gray;"></i>
			<!-- phan thong tin nguoi dang -->
			<div class="meminfo">
				<img src="images/avatar.jpg">
				<ol>
					<li><a href="" style="font-size: 21px;">Đoàn Xuân Trường</a></li>
					<li><p>Thành viên - 11:30 21/03/1997</p></li>
				</ol>
			</div>
			<div class="clearfix"></div>
			<!-- Phan noi dung status -->
			<div class="content">
				<p>Đây là phần nội dung nè</p>
				<img src="images/xinchaotinhyeu.jpg">
			</div>
			<div class="clearfix"></div>
			<!-- binh luan, like, share -->
			<div class="like">
				<i class="fa fa-heart" style="color: red;margin-top: 10px;"> 1,6k yêu thích</i>
				<hr style="color: rgb(229,229,229);margin: 10px 0px 5px;">
				<ol>
					<li><a href=""><i class="fa fa-heart-o"> Yêu thích</i></a></li>
					<li><a href=""><i class="fa fa-comment-o"> Bình luận</i></a></li>
					<li><a href=""><i class="fa fa-link"> Chia sẻ</i></a></li>
				</ol>
			</div>
			<div class="comment">
				<img src="images/avatar.jpg">
				<input type="text" name="" placeholder="Viết bình luận...">
			</div>
		</div>
	</div>
@endsection