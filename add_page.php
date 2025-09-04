<?php
session_start();
if(isset($_SESSION['u_id']))
{
	$u_id = $_SESSION['u_id'];
}
$information ='';
if(isset($_SESSION['message'])){
	$information ='<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: 4%;"><span aria-hidden="true">×</span></button>
					<strong>Success!</strong> '.$_SESSION['message'].'
				</div>';unset($_SESSION['message']);
	}
if(isset($_SESSION['message_error'])){
		$information ='<div class="alert alert-danger alert-dismissible" role="alert" style="color:red">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: 4%;"><span aria-hidden="true">×</span></button>
					<strong>Failed!</strong> '.$_SESSION['message_error'].'
				</div>';unset($_SESSION['message_error']);
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
	<title>Add-Page</title>
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
							<div class=" pull-left"><div class="page-title">Add Page</div></div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i></li>
								<li><a class="parent-item" href="#">Pages</a>&nbsp;<i class="fa fa-angle-right"></i></li>
								<li class="active">Add Page</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Basic Information</header>
									<header><?php echo $information;?></header>
									<!--<button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
										<i class="material-icons">more_vert</i>
									</button>
									<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" data-mdl-for="panel-button">
										<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
										<li class="mdl-menu__item"><i class="material-icons">print</i>Another action</li>
										<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
									</ul>-->
								</div>
								<div class="card-body" id="bar-parent" style="border-top: 1px solid;border-color: #bbb2b2;">
									<form action="script_add_page.php" method="post" enctype="multipart/form-data" id="form_sample_1" class="form-horizontal" style="padding-top:30px;">
										<div class="form-body" style="padding-bottom: 180px;">
											<div class="form-group row">
												<label class="control-label col-md-3">Page Title<span class="required"> * </span></label>
												<div class="col-md-5">
													<input type="text" id="txt_title" name="txt_title" placeholder="Enter Page Title" class="form-control input-height" required />
												</div>
											</div>
											
											<div class="form-group row">
												<label class="control-label col-md-3">Page Url <span class="required"> * </span></label>
												<div class="col-md-5">
													<input type="text" name="txt_url" placeholder="Page Url" id="txt_url" class="form-control input-height" required></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Parent Id <span class="required"> * </span></label>
												<div class="col-md-5">
													<input type="text" name="txt_id" placeholder="Parent Id" id="txt_id" class="form-control input-height" required></textarea>
												</div>
											</div>
											
											<div class="form-actions">
												<div class="row">
													<div class="offset-md-3 col-md-9">
													<!--<input type="hidden" name="s_id" value="">-->
														<button type="submit" name="BtnBlogSubmit" class="btn btn-info m-r-20">Submit</button>
														<a href="index.php" class="btn btn-default">Cancel</a>
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
	<!--<script src="assets/jquery.min.js"></script>-->
	<script src="assets/popper/popper.js"></script>
	<script src="assets/jquery.blockui.min.js"></script>
	<script src="assets/jquery.slimscroll.js"></script>
	<!--<script src="assets/jquery-validation/js/jquery.validate.min.js"></script>
	<script src="assets/jquery-validation/js/additional-methods.min.js"></script>-->
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/bootstrap-switch/js/bootstrap-switch.min.js"></script>
	<script src="assets/bootstrap-datepicker/bootstrap-datepicker.js"></script>
	<script src="assets/bootstrap-datepicker/datepicker-init.js"></script>
	<!-- Common js-->
	<script src="assets/app.js"></script>
	<script src="assets/layout.js"></script>
	<script src="assets/theme-color.js"></script>
	<!-- Material-->
	<script src="assets/material/material.min.js"></script>
	<!-- end js include path -->
	<!--<script src="assets/form-validation.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
</body>
</html>
<script>
/* $(document).ready(function() {

  $('#form_sample_1').submit(function(e) {
   
    var txt_title = $('#txt_title').val();
    var txt_date  = $('#txt_date').val();
    var txt_description = $('#txt_description').val();
    var txt_file = $('#txt_file').val();

   
     if (txt_title.length < 1) {
      $('#txt_title').after('<p class="error" style="color: red;">Title field is required</p>');
	   e.preventDefault();
    }
    if (txt_date.length < 1) {
      $('#ttttt').after('<p class="error" style="color: red;margin-top: 0.4%;margin-left: 2.5%;">Date field is required</p>');
	  e.preventDefault();
    }
    if (txt_description.length < 1) {
      $('#txt_description').after('<p class="error" style="color: red;">Description field is required</p>');
	  e.preventDefault();
    } 
	if (txt_file.length < 1) {
      $('#txt_file').after('<p class="error" style="color: red;">Image field is required</p>');
	  e.preventDefault();
    } 
  });
});
   */
</script>