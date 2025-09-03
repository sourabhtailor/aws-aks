<?php
ini_set('display_errors',1);
session_start();
include 'config/DB.php';
include 'config/google_config.php';
$db = new DB();
$connect = $db->connect();
/* if(!isset($_SESSION['access_token'])){
	header('Location: login.php');
	exit();
} */

$txt_pass ='';
$tbody11 ='';
$div_body = "";
date_default_timezone_set('Asia/Kolkata');
require_once 'dompdf/autoload.inc.php';
$filename = "Prescription.pdf";
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$image='';
if (isset($_SESSION['u_id']) || isset($_SESSION['txt_email'])) {
	$u_id = $_SESSION['u_id'];
	//echo $u_id;
	$img = 'http://drharshudawat.com/wp-content/uploads/sites/31/2017/06/profile.png'; 
	$tbl_name = 'tab_user';
	$where = "u_id = '$u_id'";
	$query_fetch1 = $db->sql_select($tbl_name, $col=array(), $where, $order_by = null);
	if ($query_fetch1){
		$txt_fullname = ucwords($query_fetch1[0]['txt_name']) . ' ' . ucwords($query_fetch1[0]['txt_lastname']);
		//echo $txt_fullname;
		$txt_email   = $query_fetch1[0]['txt_email'];
		$oauth_uid   = $query_fetch1[0]['oauth_uid'];
		$txt_age1    = $query_fetch1[0]['txt_age'];
		$txt_phone   = $query_fetch1[0]['txt_phone'];
		$txt_pincode = $query_fetch1[0]['txt_pincode'];
		$txt_city    = ucwords($query_fetch1[0]['txt_city']);
		$txt_state   = ucwords($query_fetch1[0]['txt_state']);;
		$txt_address = ucwords($query_fetch1[0]['txt_address']);
		$txt_image   = $query_fetch1[0]['txt_image']; 
		$txt_pass    = $query_fetch1[0]['txt_pass'];
		$user_id     = $query_fetch1[0]['u_id'];
		if($txt_image != ''){
			$image .='<img class="userImg" src="../images/upload/'.$txt_image.'" style="width: 116px;height: 116px;border-radius: 350px;    margin-bottom: 23%">   <span style="font-size:2.5rem;color: #fafaff;font-weight:500;font-family: Heebo,sans-serif;"></span>';
		}else{
			$image .='<img class="userImg" src="'. $img.'" style="width: 100px;height: 90px;border-radius: 350px;    margin-bottom: 23%">   <span style="font-size:2.5rem;color: #fafaff;font-weight:500;font-family: Heebo,sans-serif;"></span>';
		}
		
	}
		
		//////////////////////////////booking tables data///////////////////////////////
		
		 $video='';
		$tbl_name_service = 'tab_service_booking';
		$where = "txt_u_id ='$user_id'";
		$query_fetch_data = $db->sql_select($tbl_name_service, $col = array(), $where, $order_by = null);
		if($query_fetch_data){
			$c = 1;
			for ($i = 0; $i < count($query_fetch_data); $i++) {
				$book_id = $query_fetch_data[$i]['book_id'];
				$txt_service_type = $query_fetch_data[$i]['txt_problm_detail'];
				$txt_doctor_name = $query_fetch_data[$i]['txt_doctor_name'];
				$channel_id = $query_fetch_data[$i]['channel_id'];
				$morning_availability         = $query_fetch_data[$i]['morning_time_slot'];
				if($morning_availability == ''){
					$morning_availability	  = '';
				}else{
					$morning_availability	  = $query_fetch_data[$i]['morning_time_slot'];
					$db_time_new  = $query_fetch_data[$i]['morning_time_slot'];

				}
				$evening_availability         = $query_fetch_data[$i]['evening_time_slot'];
				if($evening_availability == ''){
					$evening_availability	  = '';
				}else{
					$evening_availability	  = $query_fetch_data[$i]['evening_time_slot'];
					$db_time_new              = $query_fetch_data[$i]['evening_time_slot'];
				}
				$txt_date                  = $query_fetch_data[$i]['txt_start_date'];
				$created_at                = date('d-m-Y', strtotime($txt_date));
				
				/********************************/
				$video='';
				$today = date('Y-m-d');
				//$db_time = $db_time_new;//'02:35 PM';
				$db_date 	= $query_fetch_data[$i]['txt_start_date']; //'2020-06-22';
				$startTime 	= date('h:i A', strtotime($db_date . $db_time_new));
				$fmin_less 	= date('h:i A', strtotime('-5 minutes', strtotime($startTime)));
				$fmin_grt 	= date('h:i A', strtotime('+5 minutes', strtotime($startTime)));
				if($db_date == $today){
					$c_time = date('h:i A');
					if($c_time != $startTime && $c_time < $fmin_less){ //$c_time > $fmin_less AND 
						 $video .='';
					}else if($c_time != $startTime AND $c_time < $startTime){
						$video .='<a href="file_video.php?channel_id='.$channel_id.'&&bookid='.base64_encode($book_id).'" class="btn btn-info btn-xs" title="Connect" style=""><i class="material-icons" style="font-size:initial;">&#xe04b;</i></a>';
					}else if($c_time == $startTime){
						$video .='<a href="file_video.php?channel_id='.$channel_id.'&&bookid='.base64_encode($book_id).'" class="btn btn-info btn-xs" title="Connect" style=""><i class="material-icons" style="font-size:initial;">&#xe04b;</i></a>';
					}else if($c_time < $fmin_grt){
						$video .='<a href="file_video.php?channel_id='.$channel_id.'&&bookid='.base64_encode($book_id).'" class="btn btn-info btn-xs" title="Connect" style=""><i class="material-icons" style="font-size:initial;">&#xe04b;</i></a>';
					}else{
						$video .= ''; 
					}
				}else{
					
				}
				if(!empty($video)){
					$video = $video;
				}else{
					$video ='';
				}
				
				/********************************/
				
				$txt_payment = $query_fetch_data[$i]['txt_payment'];
				$div_body .="<tr style='font-size: 14px;'>
								<td>".$book_id."</td>
								<td>".ucwords($txt_service_type)."</td>
								<td>".ucwords($txt_doctor_name)."</td>
								<td>".$created_at."</td>
								<td>".$evening_availability.''.$morning_availability."</td>
								<td>".$video."</td>
								<!--<td></td>-->
							</tr>"; 
				$c++;	
			}//for loop 	
		}//if condition
		
		//////////////////////////////mediccation_prescription tables data///////////////////////////////
		
		 $tbody11='';
		$tbl_name = 'tab_medicine_prescription';
		$where = 'user_id='.$user_id;
		$col = array();
		$order_by = "id DESC";
		$query_fetch2 = $db->sql_select($tbl_name, $col, $where, $order_by);
		//print_r($query_fetch2);
		if(count($query_fetch2) > 0 ){
			for($i=0; $i < count($query_fetch2); $i++){
				$txt_date    				  = $query_fetch2[$i]['txt_start_date'];
				$id    				          = $query_fetch2[$i]['id'];
				$txt_new_date                 = date('d-m-Y', strtotime($txt_date));
				$txt_medicine_duration        = $query_fetch2[$i]['txt_medicine_duration'];
				$txt_medicine_duration_day    = $query_fetch2[$i]['txt_medicine_duration_day'];
				$txt_medicine_name            = ucwords($query_fetch2[$i]['txt_medicine_name']);
				$txt_test                     = $query_fetch2[$i]['txt_test'];
				$tbody11 .= '<tr style="font-size:14px;!important">
							<td >'.$txt_new_date.'</td>
							<td>'.$txt_medicine_name.'</td>
							<td>'.$txt_test.'</td>
							<td><a href="prescription_pdf.php?uid='.$id.'" target="_blank" class="btn btn-primary btn_query" style="padding: 3px 6px 1px 6px;"><span class="fa fa-download"></span></a></td>
						</tr>';
			}	
		} 	


////////////////////////////////////////////////////////////////////////////		
	}else{
		header('Location: login.php');
	}
	$success = '';
	if(isset($_SESSION['msg1'])){
		$success ='<div style="font-family:hind;color:#47e808;font-size: 18px;margin-left: 48%;"><strong>Success!</strong>  '.$_SESSION['msg1'].'</div>';unset($_SESSION['msg1']);
	}if(isset($_SESSION['error1'])){
		$success ='<div style="font-family:hind;color:#e83c08;font-size: 18px;margin-left: 48%;"><strong>Success!</strong>  '.$_SESSION['msg1'].'</div>';;unset($_SESSION['error1']);
	} 

?>



<!DOCTYPE html>
<html lang="en-US" class="no-js">

	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
			<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="icon" href="wp-content/uploads/sites/31/2017/06/Picture1.png" sizes="32x32" />
	<link rel="icon" href="wp-content/uploads/sites/31/2017/06/Picture1.png" sizes="192x192" />
	<link rel='stylesheet' id='wp-block-library-css'  href='wp-includes/css/dist/block-library/style.min7752.css?ver=5.2.1' type='text/css' media='all' />
	<link rel='stylesheet' id='contact-form-7-css'  href='wp-content/plugins/contact-form-7/includes/css/styles3c21.css?ver=5.1.1' type='text/css' media='all' />
	<link rel='stylesheet' id='rs-plugin-settings-css'  href='wp-content/plugins/revslider/public/assets/css/settings23da.css?ver=5.4.8' type='text/css' media='all' />
	<link rel='stylesheet' href='css/dashbord.css' type='text/css' media='all' />
	<link rel='stylesheet' id='bodhi-svgs-attachment-css'  href='wp-content/plugins/svg-support/css/svgs-attachment7752.css?ver=5.2.1' type='text/css' media='all' />
	<link rel='stylesheet' id='mungu_elements-css'  href='wp-content/plugins/themetonaddon/css/main7752.css?ver=5.2.1' type='text/css' media='all' />
	<link rel='stylesheet' id='uikit-css'  href='wp-content/themes/medio/vendors/uikit/css/uikit.min7752.css?ver=5.2.1' type='text/css' media='all' />
	<link rel='stylesheet' id='font-awesome-css'  href='wp-content/plugins/js_composer/assets/lib/bower/font-awesome/css/font-awesome.min7263.css?ver=5.4.4' type='text/css' media='all' />
	<link rel='stylesheet' id='animate-css'  href='wp-content/themes/medio/vendors/animate7752.css?ver=5.2.1' type='text/css' media='all' />
	<link rel='stylesheet' id='swiper-css'  href='wp-content/themes/medio/vendors/swiper/css/swiper.min7752.css?ver=5.2.1' type='text/css' media='all' />
	<link rel='stylesheet' id='jquery-ui-and-plus-css'  href='wp-content/themes/medio/vendors/jquery-ui-and-plus.min7752.css?ver=5.2.1' type='text/css' media='all' />
	<link rel='stylesheet' id='medio-stylesheet-css'  href='wp-content/themes/medio/style7752.css?ver=5.2.1' type='text/css' media='all' />
	<link rel='stylesheet' id='themeton-custom-stylesheet-css'  href='wp-content/uploads/sites/31/2019/04/medio7752.css?ver=5.2.1' type='text/css' media='all' />
	<link rel='stylesheet' id='js_composer_front-css'  href='wp-content/plugins/js_composer/assets/css/js_composer.min7263.css?ver=5.4.4' type='text/css' media='all' />
	<style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1551541901651{margin-top: 46px !important;}.vc_custom_1554171066700{padding-top: 30px !important;padding-bottom: 50px !important;}.vc_custom_1551767028403{padding-right: 15px !important;}.vc_custom_1551766958397{border-left-width: 1px !important;padding-left: 20px !important;border-left-color: #b2bcbd !important;border-left-style: solid !important;}.vc_custom_1551534769676{margin-bottom: 6px !important;}.vc_custom_1552802309911{margin-top: 0px !important;margin-bottom: 0px !important;}.vc_custom_1551535277062{margin-bottom: 6px !important;}.vc_custom_1552802384924{margin-top: 0px !important;margin-bottom: 0px !important;}#header {background-color:#63599e;position:absolute;width:100%; z-index:9999;}.medio-responsive-menu{background:#63599e;}.themeton-menu > li > a {font-family:Poppins!important;font-weight:300!important;text-transform:uppercase!important;font-size:14px!important;line-height:14px!important;color:#ffffff!important;}.themeton-menu > li > a {padding-top:10px !important;padding-right:23px !important;padding-bottom:10px !important;padding-left:23px !important;}.themeton-menu > li > a:hover,.themeton-menu > li > a:focus {color:#e2e2e2!important;}.themeton-menu li ul li a {color:#beb6ea!important;}.themeton-menu > li ul li {}.themeton-menu > li ul li a:hover {color:#ffffff!important;}.themeton-menu > li ul li.current_page_item > a {color:#988aea!important;}.themeton-menu > li > .sub-menu, .themeton-menu > li > .sub-menu > li .sub-menu  {background-color:rgba(64,54,120,1)!important;}.themeton-menu > li ul li {border-color:rgba(91,80,150,1)!important;}.vc_custom_1554110925366{background-image: url(wp-content/uploads/sites/31/2017/06/bannerpic.png?id=1001) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554110862652{margin-left: -15px !important;}#page-title {}@media screen and (min-width: 980px) {
		.form-padding {
		  padding-left: 50px;
		  padding-right: 50px;
		}
	}
	.vc_column_container>.vc_column-inner {
    box-sizing: border-box;
    padding-left: 3px;
    padding-right: 20px;
    width: 100%;
}
	div#test_section {
		margin-right: 8px;
		//margin-right: -13px;
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
	.profile_hr{
		width: 118%;
		margin-left: -5%;
	}.doctor_support_row{ 
	width:116%;   
	margin-bottom: -35%;
	}.doctor_form{
		margin-left: -6%;
		width: 30%;
	}.doctor_info{
		    color: #424141;
    margin-left: 12%;
	font-size: 11pt;
	}.doctor_info_2{
		    color: #424141;
    margin-left: 8%;
	}.profile_section{
		width:59%;
	}.doctor_info_3{
	float: right;
	color: #424141;
	margin-left: 26%;
	margin-top: -4%;
	font-size: 11pt;
	font-family: -webkit-body
	}.info_profile{
	margin-left: -6%;
	width: 26%;
	}.input_boxes{
		width:40%;
	}.profile_row{
		width:116%;
	}.profile_section{
		margin-top:-18px !important;
		margin-left:1%;
	}
	.doctor_info_3{
	color: #424141;
	}.table_appointment{
		width: 118%;
		margin-left: -5%;
	}.save_btn{
		margin-top: -4%;background-color:#63599e;color:white;width: 70%;margin-left: 23%;
	}@media only screen and (min-width: 992px) {
	.col-md-6 {
		width: auto !important;
	}
		}@media only screen and (max-width: 768px) {
  /* For mobile phones: */
  
  .profile_section {
    margin-top: 10px !important;
}
   a.btn.btn-info.btn-xs {
    padding: 2px 4px 0px 4px;
}
  .save_btn{
		margin-top: 0%;background-color:#63599e;color:white;width: 70%;margin-left: 13%;
	}.doctor_info_4{
	color: #424141c4;
	}.table_appointment{
		width: 105%;
		margin-left: 0;
	}.doctor_info_3{
	float: right;
	color: #424141c4;
    margin-left: 4%;
	margin-top: 0;
	font-size: 11pt;
	margin-bottom:20px;
	}.profile_hr{	
		width: 100%;
		margin-left: -5%;
	}.profile_section{ 
		width:74%;
	}.doctor_info_2{
	 color: #424141c4;
    margin-left: 4%;
	}.doctor_info{
	 color: #424141c4;
    margin-left: 0%;
	font-size:10pt;
	}.doctor_form{
		margin-left:0;
		width: 30%;
	}.doctor_support_row{ 
	width:100%;   
	margin-bottom: 0;
	}#vertical_tab_nav div {
	  min-height:100%;
	  padding-left:1% !important;
	  margin:0;
	}#vertical_tab_nav h3{
	  margin:0 !important;
	  	margin-top:3% !important;
	}.info_profile{
	width:60% !important;
	}.input_boxes{
		width:100%;
	}.profile_row{
		width:100%;
	}table{
		font-size:10px;
	}.btn_query{
		font-size:7px !important;
		padding:1px !important;
	} 

	</style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<style>
		p.pclass{
		margin-top: 20px!important;
		margin-bottom: 0px!important;
	}ul.dropdown {
    margin-top:0px!important;
}
</style>
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
					<a href="#" class="hamburger-menu uk-navbar-toggle uk-navbar-toggle-icon uk-icon"><!----offcanvas---->
						<svg width="20" height="20" viewBox="0 0 20 20" xmlns="https://www.w3.org/2000/svg">
							<rect y="9" width="20" height="2"></rect>
							<rect y="3" width="20" height="2"></rect>
							<rect y="15" width="20" height="2"></rect>
						</svg>
					</a>
				</div>
			</div>
			<section id="page-title">
				<div class="uk-container uk-position-relative">
					<div data-vc-full-width="true" data-vc-full-width-init="false" data-array='{"flex":"uk-flex","height":"270px","1":"1"}' data-row-themeton-option='yes' class=" uk-flex wpb_row vc_row-fluid vc_custom_1554110925366 vc_row-has-fill">
						<div class="wpb_column vc_column_container vc_col-sm-12">
							<div class="vc_column-inner vc_custom_1554110862652">
								<div class="wpb_wrapper">
									<div data-array='{"flex":"uk-flex","container":"uk-container","height":"270px","valignment":"uk-flex-middle"}' data-row-themeton-option='yes' class=" uk-flex uk-container uk-flex-middle wpb_row vc_inner vc_row-fluid">
										<div data-array='{"custom_class":"uk-flex","valignment":"uk-flex-middle"}' data-column-themeton-option='yes' class="uk-flex wpb_column vc_column_container vc_col-sm-12">
											<div class="vc_column-inner ">
												<div class="wpb_wrapper">
													<ul class="uk-breadcrumb" prefix="" style="padding: 10px 20px;">
														<li typeof="v:Breadcrumb"><a href="index.php" rel="v:url" property="v:title" style="font-size: 14px;">Home</a></li>  <li typeof="v:Breadcrumb"><a href="user_dashbord.php" rel="v:url" property="v:title" style="font-size: 14px;">Dashboard</a></li>
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
			<!----<div id="offcanvas-nav">
				<div class="uk-offcanvas-bar">
					<a href="index.php" class="custom-logo-link" rel="home">
						<img src="wp-content/uploads/sites/31/2017/06/medio-logo-white%403x.png" alt="Medio Hospital"  class="custom-logo">
					</a>            
					<ul id="menu-footer-navigation" class="uk-nav-default uk-nav-parent-icon uk-nav uk-animation-slide-left primary-menu-collapsible">
						<li id="menu-item-736" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-736"><a href="index.php">Home</a></li>
						<li id="menu-item-734" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-734"><a href="gallery.php">Gallery</a></li>
						<li id="menu-item-739" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-739"><a href="about.php">About Us</a></li>
						<li id="menu-item-761" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-761"><a href="testimonials.php">Testimonials</a></li>
						<li id="menu-item-741" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-741"><a href="contact.php">Contact Us</a></li>
					</ul>       
				</div>
			</div>	--->
			<section class="uk-section" style="padding-top: 140px;">
				<div class="uk-container uk-container-default uk-position-relative"  style="padding-bottom:6%;">
					<div class="uk-grid uk-flex uk-flex-center">
						<div class="uk-width-1-1@s">
							<article class="medio-page-single uk-article post-185 page type-page status-publish hentry">
								<div class="vc_row wpb_row vc_row-fluid" style="margin-top: -6%;">
									<div class="wpb_column vc_column_container vc_col-sm-12" style="width:63%"><?php echo $success; ?>
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div id="vertical_tab_nav" style="width: 213%;font-family: Poppins!important;">
													<ul sty="font-size:11pt;">
														<li class="selected"><a href="user_dashbord.php">USER PROFILE</a></li>
														<li><a href="user_dashbord.php">EDIT PROFILE</a></li>
														<li><a href="user_dashbord.php">BOOKING HISTORY</a></li>
														<li><a href="user_dashbord.php">DOCTOR SUPPORT</a></li>
														<li><a href="user_dashbord.php">PRESCRIPTION HISTORY</a></li>
														<!--<li><a href="logout.php">LOGOUT</a></li> -->
													</ul><br>
													<a style="border-radius: 8px 0 0 15px;float: left;margin-top:220px;margin-bottom:1em;    padding: 14px 186px 10px 88px;color: #fff;border-radius: 0%;margin-left: -331px;text-decoration: none;background-color:#63599e;"href="logout.php">LOGOUT</a>
													<div id="vertical_tab_nav kk " class="profile_section" style=" ">
														<article style="margin:2px;">
															<h3 style="font-size: 16px;margin-left: -5%;margin-top: 4%;text-transform: uppercase!important;">User-Profile</h3>
															<hr class="profile_hr" style="border-top: 1px solid #8d5fd4;"/>
															<div class="row profile_row" >
																<div class="form-group col-md-6 info_profile" style="">
																	
																	<div id="userInfo" class="pos-rel" style="display: inline-block;margin-top: 10px;width: 148px;">
																		<?php echo $image; ?>
																		<p style="margin-left: 7px;font-size: 16px;margin-top: -50px;"><?php echo $txt_fullname; ?></p>
																	</div> 
																	
																</div>																	
																<div class="form-group col-md-6 input_boxes" >
																	<label for="txt_name" style="font-size:14px;font-family: -webkit-body;font-weight: initial;">Name:</label>
																	<input type="text" class="form-control" id="txt_name" value="<?php echo $txt_fullname; ?>" style="opacity: initial;color: black;font-size:12px;" readonly>
																	
																	<label for="Country" style="font-size:14px;font-family: -webkit-body;font-weight: initial;">Age:</label>
																	<input type="text" class="form-control" id="Country" style="opacity: initial;color: black;font-size:12px;" value="<?php echo $txt_age1;?>" readonly>
																  
																	<label for="address1" style="font-size:14px;font-family: -webkit-body;font-weight: initial;">Postal Address:</label>
																	<input type="text" class="form-control" id="address1" value="<?php echo $txt_address; ?>" style="opacity: initial;color: black;font-size:12px;" readonly>
																	 
																	<label for="state1" style="font-size:14px;font-family: -webkit-body;font-weight: initial;">State:</label>
																	<input type="text" class="form-control" id="state1" value="<?php echo $txt_state; ?>" style="opacity: initial;color: black;font-size:12px;" readonly>
																</div>
																<div class="form-group col-md-6 input_boxes" >
																	<label for="txt_email" style="font-size:14px;font-family: -webkit-body;font-weight: initial;">Email Address:</label>
																	<input type="email" class="form-control" id="txt_email" value="<?php echo $txt_email; ?>" style="opacity: initial;color: black;font-size:12px;" readonly></label>
																	
																	<label for="txt_phone" style="font-size:14px;font-family: -webkit-body;font-weight: initial;">Phone:</label>
																	<input type="text" class="form-control" id="txt_phone" value="<?php echo $txt_phone; ?>" style="opacity: initial;color: black;font-size:12px;" readonly>
																	
																  
																	<label for="City" style="font-size:14px;font-family: -webkit-body;font-weight: initial;">City:</label>
																	<input type="text" class="form-control" id="City" value="<?php echo $txt_city; ?>" style="opacity:initial;color: black;font-size:12px;" readonly>
																	
																	<label for="Pincode1" style="font-size:14px;font-family: -webkit-body;font-weight: initial;">Pin Code:</label>
																	<input type="text" class="form-control" id="Pincode1" value="<?php echo $txt_pincode; ?>" style="opacity: initial;color: black;" readonly>
																</div>
															</div>
														</article>
														<article>
															<h3 style="font-size: 16px;margin-left: -5%;margin-top: 4%;text-transform: uppercase!important;">Edit profile</h3>
															<hr style="width: 118%;margin-left: -5%;border-top: 1px solid #8d5fd4;" />
															<form action="script_edit_profile.php" method="post" enctype="multipart/form-data" name="edit-info" id="edit-info">
																<!--<div class="row">-->
																<div class="form-group col-6 info_profile" >
																	<div id="userInfo" class="pos-rel" style="display: inline-block;margin-top: 10px;">
																		<?php echo $image; ?>
																		<input type="file" name="filename" value="" class="form-control" id="file">
																	</div>
																</div>																	
																<div class="form-group col-6 input_boxes" >
																	<label for="name" style="font-size:10pt;font-family: -webkit-body;font-weight: initial;">Name:</label>
																	<input type="text" name="name" class="form-control" id="name" value="<?php echo $txt_fullname; ?>">
																	
																	<label for="phone" style="font-size:10pt;font-family: -webkit-body;font-weight: initial;">Phone:</label>
																	<input type="text" name="phone" class="form-control" id="phone" value="<?php echo $txt_phone; ?>">
																	
																	<label for="age" style="font-size:10pt;font-family: -webkit-body;font-weight: initial;"> Age:</label>
																	<input type="text" name="age" class="form-control" id="age" value="<?php echo $txt_age1; ?>"> 
																	
																	<label for="txt_city" style="font-size:10pt;font-family: -webkit-body;font-weight: initial;">City:</label>
																	<input type="text" name="txt_city" class="form-control" id="txt_city" value="<?php echo $txt_city; ?>">
																	
																	<label for="address" style="font-size:10pt;font-family: -webkit-body;font-weight: initial;"> Address:</label>
																	<input type="text" name="address" class="form-control" id="address" value="<?php echo $txt_address; ?>">
																</div>
																<div class="form-group col-6 input_boxes" >
																	<label for="email" style="font-size:10pt;font-family: -webkit-body;font-weight: initial;">Email Address:</label>
																	<input type="email" name="email" class="form-control" id="email" value="<?php echo $txt_email; ?>">
																	
																	<?php
																	$pass='';
																	if($txt_pass != ''){
																		echo $pass ='<label for="pwd" style="font-size:10pt;font-family: -webkit-body;font-weight: initial;">Password:</label>
																		<input type="password" class="form-control"  id="pass1" name="pass" value="<?php echo $txt_pass; ?>" disabled/>';
																		
																	}else{
																		echo $pass ='<label for="pwd" style="font-size:10pt;font-family: -webkit-body;font-weight: initial;">Password:</label>
																		<input type="password" class="form-control"  id="pass" name="pass" placeholder="Enter Password *" value="" required />';
																	}
																	?>
																	<!--<div class="form-group">
																		<input type="password" class="form-control"  id="pass" name="pass" placeholder="Enter Password *" value="<?php echo $txt_pass; ?>" required />
																	</div>-->
																	
																	<label for="txt_state" style="font-size:10pt;font-family: -webkit-body;font-weight: initial;">State:</label>
																	<input type="text" name="txt_state" class="form-control" id="txt_state" value="<?php echo $txt_state; ?>">
																	
																	<label for="Pincode" style="font-size:10pt;font-family: -webkit-body;font-weight: initial;">Pin Code:</label>
																	<input type="text" name="pincode" class="form-control" id="Pincode" value="<?php echo $txt_pincode; ?>">
																	
																	 
																	<!--<input type="file" name="file" value="name" class="form-control" id="file">-->
																</div>
																
																<input type="hidden" name="txt_uid" value="<?php echo $user_id;?>">
																<button type="submit" class="btn btn-default save_btn" id="btn_submit" name="btnSubmit" style="">Save</button>
															</form>  
														</article>
														<article>
															<h3 style="font-size: 16px;margin-left: -5%;margin-top: 4%;text-transform: uppercase!important;">Appointment History</h3>
															<hr class="profile_hr" style="border-top: 1px solid #8d5fd4;"/>
															<table class="kv table_appointment" style="">
																<thead>
																	<tr style="font-size: 16px;">
																		<th class="kv" style="font-size: 14px;margin-left: -2%;text-align: center;">Booking ID</th>
																		<th class="kv" style="font-size: 14px;margin-left: -2%;margin-top: -1%;text-align: center;">Service Type</th>
																		<th class="kv" style="font-size: 14px;margin-left: -2%;margin-top: -1%;text-align: center;">Doctor Name</th>
																		<th class="kv" style="font-size: 14px;margin-left: -2%;margin-top: -1%;text-align: center;">Date &amp; Time</th>
																		<th class="kv" style="font-size: 14px;margin-left: -2%;margin-top: -1%;text-align: center;">Booking Time</th>
																		<th class="kv" style="font-size: 14px;margin-left: -2%;margin-top: -1%;text-align: center;">Video Call Status</th>
																	</tr>
																</thead>
																<tbody>
																		<?php echo $div_body; ?>
																</tbody>
															</table>
														</article>
														<article>
															<h3 style="font-size: 16px;margin-left: -5%;margin-top: 4%;text-transform: uppercase!important;">Doctor Support</h3>
															<hr class="profile_hr" style="border-top: 1px solid #8d5fd4;"/>
															<div class="row doctor_support_row" >
																<div class="form-group col-6 doctor_form" style="">
																	<div id="userInfo" class="pos-rel" style="display: inline-block;margin-top: 10px;">
																		<img class="userImg" src="wp-content/uploads/sites/31/2017/06/harsh-udawat.jpg" style="width: 143px;height: 143px;border-radius: 350px;">   <span style="font-size:2.5rem;color: #fafaff;font-weight:500;font-family: Heebo,sans-serif;"></span>
																		<h4><i class="fa fa-user-md" aria-hidden="true"></i>
																		<a href="about.php" title="See Profile" style="font-family: -webkit-body;font-size: 11pt;">Dr. Harsh Udwat</a></h4>
																		<p style="margin: 0px 0px 0px 1px;font-size: 11pt;text-align:justify;font-family: -webkit-body;">DM Gastroenterology, MD General Medicine Gastroenterologist</p>
																		<p style="margin: 0px 0px 0px 1px;font-size:11pt">14 Years Experience Overall</p>
																	</div>
																	
																</div>																	
																<div class="form-group col-6" style="width:76%;">
																	<ul class="list-unstyled info-meet" style="width:107%;padding-left: 0;margin-top: 0;font-family: lato,sans-serif;letter-spacing: .4px;margin-bottom: 10px;list-style: none;">
																		<li style="padding-left: 0;list-style: none;padding: 20px 5px 15px;    margin-bottom: -21px;font-size: x-large;margin-top: -3%;">Udwat Gastroenterologist Clinic<p></li>
																		<li style="margin-right: 15px;padding-left: 0;list-style: none;margin-top:3%;padding: 20px 5px 15px;    margin-bottom: -21px;margin-top: -4%;">
																			<p style="display: block;margin-block-start: 1em;margin-block-end: 1em;margin-inline-start: 0px;margin-inline-end: 0px;line-height: 20px;text-transform: capitalize;font-size:11pt;font-family: -webkit-body">Contact No:
																				<span class="doctor_info" style="font-family: -webkit-body">0141-4156703</span>
																			</p>
																		</li>
																		<li style="margin-right: 15px;padding-left: 0;list-style: none;padding: 20px 5px 15px;    margin-bottom: -21px;">
																			<p style="display: block;margin-block-start: 1em;margin-block-end: 1em;margin-inline-start: 0px;margin-inline-end: 0px;line-height: 20px;font-size:11pt;font-family: -webkit-body;"> Email Address:
																				<span class="doctor_info_2"  style="margin-top: -4%;font-size: 11pt;font-family: -webkit-body
																				">harshudawat@gmail.com</span>
																			</p>
																		</li>
																		
																		<li style="margin-right: 15px;padding-left: 0;list-style: none;padding: 20px 5px 15px;    margin-bottom: -21px;">
																			<p style="display: block;margin-block-start: 1em;margin-block-end: 1em;margin-inline-start: 0px;margin-inline-end: 0px;line-height: 20px;text-transform: capitalize;font-size:11pt;font-family: -webkit-body">Expertise: 
																				<span class="price doctor_info_3" style="">Therapeutic Endoscopy,Endoscopic Ultrasound,IBD And Alcoholic Disease</span>
																			</p>
																		</li>
																		<li style="margin-right: 15px;padding-left: 0;list-style: none;padding: 20px 5px 15px;    margin-bottom: -21px;">
																			<p style="display: block;margin-block-start: 1em;margin-inline-start: 0px;margin-inline-end: 0px;line-height: 20px;text-transform: capitalize;font-size:11pt;font-family: -webkit-body">doctor's office: 
																				<span class="doctor_info_3"style="">A-111, Shri Ram Marg, Shyam Nagar, Landmark: Near Udawat Eye Hospital, Jaipur</span>
																			</p>
																		</li>
																		<li style="margin-right: 15px;padding-left: 0;list-style: none;padding: 20px 5px 15px;margin-bottom: -21px;">
																			<p style="display: block;margin-block-start: 1em;margin-block-end: 1em;margin-inline-start: 0px;margin-inline-end: 0px;line-height: 20px;text-transform: capitalize;font-size:11pt;font-family:-webkit-body">appointment Time: 
																				<span class="doctor_info_4" style="margin-left: 3%;margin-top: 0%;font-size: 11pt;">Mon, Thu-Sat - 8:00 AM - 9:00 AM OR 6:45 PM - 8:00 PM <br> 
																				<span class="doctor_info_3" style="margin-top:20px;float: inherit;">Tue - 8:00 AM - 9:00 AM </span><br>
																				<span class="doctor_info_3" style="margin-top:20px;float: inherit;">
																				Wed - 6:30 PM - 8:00 PM</span>
																			</p>
																		</li>
																		
																	</ul>
																	<div style="width:114%;"></div>
																</div>
															</div>
														</article>
														<article>
															<h3 style="font-size: 16px;margin-left: -5%;margin-top: 4%;text-transform: uppercase!important;">Prescription History</h3>
															<hr style="width: 118%;margin-left: -5%;border-top: 1px solid #8d5fd4;"/>
															<table >
																<thead>
																	<tr >
																		<th style="font-size: 14px;margin-left: -2%;margin-top: -1%;text-align: center;">Date</th>
																		<th style="font-size: 14px;margin-left: -2%;margin-top: -1%;text-align: center;">Medicine Name</th>
																		<th style="font-size: 14px;margin-left: -2%;margin-top: -1%;text-align: center;">Diagnosis Test</th>
																		<th style="font-size: 14px;margin-left: -2%;margin-top: -1%;text-align: center;">Download Pdf</th>
																	</tr>
																</thead>
																<tbody>
																		<?php echo $tbody11; ?>
																</tbody>
															</table>
														</article>
													</div>
												</div>
												<script type='text/javascript'>
												/* $(document).ready(function(){
													$(function(){
														$('#pic').toggle(
															  function() { $(this).animate({width: "100%"}, 500)},
															   function() { $(this).animate({width: "50px"}, 500); }
														);
													});
												}); */
												</script>								
												<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
												<script type='text/javascript'>
													$(document).ready(function(){
														//----------Select the first tab and div by default
														$('#vertical_tab_nav > ul > li > a').eq(0).addClass( "selected" );
														$('#vertical_tab_nav > div > article ').eq(0).css('display','block');
														//---------- This assigns an onclick event to each tab link("a" tag) and passes a parameter to the showHideTab() function
															$('#vertical_tab_nav > ul').click(function(e){
														  if($(e.target).is("a")){
															/*Handle Tab Nav*/
															$('#vertical_tab_nav > ul > li > a').removeClass( "selected");
															$(e.target).addClass( "selected");
															/*Handles Tab Content*/
															var clicked_index = $("a",this).index(e.target);
															$('#vertical_tab_nav > div > article').css('display','none');
															$('#vertical_tab_nav > div > article').eq(clicked_index).fadeIn();
														  }
															$(this).blur();
															return false;
															});
													});//end ready	
												</script>
											</div>
										</div>
									</div>
								</div>
								<div class="uk-clearfix clearfix"></div>
							</article>           
						</div>
                    </div>
				</div>
			</section>
			<!-----------Footer Start--------->
				<?php include 'footer.php'; ?>
			<!-----------Footer End----------->		
		</div><!-- end .wrapper -->
		<script src="js/jquery.validate.js"></script>
		<script type='text/javascript' src='wp-content/plugins/contact-form-7/includes/js/scripts3c21.js?ver=5.1.1'></script>
		<script type='text/javascript' src='wp-content/plugins/themetonaddon/js/elements.min7752.js?ver=5.2.1'></script>
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
		<script type='text/javascript' src='wp-includes/js/jquery/ui/core.mine899.js?ver=1.11.4'></script>
		<script type='text/javascript' src='wp-includes/js/jquery/ui/widget.mine899.js?ver=1.11.4'></script>
		<script type='text/javascript' src='wp-includes/js/jquery/ui/mouse.mine899.js?ver=1.11.4'></script>
		<script type='text/javascript' src='wp-includes/js/jquery/ui/slider.mine899.js?ver=1.11.4'></script>
		<script type='text/javascript' src='wp-content/themes/medio/js/scripts.min7752.js?ver=5.2.1'></script>
		<script type='text/javascript' src='wp-content/themes/medio/includes/vc-extend/scripts7752.js?ver=5.2.1'></script>
		<script type='text/javascript' src='wp-includes/js/wp-embed.min7752.js?ver=5.2.1'></script>
		<script type='text/javascript' src='wp-content/plugins/js_composer/assets/js/dist/js_composer_front.min7263.js?ver=5.4.4'></script>
		<!--<script type='text/javascript' src='wp-content/plugins/mailchimp-for-wp/assets/js/forms-api.min3428.js?ver=4.5.2'></script>-->
		<style>
		.vertical_tab_nav ul li{
			font-family: Poppins!important;
            font-weight: 300!important;
		}
		.vc_custom_1508824581122 {
    padding-top: 36px !important;
    padding-right: 60px !important;
    padding-bottom: 30px !important;
    padding-left: 60px !important;
    background-color: #403678  !important;
}
th {
    border-width: 3px 3px 3px 3px;
    font-weight: 700;
}
tbody ,tr {
    border-width: 3px 3px 3px 3px;
    
}
		</style>
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
		$('#edit-info').validate({
			rules: {
				txt_name: {
					required: true,
				},
				txt_lname: {
					required: true,
				},
				txt_age: {
					required: true,
				},
				txt_pincode: {
					required: true,
				},
				txt_city: {
					required: true,
				},
				txt_state: {
					required: true,
				},
				pass: {
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
				txtEmpPhone: {
					required: true,
					numchk: true,
					minlength: 10,
				},
				txt_address: {
					required: true,
				}
			},
			messages: {
				txt_name: {
					required: "Enter User Name.",
				},
				txt_lname: {
					required: "Enter User Last Name.",
				},
				txt_age: {
					required: "Enter User Age.",
				},
				txt_pincode: {
					required: "Please enter at least 6 characters.",
				},
				txt_city: {
					required: "Enter User City.",
				},
				txt_state: {
					required: "Enter User State.",
				},
				pass: {
					required:"Password at least have 1 uppercase, 1 lowercase, 1 special character and 1 digit or minimum 10 Character",
					//required: "Please Enter Valid User Password.",
					pwcheck: "Password at least have 1 uppercase, 1 lowercase, 1 special character and 1 digit or minimum 10 Character.",
					
				},
				txt_cnpass: {
					required: "Enter User Confirm Password.",
				},
				txt_email: {
					required: "Please enter a valid email address..",
					customemail: "Please enter a valid email address.",
					//remote: "Email already in use.Please try some different Email."
				},
				txtEmpPhone: {
					required: "Enter Valid Mobile no.",
					numchk: "Enter Valid Mobile no.",
					//remote: "Contact already in use.Please try some different Contact No."
				},
				txt_address: {
					required: "Enter Residence Address.",
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
			if($('#edit-info').valid()){
				//
			}
		});
	});
</script>
	</body>
</html>
	