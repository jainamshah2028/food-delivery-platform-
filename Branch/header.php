<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>ANAND BRANCH ADMIN</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.php" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							BRANCH ADMIN
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

						

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<img class="nav-user-photo"  src="/userimg/<?php echo $_SESSION['username']; ?>"/>
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $_SESSION["name"]; ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

								<li>
									<a href="profile.php">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="\anand\login.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>


				<ul class="nav nav-list">


				<li class="">
						<a href="membersearch.php" class="#">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Member </span>

						</a>

						<b class="arrow"></b>


					</li>
				<li class="">
								<a href="customer.php">
									<i class="menu-icon fa fa-pencil-square-o"></i>
									New Customer
								</a>

								<b class="arrow"></b>
							</li>
				<li class="">
						<a href="offorder.php" class="#">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Order Here </span>

						</a>

						<b class="arrow"></b>


					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Category </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="categoryinsert.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Insert
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="categorydisplay.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Display
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Items </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="iteminsert.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Insert
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="itemdisplay.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Display
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

						<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Product </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="productinsert.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Insert
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="productdisplay.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Display
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Product Item </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
					<ul class="submenu">
							<li class="">
								<a href="productiteminsert.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Insert
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="productitemdisplay.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Display
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Stock </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
					<ul class="submenu">
							<li class="">
								<a href="stockinsert.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Insert
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="stockdisplay.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Display
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>																
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Roll </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="rollinsert.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Insert
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="rolldisplay.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Display
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="feedback.php">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Feedback </span>
						</a>

						<b class="arrow"></b>
					</li>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">