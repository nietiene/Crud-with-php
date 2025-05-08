<?php
// Database connection
$host = "localhost";
$user = "root";
$password = "factorise@123";
$dbname = "php_holiday";

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select table
$table = "holiday";
$query = "SELECT * FROM $table";
$result = mysqli_query($conn, $query);

// Set headers to force download
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename={$table}_export.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Column names
$fields = mysqli_fetch_fields($result);
foreach ($fields as $field) {
    echo $field->name . "\t";
}
echo "\n";

// Data rows
while ($row = mysqli_fetch_assoc($result)) {
    echo implode("\t", $row) . "\n";
}

// Close connection
mysqli_close($conn);
?>
