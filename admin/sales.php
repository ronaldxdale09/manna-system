<?php 
session_start();
include '../connections/connect.php';

if(!isset($_SESSION['admin_id'])){
  header('location:../log/signin.php');
}
 ?>
<!DOCTYPE html>
<html>

<?php include 'head.php' ?>

<body style="background-color: white">
    <div class="wrapper">


        <nav class="sidenav shadow">
            <div class="userinfo">
                <img src="../assets/logo/logo_transparent.png" class="img-thumbnnail shadow"
                    style="width: 80px;height: 60px;border-radius: 30px;">

                <div class="dropdown" style="font-weight: bolder;z-index: 9999">

                    Admin_<span id="username" class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['admin_name'] ?></span>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="font-size: 13px;">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="../log/logout.php">Logout</a></li>

                    </ul>
                </div>

                <span style="font-weight: normal;font-size: 13px"><?php echo $_SESSION['admin_email'] ?></span>

            </div>
            <hr>
            <div class="navigations">



                <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="font-size: 14px">




                    <div class="sidebar-heading text-secondary" style="font-size: 12px">
                        REPORTS
                    </div>

                    <li class="nav-item navitems">
                        <a class="nav-link navlinks text-secondary" href="dashboard.php">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
                    </li>

                    <li class="nav-item navitems">
                        <a class="nav-link navlinks  " href="sales.php">
                            <i class="fas fa-hand-holding-usd"></i>
                            <span>Sales</span></a>
                    </li>

                    <li class="nav-item navitems">
                        <a class="nav-link navlinks text-secondary " href="orders.php">
                            <i class="fas fa-cart-arrow-down"></i>
                            <span>Orders</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading text-secondary" style="font-size: 12px">
                        MANAGE
                    </div>

                    <li class="nav-item navitems">
                        <a class="nav-link navlinks text-secondary " href="products.php">
                            <i class="fa fa-shirtsinbulk"></i>
                            <span>Products</span></a>
                    </li>

                    <li class="nav-item navitems">
                        <a class="nav-link navlinks text-secondary " href="categories.php">
                            <i class="fas fa-list-ul"></i>
                            <span>Categories</span></a>
                    </li>

                    <li class="nav-item navitems">
                        <a class="nav-link navlinks text-secondary " href="promo.php">
                            <i class="fas fa-tags"></i>
                            <span>Promo Codes</span></a>
                    </li>

                    <li class="nav-item navitems">
                        <a class="nav-link navlinks text-secondary " href="accounts.php">
                            <i class="fas fa-users"></i>
                            <span>User Accounts</span></a>
                    </li>













                </ul>


            </div>


        </nav>


        <section class="main">

            <div class="topbar shadow-sm">
                <button class="btn btn-light text-dark" id="slideleft" style="font-size: 10px;"><i
                        class="fas fa-arrow-left"></i></button>

                <button class="btn btn-light text-dark d-none" id="slideright" style="font-size: 10px;"><i
                        class="fas fa-arrow-right"></i></button>
    

            </div>

            <div class="main_contents">
                <div class="container">

                    <h5 style="font-weight: bolder;">SALES</h5>
                    <hr>
                    <div class="card shadow-sm" style="">
                        <div class="card-body">



                            <script>
                            window.onload = function() {

                                var chart = new CanvasJS.Chart("chartContainer", {
                                    animationEnabled: true,
                                    theme: "light2",
                                    title: {
                                        text: ""
                                    },
                                    data: [{
                                        type: "line",
                                        indexLabelFontSize: 16,
                                        dataPoints: [

                                            /* { y: 414},
                                             { y: 520, indexLabel: "\u2191 highest",markerColor: "red", markerType: "triangle" },
                                             { y: 460 },
                                             { y: 450 },
                                             { y: 500 },
                                             { y: 480 },
                                             { y: 480 },
                                             { y: 410 , indexLabel: "\u2193 lowest",markerColor: "DarkSlateGrey", markerType: "cross" },
                                             { y: 500 },
                                             { y: 480 },*/
                                            <?php 
          $stats = " select * from trans_record  ";
                      $gstat = mysqli_query($con,$stats); 
                   
                  
                       while($st = mysqli_fetch_array($gstat)){
                      ?> {
                                                y: <?php echo $st['total'] ?>
                                            },
                                            <?php
                       }
                

       ?>



                                        ]
                                    }]
                                });
                                chart.render();

                            }
                            </script>

                            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>




                        </div>

                    </div>

                    <div class="card shadow-sm mt-3">
                        <div class="card-body">

                            <div class="container">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">

                                        <div class="row">
                                            <div class="col-sm-5"><input type="date" id="d1" name=""
                                                    class="form-control"></div>
                                            <div class="col-sm-1">To</div>

                                            <div class="col-sm-5"> <input type="date" id="d2" name=""
                                                    class="form-control"></div>

                                        </div>



                                    </div>
                                    <div class="col-md-2"></div>

                                </div>



                            </div>

                            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            <script type="text/javascript">
                            $(document).ready(function() {
                                $('#d2').change(function() {
                                    var d1 = $('#d1').val();
                                    var d2 = $(this).val();

                                    if (d1 == '') {
                                        Swal.fire(
                                            'Invalid Selection',
                                            'Please fill all fields on filtering',
                                            'error'
                                        )
                                    } else {

                                        window.location.href = 'sales.php?sort&d1=' + d1 + '&d2=' + d2;


                                    }
                                })
                            });
                            </script>



                        </div>

                    </div>

                    <div class="card shadow-sm mt-3">
                        <div class="card-body">

                            <div class="container">

                                <?php 
  if(isset($_GET['sort'])){
    $d1 = $_GET['d1'];
    $d2 = $_GET['d2'];
      ?>
                                <h6 style="font-weight: bolder;" id="defaultsort"> Sorting from
                                    <?php echo date('F j, Y',strtotime($d1))  ?> to
                                    <?php echo date('F j, Y',strtotime($d2))  ?> </h6>

                                <div class="table-responsive">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Order_no</th>
                                                <th scope="col">Date-Ordered</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Amount Paid</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
    date_default_timezone_set('Asia/Manila'); 
    $datenow = date('Y-m-d');
          $getorders = " select * from trans_record where  date_ordered BETWEEN '$d1' AND '$d2' ";
                      $gettingor = mysqli_query($con,$getorders); 
                      $countorders= mysqli_num_rows($gettingor);
                     //  $get_id =  mysqli_insert_id($con); 
                   if ($countorders>=1){
                  
                       while($row = mysqli_fetch_array($gettingor)){
                        $user = $row['user_id'];
                        $pid = $row['prod_id'];
                        $total[] = $row['total'];
                          $dfee = $row['dfee'];
                                              $disc = $row['disc'];
                      ?>
                                            <tr>
                                                <th scope="row"><?php echo 'BnC_'.$row['order_id'] ?></th>
                                                <td><?php echo date('F j,Y',strtotime($row['date_ordered'])) ?></td>
                                                <td><?php
                        $gettingusername = " select * from accounts where user_id = '$user'  ";
                                    $guser = mysqli_query($con,$gettingusername); 
                                  
                                
                                     while($ue = mysqli_fetch_array($guser)){
                                      echo $ue['name'].' '.$ue['lastname'];
                                     }
                              
                     ?></td>
                                                <td>
                                                    <?php 
                          $gettingproduct = " select * from product where prod_id = '$pid' ";
                                      $gprod = mysqli_query($con,$gettingproduct); 
                                   
                                  
                                       while($pp = mysqli_fetch_array($gprod)){
                                        echo $pp['name'];
                                       }
                                
                       ?>
                                                </td>
                                                <td><?php echo $row['quantity'] ?></td>
                                                <td>₱<?php echo $row['total'] ?></td>
                                                <td>₱<?php echo $row['total'] ?></td>
                                            </tr>

                                            <tr>

                                                <?php
                       }

                       ?>

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <?php 
                                 if(isset($disc)){
                                    echo 'Discounts';
                                  }else {
                                    
                                  }
                                 ?>
                                                </td>
                                                <td>
                                                    <h6 style=""> <?php 
                                 if(isset($disc)){
                                    echo ' -₱'.$disc;
                                  }else {
                                    
                                  }
                                 ?></h6>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <?php 
                                 if(isset($dfee)){
                                    echo 'Delivery Fees';
                                  }else {
                                    
                                  }
                                 ?>
                                                </td>
                                                <td>
                                                    <h6 style=""> <?php 
                                 if(isset($dfee)){
                                    echo ' ₱'.$dfee;
                                  }else {
                                    
                                  }
                                 ?></h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <h6 style="font-weight: bold; float: right;">TOTAL:</h6>
                                                </td>
                                                <td>
                                                    <h5 style="font-weight: bold; "> ₱
                                                        <?php 
                              if(isset($total)){
                               
                                   if(isset($disc)){
                                       if(isset($dfee)){
                                     echo array_sum($total) + $dfee - $disc;
                                  }else {
                                    echo array_sum($total) - $disc;


                                  }
                                      }else {
                                        
                                         if(isset($dfee)){
                                     echo array_sum($total) + $dfee;
                                  }else {
                                    echo array_sum($total);


                                  }
                                      }
                                  
                              }else {
                                echo '0';
                              }
                               ?>


                                                    </h5>
                                                </td>


                                            </tr>
                                            <?php
                }else {
                  ?>

                                            <tr>
                                                <td colspan="7">
                                                    <h6 style="text-align: center;font-weight: bolder;">No orders yet..
                                                    </h6>
                                                </td>
                                            </tr>

                                            <?php
                }

     ?>




                                        </tbody>
                                    </table>
                                </div>
                                <?php
  }else {
    ?>
                                <h6 id="defaultsort"> As of today <?php echo date('F j, Y') ?></h6>

                                <div class="table-responsive">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Order_no</th>
                                                <th scope="col">Date-Ordered</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Amount Paid</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
    date_default_timezone_set('Asia/Manila'); 
    $datenow = date('Y-m-d');
          $getorders = " select * from trans_record where date_ordered = '$datenow'  ";
                      $gettingor = mysqli_query($con,$getorders); 
                      $countorders= mysqli_num_rows($gettingor);
                     //  $get_id =  mysqli_insert_id($con); 
                   if ($countorders>=1){
                  
                       while($row = mysqli_fetch_array($gettingor)){
                        $user = $row['user_id'];
                        $pid = $row['prod_id'];
                        $total[] = $row['total'];
                          $dfee = $row['dfee'];
                                              $disc = $row['disc'];
                      ?>
                                            <tr>
                                                <th scope="row"><?php echo 'BnC_'.$row['order_id'] ?></th>
                                                <td><?php echo date('F j,Y',strtotime($row['date_ordered'])) ?></td>
                                                <td><?php
                        $gettingusername = " select * from accounts where user_id = '$user'  ";
                                    $guser = mysqli_query($con,$gettingusername); 
                                  
                                
                                     while($ue = mysqli_fetch_array($guser)){
                                      echo $ue['name'].' '.$ue['lastname'];
                                     }
                              
                     ?></td>
                                                <td>
                                                    <?php 
                          $gettingproduct = " select * from product where prod_id = '$pid' ";
                                      $gprod = mysqli_query($con,$gettingproduct); 
                                   
                                  
                                       while($pp = mysqli_fetch_array($gprod)){
                                        echo $pp['name'];
                                       }
                                
                       ?>
                                                </td>
                                                <td><?php echo $row['quantity'] ?></td>
                                                <td>₱<?php echo $row['total'] ?></td>
                                                <td>₱<?php echo $row['total'] ?></td>
                                            </tr>

                                            <tr>

                                                <?php
                       }

                       ?>

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <?php 
                                 if(isset($disc)){
                                    echo 'Discount';
                                  }else {
                                    
                                  }
                                 ?>
                                                </td>
                                                <td>
                                                    <h6 style=""> <?php 
                                 if(isset($disc)){
                                    echo ' -₱'.$disc;
                                  }else {
                                    
                                  }
                                 ?></h6>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <?php 
                                 if(isset($dfee)){
                                    echo 'Delivery Fee';
                                  }else {
                                    
                                  }
                                 ?>
                                                </td>
                                                <td>
                                                    <h6 style=""> <?php 
                                 if(isset($dfee)){
                                    echo ' ₱'.$dfee;
                                  }else {
                                    
                                  }
                                 ?></h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <h6 style="font-weight: bold; float: right;">TOTAL:</h6>
                                                </td>
                                                <td>
                                                    <h5 style="font-weight: bold; "> ₱
                                                        <?php 
                              if(isset($total)){
                               
                                   if(isset($disc)){
                                       if(isset($dfee)){
                                     echo array_sum($total) + $dfee - $disc;
                                  }else {
                                    echo array_sum($total) - $disc;


                                  }
                                      }else {
                                        
                                         if(isset($dfee)){
                                     echo array_sum($total) + $dfee;
                                  }else {
                                    echo array_sum($total);


                                  }
                                      }
                                  
                              }else {
                                echo '0';
                              }
                               ?>


                                                    </h5>
                                                </td>


                                            </tr>
                                            <?php
                }else {
                  ?>

                                            <tr>
                                                <td colspan="7">
                                                    <h6 style="text-align: center;font-weight: bolder;">No orders yet..
                                                    </h6>
                                                </td>
                                            </tr>

                                            <?php
                }

     ?>




                                        </tbody>
                                    </table>
                                </div>
                                <?php
  }


 ?>

                            </div>


                        </div>

                    </div>

                    <p><br><br></p>


                </div>



            </div>





        </section>

    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script type="text/javascript" src="../js/sidebar.js?v=1"></script>




    <!--Bootstrap Plugins-->
    <script type="text/javascript" src="../js/notify.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/popper.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
</body>

</html>