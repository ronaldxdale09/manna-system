<?php 
 include('../db.php');
                        if (isset($_POST['add'])) {
                            $name = $_POST['name'];
                            $barcode = $_POST['barcode'];
                            $size = $_POST['size'];
                            $packing = $_POST['packing'];
                            $price = $_POST['price'];
                
                            $category = $_POST['category'];
                            $quantity =  $_POST['quantity'];

                            
                            $filename = $_FILES["uploadfile"]["name"];
                            $tempname = $_FILES["uploadfile"]["tmp_name"];
                            $folder = "../../images/" . $filename;

                            if (move_uploaded_file($tempname, $folder)) {
                                echo "<h3>  Image uploaded successfully!</h3>";
                            } else {
                                echo "<h3>  Failed to upload image!</h3>";
                            }

                            $query = "INSERT INTO products (barcode,product_name,size,packing_case,price,product_img,category) 
                            VALUES ('$barcode','$name','$size','$packing','$price','$filename','$category') ";


                                $results = mysqli_query($con, $query);
                                    if ($results) {
                                        $last_id = $con->insert_id;

                                        header("Location: ../../pages/admin/items.php");
                                        exit();
                                    } else {
                                        echo "ERROR: Could not be able to execute $query. ".msqli_error($con);
                                    }
                                //exit();
                                }
 ?>