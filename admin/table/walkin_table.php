<?php  

 $output = '';  
 include '../../connections/connect.php';
 $trans_id = (string)$_POST['trans_id'];
 
$sql  = "SELECT * from wholesale_listing_prod
LEFT JOIN ntc_product_info ON wholesale_listing_prod.product_id =  ntc_product_info.product_id
WHERE wholesale_id='$wholesale_id'  "; 



 $result = mysqli_query($con, $sql);  
 $output .= '  
            <table class="table">
            <thead class="table-dark">
                <tr>
                    <th hidden>ID</th>
                    <th> Type </th>
                    <th hidden>Prod_id</th>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th> Price </th>
                    <th> Qty</th>
                    <th>Total Amount</th>
                </tr>
            </thead>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($arr = mysqli_fetch_array($result))  
      {  


           $output .= '  
                <tr>  
                <td><span class="badge bg-success">Wholesale</span></td>
                <td scope="row" hidden>'.$arr["wholesale_id"].'</td>
                <td scope="row" hidden>'.$arr["product_id"].'</td>
                <td scope="row" >'.$arr["barcode"].'</td>
                <td scope="row">'.$arr["product_name"].'- '.$arr["description"].'</td>
                <td scope="row">₱ '.number_format($arr["price"],2).'</td>
                <td>
                <div class="input-counter"  >
                   <span class="minus-btn"><i class="fa fa-minus"></i></span>
                   <input type="text"  value="'.$arr['product_quantity'].'">
                   <span class="plus-btn"><i class="fa fa-plus"></i></span>
                </div>
             </td>
             <td scope="row">₱ '.number_format($arr["total_amount"],2).'</td>
                </tr>  
           ';  
      } 
    
}
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Nothings in the cart</td>  
                     </tr>';  
 }  
 $output .= '</table>  


      </div>';  
 echo $output;  
 ?>





<script>
$('.input-counter').each(function() {
    var spinner = jQuery(this),
        input = spinner.find('input[type="text"]'),
        btnUp = spinner.find('.plus-btn'),
        btnDown = spinner.find('.minus-btn'),
        min = input.attr('min'),
        max = input.attr('max');


    btnUp.on('click', function() {
        var oldValue = parseFloat(input.val());
        if (oldValue >= max) {
            var newVal = oldValue;
        } else {
            var newVal = oldValue + 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");

        //   get data
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        var wholesale_id = (data[1]);
        var product_id = (data[2]);
        var quantity = (newVal);

        $.ajax({
            type: "POST",
            url: "../../function/ntc_bodega/wholesale/quantityControl.php",
            data: {
                wholesale_id: wholesale_id,
                product_id: product_id,
                quantity: quantity,
            },
            cache: false,
            success: function(data) {
                let nf = new Intl.NumberFormat('en-US');
                $('#total_amount').val('₱ ' + nf.format(data));
                fetch_data();
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });





    });


    input.on('change', function() {

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        var wholesale_id = (data[1]);
        var product_id = (data[2]);
        var quantity = $(this).val();
        $.ajax({
            type: "POST",
            url: "../../function/ntc_bodega/wholesale/quantityControl.php",
            data: {
                wholesale_id: wholesale_id,
                product_id: product_id,
                quantity: quantity,
            },
            cache: false,
            success: function(data) {
                let nf = new Intl.NumberFormat('en-US');
                $('#total_amount').val('₱ ' + nf.format(data));
                fetch_data();
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });



    btnDown.on('click', function() {
        var oldValue = parseFloat(input.val());
        if (oldValue <= min) {
            var newVal = oldValue;
        } else {
            var newVal = oldValue - 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");


        //   get data
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        var wholesale_id = (data[1]);
        var product_id = (data[2]);
        var quantity = (newVal);

        if (quantity == 0) {

            $.ajax({
                type: "POST",
                url: "../../function/ntc_bodega/wholesale/remove_product.php",
                data: {
                    wholesale_id: wholesale_id,
                    product_id: product_id,
                },
                cache: false,
                success: function(data) {
                    let nf = new Intl.NumberFormat('en-US');
                    $('#total_amount').val('₱ ' + nf.format(data));
                    fetch_data();
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });

        } else {

            $.ajax({
                type: "POST",
                url: "../../function/ntc_bodega/wholesale/quantityControl.php",
                data: {
                    wholesale_id: wholesale_id,
                    product_id: product_id,
                    quantity: quantity,
                },
                cache: false,
                success: function(data) {
                    let nf = new Intl.NumberFormat('en-US');
                    $('#total_amount').val('₱ ' + nf.format(data));
                    fetch_data();
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
        }





    });





});
</script>