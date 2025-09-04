<?php 
ini_set('display_errors',1);
session_start();
$msg_show = '';
$u_id = '';
if(isset($_SESSION['u_id']))
{
	$u_id = $_SESSION['u_id'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="RedstarHospital" />
	<title>Appointment Timeslot Book</title>
	<!-- google font -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
	<!-- icons -->
	<link href="assets/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!--bootstrap -->

	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!--<link href="assets/bootstrap-datepicker/datepicker.css" rel="stylesheet" type="text/css" />-->
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="assets/material/material.min.css">
	<link rel="stylesheet" href="assets/bootstrap-datetimepicker.css">
	<link rel="stylesheet" href="css/material_style.css">
	<!-- Theme Styles -->
	<link href="css/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link href="css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="css/formlayout.css" rel="stylesheet" type="text/css" />
	<link href="css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="css/theme-color.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-clockpicker.min.css">

	<!-- favicon -->
	<link rel="shortcut icon" href="../admin/img/logok.png" />
	<style>
	.close {
  margin-top: 14px; 
}
	
	</style>
</head>
<!-- END HEAD -->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
		<!-- start sidebar -->
		
		<?php include 'sidebar.php'; ?>
		
		<!-- end sidebar -->
		<!-- start page container -->
		<div class="page-container">
			<!-- start header menu -->
			
			<?php include 'header.php'; ?>
			
			<!-- end header menu -->
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Book Schedule</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i></li>
								<li><a class="parent-item" href="#">Time Schedules</a>&nbsp;<i class="fa fa-angle-right"></i></li>
								<li class="active">Book Schedule</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Book Schedule<p style="margin: 0px 31px 16px;"><?php echo $msg_show; ?></p></header>
									<!--<button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
										<i class="material-icons">more_vert</i>
									</button>
									<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" data-mdl-for="panel-button">
										<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
										<li class="mdl-menu__item"><i class="material-icons">print</i>Another action</li>
										<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
									</ul>-->
								</div>
								<div class="card-body" id="bar-parent" style="    margin-top: 3%;">
									<form action="script_fixtime.php" id="form_sample_1" class="form-horizontal" method="post" enctype="multipart/form-data">
										<div class="form-body" style="padding-bottom: 17%;">											
											<div class="form-group row" style="">
												<label class="control-label col-md-3">Morning Time<span class="required"> * </span></label>
												<div class="col-lg-3">
													<label class="j-label">Start Time</label>
													<div class="form-group">
														<div class="input-group clockpicker">
															<input type="text" name="st_time" class="form-control">
															<span class="input-group-addon">
																 <span class="fa fa-clock-o"></span>
															</span>
														</div>
													</div> 
												</div>
												<div class="col-lg-3">
													<label class="j-label">End Time</label>
													<div class="form-group">
														<div class="input-group clockpicker">
															<input type="text" name="end_time" class="form-control">
															<span class="input-group-addon">
																 <span class="fa fa-clock-o"></span>
															</span>
														</div>
													</div>
												</div>
											</div>
											<div class="form-group row" style="">
												<label class="control-label col-md-3">Evening Time<span class="required"> * </span></label>
												<div class="col-lg-3">
													<label class="j-label">Start Time</label>
													<div class="form-group">
														<div class="input-group clockpicker">
															<input type="text" name="est_time" class="form-control">
															<span class="input-group-addon">
																 <span class="fa fa-clock-o"></span>
															</span>
														</div>
													</div>
												</div>
												<div class="col-lg-3">
													<label class="j-label">End Time</label>
													<div class="form-group">
														<div class="input-group clockpicker">
															<input type="text"  name="eend_time" class="form-control">
															<span class="input-group-addon">
																 <span class="fa fa-clock-o"></span>
															</span>
														</div>
													</div>
												</div>
											</div>
											<div class="form-actions">
												<div class="row">
													<div class="offset-md-3 col-md-9">
													<input type="hidden" name="u_id" value="<?php echo $u_id; ?>">
														<input type="submit" name="BookTimeBtn" value="Submit" style="margin-left: 22%;" class="btn btn-info m-r-20">
														<a href="available_fixschedule.php" class="btn btn-default">Cancel</a>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- start chat sidebar -->
			
			<!-- end chat sidebar -->
		</div>
		<!-- end page container -->
		<!-- start footer -->
		<div class="page-footer">
			<div class="page-footer-inner"> <?php echo date('Y');?> &copy; Designed By
				<a href="http://infomagine.in/" target="_top" class="makerCss">Infomagine</a>
			</div>
			<div class="scroll-to-top">
				<i class="icon-arrow-up"></i>
			</div>
		</div>
		<!-- end footer -->
	</div>
	<!-- start js include path -->
	<script src="assets/jquery.min.js"></script>
	<script src="assets/popper/popper.js"></script>
	<script src="assets/jquery.blockui.min.js"></script>
	<script src="assets/jquery.slimscroll.js"></script>
	<script src="assets/jquery-validation/js/jquery.validate.min.js"></script>
	<script src="assets/jquery-validation/js/additional-methods.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/bootstrap-switch/js/bootstrap-switch.min.js"></script>
	<script src="assets/bootstrap-datepicker/bootstrap-datepicker.js"></script>
	<script src="assets/bootstrap-datepicker/datepicker-init.js"></script>
	<!-- Common js-->
	<script src="assets/app.js"></script>
	<script src="assets/form-validation.js"></script>
	<script src="assets/layout.js"></script>
	<script src="assets/theme-color.js"></script>
	<!-- Material -->
	<script src="assets/material/material.min.js"></script>
	<!-- end js include path -->
	<script type="text/javascript" src="assets/material/bootstrap-clockpicker.min.js"></script>
	<script type="text/javascript">
		$('.clockpicker').clockpicker();
	</script>
	<script>
		$(function() {
			$( "#datepicker" ).datepicker({ minDate: 0});
		});
	</script>
</body>
</html>
