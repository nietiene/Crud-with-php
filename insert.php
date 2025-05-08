<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
</head>
<body>
  
    <form action="" method="post">
        <label for="">Name</label>
        <input type="text" name="name" placeholder="Enter Name"><br>
        <label for="">Place</label>
        <input type="text" name="place" placeholder="Enter Place"><br>
        <label for="">Password</label>
        <input type="text" name="password" placeholder="Enter password"><br>

        <button type="submit" name="submit">Save</button>
    </form>
<?php
  include('connection.php');
  if(isset($_POST['submit'])) {
      $Name = $_POST['name'];
      $Place = $_POST['place'];
      $Password = $_POST['password'];
      
      $passwordHash = password_hash($Password, PASSWORD_BCRYPT);
      $Sql = "INSERT INTO holiday(name, place, password) VALUES('$Name','$Place', '$passwordHash')";
      $Result = mysqli_query($connection, $Sql);
     
      if ($Result) {
        header("location:select.php");
      } else {
        die(mysqli_connect_error());
      }
  }

?>
</body>
</html>