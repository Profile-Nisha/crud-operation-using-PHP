<?php
error_reporting(0);
include_once 'connection.php';
$target_dir = "assets/uploads/";
$target_file = $target_dir . basename($_FILES["pic"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if (isset($_POST['submit'])) {
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

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO students (first_name, last_name, email, gender, department, image) 
    VALUES ('$fname' , '$lname' , '$email' , '$gender' , '$department', '$image')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully"; 
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
        echo "The file " . htmlspecialchars(basename($_FILES["pic"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}



?>


<?php include 'header.php'; ?>



<section>
    <div class="container">
        <div class="display">
            <h1 class="h">REGISTRATION FORM</h1>
            <form class="formmat" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <label for="fname">First name:</label><br><br>
                <input type="text" id="fname" name="fname"><br><br>
                <label for="lname">Last name:</label><br><br>
                <input type="text" id="lname" name="lname"><br><br>
                <label for="lemail">email:</label><br><br>
                <input type="email" id="email" name="email"><br><br>
                <div class="rad">
                    <p>Gender:</p><br><br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="Male" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="Female" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Female
                        </label>
                    </div>
                </div>
                <div class="dropdown col-3">
                    <select class="form-select" name="department" aria-label="Default select example">
                        <option selected>Department</option>
                        <option value="MCA">MCA</option>
                        <option value="B-TECH">B-TECH</option>
                        <option value="BCA">BCA</option>
                    </select>
                </div>

                <div class='form-group'>
                    <label for="image">Upload photo:</label>
                    <input type="file" id="pic" name="pic">
                </div>

                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>



    </div>
</section>






<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>