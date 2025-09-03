<style>
img.footer-image-icon {
    width: 45%;
}
.back_white_color {
    background-color: #423a6d!important;
}
@media only screen and (max-width: 768px) {
	  /* For mobile phones: */
		.vc_column-inner {
			padding: 0px !important;
		}
		.input-section input.form-controls {
			background: no-repeat;
			//color: #fff;
			border: 1px solid #fff;
			width: 184px;
			padding: 7px;
		}
		.vc_custom_1491267326951 {
			padding-top: 40px !important;
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
		.uk-input, .uk-select, .uk-select:not([multiple]):not([size]) {
			height: 25px;
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
		footer#footer section.vc_section.vc_custom_1552749412294.vc_section-has-fill{
			padding-left: 20px !important;
			padding-right: 20px !important;
		}
		.wpb_wrapper.copyright h2.vc_custom_heading {
			font-size: 15px!important;
			margin: 0 0 10px 0;
			font-weight: 400;
			padding: 13px;
		}
		.form-padding {
			margin-bottom: 0;
		}
		.wpb_wrapper {
			margin: 0px!important;
			padding: 3px !important;
		}
		ul.menu.app-icon li.menu-item.menu-item-type-post_type.menu-item-object-page.menu-item-home.current-menu-item.page_item.page-item-30.current_page_item.menu-item-736 {
			float: left;
			width: 50%;
		}
		ul.menu.app-icon li.menu-item.menu-item-type-post_type.menu-item-object-page.menu-item-739{
			width: 50%;
			float: left;
		}
		img.footer-image-icon {
			width: 95%;
		}
		.p3\@s {
			padding:0 0px !important;
		}
		img {
			-ms-interpolation-mode: bicubic;
			border: 0;
			height: auto;
			max-width: 280px;
		}
		.uk-breadcrumb {
			background: #63599e;
			padding: 1px 4px;
			width: 308px;
		}
		.uk-breadcrumb>*>* {
			display: inline-block;
			font-size: 0.7rem;
			font-weight: 600;
		}
		.uk-breadcrum  a.title-sectio {
			 width: auto !important; 
			}
			.uk-breadcrumb>*>* {
			display: inline-block;
			font-size: 0.6rem;
			font-weight: 600;
			}
			.uk-breadcrumb>:nth-child(n+2):not(.uk-first-column)::before {
			content: "/";
			display: inline-block;
			margin: 0 10px !important;
			
			}
		
		
	}

</style>

<footer id="footer" style="margin-top: -5%;">
					<div class="uk-container uk-container-default uk-position-relative">
						<div class="vc_row wpb_row vc_row-fluid z-index-1 form-padding vc_custom_1553482574309">
							<div class="wpb_column vc_column_container vc_col-sm-12">
								<div class="vc_column-inner ">
									<div class="wpb_wrapper">
										<div class="wpb_text_column wpb_content_element  vc_custom_1552321818900" >
											<div class="wpb_wrapper">
											<!--<script type="text/javascript" src="js/jquery.min.js"></script>-->
												<script>
													/* (function() {
														if (!window.mc4wp) {
															window.mc4wp = {
																listeners: [],
																forms    : {
																	on: function (event, callback) {
																		window.mc4wp.listeners.push({
																			event   : event,
																			callback: callback
																		});
																	}
																}
															}
														}
													})(); */
													$( document ).ready(function( $ ) {
															jQuery("form#mc4wp-form-2").submit(function(e) {
																//console.log("Hi k");
																e.preventDefault();																
																jQuery.ajax({
																	url: "script_newsletter.php",
																	type: 'POST',
																	data: jQuery('form#mc4wp-form-2').serialize(),
																	success: function (data) {
																		jQuery(".mc4wp-response").html(data); 			          
																		setTimeout(function () {
																			jQuery('.mc4wp-response').html('');
																		}, 5000);			
																	}
																	
																});
															});
															});
												</script>
												<!-- Mailchimp for WordPress v4.5.2 - https://wordpress.org/plugins/mailchimp-for-wp/ -->
												
												<form id="mc4wp-form-2" class="mc4wp-form mc4wp-form-409" method="post" data-id="409" data-name="Medical" >
												<div class="mc4wp-response"></div>
													<div class="mc4wp-form-fields">
														<div class="uk-flex uk-flex-middle mailchimp_form m_shadow border-60px back_white_color mmb100">
															<input type="email" name="txt_email" placeholder="Enter Your Email Address" required class="uk-input uk-flex font24 p5" style="color:#fff!important;"/>
															<button type="submit" class="ml3 medsubsribe msub" style="height: 80px !important;width: 90px !important;"><img src="wp-content/uploads/sites/31/2017/06/half_logo.png" alt="Logo"></button>
														</div>
													</div>
													<label style="display: none !important;">Leave this field empty if you're human: <input type="text" name="_mc4wp_honeypot" value="" tabindex="-1" autocomplete="off" /></label>
													<input type="hidden" name="_mc4wp_timestamp" value="1558617416" />
													<input type="hidden" name="_mc4wp_form_id" value="409" />
													<input type="hidden" name="_mc4wp_form_element_id" value="mc4wp-form-2" />
												</form><!-- / Mailchimp for WordPress Plugin -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<section data-vc-full-width="true" data-vc-full-width-init="false" class="vc_section vc_custom_1552749412294 vc_section-has-fill">
							<div class="vc_row wpb_row vc_row-fluid vc_custom_1554719683187 vc_row-has-fill">
								<div class="wpb_column vc_column_container-fluid vc_col-sm-3">
									<div class="vc_column-inner">
										<div class="wpb_wrapper">
											<div class="p3@s p0">
												<a href="index.php" class="custom-logo-link hidden-xs" rel="home">
													<img src="wp-content/uploads/sites/31/2017/06/k_logo.png" alt="Medio Hospital" width="300px" class="custom-logo" style="margin-left: -7%;margin-top: 45px;">
												</a>
												<!--<a href="index.php" class="custom-logo-link hidden-md hidden-sm hidden-lg" rel="home">
													<img src="wp-content/uploads/sites/31/2017/06/footer_logo.png" alt="Medio Hospitals" width="300px" class="custom-logo mobile">
												</a>-->
											</div>
										</div>
									</div>
								</div> 
								
									<div class="wpb_column vc_column_container vc_col-sm-3" style="">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div  class="wpb_widgetised_column wpb_content_element">
													<div class="wpb_wrapper">
														<div id="themeton_address_widget-2" style="margin-top:10%" class="footer_widget widget widget_contact"><h5 class="widget-title">Contact</h5>
															<address>
																<abbr class='address' title='Address'><span class='fa fa-location-arrow'></span>A-111, Shri Ram Marg, Near Udawat <small style='font-weight:300;font-size: 96%;margin-left: 23px;'>Eye Hospital, Shyam Nagar, Jaipur</small></abbr>
																<abbr title='Email'><span class='fa fa-envelope-o'></span> <a href='mailto:harshudawat@gmail.com' class='address_email'>harshudawat@gmail.com
																</a></abbr>
																<abbr title='location'><span class="fa fa-map"></span><a href="https://www.google.com/maps/place/Udawat+Gastroenterology+Clinic/@26.8996971,75.7720106,14z/data=!4m8!1m2!2m1!1sdr+harsh+udawat!3m4!1s0x396db460d61cda6b:0x25f69a6a837878d4!8m2!3d26.8957024!4d75.7658658">Map Location</abbr>
															</address>
														</div>
													</div>
												</div>
											<!--	<div class="flex-container uk-flex uk-child-width-auto uk-flex-top  vc_custom_1552754605138  "><div 	class="vc_icon_element vc_icon_element-outer vc_custom_1554786847685 vc_icon_element-align-left">
													<div class="vc_icon_element-inner vc_icon_element-color-black vc_icon_element-size-lg vc_icon_element-style- vc_icon_element-background-color-grey">
													<a href=""><img src="wp-content/uploads/sites/31/2017/06/g.jpg" ></a></div>
													</div>
													<div class="vc_icon_element vc_icon_element-outer vc_custom_1552754523147 vc_icon_element-align-left">
														<div class="vc_icon_element-inner vc_icon_element-color-black vc_icon_element-size-lg vc_icon_element-style- vc_icon_element-background-color-grey">
															<!--<a href=""><img src="wp-content/uploads/sites/31/2017/06/app.png" ></a></div>
														</div>
													</div>
													<div class="vc_icon_element vc_icon_element-outer vc_custom_1552754535828 vc_icon_element-align-left">
														<div class="vc_icon_element-inner vc_icon_element-color-black vc_icon_element-size-lg vc_icon_element-style- vc_icon_element-background-color-grey">
															<span class="vc_icon_element-icon fa fa-dribbble" ></span>
														</div>
													</div>
												</div>-->
											</div>
										</div>
									</div>
									<div class="wpb_column vc_column_container vc_col-sm-3" style="">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div  class="wpb_widgetised_column wpb_content_element">
													<div class="wpb_wrapper">
														<div id="nav_menu-1" class="footer_widget widget widget_nav_menu" style="margin-top: 9%;">
															<h5 class="widget-title">Navigation</h5>
															<div class="menu-footer-navigation-container" style="line-height:16px;">
																<ul id="menu-footer-navigation-2" class="menu">
																	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-30 current_page_item menu-item-736"><a href="index.php">Home</a></li>
																	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-739"><a href="about.php">About Us</a></li>
																	<!--<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-761"><a href="testimonials.php">Testimonials</a></li>--->
																	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-761"><a href="privacy_policy.php">Privacy Policy</a></li>
																	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-734"><a href="gallary.php">Gallery</a></li>
																	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-741"><a href="contact.php">Contact Us</a></li>
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="wpb_column vc_column_container vc_col-sm-3" style="">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div  class="wpb_widgetised_column wpb_content_element">
													<div class="wpb_wrapper">
														<div id="nav_menu-1" class="footer_widget widget widget_nav_menu" style="margin-top: 9%;">
															<h5 class="widget-title">Download App</h5>
															<div class="menu-footer-navigation-container" style="line-height:16px;">
																<ul id="menu-footer-navigation-2" class="menu app-icon">
																	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-30 current_page_item menu-item-736" style="border-bottom: 0px;"><a href="https://play.google.com/store/apps/details?id=com.opd.drharshudawat">
																	<img src="wp-content/uploads/sites/31/2017/06/btn-android-play-store.png" class="footer-image-icon"></a></li>
																	<!--<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-739" style="border-bottom: 0px;"><a href="#">
																	<img src="wp-content/uploads/sites/31/2017/06/app.png" class="footer-image-icon"></a></li>-->
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								<!--<div class="wpb_column vc_column_container vc_col-sm-3">
									<div class="vc_column-inner ">
										<div class="wpb_wrapper">
											<div  class="wpb_widgetised_column wpb_content_element">
												<div class="wpb_wrapper">
													<div id="themeton_recent_posts_widget-3" class="footer_widget widget latest_blogs">
														<h5 class="widget-title">Recent news</h5>
														<div class="fs-recent-post">
															<div class="fs-rp-item">
																<div class="entry-image">
																	<a href="#"><img width="150" height="150" src="wp-content/uploads/sites/31/2017/03/medio-blog-3-150x150.jpg" class="attachment-thumbnail size-thumbnail" alt="Orpthalmnogy" srcset="http://next.themeton.com/medio/wp-content/uploads/sites/31/2017/03/medio-blog-3-150x150.jpg 150w, http://next.themeton.com/medio/wp-content/uploads/sites/31/2017/03/medio-blog-3-400x400.jpg 400w" sizes="(max-width: 150px) 100vw, 150px" /></a>
																</div>
																<div class="entry-rp">
																	<div class="entry-meta">
																		<span><a href="#">March 24, 2017</a></span>
																		<span><a href="#">themeton</a></span>
																	</div>
																	<h4><a href="#">Hospital vitae elit neclacus  convallis pellent.</a></h4>
																	<p class="read-more"><a href="#">read the article</a></p>
																</div>
															</div>
															<div class="fs-rp-item">
																<div class="entry-image">
																	<a href="#"><img width="150" height="150" src="wp-content/uploads/sites/31/2017/03/medio-blog-1-150x150.jpg" class="attachment-thumbnail size-thumbnail" alt="Laboratory" srcset="http://next.themeton.com/medio/wp-content/uploads/sites/31/2017/03/medio-blog-1-150x150.jpg 150w, http://next.themeton.com/medio/wp-content/uploads/sites/31/2017/03/medio-blog-1-400x400.jpg 400w" sizes="(max-width: 150px) 100vw, 150px" /></a>
																</div>
																<div class="entry-rp">
																	<div class="entry-meta">
																		<span><a href="#">March 24, 2017</a></span>
																		<span><a href="#">themeton</a></span>
																	</div>
																	<h4><a href="#">Mae cenas vitae elit neclacus convallis pellen.</a></h4>
																	<p class="read-more"><a href="#">read the article</a></p>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="wpb_column vc_column_container vc_col-sm-3">
									<div class="vc_column-inner ">
										<div class="wpb_wrapper">
											<div  class="wpb_widgetised_column wpb_content_element">
												<div class="wpb_wrapper">
													<div id="tag_cloud-3" class="footer_widget widget widget_tag_cloud">
														<h5 class="widget-title">Tags</h5>
														<div class="tagcloud">
															<a href="#" class="tag-cloud-link tag-link-5 tag-link-position-1" style="font-size: 8pt;" aria-label="Doctor (1 item)">Doctor</a>
															<a href="#" class="tag-cloud-link tag-link-38 tag-link-position-2" style="font-size: 8pt;" aria-label="Family (1 item)">Family</a>
															<a href="#" class="tag-cloud-link tag-link-6 tag-link-position-3" style="font-size: 8pt;" aria-label="Green (1 item)">Green</a>
															<a href="#" class="tag-cloud-link tag-link-37 tag-link-position-4" style="font-size: 8pt;" aria-label="Happy (1 item)">Happy</a>
															<a href="#" class="tag-cloud-link tag-link-8 tag-link-position-5" style="font-size: 8pt;" aria-label="Health (1 item)">Health</a>
															<a href="#" class="tag-cloud-link tag-link-39 tag-link-position-6" style="font-size: 8pt;" aria-label="Healthy (1 item)">Healthy</a>
															<a href="#" class="tag-cloud-link tag-link-10 tag-link-position-7" style="font-size: 8pt;" aria-label="Life (1 item)">Life</a>
															<a href="#" class="tag-cloud-link tag-link-11 tag-link-position-8" style="font-size: 22pt;" aria-label="Medic (6 items)">Medic</a>
															<a href="#" class="tag-cloud-link tag-link-12 tag-link-position-9" style="font-size: 8pt;" aria-label="Nurse (1 item)">Nurse</a>
															<a href="#" class="tag-cloud-link tag-link-13 tag-link-position-10" style="font-size: 8pt;" aria-label="Nursery (1 item)">Nursery</a>
															<a href="#" class="tag-cloud-link tag-link-40 tag-link-position-11" style="font-size: 8pt;" aria-label="Urology (1 item)">Urology</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>--->
							</div>
						</section>
						<div class="vc_row-full-width vc_clearfix"></div>
						<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1554787876299 vc_row-has-fill">
							<div class="wpb_column vc_column_container vc_col-sm-10">
								<div class="vc_column-inner vc_custom_1554788006379">
									<div class="wpb_wrapper copyright">
										<!--<h2 style="font-size: 16px;color: #ffffff;text-align: left" class="vc_custom_heading"><?php echo date('Y');?> © <a href="http://infomagine.in/">Infomagine.</a> All rights reserved.</h2>-->
										<h2 style="font-size: 16px;color: #ffffff;text-align: left" class="vc_custom_heading">Copyright  ©<?php echo date('Y');?> Udawat Gastroenterology Clinic. All rights reserved.</h2>
									</div>
								</div>
							</div>
							<div class="uk-visible@s wpb_column vc_column_container vc_col-sm-2">
								<div class="vc_column-inner vc_custom_1554789825528">
									<div class="wpb_wrapper">
										<div id="scroll"	class="vc_icon_element vc_icon_element-outer vc_custom_1554787620879 uk-position-static vc_icon_element-align-right vc_icon_element-have-style">
											<div class="vc_icon_element-inner vc_icon_element-color-custom vc_icon_element-have-style-inner vc_icon_element-size-xs vc_icon_element-style-rounded vc_icon_element-background vc_icon_element-background-color-white"><span class="vc_icon_element-icon fa fa-angle-up" style="color:#4f4780 !important"></span></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="vc_row-full-width vc_clearfix"></div>
					</div>
				</footer>