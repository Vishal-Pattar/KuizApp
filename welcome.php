<?php 
require 'dbconnect.php';
session_start();
if(!isset($_SESSION['user_id']))
{
    header("location:login.php");
}
?>
<?php
$conn = connect();
$qid = $_SESSION['user_id'];
$requsr = mysqli_query($conn, "SELECT * FROM users WHERE user_unique = $qid");
$req = mysqli_fetch_array($requsr);
$name = $req["user_name"];
$email = $req["user_email"];
$conta = $req["user_contact"]
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Logo/logo.ico" type="image/x-icon">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/welcome.css">
    <script src="js/script.js"></script>
</head>
<body>
    <div id="main-div">
        <div id="head-bar">
            <img id="head-logo-img" src="Logo/logo.png">
            <span id="head-logo-title" onmouseenter="swap1()" onmouseleave="swap2()">
                <span class="head-one-title">Ku</span><span class="head-one-title">iz</span>
            </span>
            <div id="head-menu-bar">
                <span id="head-menu-1" class="head-menu-digit">Home</span>
                <span id="head-menu-2" class="head-menu-digit">Team</span>
                <span id="head-menu-3" class="head-menu-digit">Contact us</span>
                <span id="head-menu-4" class="head-menu-digit"><a href="register.php">Register</a></span>
            </div>
        </div>
        <div id="info-page">
            <?php 
            echo   '<span id="wel-come" class="info-page-cen">Welcome</span>
                    <div id="var-name" class="info-page-cen"><span>'.$name.'</span></div>
                    <span id="re-gist" class="info-page-cen">Thank you for Registration</span>';
            ?>
            <hr id="hr1" class="hr">
            <?php
            echo    '<div id="info-page-div">
                        <span class="info-page-cen">Personal Information</span>
                        <span class="info-page-cen">Name: '.$name.'</span>
                        <span class="info-page-cen">Email: '.$email.'</span>
                        <span class="info-page-cen">Contact: '.$conta.'</span>
                    </div>';
            ?>
            <hr id="hr2" class="hr">
            <div id="quizzes">
                <a href="exam2.php"><span class="quiz-block">Geography</span></a>
                <a href="exam3.php"><span class="quiz-block">Technology</span></a>
                <a href="#"><span class="quiz-block">English</span></a>
            </div>
            <hr id="hr3" class="hr">
            <span class="cont3">For an queries feel free to contact us</span><br>
            <span class="cont3">Name: Vishal Pattar</span><br>
            <span class="cont3">E-mail: vishal_pattar_web@gmail.com</span><br>
            <span class="cont3">Contact: +918308322570</span>
        </div>
    </div>
</body>
</html>