<?php 
session_start();
include 'connections/connect.php';

 ?>
<!DOCTYPE html>
<html>

<?php include 'include/header.php' ?>

<body style="background-color:white;overflow-x: hidden;">

    <?php 
 
  include 'include/topnavbar.php';


 // / include 'include/allcategorynav.php';

  ?>

    <style type="text/css">
    @media screen and (max-width: 768px) {
        .banner img {
            height: 240px;
        }

        #bnctitle {
            font-size: 30px;
        }

        #buttonsg {
            position: relative;
            left: 100%;
        }
    }
    </style>
    <style type="text/css">
    .float-right {
        float: right;
    }

    #item::-webkit-scrollbar {
        width: 5px;
    }

    #item::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    #item::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    #item::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
    </style>

    <div class="container-fluid mt-4">


        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="orders.php">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="completed.php">Completed</a>
                </li>

            </ul>
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm" id="myorders">
                        <div class="card-body" style="height: 300px;overflow-y: scroll;" id="item">

                            <h6 style="font-weight: bolder" class="text-secondary">My orders</h6>
                            <hr>


                            <?php
                         $userid = $_SESSION['user_id'];
                             $getorder = "SELECT * FROM `transaction` where user_id = '$userid' and status !='completed' ";
                                         $gorders = mysqli_query($con,$getorder); 
                                         $countingorders= mysqli_num_rows($gorders);
                                        //  $get_id =  mysqli_insert_id($con); 
                                      if ($countingorders>=1){
                                     
                                          while($row = mysqli_fetch_array($gorders)){
                                            $pmorder = $row['paymentmethod'];


                                            
                                           $tid =  $row['tid'];
            if(isset($_GET['p'])){
                                       
                            $p = $_GET['p'];



                              if($p == $tid){


                                       ?>


                            <div class="card mt-2 mb-2 text-secondary">
                                <div class="card-body">


                                    <h6 style="text-align: center;font-weight: bolder;">
                                        <?php 
                                                

                                                  switch ($pmorder) {
                                                    case 'reserve':
                                                     echo 'Reserved Order';
                                                      break;

                                                       case 'deliver':
                                                     echo 'For Delivery Order';
                                                      break;

                                                         case 'cod':
                                                    echo 'Cash on Delivery';
                                                      break;
                                                    
                                                    default:
                                                      // code...
                                                      break;
                                                  }



                                        echo '<br> <span style="font-size:12px"> @'.date('h:i a @ F j,Y' , strtotime($row['datecreated'])).'</span>';
                                        
                                          $count_transrecord = "select * from trans_record where transaction_id = '$tid'  ";
                                                     $countingtrans = mysqli_query($con,$count_transrecord); 
                                                     $countt= mysqli_num_rows($countingtrans);
                                                  

                                                  echo '<br>'.$countt.' Items';          

                                   ?>
                                    </h6>

                                    <!-- <i style="float: right;" class="fas fa-check-circle"></i> style="background-color: #eaf8fd"-->
                                    <span style="font-size: 13px;float: right;">[See status]</span>
                                </div>



                            </div>


                            <?php

                              }else {

                                       ?>

                            <a href="?p=<?php echo $tid ?>" style="text-decoration: none">
                                <div class="card mt-2 mb-2">
                                    <div class="card-body">


                                        <h6 style="text-align: center;font-weight: bolder;">
                                            <?php 
                                 

                                                  switch ($pmorder) {
                                                    case 'reserve':
                                                     echo 'Reserved Order';
                                                      break;

                                                       case 'deliver':
                                                     echo 'For Delivery Order';
                                                      break;

                                                         case 'cod':
                                                    echo 'Cash on Delivery';
                                                      break;
                                                    
                                                    default:
                                                      // code...
                                                      break;
                                                  }

                                        echo '<br> <span style="font-size:12px"> @'.date('h:i a @ F j,Y' , strtotime($row['datecreated'])).'</span>';
                                        
                                          $count_transrecord = "select * from trans_record where transaction_id = '$tid'  ";
                                                     $countingtrans = mysqli_query($con,$count_transrecord); 
                                                     $countt= mysqli_num_rows($countingtrans);
                                                  

                                                  echo '<br>'.$countt.' Items';          

                                   ?>
                                        </h6>

                                        <!-- <i style="float: right;" class="fas fa-check-circle"></i> style="background-color: #eaf8fd"-->
                                        <span style="font-size: 13px;float: right;">[See status]</span>
                                    </div>



                                </div>
                            </a>

                            <?php
                              }
                                    
                                          
                                        }else {
                                                       
                                       ?>

                            <a href="?p=<?php echo $tid ?>" style="text-decoration: none">
                                <div class="card mt-2 mb-2">
                                    <div class="card-body">


                                        <h6 style="text-align: center;font-weight: bolder;">
                                            <?php 
                                 
                                                  switch ($pmorder) {
                                                    case 'reserve':
                                                     echo 'Reserved Order';
                                                      break;

                                                       case 'deliver':
                                                     echo 'For Delivery Order';
                                                      break;

                                                         case 'cod':
                                                    echo 'Cash on Delivery';
                                                      break;
                                                    
                                                    default:
                                                      // code...
                                                      break;
                                                  }

                                        echo '<br> <span style="font-size:12px"> @'.date('h:i a @ F j,Y' , strtotime($row['datecreated'])).'</span>';
                                        
                                          $count_transrecord = "select * from trans_record where transaction_id = '$tid'  ";
                                                     $countingtrans = mysqli_query($con,$count_transrecord); 
                                                     $countt= mysqli_num_rows($countingtrans);
                                                  

                                                  echo '<br>'.$countt.' Items';          

                                   ?>
                                        </h6>

                                        <!-- <i style="float: right;" class="fas fa-check-circle"></i> style="background-color: #eaf8fd"-->
                                        <span style="font-size: 13px;float: right;">[See status]</span>
                                    </div>



                                </div>
                            </a>

                            <?php

                                        }


                                   
                                        
                                        
                                       }
                                   }else{
                                    ?>
                            <div class="container mt-5">
                                <h6 style="text-align: center;" class="text-secondary">You dont have any orders yet.
                                </h6>
                            </div>

                            <?php
                                   }

                         ?>





                        </div>

                    </div>

                </div>
                <div class="col-md-8">




                    <div class="card shadow" id="allorders">
                        <div class="card-body">

                            <div id="trans">
                                <?php 

                          if(isset($_GET['p'])){
                                        $p =  $_GET['p'];
                                      

                                            $gtstatus = " SELECT * FROM `transaction` where tid = '$p'  ";
                                                        $gstatus = mysqli_query($con,$gtstatus); 
                                                        $countingstat= mysqli_num_rows($gstatus);
                                                       //  $get_id =  mysqli_insert_id($con); 
                                                     if ($countingstat>=1){
                                                    
                                                         while($row = mysqli_fetch_array($gstatus)){
                                                          ?>
                                <div class="row">
                                    <h6 style="font-size: 14px">
                                        Date-Ordered : <?php echo  date('F j, Y',strtotime($row['datecreated'])) ?>
                                        <br>
                                        Order type : <span class="text-primary">
                                            <?php 
                                


                                                  switch ($row['paymentmethod']) {
                                                    case 'reserve':
                                                     echo 'Reservation';
                                                      break;

                                                       case 'deliver':
                                                     echo 'For Delivery';
                                                      break;

                                                         case 'cod':
                                                    echo 'Cash on Delivery';
                                                      break;
                                                    
                                                    default:
                                                      // code...
                                                      break;
                                                  }

                                   ?>

                                        </span>
                                    </h6>
                                </div>

                                <div class="row  ">

                                    <h4 style="text-align: center;" class="text-success">
                                        <?php 
                                if($row['status'] == 'pending'){
                                  echo 'PREPARING ORDER';
                                }else  if($row['status'] == 'confirmed'){
                                  echo '<span style="font-weight:bolder">READY FOR PICK UP</span>';
                                }else  if($row['status'] == 'ready'){
                                  echo '<span class="text-info">ON THE WAY</span>';
                                }else  if($row['status'] == 'otw'){
                                  echo '<span class="text-info" style="font-weight:bolder">ON THE WAY</span>';
                                    ?>
                                        <br>
                                        <button class="btn btn-success mt-5 btnreceive"
                                            data-pm="<?php echo $row['paymentmethod'] ?>" data-od="<?php echo $tid ?>"
                                            style="font-size: 14px">RECEIVE</button>
                                        <br>
                                        <span style="font-size: 13px">If order was received successfully. please click
                                            this ↑ received button above to confirm order.</span>
                                        <?php
                                }else if ($row['status'] == 'delivered'){
                                    echo '<span class="text-success" style="font-weight:bolder">DELIVERED</span>';
                                }

                                 ?>

                                    </h4>
                                    <hr>

                                    <?php 
                                   $gtstatus = " SELECT * FROM `trans_record` where transaction_id = '$p'  ";
                                                        $gstatus = mysqli_query($con,$gtstatus); 
                                                        $countingstat= mysqli_num_rows($gstatus);
                                                       //  $get_id =  mysqli_insert_id($con); 
                                                     if ($countingstat>=1){
                                                    
                                                         while($row = mysqli_fetch_array($gstatus)){
                                                          $id = $row['prod_id'];
                                                          ?>
                                    <div class="card mb-3 shadow-sm">
                                        <div class="card-body">
                                            <div class="row ">
                                                <div class="col-md-6 ">
                                                    <div id="carouselExampleControls" class="carousel slide"
                                                        data-bs-ride="carousel">
                                                        <div class="carousel-inner">
                                                            <?php 

      $gtproductphotosactive = " select * from photo where prod_id = '$id' limit 1  ";
                        $result_of_getactive = mysqli_query($con,$gtproductphotosactive); 
                       
                         while($rowactive = mysqli_fetch_array($result_of_getactive)){
                          $prodactive = $rowactive['p_id'];
                          $src = 'img/products/'.$rowactive['photo'];
                          

                      ?>

                                                            <div class="carousel-item active">
                                                                <img src="<?php echo $src ?>" class="d-block w-100"
                                                                    alt="..." style="width: 100%;height: 240px;">
                                                            </div>

                                                            <?php
                         }

                        if(isset($prodactive)){
                            $gtproductphotos = " select * from photo where prod_id = '$id' and p_id != '$prodactive'  ";
                        $result_of_get = mysqli_query($con,$gtproductphotos); 
                       
                         while($rowe = mysqli_fetch_array($result_of_get)){
                          $src = 'img/products/'.$rowe['photo'];
                      ?>

                                                            <div class="carousel-item">
                                                                <img src="<?php echo $src ?>" class="d-block w-100"
                                                                    alt="..." style="width: 100%;height: 240px;">
                                                            </div>

                                                            <?php
                         }

                        }else {
                          echo 'NO PHOTO AVAILABLE';
                        }

                        
                  

    ?>
                                                        </div>
                                                        <button class="carousel-control-prev" type="button"
                                                            data-bs-target="#carouselExampleControls"
                                                            data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button"
                                                            data-bs-target="#carouselExampleControls"
                                                            data-bs-slide="next">
                                                            <span class="carousel-control-next-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
                                                    </div>



                                                </div>
                                                <div class="col-md-6">

                                                    <h6 style="font-size: 14px">
                                                        ORDER_NO :
                                                        <span style="font-weight: bolder">
                                                            BNC_<?php echo $row['order_id'] ?> </span>
                                                        <br>

                                                        Date-Ordered :
                                                        <?php echo  date('F j, Y',strtotime($row['date_ordered'])) ?>
                                                        <!-- Button trigger modal -->
                                                        <br>
                                                        <br>
                                                        <?php if ($row['status'] ='delivered') { ?>
                                                        <button type="button" class="btn btn-warning btn-sm"
                                                            id="modalrate" data-bs-toggle="modal"
                                                            data-bs-target="#staticBackdrop"><i class="fa fa-star"></i>
                                                            Send Review</button>
                                                        <?php } ?>






                                                    </h6>
                                                    <div class="card mt-5">
                                                        <div class="card-body">
                                                            <h6 style="font-size: 14px">
                                                                Quantity : <span
                                                                    style="font-weight: bolder; float: right;"><?php echo $row['quantity'] ?></span><br>
                                                                Price : <span
                                                                    style="font-weight: bolder;float: right;">₱
                                                                    <?php echo $row['price'] ?></span><br>
                                                                <hr>
                                                                Total : <span
                                                                    style="font-weight: bolder;float: right;">₱
                                                                    <?php echo $row['total'] ?> </span>
                                                            </h6>

                                                        </div>

                                                    </div>

                                                    <h6 style="float: right;font-size: 14px" class="mt-4">Amount paid :
                                                        <span style="font-weight: bolder;font-size: 16px">₱
                                                            <?php echo $row['total'] ?></span>
                                                    </h6>



                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                                         }
                                                  }

                                   ?>
                                </div>
                                <?php
                                                         }
                                                  }


                            }else {
                              ?>
                                <div class="container">
                                    <div style="text-align: center;">
                                        <img src="img/undraw_starry_window_re_0v82.svg" class="img-fluid mt-4"
                                            style="width: 150px">



                                    </div>

                                </div>

                                <script type="text/javascript">
                                $(document).ready(function() {

                                    $('#stat').addClass('d-none');
                                });
                                </script>
                                <?php
                            }


                       ?>

                            </div>
                            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            <script type="text/javascript">
                            $(document).ready(function() {

                                $("#myorders").css({
                                    'height': ($("#allorders").height() + 'px')
                                });

                                $('.btnreceive').click(function() {
                                    var id = $(this).data('od');
                                    var pm = $(this).data('pm');
                                    if (pm == 'cod') {

                                        Swal.fire({
                                            title: 'Are you sure you have received your Order?',
                                            text: "That Our trusted couriers or riders have brought your orders and paid the exact amount?",
                                            icon: 'question',
                                            showCancelButton: true,
                                            confirmButtonColor: '#95bfe2',
                                            cancelButtonColor: '#e2b895',
                                            confirmButtonText: 'Yes , I have!'
                                        }).then((result) => {
                                            if (result.isConfirmed) {


                                                $.ajax({
                                                    url: "statdet.php",
                                                    method: "POST",
                                                    data: {
                                                        confirmreceived: 1,
                                                        od: id
                                                    },
                                                    success: function(data) {

                                                    }
                                                })


                                            }
                                        })

                                    } else {

                                        Swal.fire({
                                            title: 'Are you sure?',
                                            text: "that You have received your Order?",
                                            icon: 'question',
                                            showCancelButton: true,
                                            confirmButtonColor: '#95bfe2',
                                            cancelButtonColor: '#e2b895',
                                            confirmButtonText: 'Yes , I have!'
                                        }).then((result) => {
                                            if (result.isConfirmed) {


                                                $.ajax({
                                                    url: "statdet.php",
                                                    method: "POST",
                                                    data: {
                                                        confirmreceived: 1,
                                                        od: id
                                                    },
                                                    success: function(data) {
                                                        $('#modalrate').click();
                                                    }
                                                })


                                            }
                                        })

                                    }



                                })
                            });
                            </script>
                            <script type="text/javascript">
                            $(document).ready(function() {


                                if ($(window).width() <= 767) {
                                    $('#buttonsg').removeClass('row');
                                    $('#footrow').removeClass('row');
                                    $('#footrow').css('text-align', 'center');
                                    $('.e').removeClass('col-md-4');

                                }








                                $('#stat').click(function() {
                                    $(this).addClass('text-info');
                                    $('#details').removeClass('text-info');

                                    $.ajax({
                                        url: "statdet.php",
                                        method: "POST",
                                        data: {
                                            status: 1,
                                            od: <?php echo $od ?>
                                        },
                                        success: function(data) {
                                            $('#trans').html(data);
                                        }
                                    })

                                })
                            });
                            </script>








                        </div>

                    </div>
                </div>

            </div>

            <style>
            .progress-label-left {
                float: left;
                margin-right: 0.5em;
                line-height: 1em;
            }

            .progress-label-right {
                float: right;
                margin-left: 0.3em;
                line-height: 1em;
            }

            .star-light {
                color: #e9ecef;
            }
            </style>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
                integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
                crossorigin="anonymous">
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
                integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
                crossorigin="anonymous" />
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Submit Review</h5>
                            <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4 class="text-center mt-2 mb-4">
                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1"
                                    data-rating="1"></i>
                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2"
                                    data-rating="2"></i>
                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3"
                                    data-rating="3"></i>
                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4"
                                    data-rating="4"></i>
                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5"
                                    data-rating="5"></i>
                            </h4>
                            <div class="form-group">
                                <input type="text" name="user_name" id="user_name" class="form-control"
                                    placeholder="Enter Your Name" />
                            </div>
                            <div class="form-group">
                                <textarea name="user_review" id="user_review" class="form-control"
                                    placeholder="Type Review Here"></textarea>
                            </div>
                            <div class="form-group text-center mt-4">
                                <button type="button" class="btn btn-primary" id="save_review">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>

        <p><br></p>



        <?php 

                   ?>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <?php 
 if(isset($_SESSION['sccsfl'] )){
  ?>
        <script type="text/javascript">
        $(document).ready(function() {
            Swal.fire(
                'Your Order was Successful!',
                'Please prepare the exact amount to hand it over to our trusted riders/couriers',
                'success'
            )
        });
        </script>
        <?php
  unset($_SESSION['sccsfl'] );
 }

  ?>

        <script>
        $(document).ready(function() {
            $('#cc').click(function() {
                window.location.href = "orders.php";

            })

            $(".rate").hover(function() {


                var count = $(this).data('count');

                var i;
                for (i = 1; i <= count; i++) {
                    //  $('#rate'+i).css('font-size','26px');
                    $('#rate' + i).removeClass('far fa-star').addClass('fas fa-star').addClass(
                        'text-warning');
                }

            }, function() {
                var i;

                for (i = 1; i <= 5; i++) {
                    //$('#rate'+i).css('font-size','20px');
                    $('#rate' + i).removeClass('fas fa-star').addClass('far fa-star').removeClass(
                        'text-warning');
                }


            });

            $('.rate').click(function() {

                // window.location.href="signin/";

                var count = $(this).data('count');
                var i, j;
                for (i = 1; i <= count; i++) {
                    $('#rate' + i).removeClass('far fa-star').addClass('fas fa-star').addClass(
                        'text-warning');
                    // $('#rate'+i).css('font-size','20px');
                }

                for (j = 1; j <= 5; j++) {
                    $('.rate').removeAttr('id');
                    $('.rate').unbind("click");
                }

                Swal.fire(
                    'Thanks for Rating!',
                    'You have rated Our shop with a ' + count + ' stars',
                    'success'
                ).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "orders.php";
                    }
                })

            })





            countitemwishlist();

            function countitemwishlist() {

                $.ajax({
                    url: "contents.php",
                    method: "POST",
                    data: {
                        cartwlistitems: 1
                    },
                    success: function(data) {
                        $('#countwlist').text(data);
                    }
                })

            }
            countitemcart();

            function countitemcart() {

                $.ajax({
                    url: "contents.php",
                    method: "POST",
                    data: {
                        cartitems: 1
                    },
                    success: function(data) {
                        $('#countcart').text(data);
                        $('#countcarts').text(data);
                    }
                })




            }




        });
        </script>




    </div>

    <?php 
  include 'include/footer.php';
  include 'include/itemsview.php';
  ?>










    <!--Bootstrap Plugins-->

    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/popper.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>

<script>
$(document).ready(function() {

    var rating_data = 0;

    $('#add_review').click(function() {

        $('#review_modal').modal('show');

    });

    $(document).on('mouseenter', '.submit_star', function() {

        var rating = $(this).data('rating');

        reset_background();

        for (var count = 1; count <= rating; count++) {

            $('#submit_star_' + count).addClass('text-warning');

        }

    });

    function reset_background() {
        for (var count = 1; count <= 5; count++) {

            $('#submit_star_' + count).addClass('star-light');

            $('#submit_star_' + count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function() {

        reset_background();

        for (var count = 1; count <= rating_data; count++) {

            $('#submit_star_' + count).removeClass('star-light');

            $('#submit_star_' + count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function() {

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function() {

        var user_name = $('#user_name').val();

        var user_review = $('#user_review').val();

        if (user_name == '' || user_review == '') {
            alert("Please Fill Both Field");
            return false;
        } else {
            $.ajax({
                url: "submit_rating.php",
                method: "POST",
                data: {
                    rating_data: rating_data,
                    user_name: user_name,
                    user_review: user_review
                },
                success: function(data) {
                    $('#review_modal').modal('hide');

                    load_rating_data();

                    alert(data);
                }
            })
        }

    });

    load_rating_data();

    function load_rating_data() {
        $.ajax({
            url: "submit_rating.php",
            method: "POST",
            data: {
                action: 'load_data'
            },
            dataType: "JSON",
            success: function(data) {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function() {
                    count_star++;
                    if (Math.ceil(data.average_rating) >= count_star) {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review / data.total_review) *
                    100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review / data.total_review) *
                    100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review / data
                    .total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review / data.total_review) *
                    100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review / data.total_review) *
                    100 + '%');

                if (data.review_data.length > 0) {
                    var html = '';

                    for (var count = 0; count < data.review_data.length; count++) {
                        html += '<div class="row mb-3">';

                        html +=
                            '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">' +
                            data.review_data[count].user_name.charAt(0) + '</h3></div></div>';

                        html += '<div class="col-sm-11">';

                        html += '<div class="card">';

                        html += '<div class="card-header"><b>' + data.review_data[count].user_name +
                            '</b></div>';

                        html += '<div class="card-body">';

                        for (var star = 1; star <= 5; star++) {
                            var class_name = '';

                            if (data.review_data[count].rating >= star) {
                                class_name = 'text-warning';
                            } else {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                        }

                        html += '<br />';

                        html += data.review_data[count].user_review;

                        html += '</div>';

                        html += '<div class="card-footer text-right">On ' + data.review_data[count]
                            .datetime + '</div>';

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';
                    }

                    $('#review_content').html(html);
                }
            }
        })
    }

});
</script>