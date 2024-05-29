<?php
// error_reporting(0);
include_once 'connection.php';

$id = $_GET['id'];

$sql = "SELECT * FROM students WHERE id = $id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}


?>


<?php include 'header.php'; ?>



<section>
    <div class="container">
        <div class="display">
            <h1 class="h">UPDATE REGISTRATION FORM</h1>
            <form class="formmat" action="update.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="fname">First name:</label><br><br>
                <input type="text" id="fname" name="fname" value="<?php echo $row['first_name']; ?>"><br><br>
                <label for="lname">Last name:</label><br><br>
                <input type="text" id="lname" name="lname" value="<?php echo $row['last_name']; ?>"><br><br>
                <label for="lemail">email:</label><br><br>
                <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"><br><br>
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
                        <option value="">Department</option>
                        <option value="MCA" <?php ($row['department'] == 'MCA') ? 'selected' : '' ?>>MCA</option>
                        <option value="B-TECH" <?php ($row['department'] == 'B-TECH') ? 'selected' : '' ?>>B-TECH</option>
                        <option value="BCA" <?php ($row['department'] == 'BCA') ? 'selected' : '' ?>>BCA</option>
                    </select>
                </div>

                <div class='form-group'>
                    <label for="image">Upload photo:</label>
                    <input type="file" id="pic" name="pic">
                </div>

                <button type="submit" name="submit" value="submit" class="btn btn-primary">Update</button>
            </form>
        </div>



    </div>
</section>






<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>