<?php
require_once "config/master.php";

// Step 2: Query to retrieve latitude, longitude, title, and description from your table
$sql = "SELECT * FROM coordinates";
$result = $conn->query($sql);

// Initialize an array to hold the marker data
$markerCoordinates = [];

// Fetch results from the query
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $markerCoordinates[] = [
            'coords' => [$row['latitude'], $row['longitude']],
            'dsp' => $row['dsp']
        ];
    }
}

// Close database connection
$conn->close();

// Return the marker data as JSON
header('Content-Type: application/json');
echo json_encode($markerCoordinates);

?>
