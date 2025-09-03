<?php
ini_set('display_errors',1);
include 'config/DB.php';
$db = new DB();
$connect = $db->connect();

$cls = "alert alert-danger alert-dismissible";
$cls1 = "alert alert-success alert-dismissible";

if(isset($_REQUEST['txt_email'])){
		$txt_email = $_REQUEST['txt_email'];
		$tbl_name	= 'tab_subscribers';		
		$col = array();
		$where ="txt_user_email ='$txt_email'";		 
		$query_fetch = $db->sql_select($tbl_name, $col, $where, $order_by = null);

		if(count($query_fetch) > 0){
			echo '<div class ="' . $cls1 . '" role="alert">You Allready Subscribe.</div>';		
		} else {
			$col = array('txt_user_email'=>$txt_email);
			$sql_insert = $db->sql_insert($tbl_name, $col);
			echo '<div class ="' . $cls1 . '" role="alert">You Subscribe Successfully.</div>';			
		}	
	}else{
		echo '<div class ="' . $cls . '" role="alert">Something wrong.</div>';		
	}

?>