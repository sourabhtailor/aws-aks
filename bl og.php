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
	$order_by = "int_id DESC";
	//echo 'hii1';die;
	$query_fetch = $db->sql_select($tbl_name, $col, $where, $order_by);
	if(count($query_fetch) > 0 ){
		for($i=0; $i < count($query_fetch); $i++){
			$data['int_id']             = $query_fetch[$i]['int_id'];
			$txt_date    				= $query_fetch[$i]['create_at'];
			$date_txt_date              = date('F j, Y', strtotime($txt_date));
			$data['txt_image']          = $query_fetch[$i]['txt_image'];
			$data['txt_title']          = $query_fetch[$i]['txt_title'];
			$data['txt_description']    = $query_fetch[$i]['txt_description'];
			$c_date = date('d-m-Y');
			//echo $c_date;
				$recent_news .= '<div class="fs-rp-item">
											<div class="entry-image"><a href="blog.php"><img width="150" height="150" src="https://drharshudawat.com/images/upload/'.$data['txt_image'].'" class="attachment-thumbnail size-thumbnail" alt="Laboratory" srcset="https://drharshudawat.com/images/upload/'.$data['txt_image'].', https://drharshudawat.com/images/upload/'.$data['txt_image'].' 400w" sizes="(max-width: 150px) 100vw, 150px" /></a></div>
											<div class="entry-rp">
												<div class="entry-meta">
													<span><a href="#"></a></span>
													<span><a href="#">themeton</a></span>
												</div>
												<h4><a href="#">'.$data['txt_title'].'</a></h4>
												<p class="read-more"><a href="#">read the article</a></p>
											</div>
										</div>';
			$article_data .='<hr class="uk-divider-icon">  <div class="entry-media">
								<a href="blog.php" class="">
									<div class="themeton-image">
										<!---<img src="wp-content/uploads/sites/31/2017/30/h1.jpeg" style="width: 892px;" alt=""/>--->
										<img src="https://drharshudawat.com/images/upload/'.$data['txt_image'].'" style="width: 892px;" alt=""/>
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
							<div class="medio-blog-content">
								<div class="blog-post-meta-section">
									<h3 class="uk-article-title" >
										<a class="uk-link-reset" href="#">'.$data['txt_title'].'</a>
									</h3>
								</div>
								<div class="blog-date">
									<span class="uk-icon mr1" data-uk-icon="icon:calendar"></span>
									<a class="uk-button-text color-brand" href="#">'.$date_txt_date.'</a>
									<!--<span class="uk-icon mr1 ml2" data-uk-icon="icon:comment"></span>
									<a class="uk-button-text color-brand" href="#">3 Comments</a>-->
								</div>
								<p>'.$data['txt_description'].'</p>
								<!--<a class="uk-button uk-button-default color-ancient-bg" href="#">Read More
									<span class="uk-icon" data-uk-icon="icon:arrow-right"></span>
								</a>-->
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
		<title>Practice To Follow</title>
		<link rel='dns-prefetch' href='https://fonts.googleapis.com/' />
		<script data-require="jquery@*" data-semver="2.2.0" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script data-require="bootstrap@*" data-semver="3.3.6" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link data-require="bootstrap-css@3.3.6" data-semver="3.3.6" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" />
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />	
		<style type="text/css">
		.vc_custom_1553502786044 {
		padding-bottom: 20px !important;
		background-image: url(wp-content/uploads/sites/31/2018/05/violet-box983f.jpg?id=1199) !important;
		background-position: 0 0 !important;
		background-repeat: repeat !important;
		}

		@media only screen and (max-width: 768px) {
			/* For mobile phones: */
			.uk-grid>* {
				padding-left: 0px !important;
			}
			.mungu-element.mungu-button.uk-flex.uk-flex-center.uk-float-center.booking-sec {
				margin: 20px 0px 20px 102px;
			}
			.uk-button-default {
				background-color: #63599e;
				border: none;
				border-radius: 0px;
				padding: 18px 13px !important;
				color: #fff;
				font-size: 15px;
				line-height: 1;
				text-transform: uppercase;
				font-weight: 600;
				-webkit-transition: all .2s ease-in-out;
				transition: all .2s ease-in-out;
			}
		  }
		div#test_section {
			margin: 13px;
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
		
		<style type="text/css" data-type="vc_shortcodes-custom-css">.vc_column_container>.vc_column-inner {
    box-sizing: border-box;
    padding-left: 3px;
    padding-right: 20px;
    width: 100%;
}.vc_custom_1551541901651{margin-top: 46px !important;}.vc_custom_1554171066700{padding-top: 30px !important;padding-bottom: 50px !important;}.vc_custom_1551767028403{padding-right: 15px !important;}.vc_custom_1551766958397{border-left-width: 1px !important;padding-left: 20px !important;border-left-color: #b2bcbd !important;border-left-style: solid !important;}.vc_custom_1551534769676{margin-bottom: -7px !important;}.vc_custom_1552802309911{margin-top: 0px !important;margin-bottom: 0px !important;}.vc_custom_1551535277062{margin-bottom: -7px !important;}.vc_custom_1552802384924{margin-top: 0px !important;margin-bottom: 0px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1554110925366{background-image: url(wp-content/uploads/sites/31/2017/06/bannerpic.png?id=1001) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554110862652{margin-left: -15px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1553482574309{padding-bottom: 0px !important;}.vc_custom_1552749412294{margin-top: 0px !important;padding-top: 0px !important;background-image: url(wp-content/uploads/sites/31/2017/06/Path-211a80.png?id=1281) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554787876299{background-color: #4f4780 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552321818900{margin-bottom: 0px !important;}.vc_custom_1554719683187{margin-top: 135px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552754605138{margin-left: -15px !important;}.vc_custom_1554786847685{margin-bottom: 0px !important;}.vc_custom_1552754523147{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1552754535828{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1554788006379{padding-top: 25px !important;}.vc_custom_1554789825528{padding-top: 20px !important;}.vc_custom_1554787620879{margin-bottom: 0px !important;}@media screen and (min-width: 980px) {
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
		<style type="text/css" title="dynamic-css" class="options-output">.wrapper>.page-title{background-color:#3db8db;background-size:cover;background-image:url('wp-content/uploads/sites/2/2017/03/page-title-bg.html');}</style><noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>
	</head>
	<body class="blog skin-medio wpb-js-composer js-comp-ver-5.4.4 vc_responsive">
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
			<?php include 'header.php';?>
			<!-----------Header End----------->	
			<div class="uk-flex uk-child-width-1-2 medio-responsive-menu uk-hidden@m uk-padding-small">
				<div class="uk-flex uk-flex-middle">
					<a href="index.php" class="custom-logo-link" rel="home">
						<img src="wp-content/uploads/sites/31/2017/06/logooo.png" alt=""  class="custom-logo">
					</a>
				</div>
				<div class="uk-flex uk-flex-middle uk-flex-right">
					<a href="#" class="hamburger-menu uk-navbar-toggle uk-navbar-toggle-icon uk-icon"><!---offcanvas--->
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
														<li typeof="v:Breadcrumb"><a href="index.php" rel="v:url" property="v:title">Home</a></li><li typeof="v:Breadcrumb"><a href="blog.php" rel="v:url" property="v:title">Practices To Follow</a></li>
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
			
			<section class="uk-section">
				<div class="uk-container uk-position-relative">
					<div class="uk-grid uk-flex uk-flex-center">
						<div class="uk-width-1-1@s uk-width-3-4@m">
							<article class="medio-blog-container uk-grid-margin medio-blog-col1 blog-archive-style post-221 post type-post status-publish format-standard has-post-thumbnail hentry category-medical tag-health tag-medic">
							
							<h5 class="widget-title" style='text-align: center;font-size: 22px;'><span>Practices To Follow Content</span></h5>
								<?php echo $article_data;?>
							</article>
							
							             
							<div class="pagination-container pagination-style-2 uk-flex uk-flex-center">
								<ul class='pagination uk-flex uk-flex-middle'>
									
								</ul>
								<div class="uk-clearfix clearfix"></div>
							</div>
						</div>
						<div class="uk-width-1-4@m  sidebar area-right-sidebar">
							<div class="entry-sidebar theiaStickySidebar">
									
								<div id="categories-2" class="widget widget_categories">
									<h5 class="widget-title"><span>Service Categories</span></h5>		
									<ul>
										<li class="cat-item cat-item-2"><a href="service_dyspepsia.php">Dyspepsia</a></li>
										<li class="cat-item cat-item-3"><a href="service_hepatitis_b.php">Hepatitis-B</a></li>
										<li class="cat-item cat-item-4"><a href="service_hepatitis_c.php">Hepatitis-C</a></li>
										<li class="cat-item cat-item-1"><a href="service_Chronic.php">Chronic Constipation</a></li>
										<li class="cat-item cat-item-1"><a href="service_ulcerative_colitis.php">Ulcerative Colitis</a></li>
										<li class="cat-item cat-item-1"><a href="service_irritable_bowel_syndrome.php">Irritable Bowel Syndrome (IBS)</a></li>
										<li class="cat-item cat-item-1"><a href="service_endoscopy.php">Endoscopy</a></li>
									</ul>
								</div>
								<!--<div id="themeton_recent_posts_widget-1" class="widget latest_blogs">
									<h5 class="widget-title"><span>Recent News</span></h5>
									<div class="fs-recent-post">
										<div class="fs-rp-item">
											<?php echo $recent_news; ?>
										</div>
										
										<div class="fs-rp-item no-thumb">
											<div class="entry-rp">
												<div class="entry-meta">
													
												</div>
											</div>
										</div>
									</div>
								</div>-->
								        
							</div>
						</div>
						<div class="uk-clearfix clearfix"></div>
					</div>
				</div>
			</section>
			<!-----------Footer Start--------->
							
				<?php include 'footer.php'; ?>
							
			<!-----------Footer End----------->	
		</div><!-- end .wrapper -->
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
