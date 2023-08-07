<!-- trang chính -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li>
				<a href="#">
					<em class="fa fa-home"></em>
				</a>
			</li>
			<li class="active">Trang Chính</li>
		</ol>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Trang Chính</h1>
		</div>
	</div>
	<!--/.row-->

	<div class="panel panel-container">
		<div class="row">
			<!-- dịch vụ mới -->
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-teal panel-widget border-right">
					<div class="row no-padding">
						<em class="fa fa-xl fa-shopping-cart color-blue"></em>
						<div class="large">
							<?php
							$dv = new dv;
							$count_dv = $dv->count_dv();
							while ($result = $count_dv->fetch_assoc()) {
								echo $result['count_dv'];
							}
							?>
						</div>
						<div class="text-muted">DỊCH VỤ</div>
					</div>
				</div>
			</div>
			<!-- bình luận mới -->
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-blue panel-widget border-right">
					<div class="row no-padding">
						<em class="fa fa-xl fa-comments color-orange"></em>
						<div class="large">
							<?php
							$bl = new comment;
							$count_bl = $bl->count_bl();
							while ($result = $count_bl->fetch_assoc()) {
								echo $result['count_bl'];
							}
							?>
						</div>
						<div class="text-muted">BÌNH LUẬN</div>
					</div>
				</div>
			</div>
			<!-- người dùng mới -->
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-orange panel-widget border-right">
					<div class="row no-padding">
						<em class="fa fa-xl fa-users color-teal"></em>
						<div class="large">
							<?php
							$user = new user;
							$count_user = $user->count_user();
							while ($result = $count_user->fetch_assoc()) {
								echo $result['count_user'];
							}
							?>
						</div>
						<div class="text-muted">NGƯỜI DÙNG</div>
					</div>
				</div>
			</div>
			<!-- lượt tìm kiếm -->
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<em class="fa fa-xl fa-eye color-red"></em>
						<div class="large">
							<?php
							$home = new home;
							$getAllLuotXem = $home->getAllLuotXem();
							$checkout = 0;
							if ($getAllLuotXem) {
								while ($result = $getAllLuotXem->fetch_assoc()) {
									$count = $result['luot_xem'];
									$checkout += $count;
								}
								echo $checkout;
							}
							?>
						</div>
						<div class="text-muted">LƯỢT XEM</div>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->
	</div>
	<!-- panel -->

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Biểu Đồ Phân Tích Lượt Xem
					<span class="pull-right clickable panel-toggle panel-button-tab-left">
						<em class="fa fa-toggle-up"></em>
					</span>
				</div>
				<div class="panel-body">
					<div class="canvas-wrapper">
						<!-- biểu đồ -->
						<canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/.row-->
	<?php
	$dv = new dv;
	$dvuser = new dvUser;
	$countdvweak = $dv->getDvWeak();
	$countblweak = $bl->getBlWeak();
	$countdvuserweak = $dvuser->getDvUserWeak();
	$countdlxweak = $home->getLxWeak();

	$datachair1 = $countdvweak->fetch_assoc();
	$datachair2 = $countblweak->fetch_assoc();
	$datachair3 = $countdvuserweak->fetch_assoc();

	$lx = 0;
	if ($countdlxweak) {
		while ($datachair4 = $countdlxweak->fetch_assoc()) {
			$count = $datachair4['luot_xem'];
			$lx += $count;
		}
	}

	?>
	<!-- dưới biểu đồ thôn sgố đo-->
	<div class="row">
		<div class="col-xs-6 col-md-3">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<h4>Dịch Vụ Trong Tuần</h4>
					<div class="easypiechart" id="easypiechart-blue" data-percent="<?= $datachair1['count'] ?>">
						<span class="percent">
							<?= $datachair1['count'] ?><em class="fa fa-check"> &nbsp;</em>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-md-3">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<h4>Bình Luận Trong Tuần</h4>
					<div class="easypiechart" id="easypiechart-orange" data-percent="<?= $datachair2['count'] ?>">
						<span class="percent">
							<?= $datachair2['count'] ?><em class="fa fa-comment">&nbsp;</em>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-md-3">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<h4>Dịch Vụ Của Người Dùng</h4>
					<div class="easypiechart" id="easypiechart-teal" data-percent="<?= $datachair3['count'] ?>">
						<span class="percent">
							<?= $datachair3['count'] ?><em class="fa fa-bolt">&nbsp;</em>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-md-3">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<h4>Lượt Xem Trong Tuần</h4>
					<div class="easypiechart" id="easypiechart-red" data-percent="<?=$lx?>">
						<span class="percent">
							<?=$lx?> <em class="fa fa-user">&nbsp;</em>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/.row-->

	<!-- biểu đồ dịch vụ -->
	<div class="row">
		<div class="col-md">
			<div class="panel panel-default">
				<div class="panel-heading">
					<!-- chartdata.js -->
					Biểu Đồ Dịch Vụ Tháng
					<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
				</div>
				<div class="panel-body">
					<div class="canvas-wrapper">
						<canvas class="chart" id="radar-chart"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					Lịch
					<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
				</div>
				<div class="panel-body">
					<div id="calendar"></div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					Gửi email nhanh
					<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" action="" method="post">
						<fieldset>
							<!-- Name input-->
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Name</label>
								<div class="col-md-9">
									<input id="name" name="name" type="text" placeholder="Your name" class="form-control" />
								</div>
							</div>

							<!-- Email input-->
							<div class="form-group">
								<label class="col-md-3 control-label" for="email">Your E-mail</label>
								<div class="col-md-9">
									<input id="email" name="email" type="text" placeholder="Your email" class="form-control" />
								</div>
							</div>

							<!-- Message body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="message">Your message</label>
								<div class="col-md-9">
									<textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
								</div>
							</div>

							<!-- Form actions -->
							<div class="form-group">
								<div class="col-md-12 widget-right">
									<button type="submit" class="btn btn-default btn-md pull-right">
										Submit
									</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Ghi Chú
					<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
				</div>
				<div class="panel-body timeline-container">
					<ul class="timeline">
						<li>
							<div class="timeline-badge">
								<em class="glyphicon glyphicon-pushpin"></em>
							</div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
								</div>
								<div class="timeline-body">
									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit.
										Integer at sodales nisl. Donec malesuada orci ornare
										risus finibus feugiat.
									</p>
								</div>
							</div>
						</li>
						<li>
							<div class="timeline-badge primary">
								<em class="glyphicon glyphicon-link"></em>
							</div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
								</div>
								<div class="timeline-body">
									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit.
									</p>
								</div>
							</div>
						</li>
						<li>
							<div class="timeline-badge">
								<em class="glyphicon glyphicon-camera"></em>
							</div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
								</div>
								<div class="timeline-body">
									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit.
										Integer at sodales nisl. Donec malesuada orci ornare
										risus finibus feugiat.
									</p>
								</div>
							</div>
						</li>
						<li>
							<div class="timeline-badge">
								<em class="glyphicon glyphicon-paperclip"></em>
							</div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
								</div>
								<div class="timeline-body">
									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit.
									</p>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--/.col-->
</div>
<!--/.row-->
</div>
<!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/custom.js"></script>
<!-- vẽ biểu đồ -->

<script>
	var lineChartData = {
		labels: [<?php
		$dateString = $home->getAllLuotXem();
		if ($dateString) {
			while ($result = $dateString->fetch_assoc()) {
				$dateParts = date_parse_from_format('d-m-Y', $result['date']);

				if ($dateParts['month'])
					$month = str_pad($dateParts['month'], 2, '0', STR_PAD_LEFT);
				echo "\"Tháng $month\",";
			}
		}
		?>],
		datasets: [
			{
				label: "Lượt Xem",
				fillColor: "rgba(48, 164, 255, 0.2)",
				strokeColor: "rgba(48, 164, 255, 1)",
				pointColor: "rgba(48, 164, 255, 1)",
				pointStrokeColor: "#fff",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "rgba(48, 164, 255, 1)",
				data: [<?php
				$luotxem = $home->getAllLuotXem();
				if ($luotxem) {
					while ($result = $luotxem->fetch_assoc()) {
						echo $result['luot_xem'] . ", ";
					}
				}
				?>]
			}
		]

	}

	var radarData = {
		labels: [<?php
		$allDv = $dv->getForChairRadio();
		if ($allDv) {
			while ($result = $allDv->fetch_assoc()) {
				echo "\"" . $result['kieu_dv'] . "\",";
			}
		}
		?>],
		datasets: [
			{
				label: "Số lượng DV",
				fillColor: "rgba(48, 164, 255, 0.2)",
				strokeColor: "rgba(48, 164, 255, 0.8)",
				pointColor: "rgba(48, 164, 255, 1)",
				pointStrokeColor: "#fff",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "rgba(48, 164, 255, 1)",
				data: [<?php
				$count = $dv->getForChairRadio();
				if ($count) {
					while ($result = $count->fetch_assoc()) {
						echo $result['count'] . ", ";
					}
				}
				?>]
			}
		]
	};

	window.onload = function () {
		var chart1 = document.getElementById("line-chart").getContext("2d");
		window.myLine = new Chart(chart1).Line(lineChartData, {
			responsive: true,
			scaleLineColor: "rgba(0,0,0,.2)",
			scaleGridLineColor: "rgba(0,0,0,.05)",
			scaleFontColor: "#c5c7cc",
		});
	};

	var chart5 = document.getElementById("radar-chart").getContext("2d");
	window.myRadarChart = new Chart(chart5).Radar(radarData, {
		responsive: true,
		scaleLineColor: "rgba(0,0,0,.05)",
		angleLineColor: "rgba(0,0,0,.2)"
	});
</script>
</body>

</html>