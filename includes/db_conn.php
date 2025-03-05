<?php
session_start();
$host = "db";
$username = "admin";
$password = "admin123";
$database = "db_tarz";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
