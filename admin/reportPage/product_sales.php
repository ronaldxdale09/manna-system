<div class="row">
    <div class="col-sm-9">
        <center>
            <h5 style="font-weight: bolder;">Product Trend</h5>
        </center>
        <table id="table-shelves" class="table display nowrap" style="width:100%;">
            <?php

        $retail = mysqli_query($con,"SELECT YEAR(date_ordered) AS year,MONTHNAME(date_ordered) AS month,name,
        MAX(CASE WHEN MONTHNAME(date_ordered) = 'January' THEN total END) AS JAN,
        MAX(CASE WHEN MONTHNAME(date_ordered) = 'February' THEN total END) AS FEB,
        MAX(CASE WHEN MONTHNAME(date_ordered) = 'March' THEN total END) AS MAR,
        MAX(CASE WHEN MONTHNAME(date_ordered) = 'April' THEN total END) AS APR,
        MAX(CASE WHEN MONTHNAME(date_ordered) = 'May' THEN total END) AS MAY,
        MAX(CASE WHEN MONTHNAME(date_ordered) = 'June' THEN total END) AS JUNE,
        MAX(CASE WHEN MONTHNAME(date_ordered) = 'July' THEN total END) AS JULY,
        MAX(CASE WHEN MONTHNAME(date_ordered) = 'August' THEN total END) AS AUG,
        MAX(CASE WHEN MONTHNAME(date_ordered) = 'September' THEN total END) AS SEP,
        MAX(CASE WHEN MONTHNAME(date_ordered) = 'October' THEN total END) AS OCT,
        MAX(CASE WHEN MONTHNAME(date_ordered) = 'November' THEN total END) AS NOV,
        MAX(CASE WHEN MONTHNAME(date_ordered) = 'December' THEN total END) AS DECE
        FROM trans_record   LEFT JOIN product on trans_record.prod_id = product.prod_id
        WHERE YEAR(date_ordered) = 2023 GROUP BY product.name");        

        ?>

            <thead class='table-dark' style="width:100%;font-size: 13px;">
                <tr>
                    <th>Product</th>
                    <th>January</th>
                    <th>Feb</th>
                    <th>Mar</th>
                    <th>Apr</th>
                    <th>May</th>
                    <th>Jun</th>
                    <th>Jul</th>
                    <th>Aug</th>
                    <th>Sept</th>
                    <th>Oct</th>
                    <th>Nov</th>
                    <th>Dec</th>

                </tr>
            </thead>
            <tbody style="width:100%;font-size: 14px;">
                <?php while ($row = mysqli_fetch_array($retail)) { ?>
                <tr>
                    <td><?php echo $row['name']?></td>
                    <td>₱<?php echo number_format((float)$row['JAN'], 2, '.', ',');?></td>
                    <td>₱<?php echo number_format((float)$row['FEB'], 2, '.', ',');?></td>
                    <td>₱<?php echo number_format((float)$row['MAR'], 2, '.', ',');?></td>
                    <td>₱<?php echo number_format((float)$row['APR'], 2, '.', ',');?></td>
                    <td>₱<?php echo number_format((float)$row['MAY'], 2, '.', ',');?></td>
                    <td>₱<?php echo number_format((float)$row['JUNE'], 2, '.', ',');?></td>
                    <td>₱<?php echo number_format((float)$row['JULY'], 2, '.', ',');?></td>
                    <td>₱<?php echo number_format((float)$row['AUG'], 2, '.', ',');?></td>
                    <td>₱<?php echo number_format((float)$row['SEP'], 2, '.', ',');?></td>
                    <td>₱<?php echo number_format((float)$row['OCT'], 2, '.', ',');?></td>
                    <td>₱<?php echo number_format((float)$row['NOV'], 2, '.', ',');?></td>
                    <td>₱<?php echo number_format((float)$row['DECE'], 2, '.', ',');?></td>



                </tr>
                <?php } ?>
            </tbody>
            <tfoot>

                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tfoot>
        </table>
        <!-- end table -->

        <center>
            <h5 style="font-weight: bolder;">Production Record</h5>
        </center>


        <div class="table-responsive">
            <?php $results  = mysqli_query($con, " SELECT * FROM `product` 
                                LEFT JOIN category ON product.cat_id =  category.cat_id
                                LEFT JOIN photo ON product.prod_id =  photo.prod_id"); ?>
            <table id="production_table" class="table table-hover" style="width:100%;">
                <thead class="table-warning">
                    <tr style='font-size:14px'>
                        <th hidden>prod_id</th>
                        <th>Barcode</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Cost</th>
                        <th>Price</th>
                        <th>Total Stock</th>

                        <th>Action</th>


                    </tr>
                </thead>
                <tbody style='font-size:40px'>
                    <?php while ($row = mysqli_fetch_array($results)) {
                                            if ($row['ingredients']== ','){
                                                $row['ingredients'] = 'N/A';
                                            } 

                                            $prod_id =$row['prod_id'];
                                            $sql  = mysqli_query($con, "SELECT production_log.prod_id, sum(production_log.qty_remaining) AS quantity
                                                FROM production_log
                                                LEFT JOIN product ON product.prod_id = production_log.prod_id
                                                WHERE production_log.prod_id='$prod_id' and production_log.status ='ACTIVE' or production_log.status ='LOW'");
                                                $arr = mysqli_fetch_array($sql);
                                            ?>
                    <tr>
                        <td hidden><?php echo $row['prod_id']; ?></td>
                        <td><?php echo $row['barcode']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['category_name']; ?></td>
                        <td><?php echo $row['cost']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td>
                            <div class='badge'>
                                <?php echo  (empty($arr['quantity'])) ? "0" : $arr['quantity']; ?>
                            </div>
                        </td>

                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-success btn-sm text-light btnViewProdDetails"
                                    style="font-size: 12px"><i class="fas fa-eye"></i></button>

                            </div>

                        </td>
                    </tr>
                    <?php } ?>
                </tbody>

            </table>

        </div>


        <center>
            <h5 style="font-weight: bolder;">Stock-out Record</h5>
        </center>


        <div class="table-responsive">
            <?php $results  = mysqli_query($con, " SELECT * FROM `transaction` 
                                LEFT JOIN trans_record on transaction.tid = trans_record.transaction_id
                                LEFT JOIN product ON trans_record.prod_id =  product.prod_id"); ?>
            <table id="stockout_table" class="table table-hover" style="width:100%;">
                <thead class="table-warning">
                    <tr style='font-size:14px'>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Barcode</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Transaction Type</th>


                    </tr>
                </thead>
                <tbody style='font-size:40px'>
                    <?php while ($row = mysqli_fetch_array($results)) {
                                       
                                            ?>
                    <tr>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['date_ordered']; ?></td>
                        <td><?php echo $row['barcode']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['total']; ?></td>
                        <td><?php echo $row['type']; ?></td>

                    </tr>

                    <?php } ?>
                </tbody>

            </table>

        </div>



        <!-- end column -->
    </div>
    <div class="col-sm-3">
        <center>
            <h5 style="font-weight: bolder;">Top Selling Product</h5>
        </center>
        <?php 
                   
                                         $side = mysqli_query($con, "SELECT trans_record.prod_id,name,sum(quantity) as qty from trans_record
                                          LEFT JOIN product on trans_record.prod_id = product.prod_id group by name");?>
        <table class="table table-hover">
            <thead class='table-warning'>
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


        <center>
            <h5 style="font-weight: bolder;">Top Rated Product</h5>
        </center>
        <?php 
                   
            $side = mysqli_query($con, "SELECT name,SUM(user_rating) as sum, COUNT(*) as count from review_table LEFT JOIN product on review_table.prod_id = product.prod_id
            group by name");
                ?>
        <table class="table table-hover">
            <thead class='table-warning'>
                <tr>
                    <th scope="col">Product </th>
                    <th scope="col">Rating</th>
                </tr>
            </thead> <?php 
                      while ($row = mysqli_fetch_array($side)) {
                        $sum = $row['sum'];
                        $count = $row['count'];
                        $avg_rating = $sum / $count;?> <tbody>
                <tr>
                    <td> <?php echo $row['name']?> </td>
                    <td> <?php echo number_format($avg_rating,2)?> </td>
                </tr> <?php } ?>
            </tbody>
        </table>


    </div>
</div>

<?php include('modal/production_modal.php')?>
<script>
$('#production_table').on('click', '.btnViewProdDetails', function() {


    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();
    $('#viewProductionDetails').modal('show');
    $('#p_name').val(data[2]);
    $('#p_category').val(data[3]);
    $('#p_cost').val(data[4]);
    $('#p_price').val(data[5]);

    function fetch_table() {
        var prod_id = data[0].replace(/\s/g, '');
        $.ajax({
            url: "table/production_details.php",
            method: "POST",
            data: {
                prod_id: prod_id,

            },
            success: function(data) {
                $('#view_prod_history').html(data);
            }
        });
    }
    fetch_table();
});
</script>