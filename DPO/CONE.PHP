<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="password"> <br>
        <button name="lgn">submit</button>
    </form>
    <?php
   if (isset($_POST['lgn'])) {
    $password = $_POST['password'];
    $hashed = password_hash($password, PASSWORD_BCRYPT);
    echo "Plain text password:" . $password . "<br>";
    echo "Hashed one:" . $hashed;
   }
?>
</body>
</html>