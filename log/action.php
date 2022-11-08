<?php 
session_start();
include '../connections/connect.php';
$tempusers = $_SESSION['user_id'];

if(isset($_POST['reg_step1'])){

$ln = $_POST['ln']; 
$fn = $_POST['fn'];
$bd = $_POST['bd'];
$addr = $_POST['addr'];
$daddr = $_POST['daddr'];

echo $tempusers;

	$updatetemp = "UPDATE `tempuser` SET `lastname`='$ln',`firstname`='$fn',`birthdate`='$bd',`address`='$addr',`deliveryaddr`='$daddr' WHERE ipaddress = '$tempusers' ";
	mysqli_query($con,$updatetemp);


	
}

if(isset($_POST['reg_step2'])){

$em = $_POST['em'];
$pass = $_POST['pass'];

	$updatetemp = "UPDATE `tempuser` SET `email`='$em',`password`='$pass' WHERE ipaddress = '$tempusers' ";
	mysqli_query($con,$updatetemp);


	
}

if(isset($_POST['reg_step3'])){

$phone = $_POST['phone_number'];

date_default_timezone_set('Asia/Manila'); 
	$datenow = date('Y-m-d H:i:s');
	$updatetemp = "UPDATE `tempuser` SET `mobile_number`='$phone' WHERE ipaddress = '$tempusers' ";
	


	if(mysqli_query($con,$updatetemp)){
		//get the tempdata and save to accounts
					$selecttemp = " select * from tempuser where  ipaddress = '$tempusers' ";
			                $getthetemp_data = mysqli_query($con,$selecttemp); 
			             
			                 while($row = mysqli_fetch_array($getthetemp_data)){
					$ln = $row['lastname'];
                    $fn = $row['firstname'];
                    $bd = $row['birthdate'];
                    $addr = $row['address'];
                    $deliv = $row['deliveryaddr'];
                    $email = $row['email'];
                    $pass = $row['password'];
                    $phone = $row['mobile_number'];

					$SixDigitRandomNumber = mt_rand(100000,999999);
					echo $SixDigitRandomNumber;
                  

                    $savecustomer = "INSERT INTO `accounts`(`name`, `lastname`, `email`, `user_type`,`date_registered`, `password`,`birthdate`, `address`, `d_address`, `mobile_number`,`ipaddress`)
                     VALUES ('$fn','$ln','$email','client','$datenow','$pass','$bd','$addr','$deliv','$phone','$tempusers')";
                    mysqli_query($con,$savecustomer);
					$user_id = $con->insert_id;

					$send_otp = "INSERT INTO `otp-sms`(`user_id`, `mobile_number`,`otp`)
					VALUES ('$user_id','$phone','$SixDigitRandomNumber')";
				   mysqli_query($con,$send_otp);

				   sendOtp($phone,$SixDigitRandomNumber);			
				   $_SESSION['reg_phone'] = $phone;
								
			                 }
			          



	}


	
}



// include('connections/connect.php');
// Required if your environment does not handle autoloading
require '../vendor/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

function sendOtp($recipient,$code) {
	// Your Account SID and Auth Token from twilio.com/console
	$sid = 'AC9816983c732135ce8c02e16db932ffe2';
	$token = '3e0e2731353e3edf40092bb82bce4eb2';
	$client = new Client($sid, $token);

	// Use the client to do fun stuff like send text messages!
	$messege = $client->messages->create(
		// the number you'd like to send the message to
		$recipient,
		[
			// A Twilio phone number you purchased at twilio.com/console
			'from' => '+19789938350',
			// the body of the text message you'd like to send
			'body' => 'Your Mannafest verification code is: '.$code
		]
	);

	if ($messege){
		echo 'message sent';
	}
	else {
		echo 'message not sent';
	}
}
?>