<?php
	session_start();

	//remove the product_id from our cart array
	$key = array_search($_GET['product_id'], $_SESSION['cart']);	
	unset($_SESSION['cart'][$key]);

	unset($_SESSION['qty_array'][$_GET['index']]);
	//rearrange array after unset
	$_SESSION['qty_array'] = array_values($_SESSION['qty_array']);

	$_SESSION['message'] = "Product deleted from cart";
	header('location: ../view_cart.php');
?>