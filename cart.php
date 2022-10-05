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
    <link rel="stylesheet" href="stylesheet/cart.css">
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
        <h2 style="font-weight: 700;">CART</h2>

        <div class="container-fluid">
            <div class="row">
                <aside class="col-lg-9">
                    <div class="card">
                        <div class="table-responsive">
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
                                <table class="table table-borderless table-shopping-cart">
                                    <thead class="text-muted">
                                        <tr class="small text-uppercase">
                                            <th scope="col">Product</th>
                                            <th scope="col" width="120">Quantity</th>
                                            <th scope="col" width="120">Price</th>
                                            <th scope="col" class="text-right d-none d-md-block" width="200"></th>
                                        </tr>
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
                                                <figure class="itemside align-items-center">
                                                    <div class="aside"><img
                                                            src="images/<?php echo $row['product_img']?>"
                                                            class="img-sm"></div>
                                                    <figcaption class="info"> <a href="#" class="title text-dark"
                                                            data-abc="true"><?php echo $row['product_name']; ?></a>
                                                        <p class="text-muted small">SIZE: <?php echo $row['size']; ?>
                                                    </figcaption>
                                                </figure>
                                            </td>


                                            <td>
                                                <div class="counter-p">
                                                    <span class="down" onClick='decreaseCount(event, this)'>-</span>
                                                    <input type="text" class="form-control"
                                                        value="<?php echo $_SESSION['qty_array'][$index]; ?>"
                                                        name="qty_<?php echo $index; ?>">
                                                    <span class="up" onClick='increaseCount(event, this)'>+</span>
                                                </div>
                                                <script src="../../static/js/cashier.js"></script>
                                            </td>



                                            <td>
                                                <div class="price-wrap"> <var class="price">₱
                                                        <?php echo number_format($_SESSION['qty_array'][$index]*$row['price'], 2); ?></var>
                                                    <small class="text-muted">₱ <?php echo $row['price']; ?> each
                                                    </small>
                                                </div>
                                            </td>
                                            <?php $total += $_SESSION['qty_array'][$index]*$row['price']; ?>
                                            <td>
                                                <a href="function/delete_item.php?product_id=<?php echo $row['product_id']; ?>&index=<?php echo $index; ?>"
                                                    class="btn btn-danger btn-sm"><span class="far fa-trash"></span></a>
                                            </td>
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

                                    </tbody>
                                </table>
                            </div>
                        </div>
                </aside>
                <aside class="col-lg-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <form>
                                <div class="form-group"> <label>Have coupon?</label>
                                    <div class="input-group"> <input type="text" class="form-control coupon" name=""
                                            placeholder="Coupon code"> <span class="input-group-append"> <button
                                                class="btn btn-primary btn-apply coupon">Apply</button> </span> </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">

                            <dl class="dlist-align">
                                <dt>Total price:</dt>
                                <dd class="text-right ml-3"> ₱ <?php echo number_format($total, 2); ?></dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Discount:</dt>
                                <dd class="text-right text-danger ml-3"> </dd>
                            </dl>

                            <dl class="dlist-align">
                                <dt>Total:</dt>
                                <dd class="text-right text-dark b ml-3"><strong> ₱
                                        <?php echo number_format($total, 2); ?></strong></dd>
                            </dl>

                            <hr> <a href="#" class="btn btn-out btn-primary btn-square btn-main" data-abc="true"> Make
                                Purchase </a> <a href="products.php"
                                class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">Continue
                                Shopping</a>
                        </div>
                    </div>
                </aside>
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

<script>
// for table quantity count
function increaseCount(a, b) {
    var input = b.previousElementSibling;
    var value = parseInt(input.value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    input.value = value;
}

function decreaseCount(a, b) {
    var input = b.nextElementSibling;
    var value = parseInt(input.value, 10);
    if (value > 1) {
        value = isNaN(value) ? 0 : value;
        value--;
        input.value = value;
    }
}
</script>