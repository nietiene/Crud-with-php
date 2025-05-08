<?php

$connection = mysqli_connect('localhost','root', 'factorise@123', 'php_holiday');

if (!$connection) {
   echo "connection failed". mysqli_connect_error();
} else {
    echo "";
}
?>