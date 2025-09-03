<?php
//echo 'hii';die;
 ini_set('display_errors', 1);
session_start();

include 'config/DB.php';
$db= new DB();
$connect = $db->connect();

if (isset($_REQUEST['txt_email'])) {
	$email = $_REQUEST['txt_email'];
	$password1 = md5($_POST['password']);
	$password = base64_encode($password1);
	
    $tbl_name = 'tab_user';
	$col = array();
	$where = "txt_email='$email'";
	$query_fetch = $db->sql_select($tbl_name, $col, $where, $order_by = null);
	if($query_fetch > 0){
		
		$id = $query_fetch[0]['u_id'];
		$tbl_name = 'tab_user';
		$where    = "u_id = $id";
		$col = array('txt_pass'=>$password);
		$sql_update = $db->sql_update($tbl_name, $col, $where); 
		//echo 'hii';die;		
		if ($sql_update) {
			$_SESSION['success'] = 'Password updated successfully.Please Login';
			header("location: login.php");				
		}else{
			$_SESSION['failure_msg1'] = 'Failed to  updated!';
			header("location: forgot_password.php");
		}
	}else {
		$_SESSION['failure_msg1'] = 'Data Not Found From This Email';
		header("location: forgot_password.php");
	}
} 
?>