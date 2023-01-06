<?php 
session_start();
include '../../connections/connect.php';

// Get the expiration dates of all the products
$query = "SELECT production_code,prod_id, exp_date FROM production_log WHERE status='ACTIVE' or status='LOW'";
$result = $con->query($query);



if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['prod_id'];
        $expiration_date = $row['exp_date'];
        $production_code = $row['production_code'];
        // Check if the product is expired
        if (time() > $expiration_date) {
          // The product is expired
          echo "Product with ID $id is expired.<br>";
          $query = "UPDATE `production_log` SET status='EXPIRED' WHERE prod_id='$id' and production_code='$production_code' ";         
          $results = mysqli_query($con, $query);



          

        } else {
          // The product is not expired
          echo "Product with ID $id is not expired.<br>";
        }
    }
}


echo 'done';

?>