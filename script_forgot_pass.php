<?php 
session_start();
ini_set('display_errors',1);
include 'config/DB.php';
$db= new DB();
$connect = $db->connect();

require('config/email.php');
$emailClass = new Email;

if(isset($_REQUEST['Btnsubmit']))
{
	$email        = $_REQUEST['txt_email'];
	$selectRecord ="select * from tab_user where txt_email='$email'";
	$selectRecord = $db->sql_select_join($selectRecord);
	if($selectRecord){
		
		$link = "https://drharshudawat.com/reset_password.php?email=".base64_encode($email).""; 
		$adminEmail = "harshudawat@gmail.com";		
		//$adminEmail = "kirti.purbiya@vksoftwares.com";		
		$adminName  = "Udawat Gastroenterology Clinic";		
		$fromEmail  = $adminEmail;
		$fromName   = $adminName;
		
		$toEmail = $email;
		$toName  = $adminName;
		
		$subject   = "Udawat Gastroenterology Clinic - Forgot Password Link";
		$bodyEmail ="Here is a link to reset password -: <b>". $link ."</b>.   Please do not share with any one";
		
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
			$_SESSION['success_msg1'] = 'Please check your mail id';		
			header("location:forgot_password.php"); 
		}else {
			$_SESSION['failure_msg1'] = 'Invalid Email.';
			header("location:forgot_password.php");           
        }
	}else{
		$_SESSION['failure_msg1'] = 'Please enter registered email.';
		header("location:forgot_password.php");
	}
}else{
	$_SESSION['failure_msg1'] = 'Invalid Email.';
	header("location:forgot_password.php");
}
	
?>