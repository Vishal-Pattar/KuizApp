<?php 
require 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Logo/logo.ico" type="image/x-icon">
    <title>Login</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="js/script.js"></script>
    <script src="js/login.js"></script>
</head>
<body>
    <div id="main-div">
        <div id="head-bar">
            <img id="head-logo-img" src="Logo/logo.png">
            <span id="head-logo-title" onmouseenter="swap1()" onmouseleave="swap2()">
                <span class="head-one-title">Ku</span><span class="head-one-title">iz</span>
            </span>
            <div id="head-menu-bar">
                <span id="head-menu-1" class="head-menu-digit"><a href="index.php">Home</a></span>
                <span id="head-menu-2" class="head-menu-digit">Team</span>
                <span id="head-menu-3" class="head-menu-digit"><a href="register.php">Register</a></span>
                <span id="head-menu-4" class="head-menu-digit"><a href="login.php">Login</a></span>
            </div>
        </div>
        <div id="form-area">
            <form id="form-login" name="form-login" method="post" onkeyup="styleLogin()" onsubmit="return validateLogin()">
                <div id="l-email" class="l-ele">
                    <span id="s-email" class="s-ele">Email *</span>
                    <input type="text" id="f-email" name="f-email" class="f-ele" placeholder="Enter your e-mail">
                    <span id="r-email" class="r-ele"></span>
                </div>
                <div id="l-pass" class="l-ele">
                    <span id="s-pass" class="s-ele">Password *</span>
                    <input type="text" id="f-pass" name="f-pass" class="f-ele" placeholder="Reset your password">
                    <span id="r-email" class="r-ele"></span>
                </div>
                <!-- <span id="form-area-link-login" class="form-area-link">Forgot your Password? <a href="login.php">click here</a></span> -->
                <!-- <div id="l-xxxxx" class="l-ele">
                    <span id="s-xxxxx" class="s-ele">Email *</span>
                    <input type="text" id="f-xxxxx" name="f-xxxxx" class="f-ele" placeholder="Enter your name">
                </div> -->
                <button id="f-butt" name="f-butt" class="l-butt" type="submit">Reset</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
$conn = connect();
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['f-butt']))
    { 
        $email = $_POST['f-email'];
        $pass = $_POST['f-pass'];
        $query = mysqli_query($conn, "SELECT * FROM users WHERE user_email = '$email'");
        $nwdt = date("d-M-Y ; h:i:s A");
        if(mysqli_num_rows($query) == 1) 
        {
            $pasquery = mysqli_query($conn, "UPDATE users SET user_password = '$pass' WHERE user_email = '$email'");
            $row = mysqli_fetch_assoc($query);
            $name = $row['user_name'];
            $sql = "INSERT INTO session_details (sess_name, sess_email, sess_purp, sess_login_time)
            VALUES ('$name', '$email', 'Password reset', '$nwdt')";
            mysqli_query($conn, $sql);
            echo '<script>window.alert("Your Password changed successfully");</script>';
            // header("location:login.php");
        }
        else
        {
            echo '<script>
                document.getElementsByClassName("r-ele")[0].innerHTML = "Invalid Email Credentials.";
                document.getElementsByClassName("r-ele")[0].style.color = "#F70000";
                document.getElementsByClassName("f-ele")[0].style.border = "0.25vh solid #F70000";
                document.getElementsByClassName("s-ele")[0].style.color = "#F70000";
            </script>';
        }
    }  
}
?>