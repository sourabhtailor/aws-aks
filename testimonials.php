<?php

ini_set('display_errors', 1);
session_start();
require_once 'config/DB.php';
$db = new DB();
$connect = $db->connect();
$col = array();
$Book_id ='';
$image ='';
//echo 'hii1';die;
$calculateAvrageRating ='';
/* if (isset($_SESSION['u_id']) || isset($_SESSION['txt_email'])) {
	$user_id = $_SESSION['u_id']; */
	$tbl_name_avg = 'tab_customer_review';
	$query_fetch_avrage_rating = $db->sql_select($tbl_name_avg, $col = array(), $where = null, $order_by = null);
	//echo count($query_fetch_avrage_rating);
	if (count($query_fetch_avrage_rating) > 0) {
		//print_r($query_fetch_avrage_rating);
		$oneStarRating = 0;
			$twoStarRating = 0;
			$threeStarRating = 0;
			$fourStarRating = 0;
			$fiveStarRating = 0;
		for($k = 0; $k < count($query_fetch_avrage_rating); $k++){
			$Book_id = $query_fetch_avrage_rating[$k]['book_id'];
			$txt_review_content = $query_fetch_avrage_rating[$k]['txt_review_content'];
			$txt_rating = $query_fetch_avrage_rating[$k]['txt_rating'];
			$txt_review_title = $query_fetch_avrage_rating[$k]['txt_review_title'];
			$txt_name = $query_fetch_avrage_rating[$k]['txt_name'];
			$created_at = $query_fetch_avrage_rating[$k]['create_at'];
			
			if(is_numeric($txt_rating) && $txt_rating == 1){
				$oneStarRating = $oneStarRating +1;			
			}
			if(is_numeric($txt_rating) && $txt_rating == 2){
				$twoStarRating = $twoStarRating +1;			
			}
			if(is_numeric($txt_rating) && $txt_rating == 3){
				//echo 'jjjj';
				$threeStarRating = $threeStarRating +1;			
			}
			if(is_numeric($txt_rating) && $txt_rating == 4){
				$fourStarRating = $fourStarRating +1;			
			}
			if(is_numeric($txt_rating) && $txt_rating == 5){
				$fiveStarRating = $fiveStarRating+1;			
			}
		}
		//echo $fiveStarRating.'+';
		
		 $upperPart = ($fiveStarRating * 5 + $fourStarRating * 4 + $threeStarRating *3 + $twoStarRating *2 + $oneStarRating *1);
		 $lowerPart =  ($fiveStarRating + $fourStarRating + $threeStarRating + $twoStarRating + $oneStarRating);
		 $calculateAvrageRating = $upperPart/$lowerPart;		
	}
	$tbl_name_rating = 'tab_customer_review';
	$where = "";
	$div_body = "";
	$query_fetch_rating = $db->sql_select($tbl_name_rating, $col = array(), $where, $order_by = null);
	if($query_fetch_rating){
		$c = 1;
		for ($i = 0; $i < count($query_fetch_rating); $i++) {
			$btn_rating = '';
			for ($j = 1; $j <=5; $j++) {
				$ratingClass = "btn-default btn-grey style='color:black'";
				if($j <= $query_fetch_rating[$i]['txt_rating']) {
					$ratingClass = "btn-warning";
				}
				$btn_rating .= '<button type="button" class="btn btn-xs '.$ratingClass.'" aria-label="Left Align" style="padding: 4px 5px;margin: 1px;">
				  <span class="fa fa-star color-yellow" style="color: #8c7979;"></span>
				</button>';	 
			}
			//$Book_id = $query_fetch_rating[$i]['book_id'];
			$txt_review_content = $query_fetch_rating[$i]['txt_review_content'];
			$txt_rating = $query_fetch_rating[$i]['txt_rating'];
			$txt_review_title = $query_fetch_rating[$i]['txt_review_title'];
			$txt_name = $query_fetch_rating[$i]['txt_name'];
			$created_at = $query_fetch_rating[$i]['create_at'];
			$txt_image = $query_fetch_rating[$i]['txt_image'];
			$user_id = $query_fetch_rating[$i]['user_id'];
			
				$tbl_name = 'tab_user';
				$where = "u_id='$user_id'";
				$query_fetch = $db->sql_select($tbl_name, $col=array(), $where, $order_by = null);
				if ($query_fetch) {
					$user_id = $query_fetch[0]['u_id'];
					$txt_image = $query_fetch[0]['txt_image'];
					$oauth_uid   = $query_fetch[0]['oauth_uid'];
					if($oauth_uid != ''){
						$image ='<img class="userImg" src="'.$txt_image.'" style="border-radius: 350px;    margin-bottom: 23%">   <span style="font-size:2.5rem;color: #fafaff;font-weight:500;font-family: Heebo,sans-serif;"></span>';
					}else{
						$image ='<img class="userImg" src="http://drharshudawat.com/images/upload/'. $txt_image.'" style="border-radius: 350px;    margin-bottom: 23%">   <span style="font-size:2.5rem;color: #fafaff;font-weight:500;font-family: Heebo,sans-serif;"></span>';
					}
				} 
			$div_body .= '<a href="#" class="uk-grid-margin">
							<div class="mungu-item ml1@s mr1@s" style="width: 95%;">
								<h2> '.$txt_review_title.'</h2>
								 <p>'.$txt_review_content.'</p>
								<div class="profile_image">'.$image.'</div>
								<div class="testi-meta">
									<h4>'.$txt_name.'</h4>
									<div class="review-block-rate"> 
											'.$btn_rating.'
										<!--<button type="button" class="btn btn-xs btn-warning" aria-label="Left Align">
										<span class="fa fa-star color-yellow" style="color: #ffff;"></span></button>-->
									</div>
								</div>
							</div> 
						</a>'; 
						$c++;	
		}//for loop 	
	}//if condition
	//echo $div_body;
	$notification_reviews='';
	if(isset($_SESSION['review_msg'])){
			$notification_reviews ='<div class="alert alert-success alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
										</button>
										<strong>Success!</strong>'.$_SESSION['review_msg'].'
									</div>';
			unset($_SESSION['review_msg']);
	}if(isset($_SESSION['review_error'])){
		$notification_reviews ='<div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Failed!</strong>'.$_SESSION['review_error'].'
                                </div>';
		unset($_SESSION['review_error']);
	}
/* }else{
	header('Location: login.php');
} */
?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Testimonials</title>
		<script data-require="jquery@*" data-semver="2.2.0" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script data-require="bootstrap@*" data-semver="3.3.6" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link data-require="bootstrap-css@3.3.6" data-semver="3.3.6" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" />
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
		<script src='https://www.google.com/recaptcha/api.js' async defer ></script>
		<style type="text/css">	
		@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
		fieldset, label { margin: 0; padding: 0; }
		body{ margin: 20px; }
		h1 { font-size: 1.5em; margin: 10px; }

		/****** Style Star Rating Widget *****/
		.rating {
			--star-size: 3;  /* use CSS variables to calculate dependent dimensions later */
			padding: 0;  /* to prevent flicker when mousing over padding */
			border: none;  /* to prevent flicker when mousing over border */
			unicode-bidi: bidi-override; direction: rtl;  /* for CSS-only style change on hover */
			text-align: left;  /* revert the RTL direction */
			user-select: none;  /* disable mouse/touch selection */
			font-size: 3em;  /* fallback - IE doesn't support CSS variables */
			font-size: calc(var(--star-size) * 1em);  /* because `var(--star-size)em` would be too good to be true */
			cursor: pointer;
			/* disable touch feedback on cursor: pointer - http://stackoverflow.com/q/25704650/1269037 */
			-webkit-tap-highlight-color: rgba(0,0,0,0);
			-webkit-tap-highlight-color: transparent;
			margin-bottom: 1em;
		  }
		  /* the stars */
		  .rating > label {
			color:#ddd;
			display: inline-block;
			position: relative;
			width: 1.1em;  /* magic number to overlap the radio buttons on top of the stars */
			width: calc(var(--star-size) / 3 * 1.1em);
		  }
		  .rating > *:hover,
		  .rating > *:hover ~ label,
		  .rating:not(:hover) > input:checked ~ label {
			color: transparent;  /* reveal the contour/white star from the HTML markup */
			cursor: inherit;  /* avoid a cursor transition from arrow/pointer to text selection */
		  }
		  .rating > *:hover:before,
		  .rating > *:hover ~ label:before,
		  .rating:not(:hover) > input:checked ~ label:before {
			content: "★";
			position: absolute;
			left: 0;
			color: gold;
		  }
		  .rating > input {
			position: relative;
			transform: scale(3);  /* make the radio buttons big; they don't inherit font-size */
			transform: scale(var(--star-size));
			/* the magic numbers below correlate with the font-size */
			top: -0.5em;  /* margin-top doesn't work */
			top: calc(var(--star-size) / 6 * -1em);
			margin-left: -2.5em;  /* overlap the radio buttons exactly under the stars */
			margin-left: calc(var(--star-size) / 6 * -5em);
			z-index: 2;  /* bring the button above the stars so it captures touches/clicks */
			opacity: 0;  /* comment to see where the radio buttons are */
			font-size: initial; /* reset to default */
		  }
		.help-block {
			color: red;
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
		.vc_custom_1508824581122{padding-top: 36px !important;padding-right: 60px !important;padding-bottom: 30px !important;padding-left: 60px !important;background-color: #403678 !important;}.vc_custom_1509092891283{border-bottom-width: 1px !important;padding-bottom: 30px !important;border-bottom-color: #5b5096 !important;border-bottom-style: solid !important;}.vc_custom_1508823233184{margin-right: 0px !important;margin-left: 0px !important;}.vc_custom_1508823425668{padding-left: 0px !important;}.vc_custom_1508823431780{padding-right: 0px !important;}.vc_column_container>.vc_column-inner {
    box-sizing: border-box;
    padding-left: 3px!important;
    padding-right: 20px!important;
    width: 100%;
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
		<style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1551541901651{margin-top: 46px !important;}.vc_custom_1554171066700{padding-top: 30px !important;padding-bottom: 50px !important;}.vc_custom_1551767028403{padding-right: 15px !important;}.vc_custom_1551766958397{border-left-width: 1px !important;padding-left: 20px !important;border-left-color: #b2bcbd !important;border-left-style: solid !important;}.vc_custom_1551534769676{margin-bottom: -7px !important;}.vc_custom_1552802309911{margin-top: 0px !important;margin-bottom: 0px !important;}.vc_custom_1551535277062{margin-bottom: -7px !important;}.vc_custom_1552802384924{margin-top: 0px !important;margin-bottom: 0px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1554110925366{background-image: url(wp-content/uploads/sites/31/2017/06/bannerpic.png?id=1001) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554110862652{margin-left: -15px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1553482574309{padding-bottom: 0px !important;}.vc_custom_1552749412294{margin-top: 0px !important;padding-top: 0px !important;background-image: url(../../wp-content/uploads/sites/31/2017/06/Path-211a80.png?id=1281) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554787876299{background-color: #4f4780 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552321818900{margin-bottom: 0px !important;}.vc_custom_1554719683187{margin-top: 135px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552754605138{margin-left: -15px !important;}.vc_custom_1554786847685{margin-bottom: 0px !important;}.vc_custom_1552754523147{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1552754535828{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1554788006379{padding-top: 25px !important;}.vc_custom_1554789825528{padding-top: 20px !important;}.vc_custom_1554787620879{margin-bottom: 0px !important;}@media screen and (min-width: 980px) {
			.form-padding {
			  padding-left: 50px;
			  padding-right: 50px;
			}
		}div#top-header-section {
			margin-right: 4px;
		}h2.vc_custom_heading.vc_custom_1552802384924{
			margin-left: -46%;
			padding: 0 0px 0 1px;
		}div#test_section a.btn.btn-default.btn-rounded.mb-4 {
			margin-right: -18px;
		}div#test_section {
			margin: 28px;
		}@media only screen and (max-width: 768px) {
			a.uk-button.uk-button-default.testimonial-section{
				margin-top: 2% !important;
				margin-left: -20% !important;
			}
			.uk-inline.uk-width-1-1@m{
				width:93% !important;
			}
			input#rating1 {
				width: 12px;
			}input#rating2 {
				width: 12px;
			}input#rating3 {
				width: 12px;
			}input#rating4 {
				width: 12px;
			}input#rating5 {
				width: 12px;
			}
			.form-group.recpticha {
				padding-left: 10px !important;
			}
			.uk-width-1-1@m.uk-grid-margin{
				padding-left:0px !important;
			}
			.rc-anchor-normal .rc-anchor-pt {
				margin: 2px 13px 0 0;
				padding-right: 93px !important; 
				position: absolute;
				right: 0; 
				text-align: right;
				width: 276px;
			}
			.uk-grid-small>* {
				padding-left: 0px !important;
			}
			.uk-grid-small.uk-margin-remove-top.uk-grid{
				text-align:center;
				
			}
		}@media screen and (max-width: 980px) {
			.form-padding {
			  margin-bottom: 45px;
			}
		}
		#scroll {
			box-shadow: none;
			padding:0;
		}#scroll:hover {
			box-shadow: none;
		}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1509939171657{margin-top: 100px !important;}.vc_custom_1509939179248{margin-bottom: 100px !important;}.vc_custom_1509939551805{margin: 0px !important;}.vc_custom_1509939644011{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 30px !important;margin-left: 0px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1551541901651{margin-top: 46px !important;}.vc_custom_1554171066700{padding-top: 30px !important;padding-bottom: 50px !important;}.vc_custom_1551767028403{padding-right: 15px !important;}.vc_custom_1551766958397{border-left-width: 1px !important;padding-left: 20px !important;border-left-color: #b2bcbd !important;border-left-style: solid !important;}.vc_custom_1551534769676{margin-bottom: -7px !important;}.vc_custom_1552802309911{margin-top: 0px !important;margin-bottom: 0px !important;}.vc_custom_1551535277062{margin-bottom: -7px !important;}.vc_custom_1552802384924{margin-top: 0px !important;margin-bottom: 0px !important;}#header {background-color:#63599e;position:absolute;width:100%; z-index:9999;}.medio-responsive-menu{background:#63599e;}.themeton-menu > li > a {font-family:Poppins!important;font-weight:300!important;text-transform:uppercase!important;font-size:14px!important;line-height:14px!important;color:#ffffff!important;}.themeton-menu > li > a {padding-top:10px !important;padding-right:23px !important;padding-bottom:10px !important;padding-left:23px !important;}.themeton-menu > li > a:hover,.themeton-menu > li > a:focus {color:#e2e2e2!important;}.themeton-menu li ul li a {color:#beb6ea!important;}.themeton-menu > li ul li {}.themeton-menu > li ul li a:hover {color:#ffffff!important;}.themeton-menu > li ul li.current_page_item > a {color:#988aea!important;}.themeton-menu > li > .sub-menu, .themeton-menu > li > .sub-menu > li .sub-menu  {background-color:rgba(64,54,120,1)!important;}.themeton-menu > li ul li {border-color:rgba(91,80,150,1)!important;}.vc_custom_1554110925366{background-image: url(wp-content/uploads/sites/31/2017/06/bannerpic.png?id=1001) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554110862652{margin-left: -15px !important;}#page-title {}@media screen and (min-width: 980px) {
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
		}.vc_custom_1553482574309{padding-bottom: 0px !important;}.vc_custom_1552749412294{margin-top: 0px !important;padding-top: 0px !important;background-image: url(wp-content/uploads/sites/31/2017/06/Path-211a80.png?id=1281) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554787876299{background-color: #4f4780 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552321818900{margin-bottom: 0px !important;}.vc_custom_1554719683187{margin-top: 135px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552754605138{margin-left: -15px !important;}.vc_custom_1554786847685{margin-bottom: 0px !important;}.vc_custom_1552754523147{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1552754535828{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1554788006379{padding-top: 25px !important;}.vc_custom_1554789825528{padding-top: 20px !important;}.vc_custom_1554787620879{margin-bottom: 0px !important;}#footer {background-color:transparent;font-family:Poppins!important;font-weight:300!important;color:#8b99a6!important;}#footer, #footer p, #footer strong { color:#8b99a6;}#footer .widget .widget-title,#footer .widget .widgettitle {font-family:Poppins!important;font-weight:300!important;}</style>
		<link rel="icon" href="wp-content/uploads/sites/31/2017/06/Picture1.png" sizes="32x32" />
		<link rel="icon" href="wp-content/uploads/sites/31/2017/06/Picture1.png" sizes="192x192" />
	
		<style type="text/css" title="dynamic-css" class="options-output">.wrapper>.page-title{background-color:#3db8db;background-size:cover;background-image:url('wp-content/uploads/sites/2/2017/03/page-title-bg.html');}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1491267630621{margin-bottom: 0px !important;}.vc_custom_1553513392867{margin-bottom: 100px !important;}.vc_custom_1553513280377{padding-bottom: 20px !important;background-image: url(wp-content/uploads/sites/31/2018/05/violet-box983f.jpg?id=1199) !important;background-position: 0 0 !important;background-repeat: repeat !important;}.vc_custom_1553513372783{margin-bottom: 0px !important;}</style><noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>
	</head> 
	<body class="page-template-default page page-id-273 page-child parent-pageid-502 skin-medio wpb-js-composer js-comp-ver-5.4.4 vc_responsive">
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
													<li typeof="v:Breadcrumb"><a href="index.php" rel="v:url" property="v:title">Home</a></li>  
													<li typeof="v:Breadcrumb"><a href="testimonials.php" rel="v:url" property="v:title">Testimonials</a></li>
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
		
		<section class="uk-section" style="padding-top:100px;padding-bottom:0px;">
			<div class="uk-container uk-container-default uk-position-relative" style="padding-bottom:6%">
				<div class="uk-grid uk-flex uk-flex-center">
					<div class="uk-width-1-1@s">
						<article class="medio-page-single uk-article post-273 page type-page status-publish hentry">
							<div class="vc_row wpb_row vc_row-fluid vc_custom_1491267630621">
								<div class="wpb_column vc_column_container vc_col-sm-12">
									<div class="vc_column-inner ">
										<div class="wpb_wrapper">
											<h2 style="font-size: 30px;color: #161720;text-align: center" class="vc_custom_heading mvb0" >Testimonials</h2>
											<div class="wpb_text_column wpb_content_element  vc_custom_1553513372783" >
												<div class="wpb_wrapper">
													<p style="text-align: center; margin: 0; font-weight: 500;">Our Customers Say</p>
												</div>
											
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="opal-review">
								<div class="stars" style="margin-left: -1%;margin-right: 4%;">
								<p style="margin-bottom: -3%;margin-top: 4%;font-size: x-large;border-bottom: 1px solid;">Site Reviews</p>
									<h2 class="bold padding-bottom-7"><?php printf('%.1f', $calculateAvrageRating); ?> <small>/ 5</small></h2>
									<?php
										 $averageRating = round($calculateAvrageRating, 0);
										for ($k = 1; $k <= 5; $k++) {
											$ratingClass = "btn-default btn-grey";
											if($k <= $averageRating) {
												$ratingClass = "btn-warning";
											} 
										?>
										<button type="button" class="btn btn-sm <?php echo $ratingClass; ?>" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>	
										<?php } ?>
								</div>
							</div>
							<div class="vc_row wpb_row vc_row-fluid vc_custom_1553513392867">
								<div class="wpb_column vc_column_container vc_col-sm-12">
									<div class="vc_column-inner ">
										<div class="wpb_wrapper">
											<div class='mungu-element testi-item uk-scrollspy uk-grid uk-grid-medium uk-child-width-1-2@m uk-child-width-1-1@s  ' id='testimonial_grid'>
												<?php echo $div_body; ?>
												
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid pr6@s pl6@s vc_custom_1553513280377 vc_row-has-fill vc_row-o-content-middle vc_row-flex" style="">
								<div class="wpb_column vc_column_container vc_col-sm-9" style="margin-left: 11%;">
									<div class="vc_column-inner ">
								<?php echo $notification_reviews; ?>
								
										<div class="wpb_wrapper" style="">
											<div style="" class="mungu-element mungu-button text-sect">
												<p style="font-size: 26px;font-weight: 500; color:#fff;">To book an appointment, please call this number!</p>
											</div>
											
											<div class="mungu-element mungu-button uk-flex uk-flex-center uk-float-center">
												<a class="uk-button uk-button-default testimonial-section"   href="tel:9928076901"  style="margin-top: -7%;margin-left: 75%;background-color: #009eb3; border: none; border-width: 0px; border-color: transparent;padding: 23px;border-radius: 35px;"><span class="uk-icon"><svg width="40" height="40" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> 
												<polyline fill="none" stroke="#000" points="10 5 15 9.5 10 14"></polyline> <line fill="none" stroke="#000" x1="4" y1="9.5" x2="15" y2="9.5"></line></svg></span>+91 9928076901</a>
											</div>
													<!--<form action="script_review.php" autocomplete="off" method="post" id="myform" name="review_frm" enctype="multipart/form-data" class="wpcf7-form" novalidate="novalidate">
														<h4 class="test-section" style="font-size:30px;color: whitesmoke;">Give Us Review</h4>
														<div class="mungu-element mungu-button uk-flex uk-flex-center uk-float-center">
															<a class="uk-button uk-button-default testimonial-section"   href="appointment.php"  style="margin-top: -7%;margin-left: 75%;background-color: #009eb3; border: none; border-width: 0px; border-color: transparent;padding: 23px;"><span class="uk-icon"><svg width="40" height="40" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> 
															<polyline fill="none" stroke="#000" points="10 5 15 9.5 10 14"></polyline> <line fill="none" stroke="#000" x1="4" y1="9.5" x2="15" y2="9.5"></line></svg></span>Book APPOINTMENT</a>
														</div>
														<div class="uk-grid-small uk-margin-remove-top uk-grid ">
															<div class="uk-width-1-1@m uk-grid-margin">
																<div class="uk-inline uk-width-1-1@m ">
																	<span class="wpcf7-form-control-wrap text-546">
																		<span class="form-err"></span>
																		<fieldset class="rating">
																			<input name="rating" type="radio" id="rating5" value="5" on="change:rating.submit">
																			<label for="rating5" title="5 stars">☆</label>

																			<input name="rating" type="radio" id="rating4" value="4" on="change:rating.submit">
																			<label for="rating4" title="4 stars">☆</label>

																			<input name="rating" type="radio" id="rating3" value="3" on="change:rating.submit">
																			<label for="rating3" title="3 stars">☆</label>

																			<input name="rating" type="radio" id="rating2" value="2" on="change:rating.submit" >
																			<label for="rating2" title="2 stars">☆</label>

																			<input name="rating" type="radio" id="rating1" value="1" on="change:rating.submit">
																			<label for="rating1" title="1 stars">☆</label>
																		  </fieldset>
																	</span>
																</div>
															</div>
															<div class="uk-width-1-1@m uk-grid-margin">
																<div class="uk-inline uk-width-1-1@m ">
																	<span class="wpcf7-form-control-wrap text-546">
																		<input type="text" name="txt_name" id="txt_name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required uk-input" aria-required="true" aria-invalid="false" placeholder="Name*" />
																	</span>
																</div>
															</div>
															<div class="uk-width-1-1@m uk-grid-margin">
																<div class="uk-inline uk-width-1-1@m ">
																	<span class="wpcf7-form-control-wrap email-917">
																		<input type="email" name="txt_email" id="txt_email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email uk-input" aria-required="true" aria-invalid="false" placeholder="Email Address*" />
																	</span>
																</div>
															</div>
															<div class="uk-width-1-1@m uk-grid-margin">
																<div class="uk-inline uk-width-1-1@m ">
																	<span class="wpcf7-form-control-wrap tel-182">
																		<input type="tel" name="txt_review_title" id="txt_review_title" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel uk-input" aria-required="true" aria-invalid="false" placeholder="Review Title*" />
																	</span>
																</div>
															</div>
															<div class="uk-width-1-1@m uk-grid-margin">
																<div class="uk-inline uk-width-1-1@m ">
																	<span class="wpcf7-form-control-wrap textarea-685">
																		<textarea name="txt_review_content" id="txt_review_content" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required uk-textarea uk-height-small" aria-required="true" aria-invalid="false" placeholder="Review Content*"></textarea>
																	</span>
																</div>
															</div>
															<div class="form-group recpticha" style="margin-top:4%;">
																<div class="g-recaptcha" data-sitekey="6Ldn6NoUAAAAACldbB2YeFgTvksnMwFchtatAZHa"></div>
															</div>
															<input type="hidden" name="book_id" value="<?php echo $Book_id;?>">
															<input type="hidden" name="user_id" value="<?php echo $user_id;?>">
															<div class="uk-width-1-1@m uk-grid-margin">
																<input style="background-color:#f5f4ff;color:black;" type="submit" id="btn_submit" name="btnsubmit" value="SUBMIT NOW" class="wpcf7-form-control wpcf7-submit uk-button uk-button-default" />
															</div>
														</div>
														<div class="wpcf7-response-output wpcf7-display-none"></div>
													</form>--->
												</div>
											</div>
										</div>
										
									</div>
								<!--</div>
							</div>-->
							
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

<script>
$(':radio').change(function() {
  console.log('New star rating: ' + this.value);
});


</script>
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
<script type='text/javascript' src='wp-content/plugins/mailchimp-for-wp/assets/js/forms-api.min3428.js?ver=4.5.2'></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
            $(document).ready(function () {
                $.validator.addMethod("customemail", function (value, element, params) {
                    if (value == '')
                        return true;
                    var ptrn = /^([a-zA-Z0-9_\.\-\'])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value);
                    return ptrn;
                });
				$('#myform').validate({
					rules: {
						txt_name: {
							required: true,
						},
						txt_email: {
							required: true,
							customemail: true,
						},
						txt_review_title: {
							required: true,
						},
						txt_review_content: {
							required: true,
						},					
					},
					messages: {
						txt_name: {
							required: "Please enter valid user name.",
						},
						txt_email: {
							required: "Please enter a valid email address.",
							customemail: "Please enter a valid email address",
						},
						txt_review_title: {
							required: "Please enter review title.",
						},
						txt_review_content: {
							required: "Please enter review content.",
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
</body>
</html>