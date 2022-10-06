 <!-- <div class="topbar">
     <h6 style="float: left;" class="text-light">Globe/Tm: +639557653775 <i class="fas fa-phone"></i></h6>
     <h6 style="float: right;" class="text-light">Follow us: @Facebook.MannaZamboanga</h6>
 </div> -->

 <nav class="purple-rain">



     <div class="row purple-rain">

         <div class="col-md-2">
             <a href="index.php" style="text-decoration: none">

                 <a href="index.php" style='padding: 50px; margin-left: 20px;'>
                     <img src="assets/logo/logo_transparent.png" alt="">
                 </a>
             </a>
         </div>

         <div class="col-md-6">

             <!--<input type="text" name="" placeholder="Search" class="form-control mt-3 searchbar" style="font-size: 14px"> -->
         </div>
         <div class="col-md-4">

             <style type="text/css">
             .dropdown:hover .dropdown-menu {
                 display: block;
                 margin-top: 0; // remove the gap so it doesn't close
             }
             </style>


             <div class="container">
                 <div class="row" id="buttonsg">

                     <div class="col-auto">
                         <?php 
                        if(isset($cart)){

                        }else {
                          ?>

                         <button class="btn btn-light mt-3 rounded-circle" id="cartbutton"
                             onclick="window.location.href='cart.php'" style="position: relative;">
                             <i class="fas fa-shopping-cart rounded-circle" style="font-size: 20px;"></i>
                             <span class="badge badge-danger bg-danger rounded-circle"
                                 style="font-size: 10px;position: absolute;" id="countcart"></span>
                         </button>




                         <?php
                        }

                        if(isset($wishlist)){

                        }else {
                          ?>


                         <button class="btn btn-light mt-3 rounded-circle " onclick="window.location.href='wishlist.php'"
                             style="position: relative; margin-left: 10px;">

                             <i class="fas fa-heart rounded-circle" style="font-size: 20px;"></i>
                             <span class="badge badge-danger bg-danger rounded-circle"
                                 style="font-size: 10px;position: absolute;" id="countwlist"></span>
                         </button>

                         <?php
                        }

                         ?>


                     </div>

                     <div class="col-auto">





                         <?php 
  if(isset($_SESSION['user_isset'])){

    if(isset($myacc)){

    }else {
      
    }
    ?>

                         <div class="dropdown">
                             <a class="btn btn-light  mt-1 text-primary" href="#" role="button" style="padding: 5px">
                                 <span style="font-weight: bolder">Welcome <br> <span
                                         class="text-primary"><?php echo $_SESSION['user_name'] ?></span></span>
                             </a>




                             <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                 <?php 
    $user =$_SESSION['user_id'];
      $checkif_thersorder = "select * from transaction where user_id ='$user' and status != 'completed'  ";
       $chckingorder = mysqli_query($con,$checkif_thersorder); 
       $count= mysqli_num_rows($chckingorder);
      
      if($count >=1){
     while($row = mysqli_fetch_array($chckingorder)){
         $porder = $row['tid'];  
       }
      ?>
                                 <li><a class="dropdown-item" style="font-size: 14px"
                                         href="orders.php?p=<?php echo $porder ?>">My Orders</a></li>
                                 <?php   
     }else {
      ?>
                                 <li><a class="dropdown-item" style="font-size: 14px" href="orders.php">My Orders</a>
                                 </li>
                                 <?php
     }

    ?>

                                 <li><a class="dropdown-item" style="font-size: 14px" href="myaccount.php">My
                                         Account</a></li>
                                 <li><a class="dropdown-item" id="logout" style="font-size: 14px"
                                         href="javascript:void(0)">Logout</a></li>

                             </ul>
                         </div>


                         <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                         <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

                         <script type="text/javascript">
                         $(document).ready(function() {
                             $('#logout').click(function() {
                                 Swal.fire({
                                     title: 'Are you sure?',
                                     text: "We miss you already.",
                                     icon: 'question',
                                     showCancelButton: true,
                                     confirmButtonColor: '#6b9dd4',
                                     cancelButtonColor: '#d4a26b',
                                     confirmButtonText: 'Yes, logout!'
                                 }).then((result) => {
                                     if (result.isConfirmed) {
                                         window.location.href = "log/logout.php";
                                     }
                                 })

                             })
                         });
                         </script>

                         <?php

  }else {
    ?>
                         <div class="dropdown">
                             <a class="btn btn-light mt-1 text-dark" href="#" role="button"
                                 style="padding: 10px">
                                 <i class="far fa-user" style="font-size: 20px;"></i>
                                 <span style="font-weight: bolder;">Welcome!</span>
                             </a>




                             <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                 <li><a class="dropdown-item" style="font-size: 14px" href="log/signin.php">Sign In</a>
                                 </li>
                                 <!-- <li><a class="dropdown-item" style="font-size: 14px" href="log/">Register</a></li> -->

                             </ul>
                         </div>

                         <?php
  }

 ?>

                     </div>

                 </div>

             </div>
         </div>

     </div>


 </nav>