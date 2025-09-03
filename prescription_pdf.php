<?php 
ini_set('display_errors',1);
session_start();
if (!isset($_SESSION['u_id'])) {
	header("Location:index.php");
}
include 'config/DB.php';
$db = new DB();
$connect = $db->connect();
date_default_timezone_set('Asia/Kolkata'); 
require_once 'dompdf/autoload.inc.php';
/* $filename = "Prescription.pdf";*/
use Dompdf\Dompdf;
$dompdf = new Dompdf(); 
$table_data1 ='';
$symp1 ='';
$symp  ='';
$txt_phone='';
$txt_age ='';
$tbody ='';
$test_body='';
$txt_patient_name ='';
$txt_start_date ='';
$txt_test='';
$txt_medicine_name ='';
$txt_medicine_duration='';	
$txt_medicine_duration_day='';
$txt_problm_description='';
$test_1='';
$str_length='';
$insertedNo='';
$create_inv_no='';	

if(isset($_REQUEST['uid'])){
	$id    = $_REQUEST['uid'];
	$str_length = strlen($id);
	if ($str_length == 1) {
		$insertedNo = '0000' . $id;
	} else if ($str_length == 2) {
		$insertedNo = '000' . $id;
	} else if ($str_length == 3) {
		$insertedNo = '00' . $id;
	} else if ($str_length == 4) {
		$insertedNo = '0' . $id;
	}
	$create_inv_no = $insertedNo;
	$filename ="Prescription-" . $create_inv_no . ".pdf";
	
	
	$tbl_name = 'tab_medicine_prescription';
	$where = 'id='.$id;
	$col = array();
	$query_fetch = $db->sql_select($tbl_name, $col, $where, $order_by=null);
	if(count($query_fetch) > 0 ){
		$k=1;$c=1;$s=1;
		for($i=0; $i < count($query_fetch); $i++){
			$book_id    = $query_fetch[$i]['book_id'];
			$txt_random_no    = $query_fetch[$i]['txt_random_no'];
			//$p_id           = $query_fetch[$i]['id'];
			$txt_start_date   = $query_fetch[$i]['txt_start_date'];
			$date             = date('d-m-Y',strtotime($txt_start_date));
			$txt_patient_name = ucwords($query_fetch[$i]['txt_patient_name']);
			$txt_phone        = $query_fetch[$i]['txt_phone'];
			$txt_age          = $query_fetch[$i]['txt_age'];
			$m_type          = $query_fetch[$i]['m_type'];
			$medicine_comment= $query_fetch[$i]['medicine_comment'];
			$test_comment    = $query_fetch[$i]['test_comment'];
			$m_type          = $query_fetch[$i]['m_type'];
			$ref_by          = ucwords($query_fetch[$i]['ref_by']);
			$history          = ucfirst($query_fetch[$i]['history']);
			
			$txt_medicine_duration        = $query_fetch[$i]['txt_medicine_duration'];
			$txt_medicine_duration_day    = $query_fetch[$i]['txt_medicine_duration_day'];
			$symp       = ucwords($query_fetch[$i]['txt_problm_description']);
			$txt_medicine_name            = ucwords($query_fetch[$i]['txt_medicine_name']);
			$days                         = explode(",",$txt_medicine_duration_day);
			$medicine = explode(",",$txt_medicine_name);
			foreach($medicine as $key => $name) {
				$dur_str = '';
				$medicine_comments   = explode(",",$medicine_comment);	
				$duration            = explode(",",$txt_medicine_duration);
				$m_types             = explode(",",$m_type);	
				$medicine_comments   =  $medicine_comments[$key];
				$m_types             =  $m_types[$key];
				$day =  $days[$key];
				$duration =  $duration[$key];
				if(!empty($name)){
					$tbody .='<tr>
						<td style="border:1px solid #ccc; font-size:12px; padding:8px;">' . $k . ' </td>
						<td style="border:1px solid #ccc; font-size:12px; padding:8px;">' .$m_types. '</td>
						<td style="border:1px solid #ccc; font-size:12px; padding:8px;">' . $name . ' </td>
						<td style="border:1px solid #ccc; font-size:12px; padding:8px;">' . $duration . '</td>
						<td style="border:1px solid #ccc; font-size:12px; padding:8px;">' . $day . '</td>
						<td style="border:1px solid #ccc; font-size:12px; padding:8px;">' . $medicine_comments . '</td>
					</tr>';$k++;
				}else{
					$tbody .='<tr><td style="border:1px solid #ccc; font-size:12px; padding:8px;"></td>
					<td style="border:1px solid #ccc; font-size:12px; padding:8px;"></td>
					<td style="border:1px solid #ccc; font-size:12px; padding:8px;"></td>
					<td style="border:1px solid #ccc; font-size:12px; padding:8px;"></td>
					<td style="border:1px solid #ccc; font-size:12px; padding:8px;"></td>
					<td style="border:1px solid #ccc; font-size:12px; padding:8px;"></td></tr>';$k++;
				}				
				
			}
					$adv='';	
				/* $symp .='<tr>
							<td style="font-size:12px;">'.ucfirst($txt_problm_description).'</td>
						</tr> ';
				$ref_by .='<tr>
							<td style="font-size:12px;">'.ucwords($ref).'</td>
						</tr> '; */
				$advice  = $query_fetch[$i]['advice'];
				$adv .='<tr>
							<td style="border:1px solid #ccc; font-size:12px; padding:8px;">' .$advice. '</td>
						</tr> ';	
				/* $adv1     = explode(",",$advice); 
				foreach($adv1 as $a => $adv_desc) {
					$adv2 =  $adv1[$a];
					if(!empty($adv2)){
						$adv .='<tr>
								<td style="border:1px solid #ccc; font-size:12px; padding:8px;">' . $adv2 . '</td>
							</tr> ';		
							$c++; 
					}else{
						$adv='<td style="border:1px solid #ccc; font-size:12px; padding:8px;"></td>';
					}
				} */
				$txt_test         = $query_fetch[$i]['txt_test'];
				$test = explode(",",$txt_test); 
				$test_comment1   = explode(",",$test_comment);
				foreach($test as $k => $name1) {
					$test_comment2 =  $test_comment1[$k];
					if(!empty($test_comment2)){
						$test_comment2 =  $test_comment1[$k];
					}else{
						$test_comment2='';
					}
					if(!empty($name1)){
						$test_body .='<tr>
								<td style="border:1px solid #ccc; font-size:12px; padding:8px;">' . $c . '</td>
								<td style="border:1px solid #ccc; font-size:12px; padding:8px;">' . $name1 . ' </td>
								<td style="border:1px solid #ccc; font-size:12px; padding:8px;">' . ucfirst($test_comment2) . '</td>
							</tr> ';		
							$c++; 
					}else{
						$test_body='<td style="border:1px solid #ccc; font-size:12px; padding:8px;"></td><td style="border:1px solid #ccc; font-size:12px; padding:8px;"></td><td style="border:1px solid #ccc; font-size:12px; padding:8px;"></td>';
					}
					
					
					
				}
		}
	
		$table_data1 .='<!DOCTYPE html>
						<html lang="en">
							<head>
							  <title>Admin</title> 
							 
							</head>
							<body style="font-family: arial, sans-serif;">
							 <style>							  
							@page { margin: 180px 50px;}
							#header { position: fixed; left: 0px; top: -110px; right: 0px; height: 150px;    }

							#footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 150px;text-align: center; }
							#footer .page:after { content: counter(page, upper-roman); }
							
								</style>
							<div class="border-section" style="">
							<div id="header" class="header-section" style="margin-bottom:5px;background-color:#63599e;height:100px;">
								<div class="colum" style="position:absolute; top:0px; left:0px; float:left; padding:0px 20px; width:33%;">
									<p style="line-height: 22px; font-size: 13px; color:#fff;">
									  <b style="font-size: 13px;">Dr. Harsh Udawat</b><br>
									  <p style="font-size:12px; color:#fff;">DM - Gastroenterology<br>
									  MBBS, MD - General Medicine</p>
									</p>
								</div>
 								<div class="colum" style="padding:10px; text-align:center; margin-left:150px; width:30%;">
									<img src="../images/pdf-1.png" style="width: 50%;" alt="logos-images">
								</div>
								<div class="colum" style="position:absolute; top:0px;  float:right; right:0px; width:33%; padding:0px 0px;">
									<p style="line-height: 22px; font-size: 13px; color:#fff;">
									  <b style="font-size: 13px;">Udawat Gastroenterology Clinic</b><br>
									  <p style="font-size:12px; color:#fff;">A-111, Shri Ram Marg, Shyam Nagar, Jaipur</p>
									</p>
								</div> 
								<!--<hr style="border: 0;border-top: 1px solid #eee;border-bottom: 0;">--->
							</div>
							
							
							<div id="content" style="margin-top:20px;">
								<div class="top-section" style="width: 700px;margin-top:10px;">
									<div class="container-fluid" >
										<!--<div class="border-section" style="border: 1px solid #eee;">
											<div class="border-sections" style="padding: 20px;">-->
												<div class="contant-section">													
													<p style="margin-bottom: -5%; font-size:12px;">Prescription ID :    # ' . $txt_random_no . '</p>
													<p style="margin-bottom: -5%; font-size:12px;"> Date : '.$date.'</p>
													<div class="col-xs-6" style="width: 100%; float:left; position: relative;">
														<div class="panel panel-default" style="border:1px solid #ccc;margin-left:0px;">
															<div class="panel-heading" style="color: #555555; background-color: #63599e; border-color: #dddddd; padding:6px;">
																<b style="font-size:12px; color:#fff;">Patient Basic Information</b>
															</div>
															<div class="panel-body" style="padding: 10px 10px 5px 12px;">
																<table class="" style="margin:0px 10px 0px 0px;border:border-collapse;">
																	<tbody style="padding-left:20px;">
																		<tr>
																			<th style="font-weight:200;font-size:12px;">Date</th>
																			<td style="font-weight:200;font-size:12px;">&nbsp;&nbsp;&nbsp;:</td>
																			<td style="font-weight:normal;float:right;  font-size:14px;color:#5c5a55;padding-left:70px;padding-right:100px; font-size:12px;border-right:1px solid #ccc;"> '.$date.'</td>
																			
																			<th style="font-weight:200;font-size:12px;margin-left:100px;"></th>
																			<th style="font-weight:200;font-size:12px;margin-left:100px;"></th>
																			<th style="font-weight:200;font-size:12px;margin-left:100px;"></th>
																			<th style="font-weight:200;font-size:12px;margin-left:100px;"></th>
																			<th style="font-weight:200;font-size:12px;margin-left:100px;"></th>
																			<th style="font-weight:200;font-size:12px;margin-left:100px;"></th>
																			<th style="font-weight:200;font-size:12px;margin-left:100px;"></th>
																			<th style="font-weight:200;font-size:12px;margin-left:100px;"></th>
																			
																			<th style="font-weight:200;font-size:12px;margin-left:70px;">Patient Name</th>
																			<td style="font-weight:200;font-size:12px;">&nbsp;&nbsp;&nbsp;:</td>
																			<td style="font-weight:normal;float:right; font-size:14px;color:#5c5a55;padding-left:70px; font-size:12px;"> ' . $txt_patient_name . '</td>
																		</tr>
																		<tr>
																			<th style="font-weight:200;font-size:12px;">Patient ID</th>
																			<td style="font-weight:200;font-size:12px;">&nbsp;&nbsp;&nbsp;:</td>
																			<td style="font-weight:normal; float:right;font-size:14px;color:#5c5a55;padding-left:70px;font-size:12px;border-right:1px solid #ccc;"> # ' . $book_id . '</td>
																			
																			<th style="font-weight:200;font-size:12px;margin-left:100px;"></th>
																			<th style="font-weight:200;font-size:12px;margin-left:100px;"></th>
																			<th style="font-weight:200;font-size:12px;margin-left:100px;"></th>
																			<th style="font-weight:200;font-size:12px;margin-left:100px;"></th>
																			<th style="font-weight:200;font-size:12px;margin-left:100px;"></th>
																			<th style="font-weight:200;font-size:12px;margin-left:100px;"></th>
																			<th style="font-weight:200;font-size:12px;margin-left:100px;"></th>
																			<th style="font-weight:200;font-size:12px;margin-left:100px;"></th>
																			
																			<th style="font-weight:200;font-size:12px;margin-left:50px;">Phone</th>
																			<td style="font-weight:200;font-size:12px;">&nbsp;&nbsp;&nbsp;:</td>
																			<td style="font-weight:normal; float:right;font-size:14px;color:#5c5a55;padding-left:70px;font-size:12px;"> '.$txt_phone.'</td>
																		</tr>
																		<tr>
																			<th style="font-weight:200;font-size:12px;">Prescription ID</th>
																			<td style="font-weight:200;font-size:12px;">&nbsp;&nbsp;&nbsp;:</td>
																			<td style="font-weight:normal; float:right;font-size:14px;color:#5c5a55;padding-left:70px;font-size:12px;border-right:1px solid #ccc;"> # ' . $txt_random_no . '</td>
																			
																			<th style="font-weight:200;font-size:12px;margin-left:100px;"></th>
																			<th style="font-weight:200;font-size:12px;margin-left:100px;"></th>
																			<th style="font-weight:200;font-size:12px;margin-left:100px;"></th>
																			<th style="font-weight:200;font-size:12px;margin-left:100px;"></th>
																			<th style="font-weight:200;font-size:12px;margin-left:100px;"></th>
																			<th style="font-weight:200;font-size:12px;margin-left:100px;"></th>
																			<th style="font-weight:200;font-size:12px;margin-left:100px;"></th>
																			<th style="font-weight:200;font-size:12px;margin-left:100px;"></th>
																			
																			<th style="font-weight:200;font-size:12px;margin-left:50px;">Age</th>
																			<th style="font-weight:200;font-size:12px;">&nbsp;&nbsp;&nbsp;:</th>
																			<td style="font-weight:normal; float:right;font-size:14px;color:#5c5a55;padding-left:70px;font-size:12px;"> '.$txt_age.'</td>
																		</tr>
																		
																		
																	</tbody>
																</table>
															</div> 
														</div>
													</div>
													<br>
													<!--<h3 style="color:#317eac;margin:0px;font-size:12px;">Refrence By :</h3><br>
													<table class="table table-bordered input-sm" style="margin:0px 0px 10px 0px;width:100%; border:1px solid #ccc;">
														<tbody style="padding:8px 20px; 8px 5px;">
															'.$ref_by.'
														</tbody>
													</table>-->
													<table class="table table-bordered input-sm" style="font-family: arial, sans-serif; border-collapse: collapse;margin-bottom:0px; margin-top:110px;width:100%; padding-top:0px; ">
														<thead>
															<tr>
																<td style="border:0px solid #ccc; font-size:12px; padding:8px 0;">Refrence By :</td>
																<td style="border:0px solid #ccc; font-size:12px; padding:8px 0;">Symptoms :</td>
																<td style="border:0px solid #ccc; font-size:12px; padding:8px 0;">History :</td>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td style="border:1px solid #ccc; font-size:12px; padding:8px;margin-right:10px !important;">'.$ref_by.'</td>
																<td style="border:1px solid #ccc; font-size:12px; padding:8px;margin-right:10px !important;">'.$symp.'</td>
																<td style="border:1px solid #ccc; font-size:12px; padding:8px;margin:0 10px; !important">'.$history.'</td> 
																</tr>
														</tbody>
													</table>



													<!--<h3 style="color:#317eac;margin:0px;font-size:12px;">Symptoms :</h3><br>
													<table class="table table-bordered input-sm" style="margin:0px 0px 10px 0px;width:100%; border:1px solid #ccc;">
														<tbody style="padding:8px 20px; 8px 5px;">
															'.$symp.'
														</tbody>
													</table>
													<h3 style="color:#317eac;margin:0px;font-size:12px;">History :</h3><br>
													<table class="table table-bordered input-sm" style="margin:0px 0px 10px 0px;width:100%; border:1px solid #ccc;">
														<tbody style="padding:8px 20px; 8px 5px;">
															'.ucfirst($history).'
														</tbody>
													</table>-->
													<h3 style="color:#fff; background-color:#63599e; font-size:13px; padding:6px 10px;margin:20px 0 0 0px;"> Medicine :</h3> 
													<table class="table table-bordered input-sm" style="font-family: arial, sans-serif; border-collapse: collapse;margin-bottom:0px;width:100%; padding-top:0px; ">
														<thead>
															<tr>
																<th style="font-size: 12px;border: 0px solid #dddddd; text-align: left; background-color:#dddddd;color:black;font-weight:600;padding:8px; border:1px solid #ccc;"># </th>
																<th style="font-size: 12px;border: 0px solid #dddddd; text-align: left; background-color:#dddddd ;color:black;padding:8px;font-weight:600;border:1px solid #ccc;">Medicine Type</th>
																<th style="font-size: 12px;border: 0px solid #dddddd; text-align: left; background-color:#dddddd ;color:black;padding:8px;font-weight:600;border:1px solid #ccc;">Medicine Description</th>
																<th style="font-size: 12px;border: 0px solid #dddddd; text-align: left; background-color: #dddddd;color:black;padding:8px;font-weight:600;">Schedule</th>
																<th style="font-size: 12px;border: 0px solid #dddddd; text-align: left; background-color: #dddddd;color:black;padding:8px;font-weight:600;border:1px solid #ccc;">Days </th>
																<th style="font-size: 12px;border: 0px solid #dddddd; text-align: left; background-color: #dddddd;color:black;padding:8px;font-weight:600;border:1px solid #ccc;">Comment </th>
															</tr>
														</thead>
														<tbody>
															'.$tbody.'
														</tbody>
													</table>
													<h3 style="color:#fff; background-color:#63599e; font-size:13px; padding:6px 10px;margin:20px 0 0 0px;"> Investigation  : </h3> 
													<table class="table table-bordered input-sm" style="font-family: arial, sans-serif; border-collapse: collapse;margin-bottom:0px;width:100% ">
														<thead>
															<tr>
															<th style="font-size: 12px;border: 1px solid #ccc; text-align: left; background-color: #dddddd;color:black;padding:8px;font-weight:600;">#</th>
															<th style="font-size: 12px;border: 1px solid #ccc; text-align: left; background-color: #dddddd;color:black;padding:8px;font-weight:600;">Investigation Description </th>
															<th style="font-size: 12px;border: 1px solid #ccc; text-align: left; background-color: #dddddd;color:black;padding:8px;font-weight:600;">Comment </th>
															</tr>
															
														</thead>
														<tbody>
															'.$test_body.'
														</tbody>
													</table>

													<h3 style="color:#fff; background-color:#63599e; font-size:13px; padding:6px 10px;margin:20px 0 0 0px;"> Advice  : </h3> 
													<table class="table table-bordered input-sm" style="font-family: arial, sans-serif; border-collapse: collapse;margin-bottom:0px;width:100% "> <tbody>
															'.$adv.'
														</tbody>
													</table>



													<!--<h3 style="color:#fff; background-color:#63599e; font-size:12px; padding:6px 10px;margin:20px 0 0 0px;"> Advice  : </h3> 
													<h3 style="color:#317eac;margin:10px 0 0 0px; font-size:12px;">Advice :</h3><br>
													<table class="table table-bordered input-sm" style="margin:0px 0px 20px 0px;width:100%; ">
														<tbody style="padding-left:0px;">
															'.$adv.'
														</tbody>
													</table>-->
													
												</div>
												<!--- 
											</div>
										</div>-->
									</div>
								</div>
								</div>
								</div>
							</body>
							
						</html>';
					$test_1 .='<div class="col-md-12 col-sm-12">
									<div class="pdf-section" id="pdf-1" style="border:1px solid #ccc; padding:10px 1px;">
										<div class="container-fluid" id="space-sec" style="background-color: white;">
											<div class="row" id="bg-soc" style="background-color:#63599e; width: 100%; padding: 10px 20px 10px 10px; z-index: 999; margin: 0px; top: 15px;">
												<div class="col-sm-4" >
													<div class="pdf-logo-sec">
														<img src="images/pdf-1.png" style="width: 44%; margin-left: -15px;">
													</div>
												</div>
												<div class="col-sm-4" >&nbsp;</div>
													<div class="col-sm-4" >
														<div class="pdf-text-sec" style="margin-right: 0px; text-align: right !important; line-height: 3;">
															<h4  style="color:#fff; font-size:24px;">Dr. Harsh Udawat</h4>
															<p style="color: #fff; font-size: 15px;">DM - Gastroenterology <br>
															MBBS, MD - General Medicine</p>
														</div>
													</div>
												</div>
												<br>
												<div class="patient-basic-information">
													<div class="patient-info-heading" style="background-color: #63599e; padding: 3px 20px; color: #fff;">
														<h4>Patient Basic Information</h4>
													</div>
													<div class="user-info-text" style="padding: 20px; border: 1px solid #ccc;">
														<div class="row">
															<div class="col-sm-2" >
																<div class="pdf-info-sec">
																	<p style="font-weight: 600;font-size: 16px;">Date</p>
																	<p style="font-weight: 600;font-size: 16px;">Patient ID</p>
																	<p style="font-weight: 600;font-size: 16px;">Prescription ID</p>
																</div>
															</div>
															<div class="col-sm-1" >
																<div class="pdf-info-sec">
																	<p style="font-weight: 600;font-size: 16px;">:</p>
																	<p style="font-weight: 600;font-size: 16px;">:</p>
																	<p style="font-weight: 600;font-size: 16px;">:</p>
																</div>
															</div>
															<div class="col-sm-3" style="border-right:1px solid #ccc;" >
																<div class="pdf-infos-sec" style="text-align: left;">
																	<p> '.$date.'</p>
																	<p>'.$book_id.'</p>
																	<p>'.$txt_random_no.'</p>
																</div>
															</div>
															<div class="col-sm-2" >
																<div class="pdf-info-sec">
																	<p style="font-weight: 600;font-size: 16px;">Patient Name</p>
																	<p style="font-weight: 600;font-size: 16px;">Phone</p>
																	<p style="font-weight: 600;font-size: 16px;">Age</p>
																</div>
															</div>
															<div class="col-sm-1" >
																<div class="pdf-info-sec">
																	<p style="font-weight: 600;font-size: 16px;">:</p>
																	<p style="font-weight: 600;font-size: 16px;">:</p>
																	<p style="font-weight: 600;font-size: 16px;">:</p>
																</div>
															</div>
															<div class="col-sm-3" >
																<div class="pdf-infos-sec" style="text-align: left;">
																	<p> '.$txt_patient_name.'</p>
																	<p> '.$txt_phone.'</p>
																	<p> '.$txt_age.'</p>
																</div>
															</div>
														</div>
													</div>
													<div class="refrence-info-text">
														<div class="row">
															<div class="col-sm-4" >
																<div class="pdf-info-sec" style="padding: 20px 0;">
																	<p style="font-weight: 600;font-size: 16px;">Refrence By    :</p>
																	<input type="text" value="'.$ref_by.'" class="form-control">
																	<!--<div class="input" style="border: 1px solid #ccc; padding: 10px 20px;">'.$ref_by.'</div>--->
																</div>
															</div>
															<div class="col-sm-4" >
																<div class="pdf-info-sec"style="padding: 20px 0;">
																	<p style="font-weight: 600;font-size: 16px;">Symptoms</p>
																	<input type="text" value="'.$symp.'" class="form-control">
																	<!---<div class="input" style="border: 1px solid #ccc; padding: 10px 20px;">'.$symp.'</div>-->
																</div>
															</div>
															<div class="col-sm-4" >
																<div class="pdf-info-sec"style="padding: 20px 0;">
																	<p style="font-weight: 600;font-size: 16px;">History</p>
																	<!--<div class="input" style="border: 1px solid #ccc; padding: 10px 20px;">'.$history.'</div>--><input type="text" value="'.$history.'" class="form-control">
																</div>
															</div>
														</div>
													</div> 
													<div class="table-section-text">
														<div class="patient-info-heading" style="background-color: #63599e; padding: 3px 20px; color: #fff;">
															<h4>Medicine :</h4>
														</div>
														<div class="table-sce">
															<table class="table table-bordered">
																<thead>
																	<tr style="background-color: #ebebeb; color: #7a7272;">
																	  <th>#</th>
																	  <th>Medicine Type</th>
																	  <th>Medicine Description</th>
																	  <th>Schedule</th>
																	  <th>Days</th>
																	  <th>Comment</th>
																	</tr>
																</thead>
																<tbody>
																	'.$tbody.'
																</tbody>
															</table>
														</div>
														<div class="patient-info-heading" style="background-color: #63599e; padding: 3px 20px; color: #fff;">
															<h4>Investigation :</h4>
														</div>
														<div class="table-sce">
															<table class="table table-bordered">
																<thead>
																	<tr  style="background-color: #ebebeb; color: #7a7272;">
																	  <th>#</th>
																	  <th>Investigation Description</th>
																	  <th>Comment</th>
																	</tr>
																</thead>
																<tbody>
																	'.$test_body.'
																</tbody>
															</table>
														</div>
													</div>
													<h4 style="color:#fff; background-color:#63599e; padding:6px 10px;margin:20px 0 0 0px;"> Advice  : </h4> 
													<!--<h3 style="color:#317eac;margin:10px 0 0 0px; font-size:12px;">Advice :</h3><br>-->
													<table class="table table-bordered input-sm" style="margin:0px 0px 20px 0px;width:100%; border:1px solid #ccc;">
														<thead>
															<tr>
															<!--<th style="font-size: 12px;border: 1px solid #ccc; text-align: left; background-color: #dddddd;color:black;padding:8px;font-weight:600;">#</th>--->
															<th style="font-size: 12px;border: 1px solid #ccc; text-align: left; background-color: #dddddd;color:black;padding:8px;font-weight:600;">Description </th>
															</tr>
														</thead>
														<tbody style="padding-left:20px;">
															'.$adv.'
														</tbody>
													</table>
													<!--<div class="refrence-info-text">
														<div class="pdf-info-sec"style="padding: 0;">
															<p style="font-weight: 600;font-size: 16px;">Advice     :</p>
															<div class="input" style="border: 1px solid #ccc; padding: 12px 20px;"></div>
														</div>
													</div>-->
												</div>
												<br>												
												<div class="footer-se">
 													<div class="footer-section" style="text-align:center;background-color:#63599e;">
														<h5 style="color:#fff; font-size:12px;padding:10px;"><b>Udawat Gastroenterology Clinic</b> - A-111, Shri Ram Marg, Shyam Nagar, Jaipur</h5>
														
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>';
$dompdf->loadHtml($table_data1);
$dompdf->setBasePath(realpath('pdf/'));
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
//$dompdf->stream($filename);
$output = $dompdf->output();
file_put_contents('pdf/' . $filename, $output);
}
}
?>
<!DOCTYPE html>
<html lang="en-US" class="no-js">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<title>Prescription</title>
		
		<script data-require="jquery@*" data-semver="2.2.0" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script data-require="bootstrap@*" data-semver="3.3.6" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link data-require="bootstrap-css@3.3.6" data-semver="3.3.6" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" />
	
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
		
		<link rel='stylesheet' id='wp-block-library-css'  href='wp-includes/css/dist/block-library/style.min7752.css?ver=5.2.1' type='text/css' media='all' />
		<link rel='stylesheet' id='contact-form-7-css'  href='wp-content/plugins/contact-form-7/includes/css/styles3c21.css?ver=5.1.1' type='text/css' media='all' />
		<link rel='stylesheet' id='rs-plugin-settings-css'  href='wp-content/plugins/revslider/public/assets/css/settings23da.css?ver=5.4.8' type='text/css' media='all' />
		<style id='rs-plugin-settings-inline-css' type='text/css'>
		#rs-demo-id {}
		</style>
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
			.vc_custom_1553502786044 {
				padding-bottom: 20px !important;
				background-image: url(wp-content/uploads/sites/31/2018/05/violet-box983f.jpg?id=1199) !important;
				background-position: 0 0 !important;
				background-repeat: repeat !important;
			}	
.vc_column_container>.vc_column-inner {
    box-sizing: border-box;
    padding-left: 16px!important;
    padding-right: 20px!important;
    width: 100%;
}			
			@media only screen and (max-width: 768px) {
				.uk-grid>* {
					padding-left: 0px !important;
				}
				a.uk-button.uk-button-default.gallery-section{
					width: 100%;
					margin-left: 0% !important;
					background-color: #009eb3;
					border: none;
					border-width: 0px;
					border-color: transparent;
				}
				.uk-section{
					box-sizing: border-box;
					padding-top: 40px;
					padding-bottom: 0px !important;
				} 
				
				.border-sections{
						padding: 15px 10px 0 10px!important;
				}
					b.harsh_pdf {
					font-size: 14px !important;
				}
				p.clinic_name {
					line-height: 19px !important;
					font-size: 12px !important;
				}
				.border-sections .header-section .colum {
					width: 50% !important;
					float: right;
				}
				img.pdf_logo_file {
					width: 100% !important;
					margin-top: 35px !important;
				}
				.contant-section {
					margin-top: 140px !important;
				}
				table.table.table-bordered.input-sm th {
					font-size: 13px !important;
				}
				.contant-section .col-xs-6 {
					margin: 0 !important;
					padding: 0 !important; 
				}
				p.pdf_date {
					padding: 0px !important;
				}
				.download_pdf_file {
					margin-left: 60% !important;
				}
			}
			table, th, td {
				border:none;
				
				<!--border: 1px solid rgba(51, 51, 51, 0.1)!important;-->
			}
		</style>
		<link rel='stylesheet' id='themeton-custom-stylesheet-css'  href='wp-content/uploads/sites/31/2019/04/medio7752.css?ver=5.2.1' type='text/css' media='all' />
		
		<script type='text/javascript' src='wp-includes/js/jquery/jquery4a5f.js?ver=1.12.4-wp'></script>
		<script type='text/javascript' src='wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1'></script>
		<script type='text/javascript' src='wp-content/plugins/revslider/public/assets/js/jquery.themepunch.tools.min23da.js?ver=5.4.8'></script>
		<script type='text/javascript' src='wp-content/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min23da.js?ver=5.4.8'></script>
		
		<script type='text/javascript' src='wp-includes/js/mediaelement/mediaelement-and-player.min45a0.js?ver=4.2.6-78496d1'></script>
		<script type='text/javascript' src='wp-includes/js/mediaelement/mediaelement-migrate.min7752.js?ver=5.2.1'></script>
		
		
		<style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1551541901651{margin-top: 46px !important;}.vc_custom_1554171066700{padding-top: 30px !important;padding-bottom: 50px !important;}.vc_custom_1551767028403{padding-right: 60px !important;}.vc_custom_1551766958397{border-left-width: 1px !important;padding-left: 20px !important;border-left-color: #b2bcbd !important;border-left-style: solid !important;}.vc_custom_1551534769676{margin-bottom: -7px !important;}.vc_custom_1552802309911{margin-top: 0px !important;margin-bottom: 0px !important;}.vc_custom_1551535277062{margin-bottom: -7px !important;}.vc_custom_1552802384924{margin-top: 0px !important;margin-bottom: 0px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1554110925366{background-image: url(wp-content/uploads/sites/31/2017/06/bannerpic.png?id=1001) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554110862652{margin-left: -15px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1553482574309{padding-bottom: 0px !important;}.vc_custom_1552749412294{margin-top: 0px !important;padding-top: 0px !important;background-image: url(wp-content/uploads/sites/31/2017/06/Path-211a80.png?id=1281) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554787876299{background-color: #4f4780 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552321818900{margin-bottom: 0px !important;}.vc_custom_1554719683187{margin-top: 135px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552754605138{margin-left: -15px !important;}.vc_custom_1554786847685{margin-bottom: 0px !important;}.vc_custom_1552754523147{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1552754535828{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1554788006379{padding-top: 25px !important;}.vc_custom_1554789825528{padding-top: 20px !important;}.vc_custom_1554787620879{margin-bottom: 0px !important;}@media screen and (min-width: 980px) {.form-padding {padding-left: 50px;padding-right: 50px;}}@media screen and (max-width: 980px) {.form-padding {margin-bottom: 45px;}}#scroll {box-shadow: none;padding:0;}#scroll:hover {box-shadow: none;}</style>
		<style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1509939171657{margin-top: 100px !important;}.vc_custom_1509939179248{margin-bottom: 100px !important;}.vc_custom_1509939551805{margin: 0px !important;}.vc_custom_1509939644011{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 30px !important;margin-left: 0px !important;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1551541901651{margin-top: 46px !important;}.vc_custom_1554171066700{padding-top: 30px !important;padding-bottom: 50px !important;}.vc_custom_1551767028403{padding-right: 60px !important;}.vc_custom_1551766958397{border-left-width: 1px !important;padding-left: 20px !important;border-left-color: #b2bcbd !important;border-left-style: solid !important;}.vc_custom_1551534769676{margin-bottom: -7px !important;}.vc_custom_1552802309911{margin-top: 0px !important;margin-bottom: 0px !important;}.vc_custom_1551535277062{margin-bottom: -7px !important;}.vc_custom_1552802384924{margin-top: 0px !important;margin-bottom: 0px !important;}#header {background-color:#63599e;position:absolute;width:100%; z-index:9999;}.medio-responsive-menu{background:#63599e;}.themeton-menu > li > a {font-family:Poppins!important;font-weight:300!important;text-transform:uppercase!important;font-size:14px!important;line-height:14px!important;color:#ffffff!important;}.themeton-menu > li > a {padding-top:10px !important;padding-right:23px !important;padding-bottom:10px !important;padding-left:23px !important;}.themeton-menu > li > a:hover,.themeton-menu > li > a:focus {color:#e2e2e2!important;}.themeton-menu li ul li a {color:#beb6ea!important;}.themeton-menu > li ul li {}.themeton-menu > li ul li a:hover {color:#ffffff!important;}.themeton-menu > li ul li.current_page_item > a {color:#988aea!important;}.themeton-menu > li > .sub-menu, .themeton-menu > li > .sub-menu > li .sub-menu  {background-color:rgba(64,54,120,1)!important;}.themeton-menu > li ul li {border-color:rgba(91,80,150,1)!important;}.vc_custom_1554110925366{background-image: url(wp-content/uploads/sites/31/2017/06/bannerpic.png?id=1001) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554110862652{margin-left: -15px !important;}#page-title {}@media screen and (min-width: 980px) {.form-padding {padding-left: 50px;padding-right: 50px;}}@media screen and (max-width: 980px) {.form-padding {margin-bottom: 45px;}}#scroll {box-shadow: none;padding:0;}#scroll:hover {box-shadow: none;}.vc_custom_1553482574309{padding-bottom: 0px !important;}.vc_custom_1552749412294{margin-top: 0px !important;padding-top: 0px !important;background-image: url(wp-content/uploads/sites/31/2017/06/Path-211a80.png?id=1281) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1554787876299{background-color: #4f4780 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552321818900{margin-bottom: 0px !important;}.vc_custom_1554719683187{margin-top: 135px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1552754605138{margin-left: -15px !important;}.vc_custom_1554786847685{margin-bottom: 0px !important;}.vc_custom_1552754523147{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1552754535828{margin-bottom: 0px !important;margin-left: 0px !important;}.vc_custom_1554788006379{padding-top: 25px !important;}.vc_custom_1554789825528{padding-top: 20px !important;}.vc_custom_1554787620879{margin-bottom: 0px !important;}#footer {background-color:transparent;font-family:Poppins!important;font-weight:300!important;color:#8b99a6!important;}#footer, #footer p, #footer strong { color:#8b99a6;}#footer .widget .widget-title,#footer .widget .widgettitle {font-family:Poppins!important;font-weight:300!important;}</style><meta name="generator" content="Powered by WPBakery Page Builder - drag and drop page builder for WordPress."/>
		<meta name="generator" content="Powered by Slider Revolution 5.4.8 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface." />
		
		<link rel="icon" href="wp-content/uploads/sites/31/2017/06/Picture1.png" sizes="32x32" />
		<link rel="icon" href="wp-content/uploads/sites/31/2017/06/Picture1.png" sizes="192x192" />
		<style type="text/css" title="dynamic-css" class="options-output">.wrapper>.page-title{background-color:#3db8db;background-size:cover;background-image:url('wp-content/uploads/sites/2/2017/03/page-title-bg.html');}</style><noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>
	</head>
	<body class="page-template-default page page-id-730 page-parent skin-medio wpb-js-composer js-comp-ver-5.4.4 vc_responsive">
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
					<a href="index.php" class="custom-logo-link" rel="home">
						<img src="wp-content/uploads/sites/31/2017/06/logooo.png" alt=""  class="custom-logo">
					</a>
				</div>
				<div class="uk-flex uk-flex-middle uk-flex-right">
					<a href="#offcanvas" class="hamburger-menu uk-navbar-toggle uk-navbar-toggle-icon uk-icon">
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
														<li typeof="v:Breadcrumb"><a href="user_dashbord.php" rel="v:url" property="v:title">Dashbord</a></li>
														<li typeof="v:Breadcrumb"><a href="#" rel="v:url" property="v:title">Prescription</a></li>
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
			
			<section class="uk-section" style="padding-bottom:20px;" >
				<div class="uk-container uk-container-default uk-position-relative" style="padding-bottom:6%">
					<div class="uk-grid uk-flex uk-flex-center">
						<div class="uk-width-1-1@s">
							<article class="medio-page-single uk-article post-730 page type-page status-publish hentry">
								<div class="download_pdf_file" style="margin-left: 86%;">
									<a href="pdf/<?php echo $filename; ?>" target="_blank" class="btn btn-primary" id="" Download><span class="fa fa-download"></span> Download</a>
								</div>
								<h1 style="text-align: center;">Prescription</h1>
								
								<div class="vc_row-full-width vc_clearfix"></div>
								<?php echo $test_1;?>
									<div class="vc_row-full-width vc_clearfix"></div>								
							</article> 
							
						</div>
					</div>
				</div>
			</section>
			<!-----------Footer Start--------->
			
			<?php include 'footer.php'; ?>
			
			<!-----------Footer End----------->	
		</div><!-- end .wrapper -->
		
		<link rel='stylesheet' id='js_composer_front-css'  href='wp-content/plugins/js_composer/assets/css/js_composer.min7263.css?ver=5.4.4' type='text/css' media='all' />
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
	