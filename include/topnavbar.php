<link rel="stylesheet" type="text/css" href="css/search.css">
<style>
@media (max-width: 480px) {

    .purple-rain .col-md-3,
    .purple-rain .col-md-4,
    .purple-rain .col-md-5 {
        flex: 0 0 100%;
        max-width: 100%;
    }
}
</style>
<nav class="purple-rain">
    <div class="row purple-rain">
        <div class="col">
            <a href="index.php" style="text-decoration: none">

                <a href="index.php" style='padding: 10px;'>
                    <img src="assets/logo/logo_transparent.png" alt="">
                </a>
            </a>
        </div>


        <div class="col header_search">
            <div class="header_search_content">
                <div class="header_search_form_container">
                    <form action="category.php" method="get" class="header_search_form clearfix">
                        <input type="search" name="query" required="required" class="header_search_input"
                            placeholder="Search for products...">

                        <button type="submit" class="header_search_button trans_300" value="Submit"><img
                                src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918770/search.png"
                                alt=""></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col">

            <style type="text/css">
            .dropdown:hover .dropdown-menu {
                display: block;
                margin-top: 0;
            }
            </style>



            <div class="row" id="buttonsg">

                <div class="col">
                    <?php 
                        if(isset($cart)){

                        }else {
                          ?>

                    <button class="btn  mt-3 text-dark" id="cartbutton" onclick="window.location.href='cart.php'"
                        style="border-radius: 25px;position: relative;">
                        <i class="fas fa-shopping-cart" style="font-size: 20px;"></i>

                        <span class="badge badge-danger bg-danger"
                            style="font-size: 10px;border-radius: 20px;position: absolute;" id="countcart"></span>
                    </button>




                    <?php
                        }

                        if(isset($wishlist)){

                        }else {
                          ?>


                    <button class="btn mt-3 text-dark " onclick="window.location.href='wishlist.php'"
                        style="border-radius: 25px;position: relative; margin-left: 10px;">

                        <i class="fas fa-heart" style="font-size: 20px;"></i>
                        <span class="badge badge-danger bg-danger"
                            style="font-size: 10px;border-radius: 20px;position: absolute;" id="incomingList"></span>
                    </button>

                    <?php
                        }

                        if (isset($_SESSION['user_isset'])) {

                            
                    
                         ?>
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

                    <button class="btn mt-3 text-dark "
                        onclick="window.location.href='orders.php?p=<?php echo $porder ?>'"
                        style="border-radius: 25px;position: relative; margin-left: 10px;">
                        <?php   
                                                }else {
                                                ?>
                        <button class="btn mt-3 text-dark " onclick="window.location.href='orders.php'"
                            style="border-radius: 25px;position: relative; margin-left: 10px;">
                            <?php
                                            }

                                            ?>


                            <i class="fas fa-truck" style="font-size: 20px;"></i>
                            <span class="badge badge-danger bg-danger"
                                style="font-size: 10px;border-radius: 20px;position: absolute;">
                                <?php 
                                $sql = " select * from transaction where status !='completed' and user_id ='$user'   ";
                                            $orders = mysqli_query($con,$sql); 
                                            $allOrders= mysqli_num_rows($orders);
                                        if ($allOrders ='0'){

                                        }else{
                                            echo $allOrders;   
                                        }
                                      

                             ?>
                            </span>
                        </button>
                        <?php } ?>

                </div>

                <div class="col">





                    <?php 
                                            if(isset($_SESSION['user_isset'])){

                                                if(isset($myacc)){

                                                }else {
                                                
                                                }
                                                ?>

                    <div class="dropdown">
                        <a class="btn btn-outline-warning  mt-1 text-dark" href="#" role="button" style="padding: 5px">

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
                                text: "",
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
                        <a class="btn btn-outline-warning  mt-1 text-dark" href="#" role="button">
                            <i class="far fa-user" style="font-size: 20px"></i> <br>
                            <span style="font-weight: bolder">Welcome Customer</span>
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


</nav>

