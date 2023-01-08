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

        <div class="row">
            <div class="col-sm-6">
                <div class="card" style="width:100%;max-width:100%;max-height:210px;">
                    <canvas id="inventoryList_chart" style="width:100%;max-width:100%;max-height:251px;"></canvas>
                </div>
            </div>
            <div class="col-sm-6">col-sm-4</div>
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

<script>
inventoryCount_chart = document.getElementById("inventoryList_chart");




// new Chart(inventoryCount_chart, {
//     options: {
//         "responsive": true,
//         "maintainAspectRatio": false,
//         plugins: {
//             legend: {
//                 position: 'left',
//             },
//             title: {
//                 display: true,
//                 text: 'Inventory Breakdown',
//             },
//         },
//     },
//     type: 'pie', //Declare the chart type 
//     data: {
//         labels: <?php echo json_encode($top_prod) ?>,
//         datasets: [{
//             label: 'Top Selling Products',
//             data: <?php echo json_encode($top_qty) ?>,
//             backgroundColor: [
//                 '#556B2F', '#B0E0E6', '#191970', '#ADFF2F'
//             ],
//             hoverOffset: 4
//         }]
//     },
// });
</script>