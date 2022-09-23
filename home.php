
<?php 
include('function/db.php');
//initialize cart if not set or is unset
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

//unset qunatity
unset($_SESSION['qty_array']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manna | Home</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- stylesheet -->
    <link rel="stylesheet" href="stylesheet/home.css">
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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

</head>

<body>
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
           
            <li></li>
            <li id="login_li"><a href="login.php">Login</a></li>
            <li id="sign_li"><a href="create_account.php">Sign Up</a></li>
           	<li><a href="view_cart.php"><span class="badge"><?php echo count($_SESSION['cart']); ?></span> Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
        </ul>
    </header>
    <br>
    <!-- This container is to maintain the width of 80% of the content-->
    <div class="container_">

        <!-- CONTENT HEADER -->
        <div class="intro">
            <div class="left">
                <h1>
                    <font color="#193bb1">Healthy, delicious and faithfully</font> <br>
                    <font color="#fda50f">baked fresh!</font>
                </h1>
 <Br>
                <a href="products.php" > <i class="fa fa-shopping-cart" ></i>    Order Now!</a>
            </div>
            <img src="assets/img/right_intro.jpg" alt="">
        </div>
        <br>
        <br>
        <!-- FEATURES -->
        <div class="features">
            <h2>Top Features</h2>
            <center>
                <b>Top Features created just for you.</b>
            </center>
            <br>
            <br>
            <div class="feature_card">
                <div class="card_info" data-aos="fade-up" data-aos-anchor-placement="center-center">
                    <div class="one">
                        <p>&nbsp;</p>
                    </div>
                    <div class="two">
                        <p>Best Quality Bread in Town</p>
                    </div>
                    <div class="three"><i class="fa fa-hat-chef"></i></div>
                </div>
                <div class="card_info" id="two" data-aos="fade-up" data-aos-anchor-placement="center-center" data-aos-delay="200">
                    <div class="one"></div>
                    <div class="two">
                        <p>Quick Pickup and Delivery</p>
                    </div>
                    <div class="three"><i class="far fa-truck"></i></div>
                </div>
                <div class="card_info" id="three" data-aos="fade-up" data-aos-anchor-placement="center-center" data-aos-delay="300">
                    <div class="one"></div>
                    <div class="two">
                        <p>Mode of Payment made easier</p>
                    </div>
                    <div class="three"><i class="fa fa-money-bill"></i></div>
                </div>
                <div class="card_info" id="four" data-aos="fade-up" data-aos-anchor-placement="center-center" data-aos-delay="400">
                    <div class="one"></div>
                    <div class="two">
                        <p>Precise product description</p>
                    </div>
                    <div class="three"><i class="far fa-file"></i></div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <h3 style="font-weight: 700;">TOP PRODUCTS</h3>
            <br>
            <div class="products">
                <!-- product card -->
                <div class="product">
                    <div class="circle">
                        <img src="assets/img/product.png" alt=""></div>
                    <div class="bottom_box">
                        <p>Monthly Sales 4K+</p>
                    </div>
                    <div class="info">
                        <p>Cream Bread 120g</p>
                    </div>
                </div>
                <div class="product">
                    <div class="circle">
                        <img src="assets/img/product.png" alt=""></div>
                    <div class="bottom_box">
                        <p>Monthly Sales 4K+</p>
                    </div>
                    <div class="info">
                        <p>Cream Bread 120g</p>
                    </div>
                </div>
                <div class="product">
                    <div class="circle">
                        <img src="assets/img/product.png" alt=""></div>
                    <div class="bottom_box">
                        <p>Monthly Sales 4K+</p>
                    </div>
                    <div class="info">
                        <p>Cream Bread 120g</p>
                    </div>
                </div>
                <div class="product">
                    <div class="circle">
                        <img src="assets/img/product.png" alt=""></div>
                    <div class="bottom_box">
                        <p>Monthly Sales 4K+</p>
                    </div>
                    <div class="info">
                        <p>Cream Bread 120g</p>
                    </div>
                </div>
                <div class="product">
                    <div class="next">

                        <a href="#">
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <script src="scripts/our_product_nav_bar.js"></script>
        <div class="our_products">
            <h2>Our Products</h2>
            <ul>
                <li class="nav-link active-link">
                    <a href="#">Breads</a>
                    <div class="underline"></div>
                </li>
                <li class="nav-link">
                    <a href="#">Buns</a>
                    <div class="underline"></div>
                </li>
                <li class="nav-link">
                    <a href="#">Biscuits</a>
                    <div class="underline"></div>
                </li>
                <li class="nav-link">
                    <a href="#">Cakes</a>
                    <div class="underline"></div>
                </li>
                <li class="nav-link">
                    <a href="#">Others</a>
                    <div class="underline"></div>
                </li>
            </ul>
        </div>
    </div>

    <!-- CREAM BREAD img outside the container to occupy the 100% of screen size-->
    <img src="assets/img/our_product.jpg" class="our_product_bg_img">
    <br>
    <br>
    <br>

    <div class="container_">
        <div class="bread_container">
            <h2>Breads</h2>
            <br>
            <div class="breads">
                <div class="bread" data-aos="zoom-in-up">
                    <center>
                        <div class="bread_top">
                            <div class="bread_circle">
                                <img src="assets/img/product.png" alt="">
                            </div>
                        </div>
                    </center>
                    <div class="bread_bottom">
                        <p>Cream Bread 120g</p>
                        <div class="btn_bread_box">
                            <button type="button" class="add_to_cart">Add To Cart <i class="far fa-cart-plus"></i></button>
                            <button type="button" class="buy_now">Buy Now</button>
                        </div>
                    </div>
                </div>
                <div class="bread" data-aos="zoom-in-up">
                    <center>
                        <div class="bread_top">
                            <div class="bread_circle">
                                <img src="assets/img/product.png" alt="">
                            </div>
                        </div>
                    </center>
                    <div class="bread_bottom">
                        <p>Cream Bread 120g</p>
                        <div class="btn_bread_box">
                            <button type="button" class="add_to_cart">Add To Cart <i class="far fa-cart-plus"></i></button>
                            <button type="button" class="buy_now">Buy Now</button>
                        </div>
                    </div>
                </div>
                <div class="bread" data-aos="zoom-in-up">
                    <center>
                        <div class="bread_top">
                            <div class="bread_circle">
                                <img src="assets/img/product.png" alt="">
                            </div>
                        </div>
                    </center>
                    <div class="bread_bottom">
                        <p>Cream Bread 120g</p>
                        <div class="btn_bread_box">
                            <button type="button" class="add_to_cart">Add To Cart <i class="far fa-cart-plus"></i></button>
                            <button type="button" class="buy_now">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer data-aos="fade-up">
        <div class="footer_left">
            <h2>Mannafest Food Inc.</h2>
            <br>
            <p>One of the leading company that
                <br> provides the best quality of bread in town</p>
            <br>
            <br>
            <p id="footer_p_location">Sapphire St.,
                <br> Santiago Rd.,
                <br> Lumbangan, Divisoria
                <br> Zamboanga City, Philippines 7000 Contact Us: 062-926-1993
                <br> Email: mannafest_zam@yahoo.co</p>
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

    <!-- jQuery cdn-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <!-- animate on scroll script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init(); //initializing script animate on scroll
    </script>
</body>

</html>