<?php
session_start();
include 'connect.php';

if(isset($_GET['uid'])) {
    $uid = $_GET['uid'];

    $sql = "UPDATE tbluser SET status = 'Active' WHERE userid = '$uid'";
    $res = mysqli_query($con, $sql) or die("Error executing suspend query! " . mysqli_error($con));
    
    if($res) {
        // echo "<script>alert('User suspended successfully!')</script>";
        header("Location: viewUser.php");
    }
}
?>
