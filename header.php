

<style>
@media only screen and (max-width: 768px) {
	.wpb_wrapper {
		margin: 0px!important;
		padding: 17px;
	}
	.vc_custom_1551766958397 {
		border-left-width: 1px !important;
		padding-left: 0px !important;
		border-left-color: #bccacc !important;
		border-left-style: solid !important;
	}
	div#register_top_section {
		margin-left: -15px;
	}
	
}
.vc_row.wpb_row.vc_inner.vc_row-fluid.vc_custom_155176695839k.vc_row-has-fill {
    border-left: 1px solid #ccc;
}
 .themeton-menu > li > a {
    padding-top: 10px !important;
    padding-right: 10px !important;
    padding-bottom: 10px !important;
    padding-left: 15px !important;
}
</style>
		<?php
		require_once 'config/DB.php';
		$db = new DB();
		$connect = $db->connect();
		ini_set('display_errors',1);
		include('config/functions.php');
		$admin_link ='';
		if(isset($_SESSION['u_id']))
		{ 
			if($_SESSION['role']== 'Admin'){
				//echo 'hii'; 
				$admin_link .='<a class="user-dropdown" href="admin/index.php" style="color: #fff;padding: 6px 31px 6px 15px;display: block; text-align: justify;text-decoration: none;"> Dashboard</a>';
			}else if($_SESSION['role'] != 'Admin'){
				//echo 'byee';
				$admin_link .='<a class="user-dropdown" href="user_dashbord.php" style="padding:62px 152px; display: block;border-bottom:1px solid #ccc; width:100%; color:whitesmoke; text-align: justify;text-decoration: none;">My Account</a>';
			}
			
			$u_id = $_SESSION['u_id'];
			$tbl_name = 'tab_user';
			$where = "u_id = '$u_id'";
			$query_fetch1 = $db->sql_select($tbl_name, $col=array(), $where, $order_by = null);
			if ($query_fetch1) {
				$txt_fullname = ucwords($query_fetch1[0]['txt_name']) . ' ' . ucwords($query_fetch1[0]['txt_lastname']);
				$txt_image = $query_fetch1[0]['txt_image'];
			} 
			$full_name = basename($_SERVER['SCRIPT_NAME']);
			//http://drharshudawat.com/images/upload/'.$txt_image.'
			$header1='';
			$header='';
			$header_1='';
			$header_='';
			
			$homecls='';
			$service='';
			$about='';
			$blog='';
			$appointment='';
			$testimonials='';
			$gallary='';
			$contact='';
			$our_services='';
			$homecls = 'menu-item menu-item-type-post_type menu-item-object-page menu-item-home page_item page-item-30 menu-item-759';
			if($full_name == 'index.php')
				$homecls .= ' current-menu-item active';
			$service ='menu-item menu-item-type-post_type menu-item-object-service menu-item-776';
			if($full_name == 'service.php')
				$service .= ' current-menu-item active';
			$about ='menu-item menu-item-type-post_type menu-item-object-page menu-item-743';
			if($full_name == 'about.php')
				$about .= ' current-menu-item active';
			$appointment ='menu-item menu-item-type-post_type menu-item-object-page menu-item-760';
			if($full_name == 'appointment.php')
				$appointment .= ' current-menu-item active';
			$blog ='menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-744';
			if($full_name == 'blog.php')
				$blog .= ' current-menu-item active';
			$testimonials ='menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-729';
			if($full_name == 'testimonials.php')
				$testimonials .= ' current-menu-item active';
			$gallary ='menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-755';
			if($full_name == 'gallary.php')
				$gallary .= ' current-menu-item active';
			$contact ='menu-item menu-item-type-post_type menu-item-object-page menu-item-754';
			if($full_name == 'contact.php')
			$contact .= ' current-menu-item active';
		
			$our_services ='menu-item menu-item-type-post_type menu-item-object-page menu-item-742';
			if($full_name == 'our_services.php')
			$our_services .= ' current-menu-item active';
		
			//echo $uid = $_SESSION['u_id'];
			$header1 .='<li class="'.$homecls.'"><a href="index.php">Home</a></li>
						<li class="'.$about.'"><a href="about.php">About Us</a></li>
						<li class="'.$service.'"><a href="service.php">Common Diseases</a>
							<ul class="mega-menu pl0">
								<li>
									<div class="vc_row wpb_row vc_row-fluid vc_custom_1508824581122 vc_row-has-fill">
										<div class="wpb_column vc_column_container vc_col-sm-12">
											<div class="vc_column-inner ">
												<div class="wpb_wrapper">
													<h2 style="font-size: 26px;color: #ffffff;text-align: left" class="vc_custom_heading vc_custom_1509092891283">Common Diseases</h2>
													<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1508823233184"> 
														<div class="wpb_column vc_column_container vc_col-sm-3">
															<div class="vc_column-inner ">
																<div class="wpb_wrapper">
																	<div  class="vc_wp_custommenu wpb_content_element">
																		<div class="widget widget_nav_menu">
																			<div class="menu-mega-column-2-cardiology-container">
																				<ul id="menu-mega-column-2-cardiology-1" class="menu">
																					<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-960"><a href="service_dyspepsia.php">Dyspepsia</a></li>
																					<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-963"><a href="service_hepatitis_b.php">Hepatitis-B</a></li>
																					<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-962"><a href="service_hepatitis_c.php">Hepatitis-C</a></li>
																					<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-967"><a href="service_gastro_disease.php">Gastro-Esophageal-Reflux-Disease</a></li>
																					<!--<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-961"><a href="service_gastroenterology.php">Gastroenterology</a></li>-->
																					
																				</ul>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="wpb_column vc_column_container vc_col-sm-3">
															<div class="vc_column-inner ">
																<div class="wpb_wrapper">
																	<div  class="vc_wp_custommenu wpb_content_element">
																		<div class="widget widget_nav_menu">
																			<div class="menu-mega-column-3-gynecology-container">
																				<ul id="menu-mega-column-3-gynecology-1" class="menu">
																					<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-964"><a href="service_Chronic.php">Chronic-Constipation</a></li>
																					<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-965"><a href="service_ulcerative_colitis.php">Ulcerative-Colitis</a></li>
																					<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-966"><a href="service_irritable_bowel_syndrome.php">Irritable-Bowel-Syndrome</a></li>
																					<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-969"><a href="service_endoscopy.php">Endoscopy</a></li>
																					
																				</ul>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="wpb_column vc_column_container vc_col-sm-3">
															<div class="vc_column-inner vc_custom_1508823431780">
																<div class="wpb_wrapper">
																	<div  class="vc_wp_custommenu wpb_content_element">
																		<div class="widget widget_nav_menu">
																			<div class="menu-mega-column-4-neurology-container">
																				<ul id="menu-mega-column-4-neurology-1" class="menu">
																					<!--<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-968"><a href="service_neurology.php">Neurology</a></li>-->

																				</ul>
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
								</li>
							</ul>
						</li>
						<li class="'.$our_services.'"><a href="our_services.php">Services</a></li>						
						<li class="'.$appointment.'"><a href="appointment.php">Appointment</a></li>
						<li class="'.$blog.'"><a href="blog.php">Practices To Follow</a></li>
						<li class="'.$testimonials.'"><a href="testimonials.php">Testimonials</a></li>
						<li class="'.$gallary.'"><a href="gallary.php">Gallery</a></li>
						<li class="'.$contact.'"><a href="contact.php">Contact Us</a></li>';
						
			$homecls1='';
			$service1='';
			$about1='';
			$blog1='';
			$appointment1='';
			$testimonials1='';
			$gallary1='';
			$contact1='';
			$homecls11='';
			$service11='';
			$our_services1='';
			$homecls1 = 'menu-item menu-item-type-post_type menu-item-object-page menu-item-home page_item page-item-30 menu-item-736';
			if($full_name == 'index.php')
				$homecls1 .= ' current-menu-item active';
			$service1 ='menu-item menu-item-type-post_type menu-item-object-page menu-item-739';
			if($full_name == 'service.php')
				$service1 .= ' current-menu-item active';
			$about1 ='menu-item menu-item-type-post_type menu-item-object-page menu-item-730';
			if($full_name == 'about.php')
				$about1 .= ' current-menu-item active';
			$appointment1 ='menu-item menu-item-type-post_type menu-item-object-page menu-item-734';
			if($full_name == 'appointment.php')
				$appointment1 .= ' current-menu-item active';
			$blog1 ='menu-item menu-item-type-post_type menu-item-object-page menu-item-735';
			if($full_name == 'blog.php')
				$blog1 .= ' current-menu-item active';
			$testimonials1 ='menu-item menu-item-type-post_type menu-item-object-page menu-item-761';
			if($full_name == 'testimonials.php')
				$testimonials1 .= ' current-menu-item active';
			$gallary1 ='menu-item menu-item-type-post_type menu-item-object-page menu-item-732';
			if($full_name == 'gallary.php')
				$gallary1 .= ' current-menu-item active';
			$contact1 ='menu-item menu-item-type-post_type menu-item-object-page menu-item-741';
			if($full_name == 'contact.php')
				$contact1 .= ' current-menu-item active';
			$our_services1 ='menu-item menu-item-type-post_type menu-item-object-page menu-item-742';
			if($full_name == 'contact.php')
				$our_services1 .= ' current-menu-item active';
		$header .='<header id="header" class="absolute uk-visible@m">
						<div class="uk-container uk-container-default uk-position-relative uk-visible@s">
							<div class="vc_row wpb_row vc_row-fluid vc_custom_1551541901651 vc_row-o-content-middle vc_row-flex">
								<div class="wpb_column vc_column_container vc_col-sm-6">
									<div class="vc_column-inner ">
										<div class="wpb_wrapper">
											<div class="p3@s p0 ">
												<a href="index.php" class="custom-logo-link" rel="home"><img src="wp-content/uploads/sites/31/2017/06/logooo.png" alt="Medio Hospital" class="custom-logo" style="width: 60%;"></a>
											</div>
										</div>
									</div>
								</div>
								<div class="wpb_column vc_column_container vc_col-sm-6">
									<div class="vc_column-inner" id="test_section">
										<div class="wpb_wrapper">
											<div class="flex-container uk-flex     uk-flex-right uk-child-width-auto">
												<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1551767028403">
													<div class="wpb_column vc_column_container vc_col-sm-12">
														<div class="vc_column-inner ">
															<div class="wpb_wrapper">
																<h2 style="font-size: 16px;color: #ffffff;text-align: left" class="vc_custom_heading vc_custom_1552802309911 header-section" >
																	<a href="mailto:harshudawat@gmail.com" style="padding:6px 14px 5px 0px;">harshudawat@gmail.com</a>
																</h2>
															</div>
														</div>
													</div>
												</div>
												<!---<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1551766958397 vc_row-has-fill">
													<div class="wpb_column vc_column_container vc_col-sm-12">
														<div class="vc_column-inner ">
															<div class="wpb_wrapper">
																<h2 style="font-size: 16px;color: #ffffff;text-align: center;margin-left: -29%;" class="vc_custom_heading vc_custom_1552802384924" >
																	<a href="tel:0141-4156703" style="padding:6px 14px 5px 0px;">0141-4156703</a>
																</h2>
															</div>
														</div>
													</div>
												</div>--->
												
												<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1551766958397 vc_row-has-fill">
													<div class="wpb_column vc_column_container vc_col-sm-12">
														<div class="vc_column-inner ">
															<div class="wpb_wrapper" style="margin-left: -48px;margin-right: 46px;margin-top: 7px;">
															<style>
																
																/* ul li{
																	position: relative;
																	line-height: 19px;
																	text-align: right;
																	text-decoration: none;
																} */
																/*ul li a{
																	display: block;
																	padding: 5px 3px 10px 5px;
																	color: #d4cac2;
																	text-align: justify;
																	text-decoration: none;
																}*/
																
																ul li ul.dropdown{
																	min-width: 125px; /* Set width of the dropdown */
																	display: none;
																	position: absolute;
																	z-index: 999;
																	left: 0;
																}
																ul li:hover ul.dropdown{
																	display: block; /* Display the dropdown */
																}
																ul li ul.dropdown li{
																	display: block;
																}ul.dropdown {
																	margin-top: -8px;
																}
															</style>
																<ul class="ul_test" style="margin-top: -8px;margin-bottom: -54px;margin-left: -32px;">
																	  <li style="display: inline-block;position: relative;line-height: 19px;text-align: inherit;text-decoration: none;">
																		<a href="index.php" class="custom-logo-link" rel="home" style="padding: 0px 3px 10px 5px;display: block;color: #d4cac2;text-align: justify;text-decoration: none;">
																			<img class="userImg" src="https://drharshudawat.com/images/avtar_profile.jpg" style="width: 25px;height: 25px;border-radius: 324px;float: right;margin-bottom: -18%!important;">
																		</a> 
																		<p class="pclass" style="padding-left:36px;margin-right: -28px;font-size: 15px;color: snow;font-family: Heebo,sans-serif;">'.$txt_fullname.'</p> 
																		 <ul class="dropdown" style="padding-left:0px; background:none;float: right;margin-right: 60px;margin-bottom: -39px;width: 146px;height: 70px;overflow: hidden;margin-left:5px!important;background-color: #423b82;border: 1px solid #423b82;">
																			  <li style="color: #fff;display: inline-block;text-align: inherit;position: relative;line-height: 19px; width:100%;font-size: 14px;"> 
														 						'.$admin_link.'
								 												<a class="user-dropdown" href="logout.php" style="padding: 6px 31px 6px 15px;display: block; color:whitesmoke; text-align: justify;text-decoration: none;">Log out</a>
																			  </li>
																		  </ul>
																	  </li>
															   </ul>
															</div>
														</div>
													</div>
												</div>
												<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_155176695839k vc_row-has-fill">
													<div class="wpb_column vc_column_container vc_col-sm-12">
														<div class="vc_column-inner ">
															<div class="wpb_wrapper" style="">
																<div class="text-center">
																  <!--<a href="login.php" class="btn btn-default btn-rounded mb-4" style="background-color:#63599e;border:none;color:#ffff;">LOG IN</a>-->
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
							<div class="vc_row wpb_row vc_row-fluid vc_custom_1554171066700">
								<div class="wpb_column vc_column_container vc_col-sm-12">
									<div class="vc_column-inner ">
										<div class="wpb_wrapper">
											<ul id="menu-main-menu-1" class="themeton-menu uk-flex themeton-menu-normal  uk-flex-between">
												'.$header1.'
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</header>
					
					<div id="offcanvas-nav">
						<div class="uk-offcanvas-bar">
							<a href="index.php" class="custom-logo-link" rel="home">
							<img src="wp-content/uploads/sites/31/2017/06/logooo.png" alt="Medio Hospital"  class="custom-logo"></a>           
							<ul id="menu-footer-navigation" class="uk-nav-default uk-nav-parent-icon uk-nav uk-animation-slide-left primary-menu-collapsible">
								<li id="menu-item-736" class="'.$homecls1.'"><a href="index.php">Home</a></li>
								
								<li id="menu-item-730" class="'.$about1.'"><a href="about.php">About Us</a></li>
								<li id="menu-item-739" class="'.$service1.'"><a href="service.php">Common Diseases</a>
									<ul class="mega-menu pl0">
										<li>
											<div class="vc_row wpb_row vc_row-fluid vc_custom_1508824581122 vc_row-has-fill">
												<div class="wpb_column vc_column_container vc_col-sm-12">
													<div class="vc_column-inner ">
														<div class="wpb_wrapper">
															<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1508823233184">
																<div class="wpb_column vc_column_container vc_col-sm-3">
																	<div class="vc_column-inner ">
																		<div class="wpb_wrapper">
																			<div  class="vc_wp_custommenu wpb_content_element">
																				<div class="widget widget_nav_menu">
																					<div class="menu-mega-column-2-cardiology-container">
																						<ul id="menu-mega-column-2-cardiology-1" class="menu">
																							<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-960">
																								<a href="service.php" style="color: #dee8ec;">Common Diseases</a>
																							</li>
																							<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-960">
																								<a href="service_dyspepsia.php" style="color: #dee8ec;">Dyspepsia</a>
																							</li>
																							<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-961">
																								<a href="service_hepatitis_b.php" style="color: #dee8ec;">Hepatitis B</a>
																							</li>
																							<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-962">
																								<a href="service_hepatitis_c.php" style="color: #dee8ec;">Hepatitis C</a>
																							</li>
																							<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-963">
																								<a href="service_gastro_disease.php" style="color: #dee8ec;">Gastroesophageal Reflux Disease (GERD)</a>
																							</li>
																							<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-964">
																								<a href="service_Chronic.php" style="color: #dee8ec;">Chronic Constipation</a>
																							</li>
																							<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-965">
																								<a href="service_ulcerative_colitis.php" style="color: #dee8ec;">Ulcerative Colitis</a>
																							</li>
																							<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-966">
																								<a href="service_irritable_bowel_syndrome.php" style="color: #dee8ec;">Irritable Bowel Syndrome (IBS)</a>
																							</li>
																							<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-967">
																								<a href="service_endoscopy.php" style="color: #dee8ec;">Endoscopy</a>
																							</li>
																						</ul>
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
										</li>
									</ul>
								</li>
								<li id="menu-item-742" class="'.$our_services1.'"><a href="our_services.php">Services</a></li>
								<li id="menu-item-734" class="'.$appointment1.'"><a href="appointment.php">Appointment</a></li>
								<li id="menu-item-735" class="'.$blog1.'"><a href="blog.php">Practices To Follow</a></li>
								<li id="menu-item-761" class="'.$testimonials1.'"><a href="testimonials.php">Testimonials</a></li>
								<li id="menu-item-732" class="'.$gallary1.'"><a href="gallary.php">Gallery</a></li>
								<li id="menu-item-741" class="'.$contact1.'"><a href="contact.php">Contact Us</a></li>
								
								<div class="text-center" style="float: left;
								margin: 10px 17px 0px 0px;">
								  <a href="register.php" class="btn btn-default btn-rounded mb-4" style="background-color:#63599e;border:none;color:#ffff;    padding: 6px 13px;">REGISTER</a>
								</div>
								<div class="text-center" style="margin: 10px 17px 0px 0px;">
								  <a href="login.php" class="btn btn-default btn-rounded mb-4" style="padding: 6px 13px;background-color:#63599e;border:none;color:#ffff;">LOG IN</a>
								</div>
								
								<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1551767028403">
									<div class="wpb_column vc_column_container vc_col-sm-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper" style="margin-left: 14px!important;">
												<h2 style="font-size: 12px;color: #ffffff;text-align: left" class="vc_custom_heading_header-sectio vc_custom_1551534769676" >Email</h2>
												<h2 style="font-size: 16px;color: #ffffff;text-align: left" class="vc_custom_heading_header-sectio vc_custom_1552802309911" >
													<a href="mailto:harshudawat@gmail.com">harshudawat@gmail.com</a>
												</h2>
											</div>
										</div>
									</div>
								</div>
								<!---<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1551766958397 vc_row-has-fill" style="padding:0px;">
									<div class="wpb_column vc_column_container vc_col-sm-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper" style="margin-left: 14px!important;">
												<h2 style="font-size: 12px;color: #ffffff;text-align: left;" class="vc_custom_heading_header-sectio vc_custom_1551535277062" >Help me</h2>
												<h2 style="font-size: 16px;color: #ffffff;text-align: left;" class="vc_custom_heading_header-sectio vc_custom_1552802384924" >
													<a href="tel:0141-4156703">0141-4156703</a>
												</h2>
											</div>
										</div>
									</div>
								</div>--->
								<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1551766958397 vc_row-has-fill">
									<div class="wpb_column vc_column_container vc_col-sm-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper" style="margin-left: 14px!important;margin-right: 46px!important;margin-top: 15px!important;">
												<style>
												
													/* ul li{
														position: relative;
														line-height: 19px;
														text-align: right;
														text-decoration: none;
													} */
													/*ul li a{
														display: block;
														padding: 5px 3px 10px 5px;
														color: #d4cac2;
														text-align: justify;
														text-decoration: none;
													}*/
													
													ul li ul.dropdown{
														min-width: 125px; /* Set width of the dropdown */
														display: none;
														position: absolute;
														z-index: 999;
														left: 0;
													}
													ul li:hover ul.dropdown{
														display: block; /* Display the dropdown */
													}
													ul li ul.dropdown li{
														display: block;
													}
												</style>
												<ul class="ul_test" style="margin-top: -11px;margin-bottom: -54px;">
													<li style="display: inline-block;position: relative;line-height: 19px;text-align: inherit;text-decoration: none;">
														<a href="index.php" class="custom-logo-link" rel="home" style="padding: 0px 3px 10px 5px;display: block;color: #d4cac2;text-align: justify;text-decoration: none;">
															<img class="userImg" src="https://drharshudawat.com/images/avtar_profile.jpg" style="width:25px;height: 25px;border-radius: 324px;margin-left: -1px;margin-bottom: 23%">
														</a>
														<p style="margin-top: -57px!important;padding-left:36px;margin-right: -28px;font-size: 15px;color: snow;font-family: Heebo,sans-serif;">'.$txt_fullname.'</p>
														<ul class="dropdown" style="background:none;float: right;margin-right: 60px;margin-bottom: -39px;width: 160px;height: 95px;overflow: hidden;margin-top: 0px;background-color: #423b82;border: 1px solid #423b82;">
														  <li style="color: #fff;display: inline-block;text-align: inherit;position: relative;line-height: 19px;"> 
															'.$admin_link.'
															<a href="logout.php" style="padding: 5px 3px -1px 5px;margin-left: 5px;display: block;color:whitesmoke;text-align: justify;text-decoration: none;">Log out</a>
														  </li>
														</ul>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</ul> 
						</div>
					</div>';
				echo $header;
		}else{
			$full_name = basename($_SERVER['SCRIPT_NAME']);
			$header1='';
			$header='';
			$header_1='';
			$header_='';
			$homecls='';
			$service='';
			$about='';
			$blog='';
			$appointment='';
			$testimonials='';
			$gallary='';
			$contact='';
			$our_services='';
			$homecls = 'menu-item menu-item-type-post_type menu-item-object-page menu-item-home page_item page-item-30 menu-item-759';
			if($full_name == 'index.php')
				$homecls .= ' current-menu-item active';
			$service ='menu-item menu-item-type-post_type menu-item-object-service menu-item-776';
			if($full_name == 'service.php')
				$service .= ' current-menu-item active';
			$about ='menu-item menu-item-type-post_type menu-item-object-page menu-item-743';
			if($full_name == 'about.php')
				$about .= ' current-menu-item active';
			$appointment ='menu-item menu-item-type-post_type menu-item-object-page menu-item-760';
			if($full_name == 'appointment.php')
				$appointment .= ' current-menu-item active';
			$blog ='menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-744';
			if($full_name == 'blog.php')
				$blog .= ' current-menu-item active';
			$testimonials ='menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-729';
			if($full_name == 'testimonials.php')
				$testimonials .= ' current-menu-item active';
			$gallary ='menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-755';
			if($full_name == 'gallary.php')
				$gallary .= ' current-menu-item active';
			$contact ='menu-item menu-item-type-post_type menu-item-object-page menu-item-754';
			if($full_name == 'contact.php')
			$contact .= ' current-menu-item active';
		
			$our_services ='menu-item menu-item-type-post_type menu-item-object-page menu-item-756';
			if($full_name == 'our_services.php')
			$our_services .= ' current-menu-item active';
			$header1 .='<li class="'.$homecls.'"><a href="index.php">Home</a></li>
						<li class="'.$about.'"><a href="about.php">About Us</a></li>
<li class="'.$service.'"><a href="service.php">Common Diseases</a>
							<ul class="mega-menu pl0">
								<li>
									<div class="vc_row wpb_row vc_row-fluid vc_custom_1508824581122 vc_row-has-fill">
										<div class="wpb_column vc_column_container vc_col-sm-12">
											<div class="vc_column-inner ">
												<div class="wpb_wrapper">
													<h2 style="font-size: 26px;color: #ffffff;text-align: left" class="vc_custom_heading vc_custom_1509092891283">Common Diseases</h2>
													<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1508823233184">
														
														<div class="wpb_column vc_column_container vc_col-sm-3">
															<div class="vc_column-inner ">
																<div class="wpb_wrapper">
																	<div  class="vc_wp_custommenu wpb_content_element">
																		<div class="widget widget_nav_menu">
																			<div class="menu-mega-column-2-cardiology-container">
																				<ul id="menu-mega-column-2-cardiology-1" class="menu">
																					<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-960"><a href="service_dyspepsia.php">Dyspepsia</a></li>
																					<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-963"><a href="service_hepatitis_b.php">Hepatitis-B</a></li>
																					<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-962"><a href="service_hepatitis_c.php">Hepatitis-C</a></li>
																					<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-967"><a href="service_gastro_disease.php">Gastro-Esophageal-Reflux-Disease</a></li>
																					<!--<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-961"><a href="service_gastroenterology.php">Gastroenterology</a></li>-->
																					
																				</ul>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="wpb_column vc_column_container vc_col-sm-3">
															<div class="vc_column-inner ">
																<div class="wpb_wrapper">
																	<div  class="vc_wp_custommenu wpb_content_element">
																		<div class="widget widget_nav_menu">
																			<div class="menu-mega-column-3-gynecology-container">
																				<ul id="menu-mega-column-3-gynecology-1" class="menu">
																					<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-964"><a href="service_Chronic.php">Chronic-Constipation</a></li>
																					<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-965"><a href="service_ulcerative_colitis.php">Ulcerative-Colitis</a></li>
																					<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-966"><a href="service_irritable_bowel_syndrome.php">Irritable-Bowel-Syndrome</a></li>
																					<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-969"><a href="service_endoscopy.php">Endoscopy</a></li>
																					
																				</ul>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="wpb_column vc_column_container vc_col-sm-3">
															<div class="vc_column-inner vc_custom_1508823431780">
																<div class="wpb_wrapper">
																	<div  class="vc_wp_custommenu wpb_content_element">
																		<div class="widget widget_nav_menu">
																			<div class="menu-mega-column-4-neurology-container">
																				<ul id="menu-mega-column-4-neurology-1" class="menu">
																					<!--<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-968"><a href="service_neurology.php">Neurology</a></li>-->

																				</ul>
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
								</li>
							</ul>
						</li>						
						<li class="'.$our_services.'"><a href="our_services.php">Services</a></li> 
						<li class="'.$appointment.'"><a href="appointment.php">Appointment</a></li>
						<li class="'.$blog.'"><a href="blog.php">Practices To Follow</a></li>
						<li class="'.$testimonials.'"><a href="testimonials.php">Testimonials</a></li>
						<li class="'.$gallary.'"><a href="gallary.php">Gallery</a></li>
						<li class="'.$contact.'"><a href="contact.php">Contact Us</a></li>';
		$header .='<header id="header" class="absolute uk-visible@m">
						<div class="uk-container uk-container-default uk-position-relative uk-visible@s">
							<div class="vc_row wpb_row vc_row-fluid vc_custom_1551541901651 vc_row-o-content-middle vc_row-flex">
								<div class="wpb_column vc_column_container vc_col-sm-6">
									<div class="vc_column-inner ">
										<div class="wpb_wrapper">
											<div class="p3@s p0 ">
												<a href="index.php" class="custom-logo-link" rel="home"><img src="wp-content/uploads/sites/31/2017/06/logooo.png" alt="Medio Hospital" class="custom-logo" style="width: 60%;"></a>
											</div>
										</div>
									</div>
								</div>
								<div class="wpb_column vc_column_container vc_col-sm-6">
									<div class="vc_column-inner" id="test_section">
										<div class="wpb_wrapper">
											<div class="flex-container uk-flex     uk-flex-right uk-child-width-auto">
												<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1551767028403">
													<div class="wpb_column vc_column_container vc_col-sm-12">
														<div class="vc_column-inner ">
															<div class="wpb_wrapper">
																<h2 style="font-size: 16px;color: #ffffff;text-align: left" class="vc_custom_heading vc_custom_1552802309911 header-section" >
																	<a href="mailto:harshudawat@gmail.com">harshudawat@gmail.com</a>
																</h2>
															</div>
														</div>
													</div>
												</div>
												<!---<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1551766958397 vc_row-has-fill">
													<div class="wpb_column vc_column_container vc_col-sm-12">
														<div class="vc_column-inner ">
															<div class="wpb_wrapper">
																<h2 style="font-size: 16px;color: #ffffff;text-align: center;margin-left: -29%;" class="vc_custom_heading vc_custom_1552802384924" >
																	<a href="tel:0141-4156703">0141-4156703</a>
																</h2>
															</div>
														</div>
													</div>
												</div>--->
												
												<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1551766958397 vc_row-has-fill">
													<div class="wpb_column vc_column_container vc_col-sm-12">
														<style>
														.vc_column_container>.vc_column-inner {
														box-sizing: border-box;
														padding-left: 5px;
														padding-right: 29px;
														width: 100%;
														}
														</style>
														<div class="vc_column-inner ">
															<div class="wpb_wrapper">
																<div class="text-center" id="register_top_section">
																  <a href="register.php" class="btn btn-default btn-rounded mb-4" style="background-color:#63599e;border:none;color:#ffff;">REGISTER</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_155176695839k vc_row-has-fill">
													<div class="wpb_column vc_column_container vc_col-sm-12">
														<div class="vc_column-inner ">
															<div class="wpb_wrapper">
																<div class="text-center">
																  <a href="login.php" class="btn btn-default btn-rounded mb-4" style="background-color:#63599e;border:none;color:#ffff;">LOG IN</a>
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
							<div class="vc_row wpb_row vc_row-fluid vc_custom_1554171066700">
								<div class="wpb_column vc_column_container vc_col-sm-12">
									<div class="vc_column-inner ">
										<div class="wpb_wrapper">
											<ul id="menu-main-menu-1" class="themeton-menu uk-flex themeton-menu-normal  uk-flex-between">
												'.$header1.'
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</header>
					<div id="offcanvas-nav">
						<div class="uk-offcanvas-bar">
							<a href="index.php" class="custom-logo-link" rel="home">
							<img src="wp-content/uploads/sites/31/2017/06/logooo.png" alt="Medio Hospital"  class="custom-logo"></a>           
							<ul id="menu-footer-navigation" class="uk-nav-default uk-nav-parent-icon uk-nav uk-animation-slide-left primary-menu-collapsible">
								<li id="menu-item-736" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-30 current_page_item uk-active menu-item-736"><a href="index.php">Home</a></li>
								
								<li id="menu-item-739" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-739"><a href="about.php">About Us</a></li>
								<li id="menu-item-739" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-739"><a href="service.php">Disease</a>
								<ul class="mega-menu pl0">
										<li>
											<div class="vc_row wpb_row vc_row-fluid vc_custom_1508824581122 vc_row-has-fill">
												<div class="wpb_column vc_column_container vc_col-sm-12">
													<div class="vc_column-inner ">
														<div class="wpb_wrapper">
															
															<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1508823233184">
																<div class="wpb_column vc_column_container vc_col-sm-3">
																	<div class="vc_column-inner ">
																		<div class="wpb_wrapper">
																			<div  class="vc_wp_custommenu wpb_content_element">
																				<div class="widget widget_nav_menu">
																					<div class="menu-mega-column-2-cardiology-container">
																						<ul id="menu-mega-column-2-cardiology-1" class="menu">
																						<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-960"><a href="service.php">Disease</a></li>
																							<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-960"><a href="service_dyspepsia.php">Dyspepsia</a></li>
																							<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-961"><a href="service_hepatitis_b.php">Hepatitis B</a></li>
																							<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-962"><a href="service_hepatitis_c.php">Hepatitis C</a></li>
																							<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-963"><a href="service_gastro_disease.php">Gastroesophageal Reflux Disease (GERD)</a></li>
																							<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-964"><a href="service_Chronic.php">Chronic Constipation</a></li>
																							<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-965"><a href="service_ulcerative_colitis.php">Ulcerative Colitis</a></li>
																							<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-966"><a href="service_irritable_bowel_syndrome.php">Irritable Bowel Syndrome (IBS)</a></li>
																							<li class="menu-item menu-item-type-post_type menu-item-object-service menu-item-967"><a href="service_endoscopy.php">Endoscopy</a></li>
																						</ul>
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
										</li>
									</ul>
								</li>
								<li id="menu-item-741" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-756"><a href="our_services.php">Services</a></li>
								<li id="menu-item-734" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-734"><a href="appointment.php">Appointment</a></li>
								<li id="menu-item-734" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-734"><a href="blog.php">Practices To Follow</a></li>
								<li id="menu-item-761" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-761"><a href="testimonials.php">Testimonials</a></li>
								<li id="menu-item-734" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-734"><a href="gallary.php">Gallery</a></li>
								<li id="menu-item-741" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-741"><a href="contact.php">Contact Us</a></li>
								<div class="text-center" style="float: left;
								margin: 10px 17px 0px 0px;">
								  <a href="register.php" class="btn btn-default btn-rounded mb-4" style="background-color:#63599e;border:none;color:#ffff;">REGISTER</a>
								</div>
								<div class="text-center" style="margin: 10px 17px 0px 0px;">
								  <a href="login.php" class="btn btn-default btn-rounded mb-4" style="background-color:#63599e;border:none;color:#ffff;">LOG IN</a>
								</div>
								
								<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1551767028403">
									<div class="wpb_column vc_column_container vc_col-sm-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<h2 style="font-size: 12px;color: #ffffff;text-align: left" class="vc_custom_heading_header-sectio vc_custom_1551534769676" >Email</h2>
												<h2 style="font-size: 16px;color: #ffffff;text-align: left" class="vc_custom_heading_header-sectio vc_custom_1552802309911" >
													<a href="mailto:harshudawat@gmail.com">harshudawat@gmail.com</a>
												</h2>
											</div>
										</div>
									</div>
								</div>
								<!---<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1551766958397 vc_row-has-fill" style="padding:0px;">
									<div class="wpb_column vc_column_container vc_col-sm-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<h2 style="font-size: 12px;color: #ffffff;text-align: left;" class="vc_custom_heading_header-sectio vc_custom_1551535277062" >Help me</h2>
												<h2 style="font-size: 16px;color: #ffffff;text-align: left;" class="vc_custom_heading_header-sectio vc_custom_1552802384924" >
													<a href="tel:0141-4156703">0141-4156703</a>
												</h2>
											</div>
										</div>
									</div>
								</div>--->
							</ul> 
						</div>
					</div>';
				echo $header;
		}
		
	?>
				
