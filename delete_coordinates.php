<?php
require_once 'config/master.php';

// Retrieve the ID from the POST request
$id = $_POST['id'];

// Prepare the SQL statement
$sql = "DELETE FROM coordinates WHERE id = ?";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind the ID parameter
$stmt->bind_param('i', $id);

// Execute the statement
if ($stmt->execute()) {
    echo "Record deleted successfully!";
    echo '<meta http-equiv="refresh" content="1;url=admin_coordinates.php">';
} else {
    echo "Error deleting record: " . $stmt->error;
}

// Close the statement and the connection
$stmt->close();
$conn->close();
?>
