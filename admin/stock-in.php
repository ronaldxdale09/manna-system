<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
    header("location:../log/signin.php");
}
?>
<!DOCTYPE html>
<html>

<?php
include "head.php";
include "../connections/connect.php";


// expense category
$sql = "SELECT * FROM product";
$result = mysqli_query($con, $sql);
$prod_list='';
while($arr = mysqli_fetch_array($result))
{
$prod_list .= '

<option value="'.$arr["prod_id"].'">'.$arr["name"].'</option>';
}


?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<style>
.table td {
    font-size: 18px;
}
</style>

<body style="background-color: white">
    <div class="wrapper">


        <nav class="sidenav shadow">
            <?php include "navbar.php"; ?>
        </nav>



        <section class="home-section">

            <br>
            <div class="main_contents">
                <div class="container">

                    <h5 style="font-weight: bolder;">STOCK IN</h5>
                    <hr>
                    <div class="card shadow-sm" style="">
                        <div class="card-body">


                            <button class="btn btn-warning text-white mb-2" data-bs-toggle="modal"
                                data-bs-target="#newProd" data-backdrop="static" data-keyboard="false"
                                style="font-size: 14px;">Add new <i class="fas fa-plus-circle"></i></button>


                            <div class="table-responsive">
                                <?php $results  = mysqli_query($con, " SELECT * FROM `product` 
                                LEFT JOIN product_quantity ON product_quantity.prod_id =  product.prod_id
                                LEFT JOIN category ON product.cat_id =  category.cat_id
                                LEFT JOIN photo ON product.prod_id =  photo.prod_id"); ?>
                                <table id="production_table" class="table table-hover" style="width:100%;">
                                    <thead class="table-warning">
                                        <tr style='font-size:14px'>
                                            
                                            <th>Barcode</th>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Cost</th>
                                            <th>Price</th>
                                            <th>Total Stock</th>
                                            <th>Price</th>
                                            <th>Action</th>


                                        </tr>
                                    </thead>
                                    <tbody style='font-size:40px'>
                                        <?php while ($row = mysqli_fetch_array($results)) {
                                            if ($row['ingredients']== ','){
                                                $row['ingredients'] = 'N/A';
                                            } 
                                          
                                            ?>
                                        <tr>
                                           
                                            <td><?php echo $row['barcode']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['category_name']; ?></td>
                                            <td><?php echo $row['cost']; ?></td>
                                            <td><?php echo $row['price']; ?></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-success btn-sm text-light editmodal"
                                                        style="font-size: 12px"><i class="fas fa-eye"></i></button>
                       
                                        </div>
                                                </div>

                                            </td>
                                        </tr>

                                        <?php } ?>
                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>
                </div>

            </div>

            <div class="footer shadow">

            </div>
        </section>

    </div>
</body>




<div class="modal fade" id="newProd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="btn-close" style="float: right;" data-bs-dismiss="modal"
                    aria-label="Close"></button>

                <br>
                <form method="post" action="functions/addProduct.php"  id="savenew"
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
                            <div class="col-md-5">
                                <hr>
                                <label style="font-size: 14px" class="">Item Code/Barcode: </label>
                                <input type="text" name="barcode" style="font-size: 14px" class="form-control"
                                    required="">
                                <br>
                                <label style="font-size: 14px" class="">Enter Product Name : </label>
                                <input type="text" name="name" style="font-size: 14px" class="form-control mb-2"
                                    required="">
                                <label style="font-size: 14px" class="mb-1">Select Category: </label>
                                <select class="form-select mb-2" name="cat" style="font-size: 14px">
                                    <?php
                                        include "../connections/connect.php";
                                        $selectcategory =
                                            " select * from category  ";
                                        $selection = mysqli_query(
                                            $con,
                                            $selectcategory
                                        );
                                        $countcategory = mysqli_num_rows(
                                            $selection
                                        );
                                        //  $get_id =  mysqli_insert_id($con);
                                        if ($countcategory >= 1) {
                                            while (
                                                $row = mysqli_fetch_array(
                                                    $selection
                                                )
                                            ) { ?>
                                    <option value="<?php echo $row[
                                            "cat_id"
                                        ]; ?>"><?php echo $row[
                                            "category_name"
                                        ]; ?>
                                    </option>
                                    <?php }
                                        } else {
                                        }
                                        ?>
                                </select>
                                <div class="row">
                                    <div class="col">
                                        <label style="font-size: 14px" class="mb-3">Enter Cost: </label>
                                        <input type="text" name="cost"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                            style="font-size: 14px" class="form-control mb-2" required="">
                                    </div>
                                    <div class="col">
                                        <label style="font-size: 14px" class="mb-3">Enter Price: </label>
                                        <input type="text" name="price"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                            style="font-size: 14px" class="form-control mb-2" required="">
                                    </div>
                                </div>


                                <label style="font-size: 14px" class="mb-3">Enter Description: </label>
                                <textarea style="font-size: 14px" name="desc" class="form-control"></textarea>
                            </div>
                            <div class="col-md-3">
                                <br>
                                <label style="font-size: 14px" class="mb-3">Enter Ingredients: </label> <br>
                                <button type="button" class=" btn btn-warning add_field_button">Add Field</button>
                                <button type="button" class="btn btn-dark  remove_field_button">Remove
                                    Field</button>
                                <hr>
                                <div class="input_fields_wrap">
                                    <input type="text" name="ingredients[]" placeholder="Ingredient"
                                        class="form-control field-long" />

                                </div>
                            </div>
                        </div>

                    </div>
                    <br>

                    <button type="submit" id="disabledsave" name='savenew'class="btn btn-warning text-dark"
                        style="font-size: 15px;float: right;">Save</button>

                </form>

            </div>

        </div>
    </div>
</div>


</html>

<script type="text/javascript">
$(document).ready(function() {
    $('#production_table').DataTable();





    var max_fields = 10;
    var wrapper = $(".input_fields_wrap");
    var add_button = $(".add_field_button");
    var remove_button = $(".remove_field_button");

    $(add_button).click(function(e) {
        e.preventDefault();
        var total_fields = wrapper[0].childNodes.length;
        if (total_fields < max_fields) {
            $(wrapper).append(
                '<br><input type="text" name="ingredients[]" placeholder="Ingredient" class="form-control field-long" />'
            );
        }
    });
    $(remove_button).click(function(e) {
        e.preventDefault();
        var total_fields = wrapper[0].childNodes.length;
        if (total_fields > 1) {
            wrapper[0].childNodes[total_fields - 1].remove();
        }
    });



});
</script>

<script type="text/javascript" src="../js/sidebar.js?v=1"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="../js/datatable/datatables.js"></script>
<link rel="stylesheet" type="text/css" href="../js/datatable/datatables.css">
<!--Bootstrap Plugins-->
<script type="text/javascript" src="../js/notify.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/popper.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>

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


    updateList = function() {
        var input = document.getElementById('file');
        var output = document.getElementById('fileList');


        for (var i = 0; i < input.files.length; ++i) {
            output.innerHTML +=
                '<div class="card mb-1 " style="border-left:4px solid #5a7c7d"><div class="card-body">' +
                input.files.item(i).name + '</div></div>';
        }


    }


    removeList = function() {
        var input = document.getElementById('file');
        var output = document.getElementById('fileList');

        output.innerHTML =
            '';

    }



});
</script>

<?php

	         

// end
////////////////////////////// SAVE EDIT DELETE ///////////////////////////////////////////////




 ?>