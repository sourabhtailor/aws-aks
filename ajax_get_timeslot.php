<?php
ini_set('display_errors',1);
require_once 'config/DB.php';
$db = new DB();
$connect = $db->connect();
$arr = array();
$res ='';
$arr1 = array();
$response = array();
$opt_val = '';
$opt_val1 = '';
date_default_timezone_set('Asia/Kolkata');
$curr_date = date('Y-m-d');
if(isset($_REQUEST['m']) && $_REQUEST['m'] == 'timeslot_data'){
	if(isset($_REQUEST['txt_date'])){
		$txt_date = $_REQUEST['txt_date'];
		$txt_start_date = date("Y-m-d", strtotime($txt_date));
		//echo $txt_start_date;
		$sql = "select t1.txt_morning_starttime, t1.txt_morning_endtime, t1.txt_evening_starttime, t1.txt_evening_endtime from tab_timeslot as t1 where t1.txt_start_date = '$txt_start_date'";
		$query_fetch = $db->sql_select_join($sql);
	
		$sql1 = "select t1.morning_time_slot, t1.evening_time_slot from tab_service_booking as t1 where t1.txt_start_date = '$txt_start_date'";
		$query_fetch_1 = $db->sql_select_join($sql1);
		//print_r($query_fetch_1);
		if (count($query_fetch) > 0) {
			for ($i = 0; $i < count($query_fetch); $i++) {
				$morning_slots = array();
				$evening_slots = array();			
				if(count($query_fetch_1) > 0){
					for($k = 0; $k < count($query_fetch_1); $k++){
						if($query_fetch_1[$k]['morning_time_slot'] != ''){
							$morning_slots[] = $query_fetch_1[$k]['morning_time_slot'];
						}
						if($query_fetch_1[$k]['evening_time_slot'] != ''){
							$evening_slots[] = $query_fetch_1[$k]['evening_time_slot'];
						}
					}
				}
				
				/*********************** morning Time ***********************/

				$txt_morning_starttime = $query_fetch[$i]['txt_morning_starttime'];
				$s_time = str_replace("AM", "", $txt_morning_starttime);
				$txt_morning_endtime = $query_fetch[$i]['txt_morning_endtime'];
				$e_time = str_replace("AM", "", $txt_morning_endtime);
				//echo $s_time;
				//echo $e_time;
				if (!empty($s_time) && !empty($e_time)) {
                ///
					$data_arr = array();
					$startTime = date('Y-m-d H:i:s', strtotime($txt_start_date . $s_time.' AM'));
					$endTime = date('Y-m-d H:i:s', strtotime($txt_start_date . $e_time.' AM'));
					
					$time_slot_arr_new = array();
					while(strtotime($startTime) <= strtotime($endTime)){
						$time_slot_arr_new[] = date('h:i A', strtotime($startTime));
						$startTime = date('Y-m-d H:i:s', strtotime('+10 minutes', strtotime($startTime)));
					}
					$data_arr = $time_slot_arr_new;
					if(!empty($data_arr)){
						foreach($data_arr as $key => $d_arr){
							if($txt_start_date == $curr_date){
								if(strtotime($txt_start_date.' '.$d_arr) >= time()){
									if(in_array($d_arr, $morning_slots)){
										$arr[$key] = $d_arr;
										$opt_val .= '<option disabled style="background-color:gray;color:black;">'.$arr[$key].'</option>';
									}
									else{
										$arr[$key]['time'] = $d_arr;
										$opt_val .= '<option>'.$arr[$key].'</option>';
									}
								}
							}
							else if(strtotime($txt_start_date) > strtotime($curr_date)){
								if(in_array($d_arr, $morning_slots)){
									$arr[$key] = $d_arr;
									$opt_val .= '<option disabled style="background-color:gray;color:black;">'.$arr[$key].'</option>';
								}
								else{
									$arr[$key] = $d_arr;
									$opt_val .= '<option>'.$arr[$key].'</option>';
								}
							}
						}
					} 
				}
				//print_r($arr);
				//echo $opt_val;
				/*********************** Evening Time ***********************/
				$txt_evening_starttime = $query_fetch[$i]['txt_evening_starttime'];
				$s_time_eve            = str_replace("PM", "", $txt_evening_starttime);
				$txt_evening_endtime   = $query_fetch[$i]['txt_evening_endtime'];
				$e_time_eve            = str_replace("PM", "", $txt_evening_endtime);
				if (!empty($s_time_eve) && !empty($e_time_eve)) {
					$data_arr  = array();
					$startTime = date('Y-m-d H:i:s', strtotime($txt_start_date . $s_time_eve.' PM'));
					$endTime = date('Y-m-d H:i:s', strtotime($txt_start_date . $e_time_eve.' PM'));				
					
					$time_slot_arr_new = array();
					while(strtotime($startTime) <= strtotime($endTime)){
						$time_slot_arr_new[] = date('h:i A', strtotime($startTime));
						$startTime = date('Y-m-d H:i:s', strtotime('+10 minutes', strtotime($startTime)));
					}
					$data_arr = $time_slot_arr_new;
					if(!empty($data_arr)){
						foreach($data_arr as $key => $d_arr){
							if($txt_start_date == $curr_date){
								if(strtotime($txt_start_date.' '.$d_arr) >= time()){
									if(in_array($d_arr, $evening_slots)){
										$arr1[$key] = $d_arr;
										$opt_val1 .= '<option disabled style="background-color:gray;color:black;">'.$arr1[$key].'</option>';
									}
									else{
										$arr1[$key] = $d_arr;
										$opt_val1 .= '<option>'.$arr1[$key].'</option>';
									}
								}
							}
							else if(strtotime($txt_start_date) > strtotime($curr_date)){
								if(in_array($d_arr, $evening_slots)){
									$arr1[$key] = $d_arr;
									$opt_val1 .= '<option disabled style="background-color:gray;color:black;">'.$arr1[$key].'</option>';
								}
								else{
									$arr1[$key]  = $d_arr;
									$opt_val1 .= '<option>'.$arr1[$key].'</option>';
								}
							}
						}
					}				
				}
			}
			//echo $opt_val;
			//echo $opt_val1;
			if(!empty($opt_val) && !empty($opt_val1)){
				$res = $opt_val . $opt_val1;
				$response['data'] = $res;
			    $response['msg'] = 'Success';
				
			}else if(!empty($opt_val1)){
				$res = $opt_val1;
				$response['data'] = $res;
			    $response['msg'] = 'Success';
			}
		}else{
			$morning_slots = array();
			$evening_slots = array();
			if(count($query_fetch_1) > 0){
				for($k = 0; $k < count($query_fetch_1); $k++){
					if($query_fetch_1[$k]['morning_time_slot'] != ''){
						$morning_slots[] = $query_fetch_1[$k]['morning_time_slot'];
					}
					if($query_fetch_1[$k]['evening_time_slot'] != ''){
						$evening_slots[] = $query_fetch_1[$k]['evening_time_slot'];
					}
				}
			}
		
			/*********************** Static Morning Time ***********************/
			/* 
			$s_time = '08:00';
			$e_time = '09:00';*/
			$res1 ='';
			$opt_val2='';
			$opt_val3='';
			$tbl_name = 'tab_fixtime';
			$where = '';
			$col = array();
			$order_by = "";
			//echo 'hii1';die;
			$query_fetch = $db->sql_select($tbl_name, $col, $where, $order_by);
			if(count($query_fetch) > 0 ){
				for($i=0; $i < count($query_fetch); $i++){
					$morning_schedule_time        = $query_fetch[$i]['ms_time'];
					$morning_endtime        	  = $query_fetch[$i]['me_time'];
					if($morning_schedule_time == '' && $morning_endtime == ''){
					
					}else{
						$ms_time1 = $query_fetch[$i]['ms_time'];
						$ms_time = str_replace("AM", "", $ms_time1);
						$me_time1 = $query_fetch[$i]['me_time'];
						$me_time = str_replace("AM", "", $me_time1);
					}
				}
				if (!empty($ms_time) && !empty($me_time)) {
					$data_arr = array();
					$startTime = date('Y-m-d H:i:s', strtotime($txt_start_date . $ms_time.' AM'));
					$endTime = date('Y-m-d H:i:s', strtotime($txt_start_date . $me_time.' AM'));
					 
					$time_slot_arr_new = array();
					while(strtotime($startTime) <= strtotime($endTime)){
						$time_slot_arr_new[] = date('h:i A', strtotime($startTime));
						$startTime = date('Y-m-d H:i:s', strtotime('+10 minutes', strtotime($startTime)));
					}
					$data_arr = $time_slot_arr_new;
					if(!empty($data_arr)){
						foreach($data_arr as $key => $d_arr){
							if($txt_start_date == $curr_date){
								if(strtotime($txt_start_date.' '.$d_arr) >= time()){
									if(in_array($d_arr, $morning_slots)){
										$arr[$key] = $d_arr;
										$opt_val2 .= '<option disabled style="background-color:gray;color: white;">'.$arr[$key].'</option>';
									}
									else{
										$arr[$key] = $d_arr;
										$opt_val2 .= '<option>'.$arr[$key].'</option>';
									}
								}
							}
							else if(strtotime($txt_start_date) > strtotime($curr_date)){
								if(in_array($d_arr, $morning_slots)){
									$arr[$key] = $d_arr;
									$opt_val2 .= '<option disabled style="background-color:gray;color: white;">'.$arr[$key].'</option>';
								}
								else{
									$arr[$key] = $d_arr;
									$opt_val2 .= '<option>'.$arr[$key].'</option>';
								}
							}
						}
					} 
				} 
			}
			//echo $opt_val2;
			/*********************** Static Evening Time ***********************/
			/* $s_time_eve = '07:00';
			$e_time_eve = '08:30';*/
			$opt_val3='';
			$query_fetch1 = $db->sql_select($tbl_name, $col, $where, $order_by);
			if(count($query_fetch1) > 0 ){
				for($l=0; $l < count($query_fetch1); $l++){
					$evening_schedule_time        = $query_fetch1[$l]['es_time'];
					$evening_endtime        	  = $query_fetch1[$l]['ee_time'];
					if($evening_schedule_time == '' && $evening_endtime == ''){
					
					}else{
						$es_time1 = $query_fetch1[$l]['es_time'];
						$es_time  = str_replace("PM", "", $es_time1);
						$ee_time1 = $query_fetch1[$l]['ee_time'];
						$ee_time  = str_replace("PM", "", $ee_time1);
					}
				}
				if (!empty($es_time) && !empty($ee_time)) {
					$data_arr  = array();
					$startTime = date('Y-m-d H:i:s', strtotime($txt_start_date . $es_time.' PM'));
					$endTime = date('Y-m-d H:i:s', strtotime($txt_start_date . $ee_time.' PM'));				
					
					$time_slot_arr_new = array();
					while(strtotime($startTime) <= strtotime($endTime)){
						$time_slot_arr_new[] = date('h:i A', strtotime($startTime));
						$startTime = date('Y-m-d H:i:s', strtotime('+10 minutes', strtotime($startTime)));
					}
					$data_arr = $time_slot_arr_new;
					if(!empty($data_arr)){
						foreach($data_arr as $key => $d_arr){
							if($txt_start_date == $curr_date){
								if(strtotime($txt_start_date.' '.$d_arr) >= time()){
									if(in_array($d_arr, $evening_slots)){
										$arr1[$key]= $d_arr;
										$opt_val3 .= '<option disabled style="background-color:gray;color: white;">'.$arr1[$key].'</option>';
									}
									else{
										$arr1[$key]= $d_arr;
										$opt_val3 .= '<option>'.$arr1[$key].'</option>';
									}
								}
							}
							else if(strtotime($txt_start_date) > strtotime($curr_date)){
								if(in_array($d_arr, $evening_slots)){
									$arr1[$key]= $d_arr;
									$opt_val3 .= '<option disabled style="background-color:gray;color: white;">'.$arr1[$key].'</option>';
								}
								else{
									$arr1[$key]= $d_arr;
									$opt_val3 .= '<option>'.$arr1[$key].'</option>';
								}
							}
						}
					}
				}
			}
			if(!empty($opt_val2) && !empty($opt_val3)){
					$res = $opt_val2 . $opt_val3;
					$response['data'] = $res;
					$response['msg'] = 'Success';
					
			}else if(!empty($opt_val3)){
				$res = $opt_val3;
				$response['data'] = $res;
				$response['msg'] = 'Success';
			}
		}
	}
}
header('Content-Type:application/json');
echo json_encode($response);
exit();
?>