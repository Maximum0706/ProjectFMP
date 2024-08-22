<?php
include '../backend/connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM dmu WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    header("Location: dmu.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>