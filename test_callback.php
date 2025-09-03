<?php
require('config/email.php');
$emailClass = new Email;

$amount    = '1 rs';
$name      = 'kirti'; 
$phone     = '0987654321';
$email     = 'kittupurbiya@gmail.com';
$age       = '26';

$ydate          = date('d-m-Y');
$timeEvening    = '4:00 PM';
$timeMorning    = '5:00 PM';
$timeNew        = 'new time';
$service        = 'service test';
$problem        = 'problm test';
$doctor         = 'kirti purbiya';
$gender         = 'Female';
$address        = 'jaipur';
$bookingFrom    = 'Website';

$bookingType     ='videocall';
$counsellingType ='normal';
		
if(!empty($email)){
	$data='';
	if($bookingType == 'videocall'){
		$data .="<p>Please join meeting with video call option which will be enable on your schedule time at your appointment history dashboard panel.</p>";
	}else{
		$data .="<p>Please join this meeting on schedule time at our clinic.</p>";
	}
	$adminEmail = "kirti.purbiya@vksoftwares.com";//"kirti.purbiya@vksoftwares.com";	
	$adminName  = "Udawat Gastroenterology Clinic";		
	$fromEmail  = $adminEmail;
	$fromName   = $adminName;
	
	$toEmail = $email;
	$toName  = $name;
	
	$subject   = "Welcome To Udawat Gastroenterology Clinic";
	$bodyEmail = "<!DOCTYPE html>
				<html>
			<head>
				<title>Appointment booked at Udawat Gastroenterology Clinic</title>
			<style>
			table {
			  border-collapse: collapse;
			  width: 70%;
			  align:center;
			  margin-left:10%;
			  margin-right:10%;
			  margin-top:10%;
			  margin-bottom:10%;
			  
			}

			th {
			  width:30%;
			  padding: 8px;
			  text-align: left;
			  border-bottom: 1px solid #ddd;
			}
			td{
			  width:70%;
			  padding: 8px;
			  text-align: left;
			  border-bottom: 1px solid #ddd;
			}
			tr:hover {background-color:#f5f5f5;}

			</style>
			</head>

			<body>
			

			<div style='text-align:center;'>
				<h2>Appointment booked at Udawat Gastroenterology Clinic </h2>
				<table id='mytable'>
					<tbody>
						<tr>
							<td>Patient Name</td>
							<td>".ucwords($name)."</td>
						</tr>
						<tr>
							<td>Doctor Name</td>
							<td>".ucwords($doctor)."</td>
						</tr>
						<tr>
							<td>Appointment Date</td>
							<td>".$ydate."</td>
						</tr>
						<tr>
							<td>Appointment Time</td>
							<td>".$timeMorning.$timeEvening."</td>
						</tr>
						<tr>
							<td>Remarks</td>
							<td>".ucfirst($problem)."</td>
						</tr>
						<tr>
							<td>Booking Type</td>
							<td>".ucfirst($bookingType)."</td>
						</tr>
						<tr>
							<td>Counselling Type</td>
							<td>".ucfirst($counsellingType)."</td>
						</tr>
						<tr>
							<td>Amount</td>
							<td>".$amount."</td>
						</tr>
					</tbody>
				</table>
				".$data."
				<br/>

			</div>
			<footer>
				<div style='width:100%; text-align:center;'>&copy; Copyright ".date('d-m-Y')."</div>
			</footer>
		</body>
	</html>";
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
		$json['msg'] = 'Check email';
	}
}if(!empty($adminEmail)){
	$data='';
	if($bookingType == 'videocall'){
		$data .="<p>Please join meeting with video call option which will be enable on your schedule time at your today appointment history.</p>";
	}else{
		$data .="<p>Please join this meeting on schedule time at clinic.</p>";
	}
	$adminEmail = "kirti.purbiya@vksoftwares.com";//"kirti.purbiya@vksoftwares.com";	
	$adminName  = "Udawat Gastroenterology Clinic";		
	$fromEmail  = $email;
	$fromName   = $name;
	
	$toEmail = $adminEmail;
	$toName  = $adminName;
	
	
	$subject   = "New Appointment Booked At Udawat Gastroenterology Clinic";
	$bodyEmail = "<!DOCTYPE html>
				<html>
			<head>
				<title>New Appointment Booked At Udawat Gastroenterology Clinic</title>
			<style>
			table {
			  border-collapse: collapse;
			  width: 70%;
			  align:center;
			  margin-left:10%;
			  margin-right:10%;
			  margin-top:10%;
			  margin-bottom:10%;
			  
			}

			th {
			  width:30%;
			  padding: 8px;
			  text-align: left;
			  border-bottom: 1px solid #ddd;
			}
			td{
			  width:70%;
			  padding: 8px;
			  text-align: left;
			  border-bottom: 1px solid #ddd;
			}
			tr:hover {background-color:#f5f5f5;}

			</style>
			</head>

			<body>
			

			<div style='text-align:center;'>
				<h2>New Appointment Booked At Udawat Gastroenterology Clinic </h2>
				<table id='mytable'>
					<tbody>
						<tr>
							<td>Patient Name</td>
							<td>".ucwords($name)."</td>
						</tr>
						<tr>
							<td>Doctor Name</td>
							<td>".ucwords($doctor)."</td>
						</tr>
						<tr>
							<td>Appointment Date</td>
							<td>".$ydate."</td>
						</tr>
						<tr>
							<td>Appointment Time</td>
							<td>".$timeMorning.$timeEvening."</td>
						</tr>
						<tr>
							<td>Remarks</td>
							<td>".ucfirst($problem)."</td>
						</tr>
						<tr>
							<td>Booking Type</td>
							<td>".ucfirst($bookingType)."</td>
						</tr>
						<tr>
							<td>Counselling Type</td>
							<td>".ucfirst($counsellingType)."</td>
						</tr>
						<tr>
							<td>Amount</td>
							<td>".$amount."</td>
						</tr>
					</tbody>
				</table>
				".$data."
				<br/>

			</div>
			<footer>
				<div style='width:100%; text-align:center;'>&copy; Copyright ".date('d-m-Y')."</div>
			</footer>
		</body>
	</html>";
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
		$json['msg'] = 'Check email';
	}
}
		
?>