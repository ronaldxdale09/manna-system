<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
    header("location:../log/signin.php");
}
?>
<!DOCTYPE html>
<html>

<?php
include "head.php";
include "../connections/connect.php";

?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>


<body style="background-color: white">
    <div class="wrapper">


        <nav class="sidenav shadow">
            <?php include "navbar.php"; ?>
        </nav>



        <section class="main">

            <div class="">
                <button class="btn btn-light text-dark" id="slideleft" style="font-size: 10px;"><i
                        class="fas fa-arrow-left"></i></button>

                <button class="btn btn-light text-dark d-none" id="slideright" style="font-size: 10px;"><i
                        class="fas fa-arrow-right"></i></button>


            </div>

            <div class="main_contents">
                <div class="container">

                    <h5 style="font-weight: bolder;">REPORT</h5>
                    <hr>
                    <div class="card shadow-sm" style="">
                        <div class="card-body">


                            <div class="row">
                                <div class="col-4">
                                    <div class="card" style="width:100%;max-width:100%;max-height:251px;">
                                        <canvas id="net_income"
                                            style="width:100%;max-width:100%;max-height:251px;"></canvas>
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
                                    <div class="col-3" style="width:100%;max-width:100%;max-height:270px;">
                                        <div class="card" style="width:100%;max-width:100%;max-height:270px;">
                                            <br>
                                            <center>
                                                <h5 style="font-weight: bolder;">Top Selling Product</h5>
                                            </center>
                                            <?php 
                   
                        $side = mysqli_query($con, "SELECT trans_record.prod_id,name,sum(quantity) as qty from trans_record LEFT JOIN product on trans_record.prod_id = product.prod_id group by name");?>
                                            <table class="table table-hover">
                                                <thead class='table-dark'>
                                                    <tr>
                                                        <th scope="col">Product </th>
                                                        <th scope="col">Quantity Sold</th>
                                                    </tr>
                                                </thead> <?php 
                            while ($row = mysqli_fetch_array($side)) { ?> <tbody>
                                                    <tr>
                                                        <td> <?php echo $row['name']?> </td>
                                                        <td> <?php echo $row['qty']?> </td>
                                                    </tr> <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>

                    </div>
                </div>

            </div>

            <div class="footer shadow">

            </div>
        </section>

    </div>
</body>







</html>

<script type="text/javascript">
$(document).ready(function() {
    $('#production_table').DataTable();

});
</script>

<script type="text/javascript" src="../js/sidebar.js?v=1"></script>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="../js/datatable/datatables.js"></script>
<link rel="stylesheet" type="text/css" href="../js/datatable/datatables.css">
<!--Bootstrap Plugins-->
<script type="text/javascript" src="../js/notify.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/popper.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>