<?php 
session_start();
include 'connections/connect.php';
unset($_SESSION['disc']);

if(isset($_SESSION['user_ip'])){
  $ipadd = $_SESSION['user_ip'];

$deletetempcart = "DELETE FROM `cart` WHERE user_id = '$ipadd' ";
                            mysqli_query($con,$deletetempcart);
$deletetempwishlist = "DELETE FROM `wishlist` WHERE user_id = '$ipadd' ";
                            mysqli_query($con,$deletetempwishlist);
}


 ?>
<!DOCTYPE html>
<html>

<?php include 'include/header.php' ?>

<body style="background-color:white;overflow-x: hidden;">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/address.css">
    <link rel="stylesheet" href="css/select_address.scss">
    <?php 
  $cart = 1;
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
    </style>

    <div class="container-fluid mt-4">


        <div class="container">

            <div class="address_box">
                <div class="left">
                    <div class="delivery_address">
                        <div class="icon_circle">
                            <i class="far fa-location"></i>
                        </div>
                        <p>Delivery Address</p>
                        <div class="delivery_address_info">

                            <label class="card mx-2 ">
                                <input name="plan" class="radio" type="radio" checked hidden>

                                <span class="plan-details">

                                    <span>Ronald Dale Fuentebella | 09352232051</span>
                                    <span> Lamitan City</span>
                                    <span>Brgy. Malinis, Lamitan City</span>
                                </span>
                            </label>


                            <label class="card mx-2 ">
                                <input name="plan" class="radio" type="radio" hidden>
                                <span class="plan-details">
                                    <span>Abby Quintos | 0934321323</span>
                                    <span> Zamboanga City</span>
                                    <span>Brgy. Malinis, Lamitan City</span>
                            </label>


                        </div>
                    </div>


                </div>

            </div>


            <div class="card">
                <div class="card-header">
                    <h5 class="text-dark" style="font-weight: bolder;">Shopping Cart</h5>

                </div>

                <div class="card-body" id="items_in_the_cart">

                    <div class="spinner-grow text-info" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-info" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-info" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>



                </div>

            </div>





        </div>

        <p><br></p>



        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <script>
        $(document).ready(function() {
            if ($(window).width() <= 767) {
                $('#buttonsg').removeClass('row');
                $('#footrow').removeClass('row');
                $('#footrow').css('text-align', 'center');
                $('.e').removeClass('col-md-4');

            }
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

            cartitems();

            function cartitems() {

                $.ajax({
                    url: "cart_contents.php",
                    method: "POST",
                    data: {
                        cartitems: 1
                    },
                    success: function(data) {
                        $('#items_in_the_cart').html(data);
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