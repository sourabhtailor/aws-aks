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
$msg_showing ='';
if(isset($_SESSION['msg_successfully'])){
	$msg_showing ='<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					<strong>Success!</strong> '.$_SESSION['msg_successfully'].'
				</div>';unset($_SESSION['msg_successfully']);
	}
if(isset($_SESSION['msg_error'])){
	$msg_showing ='<div class="alert alert-danger alert-dismissible" role="alert" style="color:red">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					<strong>Failed!</strong> '.$_SESSION['msg_error'].'
				</div>';unset($_SESSION['msg_error']);
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
	<title>Add-Patient</title>
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
							<div class=" pull-left"><div class="page-title">Add Patient</div></div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i></li>
								<li><a class="parent-item" href="all_patients.php">Patients</a>&nbsp;<i class="fa fa-angle-right"></i></li>
								<li class="active">Add Patient</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Add Patient</header><?php echo $msg_showing;?>
								</div>
								<div class="card-body" id="bar-parent" style="border-top: 1px solid;border-color: #bbb2b2;">
									<form action="script_add_patient.php" method="post" enctype="multipart/form-data" id="myform" class="form-horizontal">
										<div class="form-body">
											<div class="form-group row">
												<label class="control-label col-md-3">Patient Name<span class="required"> * </span></label>
												<div class="col-md-5">
													<input type="text" name="txt_pname" id="txt_pname" placeholder="Enter Name" class="form-control input-height" required />
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Patient Age<span class="required"> * </span></label>
												<div class="col-md-5">
													<input type="text" name="txt_page" id="txt_page" data-required="1" maxlength="2" placeholder="Enter Age" class="form-control input-height" required />
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Date Of Birth<span class="required"> * </span></label>
												<div class="col-md-5" id="dp3">
													<input class="form-control input-height" id="txt_bdate"  placeholder="Date Of Birth" name="txt_bdate" style="width: 411px;" type="text" autocomplete ="off" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Gender<span class="required"> * </span></label>
												<div class="col-md-5">
													<select class="form-control input-height" name="txt_gender" id="txt_gender" required>
														<option value=""> </option>
														<option value="Male">Male</option>
														<option value="Female">Female</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Email Address<span class="required"> * </span></label>
												<div class="col-md-5">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
														<input type="text" class="form-control input-height" name="txt_pemail" id="txt_pemail" placeholder="Email Address" required> 
													</div>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Contact No<span class="required"> * </span></label>
												<div class="col-md-5">
													<input name="txt_phone_no" maxlength="10" id="txt_number" type="text" placeholder="Contact No" class="form-control input-height" required /> 
												</div>
											</div>											
											<div class="form-group row">
												<label class="control-label col-md-3">Injury/Condition<span class="required"> * </span></label>
												<div class="col-md-5">
													<input type="text" class="form-control input-height" placeholder="Injury/Condition" name="txt_injury" id="txt_injury" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Upload Picture</label>
												<div class="compose-editor">
													<input type="file" name="txt_pfile" class="default">
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Postal Address<span class="required"> * </span></label>
												<div class="col-md-5">
													<textarea name="txt_paddress" id="txt_paddress" placeholder="Address" class="form-control-textarea" rows="5" required></textarea>
												</div>
											</div>
											<div class="form-actions">
												<div class="row">
													<div class="offset-md-4 col-md-10" style='margin-left:8px;width:100%;text-align:center;'>
													<input type ="hidden" name="u_id" value="<?php echo $u_id; ?>">
														<button type="submit" class="btn btn-info m-r-20" id="btn_submit" name="BtnPatientAdd">Submit</button>
														<a href="all_patients.php" class="btn btn-default">Cancel</a>
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
						txt_gender: {
							required: true,
						},
						txt_page: {
							required: true,
						},
						txt_number: {
							required: true,
							numchk: true,
							minlength: 10,
							maxlength: 10,
						},
						txt_pemail: {
							required: true,
							customemail:true,
						},
						txt_status: {
							required: true,
						},  
						txt_selectbg: {
							required: true,
						},
						txt_pbp: {
							required: true,
						},
						txt_psug: {
							required: true,
						},
						txt_injury: {
							required: true,
						},
						txt_paddress: {
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
						txt_gender: {
							required: "This field is required.",
						},
						txt_page: {
							required: "This field is required.",
						},
						txt_number: {
							required: "This field is required.",
							numchk: "Enter Valid Mobile no.",
						},
						txt_pemail: {
							required: "This field is required.",
							customemail: "Please enter a valid email address.",
						},
						txt_status: {
							required: "This field is required.",
						},
						txt_selectbg: {
							required: "This field is required.",
						},
						txt_pbp: {
							required: "This field is required.",
						},
						txt_psug: {
							required: "This field is required.",
						},
						txt_injury: {
							required: "This field is required.",
						},
						txt_paddress: {
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