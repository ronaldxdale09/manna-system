<?php 
session_start();
include '../../connections/connect.php';
require 'PHPMailer/PHPMailerAutoload.php';
// Get the expiration dates of all the products
$query = "SELECT production_code,prod_id, exp_date FROM production_log WHERE status='ACTIVE' or status='LOW'";
$result = $con->query($query);



if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['prod_id'];
        $expiration_date = $row['exp_date'];
        $production_code = $row['production_code'];
        $current_date = date("Y-m-d");

        $current_timestamp = strtotime($current_date);
        $expiration_timestamp = strtotime($expiration_date);

        echo $current_timestamp.'<br>';
        echo $expiration_timestamp.'<br>';

        // Compare the timestamps
        if ($current_timestamp >= $expiration_timestamp) {
            // The product is expired
            echo "Product with ID $id is expired.<br>";
            $query = "UPDATE `production_log` SET status='EXPIRED' WHERE prod_id='$id' and production_code='$production_code' "; 
            $results = mysqli_query($con, $query);
        } else {
            // The product is not expired
            echo "Product with ID $id is not expired.<br>";
        }
    }
}


echo 'done';





function sendMail(){
  $phpmailer = new PHPMailer();

                                    try {
                                        //Server settings
                                    
                                        $phpmailer->isSMTP();
                                        $phpmailer->Host = 'smtp.hostinger.com';
                                        $phpmailer->SMTPAuth = true;
                                        $phpmailer->Port = 587;
                                        $phpmailer->Username = 'no-reply@mannafest-app.online';
                                        $phpmailer->Password = 'Mannafest_101';


                                        $phpmailer->setFrom('no-reply@mannafest-app.online', 'Mannafest Food Inc. Online');
                                        $phpmailer->addAddress($email);

                                        //Attachments
                                        //$phpmailer->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                                        // $phpmailer->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                                        //Content
                                        $phpmailer->isHTML(true);                                  //Set email format to HTML
                                        $phpmailer->Subject = 'Password Rest Request | Mannafest Food Online'; 
                                        $phpmailer->Body    = "
                                                <center>
                                                <img src='https://i.ibb.co/pRm7g7h/logo.png' alt='header' border='0'>
                                                    <h3>Mannafest Food Inc. Online</h3>
                                                </center>
                                                    
                                                <p>   
                                                Hi  $name.
                                                <br> <br>
                                                There was a request to change your password!
                                                
                                                If you did not make this request then please ignore this email.
                                                
                                                Otherwise, please click this link to change your password:  <a href='localhost/manna-system/log/reset_pass.php?token=$random_string' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>Reset Password</a>
                                                    </p>

                                        ";


                                        $phpmailer->send();
                                        echo 'Message has been sent';
                                   
                                        $user_id = $data['user_id'];
                                    $query = "INSERT INTO password_reset (user_id,reset_token,is_valid) 
                                         VALUES ('$user_id','$random_string','1')";
                                      $results = mysqli_query($con, $query);
                                      header("Location: ../log/forgot.php");
                                      $_SESSION['sent']= "successful";

                                    } catch (Exception $e) {
                                        echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
                                    }


}

?>