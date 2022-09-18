
<?php include('includes/header.php') ?>
<body>
<link rel="stylesheet" href="../../stylesheet/products.css">
    <!-- ============ Header / Nav =========== -->
    <div class="header_bg">
        <img src="../../assets/img/header.png" id="header" alt="">
    </div>
    <header>
        <div class="logo">
            <a href="../../home.php">
                <img src="../../assets/logo/logo_transparent.png" alt="">
            </a>
        </div>
        <ul>
            <li> <input type="text" placeholder="Search"></li>
            <li><i class="fa fa-bell"></i></li>
            <li id="login_li"><a href="../../index.php">Login</a></li>
            <li id="sign_li"><a href="../../create_account.php">Sign Up</a></li>
            <li><i class="far fa-cart-plus"></i></li>
        </ul>
    </header>

    <br>

    <div class="container_">
        <h2 style="font-weight: 700;">PRODUCTS</h2>
        <br>
       
        <div class="tab-content" id="nav-tabContent">
            <!-- Breads -->
            <div class="tab-pane fade show active" id="nav-breads" role="tabpanel" aria-labelledby="nav-breads-tab"
                tabindex="0">
                <div class="product_container">
                <?php $record  = mysqli_query($con, "SELECT * from products ORDER BY product_id "); ?>

                <?php while ($row = mysqli_fetch_array($record)) { ?>

                    <div class="pro_per_one">
                        <div class="product_box_cart">
                            <div class="product_box_circle">
                                <!-- place product img here-->
                                <img src="../../images/<?php echo $row['product_img']?>" alt="">
                            </div>
                            <div class="product_box_info"><?php echo $row['product_name']?> - <?php echo $row['size']?></div>
                        </div>
                        <div class="product_box_price">PHP. <?php echo $row['price']?></div>
                    </div>
                    <?php }?>


                </div>
            </div>

            <!-- Buns -->
            <div class="tab-pane fade" id="nav-buns" role="tabpanel" aria-labelledby="nav-buns-tab" tabindex="0">
                <div class="product_container">
                    <div class="pro_per_one">
                        <div class="product_box_cart">
                            <div class="product_box_circle">

                                <!-- place product img here-->
                            </div>
                            <div class="product_box_info">Cream Bread 120g</div>
                        </div>
                        <div class="product_box_price">PHP. 39.50</div>
                    </div>
                    <!-- 2nd Product Container -->
                    <div class="pro_per_one">
                        <div class="product_box_cart">
                            <div class="product_box_circle">
                                <!-- place product img here-->
                            </div>
                            <div class="product_box_info">Cream Bread 120g</div>
                        </div>
                        <div class="product_box_price">PHP. 39.50</div>
                    </div>
                    <!-- 3rd Product Container -->
                    <div class="pro_per_one">
                        <div class="product_box_cart">
                            <div class="product_box_circle">
                                <!-- place product img here-->
                            </div>
                            <div class="product_box_info">Cream Bread 120g</div>
                        </div>
                        <div class="product_box_price">PHP. 39.50</div>
                    </div>
                </div>
            </div>
            <!-- For biscuits -->
            <div class="tab-pane fade" id="nav-biscuits" role="tabpanel" aria-labelledby="nav-biscuits-tab"
                tabindex="0">Empty record for Biscuits...</div>
            <!-- Cakes-->
            <div class="tab-pane fade" id="nav-cakes" role="tabpanel" aria-labelledby="nav-cakes-tab" tabindex="0">Empty
                record for Cakes...</div>
            <!-- Others-->
            <div class="tab-pane fade" id="nav-others" role="tabpanel" aria-labelledby="nav-others-tab" tabindex="0">No
                record...</div>
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
            <img id="fol_us" src="../../assets/logo/facebook.png" alt="">
            <img id="fol_us" src="../../assets/logo/instagram.png" alt="">
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