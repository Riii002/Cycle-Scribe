<?php
include 'connect.php';
if(isset($_GET['oid']))
{
    $oid = $_GET['oid'];
    // $img = $_GET['img'];
    $q = "delete from tblorder where orderid = '$oid'";
    if(mysqli_query($con,$q))
    {   
        echo "<script>window.location='viewOrders.php'</script>";
    }
}
?>