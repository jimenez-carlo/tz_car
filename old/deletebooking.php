<?php
require_once('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $con->prepare("DELETE FROM booking WHERE BOOK_ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<script>alert('Booking deleted successfully!');</script>";
        echo "<script>window.location.href='adminbook.php';</script>";
    } else {
        echo "<script>alert('Failed to delete booking!');</script>";
        echo "<script>window.location.href='adminbook.php';</script>";
    }
}
?>