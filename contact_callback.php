<?php 
ini_set('display_errors', 1);
session_start();

require('config/email.php');
$emailClass = new Email;
if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
	$secret = '6Ldn6NoUAAAAAJFYAeiIL687OPpNFbiixlDQkB-4';
	$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
	$responseData = json_decode($verifyResponse);
	if($responseData->success){
		if (isset($_POST['Btnsubmit'])) {

			$name    = ucwords($_POST['userName']); 
			$email   = $_POST['userEmail']; 
			$subject = ucfirst($_POST['subject']); 
			$message = ucfirst($_POST['content']); 
			
			//$adminEmail = "kirti.purbiya@vksoftwares.com";		
			$adminEmail = "harshudawat@gmail.com";		
			$adminName  = "Udawat Gastroenterology Clinic";		
			$fromEmail  = $email;
			$fromName   = $name;
			
			$toEmail = $adminEmail;
			$toName  = $adminName;
			
			$bodyEmail ='<!DOCTYPE html PUBLIC>
						<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
					<head>
						<meta charset="UTF-8">
						<meta content="width=device-width, initial-scale=1" name="viewport">
						<meta name="x-apple-disable-message-reformatting">
						<meta http-equiv="X-UA-Compatible" content="IE=edge">
						<meta content="telephone=no" name="format-detection">
						<title>Udawat Gastroenterology Clinic</title>
					</head>
					<body>
						<div class="es-wrapper-color">
							<table class="es-wrapper" style="background-position: center top;" width="100%" cellspacing="0" cellpadding="0">
								<tbody>
									<tr>
										<td class="esd-email-paddings" valign="top">
											<table cellpadding="0" cellspacing="0" class="es-content esd-header-popover" align="center">
												<tbody>
													<tr>
														<td class="es-adaptive esd-stripe" esd-custom-block-id="15609" align="center">
															<table class="es-content-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
																<tbody>
																	<tr>
																		<td class="esd-structure es-p10" align="left">
																			<!--[if mso]><table width="580"><tr><td width="280" valign="top"><![endif]-->
																			<table class="es-left" cellspacing="0" cellpadding="0" align="left">
																				<tbody>
																					<tr>
																						<td class="esd-container-frame" width="280" align="left">
																							<table width="100%" cellspacing="0" cellpadding="0">
																								<tbody>
																									<tr>
																										<td class="es-infoblock esd-block-text es-m-txt-c" align="left">
																											<!--<p>Thank you for registering</p>--->
																										</td>
																									</tr>
																								</tbody>
																							</table>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
											<table class="es-header" cellspacing="0" cellpadding="0" align="center">
												<tbody>
													<tr>
														<td class="esd-stripe" esd-custom-block-id="15610" align="center">
															<table class="es-header-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" align="center">
																<tbody>
																	<tr>
																		<td class="esd-structure" align="left">
																			<table width="100%" cellspacing="0" cellpadding="0">
																				<tbody>
																					<tr>
																						<td class="esd-container-frame" width="600" valign="top" align="center">
																							<table width="100%" cellspacing="0" cellpadding="0">
																								<tbody>
																									<tr>
																										<td class="esd-block-image es-p20b" align="center" style="font-size:0;background-color: #63599e;paddding-bottom:20px!important;"><a href="#" target="_blank">
																										<img src="https://drharshudawat.com/wp-content/uploads/sites/31/2017/06/logooo.png" alt style="display: block;" width="190"></a></td>
																									</tr>
																								</tbody>
																							</table>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
											<table class="es-content" cellspacing="0" cellpadding="0" align="center" style="border: 1px solid #FEE!important;">
												<tbody>
													<tr>
														<td class="esd-stripe" align="center">
															<table class="es-content-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" align="center">
																<tbody>
																	<tr>
																		<td class="esd-structure" align="left">
																			<table width="100%" cellspacing="0" cellpadding="0">
																				<tbody>
																					<tr>
																						<td class="esd-container-frame" width="600" valign="top" align="center">
																							<table style="border-radius: 3px; border-collapse: separate; background-color: #fcfcfc;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#fcfcfc">
																								<tbody>
																									<tr>
																										<td class="esd-block-text es-m-txt-l es-p30t es-p20r es-p20l" align="left">
																											<h2 style="color: #333333;margin-left:7px;"></h2>
																										</td>
																									</tr>
																									<tr>
																										<td class="esd-block-text es-p10t es-p20r es-p20l" bgcolor="#fcfcfc" align="left">
																											<p  style="margin-left: 7px;text-align: center;">Hello Admin, I am '.$name.', My queries are given below. Please reply to me. <br></p>
																										</td>
																									</tr>
																								</tbody>
																							</table>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																	</tr>
																	<tr>
																		<td class="esd-structure es-p30t es-p20r es-p20l" style="background-color: #fcfcfc;" esd-custom-block-id="15791" bgcolor="#fcfcfc" align="left">
																			<table width="100%" cellspacing="0" cellpadding="0">
																				<tbody>
																					<tr>
																						<td class="esd-container-frame" width="560" valign="top" align="center">
																							<table style="border-color: #efefef; border-style: solid; border-width: 1px; border-radius: 3px; border-collapse: separate; background-color: #ffffff;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
																								<tbody>
																									<tr>
																										<td class="esd-block-text es-p20t es-p15b" align="center">
																											<h3 style="color: #333333;">User account information:</h3>
																										</td>
																									</tr>
																									<tr>
																										<td class="esd-block-text" align="center">
																											<p style="text-align: left;margin-left: 12px;color: #64434a; font-size: 16px; line-height: 150%;">Username: '.$name.'</p>
																											<p style="text-align: left;margin-left: 12px;color: #64434a; font-size: 16px; line-height: 150%;">Email: '.$email.'</p>
																											<p style="text-align: left;margin-left: 12px;color: #64434a; font-size: 16px; line-height: 150%;">Subject: '.$subject.'</p>
																											<p style="text-align: justify;margin-left: 12px;margin-right: 13px;color: #64434a; font-size: 16px; line-height: 150%;">Content: <span style="margin-left: 2px;color: #64434a; font-size: 14px;">'.$message.'</span></p>
																										</td>
																									</tr>
																								   
																								</tbody>
																							</table>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</body>
				</html>';
			$options = ['from'=>          ['email'=>$fromEmail, 'name'=>$fromName],
					'recipients'=>   [['email'=>$toEmail, 'name'=>$toName]],
					'ccrecipients'=> [['email'=>'', 'name'=>'']],
					'bccrecipients'=>[['email'=>'', 'name'=>'']],
					'attachments'=>  [['path'=>'','name'=>''],['path'=>'','name'=>''],['path'=>'','name'=>'']],
					'credentials'=>   ['username'=>'','password'=>''],
					'subject'=>        $subject,
					'body'=>           $bodyEmail];			
			$success = $emailClass->sendEmail($options);
			if($success == true) {				
				$_SESSION['success_msg'] = 'Contact Detail Successfully Send!';
				header("location:contact.php");
			}else {
				$_SESSION['failure_msg'] = 'Contact Detail Do Not Send!';
				header("location:contact.php");	
			}					 
		} else{
			$_SESSION['failure_msg'] = 'Invalid Method!';
			header("location:contact.php");			
		}
	}else{
		$_SESSION['failure_msg'] = 'Robot verification failed, please try again.';
		header("location:contact.php");
	}
}else{
	$_SESSION['failure_msg'] = 'Robot verification failed, please try again!';
	header("location:contact.php");			
}
?>