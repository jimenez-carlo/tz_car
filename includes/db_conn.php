<?php
session_start();

# online
// $host = "mi3-cl9-its4.a2hosting.com";
// $username = "fegankoh_fegankoh";
// $password = "B*FVUZP@ogQv";
// $database = "fegankoh_db";

# local
// $host = "localhost";
// $username = "root";
// $password = "";
// $database = "db_tarz";

# docker
$host = "db";
$username = "admin";
$password = "admin123";
$database = "db_tarz";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
