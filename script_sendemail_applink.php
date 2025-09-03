<?php
ini_set('display_errors', 1);
$cls = "alert alert-danger alert-dismissible";
$cls1 = "alert alert-success alert-dismissible";

require('config/email.php');
$emailClass = new Email;

if (isset($_POST['txt_email'])) {
 
	$email     = $_POST['txt_email']; 		
	$link      = "<p>Andriod App Download Link : https://play.google.com/store/apps/details?id=com.opd.drharshudawat</p> 
			      <p>IOS App Download Link : https://drharshudawat.com/index.php </p> "; 
	$adminEmail = "harshudawat@gmail.com";		
	//$adminEmail = "kirti.purbiya@vksoftwares.com";		
	$adminName  = "Udawat Gastroenterology Clinic";		
	$fromEmail  = $adminEmail;
	$fromName   = $adminName;
	
	$toEmail = $email;
	$toName  = $adminName;
	
	$subject   = "Udawat Gastroenterology Clinic App Link";
	$bodyEmail ="<h1>Details of App download Link</h1> -: <b>". $link ."</b>";
	
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
		echo '<div class ="' . $cls1 . '" role="alert" style="padding-bottom: 1%;padding-top: 1%;color: black !important;">Successfully Send.</div>';
	}else {
		echo '<div class ="' . $cls . '" role="alert" style="padding-bottom: 1%;padding-top: 1%;color: black !important;">Something wrong.</div>';
	}		
	
}else{
	echo '<div class ="' . $cls . '" role="alert" style="padding-bottom: 1%;padding-top: 1%;color: black !important;">Something wrong.</div>';
}	
?>