<?php
// Establish Connection to Database
function connect() {
    static $conn;
    if ($conn === NULL)
    { 
        $conn = mysqli_connect('localhost','root','','kuiz');
    }
    return $conn;
}
date_default_timezone_set('Asia/Kolkata');
?>