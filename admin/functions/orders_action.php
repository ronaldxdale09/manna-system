<?php 
session_start();
include '../../connections/connect.php';
                        if (isset($_POST['confirm'])) {
                            
                           echo  $trans_id = $_POST['trans_id'];
                            // $prod_id = $_POST['prod_id'];
           
                                    $query = "UPDATE `transaction` SET status='ready'
                                    WHERE tid='$trans_id'";         
                                $results = mysqli_query($con, $query);

                                   
                                    if ($results) {
                                        header("Location: ../orders.php");
                                        $_SESSION['confirmed_order']= "successful";
                                        
                                        exit();
                                    } else {
                                        echo "ERROR: Could not be able to execute $query. ".mysqli_error($con);
                                    }
                                exit();
                                }
                                

                                if (isset($_POST['deliver'])) {
                            
                                    echo  $trans_id = $_POST['trans_id'];
                                     // $prod_id = $_POST['prod_id'];
                    
                                             $query = "UPDATE `transaction` SET status='otw'
                                             WHERE tid='$trans_id'";         
                                         $results = mysqli_query($con, $query);
         
                                            
                                             if ($results) {
                                                 header("Location: ../orders.php?tab=2");
                                                 $_SESSION['deliver_order']= "successful";
                                                 
                                                 exit();
                                             } else {
                                                 echo "ERROR: Could not be able to execute $query. ".mysqli_error($con);
                                             }
                                         exit();
                                         }
 ?>