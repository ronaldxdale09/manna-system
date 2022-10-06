<?php 
include '../connections/connect.php';


if(isset($_POST['category'])){ 

	?>
	 <div class="table-responsive">
	 
	    <table class="table table-sm" id="categorytable">
                  <thead>
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Category</th>
                      <th scope="col">Description</th>
                      <th scope="col">Price</th>
                      <th scope="col">Date-Created</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody >
	<?php

			$gettabledata = " SELECT * FROM `product` ";
	                $gettingcategories = mysqli_query($con,$gettabledata); 
	                $cat_count= mysqli_num_rows($gettingcategories);
	               //  $get_id =  mysqli_insert_id($con); 
	             if ($cat_count>=1){
	            
	                 while($row = mysqli_fetch_array($gettingcategories)){
	                 	$catid = $row['cat_id'];
					?>
	   				<tr>
                      <td><a href="products.php?viewproducts&productname=<?php echo $row['name'] ?>&token=<?php echo $row['prod_id'] ?>&_view"   style="text-decoration: none"><i class="far fa-images"></i></a> <span style="font-weight: bolder;"><?php echo $row['name'] ?></span></td>
                      <td>
                      	<?php 
                      			$selectcategory = " select * from category where cat_id = '$catid'  ";
                      	                $selectingcategory = mysqli_query($con,$selectcategory); 
                      	             
                      	            
                      	                 while($getcat = mysqli_fetch_array($selectingcategory)){
                      						echo $getcat['category_name'];
                      	                 }
                      	          
                      	 ?>
                      </td>
                      <td>
                      	<?php echo $row['description'] ?>
                      </td>
                      <td>
                      	₱<?php echo $row['price'] ?>
                      </td>
                      <td>
                      	<?php 
                      	echo date('M j,Y @ h:i a',strtotime($row['datecreated'])) ;
                      	 ?>

                      </td>
                      <td>
                      	<div class="btn-group" role="group" aria-label="Basic example">
					  <button type="button" data-bs-toggle="modal" data-bs-target="#editmodal" data-backdrop="static" data-keyboard="false" class="btn btn-light text-primary editmodal" data-id="<?php echo $row['prod_id'] ?>" data-name="<?php echo $row['name'] ?>" data-price ="<?php echo $row['price'] ?>" data-desc ="<?php echo $row['description'] ?>" data-cat = "<?php echo $row['cat_id'] ?>"  style="font-size: 12px"><i class="fas fa-edit"></i></button>
					  <button type="button" class="btn btn-light text-danger deletecat" data-id="<?php echo $row['prod_id'] ?>" style="font-size: 12px"><i class="fas fa-trash"></i></button>
					 
					</div>

                      </td>
                    </tr>
	<?php
	                 }
	          }else {
	          	//echo 'none';
	          	?>
	         
	          	<?php
	          }

	          ?>
	          </tbody>
                </table>
                </div> 

              
                 
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       <script type="text/javascript" src="../js/datatable/datatables.js"></script>
     <link rel="stylesheet" type="text/css" href="../js/datatable/datatables.css">
     <script type="text/javascript">
     	
     	$(document).ready(function() {
     	      	   $('#categorytable').DataTable();

     	      	  


     	      	   $('.editmodal').click(function() { 
     	      	   	var id = $(this).data('id');
     	      	   	var name = $(this).data('name');
     	      	   	var catid = $(this).data('cat');
     	      	   	var desc = $(this).data('desc');
     	      	   	var price = $(this).data('price');

     	      	   	$('#ename').val(name);
     	      	   	$('#eprice').val(price);
     	      	   	$('#edesc').val(desc);
     	      	   	$('#eid').val(id);
     	      	   	$('#categoryid').val(catid);
     	      	   	

     	      	   
     	      	   })
     	      	   $('.deletecat').click(function() { 
					var id = $(this).data('id');
					
						
						Swal.fire({
							  title: 'Are you sure?',
							  text: "You won't be able to revert this!",
							  icon: 'warning',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Yes, delete it!'
							}).then((result) => {
							  if (result.isConfirmed) {
							  	 $.ajax({
					           url : "action_product.php",
					            method: "POST",
					             data  : {deletecat:1,id:id},
					             success : function(data){

								 $.notify("Deleted Successfully!", "success");
								  table_category();
					             }
					          }) 
							  }
							})
					
					
					    
						  
						  })

     	      	    
            function table_category(){
             
              
                 $.ajax({
                         url : "action_product.php",
                          method: "POST",
                           data  : {category:1},
                           success : function(data){
                      $('#table_category').html(data);
                           }
                        })
                   
                  
            }

     	      });      
           	
     </script>
	          <?php

	         


	
	
}
////////////////////////////Check if exist//////////////////////

if(isset($_POST['checkifexistcat'])){ 
	$val = $_POST['val'];

					$checkcategory = " select * from category where category_name = '$val'  ";
			                $chckng = mysqli_query($con,$checkcategory); 
			                $count= mysqli_num_rows($chckng);
			               //  $get_id =  mysqli_insert_id($con); 
			             if ($count>=1){
			            	echo 'exist';
			                
			          }else {
			          		echo 'none';
			          }
	
}



////////////////////////////// SAVE EDIT DELETE ///////////////////////////////////////////////
if(isset($_POST['savenew'])){ 
	$name = $_POST['name'];
	$price = $_POST['price'];
	$desc = $_POST['desc'];
	date_default_timezone_set('Asia/Manila'); 
	$datenow = date('Y-m-d H:i:s');
	$cat = $_POST['cat'];


	
	$insertnew_product = "INSERT INTO `product`(`name`, `description`, `cat_id`, `price`, `datecreated`) VALUES ('$name','$desc','$cat','$price','$datenow')";
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
	            $uploads_dir = '../img/products';
	         move_uploaded_file($tmp_name , $uploads_dir .'/'.$fileName);
	             
	             	
	         	$insertphotos = "INSERT INTO `photo`(`prod_id`, `photo`) VALUES ('$getp_id','$fileName')";
	         	mysqli_query($con,$insertphotos);
			 			                
	                                                                                                                          
	         
	            }
	
	
	            

	//insertproductfirst

	
}

if(isset($_POST['deletecat'])){ 
	$id = $_POST['id'];

			$unlinkimagefirst = " select * from photo where prod_id = '$id'  ";
	                $allimages = mysqli_query($con,$unlinkimagefirst); 
	            
	            
	                 while($row = mysqli_fetch_array($allimages)){
						$src = '../img/products/'.$row['photo'];

						unlink($src);
	                 }
	          
	$delete_category = "DELETE FROM `product` WHERE prod_id = '$id' ";
	mysqli_query($con,$delete_category);


	
}

if(isset($_POST['editcategory'])){ 

	$ename = $_POST['ename'];
	$ecat = $_POST['ecat'];
	$eprice = $_POST['eprice'];
	$edesc = $_POST['edesc'];

	$eid = $_POST['eid'];




	
	$editcategory = "UPDATE `product` SET `name`='$ename',`description`='$edesc',`cat_id`='$ecat',`price`='$eprice' WHERE prod_id = '$eid' ";
	mysqli_query($con,$editcategory); 
	
}
if(isset($_POST['updatephoto'])){ 

	$photoid = $_POST['photoid'];

			$unlinkimagefirst = " select * from photo where p_id = '$photoid'  ";
	                $getimage = mysqli_query($con,$unlinkimagefirst); 
	              
	                 while($row = mysqli_fetch_array($getimage)){
							$src = '../img/products/'.$row['photo'];
							$prodid = $row['prod_id'];
	                 }
	                 unlink($src);
	          

			//Make the imagename array set at form. look likes this name="imagename[]"
	
	                  $image_name = $_FILES['imagee']['name'];
	                   $tmp_name   = $_FILES['imagee']['tmp_name'];
	                $size       = $_FILES['imagee']['size'];
	                 $type       = $_FILES['imagee']['type'];
	                 $error      = $_FILES['imagee']['error'];
	                                                                                                                                    
	             
	                                                                                                                                    
	           $fileName =basename($_FILES['imagee']['name']);

	           //echo $fileName;
	                  $rand = rand(100,1000);                                                                                                                   
	            $pname = $rand.'Photo'.'_'.$fileName;
	                // File upload path
	            $uploads_dir = '../img/products';
	         move_uploaded_file($tmp_name , $uploads_dir .'/'.$pname);
	             
	             	
	         	$sql = " UPDATE `photo` SET `photo`='$pname' WHERE p_id = '$photoid' ";
			 	  $result = mysqli_query($con,$sql); 
			 			                
	                                                                                                                          
	         
	            
	
	
	            
	
}

if(isset($_POST['addphotos'])){ 

	$prod = $_POST['prod'];


			//Make the imagename array set at form. look likes this name="imagename[]"
		foreach($_FILES['image']['name'] as $key=>$val){
	                  $image_name = $_FILES['image']['name'][$key];
	                   $tmp_name   = $_FILES['image']['tmp_name'][$key];
	                $size       = $_FILES['image']['size'][$key];
	                 $type       = $_FILES['image']['type'][$key];
	                 $error      = $_FILES['image']['error'][$key];
	                                                                                                                                    
	             
	                                                                                                                                    
	           $fileName =basename($_FILES['image']['name'][$key]);
	                 $rand = rand(100,1000);

	                                                                                                                                  
	            $pname = $rand.'Photo'.'_'.$fileName;
	                // File upload path
	            $uploads_dir = '../img/products';
	         move_uploaded_file($tmp_name , $uploads_dir .'/'.$pname);
	             
	               	
	         	$sql = " INSERT INTO `photo`( `prod_id`, `photo`) VALUES ('$prod','$pname')";
			 			                $result = mysqli_query($con,$sql); 
			 			                
	                                                                                                                          
	         
	            }
	
	
	            
	
}

 ?>