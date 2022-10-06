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
                        <a class="nav-link navlinks " href="dashboard.php">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
                    </li>

                    <li class="nav-item navitems">
                        <a class="nav-link navlinks text-secondary " href="sales.php">
                            <i class="fas fa-hand-holding-usd"></i>
                            <span>Sales</span></a>
                    </li>

                    <div class="wrapper">
                        <li class="nav-item navitems">

                            <a class="nav-link navlinks text-secondary " href="orders.php">
                                <i class="fas fa-cart-arrow-down"></i>
                                <span>Orders</span>
                                <!-- <span class="badge"><?php echo $count[0] ?></span> -->

                            </a>
                        </li>
                    </div>
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
                <h5 class="text-primary text-secondary"
                    style="position:absolute; top:10px;right:10px;font-weight:bolder;font-family: 'Courgette', cursive;">
                </h5>

            </div>

            <div class="main_contents">
                <div class="container">

                    <h5 style="font-weight: bolder;">DASHBOARD</h5>
                    <hr>

                    <div class="row mb-4">

                        <div class="col-md-4">
                            <div class="card shadow bg-warning">
                                <div class="card-body">
                                    <h5 style="font-weight: bolder;text-align: center;" class="text-black">
                                        ORDERS <span class="badge bg-light text-dark"> <?php 
                                $corders = " select * from trans_record  ";
                                            $countord = mysqli_query($con,$corders); 
                                            $allorders= mysqli_num_rows($countord);
                                  echo $allorders;     

                            ?></span>
                                    </h5>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="card shadow bg-dark">
                                <div class="card-body">
                                    <h6 style="font-weight: bolder;text-align: center;" class="text-light">
                                        CUSTOMERS <span class="badge bg-light text-dark">
                                            <?php 
                                $ccustomers = " select * from accounts  ";
                                            $ccustom = mysqli_query($con,$ccustomers); 
                                            $allcustomers= mysqli_num_rows($ccustom);
                                    echo $allcustomers;      
                             ?>
                                        </span>
                                    </h6>
                                </div>

                            </div>

                        </div>


                        <div class="col-md-4">
                            <div class="card shadow bg-primary">
                                <div class="card-body">
                                    <h6 style="font-weight: bolder;text-align: center;" class="text-light">
                                        PRODUCTS <span class="badge bg-light text-dark">

                                            <?php 
                                $cproducts = " select * from product  ";
                                            $countproduct = mysqli_query($con,$cproducts); 
                                            $allproducts= mysqli_num_rows($countproduct);
                                        echo $allproducts;   

                             ?>
                                        </span>
                                    </h6>
                                </div>

                            </div>

                        </div>


                    </div>



                    <div class="card shadow-sm" style="">
                        <div class="card-body">

                            <?php 

                      $getcat = " select * from category  ";
                                  $gcat = mysqli_query($con,$getcat); 
                                  $countcat= mysqli_num_rows($gcat);
                               


                   ?>
                            <script>
                            window.onload = function() {

                                var chart = new CanvasJS.Chart("chartContainer", {
                                    exportEnabled: true,
                                    animationEnabled: true,
                                    title: {
                                        text: "Data Statistics"
                                    },
                                    legend: {
                                        cursor: "pointer",
                                        itemclick: explodePie
                                    },
                                    data: [{
                                        type: "pie",
                                        showInLegend: true,
                                        toolTipContent: "{name}: <strong>{y}%</strong>",
                                        indexLabel: "{name} - {y}%",
                                        dataPoints: [{
                                                y: <?php echo $allproducts ?>,
                                                name: "Product",
                                                exploded: true
                                            },
                                            {
                                                y: <?php echo $allcustomers ?>,
                                                name: "Customers"
                                            },
                                            {
                                                y: <?php echo $allorders ?>,
                                                name: "Sales"
                                            },
                                            {
                                                y: <?php echo $countcat ?>,
                                                name: "Categories"
                                            }

                                        ]
                                    }]
                                });
                                chart.render();
                            }

                            function explodePie(e) {
                                if (typeof(e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e
                                    .dataSeries.dataPoints[e.dataPointIndex].exploded) {
                                    e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
                                } else {
                                    e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
                                }
                                e.chart.render();

                            }
                            </script>

                            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


                        </div>

                    </div>






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


<?php include('footer.php') ?>

</html>