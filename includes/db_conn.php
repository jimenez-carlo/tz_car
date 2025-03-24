<?php
session_start();

# online
// $username = "fegankoh_fegankoh";
// $password = "B*FVUZP@ogQv";
// 
// $host = "mi3-cl9-its4.a2hosting.com";
// $username = "fegankoh";
// $password = "dSD;q29pIr[M36";
// $database = "fegankoh_db";

// Putty Tunnel
// $host = "127.0.0.1:3307";
// $username = "fegankoh";
// $password = "dSD;q29pIr[M36";
// $database = "fegankoh_db";

// ssh -L 3307:localhost:3306 fegankoh@mi3-cl9-its4.a2hosting.com -p 7822
// dSD;q29pIr[M36

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

// find . -type d -exec chmod 755 {} \;  # Set 0755 for all directories
// find . -type f -exec chmod 644 {} \; 
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
