<?php 
ini_set('display_errors',1);
session_start();
date_default_timezone_set('Asia/Kolkata'); 
include 'config/DB.php';
$db = new DB();
$response=array();
$connect = $db->connect();
if (isset($_REQUEST['id'])){
		
	$time = $_REQUEST['time'];
	$id   = $_REQUEST['id'];
	$select='';
	
	$selectCounselling ="select * from tab_counseling where id='$id' and time='$time'";		
	$selectCounselling = $db->sql_select_join($selectCounselling);
	if($selectCounselling){
		for($i=0;$i<count($selectCounselling);$i++){
			$price   = $selectCounselling[$i]['price'];
			$response['data'] = $price;
		}
	}
}
if(isset($_REQUEST['leave'])){
	$cId      = $_REQUEST['cId'];
	$bookid   = base64_decode($_REQUEST['bookid']);
	
	$tblUpdate ='tab_service_booking';
	$where ="book_id='$bookid'";
	$queryUpdate = array('txt_booking_status'=>'Prescribed');
	$queryUpdate = $db->sql_update($tblUpdate,$queryUpdate,$where);
	if($queryUpdate){
		$response['data'] = 'success';
	}
}
header('Content-Type:application/json');
echo json_encode($response);
exit();
?>