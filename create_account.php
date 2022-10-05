<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manna | Create Account</title>
    
    <!-- stylesheet -->
    <link rel="stylesheet" href="stylesheet/create_account.css">
    <link rel="stylesheet" href="stylesheet/main.css">

    <!-- animation library -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

  
    <!-- manna icon -->
    <link rel="icon" href="assets/logo/logo.png" sizes="10x10">
</head>
<body>
    <div class="container__">
        <div class="left">
            <div class="info">
                <a href="home.php">
                    <img src="assets/logo/logo_transparent.png" alt="">
                </a>
                <p>Already Registered?</p>
            </div>
            <a href="index.php">
                <button>Login</button>
            </a>
        </div>
        <div class="right">
            <div class="registration_box">
                <header>
                    <h2 class="animate__animated animate__bounce">Create Account</h2>
                </header>
                <form method="POST" action="function/register.php">
                    <label for="" >First Name</label>
                    <br>
                    <input type="text" class="form-control" name='fname'>
                    <br>
                    <label for="" >Last Name</label>
                    <br>
                    <input type="text" name="lname">
                    <br>
                    <label for="">Username</label>
                    <br>
                    <input type="text"  name="username">
                    <br>
                    <label for="">Phone Number</label>
                    <br>
                    <input type="text"  name="phone">
                    <br>
                    <label for="" >Password</label>
                    <br>
                    <input type="password" name="password">
                    <br>
                    <label for="" >Confirm Password</label>
                    <br>
                    <input type="password" name="confirm_password">
                    <br>
                    <br>
                    <center>
                        <button type="submit" name='submit'>Sign Up</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</body>
</html>