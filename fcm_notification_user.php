<?php
function notifyAndroid($registrationIDs , $notification, $data) {    
	$apiKey = 'AAAAj9AzqJs:APA91bF198IeLKrdBsVgZI09qkhbq6VGXTsQKOKliWd6nMybpvJ_joeUmoR30mQ0AJVDEX_pfNM7_YmK-dQ40wydSmNIYHSYkOrfAQTDKRckMRpg0UxmYNlnq5Bw2SHdgYizqCjP0kF6';
	
    $url = 'https://fcm.googleapis.com/fcm/send';	
	$fields = array(
				'to'		=> $registrationIDs,
				'notification'	=> $notification,
				'data'	=> $data
			);	
    $headers = array(
        'Authorization: key=' . $apiKey,
        'Content-Type: application/json'
    );
    $ch = curl_init();    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);      
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'FCM error: ' . curl_error($ch);
    }
    curl_close($ch);      
    //echo $result;
}