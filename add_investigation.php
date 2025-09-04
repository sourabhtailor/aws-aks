<?php
ini_set('display_errors',1);
session_start();
if (!isset($_SESSION['u_id'])) {
	header("Location:../index.php");
}
$information='';
if(isset($_SESSION['error'])){
		$information ='<div class="alert alert-danger alert-dismissible" role="alert" style="color:red">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					<strong>Failed!</strong> '.$_SESSION['error'].'
				</div>';unset($_SESSION['error']);
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
	<title>Add-Investigation</title>
	<!-- google font -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
	<!-- icons -->
	<link href="assets/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!--bootstrap -->

	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/bootstrap-datepicker/datepicker.css" rel="stylesheet" type="text/css" />
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="assets/material/material.min.css">
	<link rel="stylesheet" href="css/material_style.css">
	<!-- Theme Styles -->
	<link href="css/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link href="css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="css/formlayout.css" rel="stylesheet" type="text/css" />
	<link href="css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="css/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- favicon -->
	<link rel="shortcut icon" href="../admin/img/logok.png" />
</head>
<!-- END HEAD -->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
		<!-- start sidebar -->
		
		<?php include 'sidebar.php';?>
	
		<!-- end sidebar -->
		
		<!-- start page container -->
		<div class="page-container">
			<!-- start header menu -->
			
			<?php include 'header.php';?>
			
			<!-- end header menu -->
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Add Investigation</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="manage_investigation.php">Manage Investigation</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Add Investigation</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Basic Information</header><?php echo $information; ?>
								</div>
								<div class="card-body" id="bar-parent" style="border-top: 1px solid;border-color: #bbb2b2;">
									<form action="script_add_investigation.php" method="post" enctype="multipart/form-data" id="myform" class="form-horizontal">
										<div class="form-body">
											<div class="form-group row">
												<label class="control-label col-md-3">Investigation Name<span class="required"> * </span></label>
												<div class="col-md-5">
													<input type="text" name="txt_name" id="txt_name" data-required="1" placeholder="Enter Investigation Name" class="form-control input-height" required />
												</div>
											</div>
											
											<!--<div class="form-group row">
												<label class="control-label col-md-3">Type<span class="required">  </span></label>
												<div class="col-md-5">
													<select class="form-control input-height" name="type" id="type" >
														<option value=""> </option>
														<option value="Tablet">Tablet</option>
														<option value="Capsules">Capsules</option>
														<option value="Liquid">Liquid</option>
													</select>
												</div>
											</div>-->
											<div class="form-actions">
												<div class="row">
													<div class="offset-md-3 col-md-9">
														<button type="submit" id ="btn_submit" name="BtnStaffSubmit" class="btn btn-info m-r-20">Submit</button>
														<a href="manage_investigation.php" class="btn btn-default">Cancel</a>
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
			<!-- end page content -->
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
	<script src="../js/jquery.validate.js"></script>
	<script src="assets/popper/popper.js"></script>
	<script src="assets/jquery.blockui.min.js"></script>
	<script src="assets/jquery.slimscroll.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/bootstrap-switch/js/bootstrap-switch.min.js"></script>
	<!-- Common js-->
	<script src="assets/app.js"></script>
	<script src="assets/layout.js"></script>
	<script src="assets/theme-color.js"></script>
	<!-- Material -->
	<!-- end js include path -->
	<link rel="stylesheet" href="../css/jquery-ui.css" />
</body>
</html>
<script>
            $(document).ready(function () {
               
				$('#myform').validate({
					rules: {
						txt_name: {
							required: true,
						},
					},
					messages: {
						txt_name: {
							required: "This field is required.",
						},
					},
					highlight: function (element) {
						$(element).closest('.form-group').addClass('has-error');
					},
					unhighlight: function (element) {
						$(element).closest('.form-group').removeClass('has-error');
					},
					errorElement: 'span',
					errorClass: 'help-block',
					errorPlacement: function (error, element) {
						if (element.parent('.input-group').length) {
							error.insertAfter(element.parent());
						} else {
							error.insertAfter(element);
						}
					},
					submitHandler: function (form) {
						form.submit();
					}
				});
            });
        </script>