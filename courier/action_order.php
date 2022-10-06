<?php 
session_start();
include '../connections/connect.php';

	if(isset($_POST['category'])){ 

		?>
		 <div class="table-responsive">
		 
		   <table class="table table-sm" id="categorytable" >
                  <thead>
                    <tr>
                      <th scope="col">Order_No</th>
                       <th scope="col">Date</th>
                      
                        <th scope="col">Product</th>
                         <th scope="col">Price</th>
                         <th scope="col">Quantity</th>
                          <th scope="col">Total</th>
                           <th scope="col">action</th>
                     
                    </tr>
                  </thead>
                  <tbody >
	<?php

			$gettabledata = " SELECT * FROM `transaction` where status != 'completed' and paymentmethod != 'reserve' ";
	                $gettingcategories = mysqli_query($con,$gettabledata); 
	                $cat_count= mysqli_num_rows($gettingcategories);
	               //  $get_id =  mysqli_insert_id($con); 
	             if ($cat_count>=1){
	            
	                 while($row = mysqli_fetch_array($gettingcategories)){
	                 		$userid = $row['user_id'];
	                 	$tid = $row['tid'];
	                 		$stat = $row['status'];
	                 		$pm = $row['paymentmethod'];
	                 	
	                 		$da = $row['datecreated'];

	                 	
 						if($pm == 'reserve') {
	                 			$pmorder = 'Reserved Orders';
	                 		}else if($pm == 'deliver'){
	                 			$pmorder = 'For Delivery Orders';
	                 		}else if ($pm == 'cod'){
	                 			$pmorder = 'For Cash on Delivery Orders';
	                 		}


								?>
								<tr class="table-primary">
										<td colspan="7"><h6 style="font-weight:bolder;letter-spacing:2px;text-align: center;"><?php echo $pmorder.' ( BNC_'.$tid.' )' ?> <br>
												<?php 

	   								$getusername = " select * from accounts where user_id = '$userid'  ";
	   						                $guname = mysqli_query($con,$getusername); 
	   						           
	   						                 while($uname = mysqli_fetch_array($guname)){
	   										echo 'Name : '.$uname['name'].' '.$uname['lastname'];
	   						                 }
	   						          

	   						 ?>
										</h6></td>
										<td>
											
							<?php 
							

							if($pm == 'reserve') {

								if($stat == 'pending'){
									?>
									<button class="btn btn-light text-primary confirm" data-od="<?php echo $tid ?>" style="font-size: 14px;font-weight: bolder;">Confirm</button>
									<?php
								}else if ($stat == 'confirmed') {
									?>
									<button class="btn btn-light text-success mc" data-od="<?php echo $tid ?>" style="font-size: 14px;font-weight: bolder;">Mark as Complete</button>
									<?php
								}


							}else if ($pm == 'deliver' || $pm == 'cod'){

								if($stat == 'pending'){
									?>
								<span class="text-danger">PENDING ORDER <br><span style="font-size:12px">Waiting for Confirmation</span></span>
									<?php
								}else if ($stat == 'ready'){

									?>
									<button class="btn btn-light text-info deliver" data-od="<?php echo $tid ?>" style="font-size: 14px;font-weight: bolder;">Deliver</button>
									<?php
								}else if ($stat == 'otw'){
										date_default_timezone_set('Asia/Manila');
										$datenow = date('Y-m-d');
									

									if($da < $datenow ){
										?>
									<button class="btn btn-light text-success mc" data-od="<?php echo $tid ?>" style="font-size: 14px;font-weight: bolder;">Mark as Complete</button>
									<?php
									
									}else {
										?>
									<h6 class="text-success" style="font-size: 13px;font-weight: bolder;">Waiting ...</h6>
									<?php
									}
								}else if ($stat == 'delivered'){

								?>
									<h6 class="text-success" style="font-size: 13px;font-weight: bolder;">Order Delivered</h6>
								
							
			

<button type="button" class="btn btn-light text-primary" style="font-size:12px"  data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $tid ?>">
  Upload Proof of Delivery
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $tid ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Proof of Delivery For Order BNC_<?php echo $tid  ?></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form enctype="multipart/form-data" method="post" action="action_order.php">
      <div class="modal-body">
      	<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQyHlhRBUevbh8DcWe7o5epTHj3PS0o7vsV1A&usqp=CAU" id="img<?php echo $tid  ?>" style="width:100%;height:400px;">
      	<input type="file" name="image" id="<?php echo $tid ?>" class="form-control mt-2" accept="image/*" required>
      </div>
      <input type="hidden" name="tid" value="<?php echo $tid ?>">
      <div class="modal-footer">
       
        <button type="submit" name="uploadproof" class="btn btn-light text-primary" style="font-size:13px">Mark as Complete</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
	  $(document).ready(function() {
	  	$('#<?php echo $tid?>').change(function(){

	  			  	   if(this.files[0].type != "image/jpeg" &&  this.files[0].type != "image/png" && this.files[0].type != "image/gif"){
                       alert("Sorry invalid file type. Please upload an image");
                   }
                   else{
                   $('#img<?php echo $tid?>').attr('src',URL.createObjectURL(this.files[0]));
                   }
	  	})
	
	  });
</script>


									<?php
							}


							}

							 ?>

										</td>
								</tr>
	   				
	   					<?php 
	   						$gettrans_records = "select * from trans_record where transaction_id = '$tid'  ";
	   								 $gettingtrans = mysqli_query($con,$gettrans_records); 
	   								
	   							 while($gtrans = mysqli_fetch_array($gettingtrans)){
	   							 	$prid = $gtrans['prod_id'];

	   													

	   							 	?>

	   							 	<tr>
	   					<td>BNC_<?php echo $row['tid'] ?></td>
	   					<td><?php echo date('@H:i:s F j,Y',strtotime($row['datecreated'])) ?></td>
	   				

	   							 		<td>	


	   							
	   							<?php 

	   							
	   							 

	   								$getproductname = " select * from product where prod_id = '$prid'  ";
	   						                $gpname = mysqli_query($con,$getproductname); 
	   						           
	   						                 while($pname = mysqli_fetch_array($gpname)){
	   											

	   											?>

	   											<a href="?viewproducts&productname=<?php echo $pname['name'] ?>&token=<?php echo $pname['prod_id'] ?>&_view">
	   												<?php echo $pname['name']; ?>
	   											</a>
	   											<?php
	   						                 }
	   						          

	   						 ?>

	   					</td>
	   					<td>₱ <?php echo $gtrans['price'] ?></td>
	   					<td><?php echo $gtrans['quantity'] ?></td>
	   					<td>₱ <?php echo $gtrans['total'] ?></td>

	   							 	<?php



	   								 }
	   							

	   					 ?>
	   				
	   					<td>
	   						
	   				
						
							
				

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
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.0.1/rr-1.2.8/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.0.1/rr-1.2.8/datatables.min.js"></script>

    <script type="text/javascript">
    	   let table = new DataTable('#categorytable', {
      
     "search": {
    "caseInsensitive": false
  }

});

    </script>
     <script type="text/javascript">
     	  $(document).ready(function() {



     	  	$('.confirm').click(function(){
     	  			  		$('.confirm').click(function() { 
            			//
            			var od = $(this).data('od');

            		

            			

            			   Swal.fire({
										  title: 'Are you sure?',
										  text: "",
										  icon: 'question',
										  showCancelButton: true,
										  confirmButtonColor: '#81c3dd',
										  cancelButtonColor: '#dd9b81',
										  confirmButtonText: 'Yes, confirm!'
										}).then((result) => {
										  if (result.isConfirmed) {
										  
            			   $.ajax({
            			           url : "action_order.php",
            			            method: "POST",
            			             data  : {confirm:1,od:od},
            			             success : function(data){
            							table_category();

            							Swal.fire(
											  'Confirmed!',
											  'Order confirmed successfully!',
											  'success'
											)
            			             }
            			          })
										  }
										})
            			       
            			    



            	})
     	  	})

     	  		$('.confirmd').click(function() { 
            			//
            			var od = $(this).data('od');



            			

            			   Swal.fire({
										  title: 'Are you sure?',
										  text: "",
										  icon: 'question',
										  showCancelButton: true,
										  confirmButtonColor: '#81c3dd',
										  cancelButtonColor: '#dd9b81',
										  confirmButtonText: 'Yes, confirm!'
										}).then((result) => {
										  if (result.isConfirmed) {
										  
            			   $.ajax({
            			           url : "action_order.php",
            			            method: "POST",
            			             data  : {confirmd:1,od:od},
            			             success : function(data){
            							table_category();

            							Swal.fire(
											  'Confirmed!',
											  'Order confirmed successfully!',
											  'success'
											)
            			             }
            			          })
										  }
										})
            			       
            			    



            	})

     	  			

			      	   function table_category(){
             
              
                 $.ajax({
                         url : "action_order.php",
                          method: "POST",
                           data  : {category:1},
                           success : function(data){
                      $('#table_category').html(data);
                           }
                        })
                   
                  
            }

            			$('.deliver').click(function() { 
            			//
            			var od = $(this).data('od');


            			   Swal.fire({
										  title: 'Are you sure?',
										  text: "",
										  icon: 'question',
										  showCancelButton: true,
										  confirmButtonColor: '#81c3dd',
										  cancelButtonColor: '#dd9b81',
										  confirmButtonText: 'Yes, its for delivery!'
										}).then((result) => {
										  if (result.isConfirmed) {
										  
            			   $.ajax({
            			           url : "action_order.php",
            			            method: "POST",
            			             data  : {transport:1,od:od},
            			             success : function(data){
            							table_category();

            							Swal.fire(
											  'Item for transport!',
											  'Order marked on transport',
											  'success'
											)
            			             }
            			          })
										  }
										})
            			       
            			    



            	})


        

            	$('.mc').click(function() { 
            			var od = $(this).data('od');

            		
            		  Swal.fire({
										  title: 'Are you sure?',
										  text: "",
										  icon: 'question',
										  showCancelButton: true,
										  confirmButtonColor: '#81c3dd',
										  cancelButtonColor: '#dd9b81',
										  confirmButtonText: 'Yes, Mark as complete!'
										}).then((result) => {
										  if (result.isConfirmed) {
										  
            			   $.ajax({
            			           url : "action_order.php",
            			            method: "POST",
            			             data  : {mc:1,od:od},
            			             success : function(data){
            							table_category();

            							Swal.fire(
											  'Marked Completed!',
											  'Order was completed successfully!',
											  'success'
											)
            			             }
            			          })
										  }
										})
            			       
            	})

     	
     	  });
     </script>

		
		<?php
	
}

if(isset($_POST['completedorder'])){ 


	?>
	<h5 style="font-weight: bolder" class="text-success">Completed Orders</h5>
		 <div class="table-responsive">
		 
		   <table class="table table-sm" id="categorytable" >
                  <thead>
                    <tr>
                      <th scope="col">Order_No</th>
                       <th scope="col">Date</th>
                      
                        <th scope="col">Product</th>
                         <th scope="col">Price</th>
                         <th scope="col">Quantity</th>
                          <th scope="col">Total</th>
                           <th scope="col"></th>
                     
                    </tr>
                  </thead>
                  <tbody >
	<?php

			$gettabledata = " SELECT * FROM `transaction` where status = 'completed' ";
	                $gettingcategories = mysqli_query($con,$gettabledata); 
	                $cat_count= mysqli_num_rows($gettingcategories);
	               //  $get_id =  mysqli_insert_id($con); 
	             if ($cat_count>=1){
	            
	                 while($row = mysqli_fetch_array($gettingcategories)){
	                 		$userid = $row['user_id'];
	                 	$tid = $row['tid'];
	                 		$stat = $row['status'];
	                 		$pm = $row['paymentmethod'];
	                 	
	                 		$da = $row['datecreated'];
 		if($pm == 'reserve') {
	                 			$pmorder = 'Reserved Orders';
	                 		}else if($pm == 'deliver'){
	                 			$pmorder = 'For Delivery Orders';
	                 		}else if ($pm == 'cod'){
	                 			$pmorder = 'For Cash on Delivery Orders';
	                 		}


								?>
								<tr class="table-success">
										<td colspan="7"><h6 style="font-weight:bolder;letter-spacing:2px;text-align: center;"><?php echo $pmorder.' ( BNC_'.$tid.' )' ?> <br>
												<?php 

	   								$getusername = " select * from accounts where user_id = '$userid'  ";
	   						                $guname = mysqli_query($con,$getusername); 
	   						           
	   						                 while($uname = mysqli_fetch_array($guname)){
	   										echo 'Name : '.$uname['name'].' '.$uname['lastname'];
	   						                 }
	   						          

	   						 ?>
										</h6></td>
										<td>
									<?php 
									if($pm == 'cod' || $pm == 'deliver'){
										?>
												<button type="button" class="btn btn-light text-primary" style="font-size:12px"  data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $tid ?>">
 Proof of Delivery
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $tid ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Proof of Delivery For Order BNC_<?php echo $tid  ?></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
      <div class="modal-body">
      	<img src="<?php echo '../img/Proof_of_delivery/'.$row['photo_proof'] ?>" id="img<?php echo $tid  ?>" style="width:100%;height:400px;">
      
      </div>
  
     
   
    </div>
  </div>
</div>
										<?php
									}

									 ?>
										</td>

								</tr>
	   				
	   					<?php 
	   						$gettrans_records = "select * from trans_record where transaction_id = '$tid'  ";
	   								 $gettingtrans = mysqli_query($con,$gettrans_records); 
	   								
	   							 while($gtrans = mysqli_fetch_array($gettingtrans)){
	   							 	$prid = $gtrans['prod_id'];

	   													

	   							 	?>

	   							 	<tr>
	   					<td>BNC_<?php echo $row['tid'] ?></td>
	   					<td><?php echo date('@H:i:s F j,Y',strtotime($row['datecreated'])) ?></td>
	   				

	   							 		<td>	


	   							
	   							<?php 

	   							
	   							 

	   								$getproductname = " select * from product where prod_id = '$prid'  ";
	   						                $gpname = mysqli_query($con,$getproductname); 
	   						           
	   						                 while($pname = mysqli_fetch_array($gpname)){
	   											

	   											?>

	   											<a href="?viewproducts&productname=<?php echo $pname['name'] ?>&token=<?php echo $pname['prod_id'] ?>&_view">
	   												<?php echo $pname['name']; ?>
	   											</a>
	   											<?php
	   						                 }
	   						          

	   						 ?>

	   					</td>
	   					<td>₱ <?php echo $gtrans['price'] ?></td>
	   					<td><?php echo $gtrans['quantity'] ?></td>
	   					<td>₱ <?php echo $gtrans['total'] ?></td>

	   							 	<?php



	   								 }
	   							

	   					 ?>
	   				
	   					<td>
	   						

	   				
						
							
				

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
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.0.1/rr-1.2.8/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.0.1/rr-1.2.8/datatables.min.js"></script>
		<script type="text/javascript">
			
			$(document).ready(function() {
			     

            let table = new DataTable('#categorytable', {
      
     "search": {
    "caseInsensitive": false
  }

});

			      });      
		      	
		</script>
		<?php

	
}

if(isset($_POST['confirm'])){ 
	$od = $_POST['od'];

	$confirm = "UPDATE `transaction` SET `status`='confirmed' WHERE tid = '$od' ";
	mysqli_query($con,$confirm);
	
}
if(isset($_POST['confirmd'])){ 
	$od = $_POST['od'];

	$confirm = "UPDATE `transaction` SET `status`='ready' WHERE tid = '$od' ";
	mysqli_query($con,$confirm);
	
}

if(isset($_POST['mc'])){ 
	$od = $_POST['od'];

	$confirm = "UPDATE `transaction` SET `status`='completed' WHERE tid = '$od' ";
	mysqli_query($con,$confirm);
	
}
if(isset($_POST['transport'])){ 
	$od = $_POST['od'];

	date_default_timezone_set('Asia/Manila');
	$date = date('Y-m-d');

	$confirm = "UPDATE `transaction` SET `status`='otw' WHERE tid = '$od' ";
	mysqli_query($con,$confirm);
	
}

if(isset($_POST['uploadproof'])){
	$tid = $_POST['tid'];

	 $image_name = $_FILES['image']['name'];
	 $tmp_name   = $_FILES['image']['tmp_name'];
	 $size       = $_FILES['image']['size'];
	 $type       = $_FILES['image']['type'];
	 $error      = $_FILES['image']['error'];
			                                                                                                                                    
	 $fileName =basename($_FILES['image']['name']);
	
	 $uploads_dir = '../img/Proof_of_delivery';
	 move_uploaded_file($tmp_name , $uploads_dir .'/'.$fileName);

	$confirm = "UPDATE `transaction` SET `status`='completed' , `photo_proof`='$fileName' WHERE tid = '$tid' ";
	mysqli_query($con,$confirm);

	$_SESSION['complete'] = 1;
	header('location:index.php');


	
}
 ?>