<?php
include('connection.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sqlDelete = "DELETE FROM holiday WHERE id = '$id'";
    $result = mysqli_query($connection, $sqlDelete);
    if ($result) {
        header("location:select.php");
    } else {
        die(mysqli_connect_error());
    }
}


?>