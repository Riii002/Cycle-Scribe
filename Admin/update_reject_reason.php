<?php
session_start();
include 'connect.php';  // Include your database connection

if (isset($_POST['requestId']) && isset($_POST['rejectReason'])) {
    $requestId = $_POST['requestId'];
    $rejectReason = $_POST['rejectReason'];

    // SQL query to update the rejectReason in the recyclerequest table
    $query = "UPDATE tblrecyclerequest SET rejectReason = '$rejectReason', status = 'Rejected'  WHERE recycleId = '$requestId'";
    if(mysqli_query($con,$query))
    {
        $_SESSION['RecycledRequest'] = "Rejected";
        echo 'success';
    }
    else
    {
        echo "Error: " . mysqli_error($con);
    }
}
?>
