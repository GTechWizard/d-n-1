<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<!-- user -->
	<div class="profile-sidebar">
		<div class="profile-userpic">
			<!-- ảnh đại diện -->
			<img src="../<?=$_SESSION['img']?>" class="img-responsive" alt="ảnh đại diện" />
		</div>
		<div class="profile-usertitle">
			<div class="profile-usertitle-name"><?=$_SESSION['name']?></div>
			<div class="profile-usertitle-status">
				<span class="indicator label-success"></span>Online
			</div>
		</div>
		<div class="clear"></div>
	</div>

	<div class="divider"></div>
	<!-- form search -->
	<form role="search" method="post" action="?act=search">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Search" name="value"/>
			<input type="submit" class="btn btn-info" name="get" value="Tìm"/>
		</div>
	</form>

	<!-- menu main -->
	<ul class="nav menu">
		<li>
			<a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Trang Chính</a>
		</li>
		<li>
			<a href="?act=ff"><em class="fa fa-folder-open">&nbsp;</em>File/Folder </a>
		</li>
		<li>
			<a href="?act=user"><em class="fa fa-user">&nbsp;</em>Người Dùng</a>
		</li>
		<li>
			<a href="?act=loai">
				<span class="fa fa-star">&nbsp;</span> Loại Dịch Vụ
			</a>
		</li>
		<li>
			<a href="?act=add_loai">
				<span class="fa fa-star">&nbsp;</span> Thêm Loại Dịch Vụ
			</a>
		</li>
		<li>
			<a href="?act=dv">
				<span class="fa fa-check">&nbsp;</span> Quản Lý Dịch Vụ
			</a>
		</li>
		<li>
			<a href="?act=add_dv">
				<span class="fa fa-check">&nbsp;</span> Thêm Dịch Vụ
			</a>
		</li>
		<li>
		<li>
			<a href="?act=price">
				<span class="fa fa-window-restore">&nbsp;</span> Giá Dịch Vụ
			</a>
		</li>
		<li>
		<li>
			<a href="?act=add_price">
				<span class="fa fa-window-restore">&nbsp;</span> Thêm Giá DV
			</a>
		</li>
		<li>
			<a href="?act=tt"><em class="fa fa-meetup">&nbsp;</em>Tin Tức</a>
		</li>
		<li>
			<a href="?act=add_tt"><em class="fa fa-meetup">&nbsp;</em>Thêm Mới Tin Tức</a>
		</li>
		<li>
			<a href="?act=dv_act"><em class="fa fa-bolt">&nbsp;</em>Dịch Vụ Đang Có</a>
		</li>
		<li>
			<a href="?act=comment"><em class="fa fa-comment">&nbsp;</em>Bình Luận</a>
		</li>
		<li>
			<a href="../index.php"><em class="fa fa-power-off">&nbsp;</em> Trang Khách</a>
		</li>
	</ul>
</div>
<!--/.sidebar-->