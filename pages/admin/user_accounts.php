<?php include('includes/header.php')?>
    <!-- stylesheet -->
    <link rel="stylesheet" href="../../stylesheet/user_account.css">
 
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
             
                    <a href="dashboard.php">
                        <li><i class="far fa-user"></i> Dashboard</li>
                    </a>
                    <a href="orders.php">
                        <li><i class="fa fa-list"></i> Orders</li>
                    </a>
                    <a href="items.php">
                        <li><i class="far fa-sitemap"></i> Items</li>
                    </a>
                    <a href="user_accounts.php">
                        <li id="active_section"><i class="fa fa-users"></i> User Accounts</li>
                    </a>
                </ul>
            </div>
            
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">


            <div class="my_profile">
                <h3>User Accounts</h3>
                <br>
                <button type="button" id="add_new"><i class="fa fa-plus-circle"></i> New</button>
                <div class="overflow-x">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Phone</th>
                                <th>User Type</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $record  = mysqli_query($con, "SELECT * from users ORDER BY user_id "); ?>
                        <?php while ($row = mysqli_fetch_array($record)) { ?>
                            <tr>
                                <td>
                                    <button><i class="fa fa-eye"></i></button>
                                    <button><i class="fa fa-edit"></i></button>
                                    <button><i class="fa fa-trash"></i></button>
                                </td>
                                <td><?php echo $row['fname']?> <?php echo $row['lname']?> </td>
                                <td><?php echo $row['username']?> </td>
                                <td><?php echo $row['password']?> </td>
                                <td><?php echo $row['phone']?> </td>
                                <td><?php echo $row['userType']?> </td>
                            </tr>
                           <?php }?>
                        </tbody>
                    </table>
                </div>
                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
                
                
                <script>
                    $(document).ready(function () {
                        $('#example').DataTable();
                    });
                </script>
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