<hr>
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card shadow border-warning">
            <div class="card-body">

                <h5 style="font-weight: bolder;text-align: center;" class="text-dark">
                    PENDING DELIVERY <span class="badge bg-dark text-light"> <?php 
            $corders = " select * from transaction where status='otw'  ";
                        $countord = mysqli_query($con,$corders); 
                        $allorders= mysqli_num_rows($countord);
              echo $allorders;     

        ?></span>
                </h5>
            </div>

        </div>

    </div>

    <div class="col-md-4">
        <div class="card shadow border-success">
            <div class="card-body">

                <h6 style="font-weight: bolder;text-align: center;" class="text-dark">
                    COMPLETED DELIVERY <span class="badge bg-success text-light">
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





</div>


<?php $results  = mysqli_query($con, " SELECT *,transaction.status as stat FROM `transaction`
    LEFT JOIN accounts ON transaction.user_id = accounts.user_id WHERE transaction.status='otw'"); ?>
<table id="production_table" class="table table-hover" style="width:100%;">
    <thead class="table-warning">
        <tr style='font-size:14px'>
            <th>Order Code</th>
            <th>Date</th>
            <th>Customer</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Action</th>


        </tr>
    </thead>
    <tbody style='font-size:15px'>
        <?php while ($row = mysqli_fetch_array($results)) {
                    $tid=  $row['tid'];
                    $gettrans_records = "select sum(total) as total_pay from trans_record where transaction_id = '$tid'  ";
                    $gettingtrans = mysqli_query($con,$gettrans_records); 
                    $gtrans = mysqli_fetch_array($gettingtrans)
                ?>
        <tr>
            <td>MN_<?php echo $row['tid']; ?></td>
            <td><?php echo $row['datecreated']; ?></td>
            <td><?php echo $row['name'].' '.$row['lastname']; ?></td>
            <td>₱ <?php echo $gtrans['total_pay']; ?></td>
            <td>
                <div class="pending"><?php echo $row['stat']; ?></div>
            </td>

            <td>

                <button class="btn btn-dark text-light confirmd" data-od="<?php echo $tid ?>"
                    data-date="<?php echo $row['datecreated'] ?>" data-userid="<?php echo $row['user_id']  ?>"
                    style="font-size: 14px;font-weight: bolder;">Delivered</button>

                <button class="btn btn-danger text-light confirmd" data-od="<?php echo $tid ?>"
                    data-date="<?php echo $row['datecreated'] ?>" data-userid="<?php echo $row['user_id']  ?>"
                    style="font-size: 14px;font-weight: bolder;">Unattended</button>




            </td>
        </tr>

        <?php } ?>
    </tbody>
</table>



<div class="modal fade" id="orderDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- <form method='POST' action='functions/orders_action.php'> -->
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name='trans_id' id="m_trans_id" hidden>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Order Number</label>
                            <input type="email" class="form-control" id="order_code" aria-describedby="emailHelp"
                                readonly style='text-align:center;font-size:20px;font-weight:bold;'>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Order Date</label>
                            <input type="email" class="form-control" id="date_order" aria-describedby="emailHelp"
                                readonly style='text-align:center;font-size:20px;font-weight:bold;'>
                        </div>
                    </div>
                </div>
                <hr>
                <div id='address_customer'> </div>
                <hr>
                <h6>Product Order List</h6>
                <div id='list_purchased_prod'> </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" name='confirm' class="btn btn-warning btnSubmitModal" id='btnSubmitModal'>Upload
                    Proof
                    Delivery</button>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>


<div class="modal fade" id="uploadProofModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Proof of Delivery For Order
                    BNC_<?php echo $tid  ?></h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form enctype="multipart/form-data" method="post" action="action_order.php">
                <div class="modal-body">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQyHlhRBUevbh8DcWe7o5epTHj3PS0o7vsV1A&usqp=CAU"
                        id="img<?php echo $tid  ?>" style="width:100%;height:400px;">
                    <input type="file" name="image" id="<?php echo $tid ?>" class="form-control mt-2" accept="image/*"
                        required>
                </div>
                <input type="hidden" name="tid" value="<?php echo $tid ?>">
                <div class="modal-footer">

                    <button type="submit" name="uploadproof" class="btn btn-light text-primary"
                        style="font-size:13px">Mark as Complete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#<?php echo $tid?>').change(function() {

        if (this.files[0].type != "image/jpeg" && this.files[0].type !=
            "image/png" && this.files[0].type != "image/gif") {
            alert("Sorry invalid file type. Please upload an image");
        } else {
            $('#img<?php echo $tid?>').attr('src', URL.createObjectURL(this.files[
                0]));
        }
    })

});
</script>


<script>
$('.confirmd').click(function() {
    //
    var od = $(this).data('od');
    var date = $(this).data('date');
    var userid = $(this).data('userid');

    console.log(userid);
    $('#orderDetails').modal('show')
    $('#date_order').val(date)
    $('#order_code').val('MN_' + od)
    $('#m_trans_id').val(od)

    function fetch_table() {

        var trans_id = (od);
        $.ajax({
            url: "fetch/view_order_details.php",
            method: "POST",
            data: {
                trans_id: trans_id,
            },
            success: function(data) {
                $('#list_purchased_prod').html(data);
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
                $('#address_customer').html(data);
            }
        });
    }
    fetchAddress();


})

$('.btnSubmitModal').click(function() {
    $('#orderDetails').modal('hide');
    $('#uploadProofModal').modal('show');


})
</script>