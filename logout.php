<?php
require 'dbconnect.php';
$conn = connect();
session_start();
$qidd = $_SESSION['user_id'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE user_unique = '$qidd'");
$row = mysqli_fetch_assoc($query);
$name = $row['user_name'];
$email = $row['user_email'];
date_default_timezone_set('Asia/Kolkata');
$nwdt = date("d-M-Y ; h:i:s A");
if(mysqli_num_rows($query) == 1) 
{
    $sql = "UPDATE session_details SET sess_logout_time = '$nwdt' WHERE sess_email = '$email' ORDER BY sess_id DESC LIMIT 1";
    $queryy = mysqli_query($conn, $sql);
    session_destroy();
    header("location:login.php");
}
?>
