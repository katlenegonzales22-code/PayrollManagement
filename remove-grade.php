<?php
session_start();
include('db.php');

// Ensure the ID is set and is a valid integer
if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare and execute the DELETE statement using a prepared statement
    $sql = "DELETE FROM grade WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id); // 'i' is for integer type

    if ($stmt->execute()) {
        // Redirect to the view page after deletion
        header("Location: view-grade.php");
        exit();
    } else {
        echo "Error removing grade.";
    }
} else {
    echo "Invalid request.";
}
?>