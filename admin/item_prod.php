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


// expense category
$sql = "SELECT * FROM product";
$result = mysqli_query($con, $sql);
$prod_list='';
while($arr = mysqli_fetch_array($result))
{
$prod_list .= '

<option value="'.$arr["prod_id"].'">'.$arr["name"].'</option>';
}


?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

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

                    <h5 style="font-weight: bolder;">ITEM PRODUCTION</h5>
                    <hr>
                    <div class="card shadow-sm" style="">
                        <div class="card-body">


                            <button class="btn btn-warning text-white mb-2" data-bs-toggle="modal"
                                data-bs-target="#newProduction" data-backdrop="static" data-keyboard="false"
                                style="font-size: 14px;">Add new <i class="fas fa-plus-circle"></i></button>


                            <div class="table-responsive">
                                <?php $results  = mysqli_query($con, "SELECT * from production_log 
                           LEFT JOIN product ON production_log.prod_id = product.prod_id"); ?>
                                <table id="production_table" class="table table-hover" style="width:100%">
                                    <thead class="table-dark">
                                        <tr style='font-size:14px'>

                                            <th>No.</th>
                                            <th>Product Name</th>
                                            <th>Qty Added</th>
                                            <th>Production Date</th>
                                            <th>Expiration Date</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_array($results)) { ?>
                                        <tr style='font-size:17px'>

                                            <td><?php echo $row['log_id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['qty_added']; ?></td>
                                            <td><?php echo $row['prod_date']; ?></td>
                                            <td><?php echo $row['exp_date']; ?></td>

                                        </tr>

                                        <?php } ?>
                                    </tbody>

                                </table>

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




<div class="modal fade" id="newProduction" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" style="float: right;" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <h5 class="modal-title">Add Daily Production</h5>

            </div>
            <div class="modal-body">
                <form method='POST' action='functions/addProduction.php'>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product List</label>
                            <select class='form-select category' name='prod_id' required>
                                <option disabled="disabled" selected="selected" value=''>Select Product </option>
                                <?php echo $prod_list?>

                                <!--PHP echo-->
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="amount" class="form-label">Quantity</label>
                            <input type="text" class="form-control" name="quantity" aria-describedby="amount" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="amount" class="form-label">Production Date</label>
                                <input type="date" class="form-control" name="prod_date" aria-describedby="amount"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="amount" class="form-label">Expiration Date</label>
                                <input type="date" class="form-control" name="exp_date" aria-describedby="amount"
                                    required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name='add' class="btn btn-warning">Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>


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