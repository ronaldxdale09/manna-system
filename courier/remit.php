<?php
session_start();
include "../connections/connect.php";
if (!isset($_SESSION["cour_id"])) {
    header("location:../log/signin.php");
}
$courier_id = $_SESSION["cour_id"];

$sql  = mysqli_query($con, "SELECT *  from accounts where user_id='$courier_id'");
$users_row = mysqli_fetch_array($sql);
$rider_name = $users_row['name'].' '.$users_row['lastname'];
$rider_contact = $users_row['mobile_number'];

$dateNow = date("Y-m-d");


?>
<!DOCTYPE html>
<html>

<?php
include "head.php";


$tab= '';
if (isset($_GET['tab'])) {
    $tab = filter_var($_GET['tab']) ;
  }
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<link rel='stylesheet' href='css/tab.css'>
<link rel='stylesheet' href='css/nav.css'>
<style>
.pending {
    /* Set the background color and border */
    background-color: #FDC96F;
    border-radius: 10px;
    border: 1px solid #6c757d;

    /* Set the font size and color */
    font-size: 13px;
    color: black;
    font-weight: bold;

    /* Add some padding and alignment */
    padding: 5px 5px;
    text-align: center;
}

.ready_badge {
    /* Set the background color and border */
    background-color: blue;
    border-radius: 10px;
    border: 1px solid #6c757d;

    /* Set the font size and color */
    font-size: 13px;
    color: black;

    /* Add some padding and alignment */
    padding: 5px 10px;
    text-align: center;
}

.waiting {
    /* Set the background color and border */
    background-color: green;
    border-radius: 10px;
    border: 1px solid #6c757d;

    /* Set the font size and color */
    font-size: 13px;
    color: white;

    /* Add some padding and alignment */
    padding: 5px 10px;
    text-align: center;
}
</style>
<?php include "nav.php"; ?>

<body style="background-color: white">


    <?php 
  $sql = " select * from courier_trans where user_id='$courier_id' and date='$dateNow'  ";
  $res = mysqli_query($con,$sql); 
  $arr= mysqli_fetch_array($res);

$cash_on_hand = $arr['total_cash_onhand'];
$total_amount = $arr['total_remit'];
$total_remit = $arr['total_remit'];
?>

    <section class="home-section">

        <br><br>
        <div class="container-fluid">

            <div class="wrapper" id="myTab">
                <div class="row mb-3">

                    <div class="col-md-3">
                        <div class="card shadow border-success">
                            <div class="card-body">

                                <h5 style="font-weight: bolder;text-align: center;" class="text-dark">
                                    TOTAL CASH ON HAND <br>
                                    <h3>
                                        <center>
                                            <?php 
                        
                          echo '₱ '.$cash_on_hand;      
                                           ?>

                                        </center>
                                    </h3>
                            </div>

                        </div>

                    </div>





                    <div class="col-md-3">
                        <div class="card shadow border-success">
                            <div class="card-body">

                                <h5 style="font-weight: bolder;text-align: center;" class="text-dark">
                                    TOTAL DELIVERY AMOUNT<br> </h5>
                                <h3>
                                    <center>
                                        <?php 
                                 echo '₱ '.$total_amount;      
                                           ?>

                                    </center>
                                </h3>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="card shadow border-success">
                            <div class="card-body">

                                <h5 style="font-weight: bolder;text-align: center;" class="text-dark">
                                    TOTAL CASH REMITTED TODAY <br>
                                    <h3>
                                        <center>
                                            <?php 
                          echo '₱ '.$total_remit;      
                                           ?>

                                        </center>
                                    </h3>
                            </div>

                        </div>

                    </div>







                </div>

                <h2>Remit Cash Record</h2>
                <hr>
                <center>

                    <h4> <?php echo $rider_name?> </h4>
                    <H6> Rider Name <h6>
                </center>
                <hr>

                <button class="btn btn-dark  btn-lg text-white mb-2" data-bs-toggle="modal"
                    data-bs-target="#promptRemit" data-backdrop="static" data-keyboard="false"
                    style="font-size: 14px;">REMIT CASH <i class="fas fa-plus-circle"></i></button>
                <br>
                <?php $results  = mysqli_query($con, " SELECT * FROM `courier_trans`
                LEFT JOIN accounts on courier_trans.user_id =accounts.user_id 
                where courier_trans.user_id='$courier_id' "); ?>
                <table id="production_table" class="table table-hover" style="width:100%;">
                    <thead class="table-warning">
                        <tr style='font-size:14px'>

                            <th>Date</th>
                            <th>Rider Name</th>
                            <th>Total Amount</th>
                            <th>Total Cash Remit</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style='font-size:15px'>
                        <?php while ($row = mysqli_fetch_array($results)) {
                ?>
                        <tr>

                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $rider_name ?></td>

                            <td>₱ <?php echo $row['total_amount'].' '.$row['lastname']; ?></td>
                            <td>₱ <?php echo $row['total_remit']; ?></td>
                            <td><button class="btn btn-dark text-light btnView" data-od="<?php echo $tid ?>"
                                    data-date="<?php echo $row['datecreated'] ?>"
                                    data-userid="<?php echo $row['user_id']  ?>"
                                    style="font-size: 14px;font-weight: bolder;">VIEW</button></td>

                        </tr>

                        <?php } ?>
                    </tbody>
                </table>


            </div>

        </div>

    </section>
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

<script>
$('.btnView').click(function() {
    //
    var od = $(this).data('od');
    var date = $(this).data('date');
    var userid = $(this).data('userid');

    console.log(userid);
    $('#v_orderDetails').modal('show')
    $('#v_date_order').val(date)
    $('#v_order_code').val('MN_' + od)


    function fetch_table() {

        var trans_id = (od);
        $.ajax({
            url: "fetch/view_order_details.php",
            method: "POST",
            data: {
                trans_id: trans_id,
            },
            success: function(data) {
                $('#v_list_purchased_prod').html(data);
            }
        });
    }
    fetch_table();


    function fetchAddress() {

        var trans_id = (od);
        $.ajax({
            url: "fetch/order_shipping.php",
            method: "POST",
            data: {
                trans_id: trans_id,
                userid: userid,
            },
            success: function(data) {
                $('#v_address_customer').html(data);
            }
        });
    }
    fetchAddress();


})
</script>