<?php 
session_start();
include '../connections/connect.php';

if(!isset($_SESSION['admin_id'])){
  header('location:../log/signin.php');
}

$tab= '';
if (isset($_GET['tab'])) {
    $tab = filter_var($_GET['tab']) ;
  }

 ?>
<!DOCTYPE html>
<html>





<?php include 'head.php' ?>

<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

<link rel='stylesheet' href='css/tab-orders.css'>

<body style="background-color: white">
    <div class="wrapper">



        <?php include 'navbar.php' ?>


        <section class="home-section">


            <div class="container-fluid">
                <div class="wrapper" id="myTab">
                    <input type="radio" name="slider" id="home" checked>
                    <input type="radio" name="slider" id="blog"
                        <?php if ($tab == '2') { echo 'checked'; } else { echo ''; } ?>>
                    <input type="radio" name="slider" id="code"
                        <?php if ($tab == '3') { echo 'checked'; } else { echo ''; } ?>>
                    <input type="radio" name="slider" id="help"
                        <?php if ($tab == '4') { echo 'checked'; } else { echo ''; } ?>>
                    <input type="radio" name="slider" id="about"
                        <?php if ($tab == '5') { echo 'checked'; } else { echo ''; } ?>>
                    <nav>
                        <label for="home" class="home"><i class="fa fa-book"></i>Summary Report</label>
                        <label for="blog" class="blog"><i class="fas fa-tasks"></i>Sales Report</label>
                        <label for="code" class="code"><i class="fa-solid fa-truck"></i>Product Report</label>
                        <label for="help" class="help"><i class="fa-solid fa-check"></i> Customers</label>
                        <label for="about" class="about"><i class="fa-solid fa-undo"></i> Others</label>

                        <div class="slider"></div>
                    </nav>
                    <section>
                        <div class="content content-1">
                            <hr>
                            <div class="title">Summary</div>
                            <?php include('reportPage/sale_rep.php');?>

                        </div>
                        <div class="content content-2">
                            <hr>
                            <div class="title">Sales Report</div>
                     
                            <?php include('reportPage/sale_rep.php');?>
                        </div>
                        <div class="content content-3">
                            <hr>
                            <div class="title">Product Reports</div>
                            <?php include('reportPage/product_sales.php');?>


                        </div>
                        <div class="content content-4">
                            <hr>
                            <div class="title">Customer Reports</div>


                        </div>
                        <div class="content content-5">
                            <hr>
                            <div class="title">Others</div>



                        </div>

                    </section>
                </div>

            </div>
    </div>

    </section>



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