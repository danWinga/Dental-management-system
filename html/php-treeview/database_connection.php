<?php
 
 // database_connection.php

  // database_connection.php
$servername = "localhost";
$username = "root";
$password = "Admin@winga123";
$dbname = "socka";

//$connect = new PDO($servername, $username, $password, $dbname);

$connect = new PDO("mysql:host=localhost;dbname=socka", $username, $password);

//////////

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//$connect = new PDO("mysql:host=localhost;dbname=socka", "root","Admin@winga123");
?>