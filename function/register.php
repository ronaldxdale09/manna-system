<?php 
 include('db.php');
                        if (isset($_POST['submit'])) {
                            $fname = $_POST['fname'];
                            $lname = $_POST['lname'];
                            $username = $_POST['username'];
                            $phone = $_POST['phone'];
                            $pass = $_POST['password'];
                




                            $query = "INSERT INTO users (fname,lname,username,password,userType,phone) 
                            VALUES ('$fname','$lname','$username','$pass','customer','$phone') ";


                                $results = mysqli_query($con, $query);
                                    if ($results) {
                                        $last_id = $con->insert_id;

                                        header("Location: ../../pages/user/home.php");
                                        exit();
                                    } else {
                                        echo "ERROR: Could not be able to execute $query. ".msqli_error($con);
                                    }
                                //exit();
                                }
 ?>