<?php
  session_start();
  if(!isset($_SESSION['user'])) {
    header('location:login.php');
  };
  include('connection.php');

  $sql = "SELECT * FROM holiday";
 $result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of users</title>
</head>
<body>
<a href="insert.php">Add new</a>
    <table border="1">
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Place</th>
          <th>Password</th>
          <th colspan="2">Opretations</th>
        </tr>  
    <?php
      include('connection.php');
      if(mysqli_num_rows($result) > 0) {
        while ($rows = mysqli_fetch_assoc($result)) {
            $id = $rows['id'];
            $name = $rows['name'];
            $place = $rows['place'];
            $password = $rows['password'];
             echo "
              <tr>
                <td>$id</td>
                <td>$name</td>
                <td>$place</td>
                <td>$password</td>
                <td><a href='update.php?id=$id'>Update</a></td>
                <td><a href='delete.php?id=$id'>Delete</a></td>
              </tr>
             ";
        }
      } else {
        echo "No data in table";
      }

    ?>
     </table>
     <a href="logout.php">logout</a>
</body>
</html>
<script>
    // Force reload if user presses back button
    window.onpageshow = function(event) { // this onpageshow executed when user click on left arrow of browser
        if (event.persisted) { // if user clicked on left arrow or right 
            window.location.reload(); // reload browser to avoid getting an old data  
        }
    };
</script>
