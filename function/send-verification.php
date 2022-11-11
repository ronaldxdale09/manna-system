

<?php
// include('connections/connect.php');
// Required if your environment does not handle autoloading
require '../vendor/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;




// Your Account SID and Auth Token from twilio.com/console
$sid = 'AC9816983c732135ce8c02e16db932ffe2';
$token = '74d01dde1d7889e57959675728b15c75';
$client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
$messege = $client->messages->create(
    // the number you'd like to send the message to
    '+639559906613',
    [
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+19789938350',
        // the body of the text message you'd like to send
        'body' => 'Your Mannafest verification code is: 432673'
    ]
);

if ($messege){
    echo 'message sent';
}
else {
    echo 'message not sent';
}

?>