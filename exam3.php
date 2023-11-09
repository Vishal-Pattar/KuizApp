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
$questionset = 'set_ai';
$answerset = 'answer_set';
?>
<?php
    $qnn = $_SESSION['ques'];
    if(isset($_POST['next']) && $qnn < 20){
        $_SESSION['ques']++;
    }
    if(isset($_POST['prev']) && $qnn > 1){
        $_SESSION['ques']--;
    }
    $qn = $_SESSION['ques'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Logo/logo.ico" type="image/x-icon">
    <title>Exam3</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/exam.css">   
    <script src="js/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/exam.js"></script>
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
        <div id="info-page">
            <div id="num-box">
                <form id="n-form" name="n-form" method="POST">
                    <button class="nb" id="n1" name="n1" value="1" type="submit" onsubmit="return False">01</button>
                    <button class="nb" id="n2" name="n2" value="2" type="submit" onsubmit="return False">02</button>
                    <button class="nb" id="n3" name="n3" value="3" type="submit" onsubmit="return False">03</button>
                    <button class="nb" id="n4" name="n4" value="4" type="submit" onsubmit="return False">04</button>
                    <button class="nb" id="n5" name="n5" value="5" type="submit" onsubmit="return False">05</button>
                    <button class="nb" id="n6" name="n6" value="6" type="submit" onsubmit="return False">06</button>
                    <button class="nb" id="n7" name="n7" value="7" type="submit" onsubmit="return False">07</button>
                    <button class="nb" id="n8" name="n8" value="8" type="submit" onsubmit="return False">08</button>
                    <button class="nb" id="n9" name="n9" value="9" type="submit" onsubmit="return False">09</button>
                    <button class="nb" id="n10" name="n10" value="10" type="submit" onsubmit="return False">10</button>
                    <button class="nb" id="n11" name="n11" value="11" type="submit" onsubmit="return False">11</button>
                    <button class="nb" id="n12" name="n12" value="12" type="submit" onsubmit="return False">12</button>
                    <button class="nb" id="n13" name="n13" value="13" type="submit" onsubmit="return False">13</button>
                    <button class="nb" id="n14" name="n14" value="14" type="submit" onsubmit="return False">14</button>
                    <button class="nb" id="n15" name="n15" value="15" type="submit" onsubmit="return False">15</button>
                    <button class="nb" id="n16" name="n16" value="16" type="submit" onsubmit="return False">16</button>
                    <button class="nb" id="n17" name="n17" value="17" type="submit" onsubmit="return False">17</button>
                    <button class="nb" id="n18" name="n18" value="18" type="submit" onsubmit="return False">18</button>
                    <button class="nb" id="n19" name="n19" value="19" type="submit" onsubmit="return False">19</button>
                    <button class="nb" id="n20" name="n20" value="20" type="submit" onsubmit="return False">20</button>
                </form>
                <?php
                    for ($x = 1; $x <= 20; $x++) {
                        $xx =  "n".strval($x);
                        if(array_key_exists($xx, $_POST)) {
                            // echo '<script>alert("Hello World")</script>';
                            $_SESSION['ques'] = $x;
                        }
                    }
                    $qn = $_SESSION['ques'];
                ?>
                <?php 
                    $bquery = mysqli_query($conn, "SELECT * FROM $answerset WHERE ans_uni = '$ansuni'");
                    while($brow = mysqli_fetch_array($bquery)){
                        $yn = $brow['ans_q'] - 1;
                        echo '<script>
                        document.getElementsByClassName("nb")['.$yn.'].style.backgroundColor="#03A79D";
                        </script>';
                    }
                ?>
            </div>
            <form name="f1" method="POST">
            <div id="quest-box">
                <?php
                    $quno = "Q" . strval($qn);
                    $query = mysqli_query($conn, "SELECT * FROM $questionset WHERE quno = '$quno'");
                    while($row = mysqli_fetch_array($query))
                    {
                        echo '
                        <span id="quno">'.$row['quno'].'</span>
                        <span id="ques">'.$row['ques'].'</span>
                        <div id="ques-opt">
                            <div id="all-but-1" class="all-butt">
                                <label id="but-opt1-span" class="but-opt-label">
                                <input id="but-opt1" class="but-opt" name="radio" value="A" type="radio">
                                <span id="but-opt-text1" class="but-opt-text">'.$row['opt1'].'</span></label>
                            </div>
                            <div id="all-but-2" class="all-butt">
                                <label id="but-opt2-span" class="but-opt-label">
                                <input id="but-opt2" class="but-opt" name="radio" value="B" type="radio">
                                <span id="but-opt-text2" class="but-opt-text">'.$row['opt2'].'</span></label>
                            </div>
                            <div id="all-but-3" class="all-butt">
                                <label id="but-opt3-span" class="but-opt-label">
                                <input id="but-opt3" class="but-opt" name="radio" value="C" type="radio">
                                <span id="but-opt-text3" class="but-opt-text">'.$row['opt3'].'</span></label><br>
                            </div>
                            <div id="all-but-4" class="all-butt">
                                <label id="but-opt4-span" class="but-opt-label">
                                <input id="but-opt4" class="but-opt" name="radio" value="D" type="radio">
                                <span id="but-opt-text4" class="but-opt-text">'.$row['opt4'].'</span></label><br>
                            </div>              
                        </div>';
                    }
                ?>
                <?php
                    if(isset($_POST['radopt']))
                    {
                        $opt = $_POST['radopt'];
                        $sta1 = mysqli_query($conn, "SELECT * FROM $answerset WHERE ans_quno = '$quno' AND ans_uni = '$ansuni'");
                        if(mysqli_num_rows($sta1) == 1 && $opt != '')
                        {
                            $sta2 = "UPDATE $answerset SET ans_opt = '$opt' WHERE ans_quno = '$quno'";
                            mysqli_query($conn, $sta2);
                        }
                        else if(mysqli_num_rows($sta1) == 0 && $opt != '')
                        {
                            $sta3 = "INSERT INTO $answerset (ans_uni, ans_email, ans_q, ans_quno, ans_opt) VALUES ('$ansuni','$email', '$qn', '$quno', '$opt')";
                            mysqli_query($conn, $sta3);
                        }
                        /********************************************** */
                        $tat1 = mysqli_query($conn, "SELECT ans FROM $questionset WHERE quno = '$quno'");
                        while($rtat1 = mysqli_fetch_array($tat1))
                        {
                            $rctat1 = $rtat1['ans'];
                            mysqli_query($conn, "UPDATE $answerset SET ans_res = '$rctat1' WHERE ans_quno = '$quno' AND ans_uni = '$ansuni'");
                        }
                        /******************************************** */
                        $tat2 = mysqli_query($conn, "SELECT * FROM $answerset WHERE ans_quno = '$quno' AND ans_uni = '$ansuni'");
                        while($rtat2 = mysqli_fetch_array($tat2))
                        {
                            $rctat21 = $rtat2['ans_opt'];
                            $rctat22 = $rtat2['ans_res'];
                            if($rctat21 == $rctat22)
                            {
                                mysqli_query($conn, "UPDATE $answerset SET ans_pt = 1 WHERE ans_quno = '$quno' AND ans_uni = '$ansuni'");
                            }
                            else if($rctat21 != $rctat22)
                            {
                                mysqli_query($conn, "UPDATE $answerset SET ans_pt = 0 WHERE ans_quno = '$quno' AND ans_uni = '$ansuni'");
                            }
                        }
                        $stord = "SELECT ans_quno FROM $answerset ORDER BY ans_q";
                        mysqli_query($conn, $stord);
                    }
                ?>
            </div>
            <div id="pvnt">
                <input id="prev" name="prev" class="prxt" type="submit" value="<=prev" onclick="transfer_data3()">
                <input id="rese" name="rese" class="prxt" type="reset" value="clear">
                <input id="next" name="next" class="prxt" type="submit" value="next=>" onclick="transfer_data3()">
            </div>
            </form>
            <div id="smbt-row">
                <a href="score.php"><button id="smbt" class="prxt" type="button">Submit</button></a>
            </div>
        </div>
    </div>
</body>
</html>