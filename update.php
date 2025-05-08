<?php
include('connection.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM holiday WHERE id = '$id'";
    $Result = mysqli_query($connection, $sql);

    if ($Result) {
        $row = mysqli_fetch_assoc($Result);
        // $name = $row['name'];
        // $place = $row['place'];
        // $password = $row['password'];
    } else {
        die (mysqli_connect_error());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update opretaion</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Name</label>
        <input type="text" name="name"value="<?php echo $row['name'] ?>"><br>
        <label for="">Place</label>
        <input type="text" name="place" value="<?php echo $row['place']?>"><br>
        <label for="">Password</label>
        <input type="text" name="password" value="<?php echo $row['password']?>"><br>
        <input type="hidden" name="id" value="<?php echo $row['id']?>">

        <button type="submit" name="submit">Update</button>
    </form>

    <?php
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $place = $_POST['place'];
        $password = $_POST['password'];
        
        $update = "UPDATE holiday SET name = '$name', place = '$place', password = '$password' WHERE id = '$id'";
        $handleUpdate = mysqli_query($connection, $update);

        if($update) {
            header("location:select.php");
        } else {
            die(mysqli_connect_error());
        }
    }
 
   ?>
</body>
</html>