<?php
ini_set('display_errors',1);
session_start();
if (!isset($_SESSION['u_id'])) {
	header("Location:index.php");
}else if(isset($_SESSION['u_id']))
{
	$u_id = $_SESSION['u_id'];
}
$u_id = '';
$notification ='';
/* if(isset($_SESSION['success'])){
	$notification ='<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					<strong>Success!</strong> '.$_SESSION['success'].'
				</div>';unset($_SESSION['success']);
	} */
if(isset($_SESSION['error'])){
	$notification ='<div class="alert alert-danger alert-dismissible" role="alert" style="color:red">
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
	<title>Add-Counselling</title>
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
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
	<style>
	.close {
  margin-top: 27px; 
}
	
	</style>
</head>
<!-- END HEAD -->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
		<!-- start header -->
		<?php include 'sidebar.php'; ?>
		<!-- end header -->
		<div class="page-container"><!-- start page container -->
			<!-- start header menu -->
			<?php include 'header.php'; ?>
			<!-- end header menu -->
			<div class="page-content-wrapper"><!-- start page content -->
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left"><div class="page-title">Add Counselling</div></div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i></li>
								<li><a class="parent-item" href="manageCounseling.php">Manage-Counselling</a>&nbsp;<i class="fa fa-angle-right"></i></li>
								<li class="active">Add Counselling</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Add Counselling</header><?php echo $notification;?>
								</div>
								<div class="card-body" id="bar-parent" style="border-top: 1px solid;border-color: #bbb2b2;">
									<form action="scriptAddCounseling.php" method="post" enctype="multipart/form-data" id="myform" class="form-horizontal">
										<div class="form-body">
											<div class="form-group row">
												<label class="control-label col-md-3">Time<span class="required"> * </span></label>
												<div class="col-md-5">
													<input type="text" name="time" id="time" placeholder="Enter Counselling Time" class="form-control input-height" required />
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Price<span class="required"> * </span></label>
												<div class="col-md-5">
													<input type="text" name="price" id="price" data-required="1" placeholder="Enter Counselling Price" class="form-control input-height" required />
												</div>
											</div>
											<div class="form-actions">
												<div class="row">
													<div class="offset-md-4 col-md-10" style='margin-left:8px;width:100%;text-align:center;'>
													<input type ="hidden" name="u_id" value="<?php echo $u_id; ?>">
														<button type="submit" class="btn btn-info m-r-20" id="btn_submit" name="BtnPatientAdd">Submit</button>
														<a href="manageCounseling.php" class="btn btn-default">Cancel</a>
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
			</div><!-- end page content -->
		</div><!-- end page container -->
		<!-- start footer -->
		<!--?php //include 'footer.php';?>
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
	<!-- end js include path -->
	<link rel="stylesheet" href="../css/jquery-ui.css" />
	<script src="../js/jquery-ui.js"></script>
	  <script type='text/javascript'>
		jQuery(document).ready(function($){
		  $(function() {
			$( "#txt_bdate,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
		  });
		});
	  </script>
	<!-- //Calendar -->
	<script>
		$( function() {
			$( "#txt_bdate" ).datepicker({
				//minDate: 0
			});
		});
	</script></body>
</html>
<script>
 $(document).ready(function () {
		$('#txt_number').keyup(function () {
			this.value = this.value.replace(/[^0-9\.]/g, '');
		});
		$.validator.addMethod("customemail", function (value, element, params) {
			if (value == '')
				return true;
			var ptrn = /^([a-zA-Z0-9_\.\-\'])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value);
			return ptrn;
		});
		$.validator.addMethod("pwcheck", function (value) {
			return /[\@\#\$\%\^\&\*\(\)\_\+\!]/.test(value) && /[a-z]/.test(value) && /[0-9]/.test(value) && /[A-Z]/.test(value)
		});
		$.validator.addMethod("numchk", function (value, element, params) {
			var ptrn = /^([0-9])+$/.test(value);
			return ptrn;
		});
		$('#myform').validate({
			rules: {
				txt_pname: {
					required: true,
				},
			   txt_bdate: {
					required: true,
				},						
			},
			messages: {
				txt_pname: {
					required: "This field is required.",
				},
				txt_bdate: {
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
		
		$('#btn_submit').click(function (e) {
			if($('#myform').valid()){
				//
			}
		}); 
	});
</script>