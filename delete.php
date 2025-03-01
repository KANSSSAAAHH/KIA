<?php
include '../config/database.php';
$id = $_GET['id'];

$query = "DELETE FROM users WHERE id='$id'";

if ($conn->query($query) === TRUE) {
    header("Location: ../views/index.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
