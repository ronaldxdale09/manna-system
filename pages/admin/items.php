<?php include('includes/header.php') ?>
<?php include('modal/m_products.php') ?>

<link rel="stylesheet" href="../../stylesheet/items.css">
<link rel="stylesheet" href="../../stylesheet/upload.css">

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

                    <a href="../../dashboard.php">
                        <li><i class="far fa-user"></i> Dashboard</li>
                    </a>
                    <a href="../../orders.php">
                        <li><i class="fa fa-list"></i> Orders</li>
                    </a>
                    <a href="../../items.php">
                        <li id="active_section"><i class="far fa-sitemap"></i> Items</li>
                    </a>
                    <a href="../../user_accounts.php">
                        <li><i class="fa fa-users"></i> User Accounts</li>
                    </a>
                </ul>
            </div>

            <!-- stylesheet unlocated header to avoid conflict design w/ bootstrap -->
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">


            <div class="my_profile">
                <h3>Items</h3>
                <br>
      
                <button type="button" class="btn btn-success btn-sm add_new" data-bs-toggle="modal" data-bs-target="#addItem"><i
                        class="fa fa-plus-circle"></i> New</button>
                <div class="overflow-x">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Barcode</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Packing Case</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <button><i class="far fa-eye"></i></button>
                                    <button><i class="far fa-edit"></i></button>
                                    <button><i class="far fa-trash"></i></button>
                                </td>
                                <td>234343</td>
                                <td>Product Name A</td>
                                <td>100</td>
                                <td>200</td>
                                <td>130.00</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>


                <script>
                $(document).ready(function() {
                    $('#example').DataTable();
                });
                </script>
            </div>
        </div>
    </div>

    <br>

    <!-- ============== FOOTER =============== -->


    <!-- animate on scroll script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
    AOS.init(); //initializing script animate on scroll
    </script>
</body>

</html>

<?php include('includes/footer_links.php') ?>