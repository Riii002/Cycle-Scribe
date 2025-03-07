<?php
include 'connect.php';
if(isset($_GET['bid']))
{
    $bid = $_GET['bid'];
    $img = $_GET['img'];
    $q = "delete from tblbook where bookId = '$bid'";
    if(mysqli_query($con,$q))
    {
        $path = "../uploads/book/$img";
        if(file_exists($path))
        {
            unlink($path);
        }   
        echo "<script>window.location='viewBooks.php'</script>";
    }
}
?>