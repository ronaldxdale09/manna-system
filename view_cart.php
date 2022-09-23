<!DOCTYPE html>
<html lang="en">
<?php
include('function/db.php');
	//initialize cart if not set or is unset
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart'] = array();
	}

	//unset qunatity
	unset($_SESSION['qty_array']);
?>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manna | Products</title>

    <!-- stylesheet -->
    <link rel="stylesheet" href="stylesheet/main.css">
    <link rel="stylesheet" href="stylesheet/footer.css">
    <link rel="stylesheet" href="stylesheet/header.css">


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <!-- animte on scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- manna icon -->
    <link rel="icon" href="assets/logo/logo.png" sizes="10x10">

    <!--font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</head>

<body>
    <link rel="stylesheet" href="stylesheet/products.css">
    <!-- ============ Header / Nav =========== -->
    <div class="header_bg">
        <img src="assets/img/header.png" id="header" alt="">
    </div>
    <header>
        <div class="logo">
            <a href="home.php">
                <img src="assets/logo/logo_transparent.png" alt="">
            </a>
        </div>
        <ul>

            <li id="login_li"><a href="index.php">Login</a></li>
            <li id="sign_li"><a href="create_account.php">Sign Up</a></li>
            <li><a class="cart_button" href="view_cart.php"><span
                        class="badge bg-dark"><?php echo count($_SESSION['cart']); ?></span> <i
                        class="fas fa-cart-plus"></i> <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
        </ul>
    </header>

    <br>

    <div class="container_">
        <h2 style="font-weight: 700;">PRODUCTS</h2>
        <br>
        <div class="row">
            <div class="col-sm-12 col-sm-offset-2">
                <?php 
			if(isset($_SESSION['message'])){
				?>
                <div class="alert alert-info text-center">
                    <?php echo $_SESSION['message']; ?>
                </div>
                <?php
				unset($_SESSION['message']);
			}

			?>
                <form method="POST" action="save_cart.php">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th></th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </thead>
                        <tbody>
                            <?php
						//initialize total
						$total = 0;
						if(!empty($_SESSION['cart'])){
						//connection
						//create array of initail qty which is 1
 						$index = 0;
 						if(!isset($_SESSION['qty_array'])){
 							$_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
 						}
						$sql = "SELECT * FROM products WHERE product_id IN (".implode(',',$_SESSION['cart']).")";
						$query = $con->query($sql);
							while($row = $query->fetch_assoc()){
								?>
                            <tr>
                                <td>
                                    <a href="function/delete_item.php?product_id=<?php echo $row['product_id']; ?>&index=<?php echo $index; ?>"
                                        class="btn btn-danger btn-sm"><span
                                            class="far fa-trash"></span></a>
                                </td>
                                <td><?php echo $row['product_name']; ?></td>
                                <td><?php echo number_format($row['price'], 2); ?></td>
                                <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
                                <td><input type="text" class="form-control"
                                        value="<?php echo $_SESSION['qty_array'][$index]; ?>"
                                        name="qty_<?php echo $index; ?>"></td>
                                <td><?php echo number_format($_SESSION['qty_array'][$index]*$row['price'], 2); ?></td>
                                <?php $total += $_SESSION['qty_array'][$index]*$row['price']; ?>
                            </tr>
                            <?php
								$index ++;
							}
						}
						else{
							?>
                            <tr>
                                <td colspan="4" class="text-center">No Item in Cart</td>
                            </tr>
                            <?php
						}

					?>
                            <tr>
                                <td colspan="4" align="right"><b>Total</b></td>
                                <td><b><?php echo number_format($total, 2); ?></b></td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="products.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>
                        Back</a>
                    <button type="submit" class="btn btn-success" name="save">Save Changes</button>
                    <a href="clear_cart.php" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
                        Clear Cart</a>
                    <a href="checkout.php" class="btn btn-success"><span class="glyphicon glyphicon-check"></span>
                        Checkout</a>
                </form>
            </div>
        </div>
    </div>

    <br>

    <!-- ============== FOOTER =============== -->
    <footer data-aos="fade-up">
        <div class="footer_left">
            <h2>Mannafest Food Inc.</h2>
            <br>
            <p>One of the leading company that
                <br>
                provides the best quality of bread in town
            </p>
            <br>
            <br>
            <p id="footer_p_location">Sapphire St.,
                <br>
                Santiago Rd.,
                <br>
                Lumbangan, Divisoria
                <br>
                Zamboanga City, Philippines 7000
                Contact Us: 062-926-1993
                <br>
                Email: mannafest_zam@yahoo.co
            </p>
            <br>
            <br>
            <p>Follow Us</p>
            <img id="fol_us" src="assets/logo/facebook.png" alt="">
            <img id="fol_us" src="assets/logo/instagram.png" alt="">
            <br>
            <br>
            <br>
            <br>
            <p id="copyright">Copyright &copy 2022 Mannafest Food Incorporated, All Rights Reserve</p>
        </div>
        <div class="footer_middle">
            <ul>
                <li><a href="">About Us</a></li>
                <li><a href="">Blog</a></li>
                <li><a href="">Contact Us</a></li>
                <li><a href="">Return Policy</a></li>
                <li><a href="">Help</a></li>
            </ul>
        </div>
        <div class="footer_right">
            <h2>We love to it hear from you!</h2>
            <br>
            <form action="">
                <div class="div_name_email">
                    <input type="text" placeholder="Name">
                    <input type="email" placeholder="Email">
                </div>
                <div class="feedback">
                    <textarea name="" id="" cols="30" rows="10" placeholder="Your feedback"></textarea>
                </div>
                <center>
                    <button type="submit" id="feedback_submit">SUBMIT</button>
                </center>
            </form>
        </div>
    </footer>

    <!-- animate on scroll script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
    AOS.init(); //initializing script animate on scroll
    </script>
</body>

</html>