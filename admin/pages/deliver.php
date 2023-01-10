<?php $results  = mysqli_query($con, " SELECT *,transaction.status as stat FROM `transaction`
    LEFT JOIN accounts ON transaction.user_id = accounts.user_id
    WHERE transaction.status='otw'"); ?>
<table id="production_table" class="table table-hover" style="width:100%;">
    <thead class="table-warning">
        <tr style='font-size:14px'>
            <th>Order Code</th>
            <th>Date</th>
            <th>Customer</th>
            <th>Total Price</th>
            <th>Rider\Courier</th>
            <th>Status</th>



        </tr>
    </thead>
    <tbody style='font-size:40px'>
        <?php while ($row = mysqli_fetch_array($results)) {
                    $tid=  $row['tid'];
                    $gettrans_records = "select sum(total) as total_pay from trans_record where transaction_id = '$tid'  ";
                    $gettingtrans = mysqli_query($con,$gettrans_records);
                     $gtrans = mysqli_fetch_array($gettingtrans);

                  
                     $rider = str_replace("24,", "", $row['delivery_rider']);
                    
                ?>
        <tr>
            <td>MN_<?php echo $row['tid']; ?></td>
            <td><?php echo $row['datecreated']; ?></td>
            <td><?php echo $row['name'].' '.$row['lastname']; ?></td>
            <td>₱ <?php echo $gtrans['total_pay']; ?></td>
            <td><?php echo $rider; ?></td>
            <td>
                <i class="fa-solid fa-truck"></i> Status : <b>On the Way </b>
            </td>


        </tr>

        <?php } ?>
    </tbody>
</table>