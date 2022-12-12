<?php
session_start();
include 'connections/connect.php';
$char = '';  
 if (isset($_POST['getAllitems']))
{

    echo '<br><h4 style="font-weight:bolder">All Products</h4> <hr>';

    $sorted_by_categories = " SELECT * FROM `category`  ";
    $sorting_items = mysqli_query($con, $sorted_by_categories);

    while ($getcat = mysqli_fetch_array($sorting_items))
    {
        $categoryname = $getcat['category_name'];
        $catid = $getcat['cat_id'];




?>



<div class="row mt-4">

    <!--Items-->


    <?php
        $GetProducts = " select * from product where cat_id = '$catid'  ";
        $Items = mysqli_query($con, $GetProducts);
        $countingItems = mysqli_num_rows($Items);
        //  $get_id =  mysqli_insert_id($con);
        if ($countingItems >= 1)
        {
            echo '<h4 class="mb-3" style="font-weight: bolder;text-shadow: 2px 2px #a8b6c5;">' . $categoryname . ' </h4>  ';
            while ($row = mysqli_fetch_array($Items))
            {
                $itemid = $row['prod_id'];

?>

    <!--Items-->

    <div class="col-md-3 cardd">

        <div class="card w-100 dd" style="height:100%">

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
                    data-id="<?php echo $row['prod_id'] ?>" data-bs-target="#exampleModal1" data-backdrop="static"
                    data-keyboard="false" style="text-decoration: none"> <span
                        style="text-align: center;font-weight: bold"><?php echo $row['name'] ?></span> </a><br>
                <span class="card-text" style="text-align: left;"><?php echo $row['description'] ?>
                </span><br>
                <span class="text-secondary" style="font-size: 20px;font-weight: bolder;">₱ <?php echo $row['price'] ?>
                </span> <br>
                <p></p>







            </div>
            <div class="card-footer">
                <center>
                    <button class="btn btn-dark " style="font-size: 13px;font-weight: bold;"
                        data-productid="<?php echo $row['prod_id'] ?>"> View Product <i class="fas fa-eye"></i></button>
                    <button class="btn btn-warning text-dark addcart" style="font-size: 13px;font-weight: bold;"
                        data-productid="<?php echo $row['prod_id'] ?>"> Add to Cart <i
                            class="fas fa-cart-plus"></i></button>
                </center>
                <?php

                $user = $_SESSION['user_id'];

                $checkifonthelist = " select * from wishlist where prod_id ='$itemid' and user_id = '$user'  ";
                $checkingitem = mysqli_query($con, $checkifonthelist);
                $thecountings = mysqli_num_rows($checkingitem);
                //  $get_id =  mysqli_insert_id($con);
                if ($thecountings >= 1)
                {
?>
                <button class="btn btn-light text-danger removewlist" data-productid="<?php echo $row['prod_id'] ?>"
                    style="font-size: 13px;font-weight: bold"><i class="fas fa-heart"></i></button>
                <?php
                }
                else
                {
?>
                <button class="btn btn-light text-danger addwishlist" data-productid="<?php echo $row['prod_id'] ?>"
                    style="font-size: 13px;font-weight: bold"><i class="far fa-heart"></i></button>
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
            //echo 'no data';
            
        }

?>


</div>
<?php

    }

?>

<!---->


<script>
if ($(window).width() <= 767) {
    $('.cardd').removeClass('col-md-3').addClass('col').addClass('mt-2');


}

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

$('.addwishlist').click(function() {


    var productid = $(this).data('productid');



    $.ajax({
        url: "add&remove.php",
        method: "POST",
        data: {
            addwlist: 1,
            productid: productid
        },
        success: function(data) {
            getallitems();
            $.notify("Added to Wishlist", "success");
            countitemwishlist();
        }
    })
})

$('.removewlist').click(function() {
    var productid = $(this).data('productid');
    $.ajax({
        url: "add&remove.php",
        method: "POST",
        data: {
            removewlist: 1,
            productid: productid
        },
        success: function(data) {
            getallitems();
            $.notify("Removed from Wishlist", "success");
            countitemwishlist();
        }
    })
})





$('.openproductview').click(function() {
    var id = $(this).data('id');


    $.ajax({
        url: "contents.php",
        method: "POST",
        data: {
            gettheitemsview: 1,
            id: id
        },
        success: function(data) {
            $('#productsview').html(data);
        }
    })



})

function getallitems() {


    $.ajax({
        url: "categories.php",
        method: "POST",
        data: {
            getAllitems: 1
        },
        success: function(data) {
            $('#sorted_by_categories').html(data);
        }
    })


}


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
</script>

<?php
}

?>