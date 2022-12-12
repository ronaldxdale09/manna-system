<?php
session_start();
include "connections/connect.php";
$user = $_SESSION["user_id"];
if (isset($_POST["cartitems"])) { ?>

<style type="text/css">
#items_in_the_carts {
    /* height: 400px;
    overflow-y: scroll;*/
}

#items_in_the_carts::-webkit-scrollbar {

    width: 5px;
}
</style>
<div class="row">

    <div class="col-md-8">
        <div id="items_in_the_carts">
            <!--Items-->
            <?php
   $gettingcartitems = " select * from cart where user_id = '$user'  ";
   $resultofgetting = mysqli_query($con, $gettingcartitems);
   $countingitems = mysqli_num_rows($resultofgetting);

   if ($countingitems >= 1) {
       while ($row = mysqli_fetch_array($resultofgetting)) {
           $product_id = $row["prod_id"];
           $qty = $row["quantity"];
           $total = $row["total"];
           $cartid = $row["cart_id"];

           $totalqty[] = $qty;
           $totalamount[] = $total;

           $getproducts = " select * from product where prod_id = '$product_id'  ";
           $productdetails = mysqli_query($con, $getproducts);

           while ($item = mysqli_fetch_array($productdetails)) { ?>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <!-- <img src="img/cakr.jfif" class="img-fluid rounded float-start" style="width: 150px;height: 150px;"> -->

                                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php
          $gtproductphotosactive = " select * from photo where prod_id = '$product_id' limit 1  ";
          $result_of_getactive = mysqli_query($con, $gtproductphotosactive);

          while ($rowactive = mysqli_fetch_array($result_of_getactive)) {

              $prodactive = $rowactive["p_id"];
              $src = "img/products/" . $rowactive["photo"];
              ?>

                                        <div class="carousel-item active">

                                            <center>
                                                <div class="circle">
                                                    <img src="<?php echo $src; ?>" alt="" class="card-img-top"
                                                        style="width:100px;height: 100px">
                                                </div>
                                            </center>
                                        </div>

                                        <?php
          }

          if (isset($prodactive)) {
              $gtproductphotos = " select * from photo where prod_id = '$product_id' and p_id != '$prodactive'  ";
              $result_of_get = mysqli_query($con, $gtproductphotos);

              while ($row = mysqli_fetch_array($result_of_get)) {
                  $src = "img/products/" . $row["photo"]; ?>

                                        <div class="carousel-item">
                                            <img src="<?php echo $src; ?>" class="d-block w-100" alt="..."
                                                style="width: 150px;height: 150px;">
                                        </div>

                                        <?php
              }
          } else {
              echo "NO PHOTO AVAILABLE";
          }
          ?>
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-8">


                                <h5 class="text-primary" style="font-weight: bolder;"><?php echo $item[
            "name"
        ]; ?></h5>
                                <button class="btn btn-light text-danger remove" data-cartid="<?php echo $cartid; ?>"
                                    style="float: right;font-size: 12px"><i class="fas fa-times"></i></button>


                                <div class="det" style="font-size: 14px;height: 80px;overflow-y: scroll;">
                                    <?php echo $item["description"]; ?>
                                </div>
                                <span class="text-secondary mb-2" style="font-size: 16px;font-weight: bolder;">₱
                                    <?php echo $item["price"]; ?> </span>

                                <div class="quantity mt-3" style="float: right;">

                                    <button class="btn btn-dark plus" data-qty="<?php echo $qty; ?>" data-price="<?php echo $item[
    "price"
]; ?>" data-cartid="<?php echo $cartid; ?>" data-productid="<?php echo $item[
    "prod_id"
]; ?>" style="border-radius: 50px;padding: 2px"><i class="fas fa-plus-circle"></i></button>

                                    <input type="text" id="qty"
                                        style="width: 40px; text-align: center;outline: none;border:1px solid #bdbfc0;border-radius: 8px;font-weight: bolder;cursor: default;"
                                        name="" maxlength="1"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                        value="<?php echo $qty; ?>" readonly="">
                                    <button class="btn btn-dark minus" data-qty="<?php echo $qty; ?>" data-price="<?php echo $item[
    "price"
]; ?>" data-total="<?php echo $total; ?>" data-cartid="<?php echo $cartid; ?>" data-productid="<?php echo $item[
    "prod_id"
]; ?>" style="padding: 2px;border-radius: 50px"><i class="fas fa-minus-circle"></i></button>
                                </div>

                            </div>

                        </div>


                    </div>

                </div>

            </div>

            <?php }
       }
   } else {
        ?>
            <div class="container">
                <div style="text-align: center;">
                    <img src="assets/img/cart_empty.png" class="img-fluid mt-4" style="width: 300px">
                    <h6 class="mt-4">Shopping Cart is Empty</h6>

                    <a href="category.php">Make Order</a>
                </div>

            </div>

            <script type="text/javascript">
            $(document).ready(function() {
                $('#proceed').css('cursor', 'not-allowed');
                $('#proceed').removeClass('proceedcheckout');

            });
            </script>

            <?php
   }
   ?>





            <!---->

        </div>




    </div>

    <div class="col-md-4">

        <div class="card shadow-sm" id="orderbox">
            <div class="card-body">
                <h6 style="font-weight: bolder">Order Summary</h6>
                <hr>


                <div class="card" style="font-size: 16px">
                    <div class="card-body">
                        <span>
                            Number of Items : <span class="float-right" id="num_of_items">
                                <?php if (isset($totalqty)) {
            echo array_sum($totalqty);
        } else {
            echo "0";
        } ?>


                            </span>

                            <br>
                            Discount code : <span class="float-right" id="discount">

                                <select class="form-select" style="font-size: 14px" id="dcode">
                                    <option value="0">Select</option>
                                    <?php if (isset($totalamount)) {
             $st = array_sum($totalamount);
             $getdisc = " SELECT * FROM `promos`  ";
             $gdis = mysqli_query($con, $getdisc);
             $pcode = mysqli_num_rows($gdis);
             //  $get_id =  mysqli_insert_id($con);
             if ($pcode >= 1) {
                 while ($pc = mysqli_fetch_array($gdis)) {
                     $ed = $pc["expiration-date"];
                     $ma = $pc["maxvalue_toavail"];
                     $ds = $pc["discount"];
                     if ($st > $ma) {
                         $dc = $ds;

                         date_default_timezone_set("Asia/Manila");
                         $datenow = date("Y-m-d");

                         if (date("Y-m-d", strtotime($ed)) < $datenow) {
                         } else {
                              ?>
                                    <option value="<?php echo $ds; ?>"><?php echo $pc[
    "code"
]; ?> (<span style="float: right;color:red" class="text-danger">-₱<?php echo $ds; ?></span>)</option>


                                    <?php
                         }
                     } else {
                          ?>
                                    <option value="0">Unavailable</option>
                                    <script type="text/javascript">



                                    </script>
                                    <?php
                     }
                 }
             }
         } else {
             echo "No code available";
         } ?>

                                </select>



                            </span>

                            <span style="float: right;" class="text-danger" id="dsct"></span> <br>
                            <a href="cart.php" id="reselect" class="d-none" style="font-size: 14px;">Reselect </a>
                            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

                            <script>
                            $(document).ready(function() {
                                $('#dcode').change(function() {
                                    var val = $(this).val();

                                    $('#dsct').text('-₱' + val);
                                    var total = $('#totalll').text();

                                    var fnaltotal = total - val;

                                    $('#totalll').text(fnaltotal);
                                    $('#reselect').removeClass('d-none');
                                    $(this).addClass('d-none');



                                    $.ajax({
                                        url: "transact.php",
                                        method: "POST",
                                        data: {
                                            makesession: 1,
                                            val: val
                                        },
                                        success: function(data) {

                                        }
                                    })



                                })

                            });
                            </script>
                            <br>
                            <p></p>
<!-- 
                            <span id="dfee" class="d-none"> Delivery Fee : <span class="float-right"
                                    id="delivery_fee">₱100</span></span> -->
                            <br>
                            <hr>
                            <span style="font-size: 15px; font-weight: bolder">TOTAL : <span class="float-right"
                                    id="totalamount" style="margin-left: 20px;font-size: 17px">₱ <?php if (isset($totalamount)
       ) { ?>
                                    <span id="totalll"> <?php echo array_sum($totalamount); ?></span>
                                    <?php } else {echo "0";} ?></span></span>
                        </span>

                        <hr>
                        <span class="" style="font-size:15px;">Select Order Method</span>
                        <br>
                        <form method="post" action="#" onsubmit="return false" id="proceedwmethod">
                            <input type="hidden" name="proceedwmethod">
                            <!-- <div class="form-check">
                                <input class="form-check-input d-none" type="radio" required="" name="flexRadioDefault"
                                    id="flexRadioDefault1" required="" value="reserve">
                                <input class="form-check-input" type="radio" required="" name="flexRadioDefault"
                                    id="flexRadioDefault4" required="" value="reserve">

                                <label class="form-check-label" for="flexRadioDefault1">
                                    Reserve <i class="fas fa-info-circle text-secondary" style="font-size: 12px"
                                        data-bs-toggle="tooltip" data-bs-placement="right"
                                        title="Online booking and payment. and pick up the order in the physical store or meet in person"></i>
                                </label>
                            </div> -->

                            <br>


                            <div class="form-check">
                                <input class="form-check-input" type="radio" required="" name="flexRadioDefault"
                                    id="flexRadioDefault2" required="" value="deliver">
                                <input class="form-check-input d-none" type="radio" required="" name="flexRadioDefault"
                                    id="flexRadioDefault3" required="" value="deliver">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Cash On Delivery <i class="fas fa-info-circle text-secondary"
                                        style="font-size: 12px" data-bs-toggle="tooltip" data-bs-placement="right"
                                        title="Online payment is available. and had your order delivered to your door"></i>
                                </label>
                            </div>
                            <hr>
                            <?php if (!isset($_SESSION["user_isset"])) { ?>
                            <div class="container">
                                <h6 class="text-danger">
                                    You need to login before proceeding
                                </h6>
                            </div>
                            <button type="button" class="btn btn-dark form-control "
                                onclick="window.location.href='log/signin.php'">PROCEED</button>
                            <?php } else { ?>

                            <button type="submit" class="btn btn-dark form-control proceedcheckout"
                                id="proceed">PROCEED</button>
                            <?php } ?>


                        </form>
                    </div>

                </div>


            </div>

        </div>


    </div>
</div>




<!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" id="btnpmmodal" data-bs-toggle="modal"
    data-bs-target="#exampleModal" data-bs-target="#staticBackdrop">
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12"> <span>CONFIRM TRANSACTION</span> </div>

                </div>
                <button type="button" class="btn-close" id="closepm" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="#" id="makepayment" onsubmit="return false">
                    <input type="hidden" name="payment">
                    <div class="container">


                        <div id="shipadd" class="d-none">


                            <div class="address_box">
                                <div class="left">
                                    <div class="delivery_address">
                                        <div class="icon_circle">
                                            <i class="far fa-location"></i>
                                        </div>
                                        <p>Delivery Address</p>
                                        <div class="delivery_address_info">

                                            <?php
										$getAddress = " select * from account_ship_address where user_id='$user' and status='1' ";
										$results = mysqli_query($con, $getAddress);
										$countingAddress = mysqli_num_rows($results);
										//  $get_id =  mysqli_insert_id($con);
										if ($countingAddress >= 1) {
											while ($row = mysqli_fetch_array($results)) {
												$ship_id = $row["ship_id"]; ?>

                                            <label class="card mx-2 ">
                                                <input name="address" id='addressSelected' value='<?php echo $row[
											"ship_id"
										]; ?>' class="radio" type="radio" checked hidden>
                                                <span class="plan-details">

                                                    <span><?php echo $row["contact_name"]; ?> |
                                                        <?php echo $row["phone_number"]; ?></span>
                                                    <span>Address : <?php echo $row["address"]; ?></span>
                                                    <span>Postal : <?php echo $row["postal_code"]; ?></span>
                                                </span>
                                            </label>

                                            <?php
												}
											}
											?>


                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12">


                                <h6 style="font-weight: bolder">ORDER TOTAL AMOUNT</h6>
                                <hr>


                                <div class="card" style="font-size: 16px">
                                    <div class="card-body">
                                        <span>
                                            Number of Items : <span class="float-right" id="num_of_items">
                                                <?php if (isset($totalqty)) {
                  echo array_sum($totalqty);
              } else {
                  echo "0";
              } ?>
                                            </span>

                                            <br>
                                            Discount code : <span class="float-right" id="discount">

                                                <select class="form-select" style="font-size: 14px" id="dcode">
                                                    <option value="0">Select</option>
                                                    <?php if (isset($totalamount)) {
                                        $st = array_sum($totalamount);
                                        $getdisc = " SELECT * FROM `promos`  ";
                                        $gdis = mysqli_query($con, $getdisc);
                                        $pcode = mysqli_num_rows($gdis);
                                        //  $get_id =  mysqli_insert_id($con);
                                        if ($pcode >= 1) {
                                            while ($pc = mysqli_fetch_array($gdis)) {
                                                $ed = $pc["expiration-date"];
                                                $ma = $pc["maxvalue_toavail"];
                                                $ds = $pc["discount"];
                                                if ($st > $ma) {
                                                    $dc = $ds;

                                                    date_default_timezone_set("Asia/Manila");
                                                    $datenow = date("Y-m-d");

                                    if (date("Y-m-d", strtotime($ed)) < $datenow) {
                                    } else {
                                            ?>
                                                    <option value="<?php echo $ds; ?>"><?php echo $pc["code"]; ?>
                                                        (<span style="float: right;color:red"
                                                            class="text-danger">-₱<?php echo $ds; ?></span>)
                                                    </option>


                                                    <?php
                                                                    }
                                                                } else {
                                                                        ?>
                                                    <option value="0">Unavailable</option>
                                                    <script type="text/javascript">



                                                    </script>
                                                    <?php
                                                        }
                                                    }
                                                }
                                            } else {
                                                echo "No code available";
                                            } ?>

                                                </select>



                                            </span>

                                            <span style="float: right;" class="text-danger" id="dsct"></span>
                                            <br>
                                            <a href="cart.php" id="reselect" class="d-none"
                                                style="font-size: 14px;">Reselect </a>
                                            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

                                            <script>
                                            $(document).ready(function() {
                                                $('#dcode').change(function() {
                                                    var val = $(this).val();

                                                    $('#dsct').text('-₱' + val);
                                                    var total = $('#totalll').text();

                                                    var fnaltotal = total - val;

                                                    $('#totalll').text(fnaltotal);
                                                    $('#reselect').removeClass('d-none');
                                                    $(this).addClass('d-none');



                                                    $.ajax({
                                                        url: "transact.php",
                                                        method: "POST",
                                                        data: {
                                                            makesession: 1,
                                                            val: val
                                                        },
                                                        success: function(data) {

                                                        }
                                                    })



                                                })

                                            });
                                            </script>

<!-- 
                                            <span id="dfee" class="d-none"> Delivery Fee : <span class="float-right"
                                                    id="delivery_fee">₱100</span></span> -->
                                            <br>
                                            <hr>
                                            <span style="font-size: 15px; font-weight: bolder">TOTAL : <span
                                                    class="float-right" id="totalamount"
                                                    style="margin-left: 20px;font-size: 17px">₱ <?php if (
                                                        isset($totalamount)
                                                    ) { ?>
                                                    <span id="totalll">
                                                        <?php echo array_sum($totalamount); ?></span>
                                                    <?php } else {echo "0";} ?></span></span>
                                        </span>


                                        <br>
                                    </div>

                                </div>


                            </div>


                            <button type="button" id="codbtn" class="btn btn-dark mt-3 form-control py-2"
                                style="font-size: .8rem;">PLACE ORDER</button>



                        </div>

                        <!-- <div class="form-group"> <span class="text-success"
                                style="font-size: 12px;font-weight: bolder;">(RECOMMENDED PAYMENT METHOD)</span> <input
                                value="MAKE PAYMENT" type="submit" class="btn btn-success btn-lg form-control mt-3"
                                style="font-size: .8rem;">

                        </div> -->

                        <!-- <button type="button" onclick="window.location.href='paypal.php'"
                            class="btn btn-primary mt-3 form-control py-2" style="font-size: .8rem;">PayPal</button> -->



                    </div>



                    <input type="hidden" name="pm" id="pm" value="">


                </form>




            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {

    $('#cc-number').keyup(function() {
        var value = $(this).val();

        if (value == '') {
            $('#codbtn').removeClass('d-none');
        } else {
            $('#codbtn').addClass('d-none');
        }

    })

    $('#flexRadioDefault1').click(function() {
        $('#dfee').addClass('d-none');
        var total = $('#totalll').text();


        var finaltotal = Number(total) - 100;
        $('#flexRadioDefault3').addClass('d-none');
        $('#flexRadioDefault2').removeClass('d-none');
        $('#totalll').text(finaltotal);
        $('#flexRadioDefault4').removeClass('d-none');
        $('#flexRadioDefault4').prop('checked', true);
        $(this).addClass('d-none');

    })
    $('#flexRadioDefault2').click(function() {
        $('#dfee').removeClass('d-none');

        var total = $('#totalll').text();


        var finaltotal = Number(total);
        $(this).addClass('d-none');

        $('#totalll').text(finaltotal);
        $('#flexRadioDefault4').addClass('d-none');
        $('#flexRadioDefault1').removeClass('d-none');
        $('#flexRadioDefault3').prop('checked', true);
        $('#flexRadioDefault3').removeClass('d-none');

    })

    $('#flexRadioDefault3').click(function() {



        $('#dfee').removeClass('d-none');
    })

    $('#closepm').click(function() {
        $('#proceed').html('PROCEED');
    })

    $('#shippingaddress').keyup(function() {
        var uid = $(this).data('userid');
        var val = $(this).val();

        $.ajax({
            url: "transact.php",
            method: "POST",
            data: {
                editaddress: 1,
                uid: uid,
                val: val
            },
            success: function(data) {

            }
        })




    })

    $('#makepayment').on('submit', function(event) {
        event.preventDefault();
        var total = $('#totalll').text();

        Swal.fire({
            title: 'Are you sure to pay ' + total + '?',
            text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#7b90b5',
            cancelButtonColor: '#b5a07b',
            confirmButtonText: 'Proceed'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "transact.php",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function(data) {

                        window.location.href = 'successful.php';




                    }
                })
            }
        })






    });

    $('#codbtn').click(function() {

        var total = $('#totalll').text();

        if (total > 10100) {

            Swal.fire(
                'Limit Reached!',
                'Order amount has Reached or exceeded the COD limit,To proceed, You should pay your order through Credit or Debit card payment ',
                'error'
            )
        } else {

            $.ajax({
                url: "transact.php",
                method: "POST",
                data: {
                    payment: 1,
                    flexRadioDefault: 'cod',
                    pm: 'cod'
                },
                success: function(data) {

                    <?php
      $user = $_SESSION["user_id"];
      $checkif_thersorder = "select * from transaction where user_id ='$user' and status != 'completed'  ";
      $chckingorder = mysqli_query($con, $checkif_thersorder);

      $counts = mysqli_num_rows($chckingorder);
      //$newlyinsertedid = mysqli_insert_id($con);
      if ($counts >= 1) {
          while ($row = mysqli_fetch_array($chckingorder)) {
              $porder = $row["tid"];
          } ?>
                    window.location.href = 'orders.php?p=<?php echo $porder; ?>';
                    <?php
      } else {
           ?>
                    window.location.href = 'orders.php';
                    <?php
      }
      ?>






                }
            })

        }





    })

    $('#proceedwmethod').on('submit', function(event) {
        event.preventDefault();

        $('#proceed').html(
            '<div class="spinner-grow text-light " role="status"><span class="visually-hidden"></span></div><div class="spinner-grow text-light" role="status"><span class="visually-hidden"></span></div><div class="spinner-grow text-light" role="status"><span class="visually-hidden"></span></div>'
        );
        $.ajax({
            url: "transact.php",
            method: "POST",
            data: $(this).serialize(),
            success: function(data) {

                $('#btnpmmodal').click();
                if (data == 'reserve') {

                    $('#pm').val('reserve');
                    $('#shipadd').addClass('d-none');
                } else if (data == 'deliver') {
                    $('#shipadd').removeClass('d-none');
                    $('#pm').val('deliver');
                }

                /*  $('#proceed').html('Redirecting ..');
                  setInterval(function(){
                    window.location.href='successful.php';
                  },2000);

                  */

            }
        })
    });

    $('.remove').hover(function() {
        $(this).html(' Remove <i class="fas fa-times"></i> ');

    }, function() {
        $(this).html(' <i class="fas fa-times"></i> ');
    });

    $('.remove').click(function() {
        var cartid = $(this).data('cartid');
        $.ajax({
            url: "add&remove.php",
            method: "POST",
            data: {
                removefromcart: 1,
                cartid: cartid
            },
            success: function(data) {
                cartitems();
            }
        })
    })
    $('.plus').click(function() {
        var cartid = $(this).data('cartid');
        var productid = $(this).data('productid');
        var qty = $(this).data('qty');
        var totalqty = qty + 1;
        var price = $(this).data('price');
        var totalprice = price * totalqty;

        $('#qty').css('color', 'red');
        $.ajax({
            url: "add&remove.php",
            method: "POST",
            data: {
                increaseqty: 1,
                cartid: cartid,
                totalqty: totalqty,
                total: totalprice
            },
            success: function(data) {
                cartitems();
                $('#totalamount').css('color', 'red');
            }
        })



    })
    $('.minus').click(function() {
        var cartid = $(this).data('cartid');
        var productid = $(this).data('productid');
        var qty = $(this).data('qty');
        var totalqty = qty - 1;
        var price = $(this).data('price');

        $('#qty').css('color', 'red');
        var total = $(this).data('total');

        var totalprice = price * totalqty;


        if (totalqty == 0) {

            $.ajax({
                url: "add&remove.php",
                method: "POST",
                data: {
                    removefromcart: 1,
                    cartid: cartid
                },
                success: function(data) {
                    cartitems();
                    $('#totalamount').css('color', 'red');
                }
            })


        } else {

            $.ajax({
                url: "add&remove.php",
                method: "POST",
                data: {
                    reduceqty: 1,
                    cartid: cartid,
                    totalqty: totalqty,
                    total: totalprice
                },
                success: function(data) {
                    cartitems();
                    $('#totalamount').css('color', 'red');
                }
            })

        }
    })


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

<?php }

?>