<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location: signin.php');
}
include_once 'connection.php';

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);



?>


<?php  include'header.php';?>


<div class="container">
  <a href="logout.php">Logout</a>
  <div class="display">
   <h1 class="h">STUDENT DETAILS:</h1>
   <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Image</th>
      <th scope="col">First-Name</th>
      <th scope="col">Last-name</th>
      <th scope="col">email</th>
      <th scope="col">gender</th>
      <th scope="col">department</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
       if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
    ?>
  <tr>
        <td><?php echo $row['id']; ?></td>
        <td><img src="./assets/uploads/<?php echo $row['image']?>" alt="img" width="150"></td>
        <td><?php echo $row['first_name']?></td>
        <td><?php echo $row['last_name']?></td>
        <td><?php echo $row['email']?></td>
        <td><?php echo $row['gender']?></td>
        <td><?php echo $row['department']?></td>
        <td><a href="./edit.php?id=<?php echo $row['id']; ?>">Edit</a> | <a href="./delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
    </tr>

    <?php } } ?>

  </tbody>
   
</table>
  </div>
</div>