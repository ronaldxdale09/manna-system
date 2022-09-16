<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manna | Product Specification</title>

    <!-- stylesheet -->
    <link rel="stylesheet" href="../stylesheet/rate_star.css">
    <link rel="stylesheet" href="../stylesheet/main.css">
    <link rel="stylesheet" href="../stylesheet/footer.css">
    <link rel="stylesheet" href="../stylesheet/header.css">
    <link rel="stylesheet" href="../stylesheet/specification.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    
    <!-- animte on scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- manna icon -->
    <link rel="icon" href="../assets/logo/logo.png" sizes="10x10">

    <!--font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
</head>
<body>
    <!-- ============ Header / Nav =========== -->
    <div class="header_bg">
        <img src="../assets/img/header.png" id="header" alt="">
    </div>
    <header>
        <div class="logo">
            <a href="../home.php">
                <img src="../assets/logo/logo_transparent.png" alt="">
            </a>
        </div>
        <ul>
            <li> <input type="text" placeholder="Search"></li>
            <li><i class="fa fa-bell"></i></li>
            <li id="login_li"><a href="../index.php">Login</a></li>
            <li id="sign_li"><a href="../create_account.php">Sign Up</a></li>
            <li><i class="far fa-cart-plus"></i></li>
        </ul>
    </header>

    <br>
    <div class="container_">
        <div class="box">
            <div class="product_photo">
                <div class="product_box">
                    <div class="product_circle">
                        <!--img--> <img src="../assets/img/product.png" alt="">
                    </div>
                </div>
            </div>
            <div class="product_description">
                <h1>Cream Bread</h1>
                <br>
                <div class="product_ratings">
                    <span>4.9</span>
                    <fieldset class="rate">
                        <input type="radio" id="rating10" name="rating" value="5" /><label for="rating10" title="5 stars"></label>
                        <input type="radio" id="rating9" name="rating" value="4.5" /><label class="half" for="rating9" title="4 1/2 stars"></label>
                        <input type="radio" id="rating8" name="rating" value="4" /><label for="rating8" title="4 stars"></label>
                        <input type="radio" id="rating7" name="rating" value="3.5" /><label class="half" for="rating7" title="3 1/2 stars"></label>
                        <input type="radio" id="rating6" name="rating" value="3" /><label for="rating6" title="3 stars"></label>
                        <input type="radio" id="rating5" name="rating" value="2.5" /><label class="half" for="rating5" title="2 1/2 stars"></label>
                        <input type="radio" id="rating4" name="rating" value="2" /><label for="rating4" title="2 stars"></label>
                        <input type="radio" id="rating3" name="rating" value="1.5" /><label class="half" for="rating3" title="1 1/2 stars"></label>
                        <input type="radio" id="rating2" name="rating" value="1" /><label for="rating2" title="1 star"></label>
                        <input type="radio" id="rating1" name="rating" value="0.5" /><label class="half" for="rating1" title="1/2 star"></label>
                    </fieldset>
                    &nbsp; 
                    <!--break line-->
                    |
                    <div class="ratings__">
                        <p>&nbsp; <span>35</span>&nbsp; Ratings &nbsp; </p>
                    </div>
                    <!--break line-->
                    |
                    &nbsp; 
                    <div class="sold__">
                        <p>&nbsp; <span>50</span>&nbsp; Sold &nbsp; </p>
                    </div>
                </div>
                <br>
                <div class="product_price">
                    <h1>PHP <span>51.25</span></h1>
                </div>
                <br>
                <br>
                <div class="product_delivery_info">
                    <table width="100%">
                        <tr>
                            <td rowspan="2">Delivery</td>
                            <td>
                                Delivery To
                            </td>
                            <td>
                                <span>Divisoria, Zamboanga City</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Delivery Fee</td>
                            <td>PHP. <span>200.50</span></td>
                        </tr>

                        <tr>
                            <td>Flavor</td>
                            <td>
                                <button>Reg</button>
                                <button>Choco</button>
                                <button>Ube</button>
                            </td>
                        </tr>

                        <tr>
                            <td>Size</td>
                            <td>
                                <input type="text" placeholder="Size">
                            </td>
                        </tr>

                        <tr>
                            <td>Quantity</td>
                            <td>
                                <button type="button" onclick="minus_quantity()">-</button>
                                <input type="text" id="val_quantity">
                                <button type="button" onclick="add_quantity()">+</button>
                            </td>
                            <td>
                                <span>50 pieces available</span></td>
                        </tr>

                        <!-- Scripts of quantity -->
                        <script>
                            function minus_quantity() {
                                var cur_val = document.getElementById("val_quantity").value;

                                cur_val--;

                                document.getElementById("val_quantity").value = cur_val;

                                if(cur_val <= 0) 
                                    document.getElementById("val_quantity").value = 0;
                            }
                            function add_quantity() {
                                var cur_val = document.getElementById("val_quantity").value;

                                cur_val++;

                                document.getElementById("val_quantity").value = cur_val;

                                
                                if(cur_val <= 0) 
                                    document.getElementById("val_quantity").value = 0;

                            }
                        </script>

                        <tr>
                            <td colspan="2">
                                <div class="btn_bread_box">
                                    <button type="button" class="add_to_cart">Add To Cart <i class="far fa-cart-plus"></i></button>
                                    <button type="button" class="buy_now">Buy Now</button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- 2nd box -->
        <div class="product_stock">
            <h3>Product Specification</h3>

            <br>
            <br>
            <br>

            <div class="product_stock_info">
                <p>Category</p> 
                <span>Cream Bread</span>
            </div>
            <div class="product_stock_info">
                <p>Stock</p> 
                <span>50</span>
            </div>
        </div>
        
        <!-- Bootstrap link for tabs only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <!-- 3rd box -->
        <div class="product_stock">
            <h3>Product Ratings</h3>
            <br>
            <br>
            <div id="com_rate">
                
                <div class="hor_ratings">
                    <p><span>4.9</span> out of 5</p>
                    <fieldset class="rate">
                        <input type="radio" id="rating10" name="rating" value="5" /><label for="rating10" title="5 stars"></label>
                        <input type="radio" id="rating9" name="rating" value="4.5" /><label class="half" for="rating9" title="4 1/2 stars"></label>
                        <input type="radio" id="rating8" name="rating" value="4" /><label for="rating8" title="4 stars"></label>
                        <input type="radio" id="rating7" name="rating" value="3.5" /><label class="half" for="rating7" title="3 1/2 stars"></label>
                        <input type="radio" id="rating6" name="rating" value="3" /><label for="rating6" title="3 stars"></label>
                        <input type="radio" id="rating5" name="rating" value="2.5" /><label class="half" for="rating5" title="2 1/2 stars"></label>
                        <input type="radio" id="rating4" name="rating" value="2" /><label for="rating4" title="2 stars"></label>
                        <input type="radio" id="rating3" name="rating" value="1.5" /><label class="half" for="rating3" title="1 1/2 stars"></label>
                        <input type="radio" id="rating2" name="rating" value="1" /><label for="rating2" title="1 star"></label>
                        <input type="radio" id="rating1" name="rating" value="0.5" /><label class="half" for="rating1" title="1/2 star"></label>
                    </fieldset>
                </div>
                <div class="rating_comment">
                    <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All</button>
                        <button class="nav-link" id="nav-five-tab" data-bs-toggle="tab" data-bs-target="#nav-five" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">5 Star <span>(405)</span></button>
                        <button class="nav-link" id="nav-four-tab" data-bs-toggle="tab" data-bs-target="#nav-four" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">4 Star <span>(102)</span></button>
                        <button class="nav-link" id="nav-three-tab" data-bs-toggle="tab" data-bs-target="#nav-three" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">3 Star <span>(20)</span></button>
                        <button class="nav-link" id="nav-two-tab" data-bs-toggle="tab" data-bs-target="#nav-two" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">2 Star <span>(4)</span></button>
                        <button class="nav-link" id="nav-one-tab" data-bs-toggle="tab" data-bs-target="#nav-one" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">1 Star <span>(0)</span></button>
                    </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab" tabindex="0">All Comments</div>
                    <div class="tab-pane fade" id="nav-five" role="tabpanel" aria-labelledby="nav-five-tab" tabindex="0">5 Stars</div>
                    <div class="tab-pane fade" id="nav-four" role="tabpanel" aria-labelledby="nav-four-tab" tabindex="0">4 Stars</div>
                    <div class="tab-pane fade" id="nav-three" role="tabpanel" aria-labelledby="nav-three-tab" tabindex="0">3 Stars</div>
                    <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab" tabindex="0">2 Stars</div>
                    <div class="tab-pane fade" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab" tabindex="0">0 Star</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap scripts for tabs only -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </div>

    <br>

    <!-- ============== FOOTER =============== -->
    <footer data-aos="fade-up">
        <div class="footer_left">
            <h2>Mannafest Food Inc.</h2>
            <br>
            <p>One of the leading company that 
                <br>
                provides the best quality of bread in town</p>
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
                Email: mannafest_zam@yahoo.co</p>
                <br>
                <br>
                <p>Follow Us</p>
                <img id="fol_us" src="../assets/logo/facebook.png" alt="">
                <img id="fol_us" src="../assets/logo/instagram.png" alt="">
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