<?php
include 'connect.php';
if(isset($_GET['uid']))
{
    $uid = $_GET['uid'];
    $img = $_GET['img'];
    $q = "delete from tbluser where userid = '$uid'";
    if(mysqli_query($con,$q))
    {
        $path = "../uploads/user/$img";
        if(file_exists($path))
        {
            unlink($path);
        }   
        echo "<script>window.location='viewUser.php'</script>";
    }
}
?>