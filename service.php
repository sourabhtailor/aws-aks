<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Common Diseases</title>
		<script data-require="jquery@*" data-semver="2.2.0" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script data-require="bootstrap@*" data-semver="3.3.6" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link data-require="bootstrap-css@3.3.6" data-semver="3.3.6" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" />
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
			<style type="text/css">
				@media only screen and (max-width: 768px) {
				/* For mobile phones: */
				.vc_column_container>.vc_column-inner {
					box-sizing: border-box;
					padding-left: 0px !important; 
					padding-right: 0px !important; 
					width: 100%;
				}
				.vc_row.wpb_row.vc_row-fluid.service-section .uk-grid-medium>* {
					padding-left: 0px;
				}
				.vc_row.wpb_row.vc_row-fluid.service-section .uk-grid-medium>* {
					padding-left: 36px;
				}
				.uk-grid>* {
					padding-left: 40px;
				}
				section.uk-section.box-section .uk-grid>* {
					padding: 0 10px;
				}
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
				<style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1551541901651{margin-top: 46px !important;}.vc_custom_1554171066700{padding-top: 30px !important;padding-bottom: 50px !important;}.vc_custom_1551767028403{padding-right: 15px !important;}.vc_custom_1551766958397{border-left-width: 1px !important;padding-left: 20px !important;border-left-color: #b2bcbd !important;border-left-style: solid !important;}.vc_custom_1551534769676{margin-bottom: -7px !important;}.vc_custom_1552802309911{margin-top: 0px !important;margin-bottom: 0px !important;}.vc_custom_1551535277062{margin-bottom: -7px !important;}.vc_custom_1552802384924{margin-top: 0px !important;margin-bottom: 0px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1554110925366{background-image: url(wp-content/uploads/sites/31/2017/06/bannerpic.png?id=1001) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554110862652{margin-left: -15px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1553482574309{padding-bottom: 0px !important;}.vc_custom_1552749412294{margin-top: 0px !important;padding-top: 0px !important;background-image: url(wp-content/uploads/sites/31/2017/06/Path-211a80.png?id=1281) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554787876299{background-color: #4f4780 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552321818900{margin-bottom: 0px !important;}.vc_custom_1554719683187{margin-top: 135px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552754605138{margin-left: -15px !important;}.vc_custom_1554786847685{margin-bottom: 0px !important;}.vc_custom_1552754523147{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1552754535828{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1554788006379{padding-top: 25px !important;}.vc_custom_1554789825528{padding-top: 20px !important;}.vc_custom_1554787620879{margin-bottom: 0px !important;}@media screen and (min-width: 980px) {
			.form-padding {
			  padding-left: 50px;
			  padding-right: 50px;
			}
		}

		div#test_section {
			margin-right: 28px;
			//margin-right: -13px;
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
			margin-right: -10px; 
		}
		div#test_section {
			//margin: -13px;
		}
	
		
		@media only screen and (max-width: 768px) {
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
			.mungu-element.mungu-button.uk-flexs.button-section{
				width: 100%;
				text-align: center;
				
			}
			button.uk-button.uk-button-default {
				margin-right: 0px !important;
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
		.vc_column_container>.vc_column-inner {
    box-sizing: border-box;
    padding-left: 3px;
    padding-right: 20px;
    width: 100%;
}
		#scroll:hover {
			box-shadow: none;
		}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1509939171657{margin-top: 100px !important;}.vc_custom_1509939179248{margin-bottom: 100px !important;}.vc_custom_1509939551805{margin: 0px !important;}.vc_custom_1509939644011{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 30px !important;margin-left: 0px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1551541901651{margin-top: 46px !important;}.vc_custom_1554171066700{padding-top: 30px !important;padding-bottom: 50px !important;}.vc_custom_1551767028403{padding-right: 15px !important;}.vc_custom_1551766958397{border-left-width: 1px !important;padding-left: 20px !important;border-left-color: #b2bcbd !important;border-left-style: solid !important;}.vc_custom_1551534769676{margin-bottom: -7px !important;}.vc_custom_1552802309911{margin-top: 0px !important;margin-bottom: 0px !important;}.vc_custom_1551535277062{margin-bottom: -7px !important;}.vc_custom_1552802384924{margin-top: 0px !important;margin-bottom: 0px !important;}#header {background-color:#63599e;position:absolute;width:100%; z-index:9999;}.medio-responsive-menu{background:#63599e;}.themeton-menu > li > a {font-family:Poppins!important;font-weight:300!important;text-transform:uppercase!important;font-size:14px!important;line-height:14px!important;color:#ffffff!important;}.themeton-menu > li > a {padding-top:10px !important;padding-right:23px !important;padding-bottom:10px !important;padding-left:23px !important;}.themeton-menu > li > a:hover,.themeton-menu > li > a:focus {color:#e2e2e2!important;}.themeton-menu li ul li a {color:#beb6ea!important;}.themeton-menu > li ul li {}.themeton-menu > li ul li a:hover {color:#ffffff!important;}.themeton-menu > li ul li.current_page_item > a {color:#988aea!important;}.themeton-menu > li > .sub-menu, .themeton-menu > li > .sub-menu > li .sub-menu  {background-color:rgba(64,54,120,1)!important;}.themeton-menu > li ul li {border-color:rgba(91,80,150,1)!important;}.vc_custom_1554110925366{background-image: url(wp-content/uploads/sites/31/2017/06/bannerpic.png?id=1001) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554110862652{margin-left: -15px !important;}#page-title {}@media screen and (min-width: 980px) {
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
		<style type="text/css" title="dynamic-css" class="options-output">.wrapper>.page-title{background-color:#3db8db;background-size:cover;background-image:url('../wp-content/uploads/sites/2/2017/03/page-title-bg.html');}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1491267630621{margin-bottom: 0px !important;}.vc_custom_1491365011565{padding-top: 40px !important;padding-bottom: 70px !important;}.vc_custom_1526664358618{padding-bottom: 20px !important;background-image: url(wp-content/uploads/sites/31/2018/05/violet-box983f.jpg?id=1199) !important;background-position: 0 0 !important;background-repeat: repeat !important;}.vc_custom_1498035984715{margin-top: 60px !important;}.vc_custom_1491267843350{margin-bottom: 10px !important;}.vc_custom_1498036042062{margin-bottom: 20px !important;}.vc_custom_1554698870833{margin-bottom: 20px !important;}.vc_custom_1554700054930{padding-right: 30px !important;padding-left: 30px !important;}.vc_custom_1554700065787{border-right-width: 1px !important;border-left-width: 1px !important;padding-top: 0px !important;padding-right: 30px !important;padding-left: 30px !important;border-left-color: #edeeee !important;border-left-style: solid !important;border-right-color: #edeeee !important;border-right-style: solid !important;}.vc_custom_1554700076448{padding-right: 30px !important;padding-left: 30px !important;}</style><noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>
	</head>
	<body class="page-template-default page page-id-341 page-parent skin-medio wpb-js-composer js-comp-ver-5.4.4 vc_responsive">
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
					<a href="index.php" class="custom-logo-link" rel="home"><img src="wp-content/uploads/sites/31/2017/06/logooo.png" alt=""  class="custom-logo"></a>
				</div>
				<div class="uk-flex uk-flex-middle uk-flex-right">
					<a href="#" class="hamburger-menu uk-navbar-toggle uk-navbar-toggle-icon uk-icon"><!---offcanvas--->
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
														<li typeof="v:Breadcrumb"><a href="index.php" rel="v:url" property="v:title">Home</a></li><li typeof="v:Breadcrumb"><a href="service.php" rel="v:url" property="v:title">Common Diseases</a></li> 
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
			<section class="uk-section box-section">
				<div class="uk-container uk-container-default uk-position-relative">
					<div class="uk-grid uk-flex uk-flex-center">
						<div class="uk-width-1-1@s">
							<article class="medio-page-single uk-article post-341 page type-page status-publish hentry">
								<div class="vc_row wpb_row vc_row-fluid vc_custom_1491267630621">
									<div class="wpb_column vc_column_container vc_col-sm-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<h2 style="font-size: 30px;color: #161720;text-align: center" class="vc_custom_heading mvb0" >Medical Specialist </h2>
												<div class="wpb_text_column wpb_content_element  vc_custom_1491267843350" >
													<div class="wpb_wrapper">
														<p style="text-align: center; margin: 0; font-weight: 500;">Dedicated Doctors</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="vc_row wpb_row vc_row-fluid service-section">
									<div class="wpb_column vc_column_container vc_col-sm-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div class='uk-grid mungu-element uk-grid-medium uk-child-width-1-3@m uk-child-width-1-1@s  '>
													<div class='uk-grid-margin'>
														<a href='service_dyspepsia.php'>
															<div class='service-item-section'>
																<div class='service-item featured_icon'><img src='wp-content/uploads/sites/31/2017/03/Dyspepsia-1.png' alt='icon'></div>
																<div class='entry-meta'>
																	<h3>Dyspepsia</h3>
																	<p style="text-align:justify;">Indigestion, also known as dyspepsia, is a term used to describe one or more symptoms including a feeling of fullness during a meal, uncomfortable fullness after a meal, and burning or pain in the upper abdomen. Indigestion is common in adults and can occur once in a while or as...</p>
																</div>
															</div>
														</a>
													</div>
													<div class='uk-grid-margin'>
														<a href='service_hepatitis_b.php'>
															<div class='service-item-section'>
																<div class='service-item featured_icon'><img src='wp-content/uploads/sites/31/2017/03/Hepatitis-B-1.png' alt='icon'></div>
																<div class='entry-meta'>
																	<h3>Hepatitis-B</h3>
																	<p style="text-align:justify;">Hepatitis B is a serious liver infection caused by the hepatitis B virus (HBV). For some people, hepatitis B infection Becomes chronic, meaning it lasts more than six months. Having chronic hepatitis B increase your risk of developing cirrhosis-a condition that causes permanent scarring of the liver...</p>
																</div>
															</div>
														</a>
													</div> 													
													<div class='uk-grid-margin'>
														<a href='service_hepatitis_c.php'>
															<div class='service-item-section'>
																<div class='service-item featured_icon'><img src='wp-content/uploads/sites/31/2017/03/Hepatitis-C-1.png' alt='icon'></div>
																<div class='entry-meta'>
																	<h3>Hepatitis-C</h3>
																	<p style="text-align:justify;">Hepatitis C is a viral infection that usually causes chronic inflammation leading to serious liver damage. The hepatitis C virus (HCV) spreads through contaminated blood, contaminated syringe  & unprotected sex. Can also rarely be transmitted from mother to foetus during delivery...</p>
																</div>
															</div>
														</a>
													</div> 
													<div class='uk-grid-margin'>
														<a href='service_gastro_disease.php'>
															<div class='service-item-section'>
																<div class='service-item featured_icon'><img src='wp-content/uploads/sites/31/2017/03/Gastroenterology-1.png' alt='icon'></div>
																<div class='entry-meta'>
																	<h3>Gastroenterology</h3>
																	<p style="text-align:justify;">Gastroesophageal reflux is a physical condition in which acid from the stomach flows backward up into the esophagus. People will experience heartburn when excessive amounts of acid from the stomach reflux into the esophagus. Many describe heartburn as a feeling of burning...</p>
																</div>
															</div>
														</a>
													</div> 
													<div class='uk-grid-margin'>
														<a href='service_Chronic.php'>
															<div class='service-item-section'>
																<div class='service-item featured_icon'><img src='wp-content/uploads/sites/31/2017/03/Cornic-Costipation-1.png' alt='icon'></div>
																<div class='entry-meta'>
																	<h3>Chronic constipation</h3>
																	<p style="text-align:justify;">Chronic constipation is infrequent bowel movements or difficult passage of stool that persists for several weeks or longer. Though occasional constipation is very common, some people experience chronic constipation that can interfere with their ability to go about their daily tasks...</p>
																</div>
															</div>
														</a>
													</div>
													<div class='uk-grid-margin'>
														<a href='service_ulcerative_colitis.php'>
															<div class='service-item-section'>
																<div class='service-item featured_icon'><img src="wp-content/uploads/sites/31/2017/03/Irritable-Bowel-Syndrome-1.png" alt='icon'></div>
																<div class='entry-meta'>
																	<h3>Ulcerative colitis</h3>
																	<p style="text-align:justify;">Ulcerative colitis is a chronic inflammatory bowel disease (IBD) that causes long-lasting inflammation and ulcers (sores) in your large intestine. Ulcerative colitis affects the innermost lining (mucosal lining) of the large intestine (colon and rectum). Treatment can greatly reduce signs...</p>
																</div>
															</div>
														</a>
													</div> 
													<div class='uk-grid-margin'>
														<a href='service_irritable_bowel_syndrome.php'>
															<div class='service-item-section'>
																<div class='service-item featured_icon'><img src='wp-content/uploads/sites/31/2017/03/Irritable-Bowel-Syndrome-1.png' alt='icon'></div>
																<div class='entry-meta'>
																	<h3>Irritable bowel syndrome</h3>
																	<p style="text-align:justify;">Irritable bowel syndrome (IBS) is a common, chronic bowel disorder in which there is abdominal pain associated with change in consistency and frequency of stool. There are three different patterns of this disorders namely IBS-C (Constipation predominant), IBS-D (Diarrhoea predominant).</p>
																</div>
															</div>
														</a>
													</div>													 
													<div class='uk-grid-margin'>
														<a href='service_endoscopy.php'>
															<div class='service-item-section'>
																<div class='service-item featured_icon'><img src='wp-content/uploads/sites/31/2017/03/endoscopy-1.png' alt='icon'></div>
																<div class='entry-meta'>
																	<h3>Endoscopy</h3>
																	<p style="text-align:justify;">An upper GI endoscopy is a procedure to diagnose and treat problems in your upper GI (Gastrointestinal) tract. The upper GI tract includes your food pipe (esophagus), stomach, and the first part of your small intestine (the duodenum). This procedure is done using a long, flexible tube called and an endoscope...</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="vc_row wpb_row vc_row-fluid vc_custom_1491365011565">
									<div class="wpb_column vc_column_container vc_col-sm-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<!--<div class="mungu-element mungu-button uk-flex uk-flex-center uk-float-center">
													<a class="uk-button uk-button-default  " rel="nofollow"  href="contact.php"  style='background-color: #00b092; border: none; border-width: 0px; border-color: transparent; '><span class="uk-icon"><svg width="40" height="40" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <polyline fill="none" stroke="#000" points="10 5 15 9.5 10 14"></polyline> <line fill="none" stroke="#000" x1="4" y1="9.5" x2="15" y2="9.5"></line></svg></span>Contact Us</a>
												</div>-->
											</div>
										</div>
									</div>
								</div>
								<!--------------////////////////////////////////////////////////////---->
								<div data-vc-full-width="true" data-vc-full-width-init="true" class="vc_row wpb_row vc_row-fluid pr6@s pl6@s vc_custom_1526664358618 vc_row-has-fill vc_row-o-content-middle vc_row-flex" style="position: relative; box-sizing: border-box;">
										<div class="wpb_column vc_column_ vc_col-sm-12" style="margin-top: -30px;margin-bottom: -30px;">
											<div class="vc_column-inner ">
												<div class="wpb_wrapper">
													<div class="mungu-element mungu-element-counter uk-section text-light ml8@s ">
														<div class="uk-grid uk-grid-small uk-scrollspy uk-child-width-expand uk-flex-left uk-text-left">
															<div class="wpb_column vc_column_container vc_col-sm-12">
																<div class="vc_column-inner ">
																	<div class="wpb_wrapper" style="display: inline-flex; width:100%;" id="booking_appointment">
																		<div style="" class="mungu-element mungu-button uk-flex ">
																			<p style="font-size: 26px;font-weight: 500;margin-top:12px;margin-left:10px;">To book an appointment, please call this number!</p>
																		</div>
																		<div class="mungu-element mungu-button uk-flexs button-section" style="width:50%;text-align:right;">
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
								<div class="vc_row-full-width vc_clearfix value-section"></div>
								<div class="vc_row wpb_row vc_row-fluid vc_custom_1498035984715">
									<div class="wpb_column vc_column_container vc_col-sm-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1498036042062">
													<div class="wpb_column vc_column_container vc_col-sm-12">
														<div class="vc_column-inner ">
															<div class="wpb_wrapper">
																<h2 style="font-size: 30px;text-align: center" class="vc_custom_heading vc_custom_1554698870833" >OUR VALUES</h2>
															</div>
														</div>
													</div>
												</div>
												<div class="vc_row wpb_row vc_inner vc_row-fluid">
													<div class="wpb_column vc_column_container vc_col-sm-4">
														<div class="vc_column-inner vc_custom_1554700054930">
															<div class="wpb_wrapper">
																<div class='mungu-element serv-alt uk-text-center uk-flex-middle '>
																	<h2 class='title-top'>01</h2>
																	<div class='under-line'></div>
																	<div class='serv-icon-holder uk-flex uk-flex-middle'>
																		<h3>Services for the Public</h3>
																	</div>
																	<p>In order to be as considerate to the public as possible, the hospital made very careful planning in advance on all matters.</p>
																</div><!-- end .service-alt -->
															</div>
														</div>
													</div>
													<div class="wpb_column vc_column_container vc_col-sm-4 vc_col-has-fill">
														<div class="vc_column-inner vc_custom_1554700065787">
															<div class="wpb_wrapper">
																<div class='mungu-element serv-alt uk-text-center uk-flex-middle '>
																	<h2 class='title-top'>02</h2>
																	<div class='under-line'></div>
																	<div class='serv-icon-holder uk-flex uk-flex-middle'>
																		<h3>Care For Enjoyment</h3>
																	</div>
																	<p>All patients admitted to this hospital for medical care can enjoy the most dignified and respected medical services.</p>
																</div><!-- end .service-alt -->
															</div>
														</div>
													</div>
													<div class="wpb_column vc_column_container vc_col-sm-4">
														<div class="vc_column-inner vc_custom_1554700076448">
															<div class="wpb_wrapper">
																<div class='mungu-element serv-alt uk-text-center uk-flex-middle '>
																	<h2 class='title-top'>03</h2>
																	<div class='under-line'></div>
																	<div class='serv-icon-holder uk-flex uk-flex-middle'>
																		<h3>Service To Everyone</h3>
																	</div>
																	<p>Every hospital staff works hard each day to prove patients with very unique services from the director to each employee.</p>
																</div><!-- end .service-alt -->
															</div>
														</div>
													</div>
												</div>
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
		<script>(function() {function addEventListener(element,event,handler) {
			if(element.addEventListener) {
				element.addEventListener(event,handler, false);
			} else if(element.attachEvent){
				element.attachEvent('on'+event,handler);
			}
		}function maybePrefixUrlField() {
			if(this.value.trim() !== '' && this.value.indexOf('http') !== 0) {
				this.value = "http://" + this.value;
			}
		}

		var urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]');
		if( urlFields && urlFields.length > 0 ) {
			for( var j=0; j < urlFields.length; j++ ) {
				addEventListener(urlFields[j],'blur',maybePrefixUrlField);
			}
		}/* test if browser supports date fields */
		var testInput = document.createElement('input');
		testInput.setAttribute('type', 'date');
		if( testInput.type !== 'date') {

			/* add placeholder & pattern to all date fields */
			var dateFields = document.querySelectorAll('.mc4wp-form input[type="date"]');
			for(var i=0; i<dateFields.length; i++) {
				if(!dateFields[i].placeholder) {
					dateFields[i].placeholder = 'YYYY-MM-DD';
				}
				if(!dateFields[i].pattern) {
					dateFields[i].pattern = '[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])';
				}
			}
		}

		})();
		</script>
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