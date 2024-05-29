<?php
include_once 'connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM students WHERE id = $id";
$result = mysqli_query($conn, $sql);

if($result){
    header('location: student.php');
}



?>