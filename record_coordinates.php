<?php
require_once 'config/master.php';

// Retrieve the ID parameter from the request (use either GET or POST)
$id = isset($_GET['id']) ? $_GET['id'] : $_POST['id'];

// Initialize an array to hold the record data
$record = [];

    // Prepare the SQL query to retrieve the record data from tbl_price_monitoring
    $sql = "SELECT * FROM coordinates WHERE id = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the ID parameter
    $stmt->bind_param('i', $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Fetch the result
        $result = $stmt->get_result();

        // Check if a record was found
        if ($result->num_rows > 0) {
            // Fetch the record data
            $record = $result->fetch_assoc();
        } else {
            // No record found, set an error response
            http_response_code(404);
            echo json_encode(['error' => 'Record not found']);
            exit;
        }
    } else {
        // Error executing the query, set an error response
        http_response_code(500);
        echo json_encode(['error' => 'Database query error']);
        exit;
    }

    // Close the statement
    $stmt->close();


// Return the record data as JSON
header('Content-Type: application/json');
echo json_encode($record);

// Close the database connection
$conn->close();
?>
