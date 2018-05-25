@extends('users.layout.layoutindex')
@section('content')
	<!-- Phan noi dung - content -->
	<div class="test">{{ session('tenthanhvien')}}</div>
	<div class="new-feed">
		<form action="{{route('upstatus')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
		<div class="up-stt">
			<i class="fa fa-edit fa-lg" style="color: rgb(206,224,241);float: left;"></i>
			<textarea placeholder="Chia sẻ với bạn bè: Tâm trạng bạn thế nào?" name="status"></textarea>
			<i class="fa fa-frown-o fa-lg" style="float: right;"></i>
		</div>
		<div class="tool-stt">
			
				<input type="file" name="file" id="file" class="inputfile" style="display: none;">
				<label class="fa fa-image" style="float: left;" for="file" title="Đăng ảnh"> Đăng ảnh</label>
				<label class="fa fa-link" style="float: left;" for="file" title="Liên kết"> Liên kết</label>
				<input type="submit" name="" style="float: right;" value="Đăng bài">
		</div>
		</form>
		@foreach($status as $row)
		<?php
			$author = DB::table('thanhvien')->where('mathanhvien','=',$row->mathanhvien)->first();
			$like = DB::table('yeuthich')->where([
            		['mathanhvien','=',session('mathanhvien')],
            		['mastatus','=',$row->mastatus],
            		])->first();
		?>
		<!-- Phan 1 status -->
		<div class="status">
			<i class="fa fa-angle-down fa-lg" style="position: absolute;top: 10px;right: 20px;color: gray;"></i>
			<!-- phan thong tin nguoi dang -->
			<div class="meminfo">
				<img src="images/{{$author->anhdaidien}}">
				<ol>
					<li><a href="" style="font-size: 21px;">{{$author->tenthanhvien}}</a></li>
					<li><p>Thành viên - {{$row->ngaygio}}</p></li>
				</ol>
			</div>
			<div class="clearfix"></div>
			<!-- Phan noi dung status -->
			<div class="content">
				<p>{{$row->noidung}}</p>
				<img src="images/xinchaotinhyeu.jpg">
			</div>
			123
			1232133
			<div class="clearfix"></div>
			<!-- binh luan, like, share -->
			<div class="like">
				<i class="fa fa-heart-o" style="color: red;margin-top: 10px;"> {{$row->soyeuthich}} yêu thích</i>
				<hr style="background-color: rgb(229,229,229);margin: 10px 0px 5px;">
				<ol>
					<li><a href="stt={{$row->mastatus}}" style="a:hover{color:red}"><i class="fa fa-heart" style="
						<?php 
							if(empty($like)) 
								echo 'color:gray'; 
							else
								echo 'color:red' ;
						?>"> Yêu thích</i></a></li>
					<li><a id="comment"><i class="fa fa-comment-o"> Bình luận</i></a></li>
					<li><a href=""><i class="fa fa-link"> Chia sẻ</i></a></li>
				</ol>
			</div>
			<div class="comment">
				<img src="images/avatar.jpg">
				<input type="text" name="" placeholder="Viết bình luận...">
				<div class="listcomment">
				<table>
					<tr>
						<td><img src="images/avatar.jpg"></td>
						<td style="margin-left: 5px;"><p style="">Xuân Trường : 123</p></td>
					</tr>
					<tr>
						<td><img src="images/avatar.jpg"></td>
						<td style="margin-left: 5px;"><p style="">Xuân Trường : 12311111111111111111111111111111111</p></td>
					</tr>
				</table>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<!-- ket thuc phan noi dung -->
@endsection
