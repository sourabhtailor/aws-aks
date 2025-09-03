<?php
ini_set('display_errors', 1);
session_start();
$email = base64_decode($_REQUEST['email']);
$notification='';
?>
<!DOCTYPE html>
<html lang="en-US" class="no-js">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Forget Password</title>
		<style>.btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 14px !important;
    line-height: 1.5;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}</style>
			<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
			<link href="css/register.css" rel='stylesheet' type='text/css' media="all" />
			<style type="text/css">
				span#txt_email-error{
					color: red;
					margin-left: -5%;
				}
				.mb-4, .my-4 {
    margin-bottom: 0rem!important;
}
			</style>
			<link rel='stylesheet' id='wp-block-library-css'  href='wp-includes/css/dist/block-library/style.min7752.css?ver=5.2.1' type='text/css' media='all' />
			<link rel='stylesheet' id='contact-form-7-css'  href='wp-content/plugins/contact-form-7/includes/css/styles3c21.css?ver=5.1.1' type='text/css' media='all' />
			<link rel='stylesheet' id='rs-plugin-settings-css'  href='wp-content/plugins/revslider/public/assets/css/settings23da.css?ver=5.4.8' type='text/css' media='all' />
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
			<style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1551541901651{margin-top: 46px !important;}
			.vc_custom_1554171066700{padding-top: 30px !important;padding-bottom: 50px !important;}.vc_custom_1551767028403{padding-right: 14px !important;}
			.vc_custom_1551766958397{border-left-width: 1px !important;padding-left: 20px !important;border-left-color: #b2bcbd !important;border-left-style: solid !important;}.vc_custom_1551534769676{margin-bottom: -7px !important;}.vc_custom_1552802309911{margin-top: 0px !important;margin-bottom: 0px !important;}.vc_custom_1551535277062{margin-bottom: -7px !important;}.vc_custom_1552802384924{margin-top: 0px !important;margin-bottom: 0px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1554110925366{background-image: url(wp-content/uploads/sites/31/2017/06/bannerpic.png?id=1001) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554110862652{margin-left: -15px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1553482574309{padding-bottom: 0px !important;}.vc_custom_1552749412294{margin-top: 0px !important;padding-top: 0px !important;background-image: url(wp-content/uploads/sites/31/2017/06/Path-211a80.png?id=1281) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554787876299{background-color: #4f4780 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552321818900{margin-bottom: 0px !important;}.vc_custom_1554719683187{margin-top: 135px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552754605138{margin-left: -15px !important;}.vc_custom_1554786847685{margin-bottom: 0px !important;}.vc_custom_1552754523147{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1552754535828{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1554788006379{padding-top: 25px !important;}.vc_custom_1554789825528{padding-top: 20px !important;}.vc_custom_1554787620879{margin-bottom: 0px !important;}@media screen and (min-width: 980px) {
				.form-padding {
				  padding-left: 50px;
				  padding-right: 50px;
				}
			}

			@media screen and (max-width: 980px) {
				.form-padding {
				  margin-bottom: 45px;
				}.vc_column_container>.vc_column-inner {
					box-sizing: border-box;
					padding-left: 3px;
					padding-right: 20px !important;
					width: 100%;
				}
			}
			#scroll {
				box-shadow: none;
				padding:0;
			}
			#scroll:hover {
				box-shadow: none;
			}

			.uk-grid.uk-flex.uk-flex-center {
				background: #6f42c0;
			}

			.form-section{
				background-color: #fff;
				margin: 0 48px 49px 35px;
				border-radius: 115px 0px;
				padding: 49px;
				text-align:center;
			}
			input.btnRegister {
				color: #fff;
				padding: 5px 46px !important;
				border: none;
			}
			.login-tex {
				padding: 15px;
			}
			.login-tex p {
				margin: 22px;
				color:#fff;
			}

			.form-group {
				width: 345px;
			}

			</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1509939171657{margin-top: 100px !important;}.vc_custom_1509939179248{margin-bottom: 100px !important;}.vc_custom_1509939551805{margin: 0px !important;}.vc_custom_1509939644011{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 30px !important;margin-left: 0px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1551541901651{margin-top: 46px !important;}.vc_custom_1554171066700{padding-top: 30px !important;padding-bottom: 50px !important;}.vc_custom_1551767028403{padding-right: 14px !important;}.vc_custom_1551766958397{border-left-width: 1px !important;padding-left: 20px !important;border-left-color: #b2bcbd !important;border-left-style: solid !important;}.vc_custom_1551534769676{margin-bottom: -7px !important;}.vc_custom_1552802309911{margin-top: 0px !important;margin-bottom: 0px !important;}.vc_custom_1551535277062{margin-bottom: -7px !important;}.vc_custom_1552802384924{margin-top: 0px !important;margin-bottom: 0px !important;}#header {background-color:#63599e;position:absolute;width:100%; z-index:9999;}.medio-responsive-menu{background:#63599e;}.themeton-menu > li > a {font-family:Poppins!important;font-weight:300!important;text-transform:uppercase!important;font-size:14px!important;line-height:14px!important;color:#ffffff!important;}.themeton-menu > li > a {padding-top:10px !important;padding-right:23px !important;padding-bottom:10px !important;padding-left:23px !important;}.themeton-menu > li > a:hover,.themeton-menu > li > a:focus {color:#e2e2e2!important;}.themeton-menu li ul li a {color:#beb6ea!important;}.themeton-menu > li ul li {}.themeton-menu > li ul li a:hover {color:#ffffff!important;}.themeton-menu > li ul li.current_page_item > a {color:#988aea!important;}.themeton-menu > li > .sub-menu, .themeton-menu > li > .sub-menu > li .sub-menu  {background-color:rgba(64,54,120,1)!important;}.themeton-menu > li ul li {border-color:rgba(91,80,150,1)!important;}.vc_custom_1554110925366{background-image: url(wp-content/uploads/sites/31/2017/06/bannerpic.png?id=1001) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554110862652{margin-left: -15px !important;}#page-title {}@media screen and (min-width: 980px) {
				.form-padding {
				  padding-left: 50px;
				  padding-right: 50px;
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
			}.vc_custom_1553482574309{padding-bottom: 0px !important;}.vc_custom_1552749412294{margin-top: 0px !important;padding-top: 0px !important;background-image: url(wp-content/uploads/sites/31/2017/06/Path-211a80.png?id=1281) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554787876299{background-color: #4f4780 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552321818900{margin-bottom: 0px !important;}.vc_custom_1554719683187{margin-top: 135px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552754605138{margin-left: -15px !important;}.vc_custom_1554786847685{margin-bottom: 0px !important;}.vc_custom_1552754523147{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1552754535828{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1554788006379{padding-top: 25px !important;}.vc_custom_1554789825528{padding-top: 20px !important;}.vc_custom_1554787620879{margin-bottom: 0px !important;}#footer {background-color:transparent;font-family:Poppins!important;font-weight:300!important;color:#8b99a6!important;}#footer, #footer p, #footer strong { color:#8b99a6;}#footer .widget .widget-title,#footer .widget .widgettitle {font-family:Poppins!important;font-weight:300!important;}</style>
			<link rel="icon" href="wp-content/uploads/sites/31/2017/06/Picture1.png" sizes="32x32" />
		<link rel="icon" href="wp-content/uploads/sites/31/2017/06/Picture1.png" sizes="192x192" />
			<style type="text/css" title="dynamic-css" class="options-output">.wrapper>.page-title{background-color:#3db8db;background-size:cover;background-image:url('wp-content/uploads/sites/2/2017/03/page-title-bg.html');}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1491236164137{margin-top: 50px !important;}.vc_custom_1553502786044{padding-bottom: 20px !important;background-image: url(wp-content/uploads/sites/31/2018/05/violet-box983f.jpg?id=1199) !important;background-position: 0 0 !important;background-repeat: repeat !important;}.vc_custom_1553502693329{margin-bottom: 0px !important;}.vc_custom_1553502900045{margin-bottom: 0px !important;}</style><noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style>
			</noscript><style>
			@media only screen and (max-width: 768px) {			
				.form-section {
					background-color: #fff;
					margin: 0px 4px 49px 4px !important;
					 border-radius:0px !important;
					padding: 8px !important;
					text-align: center;
				}.form-group {
					margin-left:0%!important;
					width:260px!important;
				}.vc_custom_1491236164137 {
					margin-top: 0 !important;
				}.uk-grid>* {
					padding-left: 0px !important;
				}.vc_column_container>.vc_column-inner {
					box-sizing: border-box;
					padding-left: 5px;
					padding-right: 5px !important;
					width: 100%;
				}.uk-input, .uk-select, .uk-select:not([multiple]):not([size]) {
					height: 46px !important;
				}a.uk-button.uk-button-default.contact-section{
					width: 100%;
					margin-left: 0 !important;
					background-color: #009eb3;
					border: none;
					border-width: 0px;
					border-color: transparent;
				}.uk-section {
					box-sizing: border-box;
					padding-top: 40px;
					padding-bottom: 0px !important;
				}.forgot-section {
					margin-left: 3px !important;
				}input.btnRegister{
					margin-top: 2%;
					margin-left: 23% !important;
					padding: 4px !important;
					width: 54% !important;
					background-color: #3a358a;
				}
			}.forgot-section{
				margin-left: 25%;}
				span#password-error {
    color: red;
}
			</style>
		</head>
		<body class="page-template-default page page-id-83 page-child parent-pageid-502 skin-medio wpb-js-composer js-comp-ver-5.4.4 vc_responsive">
			<!-- Loader -->
			<div id="the_loader" class="uk-flex uk-flex-center uk-flex-middle">
				<div class="loader_indicator"> 
					<svg width="16px" height="12px"><polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline><polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline></svg>
				</div>
			</div>    
			<!-- Wrapper -->
			<div class="wrapper uk-offcanvas-content">
				<!-----------Header Start--------->
					<?php include 'header.php'; ?>
				<!-----------Header End----------->
				<div class="uk-flex uk-child-width-1-2 medio-responsive-menu uk-hidden@m uk-padding-small">
					<div class="uk-flex uk-flex-middle">
						<a href="index.php" class="custom-logo-link" rel="home">
							<img src="wp-content/uploads/sites/31/2017/06/logooo.png" alt=""  class="custom-logo">
						</a>
					</div>
					<div class="uk-flex uk-flex-middle uk-flex-right">
						<a href="#" class="hamburger-menu uk-navbar-toggle uk-navbar-toggle-icon uk-icon"><!---offcanvas---->
							<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><rect y="9" width="20" height="2"></rect><rect y="3" width="20" height="2"></rect><rect y="15" width="20" height="2"></rect></svg>
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
														<ul class="uk-breadcrumb" prefix="#">
															<li typeof="v:Breadcrumb"><a href="index.php" rel="v:url" property="v:title">Home</a></li>  <li typeof="v:Breadcrumb">
															<a href="reset_password.php" rel="v:url" property="v:title">Reset Password</a></li>
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
				<section class="uk-section" style="padding-top:100px;padding-bottom:0px;" >
					<div class="uk-container uk-container-default uk-position-relative" style="padding-bottom:6%">
						<div class="uk-grid uk-flex uk-flex-center">
							<div class="uk-width-1-1@s">
								<article class="medio-page-single uk-article post-83 page type-page status-publish hentry">
									
									<div class="vc_row wpb_row vc_row-fluid vc_custom_1491236164137">
										<div class="wpb_column vc_column_container vc_col-sm-3 text-center">
											<div class="login-tex">
											<h3 style="margin-top: 10%;font-size: xx-large;">Welcome</h3>
											<p> Udawat Gastroenterology Clinic</p>
										   <a class="nav-link" id="home-tab" data-toggle="tab" href="login.php" role="tab" aria-controls="home" style="background-color: #fff;border-bottom-left-radius: 25px;border-bottom-right-radius: 25px;border-top-left-radius: 25px;border-top-right-radius: 25px;">LOGIN</a>
											</div>
										</div>
										<div class="wpb_column vc_column_container vc_col-sm-9 text-center">
											<div class="form-section">
												<form action="script_resetpassword.php" id="myform" name="resetpass" enctype="multipart/form-data" method="post">
													<div class="tab-content" id="myTabContent">
														<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
														<?php echo $notification; ?>
															<h3 class="register-heading">Reset Password</h3>
															<div class="row">
															
																<div class="col-md-6 forgot-section">
																	<div class="form-group">
																		<input type="email" name="txt_email" id="txt_email" class="form-control" placeholder="Enter Registered Email *" value="<?php echo $email;?>" required />
																	</div>
																</div>
																<div class="col-md-6 forgot-section">
																	<div class="form-group">
																		<input type="password" name="password" id="password" class="form-control" placeholder="Enter New password *" value="" required autocomplete="off" />
																	</div>
																</div>
																<input type="submit" class="btnRegister" id="btn_submit" name="Btnsubmit" style="margin-top: 2%;margin-left: 33%;padding: 4px;width: 35%;background-color:#3a358a" value="Forgot Password"/>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="vc_row-full-width vc_clearfix"></div>
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
		<script type='text/javascript' src='wp-content/themes/medio/js/scripts.min7752.js?ver=5.2.1'></script>
		<script type='text/javascript' src='wp-content/themes/medio/includes/vc-extend/scripts7752.js?ver=5.2.1'></script>
		<script type='text/javascript' src='wp-includes/js/wp-embed.min7752.js?ver=5.2.1'></script>
		<script type='text/javascript' src='wp-content/plugins/js_composer/assets/js/dist/js_composer_front.min7263.js?ver=5.4.4'></script>
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	</body>
</html>
<script>
	$(document).ready(function () {
		$.validator.addMethod("customemail", function (value, element, params) {
			if (value == '')
				return true;
			var ptrn = /^([a-zA-Z0-9_\.\-\'])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value);
			return ptrn;
		});
		$.validator.addMethod("pwcheck", function (value) {
					return /[\@\#\$\%\^\&\*\(\)\_\+\!]/.test(value) && /[a-z]/.test(value) && /[0-9]/.test(value) && /[A-Z]/.test(value)
		});
		$('#myform').validate({
			rules: {
				txt_email: {
					required: true,
					customemail: true,
				},
				password: {
					required: true,
					minlength: 10,
					pwcheck: true,
				},
			},
			messages: {
				txt_email: {
					required: "Enter a valid email address.",
					customemail: "Please enter a valid email address",
				},
				password: {
					required: "Enter a valid Password.",
					pwcheck: "Password at least have 1 uppercase, 1 lowercase, 1 special character and 1 digit."

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
</script><?php



?>