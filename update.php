<?php
//  error_reporting(0);
include_once 'connection.php';

 $target_dir = "assets/uploads/";
 $target_file = $target_dir . basename($_FILES["pic"]["name"]);
 $uploadOk = 1;
 $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
 if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
     $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $image = $_FILES['pic']['name'];

    $check = getimagesize($_FILES["pic"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
       $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
     echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["pic"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf"
    && $imageFileType != "gif"
) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
 }

//   Check if $uploadOk is set to 0 by an error
 if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
 } else {
    if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
         $sql = "UPDATE students SET first_name = '$fname ', last_name='$lname ', email='$email', gender='$gender', department='$department', image='$image' where id=$id";

        if (mysqli_query($conn, $sql)) {
             echo "New record created successfully";
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

         
        echo "The file " . htmlspecialchars(basename($_FILES["pic"]["name"])) . " has been uploaded.";
        header('location: student.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}






// if (isset($_POST['submit'])) {
//     $id = $_POST['id'];
//     $fname = $_POST['fname'];
//     $lname = $_POST['lname'];
//     $email = $_POST['email'];
//     $gender = $_POST['gender'];
//     $department = $_POST['department'];

//     $image = $_FILES['image']['name'];
    

//     $sql = "UPDATE students SET first_name = '$fname ', last_name='$lname ', email='$email', gender='$gender', department='$department', image='$image' where id=$id";

//     if (mysqli_query($conn, $sql)) {
        
//         header('location: student.php');
//     } else {
//         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//     }

    


?>