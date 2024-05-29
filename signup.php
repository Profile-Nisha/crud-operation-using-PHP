<?php
session_start();
if (isset($_SESSION['username'])) {
    header('location: student.php');
}

//  error_reporting(0);
include_once 'connection.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];


    $sql = "SELECT * FROM users WHERE username = '$username'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "User already exists";
    } else {
        if ($password == $confirmpassword) {
            $insertQuery = "INSERT INTO users (username, email, password) 
            VALUES ('$username' , '$email' , '$password')";
            if (mysqli_query($conn, $insertQuery)) {
                echo "New record created successfully";
                if ($result) {
                    header('location: signin.php');
                }
            } else {
                echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Password and Confirm Password do not match";
        }
    }
}
?>

<?php include 'header.php'; ?>

<div class="container">
    <form class="signin-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <h2>Register-Form</h2>
        <div class="form-group">

            <input type="text" id="username" placeholder=" enter username" name="username" required>
        </div>
        <div class="form-group">

            <input type="email" id="password" placeholder="enter your email" name="email" required>
        </div>
        <div class="form-group">

            <input type="password" id="password" placeholder="enter password" name="password" required>
        </div>
        <div class="form-group">

            <input type="password" id="confirm-password" placeholder="confirm password" name="confirmpassword" required>
        </div>
        <button type="submit" name="submit">Register</button>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>