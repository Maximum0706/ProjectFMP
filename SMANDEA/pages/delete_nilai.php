<?php
include '../backend/connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM nilai WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Record deleted successfully');window.location.href='nilai.php';</script>";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>