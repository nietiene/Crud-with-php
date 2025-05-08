<?php
session_start();
include("connection.php");

if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM holiday WHERE name = '$name' AND password = '$password'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['user'] = $name;
        header("location:dashboard.php");
        exit();
    }  else {
        $error = "Invalid name or password" ;
    }
}
?>
<form action="" method="post">
    <label for="">Name</label>
    <input type="text" name="name"required> <br>
    <label for="">Password</label>
    <input type="text" name="password" required> <br>
    <button type="submit" name="login">Login</button>
</form>

<?php
if(isset($error)) {
    echo "<p style='color: red'>$error</p>";
}

?>