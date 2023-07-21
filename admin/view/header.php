<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Trang Chủ Admin</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/font-awesome.min.css" rel="stylesheet" />
	<link href="css/datepicker3.css" rel="stylesheet" />
	<link href="css/styles.css" rel="stylesheet" />

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />
	<script
      src="../tinymce/js/tinymce/tinymce.min.js"
      referrerpolicy="origin"
    ></script>
    <script>
      tinymce.init({
        selector: "#mytextarea",
      });
    </script>
		<style>
			.pa-2{
				padding: 2%;
			}
			.card-body p,.card-body h5{
				display: block;
				word-wrap: break-word;
			}
			.pm-1_05{
				padding: 1%;
				margin: 0 5%;
			}
			.mt-3{
				margin-top: 3%;
			}
			.ul {
				list-style: none;
			}
			.overh{
				overflow: hidden;
			}
			.flex{
				display: flex;
				justify-content: center;
				align-items: center;
			}
			.w-100{
				width: 100%;
			}
		</style>
</head>

<body>
	
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<!-- menu media -->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- logo -->
				<a class="navbar-brand" href="#"><span>DCR</span>Admin</a>
			</div>
		</div>
		<!-- /.container-fluid -->
	</nav>