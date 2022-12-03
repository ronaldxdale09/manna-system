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

<?php include 'include/header.php';
if (isset($_GET['prod'])) {
    $prod_id = $_GET['prod'];
  }

  $sql = mysqli_query($con, "SELECT * from product  JOIN photo on
  product.prod_id = photo.prod_id
   WHERE product.prod_id='$prod_id'"); 
  $arr = mysqli_fetch_array($sql);



?>

<body style="background-color:white;overflow-x: hidden;">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/product_details.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php 
  include 'include/topnavbar.php';
  ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <div class="container">

    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">Product Details </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active"> <img class="d-block w-100" src="img/products/<?php echo $arr['photo']?>"
                                alt="First slide">
                        </div>
                        <div class="carousel-item"> <img class="d-block w-100" src="c52.jpg" alt="Second slide"> </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span
                            class="sr-only">Previous</span> </a> <a class="carousel-control-next"
                        href="#carouselExampleControls" role="button" data-slide="next"> <span
                            class="carousel-control-next-icon" aria-hidden="true"></span> <span
                            class="sr-only">Next</span> </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <h2><?php echo $arr['name']?></h2>
                </div>

                <div class="row">
                    <h3 class="text-warning"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star"
                            aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i> <i
                            class="fa fa-star-half-o" aria-hidden="true"></i><i class="fa fa-star-o"
                            aria-hidden="true"></i></h3>
                    &nbsp; &nbsp;
                    <h5>1200 star rating and 250 reviews</h5>
                </div>
                <div class="row">
                    <p><i class="text-success fa fa-check-square-o" aria-hidden="true"></i> <strong>Bank Offer</strong>
                        20% Instant Discount on SBI Credit Cards</p>
                    <p><i class="text-success fa fa-check-square-o" aria-hidden="true"></i> <strong>Bank Offer</strong>
                        5% Unlimited Cashback on Flipkart Axis Bank Credit Card </p>
                    <p><i class="text-success fa fa-check-square-o" aria-hidden="true"></i> <strong>Bank Offer</strong>
                        Extra 5% off* with Axis Bank Buzz Credit Card</p>
                    <p><i class="text-success fa fa-check-square-o" aria-hidden="true"></i> <strong>Bank
                            Offer</strong>20% Instant Discount on pay with <i class="fa fa-google-wallet"
                            aria-hidden="true"></i> google wallet </p>
                </div>
                <div class="row mt-4">
                   

                            <button class="btn btn-warning text-dark addcart" style="font-size: 13px;font-weight: bold;"
                            data-productid="<?php echo $arr['prod_id'] ?>"> Add to Cart <i
                                class="fas fa-cart-plus"></i></button>
                </div>





            </div>
        </div>
    </div>

    <br>

    <div class="container">
        <div class="row mt-5">
            <h2>Similar Products</h2>
        </div>

        <div class="row mt-5" style='padding-right: 10px;'>
            <?php 
               $GetProducts = " select * from product limit 4 ";
               $Items = mysqli_query($con, $GetProducts);
               $countingItems = mysqli_num_rows($Items);
               //  $get_id =  mysqli_insert_id($con);
               if ($countingItems >= 1)
               {
           
                   while ($row = mysqli_fetch_array($Items))
                   {
                       $itemid = $row['prod_id'];

  
            ?>

            <div class="col-md-3  ">

                <div class="card w-100 border-0" style="height:80%">
                    <?php
            $get_items_photo = " SELECT * FROM `photo` where prod_id = '$itemid' limit 1 ";
            $productphotos = mysqli_query($con, $get_items_photo);
            $countproduct_photos = mysqli_num_rows($productphotos);

            if ($countproduct_photos >= 1)
            {
                while ($photo = mysqli_fetch_array($productphotos))
                {
                  ?>
                    <center>
                        <div class="circle">
                            <img src="<?php echo 'img/products/' . $photo['photo'] ?>" alt="" class="card-img-top"
                                style="width:150px;height: 150px">
                        </div>
                    </center>
                    <?php
                }
            }
            else
            {

            }

            ?>

                    <div class="card-body" style="text-align: center;">
                        <a href="javascript:void(0)" data-bs-toggle="modal" class="openproductview"
                            data-id="<?php echo $row['prod_id'] ?>" data-bs-target="#exampleModald"
                            data-backdrop="static" data-keyboard="false" style="text-decoration: none"> <span
                                style="text-align: center;font-weight: bold"><?php echo $row['name'] ?></span> </a><br>
                        <span class="card-text" style="text-align: left;"><?php echo $row['description'] ?>
                        </span><br>
                        <span class="text-secondary" style="font-size: 20px;font-weight: bolder;">₱
                            <?php echo $row['price'] ?>
                        </span> <br>
                        <p></p>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-warning text-dark addcart" style="font-size: 13px;font-weight: bold;"
                            data-productid="<?php echo $row['prod_id'] ?>"> Add to Cart <i
                                class="fas fa-cart-plus"></i></button>

                        <?php

                            $user = $_SESSION['user_id'];

                            $checkifonthelist = " select * from wishlist where prod_id ='$itemid' and user_id = '$user'  ";
                            $checkingitem = mysqli_query($con, $checkifonthelist);
                            $thecountings = mysqli_num_rows($checkingitem);
            //  $get_id =  mysqli_insert_id($con);
                    if ($thecountings >= 1)
                    {
                    ?>
                        <button class="btn btn-light text-danger removewlist"
                            data-productid="<?php echo $row['prod_id'] ?>" style="font-size: 13px;font-weight: bold"><i
                                class="fas fa-heart"></i></button>
                        <?php
                    }
                    else
                    {
        ?>
                        <button class="btn btn-light text-danger addwishlist"
                            data-productid="<?php echo $row['prod_id'] ?>" style="font-size: 13px;font-weight: bold"><i
                                class="far fa-heart"></i></button>
                        <?php
            }

            ?>

                    </div>

                </div>

            </div>



            <!---->
            <?php
        }

    }
    else
    {

    }

?>
        </div>
    </div>

    <div class="container mt-3 mb-5">
        <div class="row">
            <h2>Ratings & Reviews</h2>
        </div>

        <div class="row mt-5 mb-5">
            <div class="media">
                <img class="mr-3" src="11.jpg" alt="Generic placeholder image">
                <div class="media-body">
                    <h5 class="mt-0">Very nice product. <span class="text-warning"><i class="fa fa-star"
                                aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i
                                class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-half-o"
                                aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span></h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                    purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                    vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="media"> <img class="mr-3" src="12.jpg" alt="Generic placeholder image">
                <div class="media-body">
                    <h5 class="mt-0">Best product best material.<span class="text-warning"><i class="fa fa-star"
                                aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i
                                class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i> </span></h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                    purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                    vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
        </div>


        <div class="row mb-5">
            <div class="media"> <img class="mr-3" src="13.jpg" alt="Generic placeholder image">
                <div class="media-body">
                    <h5 class="mt-0"> Bad product.dont take this<span class="text-warning"><i class="fa fa-star"
                                aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i
                                class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o"
                                aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span></h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                    purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                    vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
        </div>


        <div class="row mb-5">
            <div class="media"> <img class="mr-3" src="14.jpg" alt="Generic placeholder image">
                <div class="media-body">
                    <h5 class="mt-0">really nice product,value for money.<span class="text-warning"><i
                                class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-half-o"
                                aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span></h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                    purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                    vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <h2> Post Your Own Reviews</h2>
        </div>



    </div>





    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>





    <?php 
  include 'include/footer.php';

  ?>




    <script>
    $('.addcart').click(function() {


        var productid = $(this).data('productid');



        $.ajax({
            url: "add&remove.php",
            method: "POST",
            data: {
                addtocart: 1,
                productid: productid
            },
            success: function(data) {

                countitemcart();
                if (data.match("alreadyadded")) {
                    $.notify("Quantity added", "success");
                } else {
                    $.notify("Added to Cart", "success");
                }
            }
        })


    })


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
    </script>





    <!--Bootstrap Plugins-->
    <script type="text/javascript" src="js/notify.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/popper.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>