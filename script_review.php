<?php
ini_set('display_errors',1);
session_start();
include 'config/DB.php';
$db = new DB();
$connect = $db->connect();
	if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
		//$secret = '6LdKz6wUAAAAAKyxedZHSdNuQkhYrpNueAvPDa0w';
		$secret = '6Ldn6NoUAAAAAJFYAeiIL687OPpNFbiixlDQkB-4';
		$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
		$responseData = json_decode($verifyResponse);
		if($responseData->success){
			if(isset($_REQUEST['btnsubmit'])){
				$txt_uid = $_REQUEST['user_id'];
				//$txt_book_id = $_REQUEST['book_id'];
				$txt_name = $_REQUEST['txt_name'];
				$txt_email = $_REQUEST['txt_email'];
				$txt_review_title = $_REQUEST['txt_review_title'];
				$txt_rating = $_REQUEST['rating']; 
				$txt_review_content = $_REQUEST['txt_review_content'];
						
				$tbl_name = 'tab_user';
				$col = array();
				$where ="u_id ='$txt_uid'";		 
				$query_fetch = $db->sql_select($tbl_name, $col, $where, $order_by = null);
				if ($query_fetch) {
					$txt_image = $query_fetch[0]['txt_image'];
				} 
				$tbl_name = 'tab_customer_review'; 
				$col = array();  
				$col = array('user_id' => $txt_uid, 'txt_name' => $txt_name, 'txt_email' => $txt_email, 'txt_review_title' => $txt_review_title, 'txt_rating' => $txt_rating, 'txt_review_content' => $txt_review_content, 'txt_image' => $txt_image );
				//print_r($col);die;
				$query_fetch = $db->sql_insert($tbl_name, $col);
				//echo $query_fetch;	die;	
				if($query_fetch){
					$_SESSION['review_msg'] = 'Review Successfully';
					header('location:testimonials.php');
				}else{
					$_SESSION['review_error'] = 'Failed To Give Review';
					header('location:testimonials.php');  
				}
			}else{
				$_SESSION['review_error'] = 'Not Found';
				header('location:testimonials.php'); 
			}
		}else{
			$_SESSION['review_error'] = 'Robot verification failed, please try again.';
			header("location:testimonials.php");
		}
	}else{
		$_SESSION['review_error'] = 'Robot verification failed, please try again!';
		header("location:testimonials.php");			
	}
?>