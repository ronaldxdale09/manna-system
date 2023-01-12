

<?php 
session_start();
include '../../connections/connect.php';
if(isset($_POST['savenew'])){ 
	$name = $_POST['name'];
	$price = $_POST['price'];

	$cost = $_POST['cost'];
	$barcode = $_POST['barcode'];
	$desc = $_POST['desc'];
	date_default_timezone_set('Asia/Manila'); 
	$datenow = date('Y-m-d H:i:s');
	$cat = $_POST['cat'];


	
	$ingredients = $_POST['ingredients'];

    $list_ingredients="";
    foreach($ingredients as $chk1)  
    {  
       $list_ingredients .= $chk1.",";  
    } 
	
	
	$sql_check = "SELECT * from product where  barcode='$barcode'";
	$res_check = mysqli_query($con,$sql_check);
	$count = mysqli_num_rows($res_check);

	if ($count ==0 ){
	
	$insertnew_product = "INSERT INTO `product`(`name`, `description`, `cat_id`, `datecreated`, `ingredients`,`barcode`) 
	VALUES ('$name','$desc','$cat','$datenow','$list_ingredients','$barcode')";
	mysqli_query($con,$insertnew_product);

	$getp_id =  mysqli_insert_id($con); 



			//Make the imagename array set at form. look likes this name="imagename[]"
		foreach($_FILES['image']['name'] as $key=>$val){
	                  $image_name = $_FILES['image']['name'][$key];
	                   $tmp_name   = $_FILES['image']['tmp_name'][$key];
	                $size       = $_FILES['image']['size'][$key];
	                 $type       = $_FILES['image']['type'][$key];
	                 $error      = $_FILES['image']['error'][$key];
	                                                                                                                                    
	             
	                                                                                                                                    
	           $fileName =basename($_FILES['image']['name'][$key]);
	                 $rand = rand(100,1000);

	               
	                // File upload path
	            $uploads_dir = '../../img/products';
	         move_uploaded_file($tmp_name , $uploads_dir .'/'.$fileName);
	            //  compressImage($tmp_name,$uploads_dir .'/'.$fileName,69);
	             	
	         	$insertphotos = "INSERT INTO `photo`(`prod_id`, `photo`) VALUES ('$getp_id','$fileName')";
	         	mysqli_query($con,$insertphotos);
			 			                
	                                                                                                                          
	         
	            }
	
	
             
		
					header("Location: ../products.php");
					$_SESSION['new_brand']= "successful";
                
                exit();

			}
			else {
			
				header("Location: ../products.php");
				$_SESSION['existing']= "successful";
			}
		   
						
						exit();
				
}
 ?>