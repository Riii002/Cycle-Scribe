<?php
include 'connect.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the category from POST request
$category = $_POST['category'];

// Initialize the data array
$data = array();

$query = "SELECT * FROM tblBook";
if (!empty($category)) {
    $query .= " WHERE category = '" . mysqli_real_escape_string($con, $category) . "'";
}

$result = mysqli_query($con, $query);

// Check if records exist
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = array(
            $row['bookId'],       // Assuming bookId is the primary key
            $row['bookTitle'],
            $row['author'],
            $row['publisher'],
            $row['publishedDate'],
            $row['description'],
            $row['isRecycled'],
            $row['userName'],
            $row['category']
        );
    }
}

// Prepare output in DataTables format
$response = array(
    "data" => $data
);

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>