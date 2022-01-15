<?php 

if(isset($_POST['text_local'])){

    $sender = "EMS";
  $numbers = $_POST['mobile'];
  $message = $_POST['message'];
  $username = "geekmaps26@gmail.com";
  $password = "Austin_maps7";
  $message = urlencode($message);
  $hash = 'feC8qNUj8tg-WMCtJbX98VbbxP5ka65XzlP9Um3HqO'; 
  $test = "1";
   $data = "username=".$username."&password=".$password."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
   $ch = curl_init('http://api.textlocal.in/send/?');
   curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch); 
    curl_close($ch);

    if(!$result){
        echo "message not sent";
    }else{
        echo $result;
    }
  
      
}
require 'vendor/autoload.php';
if(isset($_POST['twilio'])){


    $numbers = $_POST['mobile'];
    $message = $_POST['message'];
    $sid = "AC89854009aba273cdb4e43e5f7b35d9af";
    $token = "a1faa8bd285fa4f6d7c5341d45f1f248";
    $client = new Twilio\Rest\Client($sid, $token);
    $message = $client->messages->create(
        $_POST['mobile'], array(
            'from' => '9273127910',
            'body' => $_POST['message']
        )
        );
        print $message->sid;

}
if(isset($_POST['sms_gateway'])){
    $phone = $_POST['mobile'];
    $messages = $_POST['message'];
    $config = configuration::getDefaultConfiguration();
    $config->setApiKey('Authorization','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU3MDQyODAyOCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjc0MTk2LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.2UX6HcFbFuoq9IQyKYOqnhKmsp0Y7BoH6_PK5jdY_E8');
     $apiClient = new ApiClient($config);
     $messageClient = new Message($apiClient);

     $sendMessageRequest1 = new SendMessageRequest([
         'phoneNumber' => '09273127910',
         'message' => $messages,
         'deviceId' =>113581
     ]);
     $sendMessages = $messageClient->sendMessages([
         $sendMessageRequest1,
     ]);

}
?>