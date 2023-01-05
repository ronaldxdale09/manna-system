<?php 
session_start();
include '../../connections/connect.php';
                        if (isset($_POST['add'])) {
                            
                            date_default_timezone_set('Asia/Manila');
                            $datenow = date('Y-m-d H:i:s');
                   

                            $create_transaction = "INSERT INTO `transaction`(`user_id`, `paymentmethod`, `datecreated`,`status`,`type`) 
                            VALUES ('59','cash','$datenow','walkin-pending','walkin')  ";
                                $transcation_ = mysqli_query($con,$create_transaction); 

                                $transaction_id = mysqli_insert_id($con);
                                   
                                    if ($transcation_) {
    

                                        header("Location: ../walkin.php?trans=$transaction_id");
                                        // $_SESSION['new_address']= "successful";
                                        
                                        exit();
                                    } else {
                                        echo "ERROR: Could not be able to execute $query. ".mysqli_error($con);
                                    }
                                //exit();
                                }
 ?>