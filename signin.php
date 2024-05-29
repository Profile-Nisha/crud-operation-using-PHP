<?php
 session_start();
if(isset($_SESSION['username'])){
    header('location: student.php');
}
 include 'connection.php';

 if(isset($_POST['submit'])) {
     $username = $_POST['username'];
     $password = $_POST['password'];
 
     // echo $username . " " . $password;
 
     // Corrected SQL query using double quotes for variable interpolation
     $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
     $result = mysqli_query($conn, $sql) or die("Query Failed");
 
    //  echo mysqli_num_rows($result);
 
     if(mysqli_num_rows($result) > 0) {
         $row = mysqli_fetch_assoc($result);
 
        
         $_SESSION['username'] = $row['username'];
         header('location: student.php');
     } else {
         echo "Username or password not matched";
     }
 }
 


?>



<?php include 'header.php'; ?>


<div class="container">
        <form class="signin-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <h2>Sign-In-Form</h2>
            <div class="form-group">
                
                <input type="text" id="username" placeholder=" enter username" name="username" required>
            </div>
            <div class="form-group">
               
                <input type="password" id="password" placeholder="enter password" name="password" required>
            </div>
            <button type="submit" name="submit">Sign In</button>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>