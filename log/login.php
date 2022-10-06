<?php 
session_start();
include '../connections/connect.php';

if(isset($_POST['login'])){ 

	$email = $_POST['email'];
	$password = $_POST['password'];

	
			$compare = " SELECT * FROM `accounts` where email = '$email' and password = '$password' and user_type = 'client'  ";
	                $credentials = mysqli_query($con,$compare); 
	                $count= mysqli_num_rows($credentials);
	               //  $get_id =  mysqli_insert_id($con); 
	             if ($count>=1){
	            	echo 'match';
	                 while($row = mysqli_fetch_array($credentials)){
						$_SESSION['user_id'] = $row['user_id'];
						$_SESSION['user_name'] = $row['name'].' '.$row['lastname'];
						$_SESSION['user_isset']=1;
						$_SESSION['user_daddress'] = $row['d_address'];
						$userid = $row['user_id'];
						$ipadd = $row['ipaddress'];
						$_SESSION['user_ip'] = $ipadd;
	                 }



	                 		$getallcartitems = " select * from cart where user_id = '$ipadd'  ";
	                                 $gettingcart_items = mysqli_query($con,$getallcartitems); 
	                             
	                                  while($row = mysqli_fetch_array($gettingcart_items)){
	                 					

	                 					$prod_id = $row['prod_id'];
	                 					$qty = $row['quantity'];

	                 					

	                 							$checkcart = " select * from cart where user_id = '$userid' and prod_id = '$prod_id' ";
	                 					                $chckngcart = mysqli_query($con,$checkcart); 
	                 					                $countcart= mysqli_num_rows($chckngcart);
	                 					               //  $get_id =  mysqli_insert_id($con); 
	                 					             if ($countcart>=1){
	                 					            	
	                 					            	
	                 					                 while($gi = mysqli_fetch_array($chckngcart)){
	                 											$cartids = $gi['cart_id'];
	                 											$qtys = $gi['quantity'];
	                 											$prid = $gi['prod_id'];
	                 											$totalqty = $qtys + $qty;
	                 											$price = $gi['itemprice'];

	                 											$totalprice = $price * $totalqty;

	                 						$updatecart_toforwarditems = "UPDATE `cart` SET `quantity`='$totalqty' , `total` = '$totalprice' WHERE user_id = '$userid' and cart_id = '$cartids' ";
	                 					mysqli_query($con,$updatecart_toforwarditems);

	                 					
	                 					


	                 					                 }


	                 					               
	                 					          }else {
	                 					          	
	                 					$updatecart_toforwarditems = "UPDATE `cart` SET `user_id`='$userid' WHERE user_id = '$ipadd' and prod_id = '$prod_id' ";
	                 					mysqli_query($con,$updatecart_toforwarditems);
	                 					          }

	                 					

	                 					/*
										*/
	                                  }

	                                  	$getallwishlistitems = " SELECT * FROM `wishlist` where user_id = '$ipadd'    ";
	                                                  $gettingwishlist = mysqli_query($con,$getallwishlistitems); 
	                                                 
	                                              
	                                                   while($row = mysqli_fetch_array($gettingwishlist)){

	                                                   	$prod_id = $row['prod_id'];


	                                                   	$checkwl = " select * from wishlist where user_id = '$userid' and prod_id = '$prod_id' ";
	                 					                $chckngwl = mysqli_query($con,$checkwl); 
	                 					                $countcart= mysqli_num_rows($chckngwl);
	                 					               //  $get_id =  mysqli_insert_id($con); 
	                 					             if ($countcart>=1){
	                 					            	
	                 					          

	                 					               
	                 					          }else {
	                 					          	$updatewislist_toforwarditems = "UPDATE `wishlist` SET `user_id`='$userid' WHERE user_id = '$ipadd' and prod_id = '$prod_id' ";
	                                  					mysqli_query($con,$updatewislist_toforwarditems);
	                 					
	                 					          }

	                                  					
	                                                   

	                                                   }

	                                                  
	                                            
	                           



	          }else {
	          

	          			$checkadmin = " SELECT * FROM `accounts` where email = '$email' and password = '$password' and user_type = 'admin'   ";
	          	                $ckadmin = mysqli_query($con,$checkadmin); 
	          	                $cad = mysqli_num_rows($ckadmin);
	          	               
	          	             if ($cad>=1){
	          	            
	          	                 while($row = mysqli_fetch_array($ckadmin)){
	          	                 	$tp = $row['user_type'];
	          							  				
	          	                 	$_SESSION['admin_id'] = $row['user_id'];
	          						$_SESSION['admin_name'] = $row['name'];
	          						$_SESSION['admin_email'] = $row['email'];
	          						

	          	                 }

	          	               echo 'adminmatch';
	          	                 


	          	               
	          	          }else {

	          	          			$checkadmins = " SELECT * FROM `accounts` where email = '$email' and password = '$password' and user_type = 'courier'   ";
	          	                $ckadmins = mysqli_query($con,$checkadmins); 
	          	                $cads = mysqli_num_rows($ckadmins);	

	          	                if($cads >=1 ){

	          	                	   while($row = mysqli_fetch_array($ckadmins)){
	          	                 	$tp = $row['user_type'];
	          							  				
	          	            		$_SESSION['cour_id'] = $row['user_id'];
	          						$_SESSION['cour_name'] = $row['name'];
	          						$_SESSION['cour_email'] = $row['email'];
	          							
	          						

	          	                 }

	          	                 echo 'couriermatch';

	          	                }else {
	          	                echo 'notmatch';	
	          	                }


	          	          		
	          	          }
	          }




	
}


 ?>