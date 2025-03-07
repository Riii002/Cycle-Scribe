<?php
$conn = mysqli_connect("localhost", "root", "", "cyclescribedb");

if (isset($_POST['approve'])) 
{
    $recycleId = $_POST['recycleId'];
    $uid = $_POST['userId'];
    echo "Recycle ID: $recycleId, User ID: $uid";

    $q = "SELECT * FROM tblrecyclerequest WHERE userid='$uid' AND recycleid='$recycleId'";
    $result = mysqli_query($conn, $q);
    $row = mysqli_fetch_assoc($result);

    $weight = $row['weight']; 
    $exchangeValue = ($weight * 0.75) / 250;

    $recycleWeight = $exchangeValue * 250; 
    
    $img = "rb1.jpg";
    move_uploaded_file("image/".$img,"../uploads/recycled/".basename($img));
    
    $insertSql = "INSERT INTO tblrecycledbook (userId, reqId, weight, exchangeValue, img) VALUES ('$uid', '$recycleId', '$recycleWeight', '$exchangeValue', '$img')";
    if (mysqli_query($conn, $insertSql)) 
    {
        $sql = "UPDATE tblrecyclerequest SET status = 'approved' WHERE recycleId = '$recycleId'";
        // echo $sql;  
        if (mysqli_query($conn, $sql)) 
        {
            $_SESSION['RecycledRequest'] = "Approved";
            echo "<script>window.location='viewRecycleRequest.php?amsg=Request approved!'</script>";
        }
    }
}
elseif (isset($_POST['btnReject'])) 
{
    $recycleId = $_POST['recycleId'];
    $sql = "UPDATE tblrecyclerequest SET status = 'rejected' WHERE recycleId = '$recycleId'";
    if (mysqli_query($conn, $sql)) 
    {
        $_SESSION['RecycledRequest'] = "Rejected";
    }
}

if(!isset($_POST['approve']) && !isset($_POST['btnReject']))
{
    $_SESSION['RecycledRequest'] = "Pending";
}
?>
