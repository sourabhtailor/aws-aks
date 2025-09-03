<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">

	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Endoscopy</title>
		<link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
		<link rel="alternate" type="application/rss+xml" title="Medio Hospital &raquo; Feed" href="../../feed/index.html" />
		<link rel="alternate" type="application/rss+xml" title="Medio Hospital &raquo; Comments Feed" href="../../comments/feed/index.html" />

		<script data-require="jquery@*" data-semver="2.2.0" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script data-require="bootstrap@*" data-semver="3.3.6" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link data-require="bootstrap-css@3.3.6" data-semver="3.3.6" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" />
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
		
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
		
		
		<style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1551541901651{margin-top: 46px !important;}.vc_custom_1554171066700{padding-top: 30px !important;padding-bottom: 50px !important;}.vc_custom_1551767028403{padding-right: 15px !important;}.vc_custom_1551766958397{border-left-width: 1px !important;padding-left: 20px !important;border-left-color: #b2bcbd !important;border-left-style: solid !important;}.vc_custom_1551534769676{margin-bottom: -7px !important;}.vc_custom_1552802309911{margin-top: 0px !important;margin-bottom: 0px !important;}.vc_custom_1551535277062{margin-bottom: -7px !important;}.vc_custom_1552802384924{margin-top: 0px !important;margin-bottom: 0px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1554110925366{background-image: url(wp-content/uploads/sites/31/2017/06/bannerpic.png?id=1001) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554110862652{margin-left: -15px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1553482574309{padding-bottom: 0px !important;}.vc_custom_1552749412294{margin-top: 0px !important;padding-top: 0px !important;background-image: url(wp-content/uploads/sites/31/2017/06/Path-211a80.png?id=1281) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554787876299{background-color: #4f4780 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552321818900{margin-bottom: 0px !important;}.vc_custom_1554719683187{margin-top: 135px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552754605138{margin-left: -15px !important;}.vc_custom_1554786847685{margin-bottom: 0px !important;}.vc_custom_1552754523147{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1552754535828{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1554788006379{padding-top: 25px !important;}.vc_custom_1554789825528{padding-top: 20px !important;}.vc_custom_1554787620879{margin-bottom: 0px !important;}@media screen and (min-width: 980px) {
			.form-padding {
			  padding-left: 50px;
			  padding-right: 50px;
			}
		}
		div#top-header-section {
			margin-right: 4px;
		}
		.vc_column_container>.vc_column-inner {
    box-sizing: border-box;
    padding-left: 3px !important;
    padding-right: 31px !important;
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
			margin: 22px;
		}
		div#booking-appointment {
			padding-left: 232px !important;
			padding-right: 0px !important;
			width: 106em !important;
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
		}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1509939171657{margin-top: 100px !important;}.vc_custom_1509939179248{margin-bottom: 100px !important;}.vc_custom_1509939551805{margin: 0px !important;}.vc_custom_1509939644011{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 30px !important;margin-left: 0px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1551541901651{margin-top: 46px !important;}.vc_custom_1554171066700{padding-top: 30px !important;padding-bottom: 50px !important;}.vc_custom_1551767028403{padding-right: 15px !important;}.vc_custom_1551766958397{border-left-width: 1px !important;padding-left: 20px !important;border-left-color: #b2bcbd !important;border-left-style: solid !important;}.vc_custom_1551534769676{margin-bottom: -7px !important;}.vc_custom_1552802309911{margin-top: 0px !important;margin-bottom: 0px !important;}.vc_custom_1551535277062{margin-bottom: -7px !important;}.vc_custom_1552802384924{margin-top: 0px !important;margin-bottom: 0px !important;}#header {background-color:#63599e;position:absolute;width:100%; z-index:9999;}.medio-responsive-menu{background:#63599e;}.themeton-menu > li > a {font-family:Poppins!important;font-weight:300!important;text-transform:uppercase!important;font-size:14px!important;line-height:14px!important;color:#ffffff!important;}.themeton-menu > li > a {padding-top:10px !important;padding-right:23px !important;padding-bottom:10px !important;padding-left:23px !important;}.themeton-menu > li > a:hover,.themeton-menu > li > a:focus {color:#e2e2e2!important;}.themeton-menu li ul li a {color:#beb6ea!important;}.themeton-menu > li ul li {}.themeton-menu > li ul li a:hover {color:#ffffff!important;}.themeton-menu > li ul li.current_page_item > a {color:#988aea!important;}.themeton-menu > li > .sub-menu, .themeton-menu > li > .sub-menu > li .sub-menu  {background-color:rgba(64,54,120,1)!important;}.themeton-menu > li ul li {border-color:rgba(91,80,150,1)!important;}.vc_custom_1554110925366{background-image: url(wp-content/uploads/sites/31/2017/06/bannerpic.png?id=1001) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554110862652{margin-left: -15px !important;}#page-title {}@media screen and (min-width: 980px) {
			.form-padding {
			  padding-left: 50px;
			  padding-right: 50px;
			}
		}
		
		@media only screen and (max-width: 768px) {
		div#services-sectio {
			padding: 15px !important;
		}
		a.uk-button.uk-button-default.appoint{
			width: 100% !important;
			margin-left: 0% !important;
		}
		.uk-section {
			box-sizing: border-box;
			padding-top: 40px;
			padding-bottom: 0px;
		}
		img.vc_single_image-img.endoscopy {
			width: 100%;
			margin: 0px !important;
		}
		div#booking-appointment {
			padding-left: 0px !important;
			padding-right: 0px !important;
			width: 360px !important;
			height:200px;
		}
		div#booking_appointment{
			display: block !important;
			width: 100%;
			text-align: center;
		}
		.mungu-element.mungu-button.uk-flexs.button-section {
			width: 100% !important;
			text-align: center !important;
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
		
		<style type="text/css" title="dynamic-css" class="options-output">.wrapper>.page-title{background-color:#3db8db;background-size:cover;background-image:url('wp-content/uploads/sites/2/2017/03/page-title-bg.html');}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1509351048319{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1526664358618{padding-bottom: 20px !important;background-image: url(wp-content/uploads/sites/31/2018/05/violet-box983f.jpg?id=1199) !important;background-position: 0 0 !important;background-repeat: repeat !important;}.vc_custom_1509329972854{margin-top: 50px !important;}.vc_custom_1491224124353{margin-bottom: 100px !important;}</style><noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>
	</head>
	<body class="service-template-default single single-service postid-143 skin-medio wpb-js-composer js-comp-ver-5.4.4 vc_responsive">
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
		<!-----------Header Start--------->
		<?php include 'header.php'; ?>
		<!-----------Header End----------->	
		<div class="uk-flex uk-child-width-1-2 medio-responsive-menu uk-hidden@m uk-padding-small">
		   <div class="uk-flex uk-flex-middle"><a href="index.php" class="custom-logo-link" rel="home"><img src="wp-content/uploads/sites/31/2017/06/logooo.png" alt=""  class="custom-logo"></a></div>
		   <div class="uk-flex uk-flex-middle uk-flex-right">
			  <a href="#" class="hamburger-menu uk-navbar-toggle uk-navbar-toggle-icon uk-icon">
				 <!----offcanvas--->
				 <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
									  <ul class="uk-breadcrumb" prefix="v: http://rdf.data-vocabulary.org/#">
										 <li typeof="v:Breadcrumb"><a href="index.php" rel="v:url" property="v:title">Home</a></li>
										 <li typeof="v:Breadcrumb"><a href="service.php" rel="v:url" property="v:title">Service</a></li>
										 <li typeof="v:Breadcrumb"><a href="service_endoscopy.php" rel="v:url" property="v:title">Endoscopy</a></li>
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
		<!-- Content
		   ================================================== -->
		<section class="uk-section" style="padding-top:25px;">
		   <div class="uk-container uk-position-relative">
			  <div class="uk-grid uk-flex uk-flex-center">
				 <div id="services-sectio" class="medio-blog-container uk-width-1-1@s">
					<article class="medio-blog-single uk-article post-143 service type-service status-publish has-post-thumbnail hentry service_category-service">
					   <div class="uk-text-center">
						  <h1 class='post-title medio-brand-title'>Endoscopy</h1>
					   </div>
					   <div class="medio-blog-content mb0">
						  <div class='post-content'>
							 <div class="vc_row wpb_row vc_row-fluid vc_custom_1509351048319 vc_row-has-fill">
								<div class="wpb_column vc_column_container vc_col-sm-12">
								   <div class="vc_column-inner ">
									  <div class="wpb_wrapper" style="margin-left: 20%;margin-right: 20%;">
										 <h2 style="font-size: 30px;line-height: 1.3em;text-align: center" class="vc_custom_heading" >Endoscopy</h2>
										 <div  class="wpb_single_image wpb_content_element vc_align_center">
											<figure class="wpb_wrapper vc_figure">
											   <div class="vc_single_image-wrapper   vc_box_border_grey"><img class="vc_single_image-img endoscopy" src="wp-content/uploads/sites/31/2017/30/he1.jpg" alt="service-gasternology" title="service-gasternology" style="width: 73%;
												  margin-left: -81%;"/></div>
											</figure>
										 </div>
										 <div  class="wpb_single_image wpb_content_element vc_align_center">
											<figure class="wpb_wrapper vc_figure">
											   <div class="vc_single_image-wrapper   vc_box_border_grey"><img class="vc_single_image-img endoscopy" src="wp-content/uploads/sites/31/2017/30/endoscopy.jpg" width="1170" height="450" alt="service-gasternology" title="service-gasternology" style="width: 85%;margin-left: 57%;margin-top: -108%;"/></div>
											</figure>
										 </div>
									  </div>
								   </div>
								</div>
							 </div>
							 <div class="vc_row wpb_row vc_row-fluid">
								<div class="wpb_column vc_column_container vc_col-sm-12">
								   <div class="vc_column-inner ">
									  <div class="wpb_wrapper">
										 <div class="vc_row wpb_row vc_inner vc_row-fluid">
											<div class="wpb_column vc_column_container vc_col-sm-2">
											   <div class="vc_column-inner ">
												  <div class="wpb_wrapper"></div>
											   </div>
											</div>
											<div class="wpb_column vc_column_container vc_col-sm-8">
											   <div class="vc_column-inner ">
												  <div class="wpb_wrapper">
													 <div class="wpb_text_column wpb_content_element " >
														<div class="wpb_wrapper">
														   <p style="font-size: 130%;font-style: initial;text-align:justify;font-weight: 600;color: black;">What is an GI Endoscopy ?</p>
														   <p style="text-align:justify">An upper GI Endoscopy is a procedure to diagnose and treat problems in your upper GI (Gastrointestinal) tract. The upper GI tract includes your food pipe (esophagus), stomach, and the first part of your small intestine (the duodenum). This procedure is done using a long, flexible tube called and an endoscope. The tube has a tiny light and video camera on one end. The tube is put into your mouth and throat. Then it is slowly pushed through your esophagus and stomach, and into your duodenum. Video images from the tube are seen on a monitor.</p>
														</div>
													 </div>
													 <h4 style="text-align: left;font-weight: 600;font-family:Open Sans, Arial, sans-serif;" class="vc_custom_heading" >The most common reasons for upper Endoscopy include:</h4>
													 <ul class='mungu-element icon-list-element' style="text-align:justify">
														<li><i class='fa fa-long-arrow-right'  style='color: rgba(0,0,0,0.5);'></i>Difficulty swallowing: food/liquids getting stuck in the esophagus during.
														</li>
														<li><i class='fa fa-long-arrow-right'  style='color: rgba(0,0,0,0.5);'></i>Iron deficiency anemia (low blood count associated with a low iron level in the blood) in someone who has had no visible bleeding.</li>
														<li><i class='fa fa-long-arrow-right'  style='color: rgba(0,0,0,0.5);'></i> Upper gastrointestinal (GI) bleeding (vomiting blood or blood found in the stool that originated from the upper part of the GI tract). Bleeding can be treated during the endoscopy. </li>
														<li><i class='fa fa-long-arrow-right'  style='color: rgba(0,0,0,0.5);'></i>GERD or gastroesophageal reflux disease (often called heartburn).</li>
														<li><i class='fa fa-long-arrow-right'  style='color: rgba(0,0,0,0.5);'></i>Unexplained discomfort or pain in the upper abdomen.</li>
														<li><i class='fa fa-long-arrow-right'  style='color: rgba(0,0,0,0.5);'></i>Persistent nausea vomiting.</li>
													 </ul>
													 <!-- end .icon-list-element -->
													 <h4 style="text-align: left;font-weight: 600;font-family:Open Sans, Arial, sans-serif;" class="vc_custom_heading" >What will happen during the tests ?</h4>
													 <ul class='mungu-element icon-list-element' style="text-align:justify">
														<li><i class='fa fa-long-arrow-right'  style='color: rgba(0,0,0,0.5);'></i>You will be asked to lie on your left side. This provides the best view of the stomach.
														</li>
														<li><i class='fa fa-long-arrow-right'  style='color: rgba(0,0,0,0.5);'></i>Your blood pressure, pulse, breathing, and blood oxygen levels will be monitored during the test. An intravenous (IV) needle will be placed in your arm to provide a sedative. Sedatives help you stay relaxed and comfortable during the procedure. In some cases, the procedure can be performed without sedation. You will be given a liquid anesthetic on the back of your throat.</li>
														<li><i class='fa fa-long-arrow-right'  style='color: rgba(0,0,0,0.5);'></i>The doctor will carefully feed the endoscope down your esophagus and into your stomach and duodenum. A small camera mounted on the endoscope will send a video image to a monitor, allowing close examination of the lining of your upper GI tract.</li>
														<li><i class='fa fa-long-arrow-right'  style='color: rgba(0,0,0,0.5);'></i>Air or carbon dioxide gas is gently introduced through the endoscope to open the esophagus, stomach, and intestine, allowing the endoscope to be passed through these areas and improving the doctor's ability to see completely. The air may give you some discomfort or pressure. This is not harmful, this feeling is normal and should go away soon after the test.</li>
														<li><i class='fa fa-long-arrow-right'  style='color: rgba(0,0,0,0.5);'></i>The procedure typically takes 15 to 30 minutes, depending on your situation.</li>
														<li><i class='fa fa-long-arrow-right'  style='color: rgba(0,0,0,0.5);'></i>Persistent nausea vomiting.</li>
													 </ul>
													 <!-- end .icon-list-element -->
												  </div>
											   </div>
											</div>
											<div class="wpb_column vc_column_container vc_col-sm-2">
											   <div class="vc_column-inner ">
												  <div class="wpb_wrapper"></div>
											   </div>
											</div>
										 </div>
										 <!-- end .uk-slider -->
										 <div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1509329972854">
											<div class="wpb_column vc_column_container vc_col-sm-2">
											   <div class="vc_column-inner ">
												  <div class="wpb_wrapper"></div>
											   </div>
											</div>
											<div class="wpb_column vc_column_container vc_col-sm-4">
											   <div class="vc_column-inner ">
												  <div class="wpb_wrapper">
													 <div class="wpb_text_column wpb_content_element " >
														<div class="wpb_wrapper">
														   <p style="text-align:justify">If you have constant complaints to your family doctor about digestive problems such as frequent abdominal pain, nausea, or heartburn then something is affecting your digestive system. </p>
														</div>
													 </div>
												  </div>
											   </div>
											</div>
											<div class="wpb_column vc_column_container vc_col-sm-4">
											   <div class="vc_column-inner ">
												  <div class="wpb_wrapper">
													 <div class="wpb_text_column wpb_content_element " >
														<div class="wpb_wrapper">
														   <p style="text-align:justify">Your doctor may recommend some lifestyle changes, or treat the condition with over-the-counter or prescription drugs to prevent your symptoms from worsening.</p>
														</div>
													 </div>
												  </div>
											   </div>
											</div>
											<div class="wpb_column vc_column_container vc_col-sm-2">
											   <div class="vc_column-inner ">
												  <div class="wpb_wrapper"></div>
											   </div>
											</div>
										 </div>
										 <div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1491224124353">
											<div class="wpb_column vc_column_container vc_col-sm-2">
											   <div class="vc_column-inner ">
												  <div class="wpb_wrapper"></div>
											   </div>
											</div>
											<div class="wpb_column vc_column_container vc_col-sm-4">
											   <div class="vc_column-inner ">
												  <div class="wpb_wrapper"></div>
											   </div>
											</div>
											<div class="wpb_column vc_column_container vc_col-sm-4">
											   <div class="vc_column-inner ">
												  <div class="wpb_wrapper"></div>
											   </div>
											</div>
											<div class="wpb_column vc_column_container vc_col-sm-2">
											   <div class="vc_column-inner ">
												  <div class="wpb_wrapper"></div>
											   </div>
											</div>
										 </div>
									  </div>
								   </div>
								</div>
							 </div>
							 <!--------------////////////////////////////////////////////////////---->
							<div data-vc-full-width="true" id="booking-appointment" data-vc-full-width-init="true" class="vc_row wpb_row vc_row-fluid pr6@s pl6@s vc_custom_1526664358618 vc_row-has-fill vc_row-o-content-middle vc_row-flex" style="position: relative; box-sizing: border-box;background-image: url(wp-content/uploads/sites/31/2018/05/violet-box983f.jpg?id=1199) !important;">
								<div class="wpb_column vc_column_ vc_col-sm-12" style="margin-top: -30px;margin-bottom: -30px;">
								   <div class="vc_column-inner ">
									  <div class="wpb_wrapper">
										 <div class="mungu-element mungu-element-counter uk-section text-light ml8@s " style="padding-bottom:24px;">
											<div class="uk-grid uk-grid-small uk-scrollspy uk-child-width-expand uk-flex-left uk-text-left">
											   <div class="wpb_column vc_column_container vc_col-sm-12">
												  <div class="vc_column-inner ">
													 <div class="wpb_wrapper" style="display: inline-flex; width:100%;" id="booking_appointment">
														<div style="" class="mungu-element mungu-button uk-flex ">
														   <p style="font-size: 26px;font-weight: 500;margin-top:12px;margin-bottom:41px;">To book an appointment, please call this number!</p>
														</div>
														<div class="mungu-element mungu-button uk-flexs button-section" style="width:50%;text-align:center;">
														   <button type="submit" class="uk-button uk-button-default" style="border: 1px solid #4cadc9;background-color:#4cadc9;border-radius: 30px;"><a href="tel:9928076901">+91 9928076901</a></button>
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
						  </div>
						  <!-- end .post-content -->
						  <div class='uk-clearfix'></div>
						  <!----<hr class='mb3'>--->
						  <div class="uk-clearfix clearfix"></div>
						  <div class='uk-clearfix'></div>
					   </div>
					   <!-- end .medio-blog-content -->
					   <div class="uk-clearfix clearfix"></div>
					</article>
				 </div>
				 <!-- end .medio-blog-container -->
			  </div>
			  <!-- end .uk-grid -->
		   </div>
		   <!-- end .uk-container -->
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

</html>