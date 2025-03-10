<?php
include('../includes/functions.php');
$table = $_POST['table'];
$column = $_POST['column'];
$value = $_POST['value'];
// Connect to the database

echo "ADMIN ";

// Delete the user
$sql = "DELETE FROM $table WHERE $column = '$value'";
query("DELETE FROM $table WHERE $column = '$value'");
echo "User Deleted Successfully";
