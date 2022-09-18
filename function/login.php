<?php
	include "db.php";
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$record=mysqli_query($con,"SELECT * FROM users WHERE username='$username'");
	$count = mysqli_num_rows($record);
	if($count == 0){
		echo "	<script type='text/javascript'>
					alert('No Record of Given Username');
					window.location='/manna-system/index.php';
				</script>";
	}	
	else{
		$sql=mysqli_query($con,"SELECT * FROM users WHERE username='$username' and password='$password'");
		$count = mysqli_num_rows($sql);
		if($count == 0){
			echo "	<script type='text/javascript'>
						alert('Invalid Password!');
						window.location='/manna-system/index.php';
					</script>";
		}
		else{
			$user = mysqli_fetch_array($sql);
			$userType = $user['userType'];
			
			$_SESSION["user_id"] = $user['user_id'];
	
			if ($userType =='admin'){
				header('Location: ../pages/admin/dashboard.php');
			}
			else if ($userType =='customer'){
			   header("Location: ../pages/user/home.php");
			}
		
		}
	}
	//echo "Error: Could not be able to execute $sql. " .mysqli_error($link);
	mysqli_close($con);
?>