<?php
$server="localhost";
$username="root";
$password="";
$database="nkc";

$conn=mysqli_connect($server, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
