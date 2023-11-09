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
    <title>Register</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/register.css">
    <script src="js/script.js"></script>
    <script src="js/register.js"></script>
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
            <form id="form-regist" name="form-regist" method="post" onkeyup="styleRegister()" onsubmit="return validateRegister()">
                <div id="l-name" class="l-ele">
                    <span id="s-name" class="s-ele">Name *</span>
                    <input type="text" id="f-name" name="f-name" class="f-ele" placeholder="Enter your name">
                    <span id="r-email" class="r-ele"></span>
                </div>
                <div id="l-email" class="l-ele">
                    <span id="s-email" class="s-ele">Email *</span>
                    <input type="text" id="f-email" name="f-email" class="f-ele" placeholder="Enter your e-mail">
                    <span id="r-email" class="r-ele"></span>
                </div>
                <div id="l-contact" class="l-ele">
                    <span id="s-contact" class="s-ele">Contact Number *</span>
                    <input type="text" id="f-contact" name="f-contact" class="f-ele" placeholder="Enter your contact number">
                    <span id="r-email" class="r-ele"></span>
                </div>
                <div id="l-pass" class="l-ele">
                    <span id="s-pass" class="s-ele">Password *</span>
                    <input type="text" id="f-pass" name="f-pass" class="f-ele" placeholder="Enter your password">
                    <span id="r-email" class="r-ele"></span>
                </div>
                <div id="l-sopt">
                    
                </div>
                <!-- <div id="l-xxxxx" class="l-ele">
                    <span id="s-xxxxx" class="s-ele">Email *</span>
                    <input type="text" id="f-xxxxx" name="f-xxxxx" class="f-ele" placeholder="Enter your name">
                </div> -->
                <button id="f-butt" name="f-butt" class="l-butt" type="submit">Signup</button>
            </form>

            <span id="form-area-link-login" class="form-area-link">Already have an account? <a href="login.php">click here</a></span>
            <span id="form-area-link-forgot" class="form-area-link">Forgot your account? <a href="forgot.php">click here</a></span>
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
        $name = $_POST['f-name'];
        $email = $_POST['f-email'];
        $contact = $_POST['f-contact'];
        $password = $_POST['f-pass'];
        $unique = rand(100000,999999);
        $query = mysqli_query($conn, "SELECT user_email FROM users WHERE user_email = '$email' ");
        $row = mysqli_fetch_assoc($query);
        if($email != $row['user_email'])
        {
            $sql = "INSERT INTO users(user_unique, user_name, user_email, user_contact, user_password)
            VALUES ('$unique','$name', '$email', '$contact', '$password')";
            mysqli_query($conn, $sql);
            echo '<script>alert("'.$name.' you have registered successfully!")</script>';
            header("location:login.php");
        }
        else if($email == $row['user_email'])
        {
            echo '<script>
            document.getElementsByClassName("r-ele")[1].innerHTML = "This Email already exists.";
            document.getElementsByClassName("r-ele")[1].style.color = "#F70000";
            </script>';
        }
    }
}
?>