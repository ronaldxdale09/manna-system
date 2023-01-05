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
 WHERE YEAR(date_ordered) = 2022 GROUP BY product.name");        

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