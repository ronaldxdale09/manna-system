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


$sql = "SELECT * FROM category";
$result = mysqli_query($con, $sql);
$category='';
while($arr = mysqli_fetch_array($result))
{
$category .= '

<option value="'.$arr["cat_id"].'">'.$arr["category_name"].'</option>';
}

include "modal/product_modal.php";


?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<style>
.table td {
    font-size: 18px;
}
</style>

<body style="background-color: white">
    <div class="wrapper">


        <nav class="sidenav shadow">
            <?php include "navbar.php"; ?>
        </nav>



        <section class="home-section">

            <br>
            <div class="main_contents">
                <div class="container">

                    <h5 style="font-weight: bolder;">WALK-IN TRANSACTION RECORD</h5>
                    <hr>
                    <div class="card shadow-sm" style="">
                        <div class="card-body">


                            <button class="btn btn-dark text-white mb-2" data-bs-toggle="modal"
                                data-bs-target="#createTransaction" data-backdrop="static" data-keyboard="false"
                                style="font-size: 14px;">NEW TRANSACTION <i class="fas fa-plus-circle"></i></button>


                            <div class="table-responsive">
                                <?php $results  = mysqli_query($con, "SELECT *,transaction.status as stat , sum(trans_record.total) as total_amount FROM `transaction` 
                                LEFT JOIN accounts ON transaction.user_id = accounts.user_id LEFT JOIN trans_record ON transaction.tid = trans_record.transaction_id 
                                WHERE transaction.type='walkin' group by tid"); ?>
                                <table id="product_table" class="table table-hover" style="width:100%;">
                                    <thead class="table-warning">
                                        <tr style='font-size:14px'>

                                            <th> Transaction ID </th>
                                            <th>Date</th>
                                            <th>Total Purchased</th>
                                            <th>Pay</th>
                                            <th>Changes</th>
                                            <th>Status</th>
                                            <th>Action</th>


                                        </tr>
                                    </thead>
                                    <tbody style='font-size:40px'>
                                        <?php while ($row = mysqli_fetch_array($results)) {
                                 
                                            ?>
                                        <tr>
                                            <td><?php echo $row['tid']; ?> </td>
                                            <td><?php echo $row['datecreated']; ?></td>
                                            <td>₱ <?php echo number_format($row['total_amount'],2)?></td>
                                            <td>₱ <?php echo number_format($row['trans_pay'],2)?></td>
                                            <td>₱ <?php echo number_format($row['trans_changes'],2)?></td>
                                            <td><?php echo $row['stat']; ?></td>

                                            <td>
                                                <button type="button" class="btn btn-success text-light viewTransRecord"
                                                    id='viewTransRecord' style="font-size: 12px"><i
                                                        class="fas fa-book"></i> </button>

                                                <?php  if( $row['stat'] =='walkin-pending') {?>
                                                <a href='walkin.php?trans=<?php echo $row['tid']?>' type="button" class="btn btn-dark text-light "
                                                    style="font-size: 12px"><i class="fas fa-edit"></i> </a>
                                                <?php } ?>
                                            </td>
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




</html>


<script type="text/javascript" src="../js/sidebar.js?v=1"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="../js/datatable/datatables.js"></script>
<link rel="stylesheet" type="text/css" href="../js/datatable/datatables.css">
<!--Bootstrap Plugins-->
<script type="text/javascript" src="../js/notify.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/popper.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>




<div class="modal fade" id="createTransaction" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createProductLabel">WALK-IN TRANSACTION</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method='POST' action='functions/newWalkin.php'>
                    <div class="row">

                        <div id="brand" class="form-text mb-3">Click New Transaction to proceed.</div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="submit" name='add' class="btn btn-success">NEW TRANSACTION</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
            </form>
        </div>
    </div>
</div>





<!-- Modal View-->
<div class="modal fade" id="viewSalesDetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="receivingViewLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="receivingViewLabel">SALE RECORD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm">
                        <label> Transactio ID </label> <br>
                        <input id='s_trans_id' class='form-control' style='font-size:20px;border: none;font-weight:bold'
                            readonly>
                    </div>
                    <div class="col-sm">
                        <label> Date :</label> <br>
                        <input id='s_date' class='form-control' style='font-size:20px;border: none;font-weight:bold'
                            readonly>
                    </div>
                    <div class="col-sm">
                        <label>Transaction Type</label> <br>
                        <input id='s_trans_type' name='voucher' class='form-control'
                            style='font-size:20px;border: none;font-weight:bold' readonly>
                    </div>
                </div>


                <hr>
                <div id='view_sales_rec'> </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Return</button>
            </div>

        </div>
    </div>
</div>


<script>
$('.viewTransRecord').on('click', function() {

    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    $('#s_trans_id').val(data[0]);
    $('#s_date').val(data[1]);
    $('#s_trans_type').val(data[3]);

    function fetch_table() {

        var trans_id = (data[0]);
        $.ajax({
            url: "table/sales_record_table.php",
            method: "POST",
            data: {
                trans_id: trans_id,

            },
            success: function(data) {
                $('#view_sales_rec').html(data);
            }
        });
    }
    fetch_table();
    $('#viewSalesDetails').modal('show');


});
</script>