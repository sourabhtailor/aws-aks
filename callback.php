<?php
require_once "constants.php";
include 'config/DB.php';
$db = new DB();
$connect = $db->connect();

require('config/email.php');
$emailClass = new Email;

// initialized cURL Request
function get_curl_handle($payment_id, $data) {
    $url = 'https://api.razorpay.com/v1/payments/' . $payment_id . '/capture';
    $key_id = RAZOR_KEY_ID;
    $key_secret = RAZOR_KEY_SECRET;
    $params = http_build_query($data);
    //cURL Request
    $ch = curl_init();
    //set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    return $ch;
}
if (!empty($_POST['razorpay_payment_id']) && !empty($_POST['merchant_order_id'])) {
$json = array();
$razorpay_payment_id = $_POST['razorpay_payment_id'];
$merchant_order_id   = $_POST['merchant_order_id'];
$currency_code       = $_POST['currency_code_id'];
// store temprary data
$dataFlesh = array(
    'card_holder_name' => $_POST['card_holder_name_id'],
    'merchant_amount' => $_POST['merchant_amount'],
    'merchant_total' => $_POST['merchant_total'],
    'surl' => $_POST['merchant_surl_id'],
    'furl' => $_POST['merchant_furl_id'],
    'currency_code' => $currency_code,
    'order_id' => $_POST['merchant_order_id'],
    'razorpay_payment_id' => $_POST['razorpay_payment_id'],
);

$paymentInfo   = $dataFlesh;
$order_info    = array('order_status_id' => $_POST['merchant_order_id']);
$amount        = $_POST['merchant_total'];
$currency_code = $_POST['currency_code_id'];
$amount1       = $_POST['merchant_amount'];
$userId        = $_REQUEST['user_id'];
$name      = $_REQUEST['username']; 
$phone     = $_REQUEST['phone'];
$email     = $_REQUEST['email'];

$selectUserType ="select * from tab_service_booking where txt_u_id='$userId'";
$selectUserType = $db->sql_select_join($selectUserType);
if(!empty($selectUserType)){
	$userType ='old';
}else{
	$userType ='new';
}

$age       		= $_REQUEST['age'];
$date          	= $_REQUEST['date'];
$ydate          = date('d-m-Y',strtotime($_REQUEST['date']));
$timeEvening    = $_REQUEST['time_e'];
$timeMorning    = $_REQUEST['time_m'];
$timeNew        = $_REQUEST['time_new'];
$service        = $_REQUEST['service'];
$problem        = $_REQUEST['problm'];
$doctor         = $_REQUEST['doctor'];
$gender         = $_REQUEST['gender'];
$address        = $_REQUEST['billing_address'];
$bookingFrom    = 'Website';

$bookingType    = $_REQUEST['booking_type'];
if($bookingType == 'videocall'){
	$bookingType ='videocall';
	$length = 6;
	$channelId = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, $length);
}else{
	$bookingType ='facetoface';
	$channelId ='';
}

$counsellingId   = $_REQUEST['counsellingId'];
if(empty($counsellingId)){
	$counsellingId   ='0';
}else{
	$counsellingId   = $_REQUEST['counsellingId'];
}
$counsellingType = $_REQUEST['counsellingType'];

$selectUser ="select * from tab_user where u_id='$userId'";
$selectUser = $db->sql_select_join($selectUser);
if($selectUser){
	$profilePic	    =	$selectUser[0]['txt_image'];
	if($profilePic !== null){
		$profilePic = $dir_curr.$selectUser[0]['txt_image'];					
	}else{
		$profilePic	= $dir_curr.$selectUser[0]['txt_image'];					
	}
}
// bind amount and currecy code
$data = array(
    'amount' => $amount,
    'currency' => $currency_code,
);
$success = false;
$error = '';
try {
    $ch = get_curl_handle($razorpay_payment_id, $data);
    //execute post
    $result = curl_exec($ch);
    $data = json_decode($result);
   
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($result === false) {
        $success = false;
        $error = 'Curl error: ' . curl_error($ch);
    } else {
        $response_array = json_decode($result, true);
        //Check success response
        if ($http_status === 200 and isset($response_array['error']) === false) {
            $success = true;
        } else {
            $success = false;
            if (!empty($response_array['error']['code'])) {
                $error = $response_array['error']['code'] . ':' . $response_array['error']['description'];
            } else {
                $error = 'Invalid Response <br/>' . $result;
            }
        }
    }
    //close connection
    curl_close($ch);
} catch (Exception $e) {
    $success = false;
    $error = 'Request to Razorpay Failed';
}
if ($success === true) {
    if (!$order_info['order_status_id']) {
        $json['redirectURL'] = $_POST['merchant_surl_id'];
    }else {
        
		$tblAppointment = 'tab_service_booking'; 
		$qryAppointment = array('booking_from'=>$bookingFrom,'time_new'=>$timeNew,'booking_type'=>$bookingType,'channel_id'=>$channelId,'txt_u_id' => $userId, 'txt_service_type' => $service, 'txt_user_address' => $address, 'txt_user_name' => $name, 'txt_user_email' => $email, 'txt_user_phone' => $phone, 'txt_problm_detail' => $problem, 'txt_doctor_name' => $doctor, 'txt_start_date' => $date, 'txt_age' => $age, 'txt_gender' => $gender, 'morning_time_slot' => $timeMorning, 'evening_time_slot' => $timeEvening, 'txt_image' => $profilePic, 'txt_payment'=>$amount1,'bookingType_IsCounseling'=>$counsellingType,'counselingId'=>$counsellingId,'user_type'=>$userType);
		$qryAppointment = $db->sql_insert($tblAppointment, $qryAppointment);	
		if(count($qryAppointment) > 0){
			$id         = $qryAppointment;
			$adminEmail = "harshudawat@gmail.com";//"kirti.purbiya@vksoftwares.com";
			if(!empty($email)){
				$data='';
				if($bookingType == 'videocall'){
					$data .="<p>Please join meeting with video call option which will be enable on your schedule time at your appointment history dashboard panel.</p>";
				}else{
					$data .="<p>Please join this meeting on schedule time at our clinic.</p>";
				}
				
				$adminEmail = "harshudawat@gmail.com";//"kirti.purbiya@vksoftwares.com";	
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
			}
			if(!empty($adminEmail)){
				$data='';
				if($bookingType == 'videocall'){
					$data .="<p>Please join meeting with video call option which will be enable on your schedule time at your today appointment history.</p>";
				}else{
					$data .="<p>Please join this meeting on schedule time at clinic.</p>";
				}
				
				$adminEmail = "harshudawat@gmail.com";//"kirti.purbiya@vksoftwares.com";	
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
			}if(!empty($id)){ 
				$tblPatient   = 'tab_patient'; 
				$colPatient   = array('ref_id' => $id,'txt_name' => $name,'txt_gender' => $gender,'txt_age' => $age,'txt_phone' => $phone,'txt_email' => $email,'txt_address' => $address,'txt_image' => $profilePic,'txt_injury' => $problem,'txt_admit_date' => $date);
				$colPatient = $db->sql_insert($tblPatient, $colPatient);
			} 
		}
		$json['redirectURL'] = $_POST['merchant_surl_id'];
    }
} else {
    $json['redirectURL'] = $_POST['merchant_furl_id'];
}
$json['msg'] = '';
} else {
$json['msg'] = 'An error occured. Contact site administrator, please!';
}
header('Content-Type: application/json');
echo json_encode($json);
?>