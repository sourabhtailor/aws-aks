<?php
ini_set('display_errors',1);
session_start();
if (!isset($_SESSION['u_id'])) {
	header("Location:index.php");
}else if(isset($_SESSION['u_id']))
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
	<title>Add-Blog</title>
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
	<!-- favicon --><style>span#txt_date-error {
    color: #dd4b39;
   // margin-left: 3%;
}</style>
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
							<div class=" pull-left"><div class="page-title">Add Blog</div></div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i></li>
								<li><a class="parent-item" href="view_blog.php">Blog</a>&nbsp;<i class="fa fa-angle-right"></i></li>
								<li class="active">Add Blog</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head"><header>Add Blog</header></div>
								<div class="card-body" id="bar-parent" style="border-top: 1px solid;border-color: #bbb2b2;">
									<form action="script_add_blog.php" autocomplete="off" method="post" enctype="multipart/form-data" id="myform" class="form-horizontal">
										<div class="form-body" style="padding-bottom: 79px;">
											<div class="form-group row">
												<label class="control-label col-md-3">Blog Title<span class="required"> * </span></label>
												<div class="col-md-5">
													<input type="text" id="txt_title" name="txt_title" placeholder="Enter Blog Title" class="form-control input-height"  />
												</div>
											</div>
											<!--<div class="form-group row">
												<label class="control-label col-md-3">Date<span class="required"> * </span></label>
												<div class="col-md-5" id="dp1">
													<input class="form-control input-height" id="datepicker"  placeholder="Blog Date" name="txt_date" style="width: 504px;" type="text" autocomplete ="off" >
												</div>
											</div>-->
											<div class="form-group row">
												<label class="control-label col-md-3">Description <span class="required"> * </span></label>
												<div class="col-md-5">
													<textarea name="txt_description" placeholder="  Blog Content" id="txt_description" class="form-control-textarea" rows="5"></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Blog Image<span class="required"> * </span></label>
												<div class="col-md-5">
													<input type="file" name="txt_file" id="txt_file" class="form-control input-height" style="border-color: white;margin-left: -3%;" required>												
												</div>
											</div>
											<div class="form-actions">
												<div class="row">
													<div class="offset-md-4 col-md-4" style=''>
														<button type="submit" id="btn_submit" name="BtnBlogSubmit" class="btn btn-info m-r-20">Submit</button>
														<a href="view_blog.php" class="btn btn-default">Cancel</a>
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
<script src="assets/jquery-validation/js/jquery.validate.min.js"></script>
	<script src="assets/jquery-validation/js/additional-methods.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/bootstrap-switch/js/bootstrap-switch.min.js"></script>
	<!-- Common js-->
	<link rel="stylesheet" href="../css/jquery-ui.css" />
	<script src="../js/jquery-ui.js"></script>
	  <script type='text/javascript'>
	  jQuery(document).ready(function($){
			  $(function() {
				$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
			  });
		});
	  </script>
	<!-- //Calendar -->
	<script>
	  		$( function() {
	   			$( "#datepicker" ).datepicker({
	   				minDate: 0
	   			});
	  		});
	  	</script>
	<script src="assets/app.js"></script>
	<script src="assets/layout.js"></script>
	<script src="assets/theme-color.js"></script>
	<!-- Material-->
	<script src="assets/material/material.min.js"></script>
</body>
</html>
<script>
            $(document).ready(function () {
                $('#txtEmpPhone').keyup(function () {
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
						/* txt_title: {
							required: true,
						},
						txt_date: {
							required: true,
						},
						txt_description: {
							required: true,
						}, */
						txt_file: {
							required: true,
						},
					},
					messages: {
						/* txt_title: {
							required: "This field is required.",
						},
						txt_date: {
							required: "This field is required.",
						},
						txt_description: {
							required: "This field is required.",
						}, */
						txt_file: {
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