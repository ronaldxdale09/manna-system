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