<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manna | Checkout Product</title>

    <!-- stylesheet -->
    <link rel="stylesheet" href="../stylesheet/checkout.css">
    <link rel="stylesheet" href="../stylesheet/main.css">
    <link rel="stylesheet" href="../stylesheet/footer.css">
    <link rel="stylesheet" href="../stylesheet/header.css">

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
        <ul id="pro_ul">
            <li> <input type="text" placeholder="Search"></li>
            <li><i class="fa fa-bell"></i></li>
            <li><i class="far fa-user-circle"></i></li>
        </ul>
    </header>

    <br>

    <div class="container">
        <div class="scrollable">
            <table border="1" width="100%">
                <tr>
                    <td colspan="2">
                        <input type="checkbox">
                        <label for="">Product</label>
                    </td>
                    <td>Unit Price</td>
                    <td>Quantity</td>
                    <td>Total Price</td>
                    <td>Action</td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td id="boxes">
                        <div class="box">
                            <div class="circle">
                                <img src="../assets/img/product.png" alt="">
                            </div>
                        </div>
                        <label for="">Cream Bread 120g</label>
                    </td>
                    <td>Php. 39.15</td>
                    <td><button type="button" onclick="minus_quan('id1')">-</button><input type="text" id="id1"><button type="button" onclick="add_quan('id1')">+</button></td>
                    <td>Php. 39.15</td>
                    <td><a href="">Delete</a></td>
                </tr>
                <script>
                    function minus_quan(x) {
                        var cur_val = document.getElementById(x).value;

                        cur_val--;

                        document.getElementById(x).value = cur_val;

                        if(cur_val <= 0) 
                            document.getElementById(x).value = 0;
                    }
                    function add_quan(x) {
                        var cur_val = document.getElementById(x).value;

                        cur_val++;

                        document.getElementById(x).value = cur_val;

                        
                        if(cur_val <= 0) 
                            document.getElementById(x).value = 0;

                    }
                </script>
            </table>
        </div>
        <div class="total_checkout">
            <p>Total (3 items): <span>PHP. 114.50</span></p>
            <button>Check Out</button>
        </div>
    </div>

    <br><!-- ============== FOOTER =============== -->
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