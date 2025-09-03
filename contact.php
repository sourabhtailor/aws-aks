<?php
session_start();
ini_set('display_errors', 1);
$notification = '';
	if (isset($_SESSION['success_msg'])) {
		$notification = '<div role="alert" class="alert alert-success"><button type="button" class="close" id="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Success!</strong> ' . $_SESSION['success_msg'] . '</div>';
		unset($_SESSION['success_msg']);
	}
	if (isset($_SESSION['failure_msg'])) {
		$notification = '<div role="alert" class="alert alert-danger"><button type="button" class="close" id="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Failed!</strong> ' . $_SESSION['failure_msg'] . '</div>';
		unset($_SESSION['failure_msg']);
	}
?>
<!DOCTYPE html>
<html lang="en-US" class="no-js">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Contact Us</title>
		<script data-require="jquery@*" data-semver="2.2.0" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script data-require="bootstrap@*" data-semver="3.3.6" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link data-require="bootstrap-css@3.3.6" data-semver="3.3.6" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" />
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
		<script src='https://www.google.com/recaptcha/api.js' async defer ></script>
		<style type="text/css">
			@media only screen and (max-width: 768px) {
				.uk-grid>* {
					padding-left: 0px !important;
				}
				
				.uk-input, .uk-select, .uk-select:not([multiple]):not([size]) {
					height: 46px !important;
				}
				a.uk-button.uk-button-default.contact-section{
					width: 100%;
					margin-left: 0 !important;
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
				.mungu-element.mungu-button.uk-flexs.button-section {
					width: 100% !important;
					text-align: center !important;
				}
				div#booking-appointment {
					padding-left: 0px !important;
					padding-right: 0px !important;
					width: 360px !important;
					height:200px;
				}
				.mungu-element.mungu-button.text-sect {
					width: 100% !important;
					float: none !important;
					text-align:center;
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
		.vc_custom_1508824581122{padding-top: 36px !important;padding-right: 60px !important;padding-bottom: 30px !important;padding-left: 60px !important;background-color: #403678 !important;}.vc_custom_1509092891283{border-bottom-width: 1px !important;padding-bottom: 30px !important;border-bottom-color: #5b5096 !important;border-bottom-style: solid !important;}.vc_custom_1508823233184{margin-right: 0px !important;margin-left: 0px !important;}.vc_custom_1508823425668{padding-left: 0px !important;}.vc_custom_1508823431780{padding-right: 0px !important;}.vc_row.wpb_row.vc_inner.vc_row-fluid.vc_custom_155176695839k.vc_row-has-fill {
    padding-left: 5px;
}
		</style>
		<link rel='stylesheet' id='themeton-custom-stylesheet-css'  href='wp-content/uploads/sites/31/2019/04/medio7752.css?ver=5.2.1' type='text/css' media='all' />
		<link rel='stylesheet' id='js_composer_front-css'  href='wp-content/plugins/js_composer/assets/css/js_composer.min7263.css?ver=5.4.4' type='text/css' media='all' />

		<script type='text/javascript' src='wp-includes/js/jquery/jquery4a5f.js?ver=1.12.4-wp'></script>
		<script type='text/javascript' src='wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1'></script>
		<script type='text/javascript' src='wp-content/plugins/revslider/public/assets/js/jquery.themepunch.tools.min23da.js?ver=5.4.8'></script>
		<script type='text/javascript' src='wp-content/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min23da.js?ver=5.4.8'></script>

		<script type='text/javascript' src='wp-includes/js/mediaelement/mediaelement-and-player.min45a0.js?ver=4.2.6-78496d1'></script>
		<script type='text/javascript' src='wp-includes/js/mediaelement/mediaelement-migrate.min7752.js?ver=5.2.1'></script>

		<style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1551541901651{margin-top: 46px !important;}.vc_custom_1554171066700{padding-top: 30px !important;padding-bottom: 50px !important;}.vc_custom_1551767028403{padding-right: 22px !important;}.vc_custom_1551766958397{border-left-width: 1px !important;padding-left: 20px !important;border-left-color: #b2bcbd !important;border-left-style: solid !important;}.vc_custom_1551534769676{margin-bottom: -7px !important;}.vc_custom_1552802309911{margin-top: 0px !important;margin-bottom: 0px !important;}.vc_custom_1551535277062{margin-bottom: -7px !important;}.vc_custom_1552802384924{margin-top: 0px !important;margin-bottom: 0px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1554110925366{background-image: url(wp-content/uploads/sites/31/2017/06/bannerpic.png?id=1001) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554110862652{margin-left: -15px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1553482574309{padding-bottom: 0px !important;}.vc_custom_1552749412294{margin-top: 0px !important;padding-top: 0px !important;background-image: url(wp-content/uploads/sites/31/2017/06/Path-211a80.png?id=1281) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554787876299{background-color: #4f4780 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552321818900{margin-bottom: 0px !important;}.vc_custom_1554719683187{margin-top: 135px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552754605138{margin-left: -15px !important;}.vc_custom_1554786847685{margin-bottom: 0px !important;}.vc_custom_1552754523147{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1552754535828{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1554788006379{padding-top: 25px !important;}.vc_custom_1554789825528{padding-top: 20px !important;}.vc_custom_1554787620879{margin-bottom: 0px !important;}@media screen and (min-width: 980px) {
			.form-padding {
			  padding-left: 50px;
			  padding-right: 50px;
			}
		}.vc_column_container>.vc_column-inner {
					box-sizing: border-box;
					padding-left: 3px;
					padding-right: 20px !important;
					width: 100%;
				}
		.mungu-element.mungu-button.text-sect {
			width: 49%;
			float: left;
		}
		.mungu-element.mungu-button.button-sectione {
			float: right;
		}
		.mungu-element.mungu-button.text-sect p {
			padding-top: 11px;
		}
		.mungu-element.mungu-element-counter.uk-section{
			padding-bottom:48px;
		}

		a.btn.btn-default.btn-rounded.mb-4 {
			padding: 2px;
		}


			@media only screen and (max-width: 768px) {
				p.contact-appointment-sec {
					margin-left: 0px !important;
				}
				.vc_custom_1553502786044 {
					padding-bottom: 56px !important;
					height: 232px;
				}
				.mungu-element.mungu-button.button-sectione {
					float: none;
					text-align: center;
					width: 100%;
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
		}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1509939171657{margin-top: 100px !important;}.vc_custom_1509939179248{margin-bottom: 100px !important;}.vc_custom_1509939551805{margin: 0px !important;}.vc_custom_1509939644011{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 30px !important;margin-left: 0px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1551541901651{margin-top: 46px !important;}.vc_custom_1554171066700{padding-top: 30px !important;padding-bottom: 50px !important;}.vc_custom_1551767028403{padding-right: 22px !important;}.vc_custom_1551766958397{border-left-width: 1px !important;padding-left: 20px !important;border-left-color: #b2bcbd !important;border-left-style: solid !important;}.vc_custom_1551534769676{margin-bottom: -7px !important;}.vc_custom_1552802309911{margin-top: 0px !important;margin-bottom: 0px !important;}.vc_custom_1551535277062{margin-bottom: -7px !important;}.vc_custom_1552802384924{margin-top: 0px !important;margin-bottom: 0px !important;}#header {background-color:#63599e;position:absolute;width:100%; z-index:9999;}.medio-responsive-menu{background:#63599e;}.themeton-menu > li > a {font-family:Poppins!important;font-weight:300!important;text-transform:uppercase!important;font-size:14px!important;line-height:14px!important;color:#ffffff!important;}.themeton-menu > li > a {padding-top:10px !important;padding-right:23px !important;padding-bottom:10px !important;padding-left:23px !important;}.themeton-menu > li > a:hover,.themeton-menu > li > a:focus {color:#e2e2e2!important;}.themeton-menu li ul li a {color:#beb6ea!important;}.themeton-menu > li ul li {}.themeton-menu > li ul li a:hover {color:#ffffff!important;}.themeton-menu > li ul li.current_page_item > a {color:#988aea!important;}.themeton-menu > li > .sub-menu, .themeton-menu > li > .sub-menu > li .sub-menu  {background-color:rgba(64,54,120,1)!important;}.themeton-menu > li ul li {border-color:rgba(91,80,150,1)!important;}.vc_custom_1554110925366{background-image: url(wp-content/uploads/sites/31/2017/06/bannerpic.png?id=1001) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554110862652{margin-left: -15px !important;}#page-title {}@media screen and (min-width: 980px) {
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
		.help-block {
			color: red;
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

		<style type="text/css" title="dynamic-css" class="options-output">.wrapper>.page-title{background-color:#3db8db;background-size:cover;background-image:url('wp-content/uploads/sites/2/2017/03/page-title-bg.html');}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1491236164137{margin-top: 50px !important;}.vc_custom_1553502786044{padding-bottom: 20px !important;background-image: url(wp-content/uploads/sites/31/2018/05/violet-box983f.jpg?id=1199) !important;background-position: 0 0 !important;background-repeat: repeat !important;}.vc_custom_1553502693329{margin-bottom: 0px !important;}.vc_custom_1553502900045{margin-bottom: 0px !important;}</style><noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }
		</style></noscript>
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
				<?php include 'header.php';?>
			<!-----------Header End----------->
			<div class="uk-flex uk-child-width-1-2 medio-responsive-menu uk-hidden@m uk-padding-small">
				<div class="uk-flex uk-flex-middle">
					<a href="index.php" class="custom-logo-link" rel="home">
						<img src="wp-content/uploads/sites/31/2017/06/logooo.png" alt=""  class="custom-logo">
					</a>
				</div>
				<div class="uk-flex uk-flex-middle uk-flex-right">
					<a href="#" class="hamburger-menu uk-navbar-toggle uk-navbar-toggle-icon uk-icon"><!--offcanvas---->
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
													<ul class="uk-breadcrumb" prefix="v: http://rdf.data-vocabulary.org/#">
														<li typeof="v:Breadcrumb"><a href="index.php" rel="v:url" property="v:title">Home</a></li>  <li typeof="v:Breadcrumb"><a href="contact.php" rel="v:url" property="v:title">Contact</a></li>
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
								<div class="vc_row wpb_row vc_row-fluid">
									<div class="wpb_column vc_column_container vc_col-sm-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<h3 style="font-size: 36px;line-height: 1;text-align: center" class="vc_custom_heading vc_custom_1553502693329" >Get in touch</h3>
												<div class="wpb_text_column wpb_content_element  vc_custom_1553502900045" >
													<div class="wpb_wrapper">
														<p style="text-align: center; font-weight: 500;">For better services contact us today</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php echo $notification; ?>
								<div class="vc_row wpb_row vc_row-fluid vc_custom_1491236164137">
									<div class="wpb_column vc_column_container vc_col-sm-6">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div role="form" class="wpcf7" id="wpcf7-f733-p83-o1" lang="en-US" dir="ltr">
													<div class="screen-reader-response" id="mail-status"></div>
													<form action="contact_callback.php" id="myform" autocomplete="off" method="POST" class="wpcf7-form" id="quick_profile_frm" novalidate="novalidate">
														<div class="uk-grid-small uk-margin-remove-top uk-grid ">
															<div class="uk-width-1-1@m uk-grid-margin">
																<div class="uk-inline uk-width-1-1@m ">
																	<!--<span class="uk-form-icon uk-icon" data-ukicon="icon: user"></span>-->
																	<span class="wpcf7-form-control-wrap text-546">
																		<input type="text" name="userName" id="userName" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required uk-input" aria-required="true" aria-invalid="false" placeholder="YOUR NAME*" />
																	</span>
																</div>
															</div>
															<div class="uk-width-1-1@m uk-grid-margin">
																<div class="uk-inline uk-width-1-1@m ">
																<!--	<span class="uk-form-icon uk-icon" data-ukicon="icon: mail"></span>-->
																	<span class="wpcf7-form-control-wrap email-917">
																		<input type="email" name="userEmail" id="userEmail" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email uk-input" aria-required="true" aria-invalid="false" placeholder="EMAIL ADDRESS*" />
																	</span>
																</div>
															</div>
															<div class="uk-width-1-1@m uk-grid-margin">
																<div class="uk-inline uk-width-1-1@m ">
																	<!--<span class="uk-form-icon uk-icon" data-ukicon="icon: phone"></span>-->
																	<span class="wpcf7-form-control-wrap tel-182">
																		<input type="text" name="subject" id="subject" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-text wpcf7-validates-as-required wpcf7-validates-as-required uk-input" aria-required="true" aria-invalid="false" placeholder="SUBJECT*" />
																	</span>
																</div>
															</div>
															<div class="uk-width-1-1@m uk-grid-margin">
																<div class="uk-inline uk-width-1-1@m ">
																	<!--<span class="uk-form-icon textarea-icon uk-icon" data-ukicon="icon: comment"></span>-->
																	<span class="wpcf7-form-control-wrap textarea-685">
																		<textarea name="content" id="content" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required uk-textarea uk-height-small" aria-required="true" aria-invalid="false" placeholder="MESSAGE*"></textarea>
																	</span>
																</div> 
															</div>
															<div class="form-group" style="margin-top:4%;">
																<div class="g-recaptcha" data-sitekey="6Ldn6NoUAAAAACldbB2YeFgTvksnMwFchtatAZHa"></div>
															</div>
															<div class="uk-width-1-1@m uk-grid-margin uk-text-left">
																<input type="submit" id="btn_submit" value="SUBMIT NOW" name="Btnsubmit" class="wpcf7-form-control wpcf7-submit uk-button uk-button-default btnAction">
															</div>
														</div>
														<div class="wpcf7-response-output wpcf7-display-none"></div>
													</form>
												</div>
												<div class="vc_empty_space"   style="height: 40px" ><span class="vc_empty_space_inner"></span></div>
											</div>
										</div>
									</div>
									<div class="wpb_column vc_column_container vc_col-sm-6">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div class="vc_empty_space"   style="height: 15px" ><span class="vc_empty_space_inner"></span></div>
												<div id="mungu-google-map" class="mungu-google-map  " style="height:345px;" data-lat="26.895770" data-lng="75.765849" data-zoom="10" data-saturation="-100" data-color="rgba(53,234,234,0.83)" data-marker="wp-content/uploads/sites/31/2017/03/marker.png">
													<div id="gmap_content">
														<div class="gmap-item"><label class="label-title">Keep in touch</label></div>
														<div class="gmap-item"><label><i class="fa fa-map-marker"></i></label><span>UdawatGastroenterologyClinic</span></div>
													</div>
												</div>
												<div class="vc_empty_space"   style="height: 40px" ><span class="vc_empty_space_inner"></span></div>
											</div>
										</div>
									</div>
								</div>
								<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid pr6@s pl6@s vc_custom_1553502786044 vc_row-has-fill vc_row-o-content-middle vc_row-flex">
									<div class="wpb_column vc_column_container vc_col-sm-12" style="margin-top: -30px;margin-bottom: -30px;">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div class='mungu-element mungu-element-counter uk-section ml8@s ' style="padding-top:40px;">
													<div class='uk-grid uk-grid-small uk-scrollspy uk-child-width-expand'>
														<div class="wpb_column vc_column_container vc_col-sm-12">
															<div class="vc_column-inner ">
																<div class="wpb_wrapper">
																	<div style="" class="mungu-element mungu-button text-sect">
																			<p style="font-size: 24px;font-weight: 500; color:#fff;margin-left: 31px;">To book an appointment, please call this number!</p>
																		</div>
																		<div class="mungu-element mungu-button button-sectione" style='margin-right: 31px;'>
																			<a class="uk-button uk-button-default about-section" href="tel:9928076901" style="border: 1px solid #4cadc9;background-color:#4cadc9;border-radius: 30px;"><span class="uk-icon"><svg width="40" height="40" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <polyline fill="none" stroke="#000" points="10 5 15 9.5 10 14"></polyline> <line fill="none" stroke="#000" x1="4" y1="9.5" x2="15" y2="9.5"></line></svg></span>+91 9928076901</a>
																		</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
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
<script type='text/javascript' src='wp-content/plugins/themetonaddon/themeton-vc-elements/google-map/google-maps7752.js?ver=5.2.1'></script>
<!--<script type='text/javascript' src='http://maps.googleapis.com/maps/api/js?callback=initMap&amp;key=AIzaSyCUpxdGyYQKY7-WNclYEsCYQughsfx--2o'></script>-->
<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?callback=initMap&amp;key=AIzaSyBzOvVfy7HugDP13xfCXhk-ojs67Q2F1iQ&amp;ver=5.2.1'></script>
<script type='text/javascript' src='wp-content/plugins/mailchimp-for-wp/assets/js/forms-api.min3428.js?ver=4.5.2'></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>
<script>
/* $(".btnAction").click(function(e) {
	$.ajax({
		url: "script_contact_callback.php",
		data: $("#quick_profile_frm").serialize(),
		type: "POST",
		cache : false,
		processData: false,
		success:function(data){
			$("#mail-status").html(data);
			e.preventDefault();
		},
		error:function (){
			e.preventDefault();
		}
		
	});
}); */
</script>
<script>
jQuery("#close").click(function(){
  jQuery(".alert-success").remove();
  jQuery(".alert-danger").remove();
});
            $(document).ready(function () {
                $.validator.addMethod("customemail", function (value, element, params) {
                    if (value == '')
                        return true;
                    var ptrn = /^([a-zA-Z0-9_\.\-\'])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value);
                    return ptrn;
                });
				$('#myform').validate({
					rules: {
						userName: {
							required: true,
						},
						userEmail: {
							required: true,
							customemail: true,
						},	
						subject: {
							required: true,
						},
						content: {
							required: true,
						},
					},
					messages: {
						userName: {
							required: "Please enter user name.",
						},
						userEmail: {
							required: "Please enter a valid email address.",
							customemail: "Please enter a valid email address",
							//remote: "Email already in use.Please try some different Email."
						},
						subject: {
							required: "Please enter subject value.",
						},
						content: {
							required: "Please enter content value.",
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