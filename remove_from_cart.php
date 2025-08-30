<?php
include 'session_check.php'; 
include 'dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $query = "DELETE FROM cartdb WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $id, $_SESSION['user_id']);
    
    if ($stmt->execute()) {
        header("Location: cart.php"); // Redirect to cart after deletion
        exit();
    } else {
        echo "Error removing item.";
    }
}
?>
