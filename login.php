<?php
session_start();
include("connection.php");

if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM holiday WHERE name = '$name'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $storedPasswordHashed = $row['password'];
        if (password_verify($password, $storedPasswordHashed)) {
            $_SESSION['user'] = $name;
            header("location:dashboard.php");
            exit();
        }  else {
            $error = "wrong password" ;
        }
    }
        else {
            $error = "name not found" ;
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