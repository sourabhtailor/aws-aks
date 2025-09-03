<?php
ini_set('display_errors',1);
session_start();
/* echo 'hii';die; */
include 'config/DB.php';
$db = new DB();
$connect = $db->connect();
//echo 'hii1';die;
//print_r($_FILES);
	if(isset($_REQUEST['btnSubmit']))
	{
		$txt_uid = $_REQUEST['txt_uid'];
		$txt_name = str_pad($_REQUEST['name'],10);
		$stripped = trim(preg_replace('/\s+/', ' ', $txt_name));
		$str_arr = explode(' ', $stripped);
		$fname = $str_arr[0];
		$lname = $str_arr[1];
		
		$txt_email = $_REQUEST['email'];
		$age        = $_REQUEST['age'];
		$txt_phone = $_REQUEST['phone'];
		$txt_address = $_REQUEST['address'];
		$txt_pincode = $_REQUEST['pincode'];
		$txt_city = $_REQUEST['txt_city'];
		$txt_state = $_REQUEST['txt_state'];
		//if(){}
		$pass1 = $_REQUEST['pass'];
		$pass       = md5($pass1);
		$txt_pass   = base64_encode($pass);
		$tbl_name = 'tab_user';
		$where = "u_id = '$txt_uid' "; 
		
		
		
		$c_image      = $_FILES['filename']['name'];
		$c_image_temp = $_FILES['filename']['tmp_name'];
		$dir_curr = '../images/upload/';
		if($c_image_temp != "")
		{
			move_uploaded_file($c_image_temp , $dir_curr.$c_image);
			$tbl_name = 'tab_user';
			$where ="u_id ='$txt_uid'";
			$col = array('txt_name' => $fname, 'txt_lastname' => $lname, 'txt_email' => $txt_email, 'txt_phone' => $txt_phone, 'txt_address' => $txt_address, 'txt_pincode' => $txt_pincode, 'txt_city' => $txt_city, 'txt_state' => $txt_state, 'txt_pass' => $txt_pass, 'txt_image' => $c_image, 'txt_age' => $age);
			$sql_update = $db->sql_update($tbl_name, $col, $where);   
			//print_r($sql_update);die;
		}else if($c_image_temp == "")
		{
			$tbl_name = 'tab_user';
			$where ="u_id ='$txt_uid'";
			$col = array('txt_name' => $fname, 'txt_lastname' => $lname, 'txt_email' => $txt_email, 'txt_phone' => $txt_phone, 'txt_address' => $txt_address, 'txt_pincode' => $txt_pincode, 'txt_city' => $txt_city, 'txt_state' => $txt_state, 'txt_pass' => $txt_pass, 'txt_age' => $age);
			$sql_update = $db->sql_update($tbl_name, $col, $where);   
		}	
		if($sql_update){
			$_SESSION['msg1'] = 'Profile Updated Successfully';
			header('location:user_dashbord.php');
		}else{ 
			$_SESSION['error1'] = 'Failed To Update';
			header('location:user_dashbord.php'); 
		}
				
	}else{
		$_SESSION['error1'] = 'Not Found';
		header('location:user_dashbord.php');
	}

?>