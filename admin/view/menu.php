<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<!-- user -->
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<!-- ảnh đại diện -->
				<img src="../img/boat.jpg" class="img-responsive" alt="" />
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Username</div>
				<div class="profile-usertitle-status">
					<span class="indicator label-success"></span>Online
				</div>
			</div>
			<div class="clear"></div>
		</div>

		<div class="divider"></div>
		<!-- form search -->
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search" />
			</div>
		</form>

		<!-- menu main -->
		<ul class="nav menu">
			<li>
				<a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Trang Chính</a>
			</li>
			<li>
				<a href="?act=user"><em class="fa fa-user">&nbsp;</em>Người Dùng</a>
			</li>
				<li class="parent">
					<a data-toggle="collapse" href="#sub-item-1">
						<em class="fa fa-linode">&nbsp;</em> Dịch Vụ
						<span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
					</a>
					<ul class="children collapse" id="sub-item-1">
						<li>
							<a  href="?act=loai">
								<span class="fa fa-arrow-right">&nbsp;</span> Loại Dịch Vụ
							</a>
						</li>
						<li>
							<a href="?act=add_loai">
								<span class="fa fa-arrow-right">&nbsp;</span> Thêm Loại Dịch Vụ
							</a>
						</li>
						<li>
							<a href="?act=dv">
								<span class="fa fa-arrow-right">&nbsp;</span> Quản Lý Dịch Vụ
							</a>
						</li>
						<li>
							<a class="" href="?act=add_dv">
								<span class="fa fa-arrow-right">&nbsp;</span> Thêm Dịch Vụ
							</a>
						</li>
					</ul>
				</li>

			<li>
				<a href="tt/news.html"><em class="fa fa-meetup">&nbsp;</em>Tin Tức</a>
			</li>
			<li>
				<a href="tt/add_news.html"><em class="fa fa-window-restore">&nbsp;</em>Thêm Mới Tin Tức</a>
			</li>
      <li>
				<a href="dv_ldv/dv_act/dv_act.html"><em class="fa fa-bolt">&nbsp;</em>Dịch Vụ Đang Có</a>
      </li>
			<li>
				<a href="?act=comment"><em class="fa fa-comment">&nbsp;</em>Bình Luận</a>
			</li>
			<li>
				<a href="../index.html"><em class="fa fa-power-off">&nbsp;</em> Trang Khách</a>
			</li>
		</ul>
	</div>
	<!--/.sidebar-->
