<?php

require("conn.php");

//check the form credentials and login the user

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE uname = '$email' AND password = '$password'";

    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['email'] = $email;
        header("Location: index.php");
    } else {
        echo '<script type="text/javascript"> window. onload = function () { alert("Invalid Credentials"); } </script>';
    }
}

if(isset($_POST['signup'])) {

    $uname = $_POST['new_email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    if($uname != "" && $pass != "" && $cpass != "")
    {
        

        $sql = "INSERT INTO users (uname, password ) 
                VALUES ('$uname','$pass')";

        $insert=mysqli_query($conn,$sql);
        
        if ($insert)
        {
            $email = $uname;
    $password = $pass;

    $sql = "SELECT * FROM users WHERE uname = '$email' AND password = '$password'";

    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['email'] = $email;
        header("Location: index.php");
    } else {
        echo '<script type="text/javascript"> window. onload = function () { alert("Invalid Credentials"); } </script>';
    }
        ?>

        <?php
        }else{
            echo '<script type="text/javascript"> window. onload = function () { alert("All Fields are required!!"); } </script>';
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>LOGIN</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="signin_style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <header>Login</header>
                <form action="#" method="post" target="#">
                    <div class="field input-field">
                        <input type="email" placeholder="Email" class="input" name="email">
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Password" class="password" name="password">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="form-link">
                        <a href="#" class="forgot-pass">Forgot password?</a>
                    </div>

                    <div class="field button-field">
                        <button type="submit" name="submit">Login</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Don't have an account? <a href="#" class="link signup-link">Signup</a></span>
                </div>
            </div>

        </div>

        <!-- Signup Form -->

        <div class="form signup">
            <div class="form-content">
                <header>Signup</header>
                <form action="#"method="post" target="#">
                    <div class="field input-field">
                        <input type="email" placeholder="Email" class="input" name="new_email" >
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Create password" class="password" name="pass">
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Confirm password" class="password" name="cpass">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="field button-field">
                        <button type="submit" name="signup" id="signup">Signup</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Already have an account? <a href="#" class="link login-link">Login</a></span>
                </div>
            </div>

        </div>
    </section>

    <script src="signin_script.js"></script>
</body>

</html>