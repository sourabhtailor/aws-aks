<?php
ini_set('display_errors',1);
session_start();
if (!isset($_SESSION['u_id'])) {
	header("Location:index.php");
}
include '../config/DB.php';
$db = new DB();
$connect = $db->connect();
date_default_timezone_set('Asia/Kolkata'); 
$tbl_name='tab_mainmenu';
$col = array();
$where ='';
$access='';
$id='';
$id1='';
$id2='';
$id3='';
$id4='';
$id5='';
$id6='';
$id7='';
$query_fetch1 = $db->sql_select($tbl_name,$col,$where,$order_by=null);
if(count($query_fetch1)> 0){
	for($i=0;$i<count($query_fetch1);$i++){
			$id    = $query_fetch1[$i]['int_id'];
			/* if($id == 1){
				$id1    = $query_fetch1[$i]['int_id'];
			} */if($id == 2){
				$id2   = $query_fetch1[$i]['int_id'];
			}if($id == 3){
				$id3    = $query_fetch1[$i]['int_id'];
			}if($id == 4){
				$id4    = $query_fetch1[$i]['int_id'];
			}if($id == 5){
				$id5   = $query_fetch1[$i]['int_id'];
			}if($id == 6){
				$id6    = $query_fetch1[$i]['int_id'];
			}if($id == 7){
				$id8   = $query_fetch1[$i]['int_id'];
			}if($id == 8){
				$id7    = $query_fetch1[$i]['int_id'];
			}if($id == 9){
				$id9    = $query_fetch1[$i]['int_id'];
			}if($id == 10){
				$id10    = $query_fetch1[$i]['int_id'];
			}if($id == 11){
				$id11    = $query_fetch1[$i]['int_id'];
			}if($id == 12){
				$id12    = $query_fetch1[$i]['int_id'];
			}if($id == 13){
				$id13   = $query_fetch1[$i]['int_id'];
			}			
	}
	$access ='<div style="width: 50%;padding-left: 1%;" form-control input-height id="application">
				<label><input type="checkbox" value='.$id2.' name="click[]"> Dashbord</label>
				<label><input type="checkbox" value='.$id3.' name="click[]"> Appointment</label>
				<label><input type="checkbox" value='.$id4.' name="click[]"> Time Schedule</label>
				<label><input type="checkbox" value='.$id5.' name="click[]"> Prescription</label>
				<label><input type="checkbox" value='.$id6.' name="click[]"> Patient</label>
				<label><input type="checkbox" value='.$id7.' name="click[]"> Staff</label>
				<label><input type="checkbox" value='.$id8.' name="click[]"> Users</label>
				<label><input type="checkbox" value='.$id9.' name="click[]"> Blog</label>
				<label><input type="checkbox" value='.$id10.' name="click[]">Home Visit Pending Queries</label>
				<label><input type="checkbox" value='.$id11.' name="click[]">Home Visit Replied Queries</label>
				<label><input type="checkbox" value='.$id12.' name="click[]">Reschedule Replied Queries</label>
				<label><input type="checkbox" value='.$id13.' name="click[]">Reschedule Pending Queries</label>
				</div>';
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
	<title>Add-Users</title>
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
</head>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo" style='background-color:#eaeef3;'>
	<div class="page-wrapper">
		<!-- start sidebar -->
		<?php include 'sidebar.php';?>
		<!-- end sidebar -->
		<div class="page-container"><!-- start page container -->
			<!-- start header menu -->
			<?php include 'header.php';?>
			<!-- end header menu -->
			<div class="page-content-wrapper"><!-- start page content -->
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left"><div class="page-title">Add User</div></div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i></li>
								<li><a class="parent-item" href="view_users.php">Users</a>&nbsp;<i class="fa fa-angle-right"></i></li>
								<li class="active">Add User</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Add User</header>
								</div>
								<div class="card-body" id="bar-parent" style="border-top:1px solid;border-color:">
									<form action="script_add_users.php" enctype="multipart/form-data" method="post" id="myform" class="form-horizontal" autocomplete="off">
										<div class="form-body">
											<div class="form-group row">
												<label class="control-label col-md-3">First Name<span class="required"> * </span></label>
												<div class="col-md-5">
													<input type="text" name="txt_name" id="txt_name" data-required="1" placeholder="Enter First Name" value="" class="form-control input-height" autocomplete="off" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Last Name<span class="required"> * </span></label>
												<div class="col-md-5">
													<input type="text" name="txt_lastname" id="txt_lastname" data-required="1" placeholder="Enter Last Name" value="" class="form-control input-height" autocomplete="off" autocomplete="off" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">User Age<span class="required"> * </span></label>
												<div class="col-md-5">
													<input type="text" name="txt_age" id="txt_age" data-required="1" maxlength="2" placeholder="Enter Age" value="" class="form-control input-height" autocomplete="off" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3"> Gender<span class="required"> * </span></label>
												<div class="col-md-5">
													<select class="form-control input-height" name="txt_gender" id="txt_gender">
														<option value=""></option>
														<option value="Male">Male</option>
														<option value="Female">Female</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Contact No<span class="required"> * </span></label>
												<div class="col-md-5">
													<input name="txt_number" type="text" id="txt_number" maxlength="10" placeholder="Enter Contact No" value="" class="form-control input-height" autocomplete="off" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Email Address<span class="required"> * </span></label>
												<div class="col-md-5">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
														<input type="text" class="form-control input-height" name="txt_email" id="txt_email" value="" placeholder="Enter Email Address" autocomplete="off" required>
													</div>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Pin Code<span class="required"> * </span></label>
												<div class="col-md-5">
													<input type="text" name="txt_pin" data-required="1" maxlength="6" id="txt_pin" placeholder="Enter Pin Code" value="" class="form-control input-height" autocomplete="off" required> 
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Password<span class="required"> * </span></label>
												<div class="col-md-5">
													<input name="txt_pass" type="password" maxlength="10" placeholder="Enter Password" id="txt_pass" value="" class="form-control input-height" autocomplete="off" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Confirm Password<span class="required"> * </span></label>
												<div class="col-md-5">
													<input name="txt_cnpass" id="txt_cnpass" type="password" maxlength="10" placeholder="Confirm password" value="" class="form-control input-height" autocomplete="off"/>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Address<span class="required"> * </span></label>
												<div class="col-md-5">
													<textarea name="txt_address" placeholder="Address" id="txt_address" class="form-control-textarea" rows="2" autocomplete="off"   required></textarea>
												</div>
											</div>
											<!--<div class="form-group row">
												<label class="control-label col-md-3">Photo</label>
												<div class="compose-editor">
													<input type="file" name="txt_file" class="default" value="" >
												</div>
											</div>-->
											<div class="form-group row">
												<label class="control-label col-md-3"> User Type<span class="required"> * </span></label>
												<div class="col-md-5">
												<input type="text" name="user_type" id="user_type" data-required="1" value="Staff" class="form-control input-height" autocomplete="off" required>
													<!--<select class="form-control input-height" name="user_type" id="user_type">
														<option value="Staff">Staff</option>
														<option value="Patient">Patient</option>
													</select>-->
												</div>
											</div>
											<div class="form-group row" style="margin-top: 35px;">
												<label class="control-label col-md-3" style="margin-top: -9px;">Application Access Permission</label>
												<?php echo $access;?>
											</div>
											
											<div class="form-actions">
												<div class="row">
													<div class="offset-md-4 col-md-4" style=''>													
														<input type="hidden" name="txt_uid" value="">
														<button type="submit" name="Add_UserBtn" id="btn_submit" class="btn btn-info m-r-20">Submit</button>
														<a href="view_users.php" class="btn btn-default">Cancel</a>
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
		<!--?php //include 'footer.php';?>
		<!-- end footer -->
	</div>
	<!-- start js include path -->
	<script src="../js/jquery.validate.js"></script>
	<!--<script src="assets/jquery.min.js"></script>-->
	<script src="assets/popper/popper.js"></script>
	<script src="assets/jquery.blockui.min.js"></script>
	<script src="assets/jquery.slimscroll.js"></script>
<script src="assets/jquery-validation/js/jquery.validate.min.js"></script>
	<script src="assets/jquery-validation/js/additional-methods.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/bootstrap-switch/js/bootstrap-switch.min.js"></script>
	<!-- Common js-->
	<script src="assets/app.js"></script>
	<script src="assets/layout.js"></script>
	<script src="assets/theme-color.js"></script>
	<!--<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>-->
<script type="text/javascript">
    $(document).ready(function() {
        $("submit").click(function(){
            var favorite = [];
            $.each($("input[name='cbox']:checked"), function(){            
                favorite.push($(this).val());
            });
            alert("My favourite sports are: " + favorite.join(", "));
        });
    });
</script
	<!-- Material -->
	<script src="assets/material/material.min.js"></script>
	<!-- end js include path -->
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
						txt_name: {
							required: true,
						},
						txt_lastname: {
							required: true,
						},
						txt_age: {
							required: true,
						},
						txt_gender: {
							required: true,
						},
						txt_pin: {
							required: true,
						},
						txt_city: {
							required: true,
						},
						txt_state: {
							required: true,
						},
						txt_pass: {
							required: true,
							minlength: 10,
							pwcheck: true,
						},
						txt_cnpass: {
							required: true,
						},
						txt_email: {
							required: true,
							customemail: true,
						},
						txt_number: {
							required: true,
							numchk: true,
							minlength: 10,
							//maxlength: 15,
						},
						txt_address: {
							required: true,
						}
					},
					messages: {
						txt_name: {
							required: "This field is required.",
						},
						txt_lastname: {
							required: "This field is required.",
						},
						txt_age: {
							required: "This field is required.",
						},
						txt_gender: {
							required: "This field is required.",
						},
						txt_pin: {
							required: "This field is required.",
						},
						txt_city: {
							required: "This field is required.",
						},
						txt_state: {
							required: "This field is required.",
						},
						txt_pass: {
							required: "This field is required.",
							pwcheck: "Password at least have 1 uppercase, 1 lowercase, 1 special character and 1 digit and atleast 10 digit.",
							
						},
						txt_cnpass: {
							required: "This field is required.",
						},
						txt_email: {
							required: "This field is required.",
							customemail: "Please enter a valid email address.",
							//remote: "Email already in use.Please try some different Email."
						},
						txt_number: {
							required: "Enter Valid Mobile no.",
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