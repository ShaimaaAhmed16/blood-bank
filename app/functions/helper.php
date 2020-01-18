<?php

    function responseJson($status,$message,$data=null){
    $response =[
        'status'=>$status,
        'message'=>$message,
        'data'=>$data
    ];
    return response()->json($response);
}

//send sms
function smsMisr($to ,$message){
    $url= 'http://smsmisr.com/api/webapi/?';
    $push_payload =array(
        "username" => "*****",
        "password" => "*****",
        "language" => "2",
        "sender" => "senderName",
        "mobile" => '2'.$to ,
        "message" => $message,
    );
    $rest =curl_init();
    curl_setopt($rest,CURLOPT_URL,$url.http_build_query($push_payload));
    curl_setopt($rest,CURLOPT_URL,1);
    curl_setopt($rest,CURLOPT_POSTFIELDS,$push_payload);
    curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,true);
    curl_setopt($rest,CURLOPT_HTTPHEADER,array(
        "Content_Type" =>"application/x-www-form-urlencoded"
    ));
    curl_setopt($rest,CURLOPT_RETURNTRANSFER,1);
    $response =curl_exec($rest);
    curl_close($rest);
    return $response;
}

//////////////////////////////////////////////////////////////////////
///
function notifyByFirebase($title,$body,$tokens,$data = [])        // parameter 5 =>>>> $type
{
    $registrationIDs = $tokens;
    $fcmMsg = array(
        'body' => $body,
        'title' => $title,
        'sound' => "default",
        'color' => "#203E78"
    );
    $fcmFields = array(
        'registration_ids' => $registrationIDs,
        'priority' => 'high',
        'notification' => $fcmMsg,
        'data' => $data
    );
    $headers = array(
        'Authorization: key='.env('FIREBASE_API_ACCESS_KEY'),
        'Content-Type: application/json'
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmFields));
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
///
//////////////////////////////////////////////////////////////////////

