<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manna | My Profile</title>

    <!-- stylesheet -->
    <link rel="stylesheet" href="../../stylesheet/profile.css">
    <link rel="stylesheet" href="../../stylesheet/main.css">
    <link rel="stylesheet" href="../../stylesheet/footer.css">
    <link rel="stylesheet" href="../../stylesheet/header.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <!-- animte on scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- manna icon -->
    <link rel="icon" href="../../assets/logo/logo.png" sizes="10x10">

    <!--font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
</head>
<body>
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
        <ul id="pro_ul">
            <li> <input type="text" placeholder="Search"></li>
            <li><i class="fa fa-bell"></i></li>
            <li><i class="far fa-user-circle"></i></li>
        </ul>
    </header>

    <br>
    
    <div class="container">
        <div class="box">
            <div class="side_nav">
                <ul class="nav_outer">
                    <li><i class="fa fa-user-circle"></i> Abby Quintos</li>
                    <li><i class="far fa-user"></i> Account Overview</li>
                    <li id="white">
                        <ul class="nav_inner">
                            <li>Profile</li>
                            <li>Addresses</li>
                            <li>Change Password</li>
                        </ul>
                    </li>
                    <li><i class="fa fa-file"></i> My Orders</li>
                </ul>
            </div>
            <div class="my_profile">
                <h4>My Profile</h4>
                <p id="manage_account">Manage Account</p>
                <br>
                <hr>
                <br>
                <form action="">
                    <div class="form_box">
                    
                        <div class="left">
                            <div class="pair">
                                <label for="">Username</label>
                                <span>user101993</span>
                            </div>
                            <div class="pair">
                                <label for="">First Name</label>
                                <input type="text">
                            </div>
                            <div class="pair">
                                <label for="">Last Name</label>
                                <input type="text">
                            </div>
                            <div class="pair">
                                <label for="">Email</label>
                                <input type="text">
                            </div>
                            <div class="pair">
                                <label for="">Phone Number</label>
                                <input type="number">
                            </div>
                            <div class="pair">
                                <label for="">Gender</label>
                                <div>
                                    <input type="radio" name="gender"> Male
                                    <input type="radio" name="gender"> Female
                                </div>
                            </div>
                            <div class="pair">
                                <label for="">Date of Birth</label>
                                <input type="date">
                            </div>
                        </div>
                        <div class="right">
                            <!-- if no img profile detected, display default -->
                            <img src="../../assets/img/user-circle.png" alt="">
                            <input type="file" class="custom-file-input" id="fileSelector">
                            <br>
                            <p>File Size: <span id="file_size"></span></p>
                            <p>File Type: <span id="file_type"></span></p>
                            <script>
                                var fileSelector = document.getElementById("fileSelector");
                                fileSelector.onchange = () => {
                                    document.getElementById("file_size").innerHTML = (fileSelector.files[0].size/1024).toFixed(2) + ' KB';
                                    document.getElementById("file_type").innerHTML = (fileSelector.files[0].type);
                                }
                                
                            </script>
                        </div>
                    </div>
                    <button type="submit" class="btn_save">Save</button>
                </form>
            </div>
        </div>
        
        <br>

        <!--View Products-->
        <div class="view_product">
            <div class="view_product_top">
                <h3>View Products</h3>
                <p>Completed</p>
            </div>
            <br>
            <hr>
            <div class="view_product_top">
                <div class="product_details">
                    <div class="circle">
                        <img src="../../assets/img/product.png" alt="">
                    </div>
                    <h4>Cream Bread 120g<p>x40</p></h4>
                </div>
                <div class="product_price">
                    <p>PHP. 1,000.00</p>
                </div>
            </div>
            <hr>
            <div class="order_total">
                <h3>Order Total: PHP. <span>1,000.00</span></h3>
            </div>
            <div class="order_total">
                <button>Buy Again</button>
            </div>
            <br>
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