<?php
include 'connect.php';

if (isset($_POST['status'])) 
{
    $status = $_POST['status'];
    if ($status != "") 
    {
        $query = "SELECT *, u.userName FROM tblOrder ord INNER JOIN tbluser u ON ord.userId = u.userId WHERE ord.orderStatus = '$status' LIMIT 20";
    } 
    else 
    {
        $query = "SELECT *, u.userName FROM tblOrder ord INNER JOIN tbluser u ON ord.userId = u.userId LIMIT 20";
    }

    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $count = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$count}</td>
                    <td>{$row['quantity']}</td>
                    <td>{$row['userName']}</td>
                    <td>{$row['orderDate']}</td>
                    <td>{$row['orderAmount']}</td>
                    <td>{$row['paymentMethod']}</td>
                    <td>{$row['trackingNumber']}</td>
                    <td>{$row['orderStatus']}</td>
                  </tr>";
            $count++;
        }
    } else {
        echo "<tr><td colspan='8'>No records found</td></tr>";
    }
}
?>
