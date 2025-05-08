<?php
session_start(); // resume or start sesion
session_unset(); // remove all session variable like name or id
session_destroy(); // finally ends session
header("location:login.php"); // after ending session we will navigate to login page
exit(); // stops script executing
?>