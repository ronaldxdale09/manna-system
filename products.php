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

            <li id="login_li"><a href="login.php">Login</a></li>
            <li id="sign_li"><a href="create_account.php">Sign Up</a></li>
            <li><a class="cart_button" href="cart.php"><span
                        class="badge bg-dark"><?php echo count($_SESSION['cart']); ?></span> <i
                        class="fas fa-cart-plus"></i> <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
        </ul>
    </header>

    <br>

    <div class="container_">
        <h2 style="font-weight: 700;">PRODUCTS</h2>
        <br>

        <?php 
               //info message
               if(isset($_SESSION['message'])){
                ?>
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-6">
                                <div class="alert alert-warning text-center">
                                    <?php echo $_SESSION['message']; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                unset($_SESSION['message']);
            }
               ?>
        <div class="tab-content" id="nav-tabContent">
            <!-- Breads -->
            <div class="tab-pane fade show active" id="nav-breads" role="tabpanel" aria-labelledby="nav-breads-tab"
                tabindex="0">
                <div class="product_container">
                    <?php         
                    $record  = mysqli_query($con, "SELECT * from products ORDER BY product_id "); ?>

                    <?php while ($row = mysqli_fetch_array($record)) { ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="pro_per_one">
                                <div class="product_box_cart">
                                    <div class="product_box_circle">
                                        <!-- place product img here-->
                                        <img src="images/<?php echo $row['product_img']?>" alt="">
                                    </div>
                                    <div class="product_box_info"><?php echo $row['product_name']?> -
                                        <?php echo $row['size']?></div>
                                </div>
                                <div class="product_box_price">PHP. <?php echo $row['price']?></div>
                            </div>
                            <!-- <a href="function/add_cart.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-primary btn-sm"><span
                                    class="glyphicon glyphicon-plus"></span> Cart</a> -->
                            <div class="btn_bread_box">
                                <button
                                    onclick="window.location.href='function/add_cart.php?product_id=<?php echo $row['product_id']; ?>'"
                                    class="add_to_cart">
                                    Add To Cart
                                    <i class="far fa-cart-plus"></i></button>

                            </div>
                        </div>
                    </div>
                    <?php }?>


                </div>
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