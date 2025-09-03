<?php
	ini_set('display_errors',1);
	session_start();
	include 'config/google_config.php';
	include 'config/DB.php';
	$db = new DB();
	$connect = $db->connect();
	if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
		//$secret = '6LdKz6wUAAAAAKyxedZHSdNuQkhYrpNueAvPDa0w';
		$secret = '6Ldn6NoUAAAAAJFYAeiIL687OPpNFbiixlDQkB-4';
		$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
		$responseData = json_decode($verifyResponse);
		if($responseData->success){
			if(isset($_REQUEST['submitButton'])){
				//echo 'hii';die;
				$txt_email = $_REQUEST['txt_email'];
				//$txt_pass = $_REQUEST['txt_pass'];
				$pass       = md5($_REQUEST['txt_pass']);
				$txt_pass   = base64_encode($pass);
				if((!empty($txt_email)) && (!empty($txt_pass))){
					$tbl_name = 'tab_user';
					$col = array();
					$where = "txt_pass ='$txt_pass' and (txt_email ='$txt_email')";
					$query_fetch = $db->sql_select($tbl_name, $col, $where, $order_by = null);
					//echo 'hii';die;
					if($query_fetch){
						//print_r($query_fetch);die;
						$_SESSION['create_at']	    = $query_fetch[0]['create_at'];
						$_SESSION['txt_email']	    = $query_fetch[0]['txt_email'];
						$_SESSION['role']	       	= $query_fetch[0]['txt_roles'];
						$_SESSION['user']   		= $query_fetch[0]['txt_name'];         
						$_SESSION['u_id'] 			= $query_fetch[0]['u_id'];				
						//$_SESSION['msg'] 	= 'Login Successfully.';
						if($_SESSION['role']== 'Admin'){
							//echo 'hii';die;
							$_SESSION['user']   = $query_fetch[0]['txt_name'];
							$_SESSION['role']	= $query_fetch[0]['txt_roles'];
							$_SESSION['u_id'] 	= $query_fetch[0]['u_id'];
							header("location:admin/index.php");
						}else if($_SESSION['role'] == 'Staff'){
							//echo 'hii1';die;
							$_SESSION['user']   = $query_fetch[0]['txt_name'];
							$_SESSION['role']	= $query_fetch[0]['txt_roles'];
							$_SESSION['u_id'] 	= $query_fetch[0]['u_id'];
							//header("location:user_dashbord.php");	
							header("location:admin/index_staff.php");
						}else if($_SESSION['role'] != 'Admin' || $_SESSION['role'] == ''){
							//echo 'hii2';die;
							$_SESSION['user']   = $query_fetch[0]['txt_name'];
							$_SESSION['u_id'] 	= $query_fetch[0]['u_id'];
							header("location:user_dashbord.php");
						}
					}else{
						$_SESSION['error'] = 'Somthing Wrong.';
						header("location:login.php");	
						} 
				}else{
					$_SESSION['error'] = 'Please Fill Blank Detail.';
					header("location:login.php");	
				}
			}
		}else{
			$_SESSION['error'] = 'Robot verification failed, please try again.';
			header("location:login.php");
		}
	}else{
		$_SESSION['error'] = 'Robot verification failed, please try again!';
		header("location:login.php");			
	}
if(isset($_REQUEST['code'])){
	//echo 'hii1';die;
	if (isset($_SESSION['access_token'])){
		$gClient->setAccessToken($_SESSION['access_token']);
		//echo 'hii1';die;
	}else if(isset($_GET['code'])) {
		//echo 'hii2';die;
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
	}else{
		header('Location: login.php');
		exit();
	}
	///echo 'hii';die;
	$oAuth    = new Google_Service_Oauth2($gClient);
	$userData = $oAuth->userinfo_v2_me->get();
	$id         = $userData['id'];
	$email      = $userData['email'];
	$gender     = $userData['gender'];
	$picture    = $userData['picture'];
	$familyName = $userData['familyName'];
	$givenName  = $userData['givenName'];
	$verifiedEmail = $userData['verifiedEmail'];
	$link      = $userData['link'];
	
	$tbl_name = 'tab_user';
	$col = array();
	$where = "txt_email = '$email'";
	$query_fetch = $db->sql_select($tbl_name, $col, $where, $order_by = null);
	/* echo $where;
	print_r($query_fetch); 
	echo 'hii';die;*/
	if($query_fetch == true){
		//echo 'hii';die;
		$tbl_name = 'tab_user';
		$where ="txt_email ='$email'";
		$col = array('txt_name' => $givenName, 'txt_lastname' => $familyName, 'txt_email' => $email, 'txt_gender' => $gender, 'oauth_uid' => $id,'email_verified' => $verifiedEmail, 'oauth_provider' => $link);	//, 'txt_image' => $picture
		$sql_update = $db->sql_update($tbl_name, $col, $where);
		//print_r($sql_update);die;
		if($sql_update == true){
			//echo 'hii';die;
			$tbl_name = 'tab_user';
			$where ="txt_email ='$email'";
			$col = array();
			$query_fetch_up = $db->sql_select($tbl_name, $col, $where, $order_by = null);
			//print_r($query_fetch_up);die;
			if($query_fetch_up == true){	
				//print_r($query_fetch_up[0]['u_id']);die;				
				$_SESSION['u_id'] = $query_fetch_up[0]['u_id'];
				$_SESSION['role'] = $query_fetch_up[0]['txt_roles'];
				header('location:user_dashbord.php');
			}
		}
	}else{ 		
		$tbl_name = 'tab_user';
		$col = array('txt_name' => $givenName, 'txt_lastname' => $familyName, 'txt_email' => $email, 'txt_gender' => $gender, 'oauth_uid' => $id,'email_verified' => $verifiedEmail, 'oauth_provider' => $link);	//, 'txt_image' => $picture
		$sql_insert = $db->sql_insert($tbl_name, $col);
		if($sql_insert){
			$u_id 	    = $sql_insert;
			$tbl_name = 'tab_user';
			$where ="u_id ='$u_id'";
			$col = array();
			$query_fetch_up = $db->sql_select($tbl_name, $col, $where, $order_by = null);
			if($query_fetch_up == true){	
				$_SESSION['u_id'] = $query_fetch_up[0]['u_id'];
				$_SESSION['role'] = $query_fetch_up[0]['txt_roles'];
				header('location:user_dashbord.php');
			}
		}
	}  
}	
?>