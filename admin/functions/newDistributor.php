<?php 
session_start();
include '../../connections/connect.php';
                        if (isset($_POST['add'])) {
                            
                            date_default_timezone_set('Asia/Manila');
                            $datenow = date('Y-m-d H:i:s');
                            $distributor = $_POST['distributor'];
                         

                            $create_transaction = "INSERT INTO `transaction`(`dis_id`, `paymentmethod`, `datecreated`,`status`,`type`) 
                            VALUES ('$distributor','cash','$datenow','Distributor-pending','distributor')  ";
                                $transcation_ = mysqli_query($con,$create_transaction); 

                                $transaction_id = mysqli_insert_id($con);
                                   
                                    if ($transcation_) {
                                    

                                        header("Location: ../distributor.php?trans=$transaction_id");
                               

                                        
                                        exit();
                                    } else {
                                        echo "ERROR: Could not be able to execute $query. ".mysqli_error($con);
                                    }
                                //exit();
                                }
 ?>