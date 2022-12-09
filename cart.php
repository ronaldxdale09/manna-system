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

$user_id=$_SESSION['user_id'];

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
            <?php 
   if(!isset($_SESSION['user_isset'])){

   }
   else {
?>

            <div class="address_box">
                <div class="left">
                    <div class="delivery_address">
                        <div class="icon_circle">
                            <i class="far fa-location"></i>
                        </div>
                        <p>Delivery Address</p>
                        <div class="delivery_address_info">

                            <?php 
                            $getAddress = " select * from account_ship_address where user_id='$user_id' ";
                            $results = mysqli_query($con, $getAddress);
                            $countingAddress = mysqli_num_rows($results);
                         
                            //  $get_id =  mysqli_insert_id($con);
                            if ($countingAddress >= 1)
                            {
           
                            while ($row = mysqli_fetch_array($results))
                            {
                                $ship_id = $row['ship_id'];

                                $status = $row['status'];
                                
                               
                                ?>

                            <label class="card mx-2 ">
                                <input name="address" id='addressSelected' value='<?php echo $row['ship_id'] ?>'
                                    class="radio" type="radio"  <?php if ($status == '1') { echo 'checked'; } else { echo ''; } ?>  hidden>
                                <span class="plan-details">

                                    <span><?php echo $row['contact_name'] ?> | <?php echo $row['phone_number'] ?></span>
                                    <span>Address : <?php echo $row['address'] ?></span>
                                    <span>Postal : <?php echo $row['postal_code'] ?></span>
                                </span>
                            </label>

                            <?php  }
             } ?>
                            <button class="btn-light info_add" data-bs-toggle="modal" data-bs-target="#newAddress">
                                <i class="fa fa-plus-circle"></i>
                                <p>Add address</p>
                            </button>


                        </div>
                    </div>


                </div>

            </div>
            <?php } ?>

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
            // ADDRESS
            var user_id ='<?php echo $user_id ?>';
            if (user_id!='' || user_id!='null'){
                $('input[name=address]').change(function() {
                var value = $('input[name=address]:checked').val();
                var user_id ='<?php echo $user_id ?>';
                $.ajax({
                    url: "function/changeAddress.php",
                    method: "POST",
                    data: {
                        ship_id: value,
                        user_id: user_id
                    },
                    success: function(data) {
                      console.log(data);
                    }
                })



            });
            }
        
            //  
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

    <style>
    .form-group {
        border: 1px solid #ced4da;
        padding: 5px;
        border-radius: 6px;
        width: auto;
    }

    .form-group:focus {
        color: #212529;
        background-color: #fff;
        border-color: #86b7fe;
        outline: 0;
        box-shadow: 0 0 0 0.25rem rgb(13 110 253 / 25%);
    }

    .form-group input {
        display: inline-block;
        width: auto;
        border: none;
    }

    .form-group input:focus {
        box-shadow: none;
    }
    </style>

    <!-- New Address -->
    <div class="modal fade" id="newAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">New Delivery Address</h5>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method='POST' action='function/newAddress.php'>

                        <input type="number" class="form-control txt mb-2" name="user_id"
                            value='<?php echo $_SESSION['user_id']?>' hidden>
                        <label>Name:</label>
                        <input type="text" class="form-control txt mb-2" name="name" style="" required="">



                        <label>Delivery Address (Street Name, Building, House No.):</label>

                        <textarea class="form-control txt mb-2" name="address" cols="4"></textarea>

                        <label>Postal Code:</label>
                        <input type="number" class="form-control txt mb-2" name="postal" style="" required="">


                        <hr>
                        <label>Contact Number:</label> <br>
                        <div class="form-group mt-2 d-inline-block">
                            <span class="border-end country-code px-2">+63</span>
                            <input type="text" class="form-control" name="phone_number" aria-describedby="emailHelp"
                                placeholder="91257888" maxlength="10" required />
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name='add' class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>






    <!--Bootstrap Plugins-->

    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/popper.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>