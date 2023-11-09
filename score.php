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
$ansuni = $_SESSION['ans_uni'];
$requsr = mysqli_query($conn, "SELECT * FROM users WHERE user_unique = $qid");
$req = mysqli_fetch_array($requsr);
$name = $req["user_name"];
$email = $req["user_email"];
?>
<?php
$scquery = mysqli_query($conn, "SELECT * FROM answer_set WHERE ans_uni = '$ansuni' AND ans_email = '$email' AND ans_pt = 1");
$scrow = mysqli_num_rows($scquery);
$sccor = sprintf("%02d", $scrow);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Logo/logo.ico" type="image/x-icon">
    <title>Score</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/score.css">   
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
                <span id="head-menu-1" class="head-menu-digit"><a href="index.php">Home</a></span>
                <span id="head-menu-2" class="head-menu-digit">Team</span>
                <!-- <span id="head-menu-3" class="head-menu-digit"><a href="register.php">Register</a></span> -->
                <span id="head-menu-4" class="head-menu-digit"><a href="logout.php">Logout</a></span>
            </div>
        </div>
        <div id="score-page">
            <!-- <img id="congo-trophy" src="img/trophy-bg.png"> -->
            <?php echo '<span id="congo-msg">Congratulations</span>
                        <span id="user-name">'.$name.'</span>
                        <span id="score-ls">Total Score</span>
                        <div id="score-box">
                            <span id="num-score">'.strval($sccor).'</span>
                            <span id="den-score">20</span>
                        </div>';
            ?>
        </div>
    </div>
</body>
</html>