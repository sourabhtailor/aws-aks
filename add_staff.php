<?php
ini_set('display_errors',1);
session_start();
if (!isset($_SESSION['u_id'])) {
	header("Location:index.php");
}
else if(isset($_SESSION['u_id']))
{
	$s_id = $_SESSION['u_id'];
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
	<title>Add-Staff</title>
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
								<div class="page-title">Add Staff</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Staff</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Add Staff</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Basic Information</header>
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
									<form action="script_add_staff.php" method="post" enctype="multipart/form-data" id="myform" class="form-horizontal">
										<div class="form-body">
											<div class="form-group row">
												<label class="control-label col-md-3">First Name<span class="required"> * </span></label>
												<div class="col-md-5">
													<input type="text" name="txt_sname" id="txt_sname" data-required="1" placeholder="Enter First Name" class="form-control input-height" required />
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Last Name<span class="required"> * </span></label>
												<div class="col-md-5">
													<input type="text" name="txt_lname" id="txt_lname" data-required="1" placeholder="Enter Last Name" class="form-control input-height" required />
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Mobile No.<span class="required"> * </span></label>
												<div class="col-md-5">
													<input name="txt_number" maxlength="10" id="txt_number" type="text" placeholder="Mobile Nnumber" class="form-control input-height" required /> 
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Email Address</label>
												<div class="col-md-5">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
														<input type="text" class="form-control input-height" name="txt_email" id="txt_email" placeholder="Email Address" required> 
													</div>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Gender<span class="required"> * </span></label>
												<div class="col-md-5">
													<select class="form-control input-height" name="txt_sgender" id="txt_sgender" required>
														<option value=""> </option>
														<option value="Male">Male</option>
														<option value="Female">Female</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Patient Age<span class="required"> * </span></label>
												<div class="col-md-5">
													<input type="text" name="txt_age" id="txt_age" data-required="1" placeholder="Enter Your Age" class="form-control input-height" required />
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Date Of Joining<span class="required"> * </span></label>
												<div class="col-md-5" id="dp1">
													<input class="form-control input-height" id="txt_sdate"  placeholder="Date Of Joining" name="txt_sdate" style="width: 504px;" type="text" autocomplete ="off" required>
													<!--<span class="add-on txt_date"><i class="fa fa-calendar txt_date"></i></span>-->
												</div>
											</div>
											<!--<div class="form-group row">
												<label class="control-label col-md-3">Date Of Joining<span class="required"> * </span></label>
												<div class="input-append date" id="dp3">
													<input class="formDatePicker" placeholder="Date Of Joining" size="54" name="txt_sdate" id="txt_sdate" type="text" readonly required>
													<span class="add-on"><i class="fa fa-calendar"></i></span>
												</div>
											</div>-->
											<div class="form-group row">
												<label class="control-label col-md-3">Designation<span class="required"> * </span></label>
												<div class="col-md-5">
													<input type="text" name="txt_designation" id="txt_designation" data-required="1" placeholder="Enter Your Designation" class="form-control input-height" required />
												</div>
											</div>
											
											<!--<div class="form-group row">
												<label class="control-label col-md-3">Date Of Joining
													<span class="required"> * </span>
												</label>
												<div class="input-append date" id="dp3">
													<input class="formDatePicker" name="txt_sdate" placeholder="Date Of Joining" size="57" type="text" readonly>
													<span class="add-on"><i class="fa fa-calendar"></i></span>
												</div>
											</div>-->
											
											<div class="form-group row">
												<label class="control-label col-md-3">Qualification</label>
												<div class="col-md-5">
													<textarea name="txt_education" id="txt_education" class="form-control-textarea" placeholder="Education" rows="2" required></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Address<span class="required"> * </span></label>
												<div class="col-md-5">
													<textarea name="txt_address" id="txt_address" placeholder="Address" class="form-control-textarea" rows="5" required></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Photo</label>
												<div class="compose-editor">
													<input type="file" name="txt_pfile" class="default" multiple>
												</div>
											</div>
											<div class="form-actions">
												<div class="row">
													<div class="offset-md-3 col-md-9">
													<input type="hidden" name="s_id" value="<?php echo $s_id;?>">
														<button type="submit" id ="btn_submit" name="BtnStaffSubmit" class="btn btn-info m-r-20">Submit</button>
														<a href="all_staffs.php" class="btn btn-default">Cancel</a>
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
	<!--<script src="assets/jquery.min.js"></script>-->
	<script src="assets/popper/popper.js"></script>
	<script src="assets/jquery.blockui.min.js"></script>
	<script src="assets/jquery.slimscroll.js"></script>
	<!--<script src="assets/jquery-validation/js/jquery.validate.min.js"></script>
	<script src="assets/jquery-validation/js/additional-methods.min.js"></script>
	<script src="assets/form-validation.js"></script>-->
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/bootstrap-switch/js/bootstrap-switch.min.js"></script>
	<!--<script src="assets/bootstrap-datepicker/bootstrap-datepicker.js"></script>
	<script src="assets/bootstrap-datepicker/datepicker-init.js"></script>-->
	<!-- Common js-->
	<script src="assets/app.js"></script>
	<script src="assets/layout.js"></script>
	<script src="assets/theme-color.js"></script>
	<!-- Material -->
	<!--<script src="assets/material/material.min.js"></script>-->
	<!-- end js include path -->
	<link rel="stylesheet" href="../css/jquery-ui.css" />
	<script src="../js/jquery-ui.js"></script>
	  <script type='text/javascript'>
	  jQuery(document).ready(function($){
			  $(function() {
				$( "#txt_sdate,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
			  });
		});
	  </script>
	<!-- //Calendar -->
	<script>
	  		$( function() {
	   			$( "#txt_sdate" ).datepicker({
	   				minDate: 0
	   			});
	  		});
	</script>
</body>
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
						txt_sname: {
							required: true,
						},
						txt_lname: {
							required: true,
						},
						txt_age: {
							required: true,
						},
						txt_sgender: {
							required: true,
						},
						txt_pin: {
							required: true,
						},
						txt_sdate: {
							required: true,
						},
						txt_state: {
							required: true,
						},
						txt_designation: {
							required: true,
						},
						txt_education: {
							required: true,
						},
						/* txt_pass: {
							required: true,
							minlength: 10,
							pwcheck: true,
						},
						txt_cnpass: {
							required: true,
						}, */
						txt_email: {
							required: true,
							customemail: true,
						},
						txt_number: {
							required: true,
							numchk: true,
							minlength: 10,
							maxlength: 10,
						},
						txt_address: {
							required: true,
						},
						
					},
					messages: {
						txt_sname: {
							required: "This field is required.",
						},
						txt_lname: {
							required: "This field is required.",
						},
						txt_age: {
							required: "This field is required.",
						},
						txt_sgender: {
							required: "This field is required.",
						},
						txt_pin: {
							required: "This field is required.",
						},
						txt_sdate: {
							required: "This field is required.",
						},
						txt_designation: {
							required: "This field is required.",
						},
						txt_education: {
							required: "This field is required.",
						},
						/* txt_pass: {
							required: "Please Enter Valid User Password.",
							pwcheck: "Password at least have 1 uppercase, 1 lowercase, 1 special character and 1 digit and atleast 10 digit.",
							
						},
						txt_cnpass: {
							required: "Enter User Confirm Password.",
						}, */
						txt_email: {
							required: "This field is required.",
							customemail: "Please enter a valid email address.",
							//remote: "Email already in use.Please try some different Email."
						},
						txt_number: {
							required: "This field is required.",
							numchk: "Enter Valid Mobile no.",
							//remote: "Contact already in use.Please try some different Contact No."
						},
						txt_address: {
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
				
                /* $('#btn_submit').click(function (e) {
                    if($('#myform').valid()){
						//
					}
                }); */
            });
        </script>