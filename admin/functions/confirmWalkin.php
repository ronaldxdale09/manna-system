<?php 
session_start();
include '../../connections/connect.php';
  if (isset($_POST['confirm'])) {
    echo $total_amount = preg_replace('/[^A-Za-z0-9!. ]/', '',$_POST['total_amount']);
    echo $transaction_id = $_POST['transaction_id'];




    $listTrans = mysqli_query($con, "SELECT * from trans_record where transaction_id='$transaction_id'");
    
    
    
    while ($row = mysqli_fetch_array($listTrans)) {


      echo $product_id= $row['prod_id'];
      echo $product_quantity= $row['quantity'];

   

      // Minus from the NTC Bodega
      $p_qty = mysqli_query($con, "SELECT * from product_quantity where prod_id='$product_id'");
      $p_arr = mysqli_fetch_array($p_qty);
      
      $inv = $p_arr['quantity'];

      $sql = mysqli_query($con, "SELECT * from production_log where prod_id='$product_id' AND status='ACTIVE' ORDER BY `production_code` DESC LIMIT 1");  
      $log = mysqli_fetch_array($sql);

      $prod_log_qty =  $log['qty_remaining'];



      $newQty = (float)$inv - ((float)$product_quantity );
      $newQty_log = (float)$prod_log_qty - ((float)$product_quantity );

      $sql = "UPDATE  product_quantity set quantity ='$newQty' WHERE  prod_id='$product_id'";
      $results = mysqli_query($con, $sql);


      $update = "UPDATE  production_log set qty_remaining ='$newQty_log' WHERE  prod_id='$prod_id'
      AND status='ACTIVE' ORDER BY `production_code` DESC LIMIT 1";
      $res = mysqli_query($con, $update);


    }

          
    $update = "UPDATE  transaction set status ='walkin-completed' WHERE  tid='$transaction_id'";
    $results = mysqli_query($con, $update);

     
    header("Location: ../walkin_record.php");
   
                              
    exit();              
   }
 ?>