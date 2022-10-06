<?php 
  session_start();
if(!isset($_SESSION['admin_id'])){
  header('location:../log/signin.php');
}
 ?>
<!DOCTYPE html>
<html>

<?php include 'head.php';
  include '../connections/connect.php';
 ?>

<body style="background-color: white">
    <div class="wrapper">


        <nav class="sidenav shadow">
            <div class="userinfo">
                <img src="../assets/logo/logo_transparent.png" class="img-thumbnnail shadow"
                    style="width: 80px;height: 60px;border-radius: 30px;">

                <div class="dropdown" style="font-weight: bolder;">

                    Admin_<span id="username" class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['admin_name'] ?></span>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="font-size: 13px;">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="../log/logout.php">Logout</a></li>

                    </ul>
                </div>

                <span style="font-weight: normal;font-size: 13px"><?php echo $_SESSION['admin_email'] ?></span>

            </div>
            <hr>
            <div class="navigations">



                <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="font-size: 14px">




                    <div class="sidebar-heading text-secondary" style="font-size: 12px">
                        REPORTS
                    </div>

                    <li class="nav-item navitems">
                        <a class="nav-link navlinks text-secondary" href="dashboard.php">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
                    </li>

                    <li class="nav-item navitems">
                        <a class="nav-link navlinks  text-secondary" href="sales.php">
                            <i class="fas fa-hand-holding-usd"></i>
                            <span>Sales</span></a>
                    </li>

                    <li class="nav-item navitems">
                        <a class="nav-link navlinks text-secondary" href="orders.php">
                            <i class="fas fa-cart-arrow-down"></i>
                            <span>Orders</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading text-secondary" style="font-size: 12px">
                        MANAGE
                    </div>

                    <li class="nav-item navitems">
                        <a class="nav-link navlinks  " href="products.php">
                            <i class="fa fa-shirtsinbulk"></i>
                            <span>Products</span></a>
                    </li>

                    <li class="nav-item navitems">
                        <a class="nav-link navlinks  text-secondary" href="categories.php">
                            <i class="fas fa-list-ul"></i>
                            <span>Categories</span></a>
                    </li>

                    <li class="nav-item navitems">
                        <a class="nav-link navlinks text-secondary " href="promo.php">
                            <i class="fas fa-tags"></i>
                            <span>Promo Codes</span></a>
                    </li>

                    <li class="nav-item navitems">
                        <a class="nav-link navlinks text-secondary " href="accounts.php">
                            <i class="fas fa-users"></i>
                            <span>User Accounts</span></a>
                    </li>


                </ul>


            </div>


        </nav>


        <section class="main">

            <div class="">
                <button class="btn btn-light text-dark" id="slideleft" style="font-size: 10px;"><i
                        class="fas fa-arrow-left"></i></button>

                <button class="btn btn-light text-dark d-none" id="slideright" style="font-size: 10px;"><i
                        class="fas fa-arrow-right"></i></button>
   

            </div>

            <div class="main_contents">
                <div class="container">

                    <h5 style="font-weight: bolder;">PRODUCTS</h5>
                    <hr>
                    <div class="card shadow-sm" style="">
                        <div class="card-body">


                            <button class="btn btn-warning text-white mb-2" data-bs-toggle="modal"
                                data-bs-target="#addmodal" data-backdrop="static" data-keyboard="false"
                                style="font-size: 14px;">Add new <i class="fas fa-plus-circle"></i></button>

                            <!--
    <label style="font-size: 14px" class="mb-2 mt-4">Enter new Category:</label>
                      <input type="text" name="" class="form-control" style="font-size: 12px">
                      <hr>
                       <button class="btn btn-light  text-primary" style="font-size: 12px;float: right;" >Add new <i class="fas fa-plus-circle"></i></button>
                        -->




                            <div id="table_category">
                                <div class="spinner-grow text-dark" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <div class="spinner-grow text-dark" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <div class="spinner-grow text-dark" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>

                            </div>







                        </div>

                    </div>
                </div>



            </div>


            <div class="footer shadow">

            </div>






        </section>

    </div>


    <div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-body">
                    <button type="button" class="btn-close" style="float: right;" data-bs-dismiss="modal"
                        aria-label="Close"></button>

                    <br>
                    <form method="post" action="action_product.php" onsubmit="return false" id="savenew"
                        enctype="multipart/form-data">

                        <input type="hidden" name="savenew">




                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <label style="font-size: 14px" class="mb-3">Multiple Photo Selection </label>
                                    <input type="file" name="image[]" onchange="javascript:updateList()" id="file"
                                        style="font-size: 14px" class="form-control" accept="image/*" multiple="">
                                    <span style="font-size: 14px" id="imgsa"> Max of 3 Images will be accepted <span
                                            class="text-danger">*</span></span>
                                    <hr>
                                    <style type="text/css">
                                    #fileList::-webkit-scrollbar {

                                        width: 2px;
                                    }
                                    </style>
                                    <h6 style="font-size: 14px">Selected Photos</h6>

                                    <div id="fileList"
                                        style="height: 240px;overflow-y: scroll;border-bottom:1px solid #b2c1c2;border-top:1px solid #b2c1c2">
                                    </div>



                                </div>
                                <div class="col-md-8">

                                    <label style="font-size: 14px" class="mb-3 mt-5">Enter Product Name : </label>
                                    <input type="text" name="name" style="font-size: 14px" class="form-control mb-2"
                                        required="">
                                    <label style="font-size: 14px" class="mb-3">Select Category: </label>
                                    <select class="form-select mb-2" name="cat" style="font-size: 14px">
                                        <?php 
                    include '../connections/connect.php';
                        $selectcategory = " select * from category  ";
                                    $selection = mysqli_query($con,$selectcategory); 
                                    $countcategory= mysqli_num_rows($selection);
                                   //  $get_id =  mysqli_insert_id($con); 
                                 if ($countcategory>=1){
                                
                                     while($row = mysqli_fetch_array($selection)){
                                        ?>
                                        <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['category_name'] ?>
                                        </option>
                                        <?php
                                     }
                              }else {

                              }
                     ?>
                                    </select>

                                    <label style="font-size: 14px" class="mb-3">Enter Price: </label>
                                    <input type="text" name="price"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                        style="font-size: 14px" class="form-control mb-2" required="">
                                    <label style="font-size: 14px" class="mb-3">Enter Description: </label>
                                    <textarea style="font-size: 14px" name="desc" class="form-control"></textarea>
                                </div>

                            </div>

                        </div>


                        <button type="submit" id="disabledsave" class="btn btn-light text-dark"
                            style="font-size: 15px;float: right;">Save</button>

                    </form>

                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">

                <div class="modal-body">
                    <button type="button" class="btn-close" style="float: right;" data-bs-dismiss="modal"
                        aria-label="Close"></button>

                    <br>
                    <form method="post" action="action_product.php" onsubmit="return false" id="editcategory">

                        <input type="hidden" name="editcategory">

                        <div class="container">

                            <h6>Modify Product</h6>

                            <label style="font-size: 14px" class="mb-3 mt-5">Enter Product Name : </label>
                            <input type="text" name="ename" id="ename" style="font-size: 14px" class="form-control mb-2"
                                required="">
                            <label style="font-size: 14px" class="mb-3">Select Category: </label>

                            <select class="form-select mb-2" id="categoryid" name="ecat" style="font-size: 14px">

                                <?php 
                    include '../connections/connect.php';
                        $selectcategory = " select * from category  ";
                                    $selection = mysqli_query($con,$selectcategory); 
                                    $countcategory= mysqli_num_rows($selection);
                                   //  $get_id =  mysqli_insert_id($con); 
                                 if ($countcategory>=1){
                                
                                     while($row = mysqli_fetch_array($selection)){
                                        ?>
                                <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['category_name'] ?>
                                </option>
                                <?php
                                     }
                              }else {

                              }
                     ?>
                            </select>

                            <label style="font-size: 14px" class="mb-3">Enter Price: </label>
                            <input type="text" name="eprice" id="eprice"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                style="font-size: 14px" class="form-control mb-2" required="">
                            <label style="font-size: 14px" class="mb-3">Enter Description: </label>
                            <textarea style="font-size: 14px" name="edesc" id="edesc" class="form-control"></textarea>
                            <input type="hidden" name="eid" id="eid">

                        </div>
                        <button type="submit" class="btn btn-light text-dark mt-3"
                            style="font-size: 15px;float: right;">Modify</button>

                    </form>

                </div>

            </div>
        </div>
    </div>


    <?php 
  if(isset($_GET['viewproducts'])){
    $id = $_GET['token'];

    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#openview').click();

    });
    </script>



    <button type="button" class="btn btn-primary d-none" id="openview" data-bs-toggle="modal"
        data-bs-target="#itemsview" data-bs-target="#staticBackdrop">

    </button>


    <div class="modal fade " id="itemsview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="modal-dialog  modal-lg ">
            <div class="modal-content">

                <div class="modal-body">
                    <button type="button" onclick="window.location.href='products.php'" style="float: right;"
                        class="btn-close mb-2" data-bs-dismiss="modal" aria-label="Close"></button>


                    <div class="row">
                        <div class="col-md-8">

                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">

                                    <?php 
            $gtproductphotosactive = " select * from photo where prod_id = '$id' limit 1  ";
                        $result_of_getactive = mysqli_query($con,$gtproductphotosactive); 
                       
                         while($rowactive = mysqli_fetch_array($result_of_getactive)){
                          $prodactive = $rowactive['p_id'];
                          $src = '../img/products/'.$rowactive['photo'];
                          

                      ?>

                                    <div class="carousel-item active">
                                        <img src="<?php echo $src ?>" class="d-block w-100" alt="..."
                                            style="width: 100%;height: 500px;">
                                    </div>

                                    <?php
                         }

                        if(isset($prodactive)){
                            $gtproductphotos = " select * from photo where prod_id = '$id' and p_id != '$prodactive'  ";
                        $result_of_get = mysqli_query($con,$gtproductphotos); 
                       
                         while($row = mysqli_fetch_array($result_of_get)){
                          $src = '../img/products/'.$row['photo'];
                      ?>

                                    <div class="carousel-item">
                                        <img src="<?php echo $src ?>" class="d-block w-100" alt="..."
                                            style="width: 100%;height: 500px;">
                                    </div>

                                    <?php
                         }

                        }else {
                          echo 'NO PHOTO AVAILABLE';
                        }

                        
                  

         ?>




                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>


                        </div>
                        <div class="col-md-4">

                            <p><br><br></p>

                            <style type="text/css">
                            .det::-webkit-scrollbar {

                                width: 0px;
                            }
                            </style>
                            <?php 
                    $viewprod = " select * from product where prod_id = '$id' ";
                                $result_of_view = mysqli_query($con,$viewprod); 
                           
                            
                                 while($row = mysqli_fetch_array($result_of_view)){
                                ?>
                            <h5 style="font-weight: bolder;" id="pname"><?php echo $row['name'] ?></h5>
                            <span class="text-secondary mb-2" id="pprice"
                                style="font-size: 20px;font-weight: bolder;">₱<?php echo $row['price'] ?></span>
                            <br>
                            <div class="det" id="descc" style="font-size: 14px;height: 240px;overflow-y: scroll;">
                                <?php echo $row['description'] ?>
                            </div>

                            <?php
                                 }
                          
                 ?>


                            <br>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-dark" style="font-size: 14px" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Change Photos <i class="far fa-edit"></i>
                            </button>

                            <!-- Modal -->




                        </div>


                    </div>




                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" id="mod">
            <div class="modal-content">


                <div class="modal-body">
                    <button type="button" class="btn-close" onclick="location.reload()" style="float: right;"></button>


                    <br>
                    <div class="row">



                        <?php 
           $tochangep = " select * from photo where prod_id ='$id'   ";
                       $rechange = mysqli_query($con,$tochangep); 
                        $cchgp = mysqli_num_rows($rechange);


                        if($cchgp >=1){



                        while($row = mysqli_fetch_array($rechange)){
                            $src = '../img/products/'.$row['photo'];
                    ?>
                        <div class="col-md-4">

                            <div class="card mb-2">
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data" action="action_product.php"
                                        onsubmit="return false" id="updatephoto">
                                        <input type="hidden" name="updatephoto">

                                        <img src="<?php echo $src ?>" style="width: 100%; height: 300px;">
                                        <input type="hidden" name="photoid" value="<?php echo $row['p_id'] ?>">
                                        <input type="file" name="imagee" class="form-control" accept="image/*"
                                            required="">

                                        <button type="submit" class="btn btn-dark mt-3" style="font-size: 14px"> Save
                                            Changes</button>

                                    </form>
                                </div>

                            </div>

                        </div>


                        <?php
                        }

                           }else {

                            ?>
                        <script type="text/javascript">
                        $(document).ready(function() {
                            $('#mod').removeClass('modal-lg');
                        });
                        </script>



                        <div class="container">

                            <h6>Save a photo for this Product</h6>
                            <form method="post" action="action_product.php" enctype="multipart/form-data"
                                onsubmit="return false" id="addphotos">
                                <input type="hidden" name="addphotos">

                                <label style="font-size: 14px" class="mb-3">Multiple Photo Selection </label>
                                <input type="file" name="image[]" onchange="javascript:updateList()" id="filess"
                                    style="font-size: 14px" class="form-control" accept="image/*" multiple=""
                                    required="">
                                <span style="font-size: 14px" id="imgsad"> Max of 3 Images will only be accepted <span
                                        class="text-danger">*</span></span>
                                <br>
                                <input type="hidden" value="<?php echo $id ?>" name="prod">


                                <button class="btn btn-dark mt-4" style="font-size: 14px;float: right;"> Save
                                    Photos</button>
                            </form>

                        </div>

                        <?php


                           }

                       
                 
        ?>


                    </div>

                </div>



            </div>
        </div>

        <?php

  }
 ?>

        <!-- Modal -->






        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {

            $('#addphotos').on('submit', function(event) {
                event.preventDefault();
                var $fileUpload = $("#filess");


                if (parseInt($fileUpload.get(0).files.length) > 3) {
                    $('#imgsad').addClass('text-danger');
                } else {
                    var formData = new FormData(this);
                    $.ajax({
                        url: $(this).attr('action'),
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        method: "POST",

                        success: function(data) {
                            alert(data);
                        }
                    })
                }


            });

            $('#updatephoto').on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: $(this).attr('action'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: "POST",

                    success: function(data) {
                        $.notify("Added Successfully!", "success");
                        var s = setInterval(function() {
                            $('.btn-close').click();
                            clearInterval(s);
                        }, 1400);

                    }
                })
            });


            updateList = function() {
                var input = document.getElementById('file');
                var output = document.getElementById('fileList');


                for (var i = 0; i < input.files.length; ++i) {
                    output.innerHTML +=
                        '<div class="card mb-1 " style="border-left:4px solid #5a7c7d"><div class="card-body">' +
                        input.files.item(i).name + '</div></div>';
                }


            }


            $('#savenew').on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                var $fileUpload = $("input[type='file']");
                if (parseInt($fileUpload.get(0).files.length) > 3) {
                    $('#imgsa').addClass('text-danger');
                } else {

                    $.ajax({
                        url: $(this).attr('action'),
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        method: "POST",

                        success: function(data) {
                            //alert(data);
                            table_category();
                            $.notify("Added Successfully!", "success");
                            $('.btn-close').click();

                        }
                    })

                }

            });



            $('#editcategory').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    method: "POST",
                    data: $(this).serialize(),
                    success: function(data) {
                        // alert(data);
                        table_category();
                        $.notify("Modified Successfully!", "success");
                        $('.btn-close').click();
                    }
                })

            });

            var myModalEl = document.getElementById('addmodal')
            myModalEl.addEventListener('hidden.bs.modal', function(event) {
                $('#newcat').val('');
            })


            $('#newcat').keyup(function() {
                var val = $(this).val();

                if (val == '') {
                    $('#msg').html('');
                } else {



                    $.ajax({
                        url: "action_product.php",
                        method: "POST",
                        data: {
                            checkifexistcat: 1,
                            val: val
                        },
                        success: function(data) {
                            if (data.match('exist')) {
                                $('#disabledsave').attr('disabled', true);
                                $('#msg').html(
                                    '<span class="text-danger" style="font-size:12px">Already Exist!</span>'
                                    );
                            } else {
                                $('#disabledsave').removeAttr('disabled');
                                $('#msg').html('');
                            }
                        }
                    })
                }



            })

            $('#editcat').keyup(function() {

                var val = $(this).val();

                if (val == '') {

                } else {



                    $.ajax({
                        url: "action_product.php",
                        method: "POST",
                        data: {
                            checkifexistcat: 1,
                            val: val
                        },
                        success: function(data) {
                            if (data.match('exist')) {
                                $('#disabledsaved').attr('disabled', true);
                                $('#msgs').html(
                                    '<span class="text-danger" style="font-size:12px">Already Exist!</span>'
                                    );
                            } else {
                                $('#disabledsaved').removeAttr('disabled');
                                $('#msgs').html('');
                            }
                        }
                    })
                }
            })


            table_category();

            function table_category() {


                $.ajax({
                    url: "action_product.php",
                    method: "POST",
                    data: {
                        category: 1
                    },
                    success: function(data) {
                        $('#table_category').html(data);
                    }
                })


            }


        });
        </script>

        <script type="text/javascript" src="../js/sidebar.js?v=1"></script>



        <!--Bootstrap Plugins-->
        <script type="text/javascript" src="../js/notify.js"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/popper.js"></script>
        <script type="text/javascript" src="../js/bootstrap.js"></script>
</body>

</html>