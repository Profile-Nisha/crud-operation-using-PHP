<?php

$server = "localhost";
$usernme = "root";
$password = "";
$db_name = "college_detail";
$conn = mysqli_connect($server, $usernme, $password, $db_name);

if(!$conn){
    echo "Connection Failed!";
}



?>