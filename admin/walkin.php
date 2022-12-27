<?php include 'head.php';
include "../connections/connect.php";
 ?>

</head>
<link rel="stylesheet" href="css/walkin.css">

<body>
    <header> <br>
        <h3>NTC WHOLESALE </h3>

    </header>

    <main>
        <div class="container-p">
            <div class="flex-2-p">
                <span class=" bg-dark">
                    <h4>Walk in ID : #</h4>
                </span>
                <hr>
                <div class="table-box-p">
                    <div id="live_data"></div>
                </div>

                <!-- END OF TABLE FLEX 2 -->

            </div>
            <div class="flex-1-p">

                <div class="bar-total">

                    Total Amount <input type="text" id="total_amount" class='form-control total_amount' readonly>
                    <br>
                </div>


                <div class="bar-top">
                    <br>
                    <div class="dtable">
                        <?php   $listProd = mysqli_query($con, "SELECT * from product");?>


                        <table id="table-prods" class="table">
                            <thead class="table-dark" style='font-size:12px'>
                                <tr>
                                    <th hidden>id</th>
                                    <th>Barcode</th>
                                    <th>Product </th>
                                    <th>Inventory</th>
                                    <th>Unit Per Box</th>
                                    <th>Wholesale Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_array($listProd)) { ?>
                                <tr>
                                    <td hidden><?php echo $row['prod_id']?></td>
                                    <td><?php echo $row['barcode']?></td>
                                    <!-- <td><?php echo $row['name']?></td>
                                    <td><?php echo $row['quantity']?></td>
                                    <td><?php echo $row['case_quantity']?></td>
                                    <td> ₱ <?php echo number_format($row['case_price'],2); ?></td> -->
                                    <td><button type="button" id='btnAdd' class='btnAdd'><i
                                                class="fa fa-plus-circle"></i></button>
                                    </td>
                                </tr>


                                <?php } ?>

                            </tbody>
                        </table>

                    </div>

                </div>
                <div class="menu-bar">

                    <div class="bar-4 btnConfirm">
                        <b>[ F5 ] <br> Confirm Transfer</b>
                    </div>
                    <div class="bar-3 btnVoid" data-bs-toggle="modal" data-bs-target="#staticVoid">
                        <b>[ F2 ] <br> VOID</b>
                    </div>

                </div>
            </div>
        </div>
    </main>
</body>

</html>

<script type="text/javascript">
$(document).ready(function() {


    table = $('#table-prods').DataTable({
        dom: 'frtip',

    });


});
</script>
<script>
// function fetch_data() {

//     var wholesale_id = <?php echo $wholesale_id ?>;
//     $.ajax({
//         url: "wholesale_table/wholesale_table.php",
//         method: "POST",
//         data: {
//             wholesale_id: wholesale_id,

//         },
//         success: function(data) {
//             $('#live_data').html(data);
//         }
//     });
// }

// fetch_data();
</script>

<script>
$('#addProd').submit(function() {
    return false;
});


$('#addBtn').click(function() {
    $("#addProduct").modal("hide");
    $.post($('#addProd').attr('action'), $('#addProd :input').serializeArray(), function(result) {
        console.log(result);
        let nf = new Intl.NumberFormat('en-US');
        $('#total_amount').val('₱ ' + nf.format(result));
        fetch_data();
    });
});


$('#table-prods').on('click', '.btnAdd', function() {

    $('#addProduct').modal('show');
    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();
    $('#product_id').val(data[0]);
    $('#barcode').val(data[1]);
    $('#p_name').val(data[2]);

    $('#qty_box').val(data[4]);
    $('#whole_price').val(data[5]);
});
</script>




<script>
$(document).ready(function() {
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) >
                -1)
        });
    });



    // $('.btnAdd').on('click', function() {


    //     $('#addProduct').modal('show');
    //     $tr = $(this).closest('tr');

    //     var data = $tr.children("td").map(function() {
    //         return $(this).text();
    //     }).get();
    //     $('#product_id').val(data[0]);
    //     $('#barcode').val(data[1]);
    //     $('#p_name').val(data[2]);

    //     $('#qty_box').val(data[4]);
    //     $('#whole_price').val(data[5]);
    // });



    $('.btnConfirm').on('click', function() {

        function fetch_data() {

            var wholesale_id = <?php echo $wholesale_id ?>;
            $.ajax({
                url: "wholesale_table/confirm_wholesale.php",
                method: "POST",
                data: {
                    wholesale_id: wholesale_id,

                },
                success: function(data) {
                    $('#confirm_table').html(data);
                }
            });
        }
        fetch_data();
        $('#c_total_amount').val($('#total_amount').val())
        $('#confirmModal').modal('show');


    });


    $('.btnVoid').on('click', function() {
        var wholesale_id = <?php echo $wholesale_id ?>;

        $('#voidTransfer').modal('show');


    });




});
</script>