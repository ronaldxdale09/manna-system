	 <!--REGISTER-->
 	 	 		 	 	 	  <form method="post" action="action.php" onsubmit="return false" id="reg_step1" >
 	 	 		 	 	 	     	<input type="hidden" name="reg_step1">                  
 	 	 		 	 	 	
 	 	 		 	 	 	 
 	 	 		 	 	 	
 	 	 		 	 	 	  	 <div id="step1" class="d-none">
 	 	 		 	 	 	  	 
 	 	 		 	 	 	     	 <h6 class="text-primary mb-4">Registration</h6> 

 	 	 		 	 	 	     	 	<h6 style="font-size: 14px"> <span class="badge badge-success bg-success">Step 1 - 3</span></h6>
 	 	 		 	 	 	     	 	  <div class="progress-bar" role="progressbar" style="width: 33.3333s%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>

 	 	 		 	 	 	     <label>Lastname:</label>
	 	 		 	 	 		<input type="text" class="form-control txt mb-2" name="ln" style="" required="" >

	 	 		 	 	 		<label>Firstname:</label>
	 	 		 	 	 		<input type="text" class="form-control txt mb-2" name="fn" style="" required="" >

	 	 		 	 	 		<label>BirthDate:</label>
	 	 		 	 	 		<input type="date" class="form-control txt mb-2" name="bd" style="" required="" >

	 	 		 	 	 		<label>Address:</label>
	 	 		 	 	 		<input type="text" class="form-control txt mb-2" name="addr" style="" required="" >

	 	 		 	 	 		<label>Delivery Address:</label>
	 	 		 	 	 		
	 	 		 	 	 		<textarea  class="form-control txt mb-2" name="daddr" value="<?php echo $deliv ?>" cols="4"></textarea>
	 	 		 	 	 		<div class="form-check">
								  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
								  <label class="form-check-label" for="flexCheckDefault">
								    Same as the Address
								  </label>
								</div>

								  </form>


								<button type="submit" class="btn btn-primary form-control mb-1 py-2 mt-2" style="font-style: 16px" > Next</button>

								<button type="button" class="btn btn-light text-primary mt-2 back" style="font-size: 14px"> Already have an account</button>
								</div> 

								 <div id="step2" class="d-none">
								 	 <h6 class="text-primary mb-4">Login Credentials</h6> 

 	 	 		 	 	 	     	 	<h6 style="font-size: 14px"> <span class="badge badge-success bg-success">Step 2 - 3</span></h6>
 	 	 		 	 	 	     	 	  <div class="progress-bar" role="progressbar" style="width: 66.755%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>

 	 	 		 	 	 	     <label>Email:</label>
	 	 		 	 	 		<input type="text" class="form-control txt mb-2" name="" style="" required="">

	 	 		 	 	 	  	<label>Password:</label>
	 	 		 	 	 		<input type="password" class="form-control txt mb-2" name="" style="" required="">	

	 	 		 	 	 			<label>Re-Enter Password:</label>
	 	 		 	 	 		<input type="password" class="form-control txt mb-2" name="" style="" required="" >	

	 	 		 	 	 		

								<button  class="btn btn-primary form-control mb-1 py-2 mt-2" style="font-style: 16px" >Submit & Verify</button>


								<button type="button" data-step="2" class="btn btn-light form-control mb-1 py-2 mt-2" style="font-style: 16px" > Back</button>
									<button class="btn btn-light text-primary mt-2 back" style="font-size: 14px"> Already have an account</button>
								 </div> 


								  <div id="step3" class="d-none">
								 	 <h6 class="text-primary mb-4">Set Payment Method</h6> 

 	 	 		 	 	 	     	 	<h6 style="font-size: 14px"> <span class="badge badge-success bg-success">Step 3 - 3</span></h6>
 	 	 		 	 	 	     	 	<div class="progress" style="height: 5px;">
										  <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
										</div>

										<label>Card Accepted</label>
										<br>
										 <div class="" style="font-size: 25px">
										 
										 <i class="fa fa-cc-visa" style="color:navy;"></i>
						              <i class="fa fa-cc-amex" style="color:blue;"></i>
						              <i class="fa fa-cc-mastercard" style="color:red;"></i>
						              <i class="fa fa-cc-discover" style="color:orange;"></i>
						              </div> 
						              <br>

 	 	 		 	 	 	     <label>Name on Card:</label>
	 	 		 	 	 		<input type="text" class="form-control txt mb-2" name="" style="" required="" >

	 	 		 	 	 	  	<label>Credit Card Number:</label>
	 	 		 	 	 		<input type="text" class="form-control txt mb-2" name="" style="" required="" >	

	 	 		 	 	 			<label>CVV:</label>
	 	 		 	 	 		<input type="text" class="form-control txt mb-2" name="" style="" required="" >	

	 	 		 	 	 		<button  class="btn btn-primary form-control mb-1 py-2 mt-2" style="font-style: 16px" >Register</button>

								<button  class="btn btn-secondary form-control mb-1 py-2 mt-2" style="font-style: 16px" >Skip & Register</button>


								<button  class="btn btn-light form-control mb-1 py-2 mt-2" style="font-style: 16px" > Back</button>

									<button class="btn btn-light text-primary mt-2 back" style="font-size: 14px"> Already have an account</button>
								 </div> 
								 
								 

 	 	 		 	 	 	 
 	 	 		 	 	 	  <!--End Register-->
 	 	 		 	 	 	
