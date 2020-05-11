<?php
/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "Admin@winga123";
$dbname = "test_db";
$dbname2 = "socka";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


$connect = mysqli_connect($servername, $username, $password, $dbname2) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>
