<?php 
session_start();
include '../connections/connect.php';

		?>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php



if(isset($_POST['uploadproof'])){
	$tid = $_POST['tid'];

	 $image_name = $_FILES['image']['name'];
	 $tmp_name   = $_FILES['image']['tmp_name'];
	 $size       = $_FILES['image']['size'];
	 $type       = $_FILES['image']['type'];
	 $error      = $_FILES['image']['error'];
			                                                                                                                                    
	 $fileName =basename($_FILES['image']['name']);
	
	 $uploads_dir = '../img/Proof_of_delivery';
	 move_uploaded_file($tmp_name , $uploads_dir .'/'.$fileName);

	$confirm = "UPDATE `transaction` SET `status`='delivered' , `photo_proof`='$fileName' WHERE tid = '$tid' ";
	mysqli_query($con,$confirm);


    
    // get total
    $sql = "SELECT sum(total) as total_pay from trans_record where transaction_id = '$tid'  ";
    $res = mysqli_query($con,$sql);
    $arr = mysqli_fetch_array($res);

    $total_amount = $arr['total_pay'];
    $dateNow = date("Y-m-d");

	$courier_id = $_POST['courier_id'];

	 // check for existing rec
	 $sql_check = "SELECT * from courier_trans where date = '$dateNow'";
	 $res = mysqli_query($con,$sql_check);

	 $count = mysqli_num_rows($res);

	 if ($count ==0 ){
		$sql = "INSERT INTO `courier_trans`(user_id, date,total_amount,total_cash_onhand,total_remit) 
		VALUES ('$courier_id','$dateNow','$total_amount','$total_amount',0)";
		mysqli_query($con,$sql);
	 }
	 else {
		$row = mysqli_fetch_array($res);
		$trans_id = $row['courier_trans_id'];
		$new_total = $row['total_amount'] + $total_amount;
		$new_total_cash = $row['total_cash_onhand'] + $total_amount;
		$sql = "UPDATE `courier_trans` SET `total_amount`='$new_total' , `total_cash_onhand`='$new_total_cash' WHERE courier_trans_id = '$trans_id' ";
		mysqli_query($con,$sql);

	 }
	


   


    
	$_SESSION['complete'] = 1;
	header('location:index.php');


	
}
 ?>