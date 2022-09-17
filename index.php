<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manna | Login</title>

    <!-- stylesheet -->
    <link rel="stylesheet" href="./stylesheet/index.css">
    <link rel="stylesheet" href="./stylesheet/main.css">

    <!-- animation library -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <!-- animte on scroll -->
     <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- manna icon -->
    <link rel="icon" href="./assets/logo/logo.png" sizes="10x10">
</head>
<body>
    <div class="container">
        <div class="login_box">
            <div class="logo_container">
                <a href="./home.php">
                    <img src="./assets/logo/logo.png" alt="" class="animate__animated animate__bounceInDown">
                </a>
                <br>
                <p>Sign in to your account</p>
            </div>
            <form method='POST' action="function/login.php">
                <input type="text" name='username' placeholder="Username">
                <br>
                <br>
                <input type="text" name='password' placeholder="Password">
                <br>
                <br>
                <input type="submit" value="Login">
            </form>
            <center>
                <a href="./fogot_password.php" id="forgot_password">Forgot Password?</a>
            </center>
            <a href="pages/create_account.php">
                <input type="button" value="Register New Account">
            </a>
        </div>
    </div>
</body>
</html>