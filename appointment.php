<?php

/* ini_set('display_errors',1);
session_start();
//echo 'hii1';die;
$id ='';
include 'config/DB.php';
$db = new DB();
$gender_type='';
$Gender_Options = '<option value="" disabled="disabled">Select...</option>
				   <option value="Male"{{Male}}>Male</option>
				   <option value="Female"{{Female}}>Female</option>';$connect = $db->connect();
if (isset($_SESSION['u_id']) || isset($_SESSION['txt_email'])) {
	$id = $_SESSION['u_id'];
	$link ='';	
	$role = $_SESSION['role'];  
	if($role == 'Admin'){
		$link .='<a href="admin/index.php" type="submit" name="submitButton" class="my_account-sec" style="margin-left: 85%;color: white;font-size: 20px; border:1px solid #fff;padding: 8px 15px;"><i class="fa fa-user"></i> My Account <i class="arrow right"></i></a>';
	}else if($role != 'Admin'){
		$link .='<a href="user_dashbord.php" type="submit" name="submitButton" class="my_account-sec" style="margin-left: 85%;color: white;font-size: 20px; border:1px solid #fff;padding: 8px 15px;"><i class="fa fa-user"></i> My Account <i class="arrow right"></i></a>';
	}
	$tbl_name = 'tab_user';
	$where = 'u_id ='.$id;
    $col = array();
    $query_fetch = $db->sql_select($tbl_name, $col, $where, $order_by=null);
    if(count($query_fetch) > 0 ){ 
			$id             = $query_fetch[0]['u_id'];
			$txt_name       = $query_fetch[0]['txt_name'].' '.$query_fetch[0]['txt_lastname'];
			$txt_phone      = $query_fetch[0]['txt_phone'];
			$gender_type    = $query_fetch[0]['txt_gender'];
			$txt_image      = $query_fetch[0]['txt_image'];
			$txt_city       = $query_fetch[0]['txt_city'];
			$txt_state      = $query_fetch[0]['txt_state'];
			$txt_country    = $query_fetch[0]['txt_country'];
			$txt_pincode    = $query_fetch[0]['txt_pincode'];
			//	echo $gender_type;
			if ($gender_type == 'Male') {
				$Gender_Options = str_replace("{{Male}}", "selected", $Gender_Options);
			} else if ($gender_type == 'Female') {
				$Gender_Options = str_replace("{{Female}}", "selected", $Gender_Options);
			}
			$txt_age          = $query_fetch[0]['txt_age'];
			$txt_email        = $query_fetch[0]['txt_email'];
			$txt_address      = $query_fetch[0]['txt_address'];
	}
	
	$type_Options='';
	$type_Options .='<option value="facetoface">Face-to-face</option>
					<option value="videocall">Videocall</option>';		
$select='';
$selectCounselling ="select * from tab_counseling";		
$selectCounselling = $db->sql_select_join($selectCounselling);
if($selectCounselling){
	for($i=0;$i<count($selectCounselling);$i++){
		$cid    = $selectCounselling[$i]['id'];
		$time  = $selectCounselling[$i]['time'];
		$price = $selectCounselling[$i]['price'];
		
		$select .='<option value="'.$cid.'" data-id="'.$time.'">'.$time.'</option>';
	}
}

$selectPrice ='select * from tab_fix_payment';
$selectPrice = $db->sql_select_join($selectPrice);
if($selectPrice > 0){
	$price = $selectPrice[0]['payment'];
}			
 
}else{
	header('location:login.php');
} */
/* $success_msg='';
if(isset($_SESSION['msg_successfull'])){
		$success_msg ='<div class="alert alert-success alert-dismissible fade in message_hide" role="alert" style="background-color: #6e7bb5;width: 63%;margin-left: 		16%;margin-top: 1%;color:white;">
                                    <button type="button" style="background-color: #6e7bb5;border:none;padding:6px 15px 0px 0px;float:right;" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="color:#ffffff;font-size: 20px;">×</span>
                                    </button>
                                    <strong>Success! </strong>'.$_SESSION['msg_successfull'].'
                                </div>';
		unset($_SESSION['msg_successfull']);
	}
	if(isset($_SESSION['msg_errors'])){
		$success_msg ='<div class="alert alert-danger alert-dismissible fade in message_hide" role="alert" style="background-color: lightcoral;width: 63%;margin-left: 16%;margin-top: 1%;">
                                    <button type="button" style="background-color: lightcoral;" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Failed!</strong>'.$_SESSION['msg_errors'].'
                                </div>';
		unset($_SESSION['msg_errors']);
	} */
?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<head>
		<meta charset="UTF-8">
		<title>Appointment</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="https://fonts.googleapis.com/css?family=Spectral" rel="stylesheet">
		<link href="css/stylek.css" rel='stylesheet' type='text/css' media="all" />
		<link href="css/font-awesome.css" rel="stylesheet">
		<link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<link rel='stylesheet' id='bodhi-svgs-attachment-css'  href='wp-content/plugins/svg-support/css/svgs-attachment7752.css?ver=5.2.1' type='text/css' media='all' />
		<link rel='stylesheet' id='mungu_elements-css'  href='wp-content/plugins/themetonaddon/css/main7752.css?ver=5.2.1' type='text/css' media='all' />
		<link rel='stylesheet' id='uikit-css'  href='wp-content/themes/medio/vendors/uikit/css/uikit.min7752.css?ver=5.2.1' type='text/css' media='all' />
		<link rel='stylesheet' id='font-awesome-css'  href='wp-content/plugins/js_composer/assets/lib/bower/font-awesome/css/font-awesome.min7263.css?ver=5.4.4' type='text/css' media='all' />
		<link rel='stylesheet' id='animate-css'  href='wp-content/themes/medio/vendors/animate7752.css?ver=5.2.1' type='text/css' media='all' />
		<link rel='stylesheet' id='swiper-css'  href='wp-content/themes/medio/vendors/swiper/css/swiper.min7752.css?ver=5.2.1' type='text/css' media='all' />
		<link rel='stylesheet' id='jquery-ui-and-plus-css'  href='wp-content/themes/medio/vendors/jquery-ui-and-plus.min7752.css?ver=5.2.1' type='text/css' media='all' />
		<link rel='stylesheet' id='medio-stylesheet-css'  href='wp-content/themes/medio/style7752.css?ver=5.2.1' type='text/css' media='all' />
		<style id='medio-stylesheet-inline-css' type='text/css'>
		div#test_section {
		margin: 14px;}
		.vc_custom_1508824581122{padding-top: 36px !important;padding-right: 60px !important;padding-bottom: 30px !important;padding-left: 60px !important;background-color: #403678 !important;}.vc_custom_1509092891283{border-bottom-width: 1px !important;padding-bottom: 30px !important;border-bottom-color: #5b5096 !important;border-bottom-style: solid !important;}.vc_custom_1508823233184{margin-right: 0px !important;margin-left: 0px !important;}.vc_custom_1508823425668{padding-left: 0px !important;}.vc_custom_1508823431780{padding-right: 0px !important;}
		</style>
		<link rel='stylesheet' id='themeton-custom-stylesheet-css'  href='wp-content/uploads/sites/31/2019/04/medio7752.css?ver=5.2.1' type='text/css' media='all' />
		<link rel='stylesheet' id='js_composer_front-css'  href='wp-content/plugins/js_composer/assets/css/js_composer.min7263.css?ver=5.4.4' type='text/css' media='all' />		
		<style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1551541901651{margin-top: 46px !important;}.vc_custom_1554171066700{padding-top: 30px !important;padding-bottom: 50px !important;}.vc_custom_1551767028403{padding-right: 17px !important;}.vc_custom_1551766958397{border-left-width: 1px !important;padding-left: 20px !important;border-left-color: #b2bcbd !important;border-left-style: solid !important;}.vc_custom_1551534769676{margin-bottom: -7px !important;}.vc_custom_1552802309911{margin-top: 0px !important;margin-bottom: 0px !important;}.vc_custom_1551535277062{margin-bottom: -7px !important;}.vc_custom_1552802384924{margin-top: 0px !important;margin-bottom: 0px !important;}#header {background-color:#63599e;position:absolute;width:100%; z-index:9999;}.medio-responsive-menu{background:#63599e;}.themeton-menu > li > a {font-family:Poppins!important;font-weight:300!important;text-transform:uppercase!important;font-size:14px!important;line-height:14px!important;color:#ffffff!important;}.themeton-menu > li > a {padding-top:10px !important;padding-right:23px !important;padding-bottom:10px !important;padding-left:23px !important;}.themeton-menu > li > a:hover,.themeton-menu > li > a:focus {color:#e2e2e2!important;}.themeton-menu li ul li a {color:#beb6ea!important;}.themeton-menu > li ul li {}.themeton-menu > li ul li a:hover {color:#ffffff!important;}.themeton-menu > li ul li.current_page_item > a {color:#988aea!important;}.themeton-menu > li > .sub-menu, .themeton-menu > li > .sub-menu > li .sub-menu  {background-color:rgba(64,54,120,1)!important;}.themeton-menu > li ul li {border-color:rgba(91,80,150,1)!important;}.vc_custom_1554110925366{background-image: url(wp-content/uploads/sites/31/2017/06/bannerpic.png?id=1001) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554110862652{margin-left: -15px !important;}#page-title {}@media screen and (min-width: 980px) {
			.form-padding {
			  padding-left: 50px;
			  padding-right: 50px;
			}
		}@media screen and (max-width: 980px) {
			.form-padding {
			  margin-bottom: 45px;
			}
		}#scroll {
			box-shadow: none;
			padding:0;
		}#scroll:hover {
			box-shadow: none;
		}.vc_custom_1553482574309{padding-bottom: 0px !important;}.vc_custom_1552749412294{margin-top: 0px !important;padding-top: 0px !important;background-image: url(wp-content/uploads/sites/31/2017/06/Path-211a80.png?id=1281) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554787876299{background-color: #4f4780 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552321818900{margin-bottom: 0px !important;}.vc_custom_1554719683187{margin-top: 135px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552754605138{margin-left: -15px !important;}.vc_custom_1554786847685{margin-bottom: 0px !important;}.vc_custom_1552754523147{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1552754535828{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1554788006379{padding-top: 25px !important;}.vc_custom_1554789825528{padding-top: 20px !important;}.vc_custom_1554787620879{margin-bottom: 0px !important;}#footer {background-color:transparent;font-family:Poppins!important;font-weight:300!important;color:#8b99a6!important;}#footer, #footer p, #footer strong { color:#8b99a6;}#footer .widget .widget-title,#footer .widget .widgettitle {font-family:Poppins!important;font-weight:300!important;}
		
		.ui-datepicker {
			width: 345px;
			border-radius: 5px;
			background: -webkit-linear-gradient(135deg, #63599e 0, #9e87fb 100%)!important;
			padding: 20px;
			margin: 5px auto 0;
		}.ui-datepicker .ui-datepicker-header {
			position: relative;
			padding: .56em 0;
			background: none!important;
			text-transform: uppercase;
			padding-bottom: 5%;
		}.ui-datepicker .ui-datepicker-next {
			right: 9%!important;
			width: 4%;
			height: 21px;
			background: none;
			cursor: pointer;
		}.ui-datepicker .ui-datepicker-prev {
			left: 2px;
			display: none !important;
		}.ui-datepicker .ui-datepicker-next {
			right: 9% !important;
			width: 4%;
			height: 21px;
			background: none;
			cursor: pointer;
			display: none;
		}.ui-datepicker select.ui-datepicker-month, .ui-datepicker select.ui-datepicker-year {
			width: 140px;
		}input#doctor, input#phone,input#price, input#name, input#age {
			height: 40px;
			border: none;
			color: #fff;
			text-align: justify;
			outline: none;
			letter-spacing: 1px;
			font-size: 15px;
			font-weight: normal;
			background-color: rgba(255, 247, 247, 0.09);
			margin-bottom: 16px;
			padding: 0 15px;width: 92.2%;
			border-bottom: 1px solid #eee;
		}button, input, select, textarea{
			color:#fff;
		}
		.header{
			color:#fff;
		}@media only screen and (max-width: 768px) {
			a.my_account-sec {
				margin-left: 30% !important;
			}
		}
		.vc_column_container>.vc_column-inner {
    box-sizing: border-box;
    padding-left: 3px;
    padding-right: 20px;
    width: 100%;
}.required{
	color:coral;
}.help-block{
	color:coral;
}.card{
	width: 40%;
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem;
	padding-top: 15px;
	box-shadow: 0 1px 1px 0px #d7def4;
	    padding-bottom: 15px;
}
		</style>
		<link rel="icon" href="wp-content/uploads/sites/31/2017/06/Picture1.png" sizes="32x32" />
		<link rel="icon" href="wp-content/uploads/sites/31/2017/06/Picture1.png" sizes="192x192" />
		<style type="text/css" title="dynamic-css" class="options-output">.wrapper>.page-title{background-color:#3db8db;background-size:cover;background-image:url('wp-content/uploads/sites/2/2017/03/page-title-bg.html');}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1491199431562{margin-bottom: 0px !important;}</style><noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>
	</head>
	<body class="page-template-default page page-id-185 page-child parent-pageid-502 skin-medio wpb-js-composer js-comp-ver-5.4.4 vc_responsive">
    <!-- Loader -->
		<div id="the_loader" class="uk-flex uk-flex-center uk-flex-middle">
			<div class="loader_indicator"> 
				<svg width="16px" height="12px">
				  <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
				  <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
				</svg>
			</div>
		</div>    
		<!-- Wrapper -->
		<div class="wrapper uk-offcanvas-content">
			<!---------------Header Start---------------->
			<?php include 'header.php';?>
			<!---------------Header End------------------>
			<div class="uk-flex uk-child-width-1-2 medio-responsive-menu uk-hidden@m uk-padding-small">
				<div class="uk-flex uk-flex-middle">
					<a href="index.php" class="custom-logo-link" rel="home">
					<img src="wp-content/uploads/sites/31/2017/06/logooo.png" alt=""  class="custom-logo"></a>
				</div>
				<div class="uk-flex uk-flex-middle uk-flex-right">
					<a href="#" class="hamburger-menu uk-navbar-toggle uk-navbar-toggle-icon uk-icon"><!--offcanvas---->
						<svg width="20" height="20" viewBox="0 0 20 20" xmlns="">
							<rect y="9" width="20" height="2"></rect>
							<rect y="3" width="20" height="2"></rect>
							<rect y="15" width="20" height="2"></rect>
						</svg>
					</a>
				</div>
			</div>
			<section id="page-title">
				<div class="uk-container uk-position-relative">
					<div data-vc-full-width="true" data-vc-full-width-init="false" data-array='{"flex":"uk-flex","height":"180px","1":"1"}' data-row-themeton-option='yes' class=" uk-flex wpb_row vc_row-fluid vc_custom_1554110925366 vc_row-has-fill" style="height: 180px;">
						<div class="wpb_column vc_column_container vc_col-sm-12">
							<div class="vc_column-inner vc_custom_1554110862652">
								<div class="wpb_wrapper">
									<div data-array='{"flex":"uk-flex","container":"uk-container","height":"270px","valignment":"uk-flex-middle"}' data-row-themeton-option='yes' class=" uk-flex uk-container uk-flex-middle wpb_row vc_inner vc_row-fluid">
										<div data-array='{"custom_class":"uk-flex","valignment":"uk-flex-middle"}' data-column-themeton-option='yes' class="uk-flex wpb_column vc_column_container vc_col-sm-12">
											<div class="vc_column-inner ">
												<div class="wpb_wrapper" style="margin-top: -60px;">
													<ul class="uk-breadcrumb" prefix="">
														<li typeof="v:Breadcrumb"><a href="index.php" rel="v:url" property="v:title">Home</a></li>  <li typeof="v:Breadcrumb"><a href="appointment.php" rel="v:url" property="v:title">Appointment</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="vc_row-full-width vc_clearfix"></div>
				</div>
			</section>   
			<section class="uk-section" style="background-color: #fff;height: 335px;">
				<div class="center-container" style="padding: 0px 0px 0px 0px;background: #fff;">
					<div class="wpb_text_column wpb_content_element " >
						<div class="wpb_wrapper" style="text-align: -webkit-center;">
							<div class="card col-md-5">
								<p style="text-align: center"><strong style="color:black;">To book an appointment, please call this number <a href="tel:9928076901">  +91 9928076901</a></strong></p>
							</div>
						</div>
					</div>
					
				</div>
					<!--<div class="center-container">
						<?php echo $link; ?>
						<h1 style="font-size: 30px;line-height: 1;text-align: center" class="vc_custom_heading vc_custom_1491199431562" >Schedule an Appointment</h1>
						<div class="wpb_text_column wpb_content_element " >
							<div class="wpb_wrapper">
								<p style="text-align: center"><strong style="color: #f7f1f1;">Fill booking form below</strong></p>
							</div>
						</div>
						<div class="content-top">
							<p style="text-align: center;color:green;background-color:white;"><?php echo $success_msg; ?></p>
							<div class="content-w3ls">
								<form action="getrazorpaydetail.php" id="myform" method="post" autocomplete="off" enctype="multipart/form-data"> 
									<div class="form-w3ls">
										<div class="content-wthree1">
											<div class="grid-agileits1">
												<div class="form-control"> 
													<label class="header">Name <span class="required">*</span></label>
													<input type="text" id="name" name="txt_name" placeholder="" value="<?php echo $txt_name;?>" title="Please enter your Full Name" required autocomplete="off">
												</div>
												<div class="form-control">	
													<label class="header">Phone Number <span class="required">*</span></label>
													<input type="text" id="phone" name="txt_phone" maxlength="10" value="<?php echo $txt_phone;?>" placeholder="" title="Please enter your Phone Number" required autocomplete="off" style="" class="phone"><div id="errors"></div>
												</div>
												<div class="form-control"> 
													<label class="header">Age <span class="required">*</span></label>
													<input type="text" id="age" name="txt_age" value="<?php echo $txt_age;?>" maxlength="2" minlength="1" placeholder="" title="Please enter your Age" required autocomplete="off">
												</div>
												
												<div class="form-group row">
													<label class="header">Gender<span class="required"> * </span></label>
													<div class="col-md-5">
														<select class="form-control input-height" id="gender" name="txt_gender" style="color: white;" required>
															<?php echo $Gender_Options;?>
														</select>
													</div>
												</div>
												
												<div class="form-control">
													<label class="header">Services <span class="required">*</span></label>		
													<select class="form-control" id="txt_service" name="txt_service" required>
														<option value="" selected disabled>Service Type</option>
														<option>Endoscopy</option>
														<option>Dyspepsia</option>
														<option>Hepatitis-C</option>
														<option>Hepatitis-B-2</option>
														<option>Ulcerative-Colitis</option>
														<option>Chronic-Constipation</option>
														<option>Irritable-Bowel-Syndrome</option>
														<option>Gastro-Esophageal-Reflux-Disease</option>
														<option>Other</option>
													</select>
												</div>
												<div class="form-group row" style="">
													<label class="header">Boking Type<span class="required"> * </span></label>
													<div class="col-md-5">
														<select class="form-control input-height"  name="booking_type" id="booking_type">
															<option value="" selected disabled>Booking Type</option>
															<?php echo $type_Options;?>
														</select>
													</div>
													<div class="form-control w3-visit" style="margin: auto;"> 
														<label class="header">Address <span class="required">*</span></label>
														<textarea  name="txt_address" id="txt_address" placeholder="" value="<?php echo $txt_address;?>" title="Please enter your Address" rows="1" style="height: 20px;width: 93.2%;" required></textarea>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-w3ls">
										<div class="content-wthree1">
											<div class="grid-agileits1">
												<div class="form-control">	
													<label class="header">Email <span class="required">*</span></label>
													<input type="email" value="<?php echo $txt_email;?>" id="email" name="txt_email" placeholder="" title="Please enter a Valid Email Address" required="">
												</div>
												<div class="form-control">
													<label class="header">Preffered Doctor <span class="required">*</span></label>		
													<input type="text" id="doctor" name="txt_doctor" placeholder="" value="Dr.Harsh Udawat" required="" autocomplete="off">
												</div>
												<div class="grid-w3layouts1">
													<div class="form-control">
														<label class="header">Select date <span class="required">*</span></label>	
														<input type="text"  id="datepicker" class="txt_date" name="txt_date"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required>
													</div>
													<div class="gaps">
														<label class="header">Appointment Time <span class="required">*</span></label>
														<select class="form-control morning_timeslot_list" name="timeslot_list" id="morning_timeslot_list" style="color:#ffff;" autocomplete="off" required>
														<option value="" selected disabled>Appointment Time</option>
														</select>
													</div>
													
													<div class="form-group row">
														<label class="header">Counselling Type <span class="required">*</span></label>		
														<select class="form-control" id="counsellingType" name="counsellingType" required>
															<option value="" selected disabled>Counselling Type</option>
															<option value="normal">Normal</option>
															<option value="counselling">Counselling</option>
														</select>
													</div>
													<div class="form-group row" id="row_dim"> 
														<label class="header">Counselling Time <span class="required">*</span></label>		
														<select class="form-control" name="counsellingTime" id="counsellingTime">
															<option value="" selected disabled>Counselling Time</option>
															<?php echo $select; ?>
														</select>
													</div>
													<div class="form-group row"> 
														<label class="header">Counselling Price <span class="required">*</span></label>		
														<input type="text" id="price" class="price" name="price" placeholder="" value="" required autocomplete="off" >
													</div>
													<div class="form-control w3-visit" style="margin: auto;"> 
														<label class="header">Your Problem Description <span class="required">*</span></label>
														<textarea  name="txt_problm" rows="1" style="height: 20px;width: 93.2%;" placeholder="" title="Please enter your Problem Description" required></textarea>
													</div>
												</div>
											</div>
										</div>
									</div>
									<input type="hidden" id="user_id" name="user_id" value="<?php echo $id; ?>">
									<input type="hidden" id="txt_city" name="txt_city" value="<?php echo $txt_city; ?>">
									<input type="hidden" id="txt_pincode" name="txt_pincode" value="<?php echo $txt_pincode; ?>">
									<input type="hidden" id="txt_state" name="txt_state" value="<?php echo $txt_state; ?>">
									<input type="hidden" id="txt_country" name="txt_country" value="<?php echo $txt_country; ?>">
									<input type="submit" value="Make an appointment" name="submitButton" style="background-color:#63599e;width: 100%;padding-top: 2%;padding-bottom: 2%;">
								</form>
								<div class="clear"></div>
							</div>
						</div>	
					</div>--->
						<!--<div class="clear"></div>					
					</div>
				</div>-->
		</section>
		<style>h1, h2, h3, h4, h5, h6 {
			color: #ffff;
		}.uk-form-label {
			color: #ffff;
		}.price{
pointer-events:none;
background:grey;
}
		</style>
				
	</div><!-- end .wrapper -->
		<!-- Calendar -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script src="js/jquery-ui.js"></script>
<!-- //Calendar -->
<script type="text/javascript" src="js/wickedpicker.js"></script>
<script type='text/javascript' src='wp-content/plugins/contact-form-7/includes/js/scripts3c21.js?ver=5.1.1'></script>
<script type='text/javascript' src='wp-content/themes/medio/vendors/owl.carousel.min7752.js?ver=5.2.1'></script>
<script type='text/javascript' src='wp-content/themes/medio/vendors/jquery.owl-filter7752.js?ver=5.2.1'></script>
<script type='text/javascript' src='wp-content/themes/medio/vendors/uikit/js/uikit.min7752.js?ver=5.2.1'></script>
<script type='text/javascript' src='wp-content/themes/medio/vendors/uikit/js/uikit-icons.min7752.js?ver=5.2.1'></script>
<script type='text/javascript' src='wp-content/themes/medio/vendors/swiper/js/swiper.min7752.js?ver=5.2.1'></script>
<script type='text/javascript' src='wp-content/plugins/js_composer/assets/lib/waypoints/waypoints.min7263.js?ver=5.4.4'></script>
<script type='text/javascript' src='wp-content/themes/medio/vendors/jquery.counterup.min7752.js?ver=5.2.1'></script>
<script type='text/javascript' src='wp-includes/js/imagesloaded.min55a0.js?ver=3.2.0'></script>
<script type='text/javascript' src='wp-includes/js/masonry.mind617.js?ver=3.3.2'></script>
<script type='text/javascript' src='wp-content/themes/medio/vendors/svg-morpheus7752.js?ver=5.2.1'></script>
<script type='text/javascript' src='wp-content/plugins/js_composer/assets/lib/bower/isotope/dist/isotope.pkgd.min7263.js?ver=5.4.4'></script>
<script type='text/javascript' src='wp-content/themes/medio/vendors/anime.min7752.js?ver=5.2.1'></script>
<script type='text/javascript' src='wp-content/themes/medio/vendors/mo.min7752.js?ver=5.2.1'></script>
<script type='text/javascript' src='wp-includes/js/underscore.min4511.js?ver=1.8.3'></script>
<script type='text/javascript' src='wp-includes/js/wp-util.min7752.js?ver=5.2.1'></script>
<script type='text/javascript' src='wp-includes/js/backbone.min9632.js?ver=1.2.3'></script>
<script type='text/javascript' src='wp-includes/js/mediaelement/wp-playlist.min7752.js?ver=5.2.1'></script>

<script type='text/javascript' src='wp-content/themes/medio/js/scripts.min7752.js?ver=5.2.1'></script>
<script type='text/javascript' src='wp-content/themes/medio/includes/vc-extend/scripts7752.js?ver=5.2.1'></script>
<script type='text/javascript' src='wp-includes/js/wp-embed.min7752.js?ver=5.2.1'></script>
<script type='text/javascript' src='wp-content/plugins/js_composer/assets/js/dist/js_composer_front.min7263.js?ver=5.4.4'></script>


<!-----------Footer Start--------->
				
				<?php include 'footer.php'; ?>
				
			<!-----------Footer End----------->

	</body>
</html>
<script>
$(function() {
    $('#counsellingTime').change(function(){
        var id = $('#counsellingTime').val()
        var time = $(this).find(':selected').attr('data-id');//$('#counsellingTime').attr('data-id');
		/* if(time == '45 minute'){
			$('.price').val('2'); 
		}else if(time == '30 minute'){
			$('.price').val('1'); 
		} */
		$.ajax({
			type: 'post',
			url: 'ajax_getcounsellingPrice.php',
			data: {time:time,id:id},
			success: function (d) {
				if (d.data){
					$('.price').val(d.data); 
				}
			}
		}); 
    });
}); 
$(function() {
	 $('#row_dim').hide();
	 //$('#price').val(<?php echo $price;?>);
    $('#counsellingType').change(function(){
        if($('#counsellingType').val() == 'counselling') {
            $('#row_dim').show(); 
			$('#price').val('');
        }else {
            $('#row_dim').hide(); 
			$('#price').val(<?php echo $price;?>);
        } 
    });
});

jQuery(document).ready(function($){
	  $(function() {
		$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
	  });
});

jQuery(document).ready(function($){
$('.timepicker').wickedpicker({twentyFour: false});
});
	
$( function() {
	$( "#datepicker" ).datepicker({
		changeMonth: true,
		changeYear: true,
		showOtherMonths: true,
		selectOtherMonths: true,
		minDate: 0,
	});
});
			
setTimeout(function(){
 $('.message_hide').html('');
}, 5000);

jQuery(function($){
	$('.txt_date').click(function(){
		$('[id="datepicker"]').datepicker();
		$('[id="datepicker"]').change(function() {
			var date = $(this).datepicker("getDate");
			var newdate  = $.datepicker.formatDate('yy-mm-dd', date);
			$.ajax({
				type: 'post',
				url: 'ajax_get_timeslot.php',
				data: {m: 'timeslot_data',txt_date:newdate},
				success: function (d) {
					if (d.msg == 'Success') {
						$('.morning_timeslot_list').html(d.data); 
					}
				}
			});
		});	
	});
});     
</script>
<script src="../js/jquery.validate.js"></script>
<script>
 $(document).ready(function () {
				 $('#phone').keyup(function () {
                    this.value = this.value.replace(/[^0-9\.]/g, '');
                });
                $.validator.addMethod("customemail", function (value, element, params) {
                    if (value == '')
                        return true;
                    var ptrn = /^([a-zA-Z0-9_\.\-\'])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value);
                    return ptrn;
                });
				$.validator.addMethod("numchk", function (value, element, params) {
                    var ptrn = /^([0-9])+$/.test(value);
                    return ptrn;
                });
				$('#myform').validate({
					rules: {
						name: {
							required: true,
						},
						email: {
							required: true,
							customemail: true,
						},
						phone: {
							required: true,
							numchk: true,
							minlength: 10,
						},
						age: {
							required: true,
						},
						gender: {
							required: true,
						},
						datepicker: {
							required: true,
						},
						morning_timeslot_list: {
							required: true,
						},
						doctor: {
							required: true,
						},
						counsellingType: {
							required: true,
						},
						txt_problm: {
							required: true,
						},
						booking_type: {
							required: true,
						},
						txt_address: {
							required: true,
						},
						price: {
							required: true,
						},
						txt_service: {
							required: true,
						},
					},
					messages: {
						name: {
							required: "This field is required.",
						},
						email: {
							required: "This field is required.",
							customemail: "Please enter a valid email address",
						},
						phone: {
							required: "This field is required.",
							numchk: "Please enter Valid Mobile no.",
						}, 
						age: {
							required: "This field is required.",
						},
						gender: {
							required: "This field is required.",
						},
						datepicker: {
							required: "This field is required.",
						},
						morning_timeslot_list: {
							required: "This field is required.",
						},
						doctor: {
							required: "This field is required.",
						},
						txt_problm: {
							required: "This field is required.",
						},
						txt_address: {
							required: "This field is required.",
						},
						booking_type: {
							required: "This field is required.",
						},
						counsellingType: {
							required: "This field is required.",
						},
						price: {
							required: "This field is required.",
						}, 
						txt_service: {
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