<?php
    include_once 'dbConfig.php';
    function filterData(&$str)
    {
        $str = preg_replace("/\t/","\\t", $str);
        $str = preg_replace("/\r?\n/","\\n", $str);
        if(strstr($str,'"')) $str = '"' . str_replace('"','""',$str) . '"';
    }

    $fileName = "order-data_" . date('Y-m-d') . ".xls";
    $fields = array('User Name','Order Date','Order Amount','Payement Method','Order Status','Month','Quantity','Total Orders','Total Amount');
    $excelData = implode("\t",array_values($fields)) . "\n";

    $query = $db->query("SELECT *,u.userName,DATE_FORMAT(o.orderDate, '%Y-%m') AS month, COUNT(o.orderId) AS totalOrders, SUM(o.orderAmount) AS totalAmount FROM tblOrder o inner join tbluser u on o.userid=u.userid GROUP BY DATE_FORMAT(o.orderDate, '%Y-%m') ORDER BY month;");
    if($query->num_rows > 0)
    {
        while($row = $query->fetch_assoc()){
            $lineData = array(
                            $row['userName'],
                            $row['orderDate'],
                            $row['orderAmount'],
                            $row['paymentMethod'],
                            $row['orderStatus'],
                            $row['month'],
                            $row['quantity'],
                            $row['totalOrders'],
                            $row['totalAmount'] );  
            $excelData .= implode("\t",array_values($lineData)) . "\n";
        }
    }
    else
    {
        $excelData .= "No records found.." . "\n"; 
    }

    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$fileName\"");

    echo $excelData;

    exit();

?>