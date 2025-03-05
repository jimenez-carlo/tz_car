<?php
$table = $_POST['table'];
$column = $_POST['column'];
$value = $_POST['value'];

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "db_tarz");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "ADMIN ";

// Delete the user
$sql = "DELETE FROM $table WHERE $column = '$value'";
if (mysqli_query($conn, $sql)) {
    echo "User Deleted Successfully";
} else {
    echo "Error Deleting User: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>