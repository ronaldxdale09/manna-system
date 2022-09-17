
  
<?php 
 include('../db.php');
                        if (isset($_POST['add'])) {
                            $name = $_POST['name'];
                            $barcode = $_POST['barcode'];
                            $size = $_POST['size'];
                            $packing = $_POST['packing'];
                            $price = $_POST['price'];
                            $img = $_POST['img'];
                            $quantity =  $_POST['quantity'];

                            $query = "INSERT INTO products (barcode,product_name,size,packing_case,price,product_img) 
                            VALUES ('$barcode','$name','$size','$packing','$price','$img') ";


                                $results = mysqli_query($con, $query);
                                    if ($results) {
                                        $last_id = $con->insert_id;

                                        header("Location: ../pages/admin/items.php");
                                        exit();
                                    } else {
                                        echo "ERROR: Could not be able to execute $query. ".msqli_error($con);
                                    }
                                //exit();
                                }
 ?>