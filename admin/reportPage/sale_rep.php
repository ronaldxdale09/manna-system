<div class="row mb-4">

    <div class="col-md-4">
        <div class="card shadow border-warning">
            <div class="card-body">
                <center>
                    <h4 style="font-weight: bolder;text-align: center;" class="text-dark">
                        Total Sales Today <br>


                        <?php 
                $current_date = date('F d, Y');
             $total_today  = mysqli_query($con, "SELECT  sum(total) as total from transaction
             left join trans_record on transaction.tid = trans_record.transaction_id where DATE(datecreated) = CURDATE();");
             $total_today = mysqli_fetch_array($total_today);
              echo  '₱ '.number_format($total_today['total'],2);     
          
             ?>

                    </h4>
                    <?php echo $current_date?>
                </center>
            </div>

        </div>

    </div>

    <div class="col-md-4">
        <div class="card shadow border-success">
            <div class="card-body">
                <center>
                    <h4 style="font-weight: bolder;text-align: center;" class="text-dark">
                        Total Sales this Month <br>


                        <?php 
            $current_month_year = date('F Y');
            $total_month  = mysqli_query($con, "SELECT  sum(total) as total from transaction
            left join trans_record on transaction.tid = trans_record.transaction_id where  MONTH(datecreated) = MONTH(CURDATE())");
            $total_month = mysqli_fetch_array($total_month);
             echo  '₱ '.number_format($total_month['total'],2);     

            ?>

                    </h4>
                    <?php echo $current_month_year?>
                </center>
            </div>


        </div>

    </div>


    <div class="col-md-4">
        <div class="card shadow border-danger">
            <div class="card-body">
                <center>
                    <h4 style="font-weight: bolder;text-align: center;" class="text-dark">
                        Total Sales this Year <br>


                        <?php 
             $current_year = date('Y');
            $total_year  = mysqli_query($con, "SELECT  sum(total) as total from transaction
            left join trans_record on transaction.tid = trans_record.transaction_id where year(datecreated) = year(CURDATE())");
            $total_year = mysqli_fetch_array($total_year);
             echo  '₱ '.number_format($total_year['total'],2);     

            ?>

                    </h4>
                    <?php echo $current_year?>
                </center>
            </div>


        </div>

    </div>


</div>

<table id="table-shelves" class="table display nowrap" style="width:100%;">
    <?php

     $retail = mysqli_query($con,"SELECT YEAR(date_ordered) AS year,MONTHNAME(date_ordered) AS month,
     SUM(CASE WHEN MONTHNAME(date_ordered) = 'January' THEN total END) AS JAN,
     SUM(CASE WHEN MONTHNAME(date_ordered) = 'February' THEN total END) AS FEB,
     SUM(CASE WHEN MONTHNAME(date_ordered) = 'March' THEN total END) AS MAR,
     SUM(CASE WHEN MONTHNAME(date_ordered) = 'April' THEN total END) AS APR,
     SUM(CASE WHEN MONTHNAME(date_ordered) = 'May' THEN total END) AS MAY,
     SUM(CASE WHEN MONTHNAME(date_ordered) = 'June' THEN total END) AS JUNE,
     SUM(CASE WHEN MONTHNAME(date_ordered) = 'July' THEN total END) AS JULY,
     SUM(CASE WHEN MONTHNAME(date_ordered) = 'August' THEN total END) AS AUG,
     SUM(CASE WHEN MONTHNAME(date_ordered) = 'September' THEN total END) AS SEP,
     SUM(CASE WHEN MONTHNAME(date_ordered) = 'October' THEN total END) AS OCT,
     SUM(CASE WHEN MONTHNAME(date_ordered) = 'November' THEN total END) AS NOV,
     SUM(CASE WHEN MONTHNAME(date_ordered) = 'December' THEN total END) AS DECE
 FROM trans_record WHERE YEAR(date_ordered) = 2023 GROUP BY month");        

        ?>

    <thead class='table-dark' style="width:100%;font-size: 13px;">
        <tr>

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

<div class="row">
    <div class="col-sm-8">col-sm-8</div>
    <div class="col-sm-4">col-sm-4</div>
</div>