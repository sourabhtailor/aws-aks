<?php 
ini_set('display_errors',1);
session_start();
require_once "constants.php";
date_default_timezone_set('Asia/Kolkata'); 
include 'config/DB.php';
$db = new DB();
$connect = $db->connect();
if (isset($_SESSION['u_id'])){
		$timeslot_list_e = ' '; 
		$timeslot_list_m = ' ';
		$counsellingType = $_REQUEST['counsellingType'];
		if($counsellingType == 'counselling'){
			$counsellingType = 'counselling';
			$counsellingId   = $_REQUEST['counsellingTime'];
			//$price           = $_REQUEST['price'];
			
		}if($counsellingType == 'normal'){
			$counsellingType = 'normal';
			$counsellingId   = '';
			//$price         = $_REQUEST['price'];
		}
		$price         = $_REQUEST['price'];
		$txt_uid       = $_REQUEST['user_id'];
		$txt_name      = $_REQUEST['txt_name']; 
		$txt_phone     = $_REQUEST['txt_phone'];
		
		$txt_country     = $_REQUEST['txt_country'];
		$txt_state       = $_REQUEST['txt_state'];
		$txt_pincode     = $_REQUEST['txt_pincode'];
		$booking_type    = $_REQUEST['booking_type'];
		
		
		$txt_age       = $_REQUEST['txt_age'];
		$txt_date      = $_REQUEST['txt_date'];
		$b_date_arr    = explode('/',$txt_date);
		$date_new      = $b_date_arr[2].'-'.$b_date_arr[0].'-'.$b_date_arr[1];//y-m-d
		
		$timeslot_list = $_REQUEST['timeslot_list'];
		$timeslot_list_arr = explode(' ',$timeslot_list);
		$timeslot_list_arr_new = $timeslot_list_arr[0].' '.$timeslot_list_arr[1];//y-m-d
		if($timeslot_list_arr[1] == 'AM'){
			$timeslot_list_m = $_REQUEST['timeslot_list'];
			$time_new     = date("H:i", strtotime($timeslot_list_m));
		}else if($timeslot_list_arr[1] == ''){
			$timeslot_list_m = ' ';
		}
		if($timeslot_list_arr[1] == 'PM'){
			$timeslot_list_e = $_REQUEST['timeslot_list'];
			$time_new     = date("H:i", strtotime($timeslot_list_e));
		}else if($timeslot_list_arr[1] == ' '){
			$timeslot_list_e = ' '; 
		}
		
		/*-----*/
		
		$txt_address   = $_REQUEST['txt_address'];		
		$txt_city   = $_REQUEST['txt_city'];		
		$txt_service   = $_REQUEST['txt_service'];
		$txt_email     = $_REQUEST['txt_email'];
		$txt_doctor    = $_REQUEST['txt_doctor'];
		$txt_problm    = $_REQUEST['txt_problm'];
		$txt_gender    = $_REQUEST['txt_gender'];
		
		
}else{
	header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en-US" class="no-js">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <title>Payment</title>
	<link rel='dns-prefetch' href='https://fonts.googleapis.com/' />
	<link rel='dns-prefetch' href='https://s.w.org/' />
	<script data-require="jquery@*" data-semver="2.2.0" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script data-require="bootstrap@*" data-semver="3.3.6" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link data-require="bootstrap-css@3.3.6" data-semver="3.3.6" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" />
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
	
		<style type="text/css">
			img.wp-smiley,
			img.emoji {
				display: inline !important;
				border: none !important;
				box-shadow: none !important;
				height: 1em !important;
				width: 1em !important;
				margin: 0 .07em !important;
				vertical-align: -0.1em !important;
				background: none !important;
				padding: 0 !important;
			}
			.mungu-element.mungu-button.text-sect { 
				width: 49%;
				float: left;
			}
			.mungu-element.mungu-button.button-sectione {
				float: right;
			}
			@media only screen and (max-width: 768px) {
				a.uk-button.uk-button-default.about-section{
					width: 100%;
					margin-left: 0px !important;
					background-color: #009eb3;
					border: none;
					border-width: 0px;
					border-color: transparent;
				}
				.uk-section {
					box-sizing: border-box;
					padding-top: 40px;
					padding-bottom: 0px !important;
				}
				.mungu-element.mungu-button.text-sect {
					width: 100%;
					text-align:center;
				}
				.mungu-element.mungu-button.text-sect p{
					font-size: 24px !important;
				}
				.mungu-element.mungu-button.button-sectione {
					text-align: center !important;
					margin: 30px;
					float: none;
				}
			}
			
			
		</style>
	<link rel='stylesheet' id='wp-block-library-css'  href='wp-includes/css/dist/block-library/style.min7752.css?ver=5.2.1' type='text/css' media='all' />
	<link rel='stylesheet' id='contact-form-7-css'  href='wp-content/plugins/contact-form-7/includes/css/styles3c21.css?ver=5.1.1' type='text/css' media='all' />
	<link rel='stylesheet' id='rs-plugin-settings-css'  href='wp-content/plugins/revslider/public/assets/css/settings23da.css?ver=5.4.8' type='text/css' media='all' />
	<style id='rs-plugin-settings-inline-css' type='text/css'>#rs-demo-id {}</style>
	<link rel='stylesheet' id='bodhi-svgs-attachment-css'  href='wp-content/plugins/svg-support/css/svgs-attachment7752.css?ver=5.2.1' type='text/css' media='all' />
	<link rel='stylesheet' id='mungu_elements-css'  href='wp-content/plugins/themetonaddon/css/main7752.css?ver=5.2.1' type='text/css' media='all' />
	<link rel='stylesheet' id='uikit-css'  href='wp-content/themes/medio/vendors/uikit/css/uikit.min7752.css?ver=5.2.1' type='text/css' media='all' />
	<link rel='stylesheet' id='font-awesome-css'  href='wp-content/plugins/js_composer/assets/lib/bower/font-awesome/css/font-awesome.min7263.css?ver=5.4.4' type='text/css' media='all' />
	<link rel='stylesheet' id='animate-css'  href='wp-content/themes/medio/vendors/animate7752.css?ver=5.2.1' type='text/css' media='all' />
	<link rel='stylesheet' id='swiper-css'  href='wp-content/themes/medio/vendors/swiper/css/swiper.min7752.css?ver=5.2.1' type='text/css' media='all' />
	<link rel='stylesheet' id='jquery-ui-and-plus-css'  href='wp-content/themes/medio/vendors/jquery-ui-and-plus.min7752.css?ver=5.2.1' type='text/css' media='all' />
	<link rel='stylesheet' id='medio-stylesheet-css'  href='wp-content/themes/medio/style7752.css?ver=5.2.1' type='text/css' media='all' />
	<style id='medio-stylesheet-inline-css' type='text/css'>
	.vc_custom_1508824581122{padding-top: 36px !important;padding-right: 60px !important;padding-bottom: 30px !important;padding-left: 60px !important;background-color: #403678 !important;}.vc_custom_1509092891283{border-bottom-width: 1px !important;padding-bottom: 30px !important;border-bottom-color: #5b5096 !important;border-bottom-style: solid !important;}.vc_custom_1508823233184{margin-right: 0px !important;margin-left: 0px !important;}.vc_custom_1508823425668{padding-left: 0px !important;}.vc_custom_1508823431780{padding-right: 0px !important;}
	</style>
	<link rel='stylesheet' id='themeton-custom-stylesheet-css'  href='wp-content/uploads/sites/31/2019/04/medio7752.css?ver=5.2.1' type='text/css' media='all' />
	<link rel='stylesheet' id='js_composer_front-css'  href='wp-content/plugins/js_composer/assets/css/js_composer.min7263.css?ver=5.4.4' type='text/css' media='all' />
	<script type='text/javascript' src='wp-includes/js/jquery/jquery4a5f.js?ver=1.12.4-wp'></script>
	<script type='text/javascript' src='wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1'></script>
	<script type='text/javascript' src='wp-content/plugins/revslider/public/assets/js/jquery.themepunch.tools.min23da.js?ver=5.4.8'></script>
	<script type='text/javascript' src='wp-content/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min23da.js?ver=5.4.8'></script>
	<script type='text/javascript' src='wp-includes/js/mediaelement/mediaelement-and-player.min45a0.js?ver=4.2.6-78496d1'></script>
	<script type='text/javascript' src='wp-includes/js/mediaelement/mediaelement-migrate.min7752.js?ver=5.2.1'></script>
	
	<style type="text/css" data-type="vc_shortcodes-custom-css">
	.vc_custom_1551541901651{margin-top: 46px !important;}.vc_custom_1554171066700{padding-top: 30px !important;padding-bottom: 50px !important;}.vc_custom_1551767028403{padding-right: 15px !important;}.vc_custom_1551766958397{border-left-width: 1px !important;padding-left: 20px !important;border-left-color: #b2bcbd !important;border-left-style: solid !important;}.vc_custom_1551534769676{margin-bottom: -7px !important;}.vc_custom_1552802309911{margin-top: 0px !important;margin-bottom: 0px !important;}.vc_custom_1551535277062{margin-bottom: -7px !important;}.vc_custom_1552802384924{margin-top: 0px !important;margin-bottom: 0px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1554110925366{background-image: url(wp-content/uploads/sites/31/2017/06/bannerpic.png?id=1001) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554110862652{margin-left: -15px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1553482574309{padding-bottom: 0px !important;}.vc_custom_1552749412294{margin-top: 0px !important;padding-top: 0px !important;background-image: url(wp-content/uploads/sites/31/2017/06/Path-211a80.png?id=1281) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554787876299{background-color: #4f4780 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552321818900{margin-bottom: 0px !important;}.vc_custom_1554719683187{margin-top: 135px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552754605138{margin-left: -15px !important;}.vc_custom_1554786847685{margin-bottom: 0px !important;}.vc_custom_1552754523147{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1552754535828{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1554788006379{padding-top: 25px !important;}.vc_custom_1554789825528{padding-top: 20px !important;}.vc_custom_1554787620879{margin-bottom: 0px !important;}@media screen and (min-width: 980px) {
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
	div#top-header-section {
		margin-right: 4px;
	}
	.vc_column_container>.vc_column-inner {
		box-sizing: border-box;
		padding-left: 5px;
		padding-right: 10px;
		width: 100%;
	}
	h2.vc_custom_heading.vc_custom_1552802384924{
		margin-left: -46%;
		padding: 0 0px 0 1px;
	}
	div#test_section a.btn.btn-default.btn-rounded.mb-4 {
		margin-right: -18px;
	}
	div#test_section {
		margin: 28px;
	}
	@media only screen and (max-width: 768px) {
		.wpb_column.vc_column_container.vc_col-sm-5.vc_col-lg-5.vc_hidden-sm.dr_images_about {
			margin-top: 120% !important;
		}
		img.custom-logo.dr_photo-about {
			width: 100% !important;
			max-width: 100% !important;
		}
		.vc_column-inner.vc_custom_1490624612621.dr-discription {
			width: 100% !important;
		}
		h3.vc_custom_heading.vc_custom_1490622878662.dr-text-about {
			font-size: 14px !important;
		}
	}
	
	@media screen and (max-width: 980px) {
		.form-padding {
		  margin-bottom: 45px;
		}
	}
	#scroll {
		box-shadow: none;
		padding:0;
	}
	#scroll:hover {
		box-shadow: none;
	}
	.vc_custom_1553502786044 {
    padding-bottom: 20px !important;
    background-image: url(wp-content/uploads/sites/31/2018/05/violet-box983f.jpg?id=1199) !important;
    background-position: 0 0 !important;
    background-repeat: repeat !important;
}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1509939171657{margin-top: 100px !important;}.vc_custom_1509939179248{margin-bottom: 100px !important;}.vc_custom_1509939551805{margin: 0px !important;}.vc_custom_1509939644011{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 30px !important;margin-left: 0px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1551541901651{margin-top: 46px !important;}.vc_custom_1554171066700{padding-top: 30px !important;padding-bottom: 50px !important;}.vc_custom_1551767028403{padding-right: 15px !important;}.vc_custom_1551766958397{border-left-width: 1px !important;padding-right: 6px;padding-left: 20px !important;border-left-color: #b2bcbd !important;border-left-style: solid !important;}.vc_custom_1551534769676{margin-bottom: -7px !important;}.vc_custom_1552802309911{margin-top: 0px !important;margin-bottom: 0px !important;}.vc_custom_1551535277062{margin-bottom: -7px !important;}.vc_custom_1552802384924{margin-top: 0px !important;margin-bottom: 0px !important;}#header {background-color:#63599e;position:absolute;width:100%; z-index:9999;}.medio-responsive-menu{background:#63599e;}.themeton-menu > li > a {font-family:Poppins!important;font-weight:300!important;text-transform:uppercase!important;font-size:14px!important;line-height:14px!important;color:#ffffff!important;}.themeton-menu > li > a {padding-top:10px !important;padding-right:23px !important;padding-bottom:10px !important;padding-left:23px !important;}.themeton-menu > li > a:hover,.themeton-menu > li > a:focus {color:#e2e2e2!important;}.themeton-menu li ul li a {color:#beb6ea!important;}.themeton-menu > li ul li {}.themeton-menu > li ul li a:hover {color:#ffffff!important;}.themeton-menu > li ul li.current_page_item > a {color:#988aea!important;}.themeton-menu > li > .sub-menu, .themeton-menu > li > .sub-menu > li .sub-menu  {background-color:rgba(64,54,120,1)!important;}.themeton-menu > li ul li {border-color:rgba(91,80,150,1)!important;}.vc_custom_1554110925366{background-image: url(wp-content/uploads/sites/31/2017/06/bannerpic.png?id=1001) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554110862652{margin-left: -15px !important;}#page-title {}@media screen and (min-width: 980px) {
		.form-padding {
		  padding-left: 50px;
		  padding-right: 50px;
		}
	}
	.vc_row.wpb_row.vc_inner.vc_row-fluid.vc_custom_155176695839k.vc_row-has-fill {
    border-left: 1px solid #ccc;
}
	@media screen and (max-width: 980px) {
		.form-padding {
		  margin-bottom: 45px;
		}
	}
	#scroll {
		box-shadow: none;
		padding:0;
	}
	#scroll:hover {
		box-shadow: none;
	}.vc_custom_1553482574309{padding-bottom: 0px !important;}.vc_custom_1552749412294{margin-top: 0px !important;padding-top: 0px !important;background-image: url(wp-content/uploads/sites/31/2017/06/Path-211a80.png?id=1281) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554787876299{background-color: #4f4780 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552321818900{margin-bottom: 0px !important;}.vc_custom_1554719683187{margin-top: 135px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552754605138{margin-left: -15px !important;}.vc_custom_1554786847685{margin-bottom: 0px !important;}.vc_custom_1552754523147{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1552754535828{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1554788006379{padding-top: 25px !important;}.vc_custom_1554789825528{padding-top: 20px !important;}.vc_custom_1554787620879{margin-bottom: 0px !important;}#footer {background-color:transparent;font-family:Poppins!important;font-weight:300!important;color:#8b99a6!important;}#footer, #footer p, #footer strong { color:#8b99a6;}#footer .widget .widget-title,#footer .widget .widgettitle {font-family:Poppins!important;font-weight:300!important;}</style>
	<link rel="icon" href="wp-content/uploads/sites/31/2017/06/Picture1.png" sizes="32x32" />
	<link rel="icon" href="wp-content/uploads/sites/31/2017/06/Picture1.png" sizes="192x192" />
	<style type="text/css" title="dynamic-css" class="options-output">.wrapper>.page-title{background-color:#3db8db;background-size:cover;background-image:url('wp-content/uploads/sites/2/2017/03/page-title-bg.html');}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1554111041777{padding-top: 30px !important;padding-bottom: 30px !important;}.vc_custom_1552491254048{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;background-image: url(wp-content/uploads/sites/31/2019/03/half-shaped-background0b80.png?id=1351) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1491216857626{padding-top: 80px !important;}.vc_custom_1508823235619{margin-left: -30px !important;padding-right: 30px !important;padding-left: 30px !important;}.vc_custom_1491386371130{margin-bottom: 20px !important;}.vc_custom_1490624677814{margin-left: 30px !important;}.vc_custom_1490624535550{margin-left: 30px !important;}.vc_custom_1490624612621{margin-bottom: 30px !important;background-color: #eeebfd !important;}.vc_custom_1490624627783{margin-bottom: 30px !important;margin-left: 30px !important;background-color: #e2f7fa !important;}.vc_custom_1490622878662{margin-bottom: 30px !important;}.vc_custom_1491386495095{margin-bottom: 30px !important;}.vc_custom_1490624636738{background-color: #e5edec !important;}.vc_custom_1490624642029{margin-left: 30px !important;background-color: #fcf4e9 !important;}.vc_custom_1491386516327{margin-bottom: 30px !important;}.vc_custom_1491386540447{margin-bottom: 30px !important;}.vc_custom_1490624005367{margin-bottom: 65px !important;}.vc_custom_1491365997321{padding-bottom: 15px !important;}.vc_custom_1552284431362{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 5px !important;padding-bottom: 25px !important;}.vc_custom_1552283533023{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;background-color: #ffffff !important;}.vc_custom_1552280492365{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}.vc_custom_1491216949045{margin-bottom: 0px !important;padding-top: 10px !important;padding-bottom: 10px !important;}.vc_custom_1491199747510{padding-top: 20px !important;}.vc_custom_1490845291717{margin-bottom: 0px !important;}</style><noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>
	</head>
	<body class="page-template-default page page-id-61 page-child parent-pageid-502 skin-medio wpb-js-composer js-comp-ver-5.4.4 vc_responsive">
		<!-- Loader -->
		<div id="the_loader" class="uk-flex uk-flex-center uk-flex-middle">
			<div class="loader_indicator"> 
				<svg width="16px" height="12px"><polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline><polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline></svg>
			</div>
        </div>    
		<!-- Wrapper -->
        <div class="wrapper uk-offcanvas-content"> 
			
				<!---------------Header Start---------------->
				
				<?php include 'header.php';?>
				
				<!---------------Header End------------------> 
            <div class="uk-flex uk-child-width-1-2 medio-responsive-menu uk-hidden@m uk-padding-small">
                <div class="uk-flex uk-flex-middle">
					<a href="index.php" class="custom-logo-link" rel="home"><img src="wp-content/uploads/sites/31/2017/06/logooo.png" alt=""  class="custom-logo"></a>
				</div>
                <div class="uk-flex uk-flex-middle uk-flex-right">
					<a href="#offcanvas" class="hamburger-menu uk-navbar-toggle uk-navbar-toggle-icon uk-icon">
						<svg width="20" height="20" viewBox="0 0 20 20" xmlns=""><rect y="9" width="20" height="2"></rect><rect y="3" width="20" height="2"></rect><rect y="15" width="20" height="2"></rect></svg>
                    </a>
                </div>
            </div>
			
			
			<section class="uk-section" style="padding-bottom:80px;">
				<div class="uk-container uk-container-default uk-position-relative">
					<div class="uk-grid uk-flex uk-flex-center">
						<div class="uk-width-1-1@s">
							<article class="medio-page-single uk-article post-61 page type-page status-publish hentry">
								<section class="uk-section" style="padding-top: 0px;padding-bottom: 0;" >
									<div class="w3-banner-main">
										<div class="center-container">
										
											<form name="razorpay_frm_payment" class="razorpay-frm-payment" id="razorpay-frm-payment" method="post" style="margin-top: 77px;">
												<input type="hidden" name="merchant_order_id" id="merchant_order_id" value="EmDGovbbRYpZXx"> 
												<input type="hidden" name="language" value="EN"> 
												<input type="hidden" name="currency" id="currency" value="INR"> 

												<input type="hidden" name="user_id" id="user_id" value="<?php echo $txt_uid;?>"> 
												<input type="hidden" name="booking_type" id="booking_type" value="<?php echo $booking_type;?>"> 
												<input type="hidden" name="date" id="date" value="<?php echo $date_new;?>"> 
												<input type="hidden" name="time_m" id="time_m" value="<?php echo $timeslot_list_m;?>"> 
												<input type="hidden" name="time_e" id="time_e" value="<?php echo $timeslot_list_e;?>"> 
												<input type="hidden" name="time_new" id="time_new" value="<?php echo $time_new;?>"> 

												<input type="hidden" name="service" id="service" value="<?php echo $txt_service;?>"> 
												<input type="hidden" name="doctor" id="doctor" value="<?php echo $txt_doctor;?>"> 
												<input type="hidden" name="problem_desc" id="problem_desc" value="<?php echo $txt_problm;?>"> 
												<input type="hidden" name="counsellingId" id="counsellingId" value="<?php echo $counsellingId;?>"> 
												<input type="hidden" name="counsellingType" id="counsellingType" value="<?php echo $counsellingType;?>"> 


												<input type="hidden" name="surl" id="surl" value="https://drharshudawat.com/success.php"> 
												<!--<input type="hidden" name="vurl" id="vurl" value="http://drharshudawat.com/file_video.php"> --->
												<input type="hidden" name="furl" id="furl" value="https://drharshudawat.com/failed.php">
												<section class="showcase" style="margin-top: 65px;margin-bottom: 124px;">
												   <div class="container">
														<div class="pb-2 mt-4 mb-2 border-bottom">
														  <h2>Razorpay Payment</h2>
														</div>
														<div class="row align-items-center">
														   <div class="form-group col-md-6">
															<label for="inputEmail4">Amount</label>
															<input type="text" class="form-control" id="amount" name="amount" placeholder="amount" value="<?php echo $price;?>" readonly="readonly"><!-------500.00------> 
														  </div>
														  <div class="form-group col-md-6">
															<label for="inputEmail4">Full Name</label>
															<input type="text" name="billing_name" class="form-control" id="billing-name"  value="<?php echo $txt_name; ?>" Placeholder="Name" required> 
														  </div>
														</div>
														<div class="row align-items-center">
														   <div class="form-group col-md-6">
															<label for="inputEmail4">Age</label>
															<input type="email" name="age"class="form-control" value="<?php echo $txt_age; ?>" id="age" Placeholder="Age" required>
														  </div>
														  <div class="form-group col-md-6">
															<label for="inputEmail4">Phone</label>
															<input type="text" name="billing_phone" class="form-control" id="billing-phone" value="<?php echo $txt_phone; ?>" Placeholder="Phone" required>
														  </div>
														</div>
														<div class="row align-items-center">
														   <div class="form-group col-md-6">
															<label for="inputEmail4">Email</label>
															<input type="email" name="billing_email"class="form-control" value="<?php echo $txt_email; ?>" id="billing-email" Placeholder="Email" required>
														  </div>
														  <div class="form-group col-md-6">
															<label for="inputEmail4">Gender</label>
															<input type="text" name="gender" class="form-control" id="gender" value="<?php echo $txt_gender; ?>" Placeholder="Gender" required>
														  </div>
														</div>
														
														<div class="row align-items-center">  
														  <div class="form-group col-md-6">
															<label for="inputEmail4">Address</label>
															 <input type="text" id="billing_address" name="billing_address" class="form-control" value="<?php echo $txt_address; ?>" Placeholder="Address">
														  </div>
														   <div class="form-group col-md-6">
															<label for="inputEmail4">City</label>
															<input type="text" name="billing_country" class="form-control" value="<?php echo $txt_city; ?>" Placeholder="Country">
														  </div>
														</div>

														<div class="row align-items-center">  
														  <div class="form-group col-md-6">
															<label for="inputEmail4">State</label>
															 <input type="text" name="billing_state" id="billing_state" class="form-control" value="<?php echo $txt_state; ?>" Placeholder="State"> 
														  </div>
														   <div class="form-group col-md-6">
															<label for="inputEmail4">Zipcode</label>
															<input type="text" name="billing_zip" id="billing_zip" class="form-control"  value="<?php echo $txt_pincode; ?>"Placeholder="Zipcode">
														  </div>
														</div>
														<div class="row">
														  <div class="col">
															<button type="button" class="btn btn-success mt-4 float-right" id="razor-pay-now"><i class="fa fa-credit-card" aria-hidden="true"></i> Pay</button>
														  </div>
														</div>
													</div>
												</section>
											</form>
										</div>
									</div>
								</section>
								<div class="vc_row-full-width vc_clearfix"></div>
								<div class="vc_row-full-width vc_clearfix" style="    margin-top: 5%;"></div>
							</article>            
						</div>
                    </div>
				</div>
			</section>

<!-----------Footer Start--------->
				
	<?php include 'footer.php'; ?>
				
<!-----------Footer End----------->	


</div><!-- end .wrapper -->

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
<script type='text/javascript' src='wp-content/plugins/mailchimp-for-wp/assets/js/forms-api.min3428.js?ver=4.5.2'></script>
</body>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript">

  jQuery(document).on('click', '#razor-pay-now', function (e) {
    var total = (jQuery('form#razorpay-frm-payment').find('input#amount').val() * 100);
    var merchant_order_id = jQuery('form#razorpay-frm-payment').find('input#merchant_order_id').val();
    var merchant_surl_id = jQuery('form#razorpay-frm-payment').find('input#surl').val();
    var merchant_furl_id = jQuery('form#razorpay-frm-payment').find('input#furl').val();
    var merchant_vurl    = jQuery('form#razorpay-frm-payment').find('input#vurl').val();
    var card_holder_name_id = jQuery('form#razorpay-frm-payment').find('input#billing-name').val();
    var merchant_total = total;
    var merchant_amount = jQuery('form#razorpay-frm-payment').find('input#amount').val();
    var currency_code_id = jQuery('form#razorpay-frm-payment').find('input#currency').val();
    var key_id = "<?php echo RAZOR_KEY_ID; ?>";
    var store_name = 'Udawat Clinic';
    var store_description = 'Payment';
    var store_logo = 'https://drharshudawat.com/wp-content/uploads/sites/31/2017/06/Picture1.png';
    var email = jQuery('form#razorpay-frm-payment').find('input#billing-email').val();
    var phone = jQuery('form#razorpay-frm-payment').find('input#billing-phone').val();
	
	 var user_id = jQuery('form#razorpay-frm-payment').find('input#user_id').val();
	 var age     = jQuery('form#razorpay-frm-payment').find('input#age').val();
	 var date    = jQuery('form#razorpay-frm-payment').find('input#date').val();
	 var time_e  = jQuery('form#razorpay-frm-payment').find('input#time_e').val();
	 var time_m  = jQuery('form#razorpay-frm-payment').find('input#time_m').val();
	 var service = jQuery('form#razorpay-frm-payment').find('input#service').val();
	 var problm  = jQuery('form#razorpay-frm-payment').find('input#problem_desc').val();
	 var doctor  = jQuery('form#razorpay-frm-payment').find('input#doctor').val();
	 var gender  = jQuery('form#razorpay-frm-payment').find('input#gender').val();
	 var booking_type  = jQuery('form#razorpay-frm-payment').find('input#booking_type').val();
	 var time_new  = jQuery('form#razorpay-frm-payment').find('input#time_new').val();
	 var billing_address  = jQuery('form#razorpay-frm-payment').find('input#billing_address').val();
	 var username  = jQuery('form#razorpay-frm-payment').find('input#billing-name').val();
	 var counsellingId    = jQuery('form#razorpay-frm-payment').find('input#counsellingId').val();
	 var counsellingType  = jQuery('form#razorpay-frm-payment').find('input#counsellingType').val();
    
	/* , username:username, phone:phone, email:email, user_id: user_id, age: age, date: date, time_e: time_e, time_m: time_m, service: service, problm: problm, doctor: doctor, gender: gender, billing_address: billing_address */
	
    jQuery('.text-danger').remove();

    if(card_holder_name_id=="") {
      jQuery('input#billing-name').after('<small class="text-danger">Please enter full mame.</small>');
      return false;
    }
    if(email=="") {
      jQuery('input#billing-email').after('<small class="text-danger">Please enter valid email.</small>');
      return false;
    }
    if(phone=="") {
      jQuery('input#billing-phone').after('<small class="text-danger">Please enter valid phone.</small>');
      return false;
    }
    
    var razorpay_options = {
        key: key_id,
        amount: merchant_total,
        name: store_name,
        description: store_description,
        image: store_logo,
        netbanking: true,
        currency: currency_code_id,
        prefill: {
            name: card_holder_name_id,
            email: email,
            contact: phone
        },
        notes: {
            soolegal_order_id: merchant_order_id,
        },
        handler: function (transaction) {
            jQuery.ajax({
                url:'callback.php',
                type: 'post',
                data: {razorpay_payment_id: transaction.razorpay_payment_id, merchant_order_id: merchant_order_id, merchant_surl_id: merchant_surl_id, merchant_furl_id: merchant_furl_id,merchant_vurl:merchant_vurl, card_holder_name_id: card_holder_name_id, merchant_total: merchant_total, merchant_amount: merchant_amount, currency_code_id: currency_code_id, username:username, phone:phone, email:email, user_id: user_id, age: age, date: date, time_e: time_e, time_m: time_m, service: service, problm: problm, doctor: doctor, gender: gender, billing_address: billing_address,booking_type:booking_type,time_new:time_new,counsellingId:counsellingId,counsellingType:counsellingType}, 
                dataType: 'json',
                success: function (json) {
                    if(json.msg){
                        alert(json.msg);
                        return false;
                    } 
                    window.location = json.redirectURL;
                }
            });
        },
        "modal": {
            "ondismiss": function () {
                // code here
            }
        }
    };
    // obj        
    var objrzpv1 = new Razorpay(razorpay_options);
    objrzpv1.open();
        e.preventDefault();
            
});
</script>
</html>
