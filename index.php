<?php
session_start();
ini_set('display_errors',1);
include 'config/DB.php';
$db = new DB();
$connect = $db->connect();
date_default_timezone_set('Asia/Kolkata'); 
$article_data = '';
$recent_news ='';
	$tbl_name = 'tab_blog';
	$where = '';
    $col = array();
	$order_by = "int_id DESC limit 3";
	$query_fetch = $db->sql_select($tbl_name, $col, $where, $order_by);
	if(count($query_fetch) > 0 ){
		for($i=0; $i < count($query_fetch); $i++){
			$data['int_id']             = $query_fetch[$i]['int_id'];
			$txt_date    				= $query_fetch[$i]['create_at'];
			$date_txt_date              = date('F j, Y', strtotime($txt_date));
			$data['txt_image']          = $query_fetch[$i]['txt_image'];
			$data['txt_title']          = $query_fetch[$i]['txt_title'];
			$txt_description            = $query_fetch[$i]['txt_description'];
			
			$string = $txt_description;
			$words  = array_slice(explode(' ', $string), 0, 25);
			$output = implode(' ', $words);
			
			$recent_news .= '<div class="post uk-grid-margin uk-width-1-3@m">
								<div class="uk-inline-clip uk-transition-toggle uk-light">
									<div class="entry-media">
										<a href="blog.php" class="">
											<div class="themeton-image" data-src="https://drharshudawat.com/images/upload/'.$data['txt_image'].'">
												<img src="https://drharshudawat.com/images/upload/'.$data['txt_image'].'" alt="Ratio" style="margin-bottom: -12%;">
												<div class="overlay uk-transition-toggle uk-light">
													<div class="uk-position-center">
														<span class="uk-animation-slide-bottom-small text-white uk-icon">
															<svg xmlns="" width="40" height="40" viewBox="0 0 20 20">
																<path fill="none" stroke="#000" stroke-width="1.1" d="M10.625,12.375 L7.525,15.475 C6.825,16.175 5.925,16.175 5.225,15.475 L4.525,14.775 C3.825,14.074 3.825,13.175 4.525,12.475 L7.625,9.375"></path> <path fill="none" stroke="#000" stroke-width="1.1" d="M9.325,7.375 L12.425,4.275 C13.125,3.575 14.025,3.575 14.724,4.275 L15.425,4.975 C16.125,5.675 16.125,6.575 15.425,7.275 L12.325,10.375"></path>
																<path fill="none" stroke="#000" stroke-width="1.1" d="M7.925,11.875 L11.925,7.975"></path>
															</svg>
														</span>
													</div>
												</div>
											</div>
										</a>
									</div>
								</div>
								<h3><a href="blog.php">'.$data['txt_title'].'</a></h3>
								<p>'.$output.'</p><a class="uk-button uk-button-text readmorelink" href="blog.php">Read more</a>
							</div>';
		}
	}

?>
<!DOCTYPE html>
<html lang="en-US" class="no-js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Drharshudawat</title>
	
	 <script data-require="jquery@*" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script data-require="bootstrap@*" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link data-require="bootstrap-css@3.3.6" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" />
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
	<link rel="stylesheet" href="css/custom.css" />
		
		<style type="text/css">img.wp-smiley,
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
		.vc_row.wpb_row.vc_inner.vc_row-fluid.vc_custom_155176695839k.vc_row-has-fill {
			border-left: 1px solid #ccc;
		}
		
	.top-sections h2{
		color:#fff;
		font-size:30px;
		font-weight:900;
		line-height:50px;
	}
	.top-sections p{
		color:#fff;
		font-size:16px;
		line-height:30px;
	}
	.input-section {
		display:inline;
	}
	.input-section button.buttion-section {
		background: no-repeat;
		color: #fff;
		border: 1px solid #fff;
		padding: 7px;
	}
	.text-sectio {
		margin-top: 65px;
	}
	.p3@s.p0{
			margin-top:65px;
	}
	.mungu-element.mungu-button.uk-flex {
		width: 50%;
		float: left;
	}
	.mungu-element.mungu-button.uk-flexs.button-section {
		text-align: right;
	}	
	
	@media only screen and (max-width: 768px) {
	  /* For mobile phones: */
	 .vc_custom_1508824581122 {
			padding-top: 0px !important;
			padding-right: 0px !important;
			padding-bottom: 0px !important;
			padding-left: 0px !important;
			background-color: #403678 !important; 
		}
		.vc_column-inner{
			padding:0px!important;
		}
		.vc_row.wpb_row.vc_row-fluid.uk-visible@m.m_shadow.border-60px.vc_custom_1551612754644.vc_row-has-fill.vc_row-o-content-middle.vc_row-flex{
			display:block !important;
		}
		
		.p3@s.p0{
			margin-top:0px!important;
		}
		.vc_column-inner.vc_custom_1552284431362.videos-section {
			padding-left: 20px !important;
			padding-right: 20px !important;
			width: 100%;
		}
		
		.vc_column-inner.vc_custom_1552284431362.videos-section p {
			padding: 13px;
			text-align: justify;
		}
		
		.mungu-element.mungu-button.uk-flex {
			width: 100%;
			float: none !important;
			text-align:center;
		}
		.mungu-element.mungu-button.uk-flex p{
			font-size: 20px !important;
			font-weight: 500;
		}
		.mungu-element.mungu-button.uk-flexs.button-section {
			text-align: center;
			margin:14px;
		}
		.vc_empty_space.uk-hidden@s{
			height:0px;
		}
		.vc_row.wpb_row.vc_row-fluid.main_row.vc_custom_1552491254048.vc_row-has-fill.vc_row-o-equal-height.vc_row-o-content-middle.vc_row-flex{
			position: relative;
			left: 0px;
			box-sizing: border-box;
			width: 100% !important;
		}
		.wpb_wrapper {
			margin: 0px!important;
			padding: 0px;
		}
		
		h2.vc_custom_heading{
			font-size:20px!important;
			margin: 0 0 10px 0;
			font-weight: 400;
			padding: 13px;
		}
		.vc_custom_1554192406201 {
			padding-top: 0px !important;
		}
		.vc_row.wpb_row.vc_row-fluid.pr6@s.pl6@s.vc_custom_1551923920384.vc_row-has-fill.vc_row-o-content-middle.vc_row-flex{
			width:100%;
		}
		.uk-grid-small>* {
			padding-left: 0px!important;
		}
		.top-sections h2 {
			color: #fff;
			font-size: 23px;
			font-weight: 600;
			line-height: 34px;
		}
		.tow-section img {
			-ms-interpolation-mode: bicubic;
			border: 0;
			height: auto;
			max-width: 49%;
		}
		.input-section input.form-controls.section{
			background: no-repeat;
			color: #fff;
			border: 1px solid #fff;
			width: 168px;
			padding: 7px;
		}
		.vc_custom_1491267326951 {
			padding-top: 40px !important;
		}
		.uk-grid>* {
			padding-left: 4px !important;
		}
		.uk-scrollspy.uk-grid.medio_blog.mungu-blog-col4{
			margin:0px !important;
			padding: 0px 0 0 20px;
		}
		[class*=uk-width] {
			box-sizing: border-box;
			width: 90% !important;
			max-width: 100%;
		}
		
		.p5 {
			padding: 20px !important;
			font-size:17px !important;
		}
		.msub {
			height: 55px !important;
			width: 55px !important;
			background: #0CA4B8 !important;
			border-radius: 50px;
			margin-right: 21px !important;
		}
		.uk-input, .uk-select, .uk-select:not([multiple]):not([size]) {
			height: 80px !important;
		}
		.vc_row.wpb_row.vc_row-fluid.main_row.vc_custom_1552491254048.vc_row-has-fill.vc_row-o-equal-height.vc_row-o-content-middle.vc_row-flex{
			position: relative;
			left: 0px !important;
			box-sizing: border-box;
			width: 320px;
		}
		.vc_custom_1552491254048 {
			margin-top: 0px !important;
			margin-bottom: 0px !important;
			padding-top: 0px !important;
			padding-bottom: 0px !important;
			background: none !important;
			background-position: center !important;
			background-repeat: no-repeat !important;
			background-size: cover !important;
		}
		.vc_btn3-container.vc_btn3-inline {
			padding: 0 0 0 13px;
		}
		.ml8\@s {
			margin-left: 10px !important;
		}
		.uk-section {
			box-sizing: border-box;
			padding-top: 40px;
			padding-bottom: 0px !important;
		}
		button.buttion-section {
			width: 34% !important;
		}
		img.vc_single_image-img.attachment-medium {
			margin-left: 0% !important;
			width: 50% !important; 
		}
		img.vc_single_image-img.attachment-large{margin-left:0% !important; width:50%;}
		
		img.vc_single_image-img.attachment-thumbnail{margin-left:0% !important; width:50%;}
		
		h3.vc_custom_heading.vc_custom_1551607137835.setting {
			text-align: center !important;
			margin-left: 0% !important;
		}
		.wpb_single_image.wpb_content_element.vc_align_center.vc_custom_1553162809111.max-width {
			width: 100% !important;
			text-align: center !important;
			max-width:100% !important;
		}
		.wpb_single_image.wpb_content_element.vc_align_center.vc_custom_1553162803198.max-width{
			width: 100% !important;
			text-align: center !important;
			max-width:100% !important;
		}
		.wpb_single_image.wpb_content_element.vc_align_center.vc_custom_1553162797002.max-width{
			width: 100% !important;
			text-align: center !important;
			max-width:100% !important;
		}
		h3.vc_custom_heading.vc_custom_1551607126542.setting{
			text-align: center !important;
			margin-left: 0% !important;
		}
		h3.vc_custom_heading.vc_custom_1551596648643.setting{
			text-align: center !important;
			margin-left: 0% !important;
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
		.vc_custom_1508824581122{padding-top: 36px;padding-right: 60px;padding-bottom: 30px;padding-left: 60px;background-color: #403678 !important;}.vc_custom_1509092891283{border-bottom-width: 1px !important;padding-bottom: 30px !important;border-bottom-color: #5b5096 !important;border-bottom-style: solid !important;}.vc_custom_1508823233184{margin-right: 0px !important;margin-left: 0px !important;}.vc_custom_1508823425668{padding-left: 0px !important;}.vc_custom_1508823431780{padding-right: 0px !important;}
		</style>
		<link rel='stylesheet' id='themeton-custom-stylesheet-css'  href='wp-content/uploads/sites/31/2019/04/medio7752.css?ver=5.2.1' type='text/css' media='all' />
		<link rel='stylesheet' id='js_composer_front-css'  href='wp-content/plugins/js_composer/assets/css/js_composer.min7263.css?ver=5.4.4' type='text/css' media='all' />
		<script type='text/javascript' src='wp-includes/js/jquery/jquery4a5f.js?ver=1.12.4-wp'></script>
		<script type='text/javascript' src='wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1'></script>
		<script type='text/javascript' src='wp-content/plugins/revslider/public/assets/js/jquery.themepunch.tools.min23da.js?ver=5.4.8'></script>
		<script type='text/javascript' src='wp-content/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min23da.js?ver=5.4.8'></script>

		
		<script type='text/javascript' src='wp-includes/js/mediaelement/mediaelement-and-player.min45a0.js?ver=4.2.6-78496d1'></script>
		<script type='text/javascript' src='wp-includes/js/mediaelement/mediaelement-migrate.min7752.js?ver=5.2.1'></script>
		
		<style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1551541901651{margin-top: 46px !important;}.vc_custom_1554171066700{padding-top: 30px !important;padding-bottom: 50px !important;}.vc_custom_1551767028403{padding-right: 20px !important;}.vc_custom_1551766958397{border-left-width: 1px !important;padding-left: 20px !important;border-left-color: #b2bcbd !important;border-left-style: solid !important;}.vc_custom_1551534769676{margin-bottom: -7px !important;}.vc_custom_1552802309911{margin-top: 0px !important;margin-bottom: 0px !important;}.vc_custom_1551535277062{margin-bottom: -7px !important;}.vc_custom_1552802384924{margin-top: 0px !important;margin-bottom: 0px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1554110925366{background-image: url(wp-content/uploads/sites/31/2017/06/shutterstock_486355750-18549.jpg?id=1001) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554110862652{margin-left: -15px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1553482574309{padding-bottom: 0px !important;}.vc_custom_1552749412294{margin-top: 0px !important;padding-top: 0px !important;background-image: url(wp-content/uploads/sites/31/2017/06/Path-211a80.png?id=1281) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554787876299{background-color: #4f4780 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552321818900{margin-bottom: 0px !important;}.vc_custom_1554719683187{margin-top: 135px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552754605138{margin-left: -15px !important;}.vc_custom_1554786847685{margin-bottom: 0px !important;}.vc_custom_1552754523147{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1552754535828{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1554788006379{padding-top: 25px !important;}.vc_custom_1554789825528{padding-top: 20px !important;}.vc_custom_1554787620879{margin-bottom: 0px !important;}@media screen and (min-width: 980px) {
			.form-padding {
			  padding-left: 50px;
			  padding-right: 50px;
			}
		}
		a.btn.btn-default.btn-rounded.mb-4 {
			margin-left: 3px;
			margin-right: 0px;
			padding: 0px 0;
		}
		div#top-header-section {
			margin-right: 14px;
		}
		div#test_section {
			//padding: 0 43px 0 0;
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
		}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1509939171657{margin-top: 100px !important;}.vc_custom_1509939179248{margin-bottom: 100px !important;}.vc_custom_1509939551805{margin: 0px !important;}.vc_custom_1509939644011{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 30px !important;margin-left: 0px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1551541901651{margin-top: 46px !important;}.vc_custom_1554171066700{padding-top: 30px !important;padding-bottom: 50px !important;}.vc_custom_1551767028403{padding-right: 15px !important;}.vc_custom_1551766958397{border-left-width: 1px !important;padding-left: 20px !important;border-left-color: #b2bcbd !important;border-left-style: solid !important;}.vc_custom_1551534769676{margin-bottom: -7px !important;}.vc_custom_1552802309911{margin-top: 0px !important;margin-bottom: 0px !important;}.vc_custom_1551535277062{margin-bottom: -7px !important;}.vc_custom_1552802384924{margin-top: 0px !important;margin-bottom: 0px !important;}#header {background-color:#63599e;position:absolute;width:100%; z-index:9999;}.medio-responsive-menu{background:#63599e;}.themeton-menu > li > a {font-family:Poppins!important;font-weight:300!important;text-transform:uppercase!important;font-size:14px!important;line-height:14px!important;color:#ffffff!important;}.themeton-menu > li > a {padding-top:10px !important;padding-right:23px !important;padding-bottom:10px !important;padding-left:23px !important;}.themeton-menu > li > a:hover,.themeton-menu > li > a:focus {color:#e2e2e2!important;}.themeton-menu li ul li a {color:#beb6ea!important;}.themeton-menu > li ul li {}.themeton-menu > li ul li a:hover {color:#ffffff!important;}.themeton-menu > li ul li.current_page_item > a {color:#988aea!important;}.themeton-menu > li > .sub-menu, .themeton-menu > li > .sub-menu > li .sub-menu  {background-color:rgba(64,54,120,1)!important;}.themeton-menu > li ul li {border-color:rgba(91,80,150,1)!important;}@media screen and (min-width: 980px) {
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
		.vc_column_container>.vc_column-inner {
    box-sizing: border-box;
    padding-left: 3px;
    padding-right: 20px;
    width: 100%;
}
		#scroll {
			box-shadow: none;
			padding:0;
		}
		#scroll:hover {
			box-shadow: none;
		}.vc_custom_1553482574309{padding-bottom: 0px !important;}.vc_custom_1552749412294{margin-top: 0px !important;padding-top: 0px !important;background-image: url(wp-content/uploads/sites/31/2017/06/Path-211a80.png?id=1281) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554787876299{background-color: #4f4780 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552321818900{margin-bottom: 0px !important;}.vc_custom_1554719683187{margin-top: 135px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552754605138{margin-left: -15px !important;}.vc_custom_1554786847685{margin-bottom: 0px !important;}.vc_custom_1552754523147{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1552754535828{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1554788006379{padding-top: 25px !important;}.vc_custom_1554789825528{padding-top: 20px !important;}.vc_custom_1554787620879{margin-bottom: 0px !important;}#footer {background-color:transparent;font-family:Poppins!important;font-weight:300!important;color:#8b99a6!important;}#footer, #footer p, #footer strong { color:#8b99a6;}#footer .widget .widget-title,#footer .widget .widgettitle {font-family:Poppins!important;font-weight:300!important;}
		
		
		.vc_custom_1526664358618 {
			padding-bottom: 20px !important;
			background-image: url(wp-content/uploads/sites/31/2018/05/violet-box983f.jpg?id=1199) !important;
			background-position: 0 0 !important;
			background-repeat: repeat !important;
		}</style><meta name="generator" content="Powered by WPBakery Page Builder - drag and drop page builder for WordPress."/>
		<meta name="generator" content="Powered by Slider Revolution 5.4.8 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface." />
		<link rel="icon" href="wp-content/uploads/sites/31/2017/06/Picture1.png" sizes="32x32" />
		<link rel="icon" href="wp-content/uploads/sites/31/2017/06/Picture1.png" sizes="192x192" />
		<script type="text/javascript">
		function setREVStartSize(e){									
			try{ e.c=jQuery(e.c);var i=jQuery(window).width(),t=9999,r=0,n=0,l=0,f=0,s=0,h=0;
				if(e.responsiveLevels&&(jQuery.each(e.responsiveLevels,function(e,f){f>i&&(t=r=f,l=e),i>f&&f>r&&(r=f,n=e)}),t>r&&(l=n)),f=e.gridheight[l]||e.gridheight[0]||e.gridheight,s=e.gridwidth[l]||e.gridwidth[0]||e.gridwidth,h=i/s,h=h>1?1:h,f=Math.round(h*f),"fullscreen"==e.sliderLayout){var u=(e.c.width(),jQuery(window).height());if(void 0!=e.fullScreenOffsetContainer){var c=e.fullScreenOffsetContainer.split(",");if (c) jQuery.each(c,function(e,i){u=jQuery(i).length>0?u-jQuery(i).outerHeight(!0):u}),e.fullScreenOffset.split("%").length>1&&void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0?u-=jQuery(window).height()*parseInt(e.fullScreenOffset,0)/100:void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0&&(u-=parseInt(e.fullScreenOffset,0))}f=u}else void 0!=e.minHeight&&f<e.minHeight&&(f=e.minHeight);e.c.closest(".rev_slider_wrapper").css({height:f})					
			}catch(d){console.log("Failure at Presize of Slider:"+d)}						
		};
		</script>
		<style type="text/css" title="dynamic-css" class="options-output">.wrapper>.page-title{background-color:#3db8db;background-size:cover;background-image:url('wp-content/uploads/sites/2/2017/03/page-title-bg.html');}</style>
		<style type="text/css" data-type="vc_custom-css">.entry-media .themeton-image img {
			width: 100% !important;
		}
		.skin-medio .nxt-service-icon .nxt-services,
		.skin-medio .nxt-service-icon .swiper-slide {
		  border: none;
		}
		.skin-medio .nxt-service-icon .swiper-slide:hover {
		  box-shadow: none;
		}
		.skin-medio .nxt-service-icon .swiper-slide .nxt-services span {
		  transition: all .3s;
		}
		.skin-medio .nxt-service-icon .swiper-slide .nxt-services span:hover {
		  box-shadow: 0px 0px 15px 0px rgba(98, 98, 98, 0.2);
		}
		</style>
		<style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1551612754644{margin-top: 72px !important;padding-top: 28px !important;padding-bottom: 28px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554192406201{padding-top: 60px !important;}.vc_custom_1552491254048{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;background-image: url(wp-content/uploads/sites/31/2017/06/videosection.png?id=1351) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552222371896{padding-top: 0px !important;padding-bottom: 90px !important;}.vc_custom_1551923920384{background-image: url(wp-content/uploads/sites/31/2019/03/Group-6-1.png?id=1274) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1491267326951{padding-top: 70px !important;}.vc_custom_1551607597008{padding-top: 0px !important;}.vc_custom_1551607613838{padding-top: 0px !important;}.vc_custom_1509358485631{padding-top: 0px !important;}.vc_custom_1490246050276{margin-bottom: 0px !important;padding-top: 0px !important;}.vc_custom_1553162797002{margin-bottom: 0px !important;}.vc_custom_1551596648643{margin-bottom: 0px !important;}.vc_custom_1490246050276{margin-bottom: 0px !important;padding-top: 0px !important;}.vc_custom_1553162803198{margin-bottom: 0px !important;}.vc_custom_1551607126542{margin-bottom: 0px !important;}.vc_custom_1490246050276{margin-bottom: 0px !important;padding-top: 0px !important;}.vc_custom_1553162809111{margin-bottom: 0px !important;}.vc_custom_1551607137835{margin-bottom: 0px !important;}.vc_custom_1552284431362{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 5px !important;padding-bottom: 25px !important;}.vc_custom_1552283533023{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;background-color: #ffffff !important;}.vc_custom_1552280492365{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}.vc_custom_1552284720096{margin-top: 30px !important;padding-bottom: 20px !important;}.vc_custom_1552831234292{margin-top: 40px !important;}.vc_custom_1554711769588{padding-top: 100px !important;padding-bottom: 100px !important;}.vc_custom_1551752659806{padding-bottom: 20px !important;}
		
		.themeton-image {
			height: 200px;
			width: 360px;
		}
		
		</style><noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript></head>
		<body class="home page-template-default page page-id-30 skin-medio wpb-js-composer js-comp-ver-5.4.4 vc_responsive">
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
						<a href="#" class="hamburger-menu uk-navbar-toggle uk-navbar-toggle-icon uk-icon"><!----offcanvas--->
							<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
								<rect y="9" width="20" height="2"></rect>
								<rect y="3" width="20" height="2"></rect>
								<rect y="15" width="20" height="2"></rect>
							</svg>
						</a>
                    </div>
                </div>
				<div class="page-top-slider">
					<link href="https://fonts.googleapis.com/css?family=Poppins:400%2C500" rel="stylesheet" property="stylesheet" type="text/css" media="all">
					<div id="rev_slider_2_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-source="gallery" style="margin:0px auto;background:rgba(255,255,255,0);padding:0px;margin-top:0px;margin-bottom:0px;">
					<!-- START REVOLUTION SLIDER 5.4.8 fullwidth mode -->
					<div id="rev_slider_2_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.8">
						<ul>	
							<li data-index="rs-20" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="wp-content/uploads/sites/31/revslider/next-medical-home-1-slider1/Path-100x50.png"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
								<!-- MAIN IMAGE -->
								<img src="wp-content/uploads/sites/31/revslider/next-medical-home-1-slider1/Path.png"  alt="" title="Home"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
								<!-- LAYERS -->

								<!-- LAYER NR. 11 -->
								<div class="tp-caption   tp-resizeme" id="slide-20-layer-5" data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-40','-40','-40','-40']" data-width="none" data-height="none" data-whitespace="nowrap" data-visibility="['on','off','off','off']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":10,"speed":1500,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5; white-space: nowrap; font-size: 23px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;font-family:Poppins;">Best Care Quality </div>

								<!-- LAYER NR. 12 -->
								<div class="tp-caption   tp-resizeme" id="slide-20-layer-6" data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-width="none" data-height="none" data-whitespace="nowrap" data-visibility="['on','off','off','off']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":300,"speed":1500,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; white-space: nowrap; font-size: 38px; line-height: 22px; font-weight: 500; color: #ffffff; letter-spacing: 0px;font-family:Poppins;">18 Years Experienced</div>

								<!-- LAYER NR. 13 -->
								<div class="tp-caption rev-btn " id="slide-20-layer-7" data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['220','220','220','220']" data-width="none" data-height="none" data-whitespace="nowrap" data-visibility="['on','off','off','off']" data-type="button" data-actions='[{"event":"click","action":"simplelink","target":"_self","url":"#","delay":""}]' data-responsive_offset="on" data-responsive="off"data-frames='[{"delay":600,"speed":1500,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeIn","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255,255,255,1);bg:rgb(0,176,146);bs:solid;bw:0 0 0 0;br:0px 0px 0px 0px;box-shadow:0px 3px 20px 0px rgba(0, 176, 146, 0.5) !important;"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[20,20,20,20]" data-paddingright="[26,26,26,26]" data-paddingbottom="[20,20,20,20]" data-paddingleft="[26,26,26,26]" style="z-index: 7; white-space: nowrap; font-size: 14px; line-height: 14px; font-weight: 500; color: rgba(255,255,255,1); letter-spacing: 1px;font-family:Poppins;background-color:rgb(7,188,213);border-color:rgba(0,0,0,1);border-radius:30px 30px 30px 30px;outline:none;box-shadow:0px 3px 20px 0px rgba(0, 176, 146, 0.5) !important;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="about.php">RESEARCH MORE</a></div>

								<!-- LAYER NR. 14 -->
								<div class="tp-caption   tp-resizeme" id="slide-20-layer-9" data-x="['left','left','left','left']" data-hoffset="['466','466','466','466']" data-y="['top','top','top','top']" data-voffset="['285','285','285','285']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="image" data-responsive_offset="on" data-frames='[{"delay":200,"speed":400,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 8;"><div class="rs-looped rs-wave"  data-speed="3" data-angle="10" data-radius="4px" data-origin="50% 50%"><img src="wp-content/uploads/sites/31/revslider/next-medical-home-1-slider1/Path-7.png" alt="" data-ww="['893px','893px','893px','893px']" data-hh="['670px','670px','670px','670px']" width="893" height="670" data-no-retina> </div></div>

								<!-- LAYER NR. 15 -->
								<div class="tp-caption   tp-resizeme" id="slide-20-layer-10" data-x="['left','left','left','left']" data-hoffset="['445','445','445','445']" data-y="['top','top','top','top']" data-voffset="['234','234','234','234']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="image" data-responsive_offset="on" data-frames='[{"delay":400,"speed":400,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 9;">
								<div class="rs-looped rs-wave"  data-speed="3" data-angle="10" data-radius="5px" data-origin="50% 50%"><img src="wp-content/uploads/sites/31/revslider/next-medical-home-1-slider1/Path-3.png" alt="" data-ww="['948px','948px','948px','948px']" data-hh="['679px','679px','679px','679px']" width="948" height="679" data-no-retina> </div></div>

								<!-- LAYER NR. 16 -->
								<div class="tp-caption   tp-resizeme" id="slide-20-layer-13" data-x="['left','left','left','left']" data-hoffset="['507','507','507','507']" data-y="['top','top','top','top']" data-voffset="['282','282','282','282']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="image" data-responsive_offset="on" data-frames='[{"delay":1000,"speed":500,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 10;"><img src="wp-content/uploads/sites/31/2017/06/slider2.jpg" style="border-top-left-radius: 43%;border-bottom-right-radius: 34%;border-top-right-radius: 56%;border-bottom-left-radius: 60%;" alt="Medio Hospital Slider" data-ww="['824px','824px','824px','824px']" data-hh="['626px','626px','626px','626px']" width="824" height="626" data-no-retina> </div>

								<!-- LAYER NR. 17 -->
								<div class="tp-caption   tp-resizeme" id="slide-20-layer-12" data-x="['left','left','left','left']" data-hoffset="['-10','-10','-10','-10']" data-y="['middle','middle','middle','middle']" data-voffset="['100','100','100','100']" data-width="none" data-height="none" data-whitespace="nowrap" data-visibility="['on','off','off','off']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":300,"speed":1500,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 11; white-space: nowrap; font-size: 144px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;font-family:Poppins;">DOCTOR </div>

								<!-- LAYER NR. 18 -->
								<div class="tp-caption   tp-resizeme" id="slide-20-layer-16" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-160','-160','-160','-160']" data-width="none" data-height="none" data-whitespace="nowrap" data-visibility="['off','on','on','on']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":300,"speed":1500,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 12; white-space: nowrap; font-size: 32px; line-height: 22px; font-weight: 500; color: #ffffff; letter-spacing: 0px;font-family:Poppins;">High Experienced </div>

								<!-- LAYER NR. 19 -->
								<div class="tp-caption   tp-resizeme" id="slide-20-layer-17" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-70','-70','-70','-70']"  data-width="none" data-height="none" data-whitespace="nowrap" data-visibility="['off','on','on','on']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":600,"speed":1500,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 13; white-space: nowrap; font-size: 72px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;font-family:Poppins;">DOCTOR </div>

								<!-- LAYER NR. 20 -->
								<div class="tp-caption rev-btn " id="slide-20-layer-18" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['40','40','40','40']" data-width="none" data-height="none" data-whitespace="nowrap" data-visibility="['off','on','on','on']" data-type="button" data-actions='[{"event":"click","action":"simplelink","target":"_self","url":"about.php","delay":""}]' data-responsive_offset="on" data-responsive="off" data-frames='[{"delay":900,"speed":1500,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeIn","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255,255,255,1);bg:rgb(0,176,146);bs:solid;bw:0 0 0 0;br:0px 0px 0px 0px;box-shadow:0px 3px 20px 0px rgba(0, 176, 146, 0.5) !important;"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[20,20,20,20]" data-paddingright="[26,26,26,26]" data-paddingbottom="[20,20,20,20]" data-paddingleft="[26,26,26,26]" style="z-index: 14; white-space: nowrap; font-size: 14px; line-height: 14px; font-weight: 500; color: rgba(255,255,255,1); letter-spacing: 1px;font-family:Poppins;background-color:rgb(7,188,213);border-color:rgba(0,0,0,1);border-radius:30px 30px 30px 30px;outline:none;box-shadow:0px 3px 20px 0px rgba(0, 176, 146, 0.5) !important;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">RESEARCH MORE </div>
							</li>
							<li data-index="rs-19" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="wp-content/uploads/sites/31/revslider/next-medical-home-1-slider1/Path-100x50.png"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
								<!-- MAIN IMAGE -->
								<img src="wp-content/uploads/sites/31/revslider/next-medical-home-1-slider1/Path.png"  alt="" title="Home"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
								<!-- LAYERS -->

								<!-- LAYER NR. 21 -->
								<div class="tp-caption   tp-resizeme" id="slide-19-layer-5" data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-40','-40','-40','-40']" data-width="none" data-height="none" data-whitespace="nowrap" data-visibility="['on','off','off','off']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":10,"speed":1500,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5; white-space: nowrap; font-size: 23px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;font-family:Poppins;">Best Care Quality </div>

								<!-- LAYER NR. 22 -->
								<div class="tp-caption   tp-resizeme" id="slide-19-layer-6" data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-width="none" data-height="none" data-whitespace="nowrap" data-visibility="['on','off','off','off']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":300,"speed":1500,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; white-space: nowrap; font-size: 38px; line-height: 22px; font-weight: 500; color: #ffffff; letter-spacing: 0px;font-family:Poppins;">High-tech digital </div>

								<!-- LAYER NR. 23 -->
								<div class="tp-caption rev-btn " id="slide-19-layer-7" data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['220','220','220','220']" data-width="none" data-height="none" data-whitespace="nowrap" data-visibility="['on','off','off','off']" data-type="button" data-actions='[{"event":"click","action":"simplelink","target":"_self","url":"#","delay":""}]' data-responsive_offset="on" data-responsive="off" data-frames='[{"delay":600,"speed":1500,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeIn","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255,255,255,1);bg:rgb(0,176,146);bs:solid;bw:0 0 0 0;br:0px 0px 0px 0px;box-shadow:0px 3px 20px 0px rgba(0, 176, 146, 0.5) !important;"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[20,20,20,20]" data-paddingright="[26,26,26,26]" data-paddingbottom="[20,20,20,20]" data-paddingleft="[26,26,26,26]" style="z-index: 7; white-space: nowrap; font-size: 14px; line-height: 14px; font-weight: 500; color: rgba(255,255,255,1); letter-spacing: 1px;font-family:Poppins;background-color:rgb(7,188,213);border-color:rgba(0,0,0,1);border-radius:30px 30px 30px 30px;outline:none;box-shadow:0px 3px 20px 0px rgba(0, 176, 146, 0.5) !important;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="appointment.php">Book Appointment </a></div>

								<!-- LAYER NR. 24 -->
								<div class="tp-caption   tp-resizeme" id="slide-19-layer-9" data-x="['left','left','left','left']" data-hoffset="['466','466','466','466']" data-y="['top','top','top','top']" data-voffset="['285','285','285','285']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="image" data-responsive_offset="on" data-frames='[{"delay":400,"speed":400,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 8;">
								<div class="rs-looped rs-wave"  data-speed="3" data-angle="10" data-radius="4px" data-origin="50% 50%"><img src="wp-content/uploads/sites/31/revslider/next-medical-home-1-slider1/Path-7.png" alt="" data-ww="['893px','893px','893px','893px']" data-hh="['670px','670px','670px','670px']" width="893" height="670" data-no-retina> </div></div>

								<!-- LAYER NR. 25 -->
								<div class="tp-caption   tp-resizeme" id="slide-19-layer-10" data-x="['left','left','left','left']" data-hoffset="['445','445','445','445']" data-y="['top','top','top','top']" data-voffset="['234','234','234','234']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="image" data-responsive_offset="on" data-frames='[{"delay":800,"speed":400,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 9;">
								<div class="rs-looped rs-wave"  data-speed="3" data-angle="10" data-radius="5px" data-origin="50% 50%"><img src="wp-content/uploads/sites/31/revslider/next-medical-home-1-slider1/Path-3.png" alt="" data-ww="['948px','948px','948px','948px']" data-hh="['679px','679px','679px','679px']" width="948" height="679" data-no-retina> </div>
								</div>
								<!-- LAYER NR. 26 -->
								<div class="tp-caption   tp-resizeme" id="slide-19-layer-13" data-x="['left','left','left','left']" data-hoffset="['507','507','507','507']" data-y="['top','top','top','top']" data-voffset="['282','282','282','282']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="image" data-responsive_offset="on" data-frames='[{"delay":1200,"speed":500,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 10;"><img src="wp-content/uploads/sites/31/2017/06/slider3.jpg" style="border-top-left-radius: 43%;border-bottom-right-radius: 34%;border-top-right-radius: 56%;border-bottom-left-radius: 60%;" alt="Medio Hospital Slider" data-ww="['824px','824px','824px','824px']" data-hh="['626px','626px','626px','626px']" width="824" height="626" data-no-retina> </div>

								<!-- LAYER NR. 27 -->
								<div class="tp-caption   tp-resizeme" id="slide-19-layer-12" data-x="['left','left','left','left']" data-hoffset="['-9','-9','-9','-9']" data-y="['middle','middle','middle','middle']" data-voffset="['100','100','100','100']"  data-width="none" data-height="none" data-whitespace="nowrap" data-visibility="['on','off','off','off']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":300,"speed":1500,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
									data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 11; white-space: nowrap; font-size: 144px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;font-family:Poppins;">MEASURES </div>

								<!-- LAYER NR. 28 -->
								<div class="tp-caption   tp-resizeme" id="slide-19-layer-16" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-160','-160','-160','-160']" data-width="none" data-height="none" data-whitespace="nowrap" data-visibility="['off','on','on','on']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":300,"speed":1500,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 12; white-space: nowrap; font-size: 32px; line-height: 22px; font-weight: 500; color: #ffffff; letter-spacing: 0px;font-family:Poppins;">High-tech digital </div>

								<!-- LAYER NR. 29 -->
								<div class="tp-caption   tp-resizeme" id="slide-19-layer-17" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-70','-70','-70','-70']" data-width="none" data-height="none" data-whitespace="nowrap" data-visibility="['off','on','on','on']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":600,"speed":1500,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 13; white-space: nowrap; font-size: 72px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;font-family:Poppins;">MEASURES </div>

								<!-- LAYER NR. 30 -->
								
								<div class="tp-caption rev-btn " id="slide-19-layer-18" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['40','40','40','40']" data-width="none" data-height="none" data-whitespace="nowrap" data-visibility="['off','on','on','on']" data-type="button" data-actions='[{"event":"click","action":"simplelink","target":"_self","url":"service.php","delay":""}]' data-responsive_offset="on" data-responsive="off" data-frames='[{"delay":900,"speed":1500,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeIn","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255,255,255,1);bg:rgb(0,176,146);bs:solid;bw:0 0 0 0;br:0px 0px 0px 0px;box-shadow:0px 3px 20px 0px rgba(0, 176, 146, 0.5) !important;"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[20,20,20,20]" data-paddingright="[26,26,26,26]" data-paddingbottom="[20,20,20,20]" data-paddingleft="[26,26,26,26]" style="z-index: 14; white-space: nowrap; font-size: 14px; line-height: 14px; font-weight: 500; color: rgba(255,255,255,1); letter-spacing: 1px;font-family:Poppins;background-color:rgb(7,188,213);border-color:rgba(0,0,0,1);border-radius:30px 30px 30px 30px;outline:none;box-shadow:0px 3px 20px 0px rgba(0, 176, 146, 0.5) !important;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">TAKE MORE CARE </div>
							</li>
						<div style="" class="tp-static-layers">
							<!-- LAYER NR. 31 -->
							<div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme tp-static-layer" id="slider-2-layer-13" data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" 
			 
							data-y="['top','top','top','top']" data-voffset="['0','0','0','0']" data-width="100%" data-height="100%" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on" data-startslide="0"  data-endslide="2" data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 26;background-color:rgb(99,89,158);"> </div>
						</div>
																<div style="" class="tp-static-layers">
							<!-- LAYER NR. 31 -->
							<div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme tp-static-layer" id="slider-2-layer-13" data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']" data-voffset="['0','0','0','0']" data-width="100%" data-height="100%" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on" data-startslide="0" data-endslide="2" data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"data-paddingleft="[0,0,0,0]" style="z-index: 26;background-color:rgb(99,89,158);"> </div>
						</div>
						<script>
						var htmlDiv = document.getElementById("rs-plugin-settings-inline-css"); var htmlDivCss="";
							if(htmlDiv) {
								htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
							}else{
								var htmlDiv = document.createElement("div");
								htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
								document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
							}
						</script>
						<div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>	</div>
						<script>
						var htmlDiv = document.getElementById("rs-plugin-settings-inline-css"); var htmlDivCss="";
							if(htmlDiv) {
								htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
							}else{
								var htmlDiv = document.createElement("div");
								htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
								document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
							}
						</script>
						<script type="text/javascript">
						if (setREVStartSize!==undefined) setREVStartSize(
							{c: '#rev_slider_2_1', responsiveLevels: [1240,1240,1240,480], gridwidth: [1200,1200,1200,480], gridheight: [1078,1078,1078,540], sliderLayout: 'fullwidth'});
									
						var revapi2,
							tpj;	
						(function() {			
							if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded",onLoad); else onLoad();	
							function onLoad() {				
								if (tpj===undefined) { tpj = jQuery; if("off" == "on") tpj.noConflict();}
							if(tpj("#rev_slider_2_1").revolution == undefined){
								revslider_showDoubleJqueryError("#rev_slider_2_1");
							}else{
								revapi2 = tpj("#rev_slider_2_1").show().revolution({
									sliderType:"standard",
									jsFileLocation:"https://drharshudawat.com/wp-content/plugins/revslider/public/assets/js/",
									sliderLayout:"fullwidth",
									dottedOverlay:"none",
									delay:9000,
									navigation: {
										keyboardNavigation:"off",
										keyboard_direction: "horizontal",
										mouseScrollNavigation:"off",
													mouseScrollReverse:"default",
										onHoverStop:"off",
										touch:{
											touchenabled:"on",
											touchOnDesktop:"on",
											swipe_threshold: 75,
											swipe_min_touches: 1,
											swipe_direction: "horizontal",
											drag_block_vertical: false
										}
										,
										bullets: {
											enable:true,
											hide_onmobile:false,
											style:"hesperiden",
											hide_onleave:false,
											direction:"horizontal",
											h_align:"center",
											v_align:"bottom",
											h_offset:0,
											v_offset:64,
											space:16,
											tmp:''
										}
									},
									responsiveLevels:[1240,1240,1240,480],
									visibilityLevels:[1240,1240,1240,480],
									gridwidth:[1200,1200,1200,480],
									gridheight:[1078,1078,1078,540],
									lazyType:"none",
									shadow:0,
									spinner:"spinner2",
									stopLoop:"off",
									stopAfterLoops:-1,
									stopAtSlide:-1,
									shuffle:"off",
									autoHeight:"off",
									disableProgressBar:"on",
									hideThumbsOnMobile:"off",
									hideSliderAtLimit:0,
									hideCaptionAtLimit:0,
									hideAllCaptionAtLilmit:0,
									debugMode:false,
									fallbacks: {
										simplifyAll:"off",
										nextSlideOnWindowFocus:"off",
										disableFocusListener:false,
									}
								});
							}; /* END OF revapi call */
							
						 }; /* END OF ON LOAD FUNCTION */
						}()); /* END OF WRAPPING FUNCTION */
						</script>
						<script>
							var htmlDivCss = ' #rev_slider_2_1_wrapper .tp-loader.spinner2{ background-color: #ffffff !important; } ';
							var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
							if(htmlDiv) {
								htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
							}
							else{
								var htmlDiv = document.createElement('div');
								htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
								document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
							}
							</script>
							<script>
							var htmlDivCss = unescape(".hesperiden%20.tp-bullet%20%7B%0A%20%20%20%20background%3A%20none%20%21important%3B%0A%20%20%20%20border-color%3A%20%23fff%20%21important%3B%0A%20%20%20%20overflow%3A%20hidden%3B%0A%7D%0A.hesperiden%20.tp-bullet%3Aafter%20%7B%0A%20%20%20%20position%3A%20absolute%3B%0A%20%20%20%20width%3A%2030px%3B%0A%20%20%20%20height%3A%2030px%3B%0A%20%20%20%20background%3A%20%23fff%3B%0A%20%20%20%20content%3A%20%27%27%3B%0A%20%20%20%20border%3A%203px%20solid%20%23fff%3B%0A%20%20%20%20left%3A%20-5px%3B%0A%20%20%20%20top%3A%20-5px%3B%0A%20%20%20%20border-radius%3A%2050%25%3B%0A%20%20%20%20transition%3A%20all%20.3s%3B%0A%7D%0A.tp-bullet.selected%3Aafter%2C%20.tp-bullet%3Ahover%3Aafter%20%7B%0A%20%20%20%20top%3A%2013px%3B%0A%7D");
							var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
							if(htmlDiv) {
								htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
							}
							else{
								var htmlDiv = document.createElement('div');
								htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
								document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
							}
						  </script><script>
							var htmlDivCss = unescape(".hesperiden.tp-bullets%20%7B%0A%7D%0A.hesperiden.tp-bullets%3Abefore%20%7B%0A%09content%3A%22%20%22%3B%0A%09position%3Aabsolute%3B%0A%09width%3A100%25%3B%0A%09height%3A100%25%3B%0A%09background%3Atransparent%3B%0A%09padding%3A10px%3B%0A%09margin-left%3A-10px%3Bmargin-top%3A-10px%3B%0A%09box-sizing%3Acontent-box%3B%0A%20%20%20border-radius%3A8px%3B%0A%20%20%0A%7D%0A.hesperiden%20.tp-bullet%20%7B%0A%09width%3A12px%3B%0A%09height%3A12px%3B%0A%09position%3Aabsolute%3B%0A%09background%3A%20rgb%28153%2C%20153%2C%20153%29%3B%20%2F%2A%20old%20browsers%20%2A%2F%0A%20%20%20%20background%3A%20-moz-linear-gradient%28top%2C%20%20rgb%28153%2C%20153%2C%20153%29%200%25%2C%20rgb%28225%2C%20225%2C%20225%29%20100%25%29%3B%20%2F%2A%20ff3.6%2B%20%2A%2F%0A%20%20%20%20background%3A%20-webkit-linear-gradient%28top%2C%20%20rgb%28153%2C%20153%2C%20153%29%200%25%2Crgb%28225%2C%20225%2C%20225%29%20100%25%29%3B%20%2F%2A%20chrome10%2B%2Csafari5.1%2B%20%2A%2F%0A%20%20%20%20background%3A%20-o-linear-gradient%28top%2C%20%20rgb%28153%2C%20153%2C%20153%29%200%25%2Crgb%28225%2C%20225%2C%20225%29%20100%25%29%3B%20%2F%2A%20opera%2011.10%2B%20%2A%2F%0A%20%20%20%20background%3A%20-ms-linear-gradient%28top%2C%20%20rgb%28153%2C%20153%2C%20153%29%200%25%2Crgb%28225%2C%20225%2C%20225%29%20100%25%29%3B%20%2F%2A%20ie10%2B%20%2A%2F%0A%20%20%20%20background%3A%20linear-gradient%28to%20bottom%2C%20%20rgb%28153%2C%20153%2C%20153%29%200%25%2Crgb%28225%2C%20225%2C%20225%29%20100%25%29%3B%20%2F%2A%20w3c%20%2A%2F%0A%20%20%20%20filter%3A%20progid%3Adximagetransform.microsoft.gradient%28%20%0A%20%20%20%20startcolorstr%3D%22rgb%28153%2C%20153%2C%20153%29%22%2C%20endcolorstr%3D%22rgb%28225%2C%20225%2C%20225%29%22%2Cgradienttype%3D0%20%29%3B%20%2F%2A%20ie6-9%20%2A%2F%0A%09border%3A3px%20solid%20rgb%28229%2C%20229%2C%20229%29%3B%0A%09border-radius%3A50%25%3B%0A%09cursor%3A%20pointer%3B%0A%09box-sizing%3Acontent-box%3B%0A%7D%0A.hesperiden%20.tp-bullet%3Ahover%2C%0A.hesperiden%20.tp-bullet.selected%20%7B%0A%09background%3Argb%28102%2C%20102%2C%20102%29%3B%0A%7D%0A.hesperiden%20.tp-bullet-image%20%7B%0A%7D%0A.hesperiden%20.tp-bullet-title%20%7B%0A%7D%0A%0A");
							var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
							if(htmlDiv) {
								htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
							}
							else{
								var htmlDiv = document.createElement('div');
								htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
								document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
							}
						  </script>
					</div><!-- END REVOLUTION SLIDER -->
				</div><!-- end .page-top-title -->
				<section class="uk-section" style="padding-top:0px;">
					<div class="uk-container uk-container-default uk-position-relative">
						<div class="uk-grid uk-flex uk-flex-center">
							<div class="uk-width-1-1@s">
								<article class="medio-page-single uk-article post-30 page type-page status-publish hentry">
									<div class="vc_row wpb_row vc_row-fluid uk-visible@m m_shadow border-60px vc_custom_1551612754644 vc_row-has-fill vc_row-o-content-middle vc_row-flex">
										<div class="custom-class-for-vc wpb_column vc_column_container vc_col-sm-4">
											<div class="vc_column-inner vc_custom_1551607597008">
												<div class="wpb_wrapper">
													<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1490246050276 vc_row-o-content-middle vc_row-flex">
														<div class="wpb_column vc_column_container vc_col-sm-4">
															<div class="vc_column-inner ">
																<div class="wpb_wrapper">
																	<div  class="wpb_single_image wpb_content_element vc_align_center  vc_custom_1553162797002  max-width">	
																		<figure class="wpb_wrapper vc_figure">
																			<div class="vc_single_image-wrapper   vc_box_border_grey"><img width="158" height="158" src="wp-content/uploads/sites/31/2019/03/Group-6.png" class="vc_single_image-img attachment-medium" alt="Medio Icon" srcset="wp-content/uploads/sites/31/2019/03/Group-6.png 158w,wp-content/uploads/sites/31/2019/03/Group-6-150x150.png 150w" sizes="(max-width: 158px) 100vw, 158px" style="margin-left: 100%;"/></div>
																		</figure>
																	</div>
																</div>
															</div>
														</div>
														<div class="wpb_column vc_column_container vc_col-sm-8">
															<div class="vc_column-inner ">
																<div class="wpb_wrapper">
																	<h3 style="font-size: 18px;color: #404040;text-align: left;margin-left:35%" class="vc_custom_heading vc_custom_1551596648643 setting" >
																	<a href="appointment.php">Request<br />Appointment</a></h3>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="wpb_column vc_column_container vc_col-sm-4">
											<div class="vc_column-inner vc_custom_1551607613838">
												<div class="wpb_wrapper">
													<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1490246050276 vc_row-o-content-middle vc_row-flex">
														<div class="wpb_column vc_column_container vc_col-sm-4">
															<div class="vc_column-inner ">
																<div class="wpb_wrapper">
																	<div  class="wpb_single_image wpb_content_element vc_align_center  vc_custom_1553162803198  max-width">
																		<figure class="wpb_wrapper vc_figure">
																			<div class="vc_single_image-wrapper   vc_box_border_grey"><img width="158" height="158" src="wp-content/uploads/sites/31/2019/03/Group-7.png" class="vc_single_image-img attachment-large" alt="Medio Icon" srcset="wp-content/uploads/sites/31/2019/03/Group-7.png 158w,wp-content/uploads/sites/31/2019/03/Group-7-150x150.png 150w" sizes="(max-width: 158px) 100vw, 158px" style="margin-left: 90%;"/></div>
																		</figure>
																	</div>
																</div>
															</div>
														</div>
														<div class="wpb_column vc_column_container vc_col-sm-8">
															<div class="vc_column-inner ">
																<div class="wpb_wrapper">
																	<h3 style="font-size: 18px;color: #404040;text-align: left;margin-left:30%" class="vc_custom_heading vc_custom_1551607126542 setting" ><a href="appointment.php">Book Health<br />Check-Up</a></h3>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="wpb_column vc_column_container vc_col-sm-4">
											<div class="vc_column-inner vc_custom_1509358485631">
												<div class="wpb_wrapper">
													<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1490246050276 vc_row-o-content-middle vc_row-flex">
														<div class="wpb_column vc_column_container vc_col-sm-4">
															<div class="vc_column-inner ">
																<div class="wpb_wrapper">
																	<div  class="wpb_single_image wpb_content_element vc_align_center  vc_custom_1553162809111  max-width">
																		<figure class="wpb_wrapper vc_figure">
																			<div class="vc_single_image-wrapper   vc_box_border_grey"><img width="150" height="150" src="wp-content/uploads/sites/31/2019/03/Group-8-150x150.png" class="vc_single_image-img attachment-thumbnail" alt="Medio Icon" srcset="wp-content/uploads/sites/31/2019/03/Group-8-150x150.png 150w, wp-content/uploads/sites/31/2019/03/Group-8-150x150.png 158w" sizes="(max-width: 150px) 100vw, 150px" style="margin-left: 100%;" /></div>
																		</figure>
																	</div>
																</div>
															</div>
														</div>
														<div class="wpb_column vc_column_container vc_col-sm-8">
															<div class="vc_column-inner ">
																<div class="wpb_wrapper">
																	<h3 style="font-size: 18px;color: #404040;text-align: left;margin-left:35%" class="vc_custom_heading vc_custom_1551607137835 setting"> 
																	<a href="contact.php">Contact &amp;<br />Direction</a></h3>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="vc_row wpb_row vc_row-fluid pb9 pb2@s vc_custom_1554192406201">
										<div class="wpb_column vc_column_container vc_col-sm-12">
											<div class="vc_column-inner ">
												<div class="wpb_wrapper">
													<h2 style="font-size: 36px;line-height: 1;text-align: center" class="vc_custom_heading mvb0" >Center of Excellence</h2>
													<div class="wpb_text_column wpb_content_element " >
														<div class="wpb_wrapper">
															<p style="text-align: center; margin: 0; padding: 0; font-size: 15px;">The best clinical talent and skills</p>

														</div>
													</div>
													<div class='nxt-service-icon' data-col='5'>
														<div class='swiper-container service-icon pt2' style="margin-left: -18px;">
															<div class='swiper-wrapper uk-scrollspy' style="margin-left: 1%;">
																<div class='swiper-slide'>
																	<section class='uk-flex-center uk-flex'>
																		<a href='service_dyspepsia.php'>
																			<div class='nxt-services'>
																				<span><img src='wp-content/uploads/sites/31/2017/03/Dyspepsia-1.png' alt='icon'></span>
																				<h3>Dyspepsia</h3>
																			</div>
																		</a>
																	</section>
																</div>
																<div class='swiper-slide'>
																	<section class='uk-flex-center uk-flex'>
																		<a href='service_irritable_bowel_syndrome.php'>
																			<div class='nxt-services'>
																				<span><img src='wp-content/uploads/sites/31/2017/03/Irritable-Bowel-Syndrome-1.png' alt='icon'></span>
																				<h3>Irritable Bowel Syndrome</h3>
																			</div>
																		</a>
																	</section>
																</div>
																<div class='swiper-slide'>
																	<section class='uk-flex-center uk-flex'>
																		<a href='service_endoscopy.php'>
																			<div class='nxt-services'>
																				<span><img src='wp-content/uploads/sites/31/2017/03/endoscopy-1.png' alt='icon'></span>
																				<h3>Endoscopy</h3>
																			</div>
																		</a>
																	</section>
																</div>
																<div class='swiper-slide'>
																	<section class='uk-flex-center uk-flex'>
																		<a href='service_Chronic.php'>
																			<div class='nxt-services'>
																				<span><img src='wp-content/uploads/sites/31/2017/03/Cornic-Costipation-1.png' alt='icon'></span>
																				<h3>Chronic Constipation</h3>
																			</div>
																		</a>
																	</section>
																</div>
																<div class='swiper-slide'>
																	<section class='uk-flex-center uk-flex'>
																		<a href='service_hepatitis_b.php'>
																			<div class='nxt-services'>
																				<span><img src='wp-content/uploads/sites/31/2017/03/Hepatitis-B-1.png' alt='icon'></span>
																				<h3>Hepatitis B</h3>
																			</div>
																		</a>
																	</section>
																</div>
																<div class='swiper-slide'>
																	<section class='uk-flex-center uk-flex'>
																		<a href='service_hepatitis_c.php'>
																			<div class='nxt-services'>
																				<span><img src='wp-content/uploads/sites/31/2017/03/Hepatitis-C-1.png' alt='icon'></span>
																				<h3>Hepatitis C</h3>
																			</div>
																		</a>
																	</section>
																</div>
																
																<div class='swiper-slide'>
																	<section class='uk-flex-center uk-flex'>
																		<a href='service_gastro_disease.php'>
																			<div class='nxt-services'>
																				<span><img src='wp-content/uploads/sites/31/2017/03/Gastroenterology-1.png' alt='icon'></span>
																				<h3>Gastroenterology</h3>
																			</div>
																		</a>
																	</section>
																</div>
																<div class='swiper-slide'>
																	<section class='uk-flex-center uk-flex'>
																		<a href='service_ulcerative_colitis.php'>
																			<div class='nxt-services'>
																				<span><img src="wp-content/uploads/sites/31/2017/03/Irritable-Bowel-Syndrome-1.png" alt='icon'></span>
																				<h3>Ulcerative colitis</h3>
																			</div>
																		</a>
																	</section>
																</div>
															</div>
														</div>
													</div>
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
																	<div class="wpb_wrapper">
																		<div style="" class="mungu-element mungu-button uk-flex ">
																			<p style="font-size: 26px;font-weight: 500;margin-top:12px;">To book an appointment, please call this number!</p>
																		</div>
																		<div class="mungu-element mungu-button uk-flexs button-section">
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
									<div class="vc_row-full-width vc_clearfix" style="margin-bottom: 6%;"></div>
									
									<!--------------////////////////////////////////////////////////////---->
									<div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid main_row vc_custom_1552491254048 vc_row-has-fill vc_row-o-equal-height vc_row-o-content-middle vc_row-flex">
										<div class="wpb_column vc_column_container vc_col-sm-6 col-xs-12">
											<div class="vc_column-inner vc_custom_1552284431362 videos-section">
												<div class="wpb_wrapper" style="">
													<div class="vc_row wpb_row vc_inner vc_row-fluid round-shape m_shadow vc_custom_1552283533023 vc_row-has-fill vc_row-o-content-middle vc_row-flex">
														<div class="wpb_column vc_column_container vc_col-sm-10">
															<div class="vc_column-inner vc_custom_1552280492365">
																<div class="wpb_wrapper_welcome">
																	<div class="vc_empty_space" style="height: 40px" >
																		<span class="vc_empty_space_inner"></span>
																	</div>
																	<h2 style="font-size: 36px;line-height: 1em;text-align: left" class="vc_custom_heading" >Welcome To Udawat Gastroenterology Clinic</h2>
																	<div class="wpb_text_column wpb_content_element  pr5 pr0@s" >
																		<div class="wpb_wrapper_welcome">
																			<p>Trained in Gastroenterology from PGIMER Chandigarh from 2003-2005 with additional training for 6 months in advanced gastroenterology and endoscopy. Worked in SMS Hospital, Jaipur for 3 years from 2006-2009. Since 2009 working in Santokba Durlabhji Hospital, Jaipur as Senior Gastroenterologist.He has received training in advanced endoscopy from USA and Japan...<a href="about.php" style="">View More</a></p>

																		</div>
																	</div>
																	<div class="vc_btn3-container vc_btn3-inline" >
																		<div style="" class="mungu-element mungu-button text-sect">
																			<p style="font-size: 24px;font-weight: 500;">To book an appointment, please call this number!</p>
																		</div>
																		<div class="mungu-element mungu-button button-sectione" style='margin-right: 31px;'>
																			<a class="uk-button uk-button-default about-section" href="tel:9928076901" style="border: 1px solid #4cadc9;background-color:#4cadc9;border-radius: 30px;"><span class="uk-icon"><svg width="40" height="40" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <polyline fill="none" stroke="#000" points="10 5 15 9.5 10 14"></polyline> <line fill="none" stroke="#000" x1="4" y1="9.5" x2="15" y2="9.5"></line></svg></span>+91 9928076901</a>
																		</div>
																		<!--<button style="background-color:#07BCD5; color:#ffffff;" class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-round vc_btn3-style-custom"><a href="appointment.php" style="color:#ffff">Book Consultation</a></button>-->
																	</div>
																	<div class="vc_empty_space" style="height: 40px" >
																		<span class="vc_empty_space_inner"></span>
																	</div>
																</div>
															</div>
														</div>
														<div class="wpb_column vc_column_container vc_col-sm-2 vc_hidden-md vc_hidden-sm vc_hidden-xs">
															<div class="vc_column-inner ">
																<div class="wpb_wrapper">
																	<div class='themeton-play-button uk-flex uk-flex-middle margin-right-minus color_plum  uk-flex-center'>
																		<a href='#' class='uk-icon-link uk-toggle uk-flex uk-flex-middle uk-flex-center'><i class='fa fa-play' aria-hidden='true'></i></a>
																		<div id='media-53482' class='uk-flex-top uk-modal'>
																			<div class='uk-modal-dialog uk-width-auto uk-margin-auto-vertical'>
																				<a href='#' class='uk-icon-link uk-icon uk-close uk-modal-close-outside'><svg width='14' height='14' viewBox='0 0 14 14' xmlns='http://www.w3.org/2000/svg'><line fill='none' stroke='#000' stroke-width='1.1' x1='1' y1='1' x2='13' y2='13'></line><line fill='none' stroke='#000' stroke-width='1.1' x1='13' y1='1' x2='1' y2='13'></line></svg></a>
																				<!--media-53482<iframe src='wp-content/uploads/sites/31/2017/06/video.mp4' width='880' height='495' class='uk-video'></iframe> -->
																				<video class='video-fluid z-depth-1' loop controls muted><source src='wp-content/uploads/sites/31/2017/06/video.mp4' controls='controls' type="video/mp4" preload='none' /></video>
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
										<div class="wpb_column vc_column_container vc_col-sm-6">&nbsp;</div>
									</div>
									<div class="vc_row-full-width vc_clearfix"></div>
									<div class="vc_row wpb_row vc_row-fluid pb9 pb2@s vc_custom_1554192406201">
										<div class="vc_row-full-width vc_clearfix"></div>
										<div class="vc_row-full-width vc_clearfix"></div>
										
										<!--/*//////////////////////////////////////////*/-->
										<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid pr6@s pl6@s vc_custom_1551923920384 vc_row-has-fill vc_row-o-content-middle vc_row-flex">
											<div class="wpb_column vc_column_container vc_col-sm-12">
												<div class="vc_column-inner ">
													<div class="wpb_wrapper">
														<div class='mungu-element mungu-element-counter uk-section text-light ml8@s  vc_custom_1554711769588' style="padding-top: 0px !important;padding-bottom: 23px !important;">
															<div class='uk-grid uk-grid-small uk-scrollspy uk-child-width-expand uk-flex-left uk-text-left'>
																<div class="top-sections">
																	<div class="container">
																		<div class="row">
																			<div class="col-sm-6 text-center">
																				<img src="wp-content/uploads/sites/31/2017/06/All-Phone.png" alt="images" style="width: 58%;margin-top: 4%;">
																			</div>
																			<div class="col-sm-6" style="margin-top: -6%;">
																				<div class="text-sectio">
																					<h2>Download the Udawat<br>
																					Gastroenterology Clinic App</h2>
																					<p>The Best Gastroenterology Clinic <br> App to Book Appointments Anywhere Anytime <br> 
																					Call  0141 415 6703 or click below to get started.</p>
																					<div class="input-section">
																						<form id="send_email" method="post" enctype="multipart/form-data">
																							<input type="text" name="txt_email" class="form-controls section" value="" placeholder="Enter Email Address" style="width: 40%;color:black !important;padding-top:5.1px;padding-bottom:5.1px;border-radius: 8px;    border: 1px solid #fff;" required>
																							<button type="submit" name="Btnsubmit" class="buttion-section" style="    width: 20%;background-color: #2f3844;border-radius: 8px 8px 8px 8px;    border: 1px solid #4c4b4b;padding: 6px 5px 6px 5px;">Send Link</button>
																							<div class="messageShow" style="margin-top: 3%;"></div>
																						</form>
																					</div>
																					<br><br>
																					<div class="tow-section" style="margin-top: -7%;">
																						<a href="https://play.google.com/store/apps/details?id=com.opd.drharshudawat "><img src="wp-content/uploads/sites/31/2017/06/btn-android-play-store.png" alt="images"></a>
																						<!--<a href="#"><img src="wp-content/uploads/sites/31/2017/06/btn-ios-app-store.png" alt="images"></a>-->
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
											</div>
										</div>
										

										
									<div class="vc_row-full-width vc_clearfix"></div>
									<div class="vc_row wpb_row vc_row-fluid vc_custom_1491267326951">
										<div class="wpb_column vc_column_container vc_col-sm-12">
											<div class="vc_column-inner ">
												<div class="wpb_wrapper">
													<h2 style="font-size: 36px;line-height: 1;text-align: center" class="vc_custom_heading mvb0 vc_custom_1551752659806" >News &amp; Opinion
														<!--<a href="blog.php"></a>-->
													</h2>
													<div class="mungu-element mungu-element-blog uk-scrollspy medio_blog ">
														<div class="uk-scrollspy uk-grid medio_blog  mungu-blog-col4" style="">
															<?php echo $recent_news;?>
														</div>
													</div><!-- end .mungu-element/blog -->
												</div>
											</div>
										</div>
									</div>
									<div class="vc_row wpb_row vc_row-fluid">
										<div class="wpb_column vc_column_container vc_col-sm-12">
											<div class="vc_column-inner ">
												<div class="wpb_wrapper">
													<div class="wpb_text_column wpb_content_element " ><div class="wpb_wrapper"></div></div>
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
<script>
	jQuery( document ).ready(function( $ ) {
		jQuery("form#send_email").submit(function(e) {
			//console.log("Hii k");
			e.preventDefault();																
			jQuery.ajax({
				url: "script_sendemail_applink.php",
				type: 'POST',
				data: jQuery('form#send_email').serialize(),
				success: function (data) {
					console.log(data);
					jQuery(".messageShow").html(data); 			          
					setTimeout(function () {
						jQuery('.messageShow').html('');
					}, 5000); 			
				}
				
			});
		});
	});
	
</script>
<script>
(function() {function addEventListener(element,event,handler) {
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
<script type="text/javascript">
	function revslider_showDoubleJqueryError(sliderID) {
		var errorMessage = "Revolution Slider Error: You have some jquery.js library include that comes after the revolution files js include.";
		errorMessage += "<br> This includes make eliminates the revolution slider libraries, and make it not work.";
		errorMessage += "<br><br> To fix it you can:<br>&nbsp;&nbsp;&nbsp; 1. In the Slider Settings -> Troubleshooting set option:  <strong><b>Put JS Includes To Body</b></strong> option to true.";
		errorMessage += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jquery.js include and remove it.";
		errorMessage = "<span style='font-size:16px;color:#BC0C06;'>" + errorMessage + "</span>";
			jQuery(sliderID).show().html(errorMessage);
	}
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