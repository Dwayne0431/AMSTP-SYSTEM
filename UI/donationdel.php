<?php
include_once 'dbconnection.php';

if (isset($_POST['pid'])) {
    $id = $_POST['pid'];

    // Prepare DELETE query
    $delete = $pdo->prepare("DELETE FROM donation WHERE pid = :id");
    $delete->bindParam(':id', $id, PDO::PARAM_INT);

    if ($delete->execute()) {
        echo "Success"; // Response to AJAX
    } else {
        echo "Error";
    }
} else {
    echo "Invalid request";
}
?>
