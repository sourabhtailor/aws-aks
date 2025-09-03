<?php
ini_set('display_errors',1);
session_start();
include 'config/DB.php';
$db = new DB();
$connect = $db->connect();
if(isset($_REQUEST['btnsubmit']))
{
	//Print_r($_REQUEST['txt_name']);die;
	$txt_name    = $_REQUEST['txt_name'];
	$txt_lname   = $_REQUEST['txt_lname'];
	$txt_phone   = $_REQUEST['txtEmpPhone'];
	$txt_age     = $_REQUEST['txt_age'];
	$txt_email   = $_REQUEST['txt_email'];
	$txt_pincode = $_REQUEST['txt_pincode'];
	$txt_address = $_REQUEST['txt_address'];
	
	//$pass     = $_REQUEST['txt_pass'];
	$pass       = md5($_REQUEST['txt_pass']);
	$txt_pass   = base64_encode($pass);
	
	//$txt_cnpass = $_REQUEST['txt_cnpass'];
	$cnpass       = md5($_REQUEST['txt_cnpass']);
	$txt_cnpass   = base64_encode($cnpass);
	
	$txt_gender = $_REQUEST['txt_gender'];
	$txt_state  = $_REQUEST['txt_state'];
	$txt_city   = $_REQUEST['txt_city'];
	$user_type  = 'Patient';//txt_roles;
	if (!empty($_REQUEST['txt_email']) || !empty($_REQUEST['txt_phone'])){ 
		$tbl_name = 'tab_user';
		$col = array();
		//print_r($tbl_name); die;
		$where ="txt_email ='$txt_email' || txt_phone ='$txt_phone'";		 
		$query_fetch = $db->sql_select($tbl_name, $col, $where, $order_by = null);
		if(count($query_fetch) > 0){
			$_SESSION['error1'] = 'Email and Contact already Exist';
			header('location:register.php');
		} 
		else if($txt_pass == $txt_cnpass){
			$txt_pass = $txt_cnpass;
			$col = array('txt_name' => $txt_name, 'txt_lastname' => $txt_lname, 'txt_email' => $txt_email, 'txt_phone' => $txt_phone, 'txt_address' => $txt_address, 'txt_pincode' => $txt_pincode, 'txt_age' => $txt_age, 'txt_gender' => $txt_gender, 'txt_city' => $txt_city, 'txt_state' => $txt_state, 'txt_pass' => $txt_pass, 'txt_roles' => $user_type);
			$sql_insert = $db->sql_insert($tbl_name, $col);
			$_SESSION['msg1'] = 'Registered Successfully';
			header('location:register.php');
		}else{
			$_SESSION['error1'] = 'confirm password do not match password';
			header('location:register.php'); 
		}	
	} 
}else{
		$_SESSION['error1'] = 'failed';
		header('location:register.php');
	}
?>


