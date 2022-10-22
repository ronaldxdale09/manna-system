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

<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>


<body style="background-color: white">
    <div class="wrapper">


        <nav class="sidenav shadow">
        <?php include 'navbar.php' ?>
        </nav>


        <section class="main">

            <div class="">
                <button class="btn btn-light text-dark" id="slideleft" style="font-size: 10px;"><i
                        class="fas fa-arrow-left"></i></button>

                <button class="btn btn-light text-dark d-none" id="slideright" style="font-size: 10px;"><i
                        class="fas fa-arrow-right"></i></button>
                <!--<h5 class="text-primary text-secondary"
                    style="position:absolute; top:10px;right:10px;font-weight:bolder;font-family: 'Courgette', cursive;">
                </h5>-->

            </div>

            <div class="main_contents">
                <div class="container">

                    <h5 style="font-weight: bolder;">DASHBOARD</h5>
                    <hr>

                    <div class="row mb-4">

                        <div class="col-md-4">
                            <div class="card shadow bg-warning">
                                <div class="card-body">
                                    <h5 style="font-weight: bolder;text-align: center;" class="text-light">
                                        PENDING ORDERS <span class="badge bg-light text-dark"> <?php 
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
                            <div class="card shadow bg-success">
                                <div class="card-body">
                                    <h6 style="font-weight: bolder;text-align: center;" class="text-light">
                                        REGISTERED CUSTOMERS <span class="badge bg-light text-dark">
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
                                        CRITICAL ITEMS <span class="badge bg-light text-dark">

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


                    <div class="row">
                        <div class="col-4">
                            <div class="card" style="width:100%;max-width:100%;max-height:251px;">
                                <canvas id="net_income" style="width:100%;max-width:100%;max-height:251px;"></canvas>
                            </div>
                        </div>

                        <!-- end INCOME CHART -->
                        <div class="col-4">
                            <div class="card" style="width:100%;max-width:100%;max-height:251px;">
                                <canvas id="purchase_chart" style="width:100%;max-width:100%;max-height:251px;">
                                </canvas>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card" style="width:100%;max-width:100%;max-height:210px;">
                                <canvas id="inventory_chart"
                                    style="width:100%;max-width:100%;max-height:251px;"></canvas>
                            </div>
                        </div>
                    </div>

                    <br>
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



                        </div>
                        <br>


                    </div>
                    <br>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"
                        integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="
                        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


                    <div class="row">
                        <div class="col-4">
                            <div class="card" style="width:100%;max-width:100%;max-height:251px;">
                                <canvas id="income_chart" style="width:100%;max-width:100%;max-height:251px;">
                                </canvas>
                            </div>
                        </div>

                        <!-- end INCOME CHART -->
                        <div class="col-4">
                            <div class="card" style="width:100%;max-width:100%;max-height:251px;">
                                <canvas id="gross_chart" style="width:100%;max-width:100%;max-height:251px;">
                                </canvas>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card" style="width:100%;max-height:251px;">
                                <canvas id="opex_chart" style="width:100%;max-width:100%;max-height:251px;">
                                </canvas>
                            </div>
                        </div>
                    </div>



                </div>

        </section>

    </div>


    <script type="text/javascript" src="../js/sidebar.js?v=1"></script>


    <?php include ('dashboard_chart.php'); ?>




    <!--Bootstrap Plugins-->
    <script type="text/javascript" src="../js/notify.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/popper.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
</body>


<?php include('footer.php') ?>

</html>