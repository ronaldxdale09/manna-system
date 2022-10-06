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

$cname = $_POST['cname'];
$cnumber = $_POST['cnumber'];
$cvv = $_POST['cvv'];
date_default_timezone_set('Asia/Manila'); 
	$datenow = date('Y-m-d H:i:s');
	$updatetemp = "UPDATE `tempuser` SET `cardname`='$cname',`cardnumber`='$cnumber',`cvv`='$cvv' WHERE ipaddress = '$tempusers' ";
	


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
                    $cardname = $row['cardname'];
                    $cardnum = $row['cardnumber'];
                    $cvv = $row['cvv'];

                    $savecustomer = "INSERT INTO `accounts`(`name`, `lastname`, `email`, `user_type`,`date_registered`, `password`,`birthdate`, `address`, `d_address`, `cardname`, `cardnumber`, `cvv`,`ipaddress`)
                     VALUES ('$fn','$ln','$email','client','$datenow','$pass','$bd','$addr','$deliv','$cardname','$cardnum','$cvv','$tempusers')";
                    mysqli_query($con,$savecustomer);

			                 }
			          



	}


	
}


		
 ?>

